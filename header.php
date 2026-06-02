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
    <header id="site-navbar" data-navbar-position="top" class="navbar-wrapper navbar-top">
        <!-- Decorative background layers wrapped in a clipping container -->
        <div class="navbar-bg-container" aria-hidden="true">
            <div class="navbar-bg-pattern"></div>
            <div class="navbar-bg-grid"></div>
            <div class="navbar-bg-sun"></div>
            <div class="navbar-flag-accent"></div>
            <div class="navbar-corner-shard"></div>
        </div>

        <div class="navbar-inner">
            <!-- Brand -->
            <div class="site-branding flex-shrink-0 min-w-0">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 group" aria-label="<?php esc_attr_e('Home', 'nicopaz'); ?>">
                    <span class="navbar-crest-wrap flex-shrink-0">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/crest.svg'); ?>"
                             alt=""
                             class="navbar-crest h-8 sm:h-9 w-auto">
                    </span>
                    <span class="navbar-logo text-base sm:text-lg lg:text-xl xl:text-2xl tracking-wide text-nico-dark dark:text-white whitespace-nowrap">
                        NICO<span class="text-celeste"> · </span>PAZ
                    </span>
                </a>
            </div>

            <!-- Primary nav -->
            <nav id="site-navigation" class="main-navigation hidden lg:flex items-center justify-end flex-1 min-w-0 ml-3 xl:ml-6 gap-2 xl:gap-5" aria-label="<?php esc_attr_e('Main Navigation', 'nicopaz'); ?>">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex items-center gap-2 xl:gap-5 list-none m-0 p-0',
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
                    echo '<ul class="flex items-center gap-2 xl:gap-5 list-none m-0 p-0">';
                    foreach ($fallback_items as $label => $url) {
                        printf(
                            '<li><a href="%s" class="text-xs xl:text-sm uppercase tracking-normal xl:tracking-wider text-nico-dark dark:text-gray-100 font-medium hover:text-celeste dark:hover:text-white transition-colors py-2 whitespace-nowrap">%s</a></li>',
                            esc_url($url),
                            esc_html($label)
                        );
                    }
                    echo '</ul>';
                }
                ?>
            </nav>

            <!-- Actions -->
            <div class="navbar-actions flex items-center gap-2 sm:gap-3">
                <div class="navbar-actions-icons flex items-center gap-1.5 sm:gap-2.5">
                    <!-- Position picker -->
                    <div class="navbar-position-picker relative hidden xl:block">
                        <button id="position-picker-btn" class="navbar-icon-btn" aria-label="<?php esc_attr_e('Change navbar position', 'nicopaz'); ?>" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="3" width="7" height="7" rx="1.2"/>
                                <rect x="14" y="3" width="7" height="7" rx="1.2"/>
                                <rect x="3" y="14" width="7" height="7" rx="1.2"/>
                                <rect x="14" y="14" width="7" height="7" rx="1.2"/>
                            </svg>
                        </button>
                        <div id="position-picker-menu" class="position-picker-menu" role="menu">
                            <button class="position-option is-active" data-position="top" role="menuitem" aria-label="<?php esc_attr_e('Top', 'nicopaz'); ?>">
                                <svg viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="24" height="24" rx="2.5" stroke="currentColor" stroke-width="1.5" opacity="0.4"/>
                                    <rect x="6" y="5" width="16" height="3.5" rx="1" fill="currentColor"/>
                                </svg>
                                <span class="position-option-label"><?php esc_html_e('Top', 'nicopaz'); ?></span>
                            </button>
                            <button class="position-option" data-position="bottom" role="menuitem" aria-label="<?php esc_attr_e('Bottom', 'nicopaz'); ?>">
                                <svg viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="24" height="24" rx="2.5" stroke="currentColor" stroke-width="1.5" opacity="0.4"/>
                                    <rect x="6" y="19.5" width="16" height="3.5" rx="1" fill="currentColor"/>
                                </svg>
                                <span class="position-option-label"><?php esc_html_e('Bottom', 'nicopaz'); ?></span>
                            </button>
                            <button class="position-option" data-position="left" role="menuitem" aria-label="<?php esc_attr_e('Left', 'nicopaz'); ?>">
                                <svg viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="24" height="24" rx="2.5" stroke="currentColor" stroke-width="1.5" opacity="0.4"/>
                                    <rect x="5" y="6" width="3.5" height="16" rx="1" fill="currentColor"/>
                                </svg>
                                <span class="position-option-label"><?php esc_html_e('Left', 'nicopaz'); ?></span>
                            </button>
                            <button class="position-option" data-position="right" role="menuitem" aria-label="<?php esc_attr_e('Right', 'nicopaz'); ?>">
                                <svg viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="24" height="24" rx="2.5" stroke="currentColor" stroke-width="1.5" opacity="0.4"/>
                                    <rect x="19.5" y="6" width="3.5" height="16" rx="1" fill="currentColor"/>
                                </svg>
                                <span class="position-option-label"><?php esc_html_e('Right', 'nicopaz'); ?></span>
                            </button>
                        </div>
                    </div>

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

                    <button id="mobile-menu-toggle" class="lg:hidden navbar-icon-btn" aria-label="<?php esc_attr_e('Toggle menu', 'nicopaz'); ?>" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <?php nicopaz_language_switcher(); ?>
            </div>
        </div>
    </header>

    <!-- Mobile menu drawer -->
    <div id="mobile-menu" class="lg:hidden hidden bg-white/95 dark:bg-ink/95 backdrop-blur-md border-t border-gray-100 dark:border-gray-900 max-h-[80vh] overflow-y-auto overscroll-contain">
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
            } else {
                $fallback_items = [
                    __('Home', 'nicopaz')       => home_url('/'),
                    __('Shop', 'nicopaz')       => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop'),
                    __('About', 'nicopaz')      => '#about',
                    __('Gallery', 'nicopaz')    => '#gallery',
                    __('Contact', 'nicopaz')    => '#contact',
                ];
                echo '<ul class="flex flex-col gap-3 list-none m-0 p-0">';
                foreach ($fallback_items as $label => $url) {
                    printf(
                        '<li><a href="%s" class="block text-sm uppercase tracking-wider text-nico-dark dark:text-gray-100 font-semibold hover:text-celeste dark:hover:text-white transition-colors py-2">%s</a></li>',
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
