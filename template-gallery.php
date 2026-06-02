<?php
/*
 * Template Name: Gallery
 * Description: Bento grid photo gallery showcasing Nico Paz moments.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Gallery', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Through the Lens', 'nicopaz'); ?>
        </h1>
        <p class="text-nico-gray dark:text-gray-400 mt-4 max-w-xl mx-auto">
            <?php esc_html_e('Moments captured on and off the pitch — the journey, the passion, the game.', 'nicopaz'); ?>
        </p>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <?php
        $gallery_items = [
            ['img' => 'gallery-1', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-2', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-3', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-4', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-5', 'size' => 'md:aspect-[2/1]', 'col' => 'md:col-span-2'],
            ['img' => 'gallery-6', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-7', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-8', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'press-action-1', 'size' => 'md:aspect-[2/1]', 'col' => 'md:col-span-2'],
        ];
        ?>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
            <?php foreach ($gallery_items as $g) : ?>
                <div class="<?php echo esc_attr(trim($g['col'] . ' ' . $g['size'] . ' aspect-square')); ?> bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $g['img'] . '.webp'); ?>"
                         alt="<?php esc_attr_e('Nico Paz photo', 'nicopaz'); ?>"
                         loading="lazy"
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/30 dark:group-hover:bg-black/40 transition-colors z-10"></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-12">
            <p class="text-nico-gray dark:text-gray-400 text-sm"><?php esc_html_e('More photos coming soon. Follow on Instagram for the latest.', 'nicopaz'); ?></p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
