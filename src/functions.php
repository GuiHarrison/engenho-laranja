<?php
/**
 * Author: Todd Motto | @toddmotto
 * URL: html5blank.com | @html5blank
 * Custom functions, support, custom post types and more.
 */

require_once "modules/is-debug.php";

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

require_once ($functions_path . "modules/theme-customizer.php");

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('boxHome', 379, 209, true); // Thumbnail pros boxes da home
    add_image_size('obras', 450, 215, true); // Obras realizadas
    add_image_size('bannerProduto', 1000, 200, true); // Obras realizadas

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

//Listar páginas filhas
// List child pages
function wpb_list_child_pages() {

global $post;
if ( is_page() && $post->post_parent )
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {
    $string = '<ul class="categoriasPre">' . $childpages . '</ul>';
}

return $string;
}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');


// Check for child pages
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;         // load details about this page
    $anc = get_post_ancestors( $post->ID );
    foreach($anc as $ancestor) {
        if(is_page() && $ancestor == $pid) {
            return true;
        }
    }
    if(is_page()&&(is_page($pid)))
               return true;   // we're at the page or at a sub page
    else
               return false;  // we're elsewhere
};

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        if (HTML5_DEBUG) {
            // jQuery
            wp_deregister_script('jquery');
            wp_register_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.js', array(), '1.11.1');

            // Conditionizr
            wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0');

            // Modernizr
            wp_register_script('modernizr', get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', array(), '2.8.3');

            // Ficha Técnica
            wp_register_script('slick', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick.min.js', array(), '1.0.0');

            // Ajax dos Produtos
            // wp_register_script('ajaxing', get_template_directory_uri() . '/js/ajaxing.js', array(), '1.0.0', true);

            // Custom scripts
            wp_register_script(
                'html5blankscripts',
                get_template_directory_uri() . '/js/scripts.js',
                array(
                    'jquery',
                    'conditionizr',
                    'modernizr',
                    'slick'),
                '1.0.0');

            // Enqueue Scripts
            wp_enqueue_script('html5blankscripts');

        // If production
        } else {
            // Scripts minify
            wp_register_script('html5blankscripts-min', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.0.0');
            // Enqueue Scripts
            wp_enqueue_script('html5blankscripts-min');
        }
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        // Conditional script(s)
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0');
        wp_enqueue_script('scriptname');
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    if (HTML5_DEBUG) {
        // normalize-css
        wp_register_style('normalize', get_template_directory_uri() . '/bower_components/normalize.css/normalize.css', array(), '3.0.1');

        // Custom CSS
        wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');

        // SLICK style
        wp_register_style('slickStyle', get_template_directory_uri() . '/css/slick.css', array(), '1.0');

        // SLICK theme
        wp_register_style('slickTheme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0');

        // Register CSS
        wp_enqueue_style('html5blank');
        wp_enqueue_style('slickTheme');
        wp_enqueue_style('slickStyle');
    } else {
        // Custom CSS
        wp_register_style('html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0');
        // Register CSS
        wp_enqueue_style('html5blankcssmin');
    }
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 7;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action('init', 'create_post_type_pre');
// add_action('init', 'create_post_type_obras');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_pre()
{
    register_taxonomy_for_object_type('tipo', 'produtos'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'produtos');
    register_post_type('produtos', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Produtos', 'produtos'), // Rename these to suit
            'singular_name' => __('Produto', 'produtos'),
            'add_new' => __('Adicionar', 'produtos'),
            'add_new_item' => __('Adicionar novo Produto', 'produtos'),
            'edit' => __('Editar', 'produtos'),
            'edit_item' => __('Editar Produto', 'produtos'),
            'new_item' => __('Novo Produto', 'produtos'),
            'view' => __('Ver Produto', 'produtos'),
            'view_item' => __('Ver Produto', 'produtos'),
            'search_items' => __('Procurar Produto', 'produtos'),
            'not_found' => __('nenhum Produto encontrado', 'produtos'),
            'not_found_in_trash' => __('nenhum Produtos encontrados na lixeira', 'produtos')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'tipoDeObra'
        ) // Add Category and Post Tags support
    ));
}

// hook into the init action and call cria_tipo_de_produto when it fires
add_action( 'init', 'cria_tipo_de_produto', 0 );

// create two taxonomies, genres and writers for the post type "book"
function cria_tipo_de_produto() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Tipos de produtos', 'taxonomy general name' ),
        'singular_name'     => _x( 'Tipo', 'taxonomy singular name' ),
        'search_items'      => __( 'Procurar por Tipos' ),
        'all_items'         => __( 'Todos os Tipos' ),
        'parent_item'       => __( 'Pai do Tipo' ),
        'parent_item_colon' => __( 'Tipo pai:' ),
        'edit_item'         => __( 'Editar Tipo' ),
        'update_item'       => __( 'Atualizar Tipo' ),
        'add_new_item'      => __( 'Adicionar novo Tipo' ),
        'new_item_name'     => __( 'Novo nome de tipo' ),
        'menu_name'         => __( 'Tipo de produto' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tipo' ),
    );

    register_taxonomy( 'tipo', array( 'produtos' ), $args );
}

// Muda nome do Posts para Obras
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Obras';
    $submenu['edit.php'][5][0] = 'Obras';
    $submenu['edit.php'][10][0] = 'Nova obra';
    $submenu['edit.php'][16][0] = 'Etiquetas de obras';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Obras';
    $labels->singular_name = 'Obra';
    $labels->add_new = 'Adicionar Obras';
    $labels->add_new_item = 'Adicionar Obras';
    $labels->edit_item = 'Editar Obras';
    $labels->new_item = 'Obras';
    $labels->view_item = 'Ver Obra';
    $labels->search_items = 'Procurar Obra';
    $labels->not_found = 'Nenhuma obra encontrado';
    $labels->not_found_in_trash = 'Nenhuma obra encontrado na lixeira';
    $labels->all_items = 'Todas as Obras';
    $labels->menu_name = 'Obras';
    $labels->name_admin_bar = 'Obras';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

// Create 1 Custom Post type for a Demo, called HTML5-Blank
// function create_post_type_obras()
// {
//     register_taxonomy_for_object_type('category', 'obras'); // Register Taxonomies for Category
//     register_taxonomy_for_object_type('post_tag', 'obras');
//     register_post_type('obras', // Register Custom Post Type
//         array(
//         'labels' => array(
//             'name' => __('Obras', 'obras'), // Rename these to suit
//             'singular_name' => __('Obra', 'obras'),
//             'add_new' => __('Adicionar', 'obras'),
//             'add_new_item' => __('Adicionar nova Obra', 'obras'),
//             'edit' => __('Editar', 'obras'),
//             'edit_item' => __('Editar Obra', 'obras'),
//             'new_item' => __('Nova Obra', 'obras'),
//             'view' => __('Ver Obra', 'obras'),
//             'view_item' => __('Ver Obra', 'obras'),
//             'search_items' => __('Procurar Obra', 'obras'),
//             'not_found' => __('nenhuma Obra encontrado', 'obras'),
//             'not_found_in_trash' => __('nenhuma Obras encontrados na lixeira', 'obras')
//         ),
//         'public' => true,
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'has_archive' => true,
//         'supports' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail'
//         ), // Go to Dashboard Custom HTML5 Blank post for supports
//         'can_export' => true, // Allows export in Tools > Export
//         'taxonomies' => array() // Add Category and Post Tags support
//     ));
// }

/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}
