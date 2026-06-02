<?php
/*
 * Template Name: Player Profile
 * Description: Detailed player stats, skills, and attributes.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Player Profile', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Nico Paz', 'nicopaz'); ?>
        </h1>
        <p class="text-nico-gray dark:text-gray-400 mt-3">
            <?php esc_html_e('Attacking Midfielder · Como 1907 · Argentina', 'nicopaz'); ?>
        </p>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-nico-gray-light dark:bg-gray-950 rounded-2xl p-6 border border-gray-100 dark:border-gray-800">
                    <h3 class="font-heading text-lg font-bold text-nico-dark dark:text-white mb-4"><?php esc_html_e('Profile', 'nicopaz'); ?></h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Full Name', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">Nico Paz</span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Date of Birth', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">17 Jan 2004</span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Age', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">20</span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Nationality', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">🇦🇷 Argentina</span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Height', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">173 cm</span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Position', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">CAM / CM</span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Foot', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white"><?php esc_html_e('Right', 'nicopaz'); ?></span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Current Club', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">Como 1907</span></div>
                    </div>
                </div>

                <div class="bg-nico-gray-light dark:bg-gray-950 rounded-2xl p-6 border border-gray-100 dark:border-gray-800">
                    <h3 class="font-heading text-lg font-bold text-nico-dark dark:text-white mb-4"><?php esc_html_e('Career', 'nicopaz'); ?></h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Youth Career', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">Real Madrid</span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Senior Career', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">Real Madrid → Como</span></div>
                        <div class="flex justify-between"><span class="text-nico-gray dark:text-gray-400"><?php esc_html_e('International', 'nicopaz'); ?></span><span class="font-heading font-bold text-nico-dark dark:text-white">Argentina</span></div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
                    <?php esc_html_e('Skills & Attributes', 'nicopaz'); ?>
                </h2>

                <div class="space-y-5">
                    <?php
                    $skills = [
                        ['name' => __('Passing', 'nicopaz'), 'value' => 85],
                        ['name' => __('Dribbling', 'nicopaz'), 'value' => 82],
                        ['name' => __('Vision', 'nicopaz'), 'value' => 88],
                        ['name' => __('Technique', 'nicopaz'), 'value' => 86],
                        ['name' => __('Pace', 'nicopaz'), 'value' => 75],
                        ['name' => __('Shooting', 'nicopaz'), 'value' => 72],
                        ['name' => __('Composure', 'nicopaz'), 'value' => 80],
                        ['name' => __('Football IQ', 'nicopaz'), 'value' => 84],
                        ['name' => __('Ball Control', 'nicopaz'), 'value' => 87],
                        ['name' => __('Creativity', 'nicopaz'), 'value' => 89],
                    ];

                    foreach ($skills as $skill) : ?>
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-heading font-bold text-nico-dark dark:text-gray-100"><?php echo esc_html($skill['name']); ?></span>
                                <span class="text-xs font-heading font-bold text-celeste dark:text-white"><?php echo esc_html($skill['value']); ?></span>
                            </div>
                            <div class="w-full h-2 bg-nico-gray-light dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-nico-dark dark:bg-white rounded-full transition-all duration-1000" style="width: <?php echo esc_attr($skill['value']); ?>%"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-16 bg-white dark:bg-black border-t border-b border-gray-100 dark:border-gray-900">
    <div class="container-main">
        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white text-center mb-8">
            <?php esc_html_e('Strengths', 'nicopaz'); ?>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <?php
            $strengths = [
                ['icon' => '🎯', 'title' => __('Vision & Passing', 'nicopaz'), 'desc' => __('Exceptional ability to read the game and deliver precise passes through tight defensive lines.', 'nicopaz')],
                ['icon' => '⚡', 'title' => __('Technical Skill', 'nicopaz'), 'desc' => __('Close ball control, quick feet, and the ability to create space in congested midfield areas.', 'nicopaz')],
                ['icon' => '🧠', 'title' => __('Football Intelligence', 'nicopaz'), 'desc' => __('Tactical awareness and decision-making that belies his age. Always finds the right position.', 'nicopaz')],
            ];
            foreach ($strengths as $s) : ?>
                <div class="text-center p-6 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800">
                    <div class="text-4xl mb-3"><?php echo $s['icon']; ?></div>
                    <h3 class="font-heading font-bold text-nico-dark dark:text-white mb-2"><?php echo esc_html($s['title']); ?></h3>
                    <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed"><?php echo esc_html($s['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
