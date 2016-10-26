				<!-- ProSites vmenu -->
				<?php 
					$args = array(
					  'theme_location'  => 'side-menu',
					  'container'       => '', 
					  'menu_class'      => 'pro-vmenu', 
					);
					wp_nav_menu( $args );
				 ?>