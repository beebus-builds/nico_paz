<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="bg-white dark:bg-black py-16 md:py-20">
        <div class="container-main text-center">
            <h1 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php printf(__('Search: %s', 'nicopaz'), get_search_query()); ?>
            </h1>
            <p class="text-nico-gray dark:text-gray-400 mt-4">
                <?php
                global $wp_query;
                printf(_n('%s result found', '%s results found', $wp_query->found_posts, 'nicopaz'), number_format_i18n($wp_query->found_posts));
                ?>
            </p>
        </div>
    </section>

    <section class="container-main section-padding">
        <div class="max-w-3xl mx-auto">
            <?php if (have_posts()) : ?>
                <div class="space-y-6">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('bg-nico-gray-light dark:bg-gray-950 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 p-6 hover:shadow-md transition-shadow'); ?>>
                            <h2 class="font-heading text-xl font-bold mb-2">
                                <a href="<?php the_permalink(); ?>" class="text-nico-dark dark:text-gray-100 hover:text-celeste dark:hover:text-white transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <p class="text-nico-gray dark:text-gray-400 text-sm mb-2"><?php echo get_the_date(); ?></p>
                            <p class="text-nico-gray dark:text-gray-400 text-sm"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="mt-12">
                    <?php the_posts_pagination([
                        'mid_size'  => 2,
                        'prev_text' => __('&larr; Previous', 'nicopaz'),
                        'next_text' => __('Next &rarr;', 'nicopaz'),
                    ]); ?>
                </div>
            <?php else : ?>
                <div class="text-center py-12">
                    <p class="text-nico-gray dark:text-gray-400 mb-6"><?php esc_html_e('No results found for your search.', 'nicopaz'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
