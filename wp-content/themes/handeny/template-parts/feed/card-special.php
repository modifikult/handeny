<?php
    $link = '';
    $image = '';
    $title = '';
    $price = '';
    
    if (isset($args)) {
        $link = $args['link'];
        $image = $args['image'];
        $title = $args['title'];
        $price = $args['price'];
    }
?>

<a class="card card-special" href="<?php echo esc_url($link);?>">
    <div class="card--col col--left">
        <?php if ($image) : ?>
            <div class="card--image">
                <?php echo $image; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="card--col col--right">
        <?php if ($title) : ?>
            <div class="card--title">
                <?php echo $title; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($price) : ?>
            <div class="card--price">
                <?php echo $price; ?>
            </div>
        <?php endif; ?>
    </div>
</a>