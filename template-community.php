<?php
/*
 * Template Name: Community & Charity
 * Description: Charitable work, community initiatives, and social impact.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Giving Back', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Community & Charity', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="max-w-3xl mb-16">
            <h2 class="font-heading text-2xl md:text-3xl font-black text-nico-dark dark:text-white mb-6">
                <?php esc_html_e('Making a Difference', 'nicopaz'); ?>
            </h2>
            <div class="space-y-4 text-nico-gray dark:text-gray-400 leading-relaxed">
                <p><?php esc_html_e('Football has given me everything — and I believe in using this platform to give back. Through charitable work and community initiatives, I aim to inspire the next generation and make a positive impact beyond the pitch.', 'nicopaz'); ?></p>
                <p><?php esc_html_e('From organizing youth football clinics in my hometown of Tenerife to supporting educational programs for underprivileged children, every initiative is driven by the belief that sport has the power to change lives.', 'nicopaz'); ?></p>
            </div>
        </div>

        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Initiatives', 'nicopaz'); ?>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
            <?php
            $initiatives = [
                ['icon' => '⚽', 'title' => __('Youth Football Clinics', 'nicopaz'), 'desc' => __('Free football training sessions for children aged 6–16, held during summer breaks in Tenerife and Como.', 'nicopaz')],
                ['icon' => '📚', 'title' => __('Education First', 'nicopaz'), 'desc' => __('Supporting educational programs and school supplies for children in need across Argentina and Spain.', 'nicopaz')],
                ['icon' => '🏥', 'title' => __('Hospital Visits', 'nicopaz'), 'desc' => __('Regular visits to children\'s hospitals, bringing joy and autographed merchandise to young fans.', 'nicopaz')],
                ['icon' => '🌍', 'title' => __('Environmental Action', 'nicopaz'), 'desc' => __('Partnering with environmental organizations to promote sustainability and climate awareness.', 'nicopaz')],
            ];
            foreach ($initiatives as $init) : ?>
                <div class="flex gap-5 p-6 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800">
                    <div class="text-4xl flex-shrink-0"><?php echo $init['icon']; ?></div>
                    <div>
                        <h3 class="font-heading font-bold text-nico-dark dark:text-white mb-2"><?php echo esc_html($init['title']); ?></h3>
                        <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed"><?php echo esc_html($init['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Impact Numbers', 'nicopaz'); ?>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <?php
            $impact = [
                ['value' => '2,500+', 'label' => __('Kids Reached', 'nicopaz')],
                ['value' => '15', 'label' => __('Events Held', 'nicopaz')],
                ['value' => '5', 'label' => __('Countries', 'nicopaz')],
                ['value' => '€50K+', 'label' => __('Funds Raised', 'nicopaz')],
            ];
            foreach ($impact as $i) : ?>
                <div class="p-6 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800">
                    <p class="font-heading text-3xl font-black text-celeste dark:text-white"><?php echo esc_html($i['value']); ?></p>
                    <p class="text-nico-gray dark:text-gray-400 text-xs uppercase tracking-wider mt-2 font-heading font-semibold"><?php echo esc_html($i['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
