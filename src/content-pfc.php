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
				<?php
					if (get_field('empreendimento')) {
						while(has_sub_field('empreendimento')) {
							echo '<div class="englobaFicha">';
								echo '<div class="thumbEcontroles">';

									$foto = get_sub_field('foto');
									echo '<img src="' . $foto[url] . '" alt="' . $foto[alt] . '">';

									echo '<div class="ctrl prev"><a href="#" rel="prev"></a></div>';
									echo '<div class="ctrl next"><a href="#" rel="next"></a></div>';

								echo '</div>';
				?>

							<ul class="fichaTecnica">
								<li>
									<h3>Ficha Técnica</h3>
								</li>

								<?php
										if (get_sub_field('ficha-tecnica')) {
											while ( has_sub_field( 'ficha-tecnica' )) {
												echo '<li>' . get_sub_field('dado') . '</li>';
											}
										}
							echo '</ul>';
				echo '</div>';
						}
					}
				?>
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