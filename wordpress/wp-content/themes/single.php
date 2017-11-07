<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post/content', get_post_format() );
?>
<article>
                <h3><?php the_field('venue') ?></h3>
                <h3><?php the_field('event_date') ?></h3>
                <h3><?php the_field('time') ?></h3>
                <h3><?php the_field('price') ?></h3>
                <h3><?php the_field('custom_category') ?></h3>
                <h3>
                    <?php
                    if(get_field('custom_category') == 'Music')
                    {
                        ?>
                        <h4><?php the_field('music_genre')?></h4>
                        <?php
                    }
                    else if (get_field('custom_category') === 'movie' || 'film' )
                    {
                        ?>
                        <h4><?php the_field('movie_genre')?></h4>
                        <?php
                    }
                    else if (get_field('custom_category') === 'Spoken Word' )
                    {
                        ?>
                        <h4><?php the_field('spoken_word_genre')?></h4>
                        <?php
                    }
                    else if (get_field('custom_category') === 'Performing Arts' )
                    {
                        ?>
                        <h4><?php the_field('performing_arts')?></h4>
                        <?php
                    }
                    else if (get_field('custom_category') === 'Other' )
                    {
                        ?>
                        <h4><?php the_field('other')?></h4>
                        <?php
                    }
                ?>
                </h3>
                <h4><?php the_field('social_media_links') ?></h4>
            
</article>
<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				) );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
