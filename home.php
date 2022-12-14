<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php
if ( is_front_page() && is_home() ) : ?>
	<?php
	get_template_part( 'global-templates/hero' ); ?>
<?php
endif; ?>
    <header class="entry-header">
        <div class="header-hidden">
			<?php
			echo get_the_post_thumbnail( get_option( 'page_for_posts' ),
				'large' ); ?>
        </div>
        <div class="header-wrapper">
            <div class="header-container">
                <div class="header-image">
					<?php
					echo get_the_post_thumbnail( get_option( 'page_for_posts' ),
						'large' );
					?>
                </div>
                <h1 class="entry-title">Blogs</h1>
            </div>
        </div>
    </header><!-- .entry-header -->

    <div class="wrapper" id="index-wrapper">

        <div class="<?php
		echo esc_attr( $container ); ?> px-0" id="content" tabindex="-1">
            <div class="ayh-text-block blogs">

                <div class="row g-0">

					<?php
					// Do the left sidebar check and open div#primary.
					get_template_part( 'global-templates/left-sidebar-check' );
					?>

                    <main class="site-main" id="main">

						<?php
						if ( have_posts() ) {
							// Start the Loop.
							while ( have_posts() ) {
								the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'loop-templates/content',
									get_post_format() );
							}
						} else {
							get_template_part( 'loop-templates/content',
								'none' );
						}
						?>
                    </main>

					<?php
					// Display the pagination component.
					understrap_pagination();

					// Do the right sidebar check and close div#primary.
					get_template_part( 'global-templates/right-sidebar-check' );
					get_template_part( 'sidebar-templates/sidebar', 'right' );


					?>

                </div><!-- .row -->
            </div><!-- .ayh-text-block -->

        </div><!-- #content -->

    </div><!-- #index-wrapper -->

<?php
get_footer();
