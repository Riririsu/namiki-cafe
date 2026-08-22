<?php
/**
 * namiki-coffee テーマ機能ファイル
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * テーマの基本設定
 */
function namiki_setup() {
	// タイトルタグを自動出力
	add_theme_support( 'title-tag' );

	// アイキャッチ画像を有効化（NEWS投稿のサムネイル用）
	add_theme_support( 'post-thumbnails' );

	// ナビゲーションメニューの登録場所
	register_nav_menus(
		array(
			'primary' => 'グローバルナビゲーション',
		)
	);

	// レスポンシブ埋め込み（Googleマップ等）に対応
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'namiki_setup' );

/**
 * main.css は body.top-page 記法でトップページ限定のヘッダー/スライダー
 * スタイルを当てているため、フロントページ表示時に top-page クラスを付与する。
 */
function namiki_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'top-page';
	}
	return $classes;
}
add_filter( 'body_class', 'namiki_body_classes' );

/**
 * CSS・JSの読み込み
 */
function namiki_enqueue_assets() {
	$theme_uri     = get_template_directory_uri();
	$theme_version = wp_get_theme()->get( 'Version' );

	// Googleフォント
	wp_enqueue_style(
		'namiki-google-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Shippori+Mincho&display=swap',
		array(),
		null
	);

	// リセットCSS
	wp_enqueue_style( 'namiki-reset', $theme_uri . '/assets/css/reset.css', array(), $theme_version );

	// メインCSS（リセットCSSの後に読み込む）
	wp_enqueue_style( 'namiki-main', $theme_uri . '/assets/css/main.css', array( 'namiki-reset' ), $theme_version );

	// メインJS
	// ※ GSAPやSwiper等を追加する場合は、この関数内で main.js より先に enqueue してください。
	wp_enqueue_script( 'namiki-main', $theme_uri . '/assets/js/main.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'namiki_enqueue_assets' );

/**
 * NEWS一覧・NEWSプレビューの共通クエリ引数
 *
 * @param int $posts_per_page 表示件数
 * @return array
 */
function namiki_news_query_args( $posts_per_page = 8 ) {
	return array(
		'post_type'      => 'post',
		'posts_per_page' => $posts_per_page,
		'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
	);
}

/**
 * 投稿日をコーディングデザインに合わせて「2026.7.22」形式で出力
 */
function namiki_the_date_dot() {
	echo esc_html( get_the_date( 'Y.n.j' ) );
}

/**
 * 投稿カテゴリー名（1つ目）を出力。未設定の場合は「お知らせ」を出力
 */
function namiki_the_category_label() {
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		echo esc_html( $categories[0]->name );
	} else {
		echo 'お知らせ';
	}
}

/**
 * NEWS一覧のページネーションを元のコーディング(.pagination)のクラス構成で出力する
 */
function namiki_pagination( $query = null ) {
	global $wp_query;
	$query = $query ? $query : $wp_query;

	$total = $query->max_num_pages;
	if ( $total <= 1 ) {
		return;
	}

	$current = max( 1, get_query_var( 'paged' ) );

	$links = paginate_links(
		array(
			'total'     => $total,
			'current'   => $current,
			'mid_size'  => 1,
			'prev_next' => false,
			'type'      => 'array',
		)
	);

	if ( ! $links ) {
		return;
	}

	echo '<div class="pagination">';
	foreach ( $links as $link ) {
		if ( strpos( $link, 'current' ) !== false ) {
			$link = preg_replace( '/class="([^"]*)page-numbers([^"]*)"/', 'class="pagination_numbers pagination_numbers__current"', $link );
		} elseif ( strpos( $link, 'dots' ) !== false ) {
			$link = preg_replace( '/class="([^"]*)page-numbers([^"]*)"/', 'class="pagination_numbers pagination_numbers__between"', $link );
		} else {
			$link = preg_replace( '/class="page-numbers"/', 'class="pagination_numbers"', $link );
		}
		echo $link; // phpcs:ignore -- paginate_links() output is already escaped by core.
	}

	$next = get_next_posts_link( '', $total );
	if ( $next ) {
		echo str_replace( 'class="', 'class="pagination_numbers pagination_numbers__next "', $next );
	}
	echo '</div>';
}

/**
 * 「外観 > メニュー」でメニュー未作成のときに表示されるデフォルトナビゲーション。
 * トップページ以外ではトップページのアンカーへリンクします。
 * 管理画面でメニューを作成し「primary」の位置に割り当てると、こちらは自動的に無効になります。
 */
function namiki_default_nav() {
	$home = is_front_page() ? '' : esc_url( home_url( '/' ) );
	?>
	<ul class="l_header-nav_list">
		<li class="l_header-nav_item"><a href="<?php echo $home; ?>#concept" class="l_header-nav_link">CONCEPT</a></li>
		<li class="l_header-nav_item"><a href="<?php echo $home; ?>#menu" class="l_header-nav_link">MENU</a></li>
		<li class="l_header-nav_item"><a href="<?php echo $home; ?>#news" class="l_header-nav_link">NEWS</a></li>
		<li class="l_header-nav_item"><a href="<?php echo $home; ?>#about" class="l_header-nav_link">ABOUT</a></li>
		<li class="l_header-nav_item"><a href="<?php echo $home; ?>#shop-info" class="l_header-nav_link">SHOP INFO</a></li>
		<li class="l_header-nav_item"><a href="<?php echo $home; ?>#contact" class="l_header-nav_link">CONTACT</a></li>
		<li class="l_header-nav_item">
			<a href="https://instagram.com" target="_blank" rel="noopener" class="l_header-nav_link">
				<span class="l_header-nav_text-sp">Instagram</span>
				<svg class="l_header-nav_icon-pc" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24" fill="currentColor">
					<path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.9c-41.4 0-75-33.6-75-75s33.6-75 75-75 75 33.6 75 75-33.6 75-75 75zm146.2-193.4c0 14.9-12 26.9-26.9 26.9-14.9 0-26.9-12-26.9-26.9s12-26.9 26.9-26.9c14.9 0 26.9 12 26.9 26.9zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
				</svg>
			</a>
		</li>
	</ul>
	<?php
}
