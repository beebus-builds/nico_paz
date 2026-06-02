<?php get_header(); ?>

<main id="primary" class="site-main bg-white dark:bg-black text-slate-800 dark:text-slate-200 transition-colors duration-300">

<!-- ============================================================
     1. HERO CAROUSEL (Argentine Jersey & sol de mayo Identity)
     ============================================================ -->
<section id="hero-carousel" class="relative min-h-screen overflow-hidden bg-black">

    <?php
    $hero_slides = [
        [
            'image'    => get_template_directory_uri() . '/assets/images/hero-face.png',
            'overlay'  => 'from-black/90 via-black/45 to-black/80',
            'tag'      => __('PROFESSIONAL FOOTBALLER · ARGENTINA', 'nicopaz'),
            'heading'  => 'NICO<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-celeste via-white to-gold animate-gradient-shift bg-[length:200%_auto]">PAZ</span>',
            'buttons'  => [
                ['url' => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : null, 'label' => __('Shop Now', 'nicopaz'), 'class' => 'btn-gold shadow-gold text-sm sm:text-base px-6 sm:px-8 py-3 rounded-xl font-heading font-extrabold uppercase tracking-wider transition-all duration-300 hover:scale-105'],
                ['url' => '#about', 'label' => __('Explore', 'nicopaz'), 'class' => 'btn-secondary border-white/40 text-white hover:bg-white hover:text-black text-sm sm:text-base px-6 sm:px-8 py-3 rounded-xl font-heading font-bold uppercase tracking-wider transition-all duration-300 hover:scale-105'],
            ],
        ],
        [
            'image'    => get_template_directory_uri() . '/assets/images/hero-2.webp',
            'overlay'  => 'from-black/90 via-black/45 to-black/80',
            'tag'      => __('OFFICIAL MERCHANDISE · NEW DROP', 'nicopaz'),
            'heading'  => 'SHOP<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-celeste via-white to-gold animate-gradient-shift bg-[length:200%_auto]">THE KIT</span>',
            'buttons'  => [
                ['url' => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : null, 'label' => __('Visit Shop', 'nicopaz'), 'class' => 'btn-gold shadow-gold text-sm sm:text-base px-6 sm:px-8 py-3 rounded-xl font-heading font-extrabold uppercase tracking-wider transition-all duration-300 hover:scale-105'],
                ['url' => function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) . '?orderby=date' : null, 'label' => __('New Arrivals', 'nicopaz'), 'class' => 'btn-secondary border-white/40 text-white hover:bg-white hover:text-black text-sm sm:text-base px-6 sm:px-8 py-3 rounded-xl font-heading font-bold uppercase tracking-wider transition-all duration-300 hover:scale-105'],
            ],
        ],
        [
            'image'    => get_template_directory_uri() . '/assets/images/hero-3.webp',
            'overlay'  => 'from-black/90 via-black/45 to-black/80',
            'tag'      => __('RISING STAR · FROM LA FÁBRICA', 'nicopaz'),
            'heading'  => 'MADRID<br>→ <span class="text-transparent bg-clip-text bg-gradient-to-r from-celeste via-white to-gold animate-gradient-shift bg-[length:200%_auto]">COMO</span>',
            'buttons'  => [
                ['url' => '#timeline', 'label' => __('Career Timeline', 'nicopaz'), 'class' => 'btn-gold shadow-gold text-sm sm:text-base px-6 sm:px-8 py-3 rounded-xl font-heading font-extrabold uppercase tracking-wider transition-all duration-300 hover:scale-105'],
                ['url' => '#about', 'label' => __('Learn More', 'nicopaz'), 'class' => 'btn-secondary border-white/40 text-white hover:bg-white hover:text-black text-sm sm:text-base px-6 sm:px-8 py-3 rounded-xl font-heading font-bold uppercase tracking-wider transition-all duration-300 hover:scale-105'],
            ],
        ],
        [
            'image'    => get_template_directory_uri() . '/assets/images/hero-4.webp',
            'overlay'  => 'from-black/90 via-black/45 to-black/80',
            'tag'      => __('STAY CONNECTED · FOLLOW ALONG', 'nicopaz'),
            'heading'  => 'FOLLOW<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-celeste via-white to-gold animate-gradient-shift bg-[length:200%_auto]">EL CAMINO</span>',
            'buttons'  => [
                ['url' => 'https://instagram.com', 'label' => __('Instagram', 'nicopaz'), 'class' => 'btn-gold shadow-gold text-sm sm:text-base px-6 sm:px-8 py-3 rounded-xl font-heading font-extrabold uppercase tracking-wider transition-all duration-300 hover:scale-105'],
                ['url' => '#contact', 'label' => __('Contact', 'nicopaz'), 'class' => 'btn-secondary border-white/40 text-white hover:bg-white hover:text-black text-sm sm:text-base px-6 sm:px-8 py-3 rounded-xl font-heading font-bold uppercase tracking-wider transition-all duration-300 hover:scale-105'],
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
                <div class="absolute inset-0 bg-grid-pattern-dark opacity-20"></div>

                <!-- Giant #10 number plate in background -->
                <div class="absolute -right-12 md:right-4 top-1/2 -translate-y-1/2 z-0 pointer-events-none select-none hidden md:block">
                    <div class="font-display font-black text-white/[0.04] text-[18rem] lg:text-[26rem] leading-none select-none tracking-tighter">10</div>
                </div>

                <!-- Sun of May in top corner -->
                <div class="absolute top-10 right-10 z-10 hidden md:block">
                    <div class="sun-may sun-spin opacity-40 hover:opacity-85 transition-opacity duration-300" aria-hidden="true"></div>
                </div>

                <!-- Argentina flag bar accent -->
                <div class="absolute top-0 left-0 right-0 h-1.5 z-20 bg-flag-stripes"></div>

                <div class="absolute inset-0 flex items-end justify-start z-10">
                    <div class="px-6 md:px-12 pb-32 md:pb-40 w-full">
                        <div class="max-w-5xl">
                            <!-- Tilted Bebas tag -->
                            <div class="mb-3 md:mb-4 flex items-center gap-3">
                                <span class="text-stamp text-stamp-r font-heading text-xs font-black shadow-lg">#10</span>
                                <span class="text-bebas text-celeste tracking-[0.25em] text-xs sm:text-sm md:text-lg font-bold"><?php echo esc_html($slide['tag']); ?></span>
                            </div>

                            <!-- Massive futuristic display heading -->
                            <h1 class="font-display font-extrabold uppercase text-white text-[4.5rem] sm:text-[6.5rem] md:text-[8rem] lg:text-[10rem] leading-[0.82] tracking-tighter mb-4 text-balance">
                                <?php echo $slide['heading']; ?>
                            </h1>

                            <!-- Cursive accent -->
                            <div class="flex items-center gap-3 mb-8">
                                <p class="font-cursive text-gold text-2xl sm:text-3xl md:text-4xl text-tilt-l inline-block">
                                    <?php esc_html_e('Celeste y Blanca', 'nicopaz'); ?>
                                </p>
                                <span class="sun-may-solid w-5 h-5 shadow-[0_0_12px_rgba(246,180,14,0.6)] animate-pulse" aria-hidden="true"></span>
                            </div>

                            <!-- Flag ribbon + buttons -->
                            <div class="flex flex-col gap-6">
                                <div class="flag-ribbon flag-ribbon-thick w-36 sm:w-52"></div>
                                <div class="flex flex-wrap gap-4">
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

    <!-- Bottom-right Thumbnail Container -->
    <div class="absolute bottom-8 right-6 md:right-12 z-30 flex items-center gap-3 bg-black/45 backdrop-blur-md p-3 rounded-2xl border border-white/10 shadow-2xl">
        <?php foreach ($hero_slides as $i => $slide) : ?>
            <button class="hero-dot-thumb group relative w-16 h-16 sm:w-20 sm:h-20 rounded-xl overflow-hidden border-2 transition-all duration-300 <?php echo $i === 0 ? 'border-celeste scale-105 shadow-[0_0_15px_rgba(117,170,219,0.6)]' : 'border-white/20 scale-100 hover:border-white/60 hover:scale-102'; ?>" 
                    data-index="<?php echo $i; ?>" 
                    aria-label="<?php printf(esc_attr__('Go to slide %d', 'nicopaz'), $i + 1); ?>">
                <!-- Thumbnail Image -->
                <img src="<?php echo esc_url($slide['image']); ?>" 
                     alt="" 
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <!-- Inner Overlay/Glow -->
                <div class="absolute inset-0 bg-celeste/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <!-- Number badge -->
                <span class="absolute bottom-1 right-1 text-[10px] font-bold font-heading bg-black/60 text-white px-1.5 py-0.5 rounded-md">
                    0<?php echo $i + 1; ?>
                </span>
            </button>
        <?php endforeach; ?>
    </div>
</section>

<!-- ============================================================
     2. QUICK STATS STRIP (Premium Frosted Glass Tiles)
     ============================================================ -->
<section class="py-12 md:py-16 border-t border-b border-slate-200/50 dark:border-zinc-800 bg-slate-50/50 dark:bg-zinc-950 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern dark:bg-grid-pattern-dark opacity-10 dark:opacity-30"></div>
    <div class="absolute -top-32 -left-32 w-[350px] h-[350px] bg-celeste-glow opacity-30 pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-[350px] h-[350px] bg-gold-glow opacity-30 pointer-events-none"></div>
    <div class="container-main relative">
        <div class="text-center mb-8">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.4em] font-bold">// <?php esc_html_e('BY THE NUMBERS', 'nicopaz'); ?> //</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 text-center">
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
                <div class="bg-white/70 dark:bg-zinc-900/30 backdrop-blur-md border border-slate-200/50 dark:border-white/5 rounded-2xl p-5 hover:border-celeste/30 hover:shadow-[0_10px_30px_-10px_rgba(117,170,219,0.2)] hover:-translate-y-1 transition-all duration-300">
                    <p class="text-jersey text-slate-900 dark:text-white text-3xl md:text-4xl lg:text-5xl leading-none mb-1">
                        <span class="counter" data-target="<?php echo esc_attr($stat['value']); ?>">0</span><?php echo esc_html($stat['suffix']); ?>
                    </p>
                    <p class="text-bebas text-celeste dark:text-gold text-[10px] tracking-[0.2em] font-bold mt-2"><?php echo esc_html($stat['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     3. ABOUT (Geometric Layered Frames & Gradient Text)
     ============================================================ -->
<section id="about" class="section-padding bg-white dark:bg-black relative overflow-hidden">
    <div class="absolute top-0 left-0 right-0 h-1 bg-flag-stripes"></div>
    <div class="absolute -top-32 -right-32 w-[400px] h-[400px] bg-sunburst-rays opacity-5 dark:opacity-20 pointer-events-none"></div>
    <div class="container-main relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-14 items-center">
            <div class="lg:col-span-7">
                <div class="flex items-center gap-3 mb-4">
                    <span class="sun-may-solid w-4 h-4 shadow-[0_0_8px_rgba(246,180,14,0.4)]" aria-hidden="true"></span>
                    <span class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold">// <?php esc_html_e('About', 'nicopaz'); ?> · 01</span>
                </div>
                <h2 class="font-display font-extrabold text-slate-900 dark:text-white text-4xl sm:text-5xl md:text-7xl leading-[0.95] mb-6 tracking-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-celeste to-slate-900 dark:to-white"><?php esc_html_e('THE', 'nicopaz'); ?></span><br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-celeste via-slate-900 to-gold dark:via-white"><?php esc_html_e('JOURNEY', 'nicopaz'); ?></span>
                </h2>
                <div class="flag-ribbon w-28 mb-8"></div>
                <div class="space-y-5 text-slate-600 dark:text-gray-400 leading-relaxed text-base sm:text-lg">
                    <p><?php esc_html_e('Nico Paz is an Argentine professional footballer known for his vision, technique, and creativity on the pitch. With a journey that spans from the youth ranks to the professional stage, he embodies the spirit of Argentine football.', 'nicopaz'); ?></p>
                    <p><?php esc_html_e('Born with football in his blood, Nico continues to write his story — one match, one goal, one moment of magic at a time.', 'nicopaz'); ?></p>
                </div>
                <div class="flex flex-wrap gap-6 mt-10">
                    <div class="jersey-plate shadow-lg">
                        <span class="text-jersey text-2xl md:text-3xl"><span class="counter" data-target="2004">0</span></span>
                    </div>
                    <div>
                        <p class="text-jersey text-celeste text-2xl md:text-3xl">CM · 10</p>
                        <p class="text-bebas text-[10px] text-slate-400 dark:text-gray-500 tracking-widest mt-1"><?php esc_html_e('POSITION · SHIRT', 'nicopaz'); ?></p>
                    </div>
                    <div>
                        <p class="text-jersey text-gold text-2xl md:text-3xl">🇦🇷</p>
                        <p class="text-bebas text-[10px] text-slate-400 dark:text-gray-500 tracking-widest mt-1"><?php esc_html_e('NATIONAL TEAM', 'nicopaz'); ?></p>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-5 relative group">
                <!-- Dual layer decorative frame -->
                <div class="absolute inset-0 bg-gradient-to-br from-celeste/20 to-gold/20 rounded-2xl transform translate-x-4 translate-y-4 group-hover:translate-x-2 group-hover:translate-y-2 transition-transform duration-350 z-0"></div>
                <div class="relative rounded-2xl overflow-hidden border border-slate-200 dark:border-zinc-800 shadow-2xl aspect-[4/5] z-10">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about.webp'); ?>" alt="<?php esc_attr_e('Nico Paz', 'nicopaz'); ?>" class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     4. CAREER TIMELINE (Glowing Tech Roadmap)
     ============================================================ -->
<section id="timeline" class="section-padding bg-slate-50 dark:bg-zinc-950/40 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern dark:bg-grid-pattern-dark opacity-10 dark:opacity-20 pointer-events-none"></div>
    <div class="container-main relative">
        <div class="text-center mb-16">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('Path to Glory', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
                <?php esc_html_e('Career Timeline', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="max-w-4xl mx-auto relative">
            <div class="absolute left-6 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-celeste via-gold to-celeste/10 -translate-x-1/2"></div>

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
                <div class="relative mb-16 last:mb-0 group">
                    <!-- Glow Nodes -->
                    <div class="hidden md:block absolute left-1/2 top-3 w-5 h-5 rounded-full bg-slate-900 dark:bg-white border-4 border-celeste shadow-[0_0_12px_rgba(117,170,219,0.8)] -translate-x-1/2 z-10 group-hover:scale-120 group-hover:border-gold transition-all duration-300"></div>
                    <div class="block md:hidden absolute left-6 top-3 w-4 h-4 rounded-full bg-slate-900 dark:bg-white border-3 border-celeste shadow-[0_0_8px_rgba(117,170,219,0.8)] -translate-x-1/2 z-10"></div>

                    <div class="<?php echo $is_left ? 'md:pr-[55%] md:text-right' : 'md:pl-[55%]'; ?> pl-12 md:pl-0">
                        <div class="bg-white/80 dark:bg-zinc-900/40 backdrop-blur-md border border-slate-200/50 dark:border-white/5 rounded-2xl p-6 shadow-sm group-hover:shadow-md group-hover:-translate-y-0.5 transition-all duration-300 inline-block w-full">
                            <span class="inline-block font-heading text-xs font-black text-celeste dark:text-white bg-celeste/10 dark:bg-white/10 px-3.5 py-1.5 rounded-full uppercase tracking-wider mb-3">
                                <?php echo esc_html($m['year']); ?>
                            </span>
                            <h3 class="font-display font-bold text-lg md:text-xl text-slate-900 dark:text-white mb-2"><?php echo esc_html($m['title']); ?></h3>
                            <p class="text-slate-500 dark:text-gray-400 text-sm leading-relaxed"><?php echo esc_html($m['desc']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     5. SHOP CATEGORIES (Premium Glass Cards & Monograms)
     ============================================================ -->
<?php if (function_exists('wc_get_page_id')) : ?>
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-12">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('Collections', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
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
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>" class="group bg-slate-50/70 dark:bg-zinc-950/40 rounded-2xl shadow-sm border border-slate-200/50 dark:border-zinc-800/80 p-8 text-center hover:shadow-xl hover:border-celeste/20 dark:hover:border-celeste/10 hover:-translate-y-1 transition-all duration-300">
                        <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-celeste/10 dark:bg-white/5 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-celeste group-hover:to-gold transition-all duration-300">
                            <span class="text-xl group-hover:text-white text-celeste dark:text-white transition-colors font-display font-extrabold">NP</span>
                        </div>
                        <h3 class="font-display font-bold text-slate-900 dark:text-white group-hover:text-celeste dark:group-hover:text-white transition-colors text-base sm:text-lg"><?php echo esc_html($cat->name); ?></h3>
                        <p class="text-xs text-slate-400 dark:text-gray-500 mt-2 font-heading font-medium"><?php echo sprintf(_n('%s product', '%s products', $cat->count, 'nicopaz'), $cat->count); ?></p>
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
                    <div class="bg-slate-50/70 dark:bg-zinc-950/40 rounded-2xl shadow-sm border border-slate-200/50 dark:border-zinc-800/80 p-8 text-center hover:-translate-y-1 transition-all duration-300">
                        <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-celeste/10 dark:bg-white/5 flex items-center justify-center">
                            <span class="text-xl text-celeste dark:text-white font-display font-extrabold">NP</span>
                        </div>
                        <h3 class="font-display font-bold text-slate-900 dark:text-white text-base sm:text-lg"><?php echo esc_html($cat_name); ?></h3>
                        <p class="text-xs text-slate-400 dark:text-gray-500 mt-2 font-heading font-medium"><?php esc_html_e('Coming soon', 'nicopaz'); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     6. FEATURED PRODUCTS (Premium Product Card Overhauls)
     ============================================================ -->
<?php if (class_exists('WooCommerce')) : ?>
<section class="section-padding bg-slate-50 dark:bg-zinc-950/30">
    <div class="container-main">
        <div class="text-center mb-14">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('Official Merchandise', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
                <?php esc_html_e('Featured Products', 'nicopaz'); ?>
            </h2>
            <p class="text-slate-500 dark:text-gray-400 mt-3 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
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
                    <div class="bg-white dark:bg-zinc-900/40 rounded-2xl overflow-hidden border border-slate-200/50 dark:border-zinc-800/80 hover:shadow-xl hover:border-celeste/20 dark:hover:border-celeste/10 transition-all duration-350 group">
                        <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="block aspect-[4/5] overflow-hidden bg-slate-100 dark:bg-zinc-800 relative">
                            <?php echo $product_obj->get_image('nicopaz-product', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500']); ?>
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors duration-300"></div>
                            
                            <!-- Gold Price Badge -->
                            <div class="absolute top-4 right-4 bg-gold font-heading font-black text-slate-900 px-3.5 py-1.5 rounded-xl shadow-lg text-sm tracking-wider">
                                <?php echo $product_obj->get_price_html(); ?>
                            </div>
                        </a>
                        <div class="p-5">
                            <h3 class="font-display font-bold text-sm sm:text-base mb-3 truncate">
                                <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="text-slate-900 dark:text-slate-100 hover:text-celeste dark:hover:text-white transition-colors">
                                    <?php echo esc_html($product_obj->get_name()); ?>
                                </a>
                            </h3>
                            <a href="<?php echo esc_url($product_obj->add_to_cart_url()); ?>" class="mt-2 w-full inline-flex justify-center items-center py-3 bg-celeste hover:bg-celeste/95 text-white font-heading font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all duration-200 shadow-md shadow-celeste/10 hover:shadow-celeste/20 <?php echo $product_obj->is_type('variable') ? 'opacity-70' : ''; ?>">
                                <?php echo $product_obj->is_type('variable') ? esc_html__('View Options', 'nicopaz') : esc_html__('Add to Cart', 'nicopaz'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-14">
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="inline-flex justify-center items-center px-10 py-4 bg-slate-900 dark:bg-white text-white dark:text-slate-950 hover:bg-slate-800 dark:hover:bg-slate-100 font-heading font-black uppercase text-sm rounded-xl tracking-wider transition-all duration-300 shadow-lg hover:scale-105">
                    <?php esc_html_e('View All Products', 'nicopaz'); ?>
                </a>
            </div>
        <?php else : ?>
            <div class="text-center py-16 bg-white dark:bg-zinc-950/40 rounded-2xl border border-slate-200/50 dark:border-zinc-800/80">
                <div class="text-5xl mb-4">🏟️</div>
                <p class="text-slate-400 dark:text-gray-500 text-lg font-display font-bold"><?php esc_html_e('Products coming soon. Stay tuned!', 'nicopaz'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- ============================================================
     7. VIDEO HIGHLIGHTS (Widescreen Stadium Cinema)
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black relative overflow-hidden">
    <div class="absolute -top-32 -left-32 w-[350px] h-[350px] bg-celeste-glow opacity-10 pointer-events-none"></div>
    <div class="container-main relative">
        <div class="text-center mb-12">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('Highlights', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
                <?php esc_html_e('Moments on the Pitch', 'nicopaz'); ?>
            </h2>
            <p class="text-slate-500 dark:text-gray-400 mt-3 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                <?php esc_html_e('Watch Nico in action — skill, vision, and passion every time he steps on the field.', 'nicopaz'); ?>
            </p>
        </div>

        <div class="max-w-5xl mx-auto relative group">
            <!-- Glassmorphism stadium cinema player -->
            <div class="absolute inset-0 bg-gradient-to-tr from-celeste/20 via-gold/10 to-transparent rounded-2xl transform translate-x-3 translate-y-3 group-hover:translate-x-1.5 group-hover:translate-y-1.5 transition-transform duration-350 z-0"></div>
            <div class="relative aspect-video bg-zinc-950 border border-slate-200 dark:border-zinc-800 rounded-2xl flex items-center justify-center overflow-hidden z-10 shadow-2xl">
                <!-- Fallback / placeholder graphic backdrop -->
                <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-luminosity group-hover:scale-102 transition-transform duration-700" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-1.webp'); ?>');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20"></div>

                <div class="relative text-center p-6 z-20">
                    <button class="w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-5 rounded-full bg-gold/10 border border-gold/40 flex items-center justify-center shadow-[0_0_30px_rgba(246,180,14,0.3)] group-hover:shadow-[0_0_55px_rgba(246,180,14,0.6)] group-hover:scale-108 transition-all duration-350 hover:bg-gold/20" aria-label="<?php esc_attr_e('Play', 'nicopaz'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-gold ml-1.5 animate-pulse" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </button>
                    <p class="text-white text-base sm:text-lg font-display font-extrabold tracking-wide uppercase group-hover:text-gold transition-colors"><?php esc_html_e('Video highlight reel coming soon', 'nicopaz'); ?></p>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-10 gap-4">
            <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center items-center px-6 py-3 border-2 border-slate-200 dark:border-zinc-800 text-slate-800 dark:text-white hover:bg-slate-900 hover:text-white dark:hover:bg-white dark:hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all duration-200">
                <?php esc_html_e('Watch on YouTube', 'nicopaz'); ?>
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center items-center px-6 py-3 border-2 border-slate-200 dark:border-zinc-800 text-slate-800 dark:text-white hover:bg-slate-900 hover:text-white dark:hover:bg-white dark:hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all duration-200">
                <?php esc_html_e('Follow on Instagram', 'nicopaz'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     8. PHOTO GALLERY (Premium Prints & Parallax Hover)
     ============================================================ -->
<section class="section-padding bg-slate-50 dark:bg-zinc-950/20 relative overflow-hidden">
    <div class="absolute top-0 left-0 right-0 h-1 bg-flag-stripes"></div>
    <div class="container-main">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="sun-may-solid w-3.5 h-3.5" aria-hidden="true"></span>
                <span class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold">// <?php esc_html_e('Gallery', 'nicopaz'); ?> · 02</span>
                <span class="sun-may-solid w-3.5 h-3.5" aria-hidden="true"></span>
            </div>
            <h2 class="font-display font-extrabold text-slate-900 dark:text-white text-4xl sm:text-5xl md:text-7xl leading-[0.95] tracking-tight uppercase">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-celeste to-slate-950 dark:to-white"><?php esc_html_e('THROUGH', 'nicopaz'); ?></span><br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-celeste via-slate-900 to-gold dark:via-white"><?php esc_html_e('THE LENS', 'nicopaz'); ?></span>
            </h2>
            <div class="flag-ribbon flag-ribbon-r w-36 mx-auto mt-6"></div>
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
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php foreach ($gallery_items as $g) : ?>
                <div class="<?php echo esc_attr(trim($g['col'] . ' ' . $g['size'])); ?> bg-slate-100 dark:bg-zinc-900 rounded-2xl overflow-hidden group relative border border-slate-200/50 dark:border-zinc-800 shadow-sm hover:shadow-xl hover:border-celeste/20 dark:hover:border-celeste/10 transition-all duration-350">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $g['img'] . '.webp'); ?>"
                         alt="<?php esc_attr_e('Nico Paz in action', 'nicopaz'); ?>"
                         loading="lazy"
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10">
            <a href="#" class="inline-flex justify-center items-center px-8 py-3 border-2 border-slate-200 dark:border-zinc-800 text-slate-800 dark:text-white hover:bg-slate-900 hover:text-white dark:hover:bg-white dark:hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all duration-200">
                <?php esc_html_e('View Full Gallery', 'nicopaz'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     9. LATEST NEWS (Editorial Minimal Grid)
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-14">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('Updates', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
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
                    <article class="bg-slate-50/70 dark:bg-zinc-950/40 rounded-2xl overflow-hidden hover:shadow-xl hover:border-celeste/20 dark:hover:border-celeste/10 transition-all duration-350 border border-slate-200/50 dark:border-zinc-800/80 group">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden bg-slate-100 dark:bg-zinc-850 relative">
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover hover:scale-103 transition-transform duration-500']); ?>
                                <div class="absolute inset-0 bg-black/5 group-hover:bg-black/0 transition-colors duration-300"></div>
                            </a>
                        <?php endif; ?>
                        <div class="p-6">
                            <span class="text-[10px] text-celeste dark:text-white font-heading font-black uppercase tracking-wider bg-celeste/10 dark:bg-white/10 px-2.5 py-1 rounded-md"><?php echo get_the_date('M j, Y'); ?></span>
                            <h3 class="font-display font-bold text-base sm:text-lg mt-4 mb-3">
                                <a href="<?php the_permalink(); ?>" class="text-slate-900 dark:text-slate-100 hover:text-celeste dark:hover:text-white transition-colors line-clamp-2">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="text-slate-500 dark:text-gray-400 text-sm leading-relaxed mb-4 line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-xs font-heading font-black text-celeste hover:text-celeste-deep dark:hover:text-white uppercase tracking-wider transition-colors gap-1">
                                <?php esc_html_e('Read More', 'nicopaz'); ?> →
                            </a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="text-center mt-12">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="inline-flex justify-center items-center px-8 py-3 bg-celeste hover:bg-celeste/95 text-white font-heading font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all duration-200 shadow-md shadow-celeste/10">
                    <?php esc_html_e('Read All News', 'nicopaz'); ?>
                </a>
            </div>
        <?php else : ?>
            <div class="text-center py-16 bg-slate-50/70 dark:bg-zinc-950/40 rounded-2xl border border-slate-200/50 dark:border-zinc-800/80">
                <p class="text-slate-400 dark:text-gray-500 text-sm font-heading font-medium"><?php esc_html_e('No news articles yet. Check back soon!', 'nicopaz'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ============================================================
     10. TESTIMONIALS / PRESS QUOTES (Frosted Quote Tiles)
     ============================================================ -->
<section class="section-padding bg-slate-50 dark:bg-zinc-950/30">
    <div class="container-main">
        <div class="text-center mb-14">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('What They Say', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
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
                <div class="bg-white/85 dark:bg-zinc-900/30 backdrop-blur-md rounded-2xl p-8 shadow-sm border border-slate-200/50 dark:border-white/5 hover:border-celeste/20 dark:hover:border-celeste/10 hover:shadow-md transition-all duration-300 relative group">
                    <svg class="w-8 h-8 text-celeste/20 dark:text-white/20 mb-5 group-hover:text-celeste/40 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10H14.017zM0 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151C7.546 6.068 5.983 8.789 5.983 11H10v10H0z"/>
                    </svg>
                    <p class="text-slate-600 dark:text-gray-400 leading-relaxed text-base italic mb-8">"<?php echo esc_html($t['quote']); ?>"</p>
                    
                    <!-- Stars Row -->
                    <div class="flex items-center gap-1 mb-4 text-gold">
                        <?php for ($s = 0; $s < 5; $s++) : ?>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <?php endfor; ?>
                    </div>

                    <div class="pt-4 border-t border-slate-100 dark:border-zinc-800">
                        <p class="font-display font-extrabold text-slate-900 dark:text-white text-sm"><?php echo esc_html($t['author']); ?></p>
                        <p class="text-xs text-slate-400 dark:text-gray-500 mt-1 font-heading font-medium"><?php echo esc_html($t['role']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     11. FAQ ACCORDION (Minimal Floating Card Lists)
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-3xl mx-auto">
        <div class="text-center mb-14">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('FAQ', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
                <?php esc_html_e('Frequently Asked Questions', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="space-y-4" id="faq-accordion">
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
                <div class="faq-item rounded-2xl border border-slate-200/50 dark:border-zinc-800 bg-slate-50/50 dark:bg-zinc-950/40 overflow-hidden shadow-sm transition-all duration-300">
                    <button class="faq-trigger w-full flex items-center justify-between px-6 py-5 text-left font-display font-bold text-slate-900 dark:text-slate-100 hover:text-celeste dark:hover:text-white transition-colors" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                        <span class="text-sm sm:text-base flex items-center gap-3">
                            <span class="font-mono text-xs text-celeste dark:text-gold">Q0<?php echo $i + 1; ?>.</span>
                            <?php echo esc_html($faq['q']); ?>
                        </span>
                        <svg class="faq-chevron w-5 h-5 flex-shrink-0 ml-4 transition-transform duration-300 text-slate-400 dark:text-gray-500 <?php echo $i === 0 ? 'rotate-180 text-celeste' : ''; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-content <?php echo $i === 0 ? '' : 'hidden'; ?> border-t border-slate-200/30 dark:border-zinc-800/30">
                        <div class="px-6 py-5 text-slate-500 dark:text-gray-400 text-sm leading-relaxed bg-white dark:bg-transparent">
                            <?php echo esc_html($faq['a']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     12. SKILLS / ATTRIBUTES (Futuristic Progress Bar Board)
     ============================================================ -->
<section class="section-padding bg-slate-50 dark:bg-zinc-950/20">
    <div class="container-main">
        <div class="text-center mb-12">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('Player Profile', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
                <?php esc_html_e('Skills & Attributes', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-8 bg-white dark:bg-zinc-900/20 backdrop-blur-md p-8 md:p-12 rounded-3xl border border-slate-200/50 dark:border-white/5 shadow-sm">
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
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-display font-bold text-slate-900 dark:text-slate-100"><?php echo esc_html($skill['name']); ?></span>
                        <span class="text-xs font-mono font-bold text-celeste dark:text-gold bg-celeste/10 dark:bg-gold/10 px-2.5 py-0.5 rounded-md"><span class="counter" data-target="<?php echo esc_attr($skill['value']); ?>">0</span>%</span>
                    </div>
                    <div class="w-full h-2.5 bg-slate-100 dark:bg-zinc-800 rounded-full overflow-hidden p-0.5 border border-slate-200/30 dark:border-zinc-700/30">
                        <div class="h-full bg-gradient-to-r from-celeste to-gold rounded-full transition-all duration-1000 shadow-[0_0_8px_rgba(117,170,219,0.5)]" style="width: <?php echo esc_attr($skill['value']); ?>%"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     12. AS SEEN IN — Press logos marquee
     ============================================================ -->
<section class="py-16 bg-black relative overflow-hidden">
    <div class="absolute top-0 left-0 right-0 h-1 bg-flag-stripes"></div>
    <div class="absolute inset-0 bg-grid-pattern-dark opacity-20"></div>
    <div class="container-main mb-10 relative">
        <div class="text-center">
            <p class="text-bebas text-gold text-sm tracking-[0.3em] mb-3">// <?php esc_html_e('Featured In', 'nicopaz'); ?> //</p>
            <h2 class="font-display font-extrabold text-white text-4xl md:text-6xl tracking-tight uppercase">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold to-white animate-pulse"><?php esc_html_e('AS SEEN', 'nicopaz'); ?></span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-celeste"><?php esc_html_e('IN', 'nicopaz'); ?></span>
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
                        <span class="text-jersey text-3xl md:text-4xl text-white/30 hover:text-celeste transition-colors duration-300 cursor-default"><?php echo esc_html($logo); ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     13. SPONSORS / PARTNERS (Glowing Pill Enclosures)
     ============================================================ -->
<section class="py-16 bg-white dark:bg-black">
    <div class="container-main">
        <div class="text-center mb-10">
            <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
                <?php esc_html_e('Trusted By', 'nicopaz'); ?>
            </p>
            <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase tracking-tight">
                <?php esc_html_e('Partners & Sponsors', 'nicopaz'); ?>
            </h2>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-6 md:gap-8 max-w-5xl mx-auto">
            <?php
            $sponsors = [
                'Nike', 'Adidas', 'Puma', 'EA Sports',
                'Beats', 'Gatorade', 'New Balance', 'Sony',
            ];
            foreach ($sponsors as $sponsor) : ?>
                <div class="px-8 py-4 bg-slate-50 dark:bg-zinc-900/30 border border-slate-200/50 dark:border-white/5 rounded-2xl hover:border-celeste/20 hover:shadow-md transition-all duration-300">
                    <span class="font-display text-lg md:text-xl font-extrabold text-slate-400 dark:text-gray-500 hover:text-celeste dark:hover:text-white transition-colors cursor-default"><?php echo esc_html($sponsor); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     14. NEWSLETTER (Massive Frosted Glass Banner)
     ============================================================ -->
<section class="section-padding bg-slate-50 dark:bg-zinc-950/20 border-t border-b border-slate-200/50 dark:border-zinc-800/80 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern dark:bg-grid-pattern-dark opacity-10 dark:opacity-20 pointer-events-none"></div>
    <div class="container-main relative">
        <div class="max-w-4xl mx-auto bg-gradient-to-br from-celeste/10 via-white/40 to-gold/10 dark:via-zinc-900/20 backdrop-blur-xl border border-slate-200 dark:border-white/5 rounded-3xl p-8 md:p-14 shadow-2xl relative overflow-hidden group">
            <div class="absolute -top-32 -right-32 w-[300px] h-[300px] bg-gold-glow opacity-30 pointer-events-none"></div>
            <div class="absolute -bottom-32 -left-32 w-[300px] h-[300px] bg-celeste-glow opacity-30 pointer-events-none"></div>
            
            <div class="relative text-center max-w-2xl mx-auto z-10">
                <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white mb-4 tracking-tight">
                    <?php esc_html_e('STAY CONNECTED', 'nicopaz'); ?>
                </h2>
                <div class="flag-ribbon w-24 mx-auto mb-6"></div>
                <p class="text-slate-500 dark:text-gray-400 text-sm sm:text-base leading-relaxed mb-8">
                    <?php esc_html_e('Get exclusive updates, early access to new merch drops, and behind-the-scenes content straight to your inbox.', 'nicopaz'); ?>
                </p>
                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input type="email" placeholder="<?php esc_attr_e('Your email address', 'nicopaz'); ?>" class="flex-1 px-5 py-3.5 rounded-xl border border-slate-200 dark:border-zinc-800 text-sm bg-white dark:bg-zinc-950 text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-celeste/20 focus:border-celeste focus:outline-none transition-all" required>
                    <button type="submit" class="px-8 py-3.5 bg-slate-900 dark:bg-white text-white dark:text-slate-950 font-heading font-black rounded-xl text-sm hover:bg-slate-800 dark:hover:bg-slate-100 transition-colors whitespace-nowrap shadow-lg">
                        <?php esc_html_e('Subscribe', 'nicopaz'); ?>
                    </button>
                </form>
                <p class="text-slate-400 dark:text-gray-500 text-xs mt-4">
                    <?php esc_html_e('No spam. Unsubscribe anytime.', 'nicopaz'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     15. FINAL CALL TO ACTION / CONTACT (Athletic Booking Agent Desk)
     ============================================================ -->
<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-4xl mx-auto text-center">
        <p class="text-bebas text-celeste dark:text-gold text-xs tracking-[0.3em] font-bold mb-2">
            <?php esc_html_e('Get In Touch', 'nicopaz'); ?>
        </p>
        <h2 class="font-display font-extrabold text-3xl md:text-5xl text-slate-900 dark:text-white uppercase mb-10 tracking-tight">
            <?php esc_html_e('Contact & Booking', 'nicopaz'); ?>
        </h2>
        
        <div class="bg-slate-50/70 dark:bg-zinc-950/40 p-8 md:p-14 rounded-3xl border border-slate-200/50 dark:border-zinc-800/80 shadow-sm relative group overflow-hidden">
            <div class="absolute inset-0 bg-grid-pattern dark:bg-grid-pattern-dark opacity-10 dark:opacity-20 pointer-events-none"></div>
            
            <div class="relative z-10 max-w-xl mx-auto">
                <div class="text-5xl mb-5 animate-bounce">📩</div>
                <p class="text-slate-700 dark:text-slate-200 font-display font-bold text-lg md:text-xl mb-3">
                    <?php esc_html_e('Let\'s work together', 'nicopaz'); ?>
                </p>
                <p class="text-slate-500 dark:text-gray-400 mb-8 text-sm leading-relaxed">
                    <?php esc_html_e('For press inquiries, sponsorship opportunities, or professional booking requests.', 'nicopaz'); ?>
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="mailto:hello@nicopaz.com" class="inline-flex justify-center items-center px-8 py-3.5 bg-celeste hover:bg-celeste/95 text-white font-heading font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all duration-200 shadow-md shadow-celeste/10 hover:scale-105">
                        <?php esc_html_e('Send an Email', 'nicopaz'); ?>
                    </a>
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center items-center px-8 py-3.5 border-2 border-slate-200 dark:border-zinc-800 text-slate-800 dark:text-white hover:bg-slate-900 hover:text-white dark:hover:bg-white dark:hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all duration-200 hover:scale-105">
                        <?php esc_html_e('DM on Instagram', 'nicopaz'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
