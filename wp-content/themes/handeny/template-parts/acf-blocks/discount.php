<?php
    $discount_image = get_field('discount_image');
    $discount_title = get_field('discount_title');
    $discount_text = get_field('discount_text');
    $discount_button_1 = get_field('discount_button_1');
    $discount_button_2 = get_field('discount_button_2');
?>

<?php if ($discount_image && $discount_title) : ?>
    <section class="discount section">
        <div class="container">
            <div class="discount__wrap">
                <div class="discount__col col--text">
                    <div class="heading">
                        <div class="discount__title heading__title">
                            <h2 class="h1"><?php echo $discount_title; ?></h2>
                        </div>
                    </div>
                    <?php if ($discount_text) : ?>
                        <div class="discount__text">
                            <?php echo $discount_text; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($discount_button_1 || $discount_button_2) : ?>
                        <div class="discount__btn">
                            <?php if ($discount_button_1) : ?>
                                <a href="<?php echo esc_url($discount_button_1['url']); ?>"
                                   class="btn btn-dark-light"
                                   target="<?php echo $discount_button_1['target'] ?: '_self'; ?>">
                                    <?php echo $discount_button_1['title']; ?>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($discount_button_2) : ?>
                                <a href="<?php echo esc_url($discount_button_2['url']); ?>"
                                   class="btn btn-dark-light bg-transparent"
                                   target="<?php echo $discount_button_2['target'] ?: '_self'; ?>">
                                    <?php echo $discount_button_2['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="discount__col col--image">
                    <div class="discount__image">
                        <img src="<?php echo esc_url($discount_image['url']); ?>"
                             alt="<?php echo esc_attr($discount_image['alt'] ?: $discount_image['title']); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

