<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta name="format-detection" content="telephone=no" />

<?php if ( ! is_front_page() ) : ?>
<meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" />
<?php endif; ?>

<!-- favicon/web-clip-icon -->
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/favicon.ico" type="image/ico" />
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/favicon.png" type="image/png" />
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/favicon.svg" type="image/svg+xml" />
<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/webclip.png" />

<!-- ogp -->
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
<meta property="og:url" content="<?php echo esc_url( is_front_page() ? home_url( '/' ) : get_permalink() ); ?>" />
<meta property="og:type" content="<?php echo is_front_page() ? 'website' : 'article'; ?>" />
<meta property="og:title" content="<?php wp_title( '' ); ?>" />
<meta property="og:description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" />
<meta property="og:locale" content="ja_JP" />
<meta name="twitter:card" content="summary_large_image" />

<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ▼header▼ -->
<header class="l_header">
	<h1 class="l_header-logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l_header-logo_link">
			<img
				src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_logo.png"
				alt="<?php bloginfo( 'name' ); ?>ロゴ"
				class="l_header-logo_img"
			/>
		</a>
	</h1>

	<nav class="l_header-nav js_nav">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'items_wrap'     => '%3$s',
				'fallback_cb'    => 'namiki_default_nav',
			)
		);
		?>
	</nav>

	<!--ハンバーガーメニュー-->
	<button class="m_hamburger js_hamburger" aria-label="メニューを開閉する">
		<span class="m_hamburger-bar"></span>
		<span class="m_hamburger-bar"></span>
		<span class="m_hamburger-bar"></span>
	</button>
</header>
<!-- ▲header▲ -->
