<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php
post_class(); ?> id="post-<?php
the_ID(); ?>">

    <header class="entry-header ayh-text-block" style="padding-top: 75px;">
        <div class="meta-header">
			<?php
			the_category( ', ' ); ?>&nbsp;|&nbsp;<?php
			the_date( 'd M y' ); ?>
        </div>
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta d-none">

			<?php
			understrap_posted_on(); ?>

        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

	<?php
	echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

    <div class="entry-content ayh-text-block" style="padding-top: 128px;">

		<?php
		the_content();
		understrap_link_pages();
		?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

		<?php
		understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-<?php
the_ID(); ?> -->
