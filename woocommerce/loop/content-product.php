<li <?php wc_product_class(''); ?>>
    <div class="product-card group">
        <a href="<?php the_permalink(); ?>" class="block aspect-[4/5] overflow-hidden bg-nico-gray-light dark:bg-gray-800">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('nicopaz-product', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500']);
            } else {
                echo '<div class="w-full h-full flex items-center justify-center text-nico-gray/30 dark:text-white/10 font-heading text-4xl font-bold">NP</div>';
            }
            ?>
        </a>
        <div class="p-4">
            <h3 class="font-heading font-bold text-sm md:text-base mb-1 truncate">
                <a href="<?php the_permalink(); ?>" class="text-nico-dark dark:text-gray-100 hover:text-celeste dark:hover:text-white transition-colors">
                    <?php the_title(); ?>
                </a>
            </h3>
            <?php
            $product = wc_get_product(get_the_ID());
            if ($product) : ?>
                <p class="text-celeste dark:text-white font-bold text-sm md:text-base">
                    <?php echo $product->get_price_html(); ?>
                </p>
                <?php if ($product->is_type('variable')) : ?>
                    <a href="<?php the_permalink(); ?>" class="mt-3 w-full inline-block text-center text-xs py-2 rounded-lg bg-nico-gray-light dark:bg-gray-800 text-nico-dark dark:text-gray-100 font-semibold hover:bg-celeste dark:hover:bg-white hover:text-white dark:hover:text-nico-dark transition-colors">
                        <?php esc_html_e('View Options', 'nicopaz'); ?>
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" data-product_id="<?php echo esc_attr($product->get_id()); ?>" data-quantity="1" class="mt-3 w-full inline-block text-center text-xs py-2 rounded-lg btn-primary add_to_cart_button ajax_add_to_cart">
                        <?php esc_html_e('Add to Cart', 'nicopaz'); ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</li>
