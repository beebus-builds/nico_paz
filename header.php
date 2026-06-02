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

<a class="skip-link" href="#content"><?php esc_html_e('Skip to main content', 'nicopaz'); ?></a>

<div id="page">
    <header id="site-navbar" class="site-navbar">
        <div class="navbar-inner container-main">
            <!-- Brand -->
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link" aria-label="<?php esc_attr_e('Home', 'nicopaz'); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/crest.svg'); ?>"
                         alt=""
                         class="brand-crest">
                    <span class="brand-text">
                        NICO<span class="brand-dot"> · </span>PAZ
                    </span>
                </a>
            </div>

            <!-- Primary nav -->
            <nav id="site-navigation" class="main-nav hidden lg:flex" aria-label="<?php esc_attr_e('Main Navigation', 'nicopaz'); ?>">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-list',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'walker'         => new NicoPaz_Nav_Walker(),
                    ]);
                } else {
                    $fallback_items = [
                        __('Home', 'nicopaz')    => home_url('/'),
                        __('About', 'nicopaz')   => home_url('/about'),
                        __('Gallery', 'nicopaz') => home_url('/gallery'),
                        __('Shop', 'nicopaz')    => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop'),
                        __('Contact', 'nicopaz') => home_url('/contact'),
                    ];
                    echo '<ul class="nav-list">';
                    foreach ($fallback_items as $label => $url) {
                        printf(
                            '<li><a href="%s" class="nav-link">%s</a></li>',
                            esc_url($url),
                            esc_html($label)
                        );
                    }
                    echo '</ul>';
                }
                ?>
            </nav>

            <!-- Actions -->
            <div class="navbar-actions">
                <?php if (class_exists('WooCommerce')) : ?>
                    <?php nicopaz_cart_icon(); ?>
                <?php endif; ?>

                <button id="theme-toggle" class="navbar-icon-btn" aria-label="<?php esc_attr_e('Toggle dark mode', 'nicopaz'); ?>">
                    <svg id="theme-icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <svg id="theme-icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                <?php nicopaz_language_switcher(); ?>

                <button id="mobile-menu-toggle" class="lg:hidden navbar-icon-btn" aria-label="<?php esc_attr_e('Toggle menu', 'nicopaz'); ?>" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile menu drawer -->
    <div id="mobile-menu" class="mobile-menu hidden lg:hidden">
        <div class="container-main py-6">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class'     => 'mobile-nav-list',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'walker'         => new NicoPaz_Nav_Walker(),
                ]);
            } else {
                $fallback_items = [
                    __('Home', 'nicopaz')    => home_url('/'),
                    __('About', 'nicopaz')   => home_url('/about'),
                    __('Gallery', 'nicopaz') => home_url('/gallery'),
                    __('Shop', 'nicopaz')    => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop'),
                    __('Contact', 'nicopaz') => home_url('/contact'),
                ];
                echo '<ul class="mobile-nav-list">';
                foreach ($fallback_items as $label => $url) {
                    printf(
                        '<li><a href="%s" class="mobile-nav-link">%s</a></li>',
                        esc_url($url),
                        esc_html($label)
                    );
                }
                echo '</ul>';
            }
            ?>
        </div>
    </div>


    <div id="content" class="site-content flex-1">
