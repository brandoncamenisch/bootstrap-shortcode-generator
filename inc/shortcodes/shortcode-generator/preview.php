<?php

// loads wordpress
require_once('get_wp.php'); // loads wordpress stuff

// gets shortcode
$shortcode = base64_decode( trim( $_GET['sc'] ) );

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/theme-styles.css" media="all" />

		<?php wp_head(); ?>

		<style type="text/css">
			html {
				margin: 0 !important;
			}
			body {
				padding: 20px 15px;
			}
		</style>
	
	</head>
	<body>

	<?php echo do_shortcode( $shortcode ); ?>

	</body>
</html>