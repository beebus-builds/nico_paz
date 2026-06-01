<?php
/*
 * Template Name: Privacy Policy
 * Description: Privacy policy and data protection information.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-argentina-blue dark:text-argentina-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Legal', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Privacy Policy', 'nicopaz'); ?>
        </h1>
        <p class="text-nico-gray dark:text-gray-400 mt-4">
            <?php printf(__('Last updated: %s', 'nicopaz'), date('F j, Y')); ?>
        </p>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-3xl">
        <div class="prose prose-lg max-w-none text-nico-gray dark:text-gray-400">
            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Information We Collect', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('When you visit our website, we may collect certain information about your device, your interaction with the website, and information necessary to process your purchases. We may also collect additional information if you contact us for customer support.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('How We Use Your Information', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('We use the information we collect to fulfill orders, provide customer support, send promotional communications (with your consent), and improve our website and services.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Cookies', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('We use cookies to improve your experience on our website. You can choose to disable cookies through your browser settings, though some features of the site may not function properly as a result.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Third-Party Services', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('We may use third-party services such as payment processors, analytics providers, and advertising partners. These services have their own privacy policies governing how they use information.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Data Security', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('We implement appropriate security measures to protect your personal information. However, no method of transmission over the Internet is 100% secure, and we cannot guarantee absolute security.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Your Rights', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('You have the right to access, correct, or delete your personal data. You may also opt out of marketing communications at any time by contacting us or using the unsubscribe link in our emails.', 'nicopaz'); ?></p>

            <h2 class="font-heading text-2xl font-black text-nico-dark dark:text-white"><?php esc_html_e('Contact Us', 'nicopaz'); ?></h2>
            <p><?php esc_html_e('If you have questions about this privacy policy, please contact us at privacy@nicopaz.com.', 'nicopaz'); ?></p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
