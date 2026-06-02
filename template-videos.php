<?php
/*
 * Template Name: Videos & Highlights
 * Description: Video highlights, goals, and match compilations.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Highlights', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Videos & Highlights', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="mb-10">
            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-4">
                <?php esc_html_e('Featured', 'nicopaz'); ?>
            </h2>
            <div class="aspect-video bg-nico-gray-light dark:bg-gray-950 rounded-2xl flex items-center justify-center border border-gray-100 dark:border-gray-800">
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-nico-dark/10 dark:bg-white/20 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-nico-dark dark:text-white ml-1" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                    <p class="text-nico-gray dark:text-gray-400 text-sm font-heading font-semibold"><?php esc_html_e('Video highlight reel coming soon', 'nicopaz'); ?></p>
                </div>
            </div>
        </div>

        <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-6">
            <?php esc_html_e('Latest Videos', 'nicopaz'); ?>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $videos = [
                ['title' => __('Best Goals & Assists 2024', 'nicopaz'), 'duration' => '12:34', 'views' => '1.2M'],
                ['title' => __('Debut Goal vs Barcelona', 'nicopaz'), 'duration' => '3:45', 'views' => '850K'],
                ['title' => __('Training Skills Compilation', 'nicopaz'), 'duration' => '8:20', 'views' => '420K'],
                ['title' => __('Match Highlights: Como vs Inter', 'nicopaz'), 'duration' => '10:15', 'views' => '680K'],
                ['title' => __('Behind the Scenes: Match Day', 'nicopaz'), 'duration' => '15:00', 'views' => '310K'],
                ['title' => __('Top 10 Plays of the Season', 'nicopaz'), 'duration' => '7:45', 'views' => '550K'],
            ];
            foreach ($videos as $v) : ?>
                <div class="group cursor-pointer">
                    <div class="aspect-video bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden relative border border-gray-100 dark:border-gray-800">
                        <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/20 dark:group-hover:bg-white/10 transition-colors z-10"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-14 h-14 rounded-full bg-nico-dark/80 dark:bg-white/80 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white dark:text-nico-dark ml-0.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                        <span class="absolute bottom-2 right-2 bg-nico-dark/80 text-white text-xs font-semibold px-2 py-1 rounded"><?php echo esc_html($v['duration']); ?></span>
                    </div>
                    <h3 class="font-heading font-bold text-sm mt-3 text-nico-dark dark:text-white group-hover:text-celeste dark:group-hover:text-white transition-colors"><?php echo esc_html($v['title']); ?></h3>
                    <p class="text-nico-gray dark:text-gray-400 text-xs mt-1"><?php echo esc_html($v['views']); ?> <?php esc_html_e('views', 'nicopaz'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
