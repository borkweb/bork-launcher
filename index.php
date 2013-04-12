<!doctype html>
<html lang="en">
<head>
<title><?php echo bloginfo( 'site_title' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
	<body <?php body_class(); ?>>
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
			<h1><?php echo bloginfo( 'site_title' ); ?></h1>
				<!-- Search Google -->
				<form method="get" action="http://www.google.com/search" id="search">
					<input type="hidden" name="ie" value="UTF-8">
					<input type="hidden" name="oe" value="UTF-8">
					<input type="search" name="q" value="" placeholder="Google search, yo" autofocus>
				</form>
				<!-- Search Google -->
			</div>
		</div>
		<div class="row-fluid">
			<?php
			$sidebars = wp_get_sidebars_widgets();

			$areas = 10;
			for ( $i = 1; $i <= $areas; $i++ ) {
				if ( ! count( $sidebars['sidebar-' . $i] ) ) {
					continue;
				}//end if

				$span = $i % 2 == 0 ? 'span4' : 'span2';

				echo '<div class="column-' . $i . ' ' . $span . '">';
				dynamic_sidebar( 'sidebar-' . $i );
				echo '</div>';
			}//end for
			?>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>
