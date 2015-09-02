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

		<?php
			$terms = get_terms('category');

			echo '<ul id="listaObras">';

			foreach ( $terms as $term ) {

				echo '<li class="cadaObra">';

					$term_link = get_term_link( $term );
					$i = 0;

					if ( $term->term_id !== '1' ) {

						echo '<a style="background-image: url('. get_field($term->slug) .')" href="' . esc_url( $term_link ) . '">' . '<h2>' . $term->name . '</h2>' . '<p>'. $term->description . '</p>' . '</a>';
					}

				echo '</li>';
			}

			echo '</ul>';
		 ?>

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
