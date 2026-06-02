<?php
/*
 * Template Name: Career Timeline
 * Description: Detailed career milestones and achievements.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Career', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Path to Glory', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="max-w-3xl mx-auto relative">
            <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-celeste/20 -translate-x-1/2"></div>

            <?php
            $milestones = [
                ['year' => '2004', 'side' => 'right', 'title' => __('Born in Tenerife, Spain', 'nicopaz'), 'desc' => __('Born into a football family. His father Pablo Paz represented Argentina at the 1998 World Cup.', 'nicopaz')],
                ['year' => '2014', 'side' => 'left', 'title' => __('Joined Real Madrid Youth Academy', 'nicopaz'), 'desc' => __('At age 10, joined La Fábrica — the renowned Real Madrid youth system — where he developed his technical skills.', 'nicopaz')],
                ['year' => '2019', 'side' => 'right', 'title' => __('Youth International Recognition', 'nicopaz'), 'desc' => __('Earned call-ups to Argentine youth national teams, showcasing his talent on the international stage.', 'nicopaz')],
                ['year' => '2022', 'side' => 'left', 'title' => __('Real Madrid Castilla Debut', 'nicopaz'), 'desc' => __('Promoted to Real Madrid Castilla in Primera Federación, establishing himself as a creative midfield presence.', 'nicopaz')],
                ['year' => '2023', 'side' => 'right', 'title' => __('First Team Debut for Real Madrid', 'nicopaz'), 'desc' => __('Made his official first-team debut in La Liga, fulfilling a childhood dream at the Santiago Bernabéu.', 'nicopaz')],
                ['year' => '2024', 'side' => 'left', 'title' => __('Moved to Como 1907', 'nicopaz'), 'desc' => __('Joined Italian Serie A side Como 1907, bringing his talent to the competitive landscape of Italian football.', 'nicopaz')],
                ['year' => '2025', 'side' => 'right', 'title' => __('Continued Rise', 'nicopaz'), 'desc' => __('Continues to develop and impress in Serie A, establishing himself as one of the most exciting young talents in European football.', 'nicopaz')],
            ];

            foreach ($milestones as $i => $m) :
                $is_left = $m['side'] === 'left';
            ?>
                <div class="relative mb-12 last:mb-0">
                    <div class="hidden md:block absolute left-1/2 top-2 w-4 h-4 rounded-full bg-celeste border-4 border-white dark:border-black shadow -translate-x-1/2 z-10"></div>
                    <div class="block md:hidden absolute left-4 top-2 w-3 h-3 rounded-full bg-celeste border-2 border-white dark:border-black shadow z-10"></div>

                    <div class="<?php echo $is_left ? 'md:pr-[52%] md:text-right' : 'md:pl-[52%]'; ?> pl-12 md:pl-0">
                        <span class="inline-block font-heading text-xs font-bold text-celeste dark:text-white bg-celeste/10 dark:bg-white/10 px-3 py-1 rounded-full uppercase tracking-wider mb-2">
                            <?php echo esc_html($m['year']); ?>
                        </span>
                        <h3 class="font-heading text-lg md:text-xl font-bold text-nico-dark dark:text-white"><?php echo esc_html($m['title']); ?></h3>
                        <p class="text-nico-gray dark:text-gray-400 text-sm mt-2 leading-relaxed"><?php echo esc_html($m['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-16 bg-white dark:bg-black border-t border-b border-gray-100 dark:border-gray-900">
    <div class="container-main">
        <div class="text-center mb-10">
            <h2 class="font-heading text-2xl md:text-3xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Career Statistics', 'nicopaz'); ?>
            </h2>
        </div>
        <div class="max-w-2xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <?php
            $stats = [
                ['value' => '15+', 'label' => __('Appearances', 'nicopaz')],
                ['value' => '5+', 'label' => __('Goals', 'nicopaz')],
                ['value' => '3', 'label' => __('Clubs', 'nicopaz')],
                ['value' => '2025', 'label' => __('Current Season', 'nicopaz')],
            ];
            foreach ($stats as $s) : ?>
                <div>
                    <p class="font-heading text-3xl font-black text-celeste dark:text-white"><?php echo esc_html($s['value']); ?></p>
                    <p class="text-nico-gray dark:text-gray-400 text-xs uppercase tracking-wider mt-1 font-heading font-semibold"><?php echo esc_html($s['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
