<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white dark:bg-black min-h-screen flex flex-col overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>

<div id="page">
    <header id="masthead" class="site-header bg-white/95 dark:bg-black/95 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 dark:border-gray-900">
        <div class="container-main">
            <div class="flex items-center justify-between h-16 md:h-20">

                <div class="site-branding flex-shrink-0">
                    <?php the_custom_logo(); ?>
                </div>

                <nav id="site-navigation" class="main-navigation hidden lg:flex items-center justify-end flex-1 min-w-0 ml-8 gap-4 xl:gap-6" aria-label="<?php esc_attr_e('Main Navigation', 'nicopaz'); ?>">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'menu_class'     => 'flex items-center gap-4 xl:gap-6 list-none m-0 p-0',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'walker'         => new NicoPaz_Nav_Walker(),
                        ]);
                    } else {
                        $fallback_items = [
                            __('Home', 'nicopaz')       => home_url('/'),
                            __('Shop', 'nicopaz')       => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop'),
                            __('About', 'nicopaz')      => '#about',
                            __('Gallery', 'nicopaz')    => '#gallery',
                            __('Contact', 'nicopaz')    => '#contact',
                        ];
                        echo '<ul class="flex items-center gap-4 xl:gap-6 list-none m-0 p-0">';
                        foreach ($fallback_items as $label => $url) {
                            printf(
                                '<li><a href="%s" class="text-xs xl:text-sm uppercase tracking-normal xl:tracking-wider text-nico-dark dark:text-gray-100 font-medium hover:text-celeste dark:hover:text-white transition-colors py-2">%s</a></li>',
                                esc_url($url),
                                esc_html($label)
                            );
                        }
                        echo '</ul>';
                    }
                    ?>
                </nav>

                <div class="flex items-center gap-4">
                    <?php if (class_exists('WooCommerce')) : ?>
                        <?php nicopaz_cart_icon(); ?>
                    <?php endif; ?>

                    <?php nicopaz_language_switcher(); ?>

                    <button id="theme-toggle" class="p-2 text-nico-dark dark:text-gray-100 hover:text-celeste dark:hover:text-white transition-colors" aria-label="<?php esc_attr_e('Toggle dark mode', 'nicopaz'); ?>">
                        <svg id="theme-icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <svg id="theme-icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                    </button>

                    <button id="mobile-menu-toggle" class="lg:hidden p-2 text-nico-dark dark:text-gray-100 hover:text-celeste dark:hover:text-white transition-colors" aria-label="<?php esc_attr_e('Toggle menu', 'nicopaz'); ?>" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <div id="mobile-menu" class="lg:hidden hidden bg-white dark:bg-black border-t border-gray-100 dark:border-gray-900 max-h-[80vh] overflow-y-auto overscroll-contain">
            <div class="container-main py-4">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex flex-col list-none m-0 p-0',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'walker'         => new NicoPaz_Nav_Walker(),
                    ]);
                }
                ?>
            </div>
        </div>
    </header>

    <!-- Decorative Nepal flag accent (floating, fixed bottom-right) -->
    <div class="hidden md:block fixed bottom-6 right-6 z-40 w-32 h-20 lg:w-40 lg:h-24 pointer-events-none drop-shadow-2xl opacity-90" aria-hidden="true">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/argentina-flag.svg'); ?>"
             alt=""
             class="w-full h-full object-contain animate-float">
    </div>

    <div id="content" class="site-content flex-1">
