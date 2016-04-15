<?php
/**
* Template Name: Masonry
*/

// WP_Query arguments
$args = array (
'post_type'              => array( 'post' ),
'order'                  => 'DESC',
);

// The Query
$query = new WP_Query( $args );
?>
<br>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
    <br>
    <br>
    <br>
    <h1 style="text-align:center; text-transform:uppercase; margin:0; font-size:76px; letter-spacing:2px;"><span style="color:#BF2E36">DANCE</span>FLOOR</h1>
    <!-- <hr style="margin:0"> -->
    <h2 style="background:black;color:white;text-align:center; text-transform:uppercase; margin:0; letter-spacing:0.1px; font-size:25px">école & Compagnie de danse à Genève</h2>
    <br>
    <br>
    <br>
    <br>
    <div class="masonry">
        <div class="grid-sizer"></div>
        <?php
        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                <article class="grid-item <?php echo get_image_type($image); ?>" >
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?= $image[0] ?>" alt="" class="<?php echo get_image_type($image); ?>"/>
                        <div class="grid-item-overlay">
                            <div class="grid-item-overlay-background"></div>
                            <div class="grid-item-title" style="text-transform:uppercase"><?php the_title(); ?> </div>
                        </div>
                    </a>
                </article>
                <?php
            }
        } else {
            _e('There are no post','sage');
        }

        // Restore original Post Data
        wp_reset_postdata();
        ?>
    </div>
<?php endwhile; ?>
