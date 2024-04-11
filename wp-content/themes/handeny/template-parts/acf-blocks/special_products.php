<?php
    $special_products_image = get_field('special_products_image');
    $special_products_upper_text = get_field('special_products_upper_text');
    $special_products_title = get_field('special_products_title');
    $special_products_subtitle = get_field('special_products_subtitle');
    $special_products_button = get_field('special_products_button');
    $special_products_cat_1 = get_field('special_products_cat_1');
    $special_products_cat_2 = get_field('special_products_cat_2');
    
    $product_list_1 = '';
    $product_list_2 = '';
    
    if ($special_products_cat_1) {
        $args = [
            'status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $special_products_cat_1->term_id,
                    'operator' => 'IN'
                ],
                [
                    'taxonomy' => 'product_tag',
                    'field' => 'slug',
                    'terms' => 'featured-products',
                    'operator' => 'IN'
                ]
            ]
        ];
        
        $product_list_1 = wc_get_products($args);
    }
    
    if ($special_products_cat_2) {
        $args = [
            'status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $special_products_cat_2->term_id,
                    'operator' => 'IN'
                ],
                [
                    'taxonomy' => 'product_tag',
                    'field' => 'slug',
                    'terms' => 'new-products',
                    'operator' => 'IN'
                ]
            ]
        ];
        
        $product_list_2 = wc_get_products($args);
    }
?>

<?php if ($product_list_1 || $special_products_cat_2) : ?>
    <section class="special-posts section">
        <div class="container">
            <div class="special-posts__wrap">
                <div class="special-posts__col col--item">
                    <?php if ($special_products_image) : ?>
                        <div class="special-posts__image">
                            <img src="<?php echo esc_url($special_products_image['url']); ?>"
                                 alt="<?php echo esc_attr($special_products_image['alt'] ?: $special_products_image['title']); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="special-posts__col-wrap">
                        <?php if ($special_products_upper_text && $special_products_title) : ?>
                            <div class="heading">
                                <div class="special-posts__upper-text heading__upper-text text--italic">
                                    <?php echo $special_products_upper_text; ?>
                                </div>
                                <div class="special-posts__title heading__title">
                                    <h2><?php echo $special_products_title; ?></h2>
                                </div>
                                <?php if ($special_products_subtitle) : ?>
                                    <div class="special-posts__subtitle heading__subtitle">
                                        <?php echo $special_products_subtitle; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($special_products_button) : ?>
                            <div class="special-posts__btn">
                                <a href="<?php echo esc_url($special_products_button['url']); ?>"
                                   class="btn btn-dark-light"
                                   target="<?php echo $special_products_button['target'] ?: '_self'; ?>">
                                    <?php echo $special_products_button['title']; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if ($product_list_1) : ?>
                    <div class="special-posts__col col--list">
                        <div class="special-posts__list-title">
                            <h5><?php _e('Featured products'); ?></h5>
                        </div>
                        <div class="special-posts__list">
                            <?php foreach ($product_list_1 as $product) : ?>
                                <?php
                                $link = get_the_permalink($product->get_id());
                                $title = $product->name;
                                $image = get_the_post_thumbnail($product->get_id(), 'full', ['class' => '', 'alt' => 'Product thumbnail']);
                                $price = $product->get_price_html();
                                
                                $args = [
                                    'link' => $link,
                                    'title' => $title,
                                    'image' => $image,
                                    'price' => $price,
                                ];
                                ?>
                                
                                <?php get_template_part('template-parts/feed/card', 'special', $args); ?>
                            
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($product_list_2) : ?>
                    <div class="special-posts__col col--list">
                        <div class="special-posts__list-title">
                            <h5><?php _e('New products'); ?></h5>
                        </div>
                        <div class="special-posts__list">
                            <?php foreach ($product_list_2 as $product) : ?>
                                <?php
                                $link = get_the_permalink($product->get_id());
                                $title = $product->name;
                                $image = get_the_post_thumbnail($product->get_id(), 'full', ['class' => '', 'alt' => 'Product thumbnail']);
                                $price = $product->get_price_html();
                                
                                $args = [
                                    'link' => $link,
                                    'title' => $title,
                                    'image' => $image,
                                    'price' => $price,
                                ];
                                ?>
                                
                                <?php get_template_part('template-parts/feed/card', 'special', $args); ?>
                            
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>