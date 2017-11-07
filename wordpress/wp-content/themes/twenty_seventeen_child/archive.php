<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
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

			endwhile;

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
