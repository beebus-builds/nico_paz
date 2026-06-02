<?php
/*
 * Template Name: Events & Appearances
 * Description: Upcoming events, meet-and-greets, and public appearances.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Events', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Events & Appearances', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Upcoming Events', 'nicopaz'); ?>
        </h2>
        <div class="space-y-4 mb-16">
            <?php
            $events = [
                ['date' => 'Jun 15, 2026', 'title' => __('Fan Meet & Greet', 'nicopaz'), 'location' => __('Como, Italy', 'nicopaz'), 'type' => __('Meetup', 'nicopaz')],
                ['date' => 'Jun 22, 2026', 'title' => __('Charity Football Match', 'nicopaz'), 'location' => __('Madrid, Spain', 'nicopaz'), 'type' => __('Charity', 'nicopaz')],
                ['date' => 'Jul 5, 2026', 'title' => __('Summer Training Camp Open Day', 'nicopaz'), 'location' => __('Como, Italy', 'nicopaz'), 'type' => __('Open Day', 'nicopaz')],
                ['date' => 'Jul 20, 2026', 'title' => __('Sponsor Event', 'nicopaz'), 'location' => __('Milan, Italy', 'nicopaz'), 'type' => __('Sponsor', 'nicopaz')],
                ['date' => 'Aug 8, 2026', 'title' => __('Pre-Season Exhibition Match', 'nicopaz'), 'location' => __('London, UK', 'nicopaz'), 'type' => __('Match', 'nicopaz')],
            ];
            foreach ($events as $e) : ?>
                <div class="flex flex-col md:flex-row items-start md:items-center gap-4 p-5 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800 hover:border-celeste/30 dark:hover:border-celeste/30 transition-colors">
                    <div class="w-20 flex-shrink-0">
                        <p class="text-nico-gray dark:text-gray-400 text-xs uppercase tracking-wider"><?php echo esc_html($e['date']); ?></p>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-heading font-bold text-nico-dark dark:text-white"><?php echo esc_html($e['title']); ?></h3>
                        <p class="text-nico-gray dark:text-gray-400 text-sm mt-1"><?php echo esc_html($e['location']); ?></p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-celeste/10 dark:bg-white/10 text-celeste dark:text-white text-xs font-heading font-bold"><?php echo esc_html($e['type']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Past Events', 'nicopaz'); ?>
        </h2>
        <div class="space-y-4">
            <?php
            $past_events = [
                ['date' => 'May 10, 2026', 'title' => __('Serie A Final Day Celebration', 'nicopaz'), 'location' => __('Como, Italy', 'nicopaz')],
                ['date' => 'Apr 20, 2026', 'title' => __('Brand Photoshoot', 'nicopaz'), 'location' => __('Milan, Italy', 'nicopaz')],
                ['date' => 'Mar 15, 2026', 'title' => __('Youth Football Clinic', 'nicopaz'), 'location' => __('Tenerife, Spain', 'nicopaz')],
            ];
            foreach ($past_events as $e) : ?>
                <div class="flex flex-col md:flex-row items-start md:items-center gap-4 p-5 rounded-xl border border-gray-100 dark:border-gray-800 opacity-60">
                    <div class="w-20 flex-shrink-0">
                        <p class="text-nico-gray dark:text-gray-400 text-xs uppercase tracking-wider"><?php echo esc_html($e['date']); ?></p>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-heading font-bold text-nico-dark dark:text-white"><?php echo esc_html($e['title']); ?></h3>
                        <p class="text-nico-gray dark:text-gray-400 text-sm mt-1"><?php echo esc_html($e['location']); ?></p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-nico-gray-light dark:bg-gray-800 text-nico-gray dark:text-gray-400 text-xs font-heading font-bold"><?php esc_html_e('Completed', 'nicopaz'); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
