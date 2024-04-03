<div class="search-icon js-search" aria-label="Search">
    <?php echo get_inline_svg('search-icon.svg');?>
</div>
<div class="search-field-container">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search for products', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </form>
    <div class="search-close" aria-label="Close">
        <?php echo get_inline_svg('close-icon.svg');?>
    </div>
</div>
