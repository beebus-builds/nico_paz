<?php
/*
 * Template Name: Fan Zone
 * Description: Fan community hub with quizzes, wallpapers, and downloads.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Community', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Fan Zone', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Wallpapers', 'nicopaz'); ?>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-16">
            <?php
            $wallpapers = [
                ['name' => 'Desktop 1920×1080', 'tag' => __('Match Day', 'nicopaz')],
                ['name' => 'Mobile 1080×1920', 'tag' => __('Training', 'nicopaz')],
                ['name' => 'Desktop 2560×1440', 'tag' => __('Goal Celebration', 'nicopaz')],
                ['name' => 'Mobile 1080×1920', 'tag' => __('Portrait', 'nicopaz')],
                ['name' => 'Desktop 3840×2160', 'tag' => __('4K Action', 'nicopaz')],
                ['name' => 'Tablet 2048×2732', 'tag' => __('iPad', 'nicopaz')],
            ];
            foreach ($wallpapers as $w) : ?>
                <div class="group cursor-pointer">
                    <div class="aspect-video bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden relative border border-gray-100 dark:border-gray-800">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-nico-gray/30 dark:text-white/10 font-heading text-lg font-bold"><?php echo esc_html($w['name']); ?></span>
                        </div>
                        <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/40 dark:group-hover:bg-white/20 transition-colors flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <span class="bg-white dark:bg-nico-dark text-nico-dark dark:text-white text-xs font-bold px-4 py-2 rounded-lg"><?php esc_html_e('Download', 'nicopaz'); ?></span>
                        </div>
                    </div>
                    <p class="text-nico-dark dark:text-white text-sm font-heading font-semibold mt-2"><?php echo esc_html($w['tag']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-8">
            <?php esc_html_e('Quick Quiz', 'nicopaz'); ?>
        </h2>
        <div class="max-w-2xl bg-nico-gray-light dark:bg-gray-950 rounded-2xl p-8 border border-gray-100 dark:border-gray-800">
            <p class="font-heading font-bold text-nico-dark dark:text-white text-lg mb-6">
                <?php esc_html_e('How many goals did Nico score in his debut season at Como?', 'nicopaz'); ?>
            </p>
            <div class="space-y-3">
                <button class="w-full text-left px-5 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 text-nico-dark dark:text-white text-sm font-semibold hover:border-celeste hover:bg-celeste/5 transition-all" onclick="this.classList.add('border-green-500','bg-green-50','text-green-700','dark:bg-green-900/20','dark:text-green-400','dark:border-green-500')">3 goals</button>
                <button class="w-full text-left px-5 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 text-nico-dark dark:text-white text-sm font-semibold hover:border-celeste hover:bg-celeste/5 transition-all" onclick="this.classList.add('border-red-500','bg-red-50','text-red-700','dark:bg-red-900/20','dark:text-red-400','dark:border-red-500')">5 goals</button>
                <button class="w-full text-left px-5 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 text-nico-dark dark:text-white text-sm font-semibold hover:border-celeste hover:bg-celeste/5 transition-all" onclick="this.classList.add('border-red-500','bg-red-50','text-red-700','dark:bg-red-900/20','dark:text-red-400','dark:border-red-500')">7 goals</button>
                <button class="w-full text-left px-5 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 text-nico-dark dark:text-white text-sm font-semibold hover:border-celeste hover:bg-celeste/5 transition-all" onclick="this.classList.add('border-red-500','bg-red-50','text-red-700','dark:bg-red-900/20','dark:text-red-400','dark:border-red-500')">10 goals</button>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
