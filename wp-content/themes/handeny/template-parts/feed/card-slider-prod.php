<?php
    $product_id = '';
    $image = '';
    $title = '';
    $cat_name = '';
    $price = '';
    
    if (isset($args)) {
        $product_id = $args['product_id'];
        $image = $args['image'];
        $title = $args['title'];
        $cat_name = $args['cat_name'];
        $price = $args['price'];
    }
?>

<div class="card card-slider-prod">
    <?php if ($image) : ?>
        <div class="card--image">
            <?php echo $image; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($title) : ?>
        <div class="card--title text--center">
            <?php echo $title; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($cat_name) : ?>
        <div class="card--cat text--center">
            <?php echo $cat_name; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($price) : ?>
        <div class="card--price text--center">
            <?php echo $price; ?>
        </div>
    <?php endif; ?>
    
    <div class="card--btn">
        <span class="btn btn-icon js-add-to-cart" data-product-id="<?php echo $product_id;?>">
            <?php echo get_inline_svg('cart-icon.svg');?>
        </span>

        <a href="<?php echo get_the_permalink($product_id);?>" class="btn btn-icon">
            <?php echo get_inline_svg('search-icon.svg');?>
        </a>
    </div>
</div>