<?php
/*
 * Template Name: Terms & Conditions
 * Description: Terms of service and conditions of use.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Legal', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Terms & Conditions', 'nicopaz'); ?>
        </h1>
        <p class="text-nico-gray dark:text-gray-400 mt-4">
            <?php printf(__('Last updated: %s', 'nicopaz'), date('F j, Y')); ?>
        </p>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-3xl">
        <div class="prose prose-lg max-w-none text-nico-gray dark:text-gray-400">
            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Acceptance of Terms', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('By accessing and using this website, you accept and agree to be bound by these Terms and Conditions. If you do not agree to these terms, please do not use this website.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Use of the Website', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('This website and its content are owned by Nico Paz. You may not copy, reproduce, distribute, or create derivative works without express written permission.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Shop & Purchases', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('All products are subject to availability. We reserve the right to discontinue any product at any time. Prices for products are subject to change without notice.', 'nicopaz'); ?></p>
            <p><?php esc_html_e('We reserve the right to refuse or cancel any order for any reason, including limitations on quantities available, inaccuracies in product or pricing information, or errors identified by our fraud detection systems.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Shipping & Returns', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('Shipping times are estimates and may vary. We are not responsible for delays caused by customs or shipping carriers. For returns, please refer to our return policy included with your purchase.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Intellectual Property', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('All trademarks, logos, and content on this website are the property of Nico Paz or its licensors and are protected by copyright and trademark laws.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Limitation of Liability', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('In no event shall Nico Paz be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of the website or any products purchased.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Governing Law', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('These Terms and Conditions are governed by and construed in accordance with applicable laws. Any disputes shall be resolved in the appropriate courts of jurisdiction.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Contact', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('For questions about these Terms and Conditions, please contact us at legal@nicopaz.com.', 'nicopaz'); ?></p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
