<?php
$is_shop = is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy();
?>
<main id="primary" class="site-main">
    <?php if (apply_filters('woocommerce_show_page_title', true) && $is_shop) : ?>
        <section class="bg-white dark:bg-black py-16 md:py-20">
            <div class="container-main text-center">
                <h1 class="font-heading text-3xl md:text-5xl font-black text-nico-dark dark:text-white">
                    <?php woocommerce_page_title(); ?>
                </h1>
                <?php if (function_exists('woocommerce_result_count')) : ?>
                    <p class="text-nico-gray dark:text-gray-400 mt-4">
                        <?php woocommerce_result_count(); ?>
                    </p>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="container-main section-padding">
        <div class="lg:grid lg:grid-cols-4 lg:gap-8">
            <?php if (is_active_sidebar('shop-sidebar') && $is_shop) : ?>
                <aside class="lg:col-span-1 mb-8 lg:mb-0">
                    <?php dynamic_sidebar('shop-sidebar'); ?>
                </aside>
            <?php endif; ?>
            <div class="<?php echo is_active_sidebar('shop-sidebar') && $is_shop ? 'lg:col-span-3' : 'lg:col-span-4'; ?>">
