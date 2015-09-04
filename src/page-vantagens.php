<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- <div class="metade"> -->
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>

					<?php
					$a = 1;
					while ($a <= 10) {

						echo '<div class="boxVan" id="box'. $a .'">';

								echo '<div class="icone acor'. $a .'"></div>';

								$boxObj = get_field_object('box'.$a);
								echo '<h2>'. $boxObj['label'] .'</h2>';
								the_field('box'.$a);

								$a++;

								echo '<div class="seta acorAberto"></div>';

						echo '</div>';

					}
						// the_field('box1');
					?>

				<!-- </div> -->

				<!-- <div class="metade">
					<?php the_post_thumbnail( 'full' ); ?>
				</div> -->

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
