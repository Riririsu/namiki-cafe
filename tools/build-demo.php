<?php
/**
 * GitHub Pages 用デモサイトのビルドスクリプト
 *
 * テーマの PHP テンプレートを WordPress なしで実行し、docs/ に静的 HTML を書き出します。
 * ポートフォリオ用に「見た目を確認できるページ」を用意することだけが目的で、
 * テーマ本体（namiki-coffee/）には手を加えません。
 *
 * 使い方: php tools/build-demo.php
 */

$root      = dirname( __DIR__ );
$theme_dir = $root . '/namiki-coffee';
$out_dir   = $root . '/docs';

$GLOBALS['demo_theme_dir'] = $theme_dir;

require __DIR__ . '/demo-bootstrap.php';
require $theme_dir . '/functions.php';

/* ---------------------------------------------------------------------------
 * 出力先を作り直す
 * ------------------------------------------------------------------------ */

if ( is_dir( $out_dir ) ) {
	demo_rmdir( $out_dir );
}
mkdir( $out_dir, 0755, true );

// GitHub Pages に Jekyll 処理をさせない
file_put_contents( $out_dir . '/.nojekyll', '' );

/* ---------------------------------------------------------------------------
 * アセットをコピー
 * ------------------------------------------------------------------------ */

demo_copy_dir( $theme_dir . '/assets', $out_dir . '/assets' );

// テーマに未同梱の画像は、デモが崩れないようプレースホルダーを生成する
$placeholders = array(
	'img_menu_season.png' => array( 750, 500 ),
	'img_lunch_1.png'     => array( 343, 239 ),
	'img_lunch_2.png'     => array( 343, 239 ),
	'img_lunch_3.png'     => array( 343, 239 ),
	'img_shop_SP.png'     => array( 750, 500 ),
);
foreach ( $placeholders as $name => $size ) {
	$path = $out_dir . '/assets/img/' . $name;
	if ( ! file_exists( $path ) ) {
		demo_placeholder( $path, $size[0], $size[1] );
		echo "placeholder: assets/img/{$name}\n";
	}
}

/* ---------------------------------------------------------------------------
 * 重い PNG 写真を JPEG に変換する
 *
 * テーマ本体は元の PNG のままにしておき、デモとして配信するぶんだけ軽くする。
 * 変換したファイルは拡張子が変わるので、HTML 側の参照も後段で置換する。
 * ------------------------------------------------------------------------ */

$rewrite   = array();
$max_bytes = 400 * 1024;
$max_width = 1600;

foreach ( glob( $out_dir . '/assets/img/*.png' ) as $png ) {
	if ( filesize( $png ) <= $max_bytes ) {
		continue;
	}

	$src = imagecreatefrompng( $png );
	if ( ! $src ) {
		continue;
	}
	if ( imagesx( $src ) > $max_width ) {
		$src = imagescale( $src, $max_width );
	}

	$jpg = preg_replace( '/\.png$/', '.jpg', $png );
	imagejpeg( $src, $jpg, 82 );
	imagedestroy( $src );

	$before = filesize( $png );
	$after  = filesize( $jpg );
	unlink( $png );

	$name              = basename( $png );
	$rewrite[ $name ]  = basename( $jpg );

	printf( "optimized: %-24s %5dKB -> %4dKB\n", $name, $before / 1024, $after / 1024 );
}

/* ---------------------------------------------------------------------------
 * 各ページを描画
 * ------------------------------------------------------------------------ */

$pages = array(
	'index.html'       => array( 'front', 'front-page.php', array() ),
	'news.html'        => array( 'news', 'home.php', $GLOBALS['demo_posts'] ),
	'news-single.html' => array( 'single', 'single.php', array( $GLOBALS['demo_posts'][0] ) ),
);

foreach ( $pages as $file => $conf ) {
	list( $page, $template, $posts ) = $conf;

	$GLOBALS['demo_page'] = $page;
	$GLOBALS['demo_post'] = null;
	$GLOBALS['wp_query']  = new Demo_Query( $posts );

	ob_start();
	include $theme_dir . '/' . $template;
	$html = ob_get_clean();

	// JPEG に変換した画像の参照を差し替える
	$html = strtr( $html, $rewrite );

	file_put_contents( $out_dir . '/' . $file, $html );
	printf( "built: %-16s (%s, %d bytes)\n", $file, $template, strlen( $html ) );
}

echo "done.\n";

/* ---------------------------------------------------------------------------
 * ヘルパー
 * ------------------------------------------------------------------------ */

function demo_rmdir( $dir ) {
	foreach ( scandir( $dir ) as $entry ) {
		if ( '.' === $entry || '..' === $entry ) {
			continue;
		}
		$path = $dir . '/' . $entry;
		is_dir( $path ) ? demo_rmdir( $path ) : unlink( $path );
	}
	rmdir( $dir );
}

function demo_copy_dir( $src, $dst ) {
	mkdir( $dst, 0755, true );
	foreach ( scandir( $src ) as $entry ) {
		if ( '.' === $entry || '..' === $entry ) {
			continue;
		}
		$from = $src . '/' . $entry;
		$to   = $dst . '/' . $entry;
		is_dir( $from ) ? demo_copy_dir( $from, $to ) : copy( $from, $to );
	}
}

/** 画像が未用意の箇所に置く、サイトのトーンに合わせた無地のプレースホルダー */
function demo_placeholder( $path, $w, $h ) {
	$im = imagecreatetruecolor( $w, $h );

	$bg     = imagecolorallocate( $im, 0xED, 0xE4, 0xD8 );
	$line   = imagecolorallocate( $im, 0xCB, 0xB9, 0xA1 );
	$text   = imagecolorallocate( $im, 0xA2, 0x8C, 0x70 );
	$inset  = (int) round( min( $w, $h ) * 0.06 );

	imagefilledrectangle( $im, 0, 0, $w, $h, $bg );
	imagerectangle( $im, $inset, $inset, $w - $inset - 1, $h - $inset - 1, $line );

	$label = 'NO IMAGE';
	$font  = 5;
	$x     = (int) ( ( $w - imagefontwidth( $font ) * strlen( $label ) ) / 2 );
	$y     = (int) ( ( $h - imagefontheight( $font ) ) / 2 );
	imagestring( $im, $font, $x, $y, $label, $text );

	imagepng( $im, $path );
	imagedestroy( $im );
}
