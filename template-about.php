<?php
/*
 * Template Name: About
 * Description: Bio, personal story, and key stats for Nico Paz.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('About', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('The Story of Nico Paz', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-14 items-start">

            <div class="lg:col-span-3">
                <h2 class="font-heading text-2xl md:text-3xl font-black text-nico-dark dark:text-white mb-6">
                    <?php esc_html_e('Early Life & Roots', 'nicopaz'); ?>
                </h2>
                <div class="space-y-4 text-nico-gray dark:text-gray-400 leading-relaxed">
                    <p><?php esc_html_e('Nico Paz was born on January 17, 2004 in Tenerife, Spain, into a family deeply rooted in football. His father, Pablo Paz, was a professional defender who represented Argentina at the 1998 FIFA World Cup in France and had a distinguished career across European clubs.', 'nicopaz'); ?></p>
                    <p><?php esc_html_e('Growing up in a household where football was more than just a sport — it was a way of life — Nico was drawn to the game from the moment he could walk. The values of discipline, hard work, and tactical awareness were instilled in him from an early age.', 'nicopaz'); ?></p>
                    <p><?php esc_html_e('Born with natural talent and an innate understanding of the game, Nico quickly stood out among his peers. His technical ability, vision, and composure on the ball were evident even in his earliest years playing street football and youth leagues.', 'nicopaz'); ?></p>
                </div>

                <h2 class="font-heading text-2xl md:text-3xl font-black text-nico-dark dark:text-white mt-12 mb-6">
                    <?php esc_html_e('The Real Madrid Years', 'nicopaz'); ?>
                </h2>
                <div class="space-y-4 text-nico-gray dark:text-gray-400 leading-relaxed">
                    <p><?php esc_html_e('At just 10 years old, Nico made the life-changing decision to join Real Madrid\'s renowned youth academy, La Fábrica. This move marked the beginning of his professional development in one of the most prestigious football institutions in the world.', 'nicopaz'); ?></p>
                    <p><?php esc_html_e('Over the next eight years, Nico honed his craft under the guidance of world-class coaches. He progressed through every age group, showcasing remarkable growth as a creative midfielder with an exceptional passing range and the ability to unlock defenses with his technical brilliance.', 'nicopaz'); ?></p>
                    <p><?php esc_html_e('His performances in the youth categories earned him a call-up to Real Madrid Castilla, the club\'s reserve team competing in Primera Federación. There, he continued to develop alongside some of the finest young talents in Spanish football.', 'nicopaz'); ?></p>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 aspect-[4/5] sticky top-28">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about.webp'); ?>" alt="<?php esc_attr_e('Nico Paz', 'nicopaz'); ?>" class="w-full h-full object-cover" loading="lazy">
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-16 bg-white dark:bg-black border-t border-b border-gray-100 dark:border-gray-900">
    <div class="container-main">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <?php
            $stats = [
                ['value' => '20', 'label' => __('Age', 'nicopaz')],
                ['value' => '173', 'label' => __('Height (cm)', 'nicopaz')],
                ['value' => 'CM', 'label' => __('Position', 'nicopaz')],
                ['value' => '🇦🇷', 'label' => __('Nationality', 'nicopaz')],
            ];
            foreach ($stats as $s) : ?>
                <div>
                    <p class="font-heading text-4xl md:text-5xl font-black text-argentina-blue dark:text-white"><?php echo esc_html($s['value']); ?></p>
                    <p class="text-nico-gray dark:text-gray-400 text-sm uppercase tracking-wider mt-2 font-heading font-semibold"><?php echo esc_html($s['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-3xl">
        <h2 class="font-heading text-2xl md:text-3xl font-black text-nico-dark dark:text-white mb-6">
            <?php esc_html_e('Playing Style', 'nicopaz'); ?>
        </h2>
        <div class="space-y-4 text-nico-gray dark:text-gray-400 leading-relaxed">
            <p><?php esc_html_e('Nico Paz is an attacking midfielder known for his exceptional vision, technical ability, and composure beyond his years. His playing style combines the creative flair of Argentine football with the tactical discipline learned at Real Madrid.', 'nicopaz'); ?></p>
            <p><?php esc_html_e('With an innate ability to read the game and pick out passes in tight spaces, Nico has drawn comparisons to some of the greatest midfielders in Argentine football history. His dribbling ability, close control, and eye for goal make him a constant threat in the final third.', 'nicopaz'); ?></p>
            <p><?php esc_html_e('Whether playing as a central attacking midfielder or drifting wide, Nico brings creativity, energy, and a winning mentality to every match. His potential is limitless, and his journey is only just beginning.', 'nicopaz'); ?></p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
