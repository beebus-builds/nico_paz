<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="min-h-[60vh] flex items-center justify-center bg-white dark:bg-black">
        <div class="container-main text-center">
            <h1 class="font-heading text-8xl md:text-9xl font-black text-nico-dark/10 dark:text-gray-800 mb-4">404</h1>
            <h2 class="font-heading text-2xl md:text-3xl font-bold text-nico-dark dark:text-gray-100 mb-4">
                <?php esc_html_e('Page Not Found', 'nicopaz'); ?>
            </h2>
            <p class="text-nico-gray dark:text-gray-400 mb-8 max-w-md mx-auto">
                <?php esc_html_e('The page you are looking for does not exist or has been moved. Let us get you back on track.', 'nicopaz'); ?>
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary">
                    <?php esc_html_e('Go Home', 'nicopaz'); ?>
                </a>
                <?php if (function_exists('wc_get_page_id')) : ?>
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-secondary">
                    <?php esc_html_e('Visit Shop', 'nicopaz'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
