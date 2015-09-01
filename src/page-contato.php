<?php get_header(); ?>

<main role="main">
	<!-- section -->
	<section>

		<h1><?php the_title(); ?></h1>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_content(); ?>
			<div class="telefoneContato">
				<h3>
					<span>(31)</span>
					<?php if (kirki_get_option( 'telefone' )) { echo kirki_get_option( 'telefone' );} ?>
				</h3>
				<a class="email" href="mailto:comunicacao@preconengenharia.com.br" target="_blank">comunicacao@preconengenharia.com.br</p>
			</a>
			<br class="clear">
			<?php edit_post_link(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
