<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article <?php
post_class(); ?> id="post-<?php
the_ID(); ?>">

    <header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">',
				esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php
		if ( 'post' === get_post_type() ) : ?>

            <div class="entry-meta">
               <span><span class="dashicons dashicons-calendar-alt"></span> <?php
	               the_date( 'd M y' ); ?></span>
                <span><span class="dashicons dashicons-admin-users"></span> <?php
					the_author(); ?></span>
                <span><span class="dashicons dashicons-tag"></span> <?php
					the_category( ', ' ); ?></span>

				<?php
				//				understrap_posted_on(); ?>
            </div><!-- .entry-meta -->

		<?php
		endif; ?>

    </header><!-- .entry-header -->

	<?php
	echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

    <div class="entry-content">

		<?php
		the_excerpt();
		understrap_link_pages();
		?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

		<?php
		understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-<?php
the_ID(); ?> -->
