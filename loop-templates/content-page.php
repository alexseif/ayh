<?php
/**
 * Partial template for content in page.php
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
        <div class="header-hidden">
			<?php
			echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
        </div>
        <div class="header-wrapper">
            <div class="header-container">
                <div class="header-image">
					<?php
					echo get_the_post_thumbnail( $post->ID, 'large' );
					?>
                </div>
				<?php
				if ( ! is_page_template( 'page-templates/no-title.php' ) ) {
					the_title(
						'<h1 class="entry-title">',
						'</h1>'
					);
				}

				?>
            </div>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

		<?php
		understrap_edit_post_link(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-<?php
the_ID(); ?> -->
