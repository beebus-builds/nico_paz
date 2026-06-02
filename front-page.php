<?php get_header(); ?>

<main id="primary" class="site-main">

<!-- ============================================================
     1. HERO CAROUSEL
     ============================================================ -->
<section id="hero-carousel" class="relative min-h-screen overflow-hidden bg-white dark:bg-black">

    <?php
    $hero_slides = [
        [
            'image'    => get_template_directory_uri() . '/assets/images/hero-1.webp',
            'overlay'  => 'from-black/80 via-black/50 to-black/70',
            'tag'      => __('PROFESSIONAL FOOTBALLER · ARGENTINA', 'nicopaz'),
            'heading'  => 'NICO<br><span class="text-sticker-gold">PAZ</span>',
            'buttons'  => [
                ['url' => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : null, 'label' => __('Shop Now', 'nicopaz'), 'class' => 'btn-gold text-sm sm:text-lg px-6 sm:px-8 py-2.5 sm:py-3'],
                ['url' => '#about', 'label' => __('Explore', 'nicopaz'), 'class' => 'btn-secondary border-white/80 text-white hover:bg-white hover:text-nico-dark text-sm sm:text-lg px-6 sm:px-8 py-2.5 sm:py-3'],
            ],
        ],
        [
            'image'    => get_template_directory_uri() . '/assets/images/hero-2.webp',
            'overlay'  => 'from-black/80 via-black/50 to-black/70',
            'tag'      => __('OFFICIAL MERCHANDISE · NEW DROP', 'nicopaz'),
            'heading'  => 'SHOP<br><span class="text-sticker-gold">THE KIT</span>',
            'buttons'  => [
                ['url' => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : null, 'label' => __('Visit Shop', 'nicopaz'), 'class' => 'btn-gold text-sm sm:text-lg px-6 sm:px-8 py-2.5 sm:py-3'],
                ['url' => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) . '?orderby=date' : null, 'label' => __('New Arrivals', 'nicopaz'), 'class' => 'btn-secondary border-white/80 text-white hover:bg-white hover:text-nico-dark text-sm sm:text-lg px-6 sm:px-8 py-2.5 sm:py-3'],
            ],
        ],
        [
            'image'    => get_template_directory_uri() . '/assets/images/hero-3.webp',
            'overlay'  => 'from-black/80 via-black/50 to-black/70',
            'tag'      => __('RISING STAR · FROM LA FÁBRICA', 'nicopaz'),
            'heading'  => 'MADRID<br>→ <span class="text-sticker-gold">COMO</span>',
            'buttons'  => [
                ['url' => '#timeline', 'label' => __('Career Timeline', 'nicopaz'), 'class' => 'btn-primary text-sm sm:text-lg px-6 sm:px-8 py-2.5 sm:py-3'],
                ['url' => '#about', 'label' => __('Learn More', 'nicopaz'), 'class' => 'btn-secondary border-white/80 text-white hover:bg-white hover:text-nico-dark text-sm sm:text-lg px-6 sm:px-8 py-2.5 sm:py-3'],
            ],
        ],
        [
            'image'    => get_template_directory_uri() . '/assets/images/hero-4.webp',
            'overlay'  => 'from-black/80 via-black/50 to-black/70',
            'tag'      => __('STAY CONNECTED · FOLLOW ALONG', 'nicopaz'),
            'heading'  => 'FOLLOW<br><span class="text-sticker-gold">EL CAMINO</span>',
            'buttons'  => [
                ['url' => 'https://instagram.com', 'label' => __('Instagram', 'nicopaz'), 'class' => 'btn-gold text-sm sm:text-lg px-6 sm:px-8 py-2.5 sm:py-3'],
                ['url' => '#contact', 'label' => __('Contact', 'nicopaz'), 'class' => 'btn-secondary border-white/80 text-white hover:bg-white hover:text-nico-dark text-sm sm:text-lg px-6 sm:px-8 py-2.5 sm:py-3'],
            ],
        ],
    ];

    $hero_count = count($hero_slides);
    ?>

    <div id="hero-slides" class="absolute inset-0" data-active="0" data-interval="6000">
        <?php foreach ($hero_slides as $i => $slide) : ?>
            <div class="hero-slide absolute inset-0 <?php echo $i === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none'; ?> transition-opacity duration-1000 ease-in-out">
                <?php if (!empty($slide['image'])) : ?>
                    <div class="hero-bg absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($slide['image']); ?>');"></div>
                <?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-t <?php echo esc_attr($slide['overlay']); ?>"></div>
                <div class="absolute inset-0 bg-grid-pattern-dark opacity-30"></div>

                <!-- Giant #10 number plate in background -->
                <div class="absolute -right-10 md:right-4 top-1/2 -translate-y-1/2 z-0 pointer-events-none select-none hidden md:block">
                    <div class="number-plate opacity-20">10</div>
                </div>

                <!-- Sun of May in top corner -->
                <div class="absolute top-8 right-8 z-10 hidden md:block">
                    <div class="sun-may sun-spin" aria-hidden="true"></div>
                </div>

                <!-- Argentina flag bar accent -->
                <div class="absolute top-0 left-0 right-0 h-1 z-20 bg-flag-stripes"></div>

                <div class="absolute inset-0 flex items-end justify-start z-10">
                    <div class="px-6 md:px-12 pb-28 md:pb-36 w-full">
                        <div class="max-w-5xl">
                            <!-- Tilted Bebas tag -->
                            <div class="mb-3 md:mb-4 flex items-center gap-3">
                                <span class="text-stamp text-stamp-r">#10</span>
                                <span class="text-bebas text-gold text-sm sm:text-base md:text-xl tracking-[0.3em]"><?php echo esc_html($slide['tag']); ?></span>
                            </div>

                            <!-- Massive jersey-style name with sticker effect -->
                            <h1 class="text-jersey text-glow-white text-sticker-celeste-big text-[5rem] sm:text-[7rem] md:text-[10rem] lg:text-[13rem] leading-[0.78] mb-4 text-balance">
                                <?php echo $slide['heading']; ?>
                            </h1>

                            <!-- Cursive accent -->
                            <p class="font-cursive text-gold text-2xl sm:text-3xl md:text-5xl mb-6 md:mb-8 text-tilt-l inline-block">
                                <?php esc_html_e('Celeste y Blanca', 'nicopaz'); ?>
                                <span class="sun-may-solid ml-2 align-middle" aria-hidden="true"></span>
                            </p>

                            <!-- Flag ribbon + buttons -->
                            <div class="flex flex-col gap-5">
                                <div class="flag-ribbon flag-ribbon-thick w-32 sm:w-48"></div>
                                <div class="flex flex-wrap gap-3">
                                    <?php foreach ($slide['buttons'] as $btn) : ?>
                                        <?php
                                        $disabled = !$btn['url'] ? 'opacity-50 pointer-events-none' : '';
                                        $href = $btn['url'] ?: '#';
                                        ?>
                                        <a href="<?php echo esc_url($href); ?>" class="<?php echo esc_attr($btn['class'] . ' ' . $disabled); ?>">
                                            <?php echo esc_html($btn['label']); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex gap-2">
        <?php for ($i = 0; $i < $hero_count; $i++) : ?>
            <button class="hero-dot w-2.5 h-2.5 rounded-full transition-all duration-300 <?php echo $i === 0 ? 'bg-white w-7' : 'bg-white/40 hover:bg-white/70'; ?>" data-index="<?php echo $i; ?>" aria-label="<?php printf(esc_attr__('Go to slide %d', 'nicopaz'), $i + 1); ?>"></button>
        <?php endfor; ?>
    </div>
</section>

<!-- ============================================================
     2. QUICK STATS STRIP
     ============================================================ -->
<section class="bg-ink-celeste py-12 md:py-16 border-t border-b border-celeste/20 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern-dark opacity-50"></div>
    <div class="absolute -top-20 -left-20 w-80 h-80 bg-celeste-glow pointer-events-none"></div>
    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-gold-glow pointer-events-none"></div>
    <div class="container-main relative">
        <div class="text-center mb-8">
            <p class="text-bebas text-gold text-sm tracking-[0.4em]">// <?php esc_html_e('BY THE NUMBERS', 'nicopaz'); ?> //</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 md:gap-4 text-center">
            <?php
            $quick_stats = [
                ['value' => '20', 'suffix' => '', 'label' => __('Age', 'nicopaz')],
                ['value' => '10', 'suffix' => '', 'label' => __('Number', 'nicopaz')],
                ['value' => 'RM', 'suffix' => '', 'label' => __('Ex-Club', 'nicopaz')],
                ['value' => 'ARG', 'suffix' => '', 'label' => __('Nationality', 'nicopaz')],
                ['value' => '15', 'suffix' => '+', 'label' => __('Appearances', 'nicopaz')],
                ['value' => '5', 'suffix' => '+', 'label' => __('Goals', 'nicopaz')],
            ];
            foreach ($quick_stats as $stat) : ?>
                <div class="bg-celeste/5 border border-celeste/20 rounded-xl p-4 hover:bg-celeste/10 transition-colors">
                    <p class="text-jersey text-white text-3xl md:text-4xl lg:text-5xl leading-none mb-1">
                        <span class="counter" data-target="<?php echo esc_attr($stat['value']); ?>">0</span><?php echo esc_html($stat['suffix']); ?>
                    </p>
                    <p class="text-bebas text-gold text-xs tracking-[0.2em] mt-2"><?php echo esc_html($stat['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     3. ABOUT
     ============================================================ -->
<section id="about" class="section-padding bg-white dark:bg-black relative overflow-hidden">
    <div class="absolute top-0 left-0 right-0 h-1 bg-flag-stripes"></div>
    <div class="absolute -top-20 -right-20 w-96 h-96 bg-sunburst-rays opacity-30 pointer-events-none"></div>
    <div class="container-main relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <span class="sun-may-solid" aria-hidden="true"></span>
                    <span class="text-bebas text-celeste dark:text-gold text-sm tracking-[0.3em]">// <?php esc_html_e('About', 'nicopaz'); ?> · 01</span>
                </div>
                <h2 class="text-jersey text-nico-dark dark:text-white text-5xl md:text-7xl lg:text-8xl leading-[0.85] mb-6 text-balance">
                    <span class="text-stroke-celeste"><?php esc_html_e('THE', 'nicopaz'); ?></span><br>
                    <span class="text-sticker-celeste"><?php esc_html_e('JOURNEY', 'nicopaz'); ?></span>
                </h2>
                <div class="flag-ribbon w-24 mb-6"></div>
                <div class="space-y-4 text-nico-gray dark:text-gray-400 leading-relaxed">
                    <p><?php esc_html_e('Nico Paz is an Argentine professional footballer known for his vision, technique, and creativity on the pitch. With a journey that spans from the youth ranks to the professional stage, he embodies the spirit of Argentine football.', 'nicopaz'); ?></p>
                    <p><?php esc_html_e('Born with football in his blood, Nico continues to write his story — one match, one goal, one moment of magic at a time.', 'nicopaz'); ?></p>
                </div>
                <div class="flex flex-wrap gap-4 mt-8">
                    <div class="jersey-plate">
                        <span class="text-jersey text-2xl md:text-3xl"><span class="counter" data-target="2004">0</span></span>
                    </div>
                    <div>
                        <p class="text-jersey text-celeste text-2xl md:text-3xl">CM · 10</p>
                        <p class="text-bebas text-xs text-nico-gray dark:text-gray-400 tracking-widest mt-1"><?php esc_html_e('POSITION · SHIRT', 'nicopaz'); ?></p>
                    </div>
                    <div>
                        <p class="text-jersey text-gold text-2xl md:text-3xl">🇦🇷</p>
                        <p class="text-bebas text-xs text-nico-gray dark:text-gray-400 tracking-widest mt-1"><?php esc_html_e('NATIONAL TEAM', 'nicopaz'); ?></p>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 aspect-[4/5]">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about.webp'); ?>" alt="<?php esc_attr_e('Nico Paz', 'nicopaz'); ?>" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     4. CAREER TIMELINE
     ============================================================ -->
<section id="timeline" class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-14">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Path to Glory', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-gray-100">
                <?php esc_html_e('Career Timeline', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="max-w-3xl mx-auto relative">
            <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-celeste/20 -translate-x-1/2"></div>

            <?php
            $milestones = [
                [
                    'year' => '2004',
                    'title' => __('Born in Tenerife, Spain', 'nicopaz'),
                    'desc'  => __('Nico Paz was born into a football family — his father Pablo Paz was a professional footballer who represented Argentina at the 1998 World Cup.', 'nicopaz'),
                    'side'  => 'right',
                ],
                [
                    'year' => '2014',
                    'title' => __('Joined Real Madrid Youth Academy', 'nicopaz'),
                    'desc'  => __('At age 10, Nico joined La Fábrica, the renowned Real Madrid youth system, where he developed his technical skills and football IQ.', 'nicopaz'),
                    'side'  => 'left',
                ],
                [
                    'year' => '2022',
                    'title' => __('Real Madrid Castilla Debut', 'nicopaz'),
                    'desc'  => __('Promoted to Real Madrid Castilla (the B team) in Primera Federación, making his mark as a creative midfielder.', 'nicopaz'),
                    'side'  => 'right',
                ],
                [
                    'year' => '2023',
                    'title' => __('First Team Debut for Real Madrid', 'nicopaz'),
                    'desc'  => __('Made his official first-team debut for Real Madrid in La Liga, fulfilling a childhood dream at the Santiago Bernabéu.', 'nicopaz'),
                    'side'  => 'left',
                ],
                [
                    'year' => '2024',
                    'title' => __('Moved to Como 1907', 'nicopaz'),
                    'desc'  => __('Joined Italian Serie A side Como 1907, bringing his talent to the tactical and competitive landscape of Italian football.', 'nicopaz'),
                    'side'  => 'right',
                ],
                [
                    'year' => '2025',
                    'title' => __('International Recognition', 'nicopaz'),
                    'desc'  => __('Earned call-ups and recognition from Argentine youth national teams, continuing the legacy of representing his country.', 'nicopaz'),
                    'side'  => 'left',
                ],
            ];

            foreach ($milestones as $i => $m) :
                $is_left = $m['side'] === 'left';
            ?>
                <div class="relative mb-12 last:mb-0">
                    <div class="hidden md:block absolute left-1/2 top-2 w-4 h-4 rounded-full bg-celeste border-4 border-white shadow -translate-x-1/2 z-10"></div>
                    <div class="block md:hidden absolute left-4 top-2 w-3 h-3 rounded-full bg-celeste border-2 border-white shadow z-10"></div>

                    <div class="<?php echo $is_left ? 'md:pr-[52%] md:text-right' : 'md:pl-[52%]'; ?> pl-12 md:pl-0">
                        <span class="inline-block font-heading text-xs font-bold text-celeste dark:text-white bg-celeste/10 dark:bg-white/10 px-3 py-1 rounded-full uppercase tracking-wider mb-2">
                            <?php echo esc_html($m['year']); ?>
                        </span>
                        <h3 class="font-heading text-lg md:text-xl font-bold text-nico-dark dark:text-gray-100"><?php echo esc_html($m['title']); ?></h3>
                        <p class="text-nico-gray dark:text-gray-400 text-sm mt-2 leading-relaxed"><?php echo esc_html($m['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     5. SHOP CATEGORIES
     ============================================================ -->
<?php if (function_exists('wc_get_page_id')) : ?>
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-10">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Collections', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-gray-100">
                <?php esc_html_e('Shop by Category', 'nicopaz'); ?>
            </h2>
        </div>

        <?php
        $product_categories = [];
        if (taxonomy_exists('product_cat')) {
            $product_categories = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'number'     => 4,
            ]);
        }

        if (!empty($product_categories) && !is_wp_error($product_categories)) : ?>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <?php foreach ($product_categories as $cat) : ?>
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>" class="group bg-nico-gray-light dark:bg-gray-950 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 p-8 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-celeste/10 dark:bg-white/10 flex items-center justify-center group-hover:bg-celeste dark:group-hover:bg-white transition-colors">
                            <span class="text-2xl group-hover:text-white dark:group-hover:text-nico-dark text-celeste dark:text-white transition-colors font-heading font-bold">NP</span>
                        </div>
                        <h3 class="font-heading font-bold text-nico-dark dark:text-gray-100 group-hover:text-celeste dark:group-hover:text-white transition-colors"><?php echo esc_html($cat->name); ?></h3>
                        <p class="text-xs text-nico-gray dark:text-gray-400 mt-1"><?php echo sprintf(_n('%s product', '%s products', $cat->count, 'nicopaz'), $cat->count); ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <?php
                $category_placeholders = [
                    __('Jerseys', 'nicopaz'),
                    __('Accessories', 'nicopaz'),
                    __('Posters', 'nicopaz'),
                    __('Limited Edition', 'nicopaz'),
                ];
                foreach ($category_placeholders as $cat_name) : ?>
                    <div class="bg-nico-gray-light dark:bg-gray-950 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 p-8 text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-celeste/10 dark:bg-white/10 flex items-center justify-center">
                            <span class="text-2xl text-celeste dark:text-white font-heading font-bold">NP</span>
                        </div>
                        <h3 class="font-heading font-bold text-nico-dark dark:text-gray-100"><?php echo esc_html($cat_name); ?></h3>
                        <p class="text-xs text-nico-gray dark:text-gray-400 mt-1"><?php esc_html_e('Coming soon', 'nicopaz'); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     6. FEATURED PRODUCTS
     ============================================================ -->
<?php if (class_exists('WooCommerce')) : ?>
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-12">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Official Merchandise', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-gray-100">
                <?php esc_html_e('Featured Products', 'nicopaz'); ?>
            </h2>
            <p class="text-nico-gray dark:text-gray-400 mt-3 max-w-xl mx-auto">
                <?php esc_html_e('Grab the latest Nico Paz gear. Authentic, high-quality, and made for fans.', 'nicopaz'); ?>
            </p>
        </div>

        <?php
        $featured_products = wc_get_products([
            'limit'  => 8,
            'status' => 'publish',
        ]);

        if (!empty($featured_products)) : ?>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <?php foreach ($featured_products as $product) :
                    $product_id = $product->get_id();
                    $product_obj = wc_get_product($product_id);
                ?>
                    <div class="product-card group">
                        <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="block aspect-[4/5] overflow-hidden bg-nico-gray-light dark:bg-gray-800">
                            <?php echo $product_obj->get_image('nicopaz-product', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500']); ?>
                        </a>
                        <div class="p-4">
                            <h3 class="font-heading font-bold text-sm md:text-base mb-1 truncate">
                                <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="text-nico-dark dark:text-gray-100 hover:text-celeste dark:hover:text-white transition-colors">
                                    <?php echo esc_html($product_obj->get_name()); ?>
                                </a>
                            </h3>
                            <p class="text-celeste dark:text-white font-bold text-sm md:text-base">
                                <?php echo $product_obj->get_price_html(); ?>
                            </p>
                            <a href="<?php echo esc_url($product_obj->add_to_cart_url()); ?>" class="mt-3 w-full btn-primary text-xs py-2 text-center <?php echo $product_obj->is_type('variable') ? 'opacity-60' : ''; ?>">
                                <?php echo $product_obj->is_type('variable') ? esc_html__('View Options', 'nicopaz') : esc_html__('Add to Cart', 'nicopaz'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12">
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-primary text-lg px-10 py-4">
                    <?php esc_html_e('View All Products', 'nicopaz'); ?>
                </a>
            </div>
        <?php else : ?>
            <div class="text-center py-16 bg-nico-gray-light dark:bg-gray-950 rounded-xl border border-gray-100 dark:border-gray-800">
                <div class="text-5xl mb-4">🏟️</div>
                <p class="text-nico-gray dark:text-gray-400 text-lg font-heading font-bold"><?php esc_html_e('Products coming soon. Stay tuned!', 'nicopaz'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     7. VIDEO HIGHLIGHTS
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-10">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Highlights', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Moments on the Pitch', 'nicopaz'); ?>
            </h2>
            <p class="text-nico-gray dark:text-gray-400 mt-3 max-w-xl mx-auto">
                <?php esc_html_e('Watch Nico in action — skill, vision, and passion every time he steps on the field.', 'nicopaz'); ?>
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="aspect-video bg-nico-gray-light/50 dark:bg-white/5 rounded-2xl flex items-center justify-center">
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

        <div class="flex justify-center mt-8 gap-4">
            <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="btn-secondary border-nico-dark/30 dark:border-white/30 text-nico-dark dark:text-white hover:bg-nico-dark hover:text-white dark:hover:bg-white dark:hover:text-nico-dark text-sm">
                <?php esc_html_e('Watch on YouTube', 'nicopaz'); ?>
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="btn-secondary border-nico-dark/30 dark:border-white/30 text-nico-dark dark:text-white hover:bg-nico-dark hover:text-white dark:hover:bg-white dark:hover:text-nico-dark text-sm">
                <?php esc_html_e('Follow on Instagram', 'nicopaz'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     8. PHOTO GALLERY
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black relative overflow-hidden">
    <div class="absolute top-0 left-0 right-0 h-1 bg-flag-stripes"></div>
    <div class="container-main">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="sun-may-solid" aria-hidden="true"></span>
                <span class="text-bebas text-celeste dark:text-gold text-sm tracking-[0.3em]">// <?php esc_html_e('Gallery', 'nicopaz'); ?> · 02</span>
                <span class="sun-may-solid" aria-hidden="true"></span>
            </div>
            <h2 class="text-jersey text-nico-dark dark:text-white text-5xl md:text-7xl lg:text-8xl leading-[0.85] mb-3 text-balance">
                <span class="text-sticker-celeste"><?php esc_html_e('THROUGH', 'nicopaz'); ?></span>
                <span class="text-stroke-celeste"><?php esc_html_e('THE LENS', 'nicopaz'); ?></span>
            </h2>
            <div class="flag-ribbon flag-ribbon-r w-32 mx-auto mt-4"></div>
        </div>

        <?php
        $gallery_items = [
            ['img' => 'gallery-1', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-2', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-3', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-4', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-5', 'size' => 'aspect-[2/1] md:aspect-[2/1]', 'col' => 'md:col-span-2'],
            ['img' => 'gallery-6', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-7', 'size' => 'aspect-square', 'col' => ''],
            ['img' => 'gallery-8', 'size' => 'aspect-square', 'col' => ''],
        ];
        ?>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">
            <?php foreach ($gallery_items as $g) : ?>
                <div class="<?php echo esc_attr(trim($g['col'] . ' ' . $g['size'])); ?> bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden group relative">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $g['img'] . '.webp'); ?>"
                         alt="<?php esc_attr_e('Nico Paz in action', 'nicopaz'); ?>"
                         loading="lazy"
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-nico-dark/0 group-hover:bg-nico-dark/30 dark:group-hover:bg-black/40 transition-colors z-10"></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-8">
            <a href="#" class="btn-secondary text-sm">
                <?php esc_html_e('View Full Gallery', 'nicopaz'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     9. LATEST NEWS
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-10">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Updates', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Latest News', 'nicopaz'); ?>
            </h2>
        </div>

        <?php
        $recent_posts = new WP_Query([
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'ignore_sticky_posts' => true,
        ]);

        if ($recent_posts->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                    <article class="bg-nico-gray-light dark:bg-gray-950 rounded-xl overflow-hidden hover:-translate-y-1 transition-all duration-300 border border-gray-100 dark:border-gray-800">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden">
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-500']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-5">
                            <span class="text-xs text-celeste dark:text-white font-heading font-semibold uppercase tracking-wider"><?php echo get_the_date('M j, Y'); ?></span>
                            <h3 class="font-heading font-bold text-base mt-1 mb-2">
                                <a href="<?php the_permalink(); ?>" class="text-nico-dark dark:text-gray-100 hover:text-celeste dark:hover:text-white transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="text-nico-gray dark:text-gray-400 text-sm leading-relaxed"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="text-center mt-10">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn-primary text-sm">
                    <?php esc_html_e('Read All News', 'nicopaz'); ?>
                </a>
            </div>
        <?php else : ?>
            <div class="text-center py-12 bg-nico-gray-light dark:bg-gray-950 rounded-xl border border-gray-100 dark:border-gray-800">
                <p class="text-nico-gray dark:text-gray-400"><?php esc_html_e('No news articles yet. Check back soon!', 'nicopaz'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ============================================================
     10. TESTIMONIALS / PRESS QUOTES
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-10">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('What They Say', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Press & Praise', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $testimonials = [
                [
                    'quote' => __('A technically gifted midfielder with exceptional vision and composure beyond his years. One to watch.', 'nicopaz'),
                    'author' => __('Marca', 'nicopaz'),
                    'role' => __('Sports Daily', 'nicopaz'),
                ],
                [
                    'quote' => __('Nico Paz represents the new generation of Argentine talent — skillful, intelligent, and fearless on the ball.', 'nicopaz'),
                    'author' => __('Olé', 'nicopaz'),
                    'role' => __('Argentine Sports Newspaper', 'nicopaz'),
                ],
                [
                    'quote' => __('His ability to read the game and pick out passes in tight spaces sets him apart from his peers.', 'nicopaz'),
                    'author' => __('The Guardian', 'nicopaz'),
                    'role' => __('Football Correspondent', 'nicopaz'),
                ],
            ];

            foreach ($testimonials as $t) : ?>
                <div class="bg-nico-gray-light dark:bg-gray-950 rounded-xl p-6 md:p-8 shadow-sm border border-gray-100 dark:border-gray-800">
                    <svg class="w-8 h-8 text-celeste/20 dark:text-white/20 mb-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10H14.017zM0 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151C7.546 6.068 5.983 8.789 5.983 11H10v10H0z"/>
                    </svg>
                    <p class="text-nico-gray dark:text-gray-400 leading-relaxed text-sm italic mb-6">"<?php echo esc_html($t['quote']); ?>"</p>
                    <div>
                        <p class="font-heading font-bold text-nico-dark dark:text-gray-100 text-sm"><?php echo esc_html($t['author']); ?></p>
                        <p class="text-xs text-nico-gray dark:text-gray-400"><?php echo esc_html($t['role']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     11. FAQ ACCORDION
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('FAQ', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Frequently Asked Questions', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="space-y-3" id="faq-accordion">
            <?php
            $faqs = [
                [
                    'q' => __('What position does Nico Paz play?', 'nicopaz'),
                    'a' => __('Nico Paz is an attacking midfielder (CAM) known for his vision, passing range, and technical ability. He can also operate as a central midfielder (CM) or on the wings when needed.', 'nicopaz'),
                ],
                [
                    'q' => __('Which clubs has Nico Paz played for?', 'nicopaz'),
                    'a' => __('Nico began his youth career at Real Madrid\'s famed La Fábrica academy. He made his first-team debut for Real Madrid before joining Como 1907 in Serie A. He has also represented Argentina at various youth international levels.', 'nicopaz'),
                ],
                [
                    'q' => __('How can I buy official Nico Paz merchandise?', 'nicopaz'),
                    'a' => __('Official merchandise is available in the Shop section of this website. We offer authentic jerseys, apparel, accessories, and limited-edition items. All products are shipped worldwide.', 'nicopaz'),
                ],
                [
                    'q' => __('What is the shipping policy?', 'nicopaz'),
                    'a' => __('We ship internationally. Delivery times vary by location — typically 5–10 business days domestically and 10–20 business days internationally. You will receive a tracking number once your order is dispatched.', 'nicopaz'),
                ],
                [
                    'q' => __('How can I contact Nico Paz or his management?', 'nicopaz'),
                    'a' => __('For press inquiries, sponsorship opportunities, and professional requests, please use the Contact section on this website or email hello@nicopaz.com. We aim to respond within 48 hours.', 'nicopaz'),
                ],
                [
                    'q' => __('Does Nico Paz have social media accounts?', 'nicopaz'),
                    'a' => __('Yes! Follow Nico on Instagram, Twitter, and TikTok for exclusive behind-the-scenes content, training updates, and personal messages. Links to all official accounts can be found in the footer of this site.', 'nicopaz'),
                ],
                [
                    'q' => __('What sizes are available for jerseys?', 'nicopaz'),
                    'a' => __('Our jerseys are available in sizes XS through 3XL. Please refer to the size guide on each product page for detailed measurements. If you are between sizes, we recommend sizing up for a more comfortable fit.', 'nicopaz'),
                ],
            ];

            foreach ($faqs as $i => $faq) : ?>
                <div class="faq-item rounded-xl border border-gray-100 dark:border-gray-800 bg-nico-gray-light/50 dark:bg-gray-950 overflow-hidden">
                    <button class="faq-trigger w-full flex items-center justify-between px-6 py-5 text-left font-heading font-bold text-nico-dark dark:text-gray-100 hover:text-celeste dark:hover:text-white transition-colors" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                        <span><?php echo esc_html($faq['q']); ?></span>
                        <svg class="faq-chevron w-5 h-5 flex-shrink-0 ml-4 transition-transform duration-300 <?php echo $i === 0 ? 'rotate-180' : ''; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-content <?php echo $i === 0 ? '' : 'hidden'; ?>">
                        <div class="px-6 pb-5 text-nico-gray dark:text-gray-400 text-sm leading-relaxed">
                            <?php echo esc_html($faq['a']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     12. SKILLS / ATTRIBUTES
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-10">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Player Profile', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Skills & Attributes', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
            <?php
            $skills = [
                ['name' => __('Passing', 'nicopaz'), 'value' => 85],
                ['name' => __('Dribbling', 'nicopaz'), 'value' => 82],
                ['name' => __('Vision', 'nicopaz'), 'value' => 88],
                ['name' => __('Technique', 'nicopaz'), 'value' => 86],
                ['name' => __('Pace', 'nicopaz'), 'value' => 75],
                ['name' => __('Shooting', 'nicopaz'), 'value' => 72],
                ['name' => __('Composure', 'nicopaz'), 'value' => 80],
                ['name' => __('Football IQ', 'nicopaz'), 'value' => 84],
            ];

            foreach ($skills as $skill) : ?>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-heading font-bold text-nico-dark dark:text-gray-100"><?php echo esc_html($skill['name']); ?></span>
                        <span class="text-xs font-heading font-bold text-celeste dark:text-white"><span class="counter" data-target="<?php echo esc_attr($skill['value']); ?>">0</span></span>
                    </div>
                        <div class="w-full h-2 bg-nico-gray-light dark:bg-gray-800 rounded-full overflow-hidden">
                        <div class="h-full bg-nico-dark dark:bg-white rounded-full transition-all duration-1000" style="width: <?php echo esc_attr($skill['value']); ?>%"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     12. AS SEEN IN — Press logos marquee
     ============================================================ -->
<section class="py-16 bg-ink-celeste relative overflow-hidden">
    <div class="absolute top-0 left-0 right-0 h-1 bg-flag-stripes"></div>
    <div class="absolute inset-0 bg-grid-pattern-dark opacity-30"></div>
    <div class="container-main mb-10 relative">
        <div class="text-center">
            <p class="text-bebas text-gold text-sm tracking-[0.3em] mb-3">// <?php esc_html_e('Featured In', 'nicopaz'); ?> //</p>
            <h2 class="text-jersey text-white text-4xl md:text-6xl lg:text-7xl leading-[0.85]">
                <span class="text-sticker-gold"><?php esc_html_e('AS SEEN', 'nicopaz'); ?></span>
                <span class="text-stroke-gold"><?php esc_html_e('IN', 'nicopaz'); ?></span>
            </h2>
        </div>
    </div>

    <div class="marquee overflow-hidden">
        <div class="marquee-track flex items-center gap-12 md:gap-16 whitespace-nowrap">
            <?php
            $press = [
                'MARCA', 'OLÉ', 'ESPN', 'BBC SPORT',
                'SKY SPORTS', 'THE GUARDIAN', 'AS', 'TYC SPORTS',
                'GAZZETTA', 'L\'ÉQUIPE', 'KICKER', 'MUNDO DEPORTIVO',
            ];
            // Render twice for seamless loop
            for ($copy = 0; $copy < 2; $copy++) :
                foreach ($press as $logo) : ?>
                    <div class="press-logo flex-shrink-0">
                        <span class="text-jersey text-3xl md:text-4xl text-white/40 hover:text-celeste transition-colors duration-300 cursor-default"><?php echo esc_html($logo); ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     13. SPONSORS / PARTNERS
     ============================================================ -->
<section class="py-16 bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-10">
            <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
                <?php esc_html_e('Trusted By', 'nicopaz'); ?>
            </p>
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white">
                <?php esc_html_e('Partners & Sponsors', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16">
            <?php
            $sponsors = [
                'Nike', 'Adidas', 'Puma', 'EA Sports',
                'Beats', 'Gatorade', 'New Balance', 'Sony',
            ];
            foreach ($sponsors as $sponsor) : ?>
                <div class="grayscale hover:grayscale-0 opacity-40 hover:opacity-100 transition-all duration-300">
                    <span class="font-heading text-2xl md:text-3xl font-black text-nico-dark/30 dark:text-white/30"><?php echo esc_html($sponsor); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     13. NEWSLETTER
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black border-t border-b border-gray-100 dark:border-gray-900">
    <div class="container-main">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white mb-4">
                <?php esc_html_e('Stay Connected', 'nicopaz'); ?>
            </h2>
            <p class="text-nico-gray dark:text-gray-400 mb-8">
                <?php esc_html_e('Get exclusive updates, early access to new merch drops, and behind-the-scenes content straight to your inbox.', 'nicopaz'); ?>
            </p>
            <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                <input type="email" placeholder="<?php esc_attr_e('Your email address', 'nicopaz'); ?>" class="flex-1 px-5 py-3.5 rounded-xl border border-gray-200 dark:border-gray-800 text-sm bg-nico-gray-light dark:bg-gray-950 text-nico-dark dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-nico-dark/20 dark:focus:ring-white/20 focus:outline-none" required>
                <button type="submit" class="px-8 py-3.5 bg-nico-dark dark:bg-white text-white dark:text-nico-dark font-heading font-bold rounded-xl text-sm hover:bg-nico-dark/80 dark:hover:bg-white/80 transition-colors whitespace-nowrap">
                    <?php esc_html_e('Subscribe', 'nicopaz'); ?>
                </button>
            </form>
            <p class="text-nico-gray/50 dark:text-gray-500 text-xs mt-4">
                <?php esc_html_e('No spam. Unsubscribe anytime.', 'nicopaz'); ?>
            </p>
        </div>
    </div>
</section>

<!-- ============================================================
     14. FINAL CALL TO ACTION / CONTACT
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-2xl mx-auto text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Get In Touch', 'nicopaz'); ?>
        </p>
        <h2 class="font-heading text-3xl md:text-4xl font-black text-nico-dark dark:text-white mb-6">
            <?php esc_html_e('Contact & Booking', 'nicopaz'); ?>
        </h2>
        <p class="text-nico-gray dark:text-gray-400 mb-8">
            <?php esc_html_e('For press inquiries, sponsorship opportunities, or personal messages.', 'nicopaz'); ?>
        </p>
        <div class="bg-nico-gray-light dark:bg-gray-950 p-8 md:p-12 rounded-2xl">
            <div class="text-5xl mb-4">📩</div>
            <p class="text-nico-gray dark:text-gray-400 font-heading font-bold text-lg mb-6">
                <?php esc_html_e('Let\'s work together', 'nicopaz'); ?>
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="mailto:hello@nicopaz.com" class="btn-primary text-base px-8 py-3">
                    <?php esc_html_e('Send an Email', 'nicopaz'); ?>
                </a>
                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="btn-secondary text-base px-8 py-3">
                    <?php esc_html_e('DM on Instagram', 'nicopaz'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
