<?php
defined('ABSPATH') || exit;

global $product;

$columns           = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters('woocommerce_single_product_image_gallery_classes', [
    'woocommerce-product-gallery',
    'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
    'woocommerce-product-gallery--columns-' . absint($columns),
    'images',
    'relative',
]);
?>
<div class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>" data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
    <figure class="woocommerce-product-gallery__wrapper rounded-xl overflow-hidden bg-nico-gray-light">
        <?php
        if ($post_thumbnail_id) {
            $html = wc_get_gallery_image_html($post_thumbnail_id, true);
        } else {
            $html = '<div class="woocommerce-product-gallery__image--placeholder aspect-square flex items-center justify-center">';
            $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image w-full h-full object-cover" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'nicopaz'));
            $html .= '</div>';
        }

        echo $html;
        ?>
    </figure>

    <?php do_action('woocommerce_product_thumbnails'); ?>
</div>
