<?php get_header(); ?>

<?php if (have_rows('blocks')) : ?>
    <?php while (have_rows('blocks')) : the_row() ?>
        <?php get_template_part('template-parts/acf-blocks/' . get_row_layout()) ; ?>
    <?php endwhile; ?>
<?php else : ?>
	<?php the_content(); ?>
<?php endif; ?>

<?php get_footer();