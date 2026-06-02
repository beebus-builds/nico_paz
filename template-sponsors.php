<?php
/*
 * Template Name: Sponsors
 * Description: Partners, sponsors, and brand collaborations.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Partners', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Sponsors & Partners', 'nicopaz'); ?>
        </h1>
        <p class="text-nico-gray dark:text-gray-400 mt-4 max-w-xl mx-auto">
            <?php esc_html_e('The brands and organizations that support Nico\'s journey.', 'nicopaz'); ?>
        </p>
    </div>
</section>

<section class="py-16 bg-white dark:bg-black border-b border-gray-100 dark:border-gray-900">
    <div class="container-main">
        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white text-center mb-10">
            <?php esc_html_e('Official Partners', 'nicopaz'); ?>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php
            $partners = [
                ['name' => 'Nike', 'desc' => __('Apparel', 'nicopaz')],
                ['name' => 'Adidas', 'desc' => __('Footwear', 'nicopaz')],
                ['name' => 'Puma', 'desc' => __('Accessories', 'nicopaz')],
                ['name' => 'EA Sports', 'desc' => __('Gaming', 'nicopaz')],
            ];
            foreach ($partners as $p) : ?>
                <div class="text-center p-6 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800 hover:-translate-y-1 transition-all duration-300">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-nico-dark/10 dark:bg-white/10 flex items-center justify-center">
                        <span class="text-nico-dark/30 dark:text-white/30 font-heading text-2xl font-black"><?php echo esc_html(substr($p['name'], 0, 1)); ?></span>
                    </div>
                    <h3 class="font-heading font-bold text-nico-dark dark:text-white"><?php echo esc_html($p['name']); ?></h3>
                    <p class="text-nico-gray dark:text-gray-400 text-xs mt-1"><?php echo esc_html($p['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-16 bg-white dark:bg-black border-b border-gray-100 dark:border-gray-900">
    <div class="container-main">
        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white text-center mb-10">
            <?php esc_html_e('All Sponsors', 'nicopaz'); ?>
        </h2>
        <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16">
            <?php
            $sponsors = ['Nike', 'Adidas', 'Puma', 'EA Sports', 'Beats', 'Gatorade', 'New Balance', 'Sony'];
            foreach ($sponsors as $sponsor) : ?>
                <div class="grayscale hover:grayscale-0 opacity-40 hover:opacity-100 transition-all duration-300">
                    <span class="font-heading text-2xl md:text-3xl font-black text-nico-dark/30 dark:text-white/30"><?php echo esc_html($sponsor); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-2xl text-center">
        <h2 class="font-heading text-2xl md:text-3xl font-black text-nico-dark dark:text-white mb-4">
            <?php esc_html_e('Become a Partner', 'nicopaz'); ?>
        </h2>
        <p class="text-nico-gray dark:text-gray-400 mb-8">
            <?php esc_html_e('Interested in collaborating with Nico Paz? We\'re always open to discussing new partnerships and opportunities.', 'nicopaz'); ?>
        </p>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary text-sm px-8 py-3">
            <?php esc_html_e('Get in Touch', 'nicopaz'); ?>
        </a>
    </div>
</section>

</main>

<?php get_footer(); ?>
