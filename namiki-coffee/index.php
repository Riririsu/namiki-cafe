<?php
/**
 * index.php
 * WordPressが必須とするフォールバックテンプレート。
 * 通常はこのテーマでは front-page.php / home.php / single.php が優先して使われます。
 */

get_header();
?>

<main class="main">
	<h1 class="top-title"><?php is_home() ? single_post_title() : the_title(); ?></h1>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="posts">
				<article class="post">
					<a href="<?php the_permalink(); ?>" class="post_link">
						<div class="post_content">
							<div class="post_meta">
								<time class="post_meta-date"><?php namiki_the_date_dot(); ?></time>
								<span class="post_meta-cat"><?php namiki_the_category_label(); ?></span>
							</div>
							<h2 class="post_title"><?php the_title(); ?></h2>
						</div>
					</a>
				</article>
			</div>
		<?php endwhile; ?>

		<?php namiki_pagination(); ?>
	<?php else : ?>
		<div class="posts">
			<p>コンテンツが見つかりませんでした。</p>
		</div>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
