<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>


			<!-- header -->
			<header class="header clear <?php if (wp_is_mobile()) { echo 'menuAberto'; } ?>" role="banner">

				<div class="wrapper">
				<div class="barraDeCima">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->
					<!-- menu para escolher portal -->
					<ul class="qualPortal">
						<li><a href="<?php echo home_url(); ?>/institucional/epc/lage">Pré-fabricado de concreto</a></li>
						<li><a href="">linha habitacional</a></li>
						<li><a href="">venda de imóveis</a></li>
					</ul>
					<!-- /menu para escolher portal -->

					<!-- telefone -->
					<div id="telefoneHead"><h2><span>(31)</span> <?php if (kirki_get_option( 'telefone' )) { echo kirki_get_option( 'telefone' );} ?></h2></div>

					<!-- nav
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->

				</div>
				</div>

				<div class="header__menu">
				  <a id="header__button" class="hamburger" href="#">
				    <div class="hamburger__inner"></div>
				  </a>
				</div>

				<div class="<?php if (wp_is_mobile()) { echo 'menuMobile'; } else { echo 'barraDeBaixo'; } ?>">

					<ul id="menuPrincipal">
						<li class="boxPreto">
							<a href="<?php echo home_url(); ?>/institucional/epc/" class="cadaItem" id="itemMenu1">
								<span class="icone menu1"></span>
								<span class="iconeL itemLaranja1"></span>
								<h3 class="menuTitulo">Soluções Construtivas</h3>
							<hr>
								<p class="menuDesc">Seu lar entregue no prazo certo.</p>
								<span class="saibaMais">SAIBA MAIS</span>
								<span class="setinhaDireita"></span>
							</a>
						</li>

						<li class="boxPreto">
							<a href="<?php echo home_url(); ?>/vantagens" class="cadaItem" id="itemMenu2">
								<span class="icone menu2"></span>
								<span class="iconeL itemLaranja2"></span>
								<h3 class="menuTitulo">Vantagens</h3>
							<hr>
								<p class="menuDesc">Total controle de qualidade da obra.</p>
								<span class="saibaMais">SAIBA MAIS</span>
								<span class="setinhaDireita"></span>
							</a>
						</li>

						<li class="boxPreto">
							<a href="<?php echo home_url(); ?>/obras-realizadas/" class="cadaItem" id="itemMenu3">
								<span class="icone menu3"></span>
								<span class="iconeL itemLaranja3"></span>
								<h3 class="menuTitulo">Obras realizadas</h3>
							<hr>
								<p class="menuDesc">Conheça o diferencial do nosso trabalho.</p>
								<span class="saibaMais">SAIBA MAIS</span>
								<span class="setinhaDireita"></span>
							</a>
						</li>
					</ul>

				</div>

				<script>
				  (function(d) {
				    var config = {
				      kitId: 'fug8vxk',
				      scriptTimeout: 3000
				    },
				    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
				  })(document);
				</script>

			</header>
			<!-- /header -->

		<!-- wrapper -->
		<div class="wrapper">

			<?php if (!is_page('home') && !is_tax('tipo') ) { the_breadcrumb(); } elseif (is_tax('tipo')) {
				echo '<ul id="breadcrumbs">
					<li><a href="'. home_url() .'">Home</a></li>
					<li class="separator">></li>
					<li>institucional</li>
					<li class="separator">></li>
					<li><a href="'. home_url() .'/institucional/produtos">Produtos</a></li>
				</ul>';
			} ?>
