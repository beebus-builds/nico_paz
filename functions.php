<?php

define('NICOPAZ_VERSION', '1.0.0');

require_once get_template_directory() . '/inc/nav-walker.php';

if (!function_exists('nicopaz_setup')) :
    function nicopaz_setup()
    {
        load_theme_textdomain('nicopaz', get_template_directory() . '/languages');

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo', [
            'height'      => 80,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        ]);
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);
        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');

        register_nav_menus([
            'primary' => __('Main Menu', 'nicopaz'),
            'footer'  => __('Footer Menu', 'nicopaz'),
            'social'  => __('Social Links', 'nicopaz'),
        ]);

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        add_image_size('nicopaz-hero', 1920, 1080, true);
        add_image_size('nicopaz-product', 600, 750, true);
        add_image_size('nicopaz-gallery', 800, 600, true);
    }
endif;
add_action('after_setup_theme', 'nicopaz_setup');

function nicopaz_content_width()
{
    $GLOBALS['content_width'] = apply_filters('nicopaz_content_width', 1280);
}
add_action('after_setup_theme', 'nicopaz_content_width', 0);

function nicopaz_scripts()
{
    $css_file = get_template_directory() . '/assets/css/style.css';
    $css_version = file_exists($css_file) ? filemtime($css_file) : NICOPAZ_VERSION;

    wp_enqueue_style('nicopaz-tailwind', get_template_directory_uri() . '/assets/css/style.css', [], $css_version);
    wp_enqueue_style('nicopaz-google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&family=Dancing+Script:wght@500;600;700&display=swap', [], null);

    wp_enqueue_script('nicopaz-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], NICOPAZ_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_localize_script('nicopaz-navigation', 'nicopazData', [
        'ajaxUrl'  => admin_url('admin-ajax.php'),
        'siteUrl'  => get_site_url(),
    ]);
}
add_action('wp_enqueue_scripts', 'nicopaz_scripts');

function nicopaz_widgets_init()
{
    register_sidebar([
        'name'          => __('Sidebar', 'nicopaz'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'nicopaz'),
        'before_widget' => '<section id="%1$s" class="widget %2$s bg-white dark:bg-gray-950 rounded-xl p-6 border border-gray-100 dark:border-gray-800 mb-6">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title font-heading text-lg font-bold mb-4">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => __('Footer Widgets', 'nicopaz'),
        'id'            => 'footer-widgets',
        'description'   => __('Add footer widgets here.', 'nicopaz'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-heading text-lg font-bold mb-4 text-nico-dark dark:text-white">',
        'after_title'   => '</h4>',
    ]);

    if (class_exists('WooCommerce')) {
        register_sidebar([
            'name'          => __('Shop Sidebar', 'nicopaz'),
            'id'            => 'shop-sidebar',
            'description'   => __('Add widgets to the shop archive pages.', 'nicopaz'),
            'before_widget' => '<div id="%1$s" class="widget %2$s bg-white dark:bg-gray-950 rounded-xl p-5 border border-gray-100 dark:border-gray-800 mb-4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="font-heading text-base font-bold mb-3">',
            'after_title'   => '</h3>',
        ]);
    }
}
add_action('widgets_init', 'nicopaz_widgets_init');

function nicopaz_custom_logo_output($html)
{
    if (empty($html)) {
        $html = sprintf(
            '<a href="%1$s" class="custom-logo-link font-heading text-2xl font-black text-nico-dark dark:text-white" rel="home">%2$s</a>',
            esc_url(home_url('/')),
            __('NICO PAZ', 'nicopaz')
        );
    }
    return $html;
}
add_filter('get_custom_logo', 'nicopaz_custom_logo_output');

function nicopaz_body_classes($classes)
{
    if (is_singular()) {
        $classes[] = 'singular';
    }
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }
    return $classes;
}
add_filter('body_class', 'nicopaz_body_classes');

function nicopaz_woocommerce_cart_count()
{
    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    return $count;
}

function nicopaz_language_switcher()
{
    if (function_exists('pll_the_languages')) {
        $languages = pll_the_languages(['raw' => true]);
        if (!empty($languages)) {
            echo '<div class="flex items-center gap-1">';
            foreach ($languages as $lang) {
                $current = $lang['current_lang'] ? 'bg-nico-dark/10 dark:bg-white/20 text-nico-dark dark:text-white' : 'text-nico-dark/50 dark:text-white/50 hover:text-nico-dark dark:hover:text-white';
                printf(
                    '<a href="%s" class="px-2 py-1 rounded text-sm font-semibold uppercase transition-colors %s" aria-label="%s">%s</a>',
                    esc_url($lang['url']),
                    $current,
                    esc_attr($lang['name']),
                    esc_html(strtoupper($lang['slug']))
                );
            }
            echo '</div>';
        }
    }
}

add_filter('woocommerce_add_to_cart_fragments', 'nicopaz_cart_fragment');
function nicopaz_cart_fragment($fragments)
{
    ob_start();
    nicopaz_cart_icon();
    $fragments['.cart-icon-wrap'] = ob_get_clean();
    return $fragments;
}

function nicopaz_cart_icon()
{
    $count = nicopaz_woocommerce_cart_count();
?>
    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-icon-wrap relative p-2 text-nico-dark dark:text-gray-100 hover:text-argentina-blue dark:hover:text-white transition-colors" aria-label="<?php esc_attr_e('View cart', 'nicopaz'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <?php if ($count > 0) : ?>
            <span class="absolute -top-1 -right-1 bg-nico-dark dark:bg-white text-white dark:text-nico-dark text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center" id="nicopaz-cart-count">
                <?php echo esc_html($count); ?>
            </span>
        <?php endif; ?>
    </a>
<?php
}

function nicopaz_ajax_cart_count()
{
    if (class_exists('WooCommerce')) {
        wp_send_json(['count' => WC()->cart ? WC()->cart->get_cart_contents_count() : 0]);
    }
    wp_send_json(['count' => 0]);
}
add_action('wp_ajax_nicopaz_cart_count', 'nicopaz_ajax_cart_count');
add_action('wp_ajax_nopriv_nicopaz_cart_count', 'nicopaz_ajax_cart_count');

add_filter('woocommerce_output_related_products_args', function ($args) {
    $args['posts_per_page'] = 4;
    $args['columns']        = 4;
    return $args;
});
