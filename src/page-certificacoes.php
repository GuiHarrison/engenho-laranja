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

				<h1>Certificações</h1>

					<div class="grupoPremios">

							<?php
							// check if the repeater field has rows of data
							if( have_rows('cert') ):
							 	// loop through the rows of data
							    while ( have_rows('cert') ) : the_row();
									$logoCert = get_sub_field('logo');

									echo '<div class="cadaPremio">';

							        // display a sub field value
							        echo '<h4>';
												the_sub_field('titulo');
											echo '</h4>';

											echo '<div class="contemLogo"><span class="helper"></span><img src="' . $logoCert . '" alt=""></div>';

									echo '</div>';
							    endwhile;
							endif;
							?>

					</div>

					<div class="certificacaoMor">
						<h4>Selo Azul <br> Caixa Econômica Federal</h4>
						<div class="logoEtexto">
							<img src="<?php echo get_template_directory_uri(); ?>/img/selo-azul-caixa.png" alt="">
							<p>primeira empresa brasileira a construir e certificar um empreendimento pelo programa MCMV com o Selo Azul da Caixa</p>
						</div>
					</div>

				<h1>Premiações e reconhecimentos</h1>

				<div class="grupoPremios">

						<?php
						// check if the repeater field has rows of data
						if( have_rows('prem') ):
							// loop through the rows of data
								while ( have_rows('prem') ) : the_row();
								$logoPrem = get_sub_field('logo');

								echo '<div class="cadaPremio">';

										// display a sub field value
										echo '<h4>';
											the_sub_field('titulo');
										echo '</h4>';

										echo '<div class="contemLogo"><span class="helper"></span><img src="' . $logoPrem . '" alt=""></div>';

								echo '</div>';
								endwhile;
						endif;
						?>

				</div>

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
