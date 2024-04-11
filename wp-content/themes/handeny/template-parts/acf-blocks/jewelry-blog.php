<?php
    $jewelry_blog_upper_text = get_field('jewelry_blog_upper_text');
    $jewelry_blog_title = get_field('jewelry_blog_title');
    $jewelry_blog_text = get_field('jewelry_blog_text');
    $jewelry_blog_post_slider = get_field('jewelry_blog_post_slider');
    
    $query = '';
    
    if ($jewelry_blog_post_slider) {
        $post_ids = array();
        
        foreach ($jewelry_blog_post_slider as $post) {
            $post_ids[] = $post->ID;
        }
        
        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'post__in' => $post_ids,
        ];
        
        $query = new WP_Query($args);
    }
?>

<?php if ($query->have_posts()) : ?>
    <section class="jewelry-blog section">
        <div class="container">
            <div class="jewelry-blog__wrap">
                <?php if ($jewelry_blog_upper_text && $jewelry_blog_title) : ?>
                    <div class="heading text--center">
                        <div class="jewelry-blog__upper-text heading__upper-text text--italic">
                            <?php echo $jewelry_blog_upper_text; ?>
                        </div>
                        <div class="jewelry-blog__title heading__title">
                            <h2 class="h3"><?php echo $jewelry_blog_title; ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($jewelry_blog_text) : ?>
                    <div class="jewelry-blog__text text--center">
                        <?php echo $jewelry_blog_text; ?>
                    </div>
                <?php endif; ?>

                <div class="jewelry-blog__list js-slider">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php get_template_part('template-parts/feed/card', 'blog'); ?>
                    <?php endwhile; ?>
                    
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>