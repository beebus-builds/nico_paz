<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="bg-white dark:bg-black py-16 md:py-24">
        <div class="container-main text-center">
            <h1 class="font-heading text-3xl md:text-5xl font-black text-nico-dark dark:text-white">
                <?php the_archive_title(); ?>
            </h1>
            <?php if (get_the_archive_description()) : ?>
                <p class="text-nico-gray dark:text-gray-400 mt-4 max-w-xl mx-auto">
                    <?php echo get_the_archive_description(); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <section class="container-main section-padding">
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-nico-gray-light dark:bg-gray-950 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden hover:shadow-md transition-shadow'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden">
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-6">
                            <h2 class="font-heading text-xl font-bold mb-2">
                                <a href="<?php the_permalink(); ?>" class="text-nico-dark dark:text-gray-100 hover:text-argentina-blue dark:hover:text-white transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <p class="text-nico-gray dark:text-gray-400 text-sm mb-4">
                                <?php echo get_the_date(); ?>
                            </p>
                            <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                        </div>
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
                <p class="text-nico-gray dark:text-gray-400"><?php esc_html_e('Nothing found here.', 'nicopaz'); ?></p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
