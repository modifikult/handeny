<?php
    $store_image = get_field('store_image');
    $store_upper_text = get_field('store_upper_text');
    $store_title = get_field('store_title');
    $store_text = get_field('store_text');
    $store_button_1 = get_field('store_button_1');
    $store_button_2 = get_field('store_button_2');
?>

<?php if ($store_image && $store_upper_text && $store_title) : ?>
    <section class="store section">
        <div class="container">
            <div class="store__wrap">
                <div class="store__col col--image">
                    <div class="store__image">
                        <img src="<?php echo esc_url($store_image['url']); ?>"
                             alt="<?php echo esc_attr($store_image['alt'] ?: $store_image['title']); ?>">
                    </div>
                </div>
                <div class="store__col col--text">
                    <div class="heading text--center">
                        <div class="store__upper-text heading__upper-text text--italic">
                            <?php echo $store_upper_text; ?>
                        </div>
                        <div class="store__title heading__title">
                            <h2 class="h1"><?php echo $store_title; ?></h2>
                        </div>
                    </div>
                    <?php if ($store_text) : ?>
                        <div class="store__text text--center">
                            <?php echo $store_text; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($store_button_1 || $store_button_2) : ?>
                        <div class="store__btn">
                            <?php if ($store_button_1) : ?>
                                <a href="<?php echo esc_url($store_button_1['url']); ?>"
                                   class="btn btn-dark-light"
                                   target="<?php echo $store_button_1['target'] ?: '_self'; ?>">
                                    <?php echo $store_button_1['title']; ?>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($store_button_2) : ?>
                                <a href="<?php echo esc_url($store_button_2['url']); ?>"
                                   class="btn btn-dark-light bg-transparent"
                                   target="<?php echo $store_button_2['target'] ?: '_self'; ?>">
                                    <?php echo $store_button_2['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

