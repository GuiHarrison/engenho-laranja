<?php

/**
 * Create our panels and sections.
 */
function kirki_precon_panels_sections( $wp_customize ) {
  /**
   * Add panels
   */
  $wp_customize->add_panel( 'backgrounds', array(
    'priority'    => 10,
    'title'       => __( '', 'precon' ),
  ) );

  $wp_customize->add_section( 'contato', array(
    'title'       => __( 'Formas de Contato', 'precon' ),
    'priority'    => 1,
  ) );

  $wp_customize->add_section( 'redes-sociais', array(
    'title'       => __( 'Redes Sociais', 'precon' ),
    'priority'    => 2,
  ) );

  $wp_customize->add_section( 'analytics', array(
    'title'       => __( 'Google Analytics', 'precon' ),
    'priority'    => 3,
  ) );

}
add_action( 'customize_register', 'kirki_precon_panels_sections' );


/**
 * Add our controls.
 */
function kirki_precon_fields( $fields ) {

  $fields[] = array(
      'type'        => 'text',
      'setting'     => 'telefone',
      'label'       => __( 'Telefone', 'precon' ),
      'description' => __( 'Telefone, com DDD', 'precon' ),
      'section'     => 'contato',
      'default'     => '(31) 0000 0000',
      'priority'    => 10,
  );

  $fields[] = array(
      'type'        => 'text',
      'setting'     => 'email',
      'label'       => __( 'E-mail', 'precon' ),
      'section'     => 'contato',
      'default'     => 'contato@precon.net',
      'priority'    => 10,
  );

$fields[] = array(
      'type'        => 'text',
      'setting'     => 'facebook',
      'label'       => __( 'Facebook', 'precon' ),
      'description' => __( 'Link do facebook, includindo http://', 'precon' ),
      'section'     => 'redes-sociais',
      'default'     => '',
      'priority'    => 10,
  );

$fields[] = array(
      'type'        => 'text',
      'setting'     => 'linkedin',
      'label'       => __( 'lindedin', 'precon' ),
      'description' => __( 'Link do twitter, includindo http://', 'precon' ),
      'section'     => 'redes-sociais',
      'default'     => 'https://www.twitter.com/precon',
      'priority'    => 10,
  );

$fields[] = array(
      'type'        => 'textarea',
      'setting'     => 'analytics',
      'label'       => __( 'Código do Google Anatytics', 'precon' ),
      'description' => __( 'http://www.google.com/analytics/', 'precon' ),
      'section'     => 'analytics',
      'default'     => '',
      'priority'    => 10,
  );


  return $fields;

}
add_filter( 'kirki/fields', 'kirki_precon_fields' );

//customização da página de customização
function kirki_precon_configuration() {

    $args = array(
        'logo_image'   => get_template_directory_uri() . '/img/logo.svg',
        'url_path'     => $url,
        'color_accent' => '#dd5c26',
        'color_back'   => '#61a08d',
        'textdomain'   => 'kirki',
        'i18n'         => $strings,
    );

    return $args;

}

add_filter( 'kirki/config', 'kirki_precon_configuration' );


/**
 * Custom CSS
 */
function kirki_precon_custom_css() {

  // Early exit if Kirki is not installed
  if ( ! function_exists( 'kirki_get_option' ) ) {
    return;
  }

  // Add custom CSS for layouts
  $css = '';
  if ( 'full' == kirki_get_option( 'layout' ) ) {
    $css .= '#primary{width:100%;}';
  } elseif ( 'left-sidebar' == kirki_get_option( 'layout' ) ) {
    $css .= '#primary{float:right;}#secondary{float:left;}';
  }

  wp_add_inline_style( 'precon-style', $css );

}
add_action( 'wp_enqueue_scripts', 'kirki_precon_custom_css' );


?>