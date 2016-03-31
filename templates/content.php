<article <?php post_class(); ?>>
    <div class="ui grid stackable">
        <div class="five wide column">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="" class="ui image" />
            </a>
        </div>
        <div class="eleven wide column">
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <?php get_template_part('templates/entry-meta'); ?>
            <br>
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>
<br>
