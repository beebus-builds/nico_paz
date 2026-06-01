<?php
defined('ABSPATH') || exit;

global $product;
?>
<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main">
        <nav class="text-sm text-nico-gray dark:text-gray-400 mb-4">
            <?php woocommerce_breadcrumb(); ?>
        </nav>
    </div>
</section>

<section class="container-main py-8 md:py-12">
    <?php if (post_password_required()) : ?>
        <?php echo get_the_password_form(); ?>
        <?php return; ?>
    <?php endif; ?>

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12'); ?>>

        <div class="product-gallery">
            <?php do_action('woocommerce_before_single_product_summary'); ?>
        </div>

        <div class="product-summary">
            <?php do_action('woocommerce_single_product_summary'); ?>
        </div>

    </div>

    <?php do_action('woocommerce_after_single_product_summary'); ?>
</section>
