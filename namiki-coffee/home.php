<?php
/**
 * home.php
 * 「表示設定」で投稿ページ（投稿一覧）に指定した固定ページに使われるテンプレート。
 * news.html（お知らせ一覧）のデザインを再現しています。
 */

get_header();
?>

<main class="main">
	<h1 class="top-title"><?php single_post_title(); ?></h1>

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
							<!-- /.post_meta -->
							<h2 class="post_title"><?php the_title(); ?></h2>
						</div>
						<!-- /.post_content -->
					</a>
					<!-- /.post_link -->
				</article>
			</div>
			<!-- /.posts -->
		<?php endwhile; ?>

		<?php namiki_pagination(); ?>

	<?php else : ?>

		<div class="posts">
			<p>現在お知らせはありません。</p>
		</div>

	<?php endif; ?>
</main>

<?php get_footer(); ?>
