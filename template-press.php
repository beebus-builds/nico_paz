<?php
/*
 * Template Name: Press & Media
 * Description: Press kit, official media assets, and contact information.
 */
get_header(); ?>

<main id="primary" class="site-main">

<!-- HERO -->
<section class="bg-white dark:bg-black py-16 md:py-24 border-b border-gray-100 dark:border-gray-900">
    <div class="container-main text-center max-w-4xl mx-auto">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-3">
            <?php esc_html_e('Media & Press', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-5xl md:text-7xl font-black text-nico-dark dark:text-white mb-6 text-balance">
            <?php esc_html_e('Press Kit', 'nicopaz'); ?>
        </h1>
        <p class="text-nico-gray dark:text-gray-400 text-lg leading-relaxed max-w-2xl mx-auto">
            <?php esc_html_e('Everything you need to write, film, or produce content about Nico Paz. High-resolution images, official logos, and the latest biography — all free to use with attribution.', 'nicopaz'); ?>
        </p>
        <div class="flex flex-wrap justify-center gap-3 mt-8">
            <a href="#downloads" class="btn-primary text-sm px-6 py-3">
                <?php esc_html_e('Download Assets', 'nicopaz'); ?>
            </a>
            <a href="mailto:press@nicopaz.com" class="btn-secondary text-sm px-6 py-3">
                <?php esc_html_e('Contact Press Team', 'nicopaz'); ?>
            </a>
        </div>
    </div>
</section>

<!-- QUICK FACTS -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-5xl">
        <div class="text-center mb-12">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('At a Glance', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Quick Facts', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-px bg-gray-200 dark:bg-gray-800 border border-gray-200 dark:border-gray-800 rounded-2xl overflow-hidden">
            <?php
            $facts = [
                ['label' => __('Full Name', 'nicopaz'),       'value' => 'Nicolás Paz Martinez'],
                ['label' => __('Date of Birth', 'nicopaz'),   'value' => 'Sep 8, 2004'],
                ['label' => __('Place of Birth', 'nicopaz'),  'value' => 'Santa Cruz de Tenerife, Spain'],
                ['label' => __('Nationality', 'nicopaz'),     'value' => 'Argentine / Spanish'],
                ['label' => __('Height', 'nicopaz'),          'value' => '1.84 m (6 ft 0 in)'],
                ['label' => __('Position', 'nicopaz'),        'value' => 'Attacking Midfielder'],
                ['label' => __('Current Club', 'nicopaz'),    'value' => 'Como 1907'],
                ['label' => __('Shirt Number', 'nicopaz'),    'value' => '#10'],
                ['label' => __('Preferred Foot', 'nicopaz'),  'value' => 'Left'],
                ['label' => __('Youth Academy', 'nicopaz'),   'value' => 'Real Madrid (La Fábrica)'],
                ['label' => __('Senior Debut', 'nicopaz'),    'value' => '2023 (Real Madrid)'],
                ['label' => __('Agent', 'nicopaz'),           'value' => 'Tactic Sports Group'],
            ];
            foreach ($facts as $f) : ?>
                <div class="bg-white dark:bg-black p-5">
                    <p class="text-xs uppercase tracking-wider text-nico-gray dark:text-gray-400 font-heading font-semibold mb-1"><?php echo esc_html($f['label']); ?></p>
                    <p class="font-heading font-bold text-nico-dark dark:text-white text-sm"><?php echo esc_html($f['value']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- BIOGRAPHY -->
<section class="section-padding bg-white dark:bg-black border-t border-gray-100 dark:border-gray-900">
    <div class="container-main max-w-4xl">
        <div class="text-center mb-10">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Biography', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('About Nico', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="space-y-5 text-nico-gray dark:text-gray-400 leading-relaxed text-base">
            <p>
                <?php esc_html_e('Nicolás "Nico" Paz Martinez (born 8 September 2004) is an Argentine professional footballer who plays as an attacking midfielder for Serie A club Como 1907 and the Argentina national team.', 'nicopaz'); ?>
            </p>
            <p>
                <?php esc_html_e('Born in Santa Cruz de Tenerife, Spain, Nico is the son of former Argentine international Pablo Paz, who represented Argentina at the 1998 FIFA World Cup. Nico joined Real Madrid\'s famed La Fábrica youth academy at the age of 10, where he developed into one of the most technically gifted midfielders of his generation.', 'nicopaz'); ?>
            </p>
            <p>
                <?php esc_html_e('He made his senior debut for Real Madrid in 2023, becoming one of the youngest players to represent the club in La Liga in the modern era. In 2024, he transferred to Como 1907 in Serie A, where he has since become a key creative force, known for his exceptional vision, passing range, and composure beyond his years.', 'nicopaz'); ?>
            </p>
            <p>
                <?php esc_html_e('Nico represents Argentina at youth international level and is widely regarded as one of the brightest prospects in world football. He has been featured in ESPN\'s "Top 20 Under 20" and profiled by leading outlets including The Guardian, Marca, and L\'Équipe.', 'nicopaz'); ?>
            </p>
        </div>
    </div>
</section>

<!-- HERO ACTION SHOT -->
<section class="bg-white dark:bg-black border-t border-gray-100 dark:border-gray-900">
    <div class="container-main">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2 aspect-[16/9] md:aspect-[2/1] overflow-hidden rounded-2xl bg-nico-gray-light dark:bg-gray-950">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/press-action-1.webp'); ?>"
                     alt="<?php esc_attr_e('Nico Paz action shot', 'nicopaz'); ?>"
                     class="w-full h-full object-cover">
            </div>
            <div class="grid grid-cols-2 md:grid-cols-1 gap-4">
                <div class="aspect-square overflow-hidden rounded-2xl bg-nico-gray-light dark:bg-gray-950">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/press-headshot-1.webp'); ?>"
                         alt="<?php esc_attr_e('Nico Paz portrait', 'nicopaz'); ?>"
                         class="w-full h-full object-cover">
                </div>
                <div class="aspect-square overflow-hidden rounded-2xl bg-nico-gray-light dark:bg-gray-950">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/press-headshot-2.webp'); ?>"
                         alt="<?php esc_attr_e('Nico Paz portrait', 'nicopaz'); ?>"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DOWNLOADABLE ASSETS -->
<section id="downloads" class="section-padding bg-white dark:bg-black border-t border-gray-100 dark:border-gray-900">
    <div class="container-main max-w-5xl">
        <div class="text-center mb-12">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Media Library', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Download Assets', 'nicopaz'); ?>
            </h2>
            <p class="text-nico-gray dark:text-gray-400 mt-3 max-w-xl mx-auto">
                <?php esc_html_e('Free to use for editorial purposes with attribution. Commercial use requires written permission.', 'nicopaz'); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $assets = [
                ['title' => __('Headshots (4K)', 'nicopaz'), 'desc' => __('5 high-resolution portrait photos', 'nicopaz'), 'size' => '24 MB', 'format' => 'JPG'],
                ['title' => __('Action Shots (4K)', 'nicopaz'), 'desc' => __('12 match and training photos', 'nicopaz'), 'size' => '78 MB', 'format' => 'JPG'],
                ['title' => __('Club Portraits', 'nicopaz'), 'desc' => __('Official Como & Argentina photos', 'nicopaz'), 'size' => '18 MB', 'format' => 'JPG'],
                ['title' => __('Logo Pack', 'nicopaz'), 'desc' => __('NP monogram in SVG, PNG, AI', 'nicopaz'), 'size' => '2 MB', 'format' => 'ZIP'],
                ['title' => __('Brand Guidelines', 'nicopaz'), 'desc' => __('Colors, fonts, logo usage', 'nicopaz'), 'size' => '4 MB', 'format' => 'PDF'],
                ['title' => __('Full Press Kit', 'nicopaz'), 'desc' => __('Everything in one archive', 'nicopaz'), 'size' => '126 MB', 'format' => 'ZIP'],
            ];
            foreach ($assets as $a) : ?>
                <div class="bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800 rounded-xl p-6 hover:border-celeste/30 dark:hover:border-celeste/30 transition-colors">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <h3 class="font-heading font-bold text-nico-dark dark:text-white text-base mb-1"><?php echo esc_html($a['title']); ?></h3>
                            <p class="text-nico-gray dark:text-gray-400 text-sm"><?php echo esc_html($a['desc']); ?></p>
                        </div>
                        <span class="px-2 py-1 rounded-full bg-celeste/10 dark:bg-white/10 text-celeste dark:text-white text-[10px] font-heading font-bold uppercase"><?php echo esc_html($a['format']); ?></span>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-800">
                        <span class="text-xs text-nico-gray/60 dark:text-gray-500 font-heading"><?php echo esc_html($a['size']); ?></span>
                        <a href="#" class="text-celeste dark:text-white font-heading font-bold text-xs hover:underline inline-flex items-center gap-1">
                            <?php esc_html_e('Download', 'nicopaz'); ?>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- BRAND COLORS & TYPOGRAPHY -->
<section class="section-padding bg-white dark:bg-black border-t border-gray-100 dark:border-gray-900">
    <div class="container-main max-w-5xl">
        <div class="text-center mb-12">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Visual Identity', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Brand Colors & Fonts', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="font-heading font-bold text-nico-dark dark:text-white text-sm uppercase tracking-wider mb-4"><?php esc_html_e('Colors', 'nicopaz'); ?></h3>
                <div class="grid grid-cols-2 gap-3">
                    <div class="border border-gray-200 dark:border-gray-800 rounded-lg overflow-hidden">
                        <div class="h-24 bg-nico-dark"></div>
                        <div class="p-3">
                            <p class="font-heading font-bold text-nico-dark dark:text-white text-sm">Pure Black</p>
                            <p class="text-xs text-nico-gray dark:text-gray-400 font-mono">#0A0A0A</p>
                        </div>
                    </div>
                    <div class="border border-gray-200 dark:border-gray-800 rounded-lg overflow-hidden">
                        <div class="h-24 bg-white border-b border-gray-200 dark:border-gray-800"></div>
                        <div class="p-3">
                            <p class="font-heading font-bold text-nico-dark dark:text-white text-sm">Pure White</p>
                            <p class="text-xs text-nico-gray dark:text-gray-400 font-mono">#FFFFFF</p>
                        </div>
                    </div>
                    <div class="border border-gray-200 dark:border-gray-800 rounded-lg overflow-hidden">
                        <div class="h-24 bg-nico-gray"></div>
                        <div class="p-3">
                            <p class="font-heading font-bold text-nico-dark dark:text-white text-sm">Cool Gray</p>
                            <p class="text-xs text-nico-gray dark:text-gray-400 font-mono">#6B7280</p>
                        </div>
                    </div>
                    <div class="border border-gray-200 dark:border-gray-800 rounded-lg overflow-hidden">
                        <div class="h-24 bg-nico-gray-light"></div>
                        <div class="p-3">
                            <p class="font-heading font-bold text-nico-dark dark:text-white text-sm">Light Gray</p>
                            <p class="text-xs text-nico-gray dark:text-gray-400 font-mono">#F3F4F6</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="font-heading font-bold text-nico-dark dark:text-white text-sm uppercase tracking-wider mb-4"><?php esc_html_e('Typography', 'nicopaz'); ?></h3>
                <div class="space-y-4">
                    <div class="p-5 border border-gray-200 dark:border-gray-800 rounded-lg">
                        <p class="font-heading text-3xl font-black text-nico-dark dark:text-white mb-1">Space Grotesk</p>
                        <p class="text-xs text-nico-gray dark:text-gray-400"><?php esc_html_e('Headlines & display', 'nicopaz'); ?></p>
                        <p class="font-mono text-xs text-nico-gray dark:text-gray-400 mt-2">A B C D E F G H I J K L M N O P</p>
                    </div>
                    <div class="p-5 border border-gray-200 dark:border-gray-800 rounded-lg">
                        <p class="font-body text-3xl text-nico-dark dark:text-white mb-1">JetBrains Mono</p>
                        <p class="text-xs text-nico-gray dark:text-gray-400"><?php esc_html_e('Body & UI', 'nicopaz'); ?></p>
                        <p class="font-mono text-xs text-nico-gray dark:text-gray-400 mt-2">0 1 2 3 4 5 6 7 8 9</p>
                    </div>
                    <div class="p-5 border border-gray-200 dark:border-gray-800 rounded-lg">
                        <p class="font-cursive text-3xl text-nico-dark dark:text-white mb-1">Dancing Script</p>
                        <p class="text-xs text-nico-gray dark:text-gray-400"><?php esc_html_e('Accent & cursive', 'nicopaz'); ?></p>
                        <p class="font-cursive text-xs text-nico-gray dark:text-gray-400 mt-2">Argentina · Como · Real Madrid</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRESS CONTACT -->
<section class="section-padding bg-nico-dark dark:bg-white text-white dark:text-nico-dark">
    <div class="container-main max-w-3xl text-center">
        <p class="text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Press Contact', 'nicopaz'); ?>
        </p>
        <h2 class="font-heading text-3xl md:text-4xl font-black mb-4">
            <?php esc_html_e('Get in Touch', 'nicopaz'); ?>
        </h2>
        <p class="opacity-80 mb-8 max-w-xl mx-auto">
            <?php esc_html_e('For interview requests, press inquiries, or media accreditation, please contact our press team. We aim to respond within 24 hours.', 'nicopaz'); ?>
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl mx-auto">
            <a href="mailto:press@nicopaz.com" class="group p-6 rounded-xl border border-white/20 dark:border-nico-dark/20 hover:border-gold dark:hover:border-gold transition-colors text-left">
                <p class="text-xs uppercase tracking-wider opacity-60 mb-1"><?php esc_html_e('Email', 'nicopaz'); ?></p>
                <p class="font-heading font-bold group-hover:text-gold transition-colors">press@nicopaz.com</p>
            </a>
            <a href="tel:+5491123456789" class="group p-6 rounded-xl border border-white/20 dark:border-nico-dark/20 hover:border-gold dark:hover:border-gold transition-colors text-left">
                <p class="text-xs uppercase tracking-wider opacity-60 mb-1"><?php esc_html_e('Phone', 'nicopaz'); ?></p>
                <p class="font-heading font-bold group-hover:text-gold transition-colors">+54 9 11 2345-6789</p>
            </a>
        </div>

        <div class="mt-10 pt-8 border-t border-white/20 dark:border-nico-dark/20">
            <p class="text-xs uppercase tracking-wider opacity-60 mb-3"><?php esc_html_e('Press Team', 'nicopaz'); ?></p>
            <p class="font-heading font-bold"><?php esc_html_e('Tactic Sports Group', 'nicopaz'); ?></p>
            <p class="text-sm opacity-80"><?php esc_html_e('Buenos Aires · Madrid · Milan', 'nicopaz'); ?></p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
