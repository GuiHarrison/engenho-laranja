<?php /* Template Name: Produtos */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- <h1><?php the_title(); ?></h1> -->

			<?php get_template_part(escolha); ?>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>
				<br class="clear">

				<?php
					$args = array('taxonomy' => 'tipo');
					$tax_tipos = get_categories( $args );
				?>

					<ul id="listaProdutos">
						<?php foreach ( $tax_tipos as $tax_tipo ): ?>
						<li class="cadaProduto">
							<a style="background-image: url('<?php the_field('imagem', $tax_tipo); ?>');" href="<?php echo get_term_link($tax_tipo,$tax_tipo->taxonomy); ?>">
								<?php

									echo
									'<h2>'. $tax_tipo->name. '</h2>'.
									'<p>'. $tax_tipo->description. '</p>';

									// echo '<img src="';
									// 	the_field('imagem', $tax_tipo);
									// echo '" alt="' . $tax_tipo->name . '">';

								?>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>

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
