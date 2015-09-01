<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- post title -->
				<h1><?php the_title(); ?></h1>

				<?php the_content(); // Dynamic Content ?>

				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

		</article>
		<!-- /article -->
		
		<a href="<?php echo get_home_url() . '/category/obras-especiais'; ?>" class="caixasObras" style="background-image: url(<?php echo get_field('obras_especiais'); ?>)">
			<h4>Obras Especiais</h4>
		</a>

		<a href="<?php echo get_home_url() . '/category/infra'; ?>" class="caixasObras" style="background-image: url(<?php echo get_field('infraestrutura'); ?>)">
			<h4>Infraestrutura</h4>
		</a>

		<a href="<?php echo get_home_url() . '/category/comercial'; ?>" class="caixasObras" style="background-image: url(<?php echo get_field('comercial/institucional'); ?>)">
			<h4>Comercial/Insitucional</h4>
		</a>

		<a href="<?php echo get_home_url() . '/category/industrial'; ?>" class="caixasObras" style="background-image: url(<?php echo get_field('industrial'); ?>)">
			<h4>Industrial</h4>
		</a>

		<a href="<?php echo get_home_url() . '/category/super'; ?>" class="caixasObras" style="background-image: url(<?php echo get_field('supermercados_e_cds'); ?>)">
			<h4>Supermercados e CD's</h4>
		</a>

		<a href="<?php echo get_home_url() . '/category/escolas'; ?>" class="caixasObras" style="background-image: url(<?php echo get_field('escolas'); ?>)">
			<h4>Escolas</h4>
		</a>

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
