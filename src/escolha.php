<div class="escolhaInstitucional">
  <ul class="trabalho">
    <li><a class="<?php if ( is_page('tecnologia') ) { echo 'itemLateralActive'; } else { echo 'itemLateral'; }; ?>" href="<?php echo home_url( '/institucional/tecnologia' ); ?>">Tecnologia</a></li>
    <li><a class="<?php if ( is_page('produtos') ) { echo 'itemLateralActive'; } else { echo 'itemLateral'; }; ?>" href="<?php echo home_url( '/institucional/produtos' ); ?>">Produtos</a></li>
    <li><a class="<?php if ( is_page('certificacoes') ) { echo 'itemLateralActive'; } else { echo 'itemLateral'; }; ?>" href="<?php echo home_url( '/institucional/certificacoes' ); ?>">Prêmios e Certificações</a></li>
  </ul>
  <?php if (has_post_thumbnail()) { ?> <div class="imagemInstitucional"> <?php the_post_thumbnail( 'bannerProduto' ); ?></div><?php }; ?>
</div>
