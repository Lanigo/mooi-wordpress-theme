<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mooi
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info text-center">
			<div class="foot-line" style="background-color:<?php echo get_theme_mod( 'foot_line', '#fdd017' ); ?>"></div>
			<!-- add the 3 footer widget areas -->
			<div class="row">

        		<div class="col-sm-4">
            		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-left') ) ?>
        		</div>
        		<div class="col-sm-4">
            		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-middle') ) ?>
        		</div>
        		<div class="col-sm-4">
            		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-right') ) ?>
        		</div>
     		</div><!-- /main footer widget areas -->

			<div class="foot-line" style="background-color:<?php echo get_theme_mod( 'foot_line', '#fdd017' ); ?>"></div>
			
			<!-- if switched on, display the default footer -->
			<?php if ( true == get_theme_mod( 'footer_toggle', true ) ) : ?>
				<?php 
					$footer_start_text = get_theme_mod( 'footer_start_text' ); 
					// get the year control and assign it to a variable 
					$footer_year = get_theme_mod( 'footer_year' );
					
					// get the link and text controls and assign to variables
					$footer_link = get_theme_mod( 'footer_link' );
					$footer_name = get_theme_mod( 'footer_name' );

					// change this line to display the font awesome icon and the year
					echo '<span class="footer_text">' . $footer_start_text . '</span>'	. " " . '<span class="icon"><i class="fa fa-copyright"></i></span>' . '<span class="footer_text">' . $footer_year . '</span>'; ?>
					
					<!-- output the link and related name here-->
					<a href=<?php echo esc_url( $footer_link ); ?>>
					 	<?php echo '<span class="footer_name">' . $footer_name . '</span>'; ?>
					</a>
				?>
			<!-- if switched off, display the text from the textarea -->
			<?php else : ?>
				<?php 
				 	// get the textarea control and assign it to a variable 
					$footer_textarea = get_theme_mod( 'footer_textarea' );

					echo '<span class="footer_textarea">' . $footer_textarea . '</span>'; 

				?>
			<?php endif; ?>			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>