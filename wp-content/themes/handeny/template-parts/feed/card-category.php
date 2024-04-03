<?php
    $image_url = '';
    $link = '';
    $theme = '';
    $title = '';
    $text = '';
    $button_text = '';
    
    if (isset($args)) {
        $image_url = $args['image_url'];
        $link = $args['link'];
        $title = $args['title'];
        $theme = $args['theme'];
        $text = $args['text'];
        $button_text = $args['btn_text'];
    }
?>

<a class="card card-category theme--<?php echo $theme;?>" href="<?php echo esc_url($link); ?>">
    <?php if ($image_url) : ?>
        <div class="card--image">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo $title; ?>">
        </div>
    <?php endif; ?>
    <div class="card--wrap">
        <?php if ($title) : ?>
            <div class="card--title text--center">
                <h4 class="h3"><?php echo $title; ?></h4>
            </div>
        <?php endif; ?>
        
        <?php if ($text) : ?>
            <div class="card--text text--center">
                <?php echo $text; ?>
            </div>
        <?php endif; ?>

        <div class="card--btn text--center">
             <span class="btn btn-text">
                <?php echo $button_text ?: 'Shop now'; ?>
             </span>
        </div>
    </div>

</a>
