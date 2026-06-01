<?php
/*
 * Template Name: Kit & Merchandise
 * Description: Official merchandise showcase with product highlights.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Official Merchandise', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Kit & Merchandise', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <?php if (function_exists('wc_get_page_id') && function_exists('wc_get_products')) : ?>
            <?php
            $products = wc_get_products(['limit' => 12, 'status' => 'publish']);
            if (!empty($products)) : ?>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    <?php foreach ($products as $product) :
                        $id = $product->get_id();
                        $obj = wc_get_product($id);
                    ?>
                        <div class="product-card group">
                            <a href="<?php echo esc_url(get_permalink($id)); ?>" class="block aspect-[4/5] overflow-hidden bg-nico-gray-light dark:bg-gray-800 rounded-t-xl">
                                <?php echo $obj->get_image('nicopaz-product', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500']); ?>
                            </a>
                            <div class="p-4">
                                <h3 class="font-heading font-bold text-sm truncate">
                                    <a href="<?php echo esc_url(get_permalink($id)); ?>" class="text-nico-dark dark:text-gray-100 hover:text-argentina-blue dark:hover:text-white transition-colors"><?php echo esc_html($obj->get_name()); ?></a>
                                </h3>
                                <p class="text-argentina-blue dark:text-white font-bold text-sm mt-1"><?php echo $obj->get_price_html(); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center mt-12">
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-primary text-sm px-8 py-3"><?php esc_html_e('View All Products', 'nicopaz'); ?></a>
                </div>
            <?php else : ?>
                <div class="text-center py-16 bg-nico-gray-light dark:bg-gray-950 rounded-xl border border-gray-100 dark:border-gray-800">
                    <div class="text-5xl mb-4">👕</div>
                    <p class="text-nico-gray dark:text-gray-400 text-lg font-heading font-bold"><?php esc_html_e('Official merchandise coming soon!', 'nicopaz'); ?></p>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="text-center py-16 bg-nico-gray-light dark:bg-gray-950 rounded-xl border border-gray-100 dark:border-gray-800">
                <div class="text-5xl mb-4">👕</div>
                <p class="text-nico-gray dark:text-gray-400 text-lg font-heading font-bold mb-4"><?php esc_html_e('Official merchandise coming soon!', 'nicopaz'); ?></p>
                <p class="text-nico-gray/60 dark:text-gray-500 text-sm"><?php esc_html_e('WooCommerce is required for the shop. Install it to display products here.', 'nicopaz'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

</main>

<?php get_footer(); ?>
