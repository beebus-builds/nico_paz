<?php
/*
 * Template Name: Training Ground
 * Description: Training routines, workout tips, and fitness insights.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Training', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Training Ground', 'nicopaz'); ?>
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-5xl mx-auto">
            <div class="aspect-[4/3] overflow-hidden rounded-2xl bg-nico-gray-light dark:bg-gray-950">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/training-1.webp'); ?>"
                     alt="<?php esc_attr_e('Training session', 'nicopaz'); ?>"
                     class="w-full h-full object-cover">
            </div>
            <div class="aspect-[4/3] overflow-hidden rounded-2xl bg-nico-gray-light dark:bg-gray-950">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/training-2.webp'); ?>"
                     alt="<?php esc_attr_e('Training session', 'nicopaz'); ?>"
                     class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            <?php
            $routines = [
                ['title' => __('Technical Drills', 'nicopaz'), 'desc' => __('Ball control, first touch, and passing accuracy exercises used in daily training sessions.', 'nicopaz'), 'duration' => '45 min', 'level' => __('Intermediate', 'nicopaz')],
                ['title' => __('Speed & Agility', 'nicopaz'), 'desc' => __('Sprint drills, ladder work, and cone exercises for explosive acceleration and quick changes of direction.', 'nicopaz'), 'duration' => '30 min', 'level' => __('Advanced', 'nicopaz')],
                ['title' => __('Strength Training', 'nicopaz'), 'desc' => __('Gym-based workout focusing on core stability, leg strength, and injury prevention.', 'nicopaz'), 'duration' => '60 min', 'level' => __('Intermediate', 'nicopaz')],
                ['title' => __('Recovery Session', 'nicopaz'), 'desc' => __('Stretching routines, foam rolling, and cool-down protocols for optimal recovery.', 'nicopaz'), 'duration' => '20 min', 'level' => __('All Levels', 'nicopaz')],
                ['title' => __('Tactical Awareness', 'nicopaz'), 'desc' => __('Video analysis and positional play exercises to improve game reading and decision-making.', 'nicopaz'), 'duration' => '40 min', 'level' => __('Advanced', 'nicopaz')],
                ['title' => __('Pre-Match Warm-Up', 'nicopaz'), 'desc' => __('Match-day activation routine designed to prepare the body for peak performance.', 'nicopaz'), 'duration' => '25 min', 'level' => __('All Levels', 'nicopaz')],
            ];
            foreach ($routines as $r) : ?>
                <div class="bg-nico-gray-light dark:bg-gray-950 rounded-xl p-6 border border-gray-100 dark:border-gray-800 hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-argentina-blue/10 dark:bg-white/10 flex items-center justify-center">
                            <span class="text-argentina-blue dark:text-white text-lg">💪</span>
                        </div>
                        <span class="text-xs text-nico-gray dark:text-gray-400 font-heading"><?php echo esc_html($r['duration']); ?> · <?php echo esc_html($r['level']); ?></span>
                    </div>
                    <h3 class="font-heading font-bold text-nico-dark dark:text-white mb-2"><?php echo esc_html($r['title']); ?></h3>
                    <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed"><?php echo esc_html($r['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="bg-nico-gray-light dark:bg-gray-950 rounded-2xl p-8 md:p-12 border border-gray-100 dark:border-gray-800 text-center">
            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-4">
                <?php esc_html_e('Weekly Training Schedule', 'nicopaz'); ?>
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4 max-w-3xl mx-auto">
                <?php
                $days = [
                    ['day' => __('Mon', 'nicopaz'), 'focus' => __('Technical', 'nicopaz')],
                    ['day' => __('Tue', 'nicopaz'), 'focus' => __('Tactical', 'nicopaz')],
                    ['day' => __('Wed', 'nicopaz'), 'focus' => __('Recovery', 'nicopaz')],
                    ['day' => __('Thu', 'nicopaz'), 'focus' => __('Speed', 'nicopaz')],
                    ['day' => __('Fri', 'nicopaz'), 'focus' => __('Match Prep', 'nicopaz')],
                ];
                foreach ($days as $d) : ?>
                    <div class="p-3 rounded-xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800">
                        <p class="font-heading font-bold text-nico-dark dark:text-white text-sm"><?php echo esc_html($d['day']); ?></p>
                        <p class="text-nico-gray dark:text-gray-400 text-xs mt-1"><?php echo esc_html($d['focus']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
