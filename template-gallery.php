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
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
            <div class="aspect-square bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-4xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
            <div class="aspect-square bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-4xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
            <div class="aspect-square bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-4xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
            <div class="aspect-square bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-4xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
            <div class="md:col-span-2 aspect-square md:aspect-[2/1] bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-5xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
            <div class="aspect-square bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-4xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
            <div class="aspect-square bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-4xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
            <div class="aspect-square bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-4xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
            <div class="md:col-span-2 aspect-square md:aspect-[2/1] bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                <span class="text-nico-gray/30 dark:text-white/10 font-heading text-5xl font-black absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">NP</span>
            </div>
        </div>

        <div class="text-center mt-12">
            <p class="text-nico-gray dark:text-gray-400 text-sm"><?php esc_html_e('More photos coming soon. Follow on Instagram for the latest.', 'nicopaz'); ?></p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
