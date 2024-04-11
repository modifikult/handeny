<header class="header">
    <div class="container">
        <div class="header__wrap">
            <?php if (function_exists('the_custom_logo')) : ?>
                <div class="header__logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php endif; ?>
            <div class="header__nav">
                <?php wp_nav_menu(['menu' => 'main-menu',]); ?>
            </div>
            <div class="header__login">
                <a href="<?php echo esc_url(wp_login_url());?>">
                    <?php _e('Login / Register');?>
                </a>
            </div>
            <div class="header__search">
                <?php get_search_form(); ?>
            </div>
            <div class="header__burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header__cart js-cart-open">
                <div class="header__cart-icon">
                    <?php echo get_inline_svg('cart-icon.svg'); ?>
                    
                    <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>

                    <span class="quantity"><?php echo $cart_count; ?></span>
                </div>
                <div class="header__cart-total-price">
                    <?php $cart_total = WC()->cart->get_cart_contents_total(); ?>
                    
                    <?php echo wc_price($cart_total); ?>
                </div>
            </div>
            <div class="header--side">
                <div class="header__login">
                    <?php _e('Login / Register');?>
                </div>
                <div class="header__nav">
                    <?php wp_nav_menu(['menu' => 'main-menu',]); ?>
                </div>
            </div>
        </div>
    </div>
</header>