<br>
<article <?php post_class(); ?>>
    <?php if (has_post_format( 'video' )): ?>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_content(); ?>
    <?php else: ?>
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
    <?php endif; ?>
</article>
<br>
<div class="ui divider"></div>
