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
post_class( 'doctor-page' ); ?> id="post-<?php
the_ID(); ?>">
    <div class="ayh-text-block d-flex align-items-stretch">
        <figure>
			<?php
			echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
        </figure>
        <div class="d-flex flex-column justify-content-between"
             style="margin-top: 109px;">
            <div class="top-half">
                <header class="entry-header">
					<?php
					the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->


                <div class="entry-content">
                    <div class="meta">
                        <span class="dashicons dashicons-tag"></span>
                        Anaesthesiology
                    </div>
                    <div class="meta">
                        <span class="dashicons dashicons-admin-site-alt3"></span>
                        Egypt
                    </div>
                    <div class="meta">
                        <span class="dashicons dashicons-translation"></span>
                        Arabic, English
                    </div>
                    <div class="meta">
                        <span class="dashicons dashicons-media-document"></span>
                        M.D in Anesthesidiology,<br/>
                        MSc in Anesthesdiology, <br/>
                        M.B.B.CH<br/>
                        (all from zagzaig University)
                    </div>
					<?php
					the_content();
					understrap_link_pages();
					?>

                </div><!-- .entry-content -->
            </div><!-- .top-half -->

            <footer class="entry-footer">
                <div class="text-success">
                    <span class="dashicons dashicons-clock"></span>
                    View Schedules
                </div>

                <div class="schedule">
                    <div class="day">
                        <div class="header">Saturday</div>
                        <div class="content">
                            <ul>
                                <li>5:00 PM</li>
                                <li>5:30 PM</li>
                                <li>6:00 PM</li>
                                <li>6:30 PM</li>
                                <li>7:00 PM</li>
                                <li>7:30 PM</li>
                            </ul>
                        </div>
                        <div class="footer">Book</div>
                    </div>
                    <div class="day">
                        <div class="header">Monday</div>
                        <div class="content">
                            <ul>
                                <li>5:00 PM</li>
                                <li>5:30 PM</li>
                                <li>6:00 PM</li>
                                <li>6:30 PM</li>
                                <li>7:00 PM</li>
                                <li>7:30 PM</li>
                            </ul>
                        </div>
                        <div class="footer">Book</div>
                    </div>
                    <div class="day">
                        <div class="header">Tuesday</div>
                        <div class="content">
                            <ul>
                                <li>5:00 PM</li>
                                <li>5:30 PM</li>
                                <li>6:00 PM</li>
                                <li>6:30 PM</li>
                                <li>7:00 PM</li>
                                <li>7:30 PM</li>
                            </ul>
                        </div>
                        <div class="footer">Book</div>
                    </div>
                </div>

				<?php
				understrap_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div><!-- .w-70 -->
    </div><!-- .ayh-text-block -->
</article><!-- #post-<?php
the_ID(); ?> -->
<div class="bg-grey ayh-text-block doctor-book">
    <div class="h1">Book an<br/> appointment</div>
	<?php echo do_shortcode('[contact-form-7 id="84" title="Book an appointment"]');?>
</div>
