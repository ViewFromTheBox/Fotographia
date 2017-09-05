<?php
/**
* Footer.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.5
*/
?>
					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-12 medium-12 columns">
								<p class="copyright">&copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html( bloginfo('name') ); ?></a> &bull; <a href="<?php echo esc_url( 'http://www.jacobmartella.com/wordpress/wordpress-theme/fotographia-wordpress-theme' ); ?>"><?php esc_html_e( 'Fotographia', 'fotographia' ); ?> &bull; <?php wp_loginout();?></p>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->