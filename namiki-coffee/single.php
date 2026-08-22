<?php
/**
 * single.php
 * 投稿（NEWS）詳細ページ。single.html のデザインを再現しています。
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="single_contents l_container">
		<main class="singe_main">
			<div class="single_main_meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>" class="single_main_meta-date"><?php namiki_the_date_dot(); ?></time>
				<span class="single_main_meta-cat"><?php namiki_the_category_label(); ?></span>
			</div>
			<h1 class="single_main_title"><?php the_title(); ?></h1>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="single_main_thumb-wrapper">
					<?php
					the_post_thumbnail(
						'large',
						array(
							'class' => 'single_main_thumb',
						)
					);
					?>
				</div>
			<?php endif; ?>

			<div class="single_main_contents">
				<?php the_content(); ?>
			</div>

			<div class="single_main_btn-wrapper">
				<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="single_main_btn">BACK TO NEWS</a>
			</div>
		</main>
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>
