<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>
    <div class="wrapper" id="page-wrapper">

        <div class="<?php
		echo esc_attr( $container ); ?> px-0" id="content" tabindex="-1">

            <div class="row no-gutters">

				<?php
				// Do the left sidebar check and open div#primary.
				get_template_part( 'global-templates/left-sidebar-check' );
				?>

                <main class="site-main" id="main">
                    <div class="ayh-text-block">
                        <header class="entry-header">
                            <div class="header-hidden">
								<?php
								echo get_the_post_thumbnail( $post->ID,
									'large' ); ?>
                            </div>
                            <div class="header-wrapper">
                                <div class="header-container">
                                    <div class="header-image">
										<?php
										echo get_the_post_thumbnail( $post->ID,
											'large' );
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

                        <div class="doctor-form d-flex align-items-center"
                             style="padding-top: 180px; padding-bottom: 100px">
                            <h2 style="margin-right: 273px;">
                                <div>Find</div>
                                a doctor
                            </h2>
                            <div class="flex-fill">
                                <div id="doctor-search-icon">
                                    <input class="form-control" type="search"
                                           id="doctor-search"/>
                                </div>
                            </div>
                        </div>
                        <div class="doctor-filter d-flex justify-content-center">
                            <a href="">All</a>
                            <a href="">Anaesthesiology</a>
                            <a href="">Cardiology</a>
                            <a href="">Dental & Orthodontics</a>
                        </div>
                        <div class="doctors">
                            <div class="doctor">
                                <div>
                                    <figure></figure>
                                </div>
                                <h2>Dr Shady</h2>
                                <div class="meta">
                                    <span class="dashicons dashicons-tag"></span>
                                    Anaesthesiology
                                </div>
                                <div class="meta">
                                    <span class="dashicons dashicons-admin-site-alt3"></span>
                                    Egypt
                                </div>
                            </div>
                        </div>
						<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'loop-templates/content',
								'doctor' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						}
						?>
                    </div>
                </main>

				<?php
				// Do the right sidebar check and close div#primary.
				get_template_part( 'global-templates/right-sidebar-check' );
				?>

            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #page-wrapper -->

<?php
get_footer();
