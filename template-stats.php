<?php
/*
 * Template Name: Stats & Records
 * Description: Detailed career statistics and records.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Statistics', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Stats & Records', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center mb-16">
            <?php
            $career_stats = [
                ['value' => '45+', 'label' => __('Total Appearances', 'nicopaz')],
                ['value' => '12+', 'label' => __('Goals Scored', 'nicopaz')],
                ['value' => '18+', 'label' => __('Assists', 'nicopaz')],
                ['value' => '3', 'label' => __('Clubs Played For', 'nicopaz')],
            ];
            foreach ($career_stats as $s) : ?>
                <div class="p-6 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800">
                    <p class="font-heading text-3xl md:text-4xl font-black text-celeste dark:text-white"><?php echo esc_html($s['value']); ?></p>
                    <p class="text-nico-gray dark:text-gray-400 text-xs uppercase tracking-wider mt-2 font-heading font-semibold"><?php echo esc_html($s['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-6">
            <?php esc_html_e('Season by Season', 'nicopaz'); ?>
        </h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-800">
                        <th class="text-left py-3 px-4 font-heading font-bold text-nico-dark dark:text-white"><?php esc_html_e('Season', 'nicopaz'); ?></th>
                        <th class="text-left py-3 px-4 font-heading font-bold text-nico-dark dark:text-white"><?php esc_html_e('Club', 'nicopaz'); ?></th>
                        <th class="text-center py-3 px-4 font-heading font-bold text-nico-dark dark:text-white"><?php esc_html_e('Apps', 'nicopaz'); ?></th>
                        <th class="text-center py-3 px-4 font-heading font-bold text-nico-dark dark:text-white"><?php esc_html_e('Goals', 'nicopaz'); ?></th>
                        <th class="text-center py-3 px-4 font-heading font-bold text-nico-dark dark:text-white"><?php esc_html_e('Assists', 'nicopaz'); ?></th>
                        <th class="text-center py-3 px-4 font-heading font-bold text-nico-dark dark:text-white"><?php esc_html_e('Minutes', 'nicopaz'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $seasons = [
                        ['season' => '2025–26', 'club' => 'Como 1907', 'apps' => '15', 'goals' => '5', 'assists' => '3', 'mins' => '1,200'],
                        ['season' => '2024–25', 'club' => 'Como 1907', 'apps' => '20', 'goals' => '4', 'assists' => '6', 'mins' => '1,650'],
                        ['season' => '2023–24', 'club' => 'Real Madrid', 'apps' => '8', 'goals' => '2', 'assists' => '2', 'mins' => '420'],
                        ['season' => '2022–23', 'club' => 'Real Madrid Castilla', 'apps' => '12', 'goals' => '1', 'assists' => '4', 'mins' => '980'],
                    ];
                    foreach ($seasons as $row) : ?>
                        <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-nico-gray-light/50 dark:hover:bg-gray-950/50 transition-colors">
                            <td class="py-3 px-4 font-heading font-bold text-nico-dark dark:text-white"><?php echo esc_html($row['season']); ?></td>
                            <td class="py-3 px-4 text-nico-gray dark:text-gray-400"><?php echo esc_html($row['club']); ?></td>
                            <td class="py-3 px-4 text-center text-nico-dark dark:text-white font-semibold"><?php echo esc_html($row['apps']); ?></td>
                            <td class="py-3 px-4 text-center text-nico-dark dark:text-white font-semibold"><?php echo esc_html($row['goals']); ?></td>
                            <td class="py-3 px-4 text-center text-nico-dark dark:text-white font-semibold"><?php echo esc_html($row['assists']); ?></td>
                            <td class="py-3 px-4 text-center text-nico-gray dark:text-gray-400"><?php echo esc_html($row['mins']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
