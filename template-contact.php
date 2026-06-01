<?php
/*
 * Template Name: Contact
 * Description: Contact form, booking inquiries, and social links.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Get In Touch', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Contact & Booking', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14">

            <div>
                <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-6">
                    <?php esc_html_e('Send a Message', 'nicopaz'); ?>
                </h2>
                <form class="space-y-4" method="post" action="#">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-heading font-semibold text-nico-dark dark:text-white mb-1"><?php esc_html_e('Name', 'nicopaz'); ?></label>
                            <input type="text" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-nico-gray-light dark:bg-gray-950 text-nico-dark dark:text-white text-sm focus:ring-2 focus:ring-nico-dark/20 dark:focus:ring-white/20 focus:outline-none" required>
                        </div>
                        <div>
                            <label class="block text-sm font-heading font-semibold text-nico-dark dark:text-white mb-1"><?php esc_html_e('Email', 'nicopaz'); ?></label>
                            <input type="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-nico-gray-light dark:bg-gray-950 text-nico-dark dark:text-white text-sm focus:ring-2 focus:ring-nico-dark/20 dark:focus:ring-white/20 focus:outline-none" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-heading font-semibold text-nico-dark dark:text-white mb-1"><?php esc_html_e('Subject', 'nicopaz'); ?></label>
                        <select class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-nico-gray-light dark:bg-gray-950 text-nico-dark dark:text-white text-sm focus:ring-2 focus:ring-nico-dark/20 dark:focus:ring-white/20 focus:outline-none">
                            <option><?php esc_html_e('General Inquiry', 'nicopaz'); ?></option>
                            <option><?php esc_html_e('Press / Media', 'nicopaz'); ?></option>
                            <option><?php esc_html_e('Sponsorship', 'nicopaz'); ?></option>
                            <option><?php esc_html_e('Fan Mail', 'nicopaz'); ?></option>
                            <option><?php esc_html_e('Booking', 'nicopaz'); ?></option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-heading font-semibold text-nico-dark dark:text-white mb-1"><?php esc_html_e('Message', 'nicopaz'); ?></label>
                        <textarea rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-800 bg-nico-gray-light dark:bg-gray-950 text-nico-dark dark:text-white text-sm focus:ring-2 focus:ring-nico-dark/20 dark:focus:ring-white/20 focus:outline-none resize-none" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary text-sm px-8 py-3">
                        <?php esc_html_e('Send Message', 'nicopaz'); ?>
                    </button>
                </form>
            </div>

            <div class="space-y-8">
                <div>
                    <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white mb-6">
                        <?php esc_html_e('Other Ways to Reach Us', 'nicopaz'); ?>
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-argentina-blue/10 dark:bg-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-argentina-blue dark:text-white text-lg">✉</span>
                            </div>
                            <div>
                                <p class="font-heading font-bold text-nico-dark dark:text-white text-sm"><?php esc_html_e('Email', 'nicopaz'); ?></p>
                                <p class="text-nico-gray dark:text-gray-400 text-sm">hello@nicopaz.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-argentina-blue/10 dark:bg-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-argentina-blue dark:text-white text-lg">📱</span>
                            </div>
                            <div>
                                <p class="font-heading font-bold text-nico-dark dark:text-white text-sm"><?php esc_html_e('Management', 'nicopaz'); ?></p>
                                <p class="text-nico-gray dark:text-gray-400 text-sm">management@nicopaz.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-argentina-blue/10 dark:bg-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-argentina-blue dark:text-white text-lg">⏱</span>
                            </div>
                            <div>
                                <p class="font-heading font-bold text-nico-dark dark:text-white text-sm"><?php esc_html_e('Response Time', 'nicopaz'); ?></p>
                                <p class="text-nico-gray dark:text-gray-400 text-sm"><?php esc_html_e('Within 48 hours', 'nicopaz'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 dark:border-gray-900 pt-8">
                    <h3 class="font-heading text-lg font-bold text-nico-dark dark:text-white mb-4"><?php esc_html_e('Follow Nico', 'nicopaz'); ?></h3>
                    <div class="flex flex-wrap gap-3">
                        <?php
                        $socials = [
                            'Instagram' => 'https://instagram.com/nicopaz',
                            'Twitter' => 'https://twitter.com/nicopaz',
                            'TikTok' => 'https://tiktok.com/@nicopaz',
                            'YouTube' => 'https://youtube.com/@nicopaz',
                        ];
                        foreach ($socials as $name => $url) : ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" class="px-4 py-2 rounded-xl bg-nico-gray-light dark:bg-gray-950 border border-gray-100 dark:border-gray-800 text-nico-dark dark:text-white text-sm font-heading font-semibold hover:bg-nico-dark hover:text-white dark:hover:bg-white dark:hover:text-nico-dark transition-colors">
                                <?php echo esc_html($name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
