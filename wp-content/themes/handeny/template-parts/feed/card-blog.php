<?php
    $image = get_the_post_thumbnail(get_the_ID(), 'full', false, ['alt' => 'Post thumbnail']);
    
    $author_id = get_the_author_meta('ID');
    $terms = get_terms(['taxonomy' => 'category']);
?>

<a class="card card-blog" href="<?php echo esc_url(get_the_permalink()); ?>">
    <?php if ($image) : ?>
        <div class="card--image">
            <?php echo $image; ?>
            <div class="card--hover">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="card--date">
                <?php the_time('d'); ?>
                <span><?php the_time('M'); ?></span>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="card--wrap">
        <?php if ($terms) : ?>
            <div class="card--category">
                <?php echo $terms[0]->name; ?>
            </div>
        <?php endif; ?>

        <div class="card--title text--center">
            <h4><?php the_title(); ?></h4>
        </div>

        <div class="card--author text--center">
            <?php _e('Posted by'); ?>
            <?php echo get_avatar($author_id, 'full'); ?>
            <?php the_author(); ?>
        </div>
        
        <?php if (get_the_content()) : ?>
            <div class="card--text text--center">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>

        <div class="card--btn text--center">
             <span class="btn btn-text">
                 <?php _e('Continue reading'); ?>
             </span>
        </div>
    </div>

</a>
