<?php
/**
 * page.php
 * NEWS一覧・トップページ以外の固定ページ（会社概要、プライバシーポリシー等を
 * 追加した場合）に使われる汎用テンプレートです。
 */

get_header();
?>

<div class="single_contents l_container">
	<main class="singe_main">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="single_main_title"><?php the_title(); ?></h1>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="single_main_thumb-wrapper">
					<?php the_post_thumbnail( 'large', array( 'class' => 'single_main_thumb' ) ); ?>
				</div>
			<?php endif; ?>

			<div class="single_main_contents">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</main>
</div>

<?php get_footer(); ?>
