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
/**
 * Setup query to show the ‘services’ post type with ‘8’ posts.
 * Output the title with an excerpt.
 */
$args = [
	'post_type'   => 'portfolio',
	'post_status' => 'publish',
	//	'posts_per_page' => 8,
	//	'orderby'        => 'title',
	//	'order'          => 'ASC',
];

$loop = new WP_Query( $args );

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
                    </div><!-- .ayh-text-block -->
                    <blockquote class="wp-block-quote">
                        <p class="has-text-align-center">“AN APPLE A DAY
                            KEEPS THE DOCTOR AWAY”</p>
                    </blockquote>

                    <div class="ayh-text-block">
                        <div id="doctor-filter"
                                class="doctor-filter d-flex justify-content-center">
                            <a onclick="filterSelection('all');"
                               class="filter-btn active">All</a>
							<?php
							$args = [
								'taxonomy' => 'portfolio_category',
								'orderby'  => 'name',
								'order'    => 'ASC',
							];

							$cats = get_categories( $args );

							foreach ( $cats as $cat ) {
								?>
                                <!--                                <a href="--><?php
								//								echo get_category_link( $cat->term_id ) ?><!--"-->
                                <a class="filter-btn"
                                   onclick="filterSelection(<?php
								   echo $cat->term_id ?>);"
                                   data-id="<?php
								   echo $cat->term_id; ?>">
									<?php
									echo $cat->name; ?>
                                </a>
								<?php
							}
							?>
                        </div>
                        <div class="doctors">
							<?php
							//						while ( have_posts() ) {
							while ( $loop->have_posts() ) :
								$loop->the_post();
								//								print the_title();
								//								the_excerpt();
								get_template_part( 'loop-templates/content',
									'doctor' );
							endwhile;

							//							the_post();
							//							get_template_part( 'loop-templates/content',
							//								'doctor' );
							//						}
							?>
                        </div><!-- .doctors -->
                    </div><!-- .ayh-text-block -->
                </main>

				<?php
				// Do the right sidebar check and close div#primary.
				//				get_template_part( 'global-templates/right-sidebar-check' );
				?>

            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #page-wrapper -->
<script>

    filterSelection("all");
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("doctor");
        if (c == "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    // Show filtered elements
    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current control button (highlight it)
    var btnContainer = document.getElementById("doctor-filter");
    var btns = btnContainer.getElementsByClassName("filter-btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

</script>
<?php
get_footer();
