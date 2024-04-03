<?php
    $hero_bg_image = get_field('hero_bg_image');
    $hero_upper_text = get_field('hero_upper_text');
    $hero_title = get_field('hero_title');
    $hero_text = get_field('hero_text');
    $hero_button_1 = get_field('hero_button_1');
    $hero_button_2 = get_field('hero_button_2');
?>

<?php if ($hero_upper_text && $hero_title) : ?>
    <section class="hero section">
        <?php if ($hero_bg_image) : ?>
            <div class="hero--bg">
                <img src="<?php echo esc_url($hero_bg_image['url']); ?>"
                     alt="<?php echo esc_attr($hero_bg_image['alt'] ?: $hero_bg_image['title']); ?>">
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="hero__wrap">
                <div class="heading">
                    <div class="hero__upper-text heading__upper-text text--italic">
                        <?php echo $hero_upper_text; ?>
                    </div>
                    <div class="hero__title heading__title">
                        <h1 class="h2"><?php echo $hero_title; ?></h1>
                    </div>
                </div>
                <?php if ($hero_text) : ?>
                    <div class="hero__text">
                        <?php echo $hero_text; ?>
                    </div>
                <?php endif; ?>
                <?php if ($hero_button_1 || $hero_button_2) : ?>
                    <div class="hero__btn">
                        <?php if ($hero_button_1) : ?>
                            <a href="<?php echo esc_url($hero_button_1['url']); ?>"
                               class="btn btn-white"
                               target="<?php echo $hero_button_1['target'] ?: '_self'; ?>">
                                <?php echo $hero_button_1['title']; ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($hero_button_2) : ?>
                            <a href="<?php echo esc_url($hero_button_2['url']); ?>"
                               class="btn btn-white bg-transparent"
                               target="<?php echo $hero_button_2['target'] ?: '_self'; ?>">
                                <?php echo $hero_button_2['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

