<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<ul id="categoriasPre">
		<?php wp_list_pages('child_of=14&ehco=1&title_li='); ?>
	</ul>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div id="thumbCtrlFicha">
				<!-- post thumbnail -->
				<div class="thumbEcontroles">

					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					<?php endif; ?>
					
					<div class="ctrl prev"><?php previous_post_link( '%link', '<', TRUE ); ?></div>
				
					<div class="ctrl next"><?php next_post_link( '%link', '>', TRUE ); ?></div>

				</div>
				<!-- /post thumbnail -->

				<ul class="fichaTecnica">
					<li>
						<h3>Ficha Técnica</h3>
					</li>
					<?php if (get_field('ficha_tecnica')) {
						while(has_sub_field('ficha_tecnica')) {

							$fichaDados = get_sub_field('dado');
							echo '<li>' . $fichaDados . '</li>';
						}
					} ?>
					<?php get_sub_field("dado") ?>
				</ul>
			<!-- /thumbCtrlFicha -->
			</div>

			<div id="tituloEtexto">

				<!-- post title -->
				<h1><?php the_title(); ?></h1>

				<?php the_content(); // Dynamic Content ?>

				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

			</div>

		</article>
		<!-- /article -->

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
