<?php
    $featured_upper_text = get_field('featured_upper_text');
    $featured_title = get_field('featured_title');
    $featured_text = get_field('featured_text');
    $featured_prod_cat_1 = get_field('featured_prod_cat_1');
    $featured_prod_cat_2 = get_field('featured_prod_cat_2');
    $featured_prod_slider_1 = get_field('featured_prod_slider_1');
    $featured_prod_slider_2 = get_field('featured_prod_slider_2');
    
    $product_list_1 = '';
    $product_list_2 = '';
    
    if ($featured_prod_slider_1) {
        $product_ids = array();
        
        foreach ($featured_prod_slider_1 as $product) {
            $product_ids[] = $product;
        }
        
        $args = [
            'status' => 'publish',
            'orderby' => 'date',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'include' => $product_ids,
            'tax_query' => [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $featured_prod_cat_1->term_id
                ],
            ]
        ];
        
        $product_list_1 = wc_get_products($args);
    }
    
    if ($featured_prod_slider_2) {
        $product_ids = array();
        
        foreach ($featured_prod_slider_2 as $product) {
            $product_ids[] = $product;
        }
        
        $args = [
            'status' => 'publish',
            'orderby' => 'date',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'include' => $product_ids,
            'tax_query' => [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $featured_prod_cat_2->term_id
                ],
            ]
        ];
        
        $product_list_2 = wc_get_products($args);
    }
?>

<?php if ($product_list_1 || $product_list_2) : ?>
    <section class="featured-posts section">
        <div class="container">
            <div class="featured-posts__wrap">
                <?php if ($featured_upper_text && $featured_title) : ?>
                    <div class="heading text--center">
                        <div class="featured-posts__upper-text heading__upper-text text--italic">
                            <?php echo $featured_upper_text; ?>
                        </div>
                        <div class="featured-posts__title heading__title">
                            <h2 class="h3"><?php echo $featured_title; ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($featured_text) : ?>
                    <div class="featured-posts__text text--center">
                        <?php echo $featured_text; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($product_list_1) : ?>
                    <div class="featured-posts__row">
                        <div class="featured-posts__cat">
                            <?php
                                $category_id = $featured_prod_cat_1->term_id;
                                
                                $cat_image_id = get_term_meta($category_id, 'thumbnail_id', true);
                                $cat_image_url = '';
                                
                                if ($cat_image_id) {
                                    $cat_image_url = wp_get_attachment_image_url($cat_image_id, 'full');
                                }
                                
                                $cat_link = get_category_link($category_id);
                                
                                $cat_theme = get_field('theme', 'product_cat_' . $category_id);
                                $cat_title = get_field('title', 'product_cat_' . $category_id);
                                $cat_text = get_field('text', 'product_cat_' . $category_id);
                                $cat_button_text = get_field('button_text', 'product_cat_' . $category_id);
                                
                                $args = [
                                    'image_url' => $cat_image_url,
                                    'link' => $cat_link,
                                    'theme' => $cat_theme,
                                    'title' => $cat_title,
                                    'text' => $cat_text,
                                    'btn_text' => $cat_button_text,
                                ]
                            ?>
                            
                            <?php get_template_part('template-parts/feed/card', 'category', $args); ?>

                        </div>
                        <div class="featured-posts__list js-slider">
                            <?php foreach ($product_list_1 as $product) : ?>
                                <?php
                                $category = $featured_prod_cat_1;
                                $product_id = $product->get_id();
    
                                $title = $product->name;
                                $cat_name = $category->name;
                                $image = get_the_post_thumbnail($product_id, 'full', ['class' => '', 'alt' => 'Product thumbnail']);
                                $price = $product->get_price_html();
                                
                                $args = [
                                    'product_id' => $product_id,
                                    'title' => $title,
                                    'cat_name' => $cat_name,
                                    'image' => $image,
                                    'price' => $price,
                                ];
                                ?>
                                
                                <?php get_template_part('template-parts/feed/card', 'slider-prod', $args); ?>
                            
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($product_list_2) : ?>
                    <div class="featured-posts__row">
                        <div class="featured-posts__cat">
                            <?php
                                $category_id = $featured_prod_cat_2->term_id;
                                
                                $cat_image_id = get_term_meta($category_id, 'thumbnail_id', true);
                                $cat_image_url = '';
                                
                                if ($cat_image_id) {
                                    $cat_image_url = wp_get_attachment_image_url($cat_image_id, 'full');
                                }
                                
                                $cat_link = get_category_link($category_id);
                                
                                $cat_theme = get_field('theme', 'product_cat_' . $category_id);
                                $cat_title = get_field('title', 'product_cat_' . $category_id);
                                $cat_text = get_field('text', 'product_cat_' . $category_id);
                                $cat_button_text = get_field('button_text', 'product_cat_' . $category_id);
                                
                                $args = [
                                    'image_url' => $cat_image_url,
                                    'link' => $cat_link,
                                    'theme' => $cat_theme,
                                    'title' => $cat_title,
                                    'text' => $cat_text,
                                    'btn_text' => $cat_button_text,
                                ]
                            ?>
                            
                            <?php get_template_part('template-parts/feed/card', 'category', $args); ?>

                        </div>
                        <div class="featured-posts__list js-slider">
                            <?php foreach ($product_list_2 as $product) : ?>
                                <?php
                                $category = $featured_prod_cat_2;
                                $product_id = $product->get_id();
    
                                $title = $product->name;
                                $cat_name = $category->name;
                                $image = get_the_post_thumbnail($product_id, 'full', ['class' => '', 'alt' => 'Product thumbnail']);
                                $price = $product->get_price_html();
    
                                $args = [
                                    'product_id' => $product_id,
                                    'title' => $title,
                                    'cat_name' => $cat_name,
                                    'image' => $image,
                                    'price' => $price,
                                ];
                                ?>
                                
                                <?php get_template_part('template-parts/feed/card', 'slider-prod', $args); ?>
                            
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>