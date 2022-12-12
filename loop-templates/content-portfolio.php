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
    <div class="doctor-img">
		<?php
		echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
    </div><!-- .doctor-img -->

    <header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="entry-meta">
			<?php
			// understrap_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="entry-content">
		<?php
		the_content();
		understrap_link_pages();
		?>
        <div class="doctor-category"><span
                    class="dashicons dashicons-tag"></span> Cardiology
        </div>
        <div class="doctor-nationality"><span
                    class="dashicons dashicons-admin-site-alt3"></span> Egypt
        </div>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
		<?php
		understrap_entry_footer(); ?>
        <br/>
        <a href="<?php
		the_permalink(); ?>"
           class="btn btn-success text-white read-more">Read More</a>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php
the_ID(); ?> -->
