<?php
/**
 * GitHub Pages 用デモの WordPress スタブ
 *
 * WordPress 本体を使わずにテーマのテンプレートを実行し、静的 HTML を書き出すための
 * 最小限の関数群です。デモ生成専用で、テーマ本体の動作には一切関与しません。
 *
 * @see tools/build-demo.php
 */

date_default_timezone_set( 'Asia/Tokyo' );

// functions.php の直接アクセス防止チェックを通すため
define( 'ABSPATH', __DIR__ );

/* -------------------------------------------------------------------------
 * デモ用のダミーデータ
 * ---------------------------------------------------------------------- */

$GLOBALS['demo_site'] = array(
	'name'        => '並木珈琲',
	'description' => '街角の喫茶店。一杯ずつ淹れる珈琲と、季節の甘味。',
);

$GLOBALS['demo_posts'] = array(
	array(
		'title' => '秋の新作「和栗のモンブランパフェ」販売開始のお知らせ',
		'date'  => '2026-08-18',
		'cat'   => 'メニュー',
	),
	array(
		'title' => '8月の営業時間について',
		'date'  => '2026-08-01',
		'cat'   => 'お知らせ',
	),
	array(
		'title' => '自家焙煎ブレンド「並木」リニューアルのご案内',
		'date'  => '2026-07-22',
		'cat'   => 'メニュー',
	),
	array(
		'title' => '夏季休業のお知らせ',
		'date'  => '2026-07-10',
		'cat'   => 'お知らせ',
	),
	array(
		'title' => '店内でのご予約受付を開始しました',
		'date'  => '2026-06-28',
		'cat'   => 'お知らせ',
	),
);

// 現在描画中のページ種別（front / news / single）
$GLOBALS['demo_page'] = 'front';
// ループ中の投稿
$GLOBALS['demo_post'] = null;
// フック・アセットの記録先
$GLOBALS['demo_actions'] = array();
$GLOBALS['demo_filters'] = array();
$GLOBALS['demo_styles']  = array();
$GLOBALS['demo_scripts'] = array();

/* -------------------------------------------------------------------------
 * ループ
 * ---------------------------------------------------------------------- */

class Demo_Query {
	public $posts;
	public $current       = -1;
	public $max_num_pages = 1;

	public function __construct( array $posts ) {
		$this->posts = $posts;
	}

	public function have_posts() {
		return ( $this->current + 1 ) < count( $this->posts );
	}

	public function the_post() {
		$this->current++;
		$GLOBALS['demo_post'] = $this->posts[ $this->current ];
	}
}

/** front-page.php の `new WP_Query( ... )` を受けるスタブ */
class WP_Query extends Demo_Query {
	public function __construct( $args = array() ) {
		$per_page = isset( $args['posts_per_page'] ) ? (int) $args['posts_per_page'] : 3;
		parent::__construct( array_slice( $GLOBALS['demo_posts'], 0, $per_page ) );
	}
}

function have_posts() {
	return $GLOBALS['wp_query']->have_posts();
}

function the_post() {
	$GLOBALS['wp_query']->the_post();
}

function wp_reset_postdata() {
	$GLOBALS['demo_post'] = null;
}

/* -------------------------------------------------------------------------
 * フック
 * ---------------------------------------------------------------------- */

function add_action( $hook, $callback, $priority = 10, $args = 1 ) {
	$GLOBALS['demo_actions'][ $hook ][] = $callback;
}

function add_filter( $hook, $callback, $priority = 10, $args = 1 ) {
	$GLOBALS['demo_filters'][ $hook ][] = $callback;
}

function do_action( $hook ) {
	foreach ( $GLOBALS['demo_actions'][ $hook ] ?? array() as $callback ) {
		call_user_func( $callback );
	}
}

function apply_filters( $hook, $value ) {
	foreach ( $GLOBALS['demo_filters'][ $hook ] ?? array() as $callback ) {
		$value = call_user_func( $callback, $value );
	}
	return $value;
}

/* -------------------------------------------------------------------------
 * テーマサポート系（すべて no-op）
 * ---------------------------------------------------------------------- */

function add_theme_support( ...$args ) {}
function register_nav_menus( ...$args ) {}
function after_setup_theme() {}

function wp_get_theme() {
	return new class() {
		public function get( $key ) {
			return '1.0';
		}
	};
}

/* -------------------------------------------------------------------------
 * アセット
 * ---------------------------------------------------------------------- */

function wp_enqueue_style( $handle, $src = '', $deps = array(), $ver = null, $media = 'all' ) {
	if ( $src ) {
		$GLOBALS['demo_styles'][] = $src;
	}
}

function wp_enqueue_script( $handle, $src = '', $deps = array(), $ver = null, $in_footer = false ) {
	if ( $src ) {
		$GLOBALS['demo_scripts'][] = $src;
	}
}

/* -------------------------------------------------------------------------
 * URL・エスケープ
 * ---------------------------------------------------------------------- */

/** デモは 1 ディレクトリにフラットに出力するので、テーマ URI は相対パス */
function get_template_directory_uri() {
	return '.';
}

function home_url( $path = '' ) {
	return 'index.html';
}

function esc_url( $url ) {
	return htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
}

function esc_attr( $text ) {
	return htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' );
}

function esc_html( $text ) {
	return htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' );
}

/* -------------------------------------------------------------------------
 * 条件分岐タグ
 * ---------------------------------------------------------------------- */

function is_front_page() {
	return 'front' === $GLOBALS['demo_page'];
}

function is_home() {
	return 'news' === $GLOBALS['demo_page'];
}

function is_single() {
	return 'single' === $GLOBALS['demo_page'];
}

/* -------------------------------------------------------------------------
 * サイト情報
 * ---------------------------------------------------------------------- */

function get_bloginfo( $key = 'name' ) {
	return $GLOBALS['demo_site'][ $key ] ?? '';
}

function bloginfo( $key = 'name' ) {
	echo esc_html( get_bloginfo( $key ) );
}

function get_option( $key ) {
	return 'page_for_posts' === $key ? 2 : '';
}

function get_query_var( $key ) {
	return 1;
}

/* -------------------------------------------------------------------------
 * 投稿データ
 * ---------------------------------------------------------------------- */

function get_the_date( $format = 'Y.n.j' ) {
	$post = $GLOBALS['demo_post'];
	return $post ? date( $format, strtotime( $post['date'] ) ) : date( $format );
}

function the_title() {
	echo esc_html( $GLOBALS['demo_post']['title'] ?? '' );
}

function single_post_title() {
	echo 'お知らせ';
}

function get_the_category() {
	$name = $GLOBALS['demo_post']['cat'] ?? '';
	if ( ! $name ) {
		return array();
	}
	$term       = new stdClass();
	$term->name = $name;
	return array( $term );
}

function get_permalink( $id = null ) {
	// get_option( 'page_for_posts' ) 経由で呼ばれた場合は NEWS 一覧へ
	return $id ? 'news.html' : 'news-single.html';
}

function the_permalink() {
	echo 'news-single.html';
}

function has_post_thumbnail() {
	return true;
}

function the_post_thumbnail( $size = 'large', $attr = array() ) {
	$class = esc_attr( $attr['class'] ?? '' );
	printf(
		'<img src="./assets/img/img_gallery-03.png" width="1200" height="800" alt="" class="%s" />',
		$class
	);
}

function the_content() {
	echo <<<HTML
<p>いつも並木珈琲をご利用いただき、ありがとうございます。</p>
<p>９月１日より、秋の看板メニューとして「和栗のモンブランパフェ」をご用意いたします。国産の和栗をその日の分だけ炊き上げ、注文をいただいてから目の前で絞る、この季節だけの一品です。自家焙煎の深煎りブレンドと合わせてお楽しみください。</p>
<p>数に限りがございますので、売り切れの際はご容赦ください。皆さまのご来店を心よりお待ちしております。</p>
HTML;
}

function get_next_posts_link( $label = '', $max = 0 ) {
	return '';
}

function paginate_links( $args = array() ) {
	return array();
}

/* -------------------------------------------------------------------------
 * テンプレートタグ
 * ---------------------------------------------------------------------- */

function get_header() {
	include $GLOBALS['demo_theme_dir'] . '/header.php';
}

function get_footer() {
	include $GLOBALS['demo_theme_dir'] . '/footer.php';
}

function wp_title( $sep = '' ) {
	echo esc_html( demo_page_title() );
}

function demo_page_title() {
	switch ( $GLOBALS['demo_page'] ) {
		case 'news':
			return 'お知らせ | ' . get_bloginfo( 'name' );
		case 'single':
			return ( $GLOBALS['demo_posts'][0]['title'] ) . ' | ' . get_bloginfo( 'name' );
		default:
			return get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
	}
}

function wp_head() {
	// functions.php の namiki_enqueue_assets() を実際に走らせる
	$GLOBALS['demo_styles']  = array();
	$GLOBALS['demo_scripts'] = array();
	do_action( 'wp_enqueue_scripts' );

	echo "\n<title>" . esc_html( demo_page_title() ) . "</title>\n";
	foreach ( $GLOBALS['demo_styles'] as $src ) {
		echo '<link rel="stylesheet" href="' . esc_url( $src ) . "\" />\n";
	}
}

function wp_body_open() {}

function wp_footer() {
	foreach ( $GLOBALS['demo_scripts'] as $src ) {
		echo '<script src="' . esc_url( $src ) . "\"></script>\n";
	}
}

function body_class() {
	$classes = array( is_front_page() ? 'home' : 'page' );
	$classes = apply_filters( 'body_class', $classes );
	echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
}

function wp_nav_menu( $args = array() ) {
	// デモではメニュー未登録なので、必ず fallback_cb が呼ばれる
	if ( ! empty( $args['fallback_cb'] ) && is_callable( $args['fallback_cb'] ) ) {
		call_user_func( $args['fallback_cb'] );
	}
}
