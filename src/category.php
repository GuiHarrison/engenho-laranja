<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php
			$terms = get_terms('category');

			echo '<ul id="categoriasPre">';
			foreach ( $terms as $term ) {

			    $term_link = get_term_link( $term );
					$term_link_parse = parse_url($term_link);

			    if ( $term_link_parse[path] == $_SERVER['REQUEST_URI'] ) {
			    	echo '<li><a class="catAtual" href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
			    } elseif ( $term->term_id !== '1' ) {
				    echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name .'</a></li>';
			    }
			}
			echo '</ul>';
		 ?>

			<h1><?php single_cat_title(); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<div class="thumbCtrlFicha">
					<?php
							echo '<div class="englobaFicha">';

								echo '<div class="thumbEcontroles">';

											if (get_field('repetimagem')) {
												while(has_sub_field('repetimagem')) {

													$foto = get_sub_field('foto');
													echo '<img src="' . $foto[url] . '" alt="' . $foto[alt] . '">';

												}
											}

								echo '</div>';

								// echo
								// '<div class="controles">'.
									// '<div class="ctrl prev"><a href="#" rel="prev"></a></div>'.
									// '<div class="ctrl next"><a href="#" rel="next"></a></div>'.
								// '</div>';

							echo '</div>';
							echo '<h3 class="fichaTecnica">'. get_the_title() .'</h3>';
					?>
				<!-- /thumbCtrlFicha -->
				</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
