<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
					
				<footer class="footer" role="contentinfo">
					
					<div class="inner-footer grid-x light-grey-background toprempad-1 bottomrempad-1">
						
						<div class="small-12 medium-12 large-12 cell">
							<nav role="navigation" class="grid-container pad-left-0 padding-right-0 rambla fontsize-20 dark-grey addtolinks caps">
	    						<?php joints_footer_links(); ?>
	    					</nav>
	    				</div>
						
						<!--<div class="small-12 medium-12 large-12 cell">
							<p class="source-org copyright">&copy; <?php /*echo date('Y'); */?> <?php /*bloginfo('name'); */?>.</p>
						</div>-->
					
					</div> <!-- end #inner-footer -->
				
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->