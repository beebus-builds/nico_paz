<?php
/*
 * Template Name: Match Schedule
 * Description: Upcoming fixtures and recent match results.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Fixtures', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Match Schedule', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Upcoming Matches', 'nicopaz'); ?>
        </h2>
        <div class="space-y-3 mb-16">
            <?php
            $fixtures = [
                ['date' => 'Jun 14', 'time' => '20:45', 'home' => 'Como 1907', 'away' => 'AC Milan', 'comp' => 'Serie A', 'venue' => 'Stadio Giuseppe Sinigaglia'],
                ['date' => 'Jun 21', 'time' => '18:00', 'home' => 'Juventus', 'away' => 'Como 1907', 'comp' => 'Serie A', 'venue' => 'Allianz Stadium'],
                ['date' => 'Jun 28', 'time' => '20:45', 'home' => 'Como 1907', 'away' => 'Inter Milan', 'comp' => 'Serie A', 'venue' => 'Stadio Giuseppe Sinigaglia'],
                ['date' => 'Jul 5', 'time' => '15:00', 'home' => 'AS Roma', 'away' => 'Como 1907', 'comp' => 'Serie A', 'venue' => 'Stadio Olimpico'],
                ['date' => 'Jul 12', 'time' => '20:45', 'home' => 'Como 1907', 'away' => 'SSC Napoli', 'comp' => 'Serie A', 'venue' => 'Stadio Giuseppe Sinigaglia'],
            ];
            foreach ($fixtures as $f) : ?>
                <div class="flex flex-col md:flex-row items-center gap-4 p-5 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800 hover:border-argentina-blue/30 dark:hover:border-argentina-blue/30 transition-colors">
                    <div class="w-24 text-center flex-shrink-0">
                        <p class="font-heading font-bold text-nico-dark dark:text-white text-lg"><?php echo esc_html($f['date']); ?></p>
                        <p class="text-nico-gray dark:text-gray-400 text-xs"><?php echo esc_html($f['time']); ?></p>
                    </div>
                    <div class="flex-1 flex items-center justify-center gap-6 text-center">
                        <span class="font-heading font-bold text-nico-dark dark:text-white text-sm w-28"><?php echo esc_html($f['home']); ?></span>
                        <span class="text-nico-gray dark:text-gray-400 text-xs font-heading font-bold">VS</span>
                        <span class="font-heading font-bold text-nico-dark dark:text-white text-sm w-28"><?php echo esc_html($f['away']); ?></span>
                    </div>
                    <div class="flex-shrink-0 text-right">
                        <span class="px-3 py-1 rounded-full bg-argentina-blue/10 dark:bg-white/10 text-argentina-blue dark:text-white text-xs font-heading font-bold"><?php echo esc_html($f['comp']); ?></span>
                        <p class="text-nico-gray dark:text-gray-400 text-xs mt-1"><?php echo esc_html($f['venue']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Recent Results', 'nicopaz'); ?>
        </h2>
        <div class="space-y-3">
            <?php
            $results = [
                ['date' => 'Jun 1', 'home' => 'Como 1907', 'away' => 'Fiorentina', 'score' => '2–1', 'result' => 'W'],
                ['date' => 'May 25', 'home' => 'Lazio', 'away' => 'Como 1907', 'score' => '1–1', 'result' => 'D'],
                ['date' => 'May 18', 'home' => 'Como 1907', 'away' => 'Atalanta', 'score' => '3–0', 'result' => 'W'],
                ['date' => 'May 11', 'home' => 'Sampdoria', 'away' => 'Como 1907', 'score' => '0–2', 'result' => 'W'],
            ];
            foreach ($results as $r) :
                $color = $r['result'] === 'W' ? 'text-green-600 dark:text-green-400' : ($r['result'] === 'D' ? 'text-yellow-600 dark:text-yellow-400' : 'text-red-600 dark:text-red-400');
            ?>
                <div class="flex flex-col md:flex-row items-center gap-4 p-5 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800">
                    <div class="w-24 text-center flex-shrink-0">
                        <p class="text-nico-gray dark:text-gray-400 text-xs"><?php echo esc_html($r['date']); ?></p>
                    </div>
                    <div class="flex-1 flex items-center justify-center gap-6 text-center">
                        <span class="font-heading font-bold text-nico-dark dark:text-white text-sm w-28"><?php echo esc_html($r['home']); ?></span>
                        <span class="font-heading font-bold text-lg <?php echo $color; ?>"><?php echo esc_html($r['score']); ?></span>
                        <span class="font-heading font-bold text-nico-dark dark:text-white text-sm w-28"><?php echo esc_html($r['away']); ?></span>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="w-8 h-8 rounded-full flex items-center justify-center font-heading font-bold text-white text-xs <?php echo $r['result'] === 'W' ? 'bg-green-500' : ($r['result'] === 'D' ? 'bg-yellow-500' : 'bg-red-500'); ?>"><?php echo esc_html($r['result']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
