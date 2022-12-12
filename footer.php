<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<div id="newsletter">
    <div class="newsletter-wrapper">
        <div class="newsletter-text">
            <div class="newsletter-text-big">SUBSCRIBE TO <span>OUR OFFERS
                &amp; NEWS</span>
            </div>
            <span>Stay up-to-date with the latest offers &amp; news.</span>
        </div>
        <div class="newsletter-form">
            <input type="email" placeholder="E-mail"> <input type="submit"
                                                             value="Submit">
        </div>
    </div>
</div>
<?php
get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper ayh-text-block" id="wrapper-footer">
    <footer class="site-footer" id="colophon">
        <div class="site-info">
			<?php
			understrap_site_info(); ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #wrapper-footer -->

<?php
// Closing div#page from header.php. ?>
</div><!-- #page -->

<?php
wp_footer(); ?>

</body>

</html>

