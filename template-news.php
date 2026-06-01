<?php
/*
 * Template Name: News
 * Description: Latest news and blog posts about Nico Paz.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Updates', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Latest News', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <?php
        $recent_posts = new WP_Query([
            'posts_per_page' => 9,
            'post_status'    => 'publish',
            'ignore_sticky_posts' => true,
        ]);

        if ($recent_posts->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                    <article class="bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden border border-gray-100 dark:border-gray-800 hover:-translate-y-1 transition-all duration-300">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-500']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-5">
                            <span class="text-xs text-argentina-blue dark:text-white font-heading font-semibold uppercase tracking-wider"><?php echo get_the_date('M j, Y'); ?></span>
                            <h2 class="font-heading font-bold text-base mt-1 mb-2">
                                <a href="<?php the_permalink(); ?>" class="text-nico-dark dark:text-gray-100 hover:text-argentina-blue dark:hover:text-white transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="mt-12">
                <?php the_posts_pagination([
                    'mid_size'  => 2,
                    'prev_text' => __('&larr; Previous', 'nicopaz'),
                    'next_text' => __('Next &rarr;', 'nicopaz'),
                ]); ?>
            </div>
        <?php else : ?>
            <div class="text-center py-16 bg-nico-gray-light dark:bg-gray-950 rounded-xl border border-gray-100 dark:border-gray-800">
                <div class="text-5xl mb-4">📰</div>
                <p class="text-nico-gray dark:text-gray-400 text-lg font-heading font-bold"><?php esc_html_e('No news articles yet. Check back soon!', 'nicopaz'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

</main>

<?php get_footer(); ?>
