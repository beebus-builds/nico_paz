<?php
/*
 * Template Name: Behind the Scenes
 * Description: Daily life, training moments, and off-pitch content.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Off the Pitch', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Behind the Scenes', 'nicopaz'); ?>
        </h1>
        <p class="text-nico-gray dark:text-gray-400 mt-4 max-w-xl mx-auto">
            <?php esc_html_e('A look at life away from the spotlight — the work, the routine, and the moments that shape the player.', 'nicopaz'); ?>
        </p>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <?php
            $posts = [
                ['tag' => __('Match Day', 'nicopaz'), 'title' => __('Pre-Match Routine: How I Prepare for Kick-Off', 'nicopaz'), 'excerpt' => __('From the team talk to the final warm-up, a look at the rituals that get me focused before every match.', 'nicopaz'), 'time' => '5 min read'],
                ['tag' => __('Training', 'nicopaz'), 'title' => __('A Day in the Life at Como 1907', 'nicopaz'), 'excerpt' => __('An exclusive behind-the-scenes look at what a typical training day looks like at the club.', 'nicopaz'), 'time' => '7 min read'],
                ['tag' => __('Travel', 'nicopaz'), 'title' => __('Away Days: Traveling with the Team', 'nicopaz'), 'excerpt' => __('From hotel arrivals to away fan atmospheres — the travel experience in Serie A.', 'nicopaz'), 'time' => '4 min read'],
                ['tag' => __('Recovery', 'nicopaz'), 'title' => __('My Recovery & Nutrition Routine', 'nicopaz'), 'excerpt' => __('How I take care of my body after matches — ice baths, physio sessions, and meal plans.', 'nicopaz'), 'time' => '6 min read'],
            ];
            $post_images = ['training-1', 'training-2', 'press-headshot-3', 'press-headshot-4'];
            $i = 0;
            foreach ($posts as $p) :
                $bg = $post_images[$i % count($post_images)];
                $i++; ?>
                <a href="#" class="group block bg-nico-gray-light dark:bg-gray-950 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 hover:border-argentina-blue/30 dark:hover:border-argentina-blue/30 transition-all duration-300">
                    <div class="aspect-video bg-nico-dark/5 dark:bg-white/5 overflow-hidden">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $bg . '.webp'); ?>"
                             alt="<?php echo esc_attr($p['title']); ?>"
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-2.5 py-0.5 rounded-full bg-argentina-blue/10 dark:bg-white/10 text-argentina-blue dark:text-white text-xs font-heading font-bold"><?php echo esc_html($p['tag']); ?></span>
                            <span class="text-nico-gray dark:text-gray-400 text-xs"><?php echo esc_html($p['time']); ?></span>
                        </div>
                        <h3 class="font-heading font-bold text-lg text-nico-dark dark:text-white group-hover:text-argentina-blue dark:group-hover:text-white transition-colors mb-2"><?php echo esc_html($p['title']); ?></h3>
                        <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed"><?php echo esc_html($p['excerpt']); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="bg-nico-gray-light dark:bg-gray-950 rounded-2xl p-8 md:p-12 border border-gray-100 dark:border-gray-800 text-center">
            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-4">
                <?php esc_html_e('Subscribe for Exclusive Content', 'nicopaz'); ?>
            </h2>
            <p class="text-nico-gray dark:text-gray-400 mb-6 max-w-md mx-auto">
                <?php esc_html_e('Get behind-the-scenes updates, early access to merch drops, and exclusive content.', 'nicopaz'); ?>
            </p>
            <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                <input type="email" placeholder="<?php esc_attr_e('Your email address', 'nicopaz'); ?>" class="flex-1 px-5 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 text-nico-dark dark:text-white text-sm placeholder-gray-400 focus:ring-2 focus:ring-nico-dark/20 dark:focus:ring-white/20 focus:outline-none" required>
                <button type="submit" class="btn-primary text-sm px-6 py-3"><?php esc_html_e('Subscribe', 'nicopaz'); ?></button>
            </form>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
