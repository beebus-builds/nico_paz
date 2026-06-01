<?php
/*
 * Template Name: Press & Media
 * Description: Press releases, media coverage, and interview links.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Media', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Press & Media', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="mb-12">
            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-6">
                <?php esc_html_e('Press Kit', 'nicopaz'); ?>
            </h2>
            <p class="text-nico-gray dark:text-gray-400 mb-6 max-w-2xl">
                <?php esc_html_e('Official media assets available for download. For press inquiries, contact press@nicopaz.com.', 'nicopaz'); ?>
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="#" class="btn-primary text-xs px-5 py-2"><?php esc_html_e('Download Press Kit', 'nicopaz'); ?></a>
                <a href="#" class="btn-secondary text-xs px-5 py-2"><?php esc_html_e('Request Interview', 'nicopaz'); ?></a>
            </div>
        </div>

        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('In the News', 'nicopaz'); ?>
        </h2>
        <div class="space-y-4">
            <?php
            $articles = [
                ['source' => 'Marca', 'date' => 'May 2026', 'title' => __('Nico Paz: The Rise of Argentina\'s Next Big Thing', 'nicopaz'), 'type' => __('Feature', 'nicopaz')],
                ['source' => 'The Guardian', 'date' => 'Apr 2026', 'title' => __('Como\'s Creative Force: How Nico Paz Is Transforming Serie A', 'nicopaz'), 'type' => __('Analysis', 'nicopaz')],
                ['source' => 'Olé', 'date' => 'Mar 2026', 'title' => __('Paz: \"My dream is to play for the senior national team\"', 'nicopaz'), 'type' => __('Interview', 'nicopaz')],
                ['source' => 'ESPN', 'date' => 'Feb 2026', 'title' => __('Top 20 Under 20: Nico Paz Makes the List', 'nicopaz'), 'type' => __('List', 'nicopaz')],
                ['source' => 'AS', 'date' => 'Jan 2026', 'title' => __('Real Madrid Regret: Why They Let Nico Paz Leave', 'nicopaz'), 'type' => __('Opinion', 'nicopaz')],
                ['source' => 'Gazzetta dello Sport', 'date' => 'Dec 2025', 'title' => __('Paz\'s Impact: Como\'s Secret Weapon', 'nicopaz'), 'type' => __('Feature', 'nicopaz')],
            ];
            foreach ($articles as $a) : ?>
                <a href="#" class="flex flex-col md:flex-row items-start md:items-center gap-4 p-5 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800 hover:border-argentina-blue/30 dark:hover:border-argentina-blue/30 transition-colors group">
                    <div class="flex-shrink-0">
                        <span class="font-heading font-bold text-argentina-blue dark:text-white text-sm"><?php echo esc_html($a['source']); ?></span>
                        <span class="text-nico-gray dark:text-gray-400 text-xs ml-2"><?php echo esc_html($a['date']); ?></span>
                    </div>
                    <h3 class="flex-1 font-heading font-bold text-nico-dark dark:text-white text-sm group-hover:text-argentina-blue dark:group-hover:text-white transition-colors">
                        <?php echo esc_html($a['title']); ?>
                    </h3>
                    <span class="px-3 py-1 rounded-full bg-argentina-blue/10 dark:bg-white/10 text-argentina-blue dark:text-white text-xs font-heading font-bold"><?php echo esc_html($a['type']); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
