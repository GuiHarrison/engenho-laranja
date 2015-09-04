		</div>
		<!-- /wrapper -->

			<div class="clear"></div>
			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<section class="laranja">
					<div class="wrapper">
						<ul id="mapaSite">

							<li id="menuInstitucional" class="footerMenu institucional">
								<a href="<?php echo home_url(); ?>/institucional/epc/"><h4>Soluções Construtivas</h4></a>
								<ul>
									<li><a href="<?php echo home_url(); ?>/institucional/epc/#ffs-tabbed-431">Tecnologia</a></li>
									<li><a href="<?php echo home_url(); ?>/institucional/epc/#ffs-tabbed-432">Produtos</a></li>
									<li><a href="<?php echo home_url(); ?>/institucional/epc/#ffs-tabbed-433">Prêmios e certificações</a></li>
								</ul>
							</li>

							<li id="menuVantagens" class="footerMenu vantagens">
								<a href="<?php echo home_url(); ?>/vantagens"><h4>Vantagens</h4></a>
							</li>

							<li id="menuObras" class="footerMenu obrasRealizadas">
								<a href="<?php post_permalink(); ?>"><h4>Obras Realizadas</h4></a>
								<ul>
									<li><a href="<?php echo home_url(); ?>/cagegory/obras">Obras Especiais</a></li>
									<li><a href="<?php echo home_url(); ?>/cagegory/infra">Infraestrutura</a></li>
									<li><a href="<?php echo home_url(); ?>/cagegory/comercial">Comercial / Institucional</a></li>
									<li><a href="<?php echo home_url(); ?>/cagegory/industrial">Industrial</a></li>
									<li><a href="<?php echo home_url(); ?>/cagegory/supermercados">Supermercados e CD's</a></li>
								</ul>
							</li>

							<li id="menuSustentabilidade" class="footerMenu sustentabilidade">
								<a href="<?php echo home_url() . '/sustentabilidade'; ?>">
									<h4>Sustentabilidade</h4>
								</a>
							</li>
						</ul>

						<div class="telefone">
							<h3>
								<span>(31)</span>
								<?php if (kirki_get_option( 'telefone' )) { echo kirki_get_option( 'telefone' );} ?>
							</h3>
							<!-- <a class="email" href="mailto:comunicacao@preconengenharia.com.br" target="_blank">comunicacao@preconengenharia.com.br</p> -->
							<a class="faleConosco" href="<?php echo home_url() . '/contato'; ?>">Fale Conosco</a>
							<p>Acompanhe a Precon nas redes sociais</p>
							<div class="redesSociais">
								<a class="cadaRede facebook" target="_blank" href="https://www.facebook.com/preconengenharia?ref=ts&fref=ts"><?php echo get_template_part( 'img/icons/social', 'facebook.svg' ); ?></a>
								<a class="cadaRede linkedin" target="_blank" href="https://www.linkedin.com/company/119936?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A119936%2Cidx%3A2-3-6%2CtarId%3A1438349438452%2Ctas%3Aprecon"><?php echo get_template_part( 'img/icons/social', 'linkedin.svg' ); ?></a>
								<a class="cadaRede instagram" target="_blank" href="https://instagram.com/preconengenharia/"><?php echo get_template_part( 'img/icons/social', 'instagram.svg' ); ?></a>
							</div>
						</div>
					</div>
				</section>
				<section class="preto">
					<div class="wrapper">
						<!-- copyright -->
						<p class="copyright">
							&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'html5blank'); ?>
							<a href="//ingagedigital.com.br" target="_blank" title="Ingage Digital">Ingage Digital</a>.
						</p>
						<!-- /copyright -->
					</div>
				</section>


			</footer>
			<!-- /footer -->

		<?php wp_footer(); ?>

		<?php  if (!is_page("home")) { ?>
		<script>

			(function( root, $, undefined ) {
				'use strict';
				$(function () {

					var testePage = '<?php if (is_page("epc")) {echo "first-child";} elseif (is_page("vantagens")) {echo "nth-child(2)";} elseif (is_page("obras-realizadas") || is_single() || is_category()) { echo "nth-child(3)"; } elseif (is_page("sustentabilidade")) {echo "nth-child(4)";} ?>';
					$('#menuPrincipal .boxPreto:'+testePage).addClass('boxAtual');

				});
			} ( this, jQuery ));

		</script>
		<?php } ?>

		<!-- <?php if (is_page("obras-realizadas") || is_category()) { ?>
			<script>
				var testeCat = '<?php if (is_category("comercial")) {echo "first-child";} elseif (is_category("escolas")) {echo "nth-child(2)";} elseif (is_category("industrial")) { echo "nth-child(3)"; } elseif (is_category("infra")) {echo "nth-child(4)";} elseif (is_category("obras-especiais")) {echo "nth-child(5)";} else {echo "last-child";} ?>';
				$('#categoriasPre li:'+testeCat+' a').addClass('catAtual');
			</script>
		<?php } ?> -->

		<!-- analytics -->
<!-- 		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script> -->

	</body>
</html>
