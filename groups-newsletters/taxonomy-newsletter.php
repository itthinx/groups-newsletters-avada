<?php
/**
 * taxonomy-newsletter.php
 *
 * Part of the Avada child theme that integrates with Groups Newsletters https://www.itthinx.com/shop/groups-newsletters/
 *
 * This is the adjusted template for Newsletters (newsletter taxonomy).
 */

	// Do not allow directly accessing this file.
	if ( ! defined( 'ABSPATH' ) ) {
		exit( 'Direct script access denied.' );
	}
?>
<?php get_header(); ?>
<section id="content" <?php Avada()->layout->add_class( 'content_class' ); ?> <?php Avada()->layout->add_style( 'content_style' ); ?>>
	<?php
		//
		// Newsletter title & description
		//
		if ( is_tax() ) {
			global $wp_query;
			if ( $newsletter = $wp_query->get_queried_object() ) {
				if ( $newsletter && !is_wp_error( $newsletter ) ) {
					echo sprintf( '<h1 class="newsletter-title %s">%s</h1>', $newsletter->slug, wp_strip_all_tags( $newsletter->name ) );
					if ( !empty( $newsletter->description ) ) {
						echo '<div class="newsletter-description">';
						echo wp_filter_kses( $newsletter->description );
						echo '</div>';
					}
				}
			}
		}
	
		//
		// Newsletter stories
		//
		get_template_part( 'templates/blog', 'layout' );
	
		//
		// Pagination
		//
		global $wp_query;
		$paginate_links = paginate_links( array(
			'base'    => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
			'format'  => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total'   => $wp_query->max_num_pages
		) );
		if ( strlen( $paginate_links ) > 0 ) {
			echo '<div class="paginate-links">';
			echo $paginate_links;
			echo '</div>';
		}
	?>
</section>
<?php
	do_action( 'avada_after_content' );
	get_footer();
