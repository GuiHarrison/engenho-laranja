<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="chamadasHome">

			<?php
			$SHPquery = new WP_Query(
				array(
					'posts_per_page' => '2',
					'post_type' => 'produtos',
					'meta_query' => array(
						array(
							'key' => 'destacar',
							'value' => '"Sim"',
							'compare' => 'LIKE'
							)
						)
				)
			);

			if ($SHPquery->have_posts()) {
				while ( $SHPquery->have_posts() ) : $SHPquery->the_post();

				echo '<div class="caixasHome">';

							if (the_post_thumbnail( 'boxHome' )) {
								the_post_thumbnail( 'boxHome' );
							}
							

							echo '<div class="flamula-home">';
								echo array_shift(wp_get_post_terms( $post->ID, 'tipo', array('fields' => 'names') ));
							echo '</div>';

							echo '<h4>';
								the_title();
							echo '</h4>';

					echo '</div>';
				endwhile;
			};
			?>

			<div id="ctaFaleConosco">
				<?php
					if (wp_is_mobile()) {
						echo '<img class="mobile" src="' . get_template_directory_uri() . '/img/ctamarelo.jpg" alt="Fale Conosco">';
					} else {
						echo '<img class="desktop" src="' . get_template_directory_uri() . '/img/faleConosco.jpg" alt="Fale Conosco">';
					}
				?>
			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
