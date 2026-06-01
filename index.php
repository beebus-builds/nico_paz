<?php get_header(); ?>

<main id="primary" class="site-main container-main section-padding">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white dark:bg-gray-950 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden hover:shadow-md transition-shadow'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden">
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300']); ?>
                                </a>
                            <?php endif; ?>
                            <div class="p-6">
                                <h2 class="font-heading text-xl font-bold mb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-nico-dark dark:text-gray-100 hover:text-argentina-blue transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="text-nico-gray dark:text-gray-400 text-sm mb-4">
                                    <?php echo get_the_date(); ?> &middot; <?php comments_number(); ?>
                                </div>
                                <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed mb-4">
                                    <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="btn-primary text-sm">
                                    <?php esc_html_e('Read More', 'nicopaz'); ?>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="mt-12">
                    <?php the_posts_pagination([
                        'mid_size'  => 2,
                        'prev_text' => __('&larr; Previous', 'nicopaz'),
                        'next_text' => __('Next &rarr;', 'nicopaz'),
                        'class'     => 'flex items-center gap-4',
                    ]); ?>
                </div>
            <?php else : ?>
                <p><?php esc_html_e('No posts found.', 'nicopaz'); ?></p>
            <?php endif; ?>
        </div>

        <aside class="lg:col-span-1">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</main>

<?php get_footer(); ?>
