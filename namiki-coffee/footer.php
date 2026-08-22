	<!-- ▼▼▼ footer  ▼▼▼ -->
	<footer class="l-footer">
		<h1 class="l-footer-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l_footer-logo_link">
				<img
					src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/img_logo.png"
					alt="<?php bloginfo( 'name' ); ?>ロゴ"
					class="l-footer-logo-img"
				/>
			</a>
		</h1>
		<p class="l-copyright">&copy; <?php echo esc_html( date( 'Y' ) ); ?> NAMIKI. All Rights Reserved.</p>
	</footer>
	<!-- ▲▲▲ footer ここまで ▲▲▲ -->

	<?php wp_footer(); ?>
</body>
</html>
