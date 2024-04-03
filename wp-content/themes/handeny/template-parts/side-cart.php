<?php
    $cart_items = WC()->cart->get_cart();
?>

<div class="side-cart">
    <div class="side-cart__wrap">
        <div class="side-cart__heading">
            <h5 class="side-cart__title"><?php _e('Shopping cart'); ?></h5>

            <div class="side-cart__close js-cart-close">
                <?php echo get_inline_svg('close-icon.svg'); ?>
            </div>
        </div>
        
        <?php if ($cart_items) : ?>
            <div class="side-cart__menu">
                <?php woocommerce_mini_cart(); ?>
            </div>
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
    </div>
</div>