<?php get_header(); ?>

<article>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post">
<h2><a href="<?php the_permalink(); ?>">
<?php the_title(); ?></a>
</h2>
<?php the_content(); ?>
</div>

<?php endwhile; ?>

<div class="post-nav">
<?php posts_nav_link(); ?>
</div>
<?php endif; ?>


</article>

<?php get_footer(); ?>
