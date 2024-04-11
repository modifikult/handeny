<?php
    /**
     * Mini-cart
     *
     * Contains the markup for the mini-cart, used by the cart widget.
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see     https://woo.com/document/template-structure/
     * @package WooCommerce\Templates
     * @version 7.9.0
     */
    
    defined('ABSPATH') || exit;
    
    do_action('woocommerce_before_mini_cart'); ?>

<?php if (!WC()->cart->is_empty()) : ?>

    <ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
        <?php
            do_action('woocommerce_before_mini_cart_contents');
            
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                
                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
                    /**
                     * This filter is documented in woocommerce/templates/cart/cart.php.
                     *
                     * @since 2.1.0
                     */
                    $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                    $product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                    ?>
                    <li class="woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">
                        <div class="mini-cart-item__col">
                            <?php if (empty($product_permalink)) : ?>
                                <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url($product_permalink); ?>">
                                    <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="mini-cart-item__col">
                            <div class="mini-cart-item__name">
                                <?php echo wp_kses_post($product_name); ?>
                            </div>
                            <div class="mini-cart-item__btn">
                                <?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                <input type="number" name="quantity" value="<?php echo $cart_item['quantity']; ?>" min="1" step="1" class="input-text qty text" size="4">
                                <button type="button" class="quantity-button plus" data-prod-id="<?php echo $product_id; ?>">+</button>
                                <button type="button" class="quantity-button minus" data-prod-id="<?php echo $product_id; ?>">-</button>
                            </div>
                            <div class="mini-cart-item__quantity">
                                <?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                <?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>
                        </div>

                        <div class="mini-cart-item__col">
                            <?php
                                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    'woocommerce_cart_item_remove_link',
                                    sprintf(
                                        '<a href="%s" class="remove remove_from_cart_button js-remove-from-cart" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.4 19.5L5 18.1L10.6 12.5L5 6.9L6.4 5.5L12 11.1L17.6 5.5L19 6.9L13.4 12.5L19 18.1L17.6 19.5L12 13.9L6.4 19.5Z" fill="#777777"/>
                                                </svg>
                                                </a>',
                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                        /* translators: %s is the product name */
                                        esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
                                        esc_attr($product_id),
                                        esc_attr($cart_item_key),
                                        esc_attr($_product->get_sku())
                                    ),
                                    $cart_item_key
                                );
                            ?>
                        </div>
                    </li>
                    <?php
                }
            }
            
            do_action('woocommerce_mini_cart_contents');
        ?>
    </ul>

    <p class="woocommerce-mini-cart__total total">
        <?php
            /**
             * Hook: woocommerce_widget_shopping_cart_total.
             *
             * @hooked woocommerce_widget_shopping_cart_subtotal - 10
             */
            do_action('woocommerce_widget_shopping_cart_total');
        ?>
    </p>
    
    <?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

    <p class="woocommerce-mini-cart__buttons buttons"><?php do_action('woocommerce_widget_shopping_cart_buttons'); ?></p>
    
    <?php do_action('woocommerce_widget_shopping_cart_after_buttons'); ?>

<?php else : ?>

    <div class="side-cart__menu">
        <div class="side-cart__image">
            <?php echo get_inline_svg('cart-big-icon.svg'); ?>
        </div>
        <p class="side-cart__text"><?php _e('No products in the cart.'); ?></p>
        <div class="side-cart__btn">
            <a href="#" class="btn btn-gold js-cart-close">
                <?php _e('Return to Shop'); ?>
            </a>
        </div>
    </div>

<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>
