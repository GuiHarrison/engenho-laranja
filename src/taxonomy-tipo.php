<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php
			$args = array('taxonomy' => 'tipo');
			$tax_tipos = get_categories( $args );
		?>
		<ul id="listaProdutosIn">
			<?php foreach ( $tax_tipos as $tax_tipo ): ?>
			<li class="cadaProdutoIn">
				<a href="<?php echo get_term_link($tax_tipo,$tax_tipo->taxonomy); ?>">
					<?php echo $tax_tipo->name; ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>

			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if (have_posts()): while (have_posts()) : the_post();?>

					<div class="cadaProduto">

						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
							<?php the_post_thumbnail('boxHome'); // Declare pixel size you need inside the array ?>
						<?php endif; ?>
						<!-- /post thumbnail -->

						<!-- post title -->
						<h3 class="fichaTecnica"> <?php the_title(); ?> </h3>
						<!-- /post title -->

						<?php //html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

					</div>

				<?php endwhile; ?>

			<!-- /article -->


			<?php else: ?>

				<!-- article -->
					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				<!-- /article -->

			<?php endif; ?>

			<?php get_template_part('pagination'); ?>

			</article>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
