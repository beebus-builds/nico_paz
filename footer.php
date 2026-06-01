    </div>

    <footer id="colophon" class="site-footer bg-white dark:bg-black text-nico-dark dark:text-white border-t border-gray-100 dark:border-gray-900">
        <div class="container-main section-padding">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <div>
                    <h3 class="font-heading text-2xl font-black mb-4">
                        <span class="text-argentina-blue dark:text-white">NICO</span> <span class="text-argentina-gold dark:text-argentina-gold">PAZ</span>
                    </h3>
                    <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed">
                        <?php esc_html_e('Professional Argentine footballer. Shop official merchandise and stay connected.', 'nicopaz'); ?>
                    </p>
                </div>

                <div>
                    <h4 class="font-heading text-lg font-bold mb-4 text-nico-dark dark:text-white"><?php esc_html_e('Quick Links', 'nicopaz'); ?></h4>
                    <?php
                    if (has_nav_menu('footer')) {
                        wp_nav_menu([
                            'theme_location' => 'footer',
                            'menu_class'     => 'flex flex-col gap-2 list-none m-0 p-0',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'link_before'    => '<span class="text-nico-gray dark:text-gray-400 hover:text-argentina-blue dark:hover:text-white transition-colors text-sm">',
                            'link_after'     => '</span>',
                        ]);
                    } else {
                        echo '<ul class="flex flex-col gap-2 list-none m-0 p-0">';
                        $links = [
                            __('Shop', 'nicopaz') => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/shop'),
                            __('About', 'nicopaz') => home_url('/about'),
                            __('Contact', 'nicopaz') => home_url('/contact'),
                        ];
                        foreach ($links as $label => $url) {
                            printf(
                                '<li><a href="%s" class="text-nico-gray dark:text-gray-400 hover:text-argentina-blue dark:hover:text-white transition-colors text-sm">%s</a></li>',
                                esc_url($url),
                                esc_html($label)
                            );
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>

                <?php if (function_exists('wc_get_page_id')) : ?>
                <div>
                    <h4 class="font-heading text-lg font-bold mb-4 text-nico-dark dark:text-white"><?php esc_html_e('Support', 'nicopaz'); ?></h4>
                    <ul class="flex flex-col gap-2 list-none m-0 p-0">
                        <li><a href="<?php echo esc_url(get_permalink(wc_get_page_id('cart'))); ?>" class="text-nico-gray dark:text-gray-400 hover:text-argentina-blue dark:hover:text-white transition-colors text-sm"><?php esc_html_e('Cart', 'nicopaz'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(wc_get_page_id('myaccount'))); ?>" class="text-nico-gray dark:text-gray-400 hover:text-argentina-blue dark:hover:text-white transition-colors text-sm"><?php esc_html_e('My Account', 'nicopaz'); ?></a></li>
                        <li><a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" class="text-nico-gray dark:text-gray-400 hover:text-argentina-blue dark:hover:text-white transition-colors text-sm"><?php esc_html_e('Orders', 'nicopaz'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(wc_get_page_id('terms'))); ?>" class="text-nico-gray dark:text-gray-400 hover:text-argentina-blue dark:hover:text-white transition-colors text-sm"><?php esc_html_e('Terms & Conditions', 'nicopaz'); ?></a></li>
                    </ul>
                </div>
                <?php endif; ?>

                <div>
                    <h4 class="font-heading text-lg font-bold mb-4 text-nico-dark dark:text-white"><?php esc_html_e('Follow Me', 'nicopaz'); ?></h4>
                    <?php
                    if (has_nav_menu('social')) {
                        wp_nav_menu([
                            'theme_location' => 'social',
                            'menu_class'     => 'flex flex-wrap gap-3 list-none m-0 p-0',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'link_before'    => '<span class="w-10 h-10 rounded-full bg-nico-dark/10 dark:bg-white/10 flex items-center justify-center hover:bg-argentina-blue dark:hover:bg-white transition-colors text-nico-dark dark:text-white">',
                            'link_after'     => '</span>',
                        ]);
                    } else {
                        echo '<div class="flex flex-wrap gap-3">';
                        $socials = [
                            'Instagram' => 'https://instagram.com/nicopaz',
                            'Twitter'   => 'https://twitter.com/nicopaz',
                            'TikTok'    => 'https://tiktok.com/@nicopaz',
                        ];
                        foreach ($socials as $name => $url) {
                            printf(
                                '<a href="%s" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-nico-dark/10 dark:bg-white/10 flex items-center justify-center hover:bg-argentina-blue dark:hover:bg-white transition-colors text-nico-dark dark:text-white text-sm font-semibold" aria-label="%s">%s</a>',
                                esc_url($url),
                                esc_attr($name),
                                esc_html(substr($name, 0, 1))
                            );
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

            </div>
        </div>

        <div class="border-t border-gray-100 dark:border-gray-900">
            <div class="container-main py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-nico-gray/50 dark:text-gray-500 text-sm">
                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'nicopaz'); ?>
                    </p>
                    <p class="text-nico-gray/50 dark:text-gray-500 text-xs">
                        <?php esc_html_e('Built with passion for the beautiful game.', 'nicopaz'); ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>

</div>

<?php wp_footer(); ?>
</body>
</html>
