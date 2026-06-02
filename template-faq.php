<?php
/*
 * Template Name: FAQ
 * Description: Frequently asked questions with accordion interface.
 */
get_header(); ?>

<main id="primary" class="site-main">

<section class="bg-white dark:bg-black py-16 md:py-20">
    <div class="container-main text-center">
        <p class="text-celeste dark:text-gold font-heading font-semibold text-sm uppercase tracking-[0.15em] mb-2">
            <?php esc_html_e('Help Center', 'nicopaz'); ?>
        </p>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-black text-nico-dark dark:text-white">
            <?php esc_html_e('Frequently Asked Questions', 'nicopaz'); ?>
        </h1>
    </div>
</section>

<section class="section-padding bg-white dark:bg-black">
    <div class="container-main max-w-3xl">
        <div class="space-y-3" id="faq-accordion">
            <?php
            $faqs = [
                ['q' => __('What position does Nico Paz play?', 'nicopaz'), 'a' => __('Nico Paz is an attacking midfielder (CAM) known for his vision, passing range, and technical ability. He can also operate as a central midfielder (CM) or on the wings when needed.', 'nicopaz')],
                ['q' => __('Which clubs has Nico Paz played for?', 'nicopaz'), 'a' => __('Nico began his youth career at Real Madrid\'s famed La Fábrica academy. He made his first-team debut for Real Madrid before joining Como 1907 in Serie A.', 'nicopaz')],
                ['q' => __('How can I buy official Nico Paz merchandise?', 'nicopaz'), 'a' => __('Official merchandise is available in the Shop section of this website. We offer authentic jerseys, apparel, accessories, and limited-edition items. All products are shipped worldwide.', 'nicopaz')],
                ['q' => __('What is the shipping policy?', 'nicopaz'), 'a' => __('We ship internationally. Delivery times vary by location — typically 5–10 business days domestically and 10–20 business days internationally. You will receive a tracking number once your order is dispatched.', 'nicopaz')],
                ['q' => __('How can I contact Nico Paz or his management?', 'nicopaz'), 'a' => __('For press inquiries, sponsorship opportunities, and professional requests, please use the Contact section on this website or email hello@nicopaz.com.', 'nicopaz')],
                ['q' => __('Does Nico Paz have social media accounts?', 'nicopaz'), 'a' => __('Yes! Follow Nico on Instagram, Twitter, and TikTok for exclusive behind-the-scenes content, training updates, and personal messages.', 'nicopaz')],
                ['q' => __('What sizes are available for jerseys?', 'nicopaz'), 'a' => __('Our jerseys are available in sizes XS through 3XL. Please refer to the size guide on each product page for detailed measurements.', 'nicopaz')],
                ['q' => __('Can I get a personalized item?', 'nicopaz'), 'a' => __('Personalized and signed items are available during special limited drops. Follow our social media to be notified when new items become available.', 'nicopaz')],
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

</main>

<?php get_footer(); ?>
