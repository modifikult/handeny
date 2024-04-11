<?php
    $special_video = get_field('special_video');
    $special_poster = get_field('special_poster');
    $special_upper_text = get_field('special_upper_text');
    $special_title = get_field('special_title');
    $special_button = get_field('special_button');
?>

<?php if ($special_video && $special_upper_text && $special_title) : ?>
    <section class="special section">
        <div class="container">
            <div class="special__wrap">
                <div class="special__col col--video">
                    <div class="video__wrap">
                        <img src="<?php echo esc_url($special_poster['url']); ?>"
                             alt="<?php echo esc_attr($special_poster['alt'] ?: $special_poster['title']); ?>">
                        <video class="hidden" src="<?php echo esc_url($special_video['url']); ?>" controls></video>
                        <div class="play--icon">
                            <?php echo get_inline_svg('play-icon.svg');?>
                        </div>
                    </div>
                </div>
                <div class="special__col col--text">
                    <div class="heading">
                        <div class="special__upper-text heading__upper-text text--italic">
                            <?php echo $special_upper_text; ?>
                        </div>
                        <div class="special__title heading__title">
                            <h2><?php echo $special_title; ?></h2>
                        </div>
                    </div>
                    <?php if ($special_button) : ?>
                        <div class="special__btn">
                            <a href="<?php echo esc_url($special_button['url']); ?>"
                               class="btn btn-dark-light"
                               target="<?php echo $special_button['target'] ?: '_self'; ?>">
                                <?php echo $special_button['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

