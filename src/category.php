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

			<!-- <h1><?php single_cat_title(); ?></h1> -->

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<div class="thumbCtrlFicha">
				<!-- post thumbnail -->
				<div class="thumbEcontroles">

					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					<?php endif; ?>

					<ul class="fichaTecnica">
						<li><?php the_title(); ?></li>
					</ul>

				</div>
				<!-- /post thumbnail -->

			<!-- /thumbCtrlFicha -->
			</div>

			<?php endwhile; ?>
			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
