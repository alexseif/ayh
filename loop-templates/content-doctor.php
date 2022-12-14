<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$terms       = get_the_terms( $post->ID, 'portfolio_category' );
$doctorTerms = '';
if ( $terms ) {
	foreach ( $terms as $term ) {
		$doctorTerms .= ' ' . $term->term_id;
	}
}

?>

<article <?php
post_class( 'doctor' . $doctorTerms ); ?> id="post-<?php
the_ID(); ?>"
                                          data-id="<?php
                                          the_ID(); ?>">
    <!--    <div class="doctor">-->
    <header class="entry-header">
        <div>
            <figure>
				<?php
				echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
            </figure>
        </div>
		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">',
				esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>
    </header><!-- .entry-header -->
    <div class="entry-content">
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <div class="meta">
            <span class="dashicons dashicons-tag"></span>
            Anaesthesiology
        </div>
        <div class="meta">
            <span class="dashicons dashicons-admin-site-alt3"></span>
            Egypt
        </div>
    </footer><!-- .entry-footer -->
    <!--    </div>-->
    <!-- .doctor -->
</article><!-- #post-<?php
the_ID(); ?> -->
