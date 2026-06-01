<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <?php if (!is_front_page()) : ?>
            <section class="bg-white dark:bg-black py-16 md:py-20">
                <div class="container-main text-center">
                    <h1 class="font-heading text-3xl md:text-5xl font-black text-nico-dark dark:text-white">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </section>
        <?php endif; ?>

        <section class="container-main section-padding">
            <div class="max-w-3xl mx-auto">
                <article id="post-<?php the_ID(); ?>" <?php post_class('prose prose-lg max-w-none'); ?>>
                    <?php the_content(); ?>
                </article>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
