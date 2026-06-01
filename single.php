<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <section class="bg-white dark:bg-black py-16 md:py-20">
            <div class="container-main text-center">
                <h1 class="font-heading text-3xl md:text-5xl font-black text-nico-dark dark:text-white">
                    <?php the_title(); ?>
                </h1>
                <p class="text-nico-gray dark:text-gray-400 mt-4 text-sm">
                    <?php echo get_the_date(); ?> &middot; <?php the_category(', '); ?>
                </p>
            </div>
        </section>

        <section class="container-main section-padding">
            <div class="max-w-3xl mx-auto">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-8 rounded-xl overflow-hidden">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="prose prose-lg max-w-none">
                        <?php the_content(); ?>
                    </div>
                </article>

                <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800">
                    <?php
                    the_post_navigation([
                        'prev_text' => '<span class="text-sm text-nico-gray dark:text-gray-400">&larr; %title</span>',
                        'next_text' => '<span class="text-sm text-nico-gray dark:text-gray-400">%title &rarr;</span>',
                    ]);
                    ?>
                </div>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-800">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
