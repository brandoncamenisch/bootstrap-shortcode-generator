<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new thmchf_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="thmchf-popup">

	<div id="thmchf-shortcode-wrap">

		<div id="thmchf-sc-form-wrap">

			<div id="thmchf-sc-form-head">

				<?php echo $shortcode->popup_title; ?>

			</div>
			<!-- /#thmchf-sc-form-head -->

			<form method="post" id="thmchf-sc-form">

				<table id="thmchf-sc-form-table">

					<?php echo $shortcode->output; ?>

					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary thmchf-insert">Insert Shortcode</a></td>
						</tr>
					</tbody>

				</table>
				<!-- /#thmchf-sc-form-table -->

			</form>
			<!-- /#thmchf-sc-form -->

		</div>
		<!-- /#thmchf-sc-form-wrap -->

		<div id="thmchf-sc-preview-wrap">

			<div id="thmchf-sc-preview-head">

				Shortcode Preview

			</div>
			<!-- /#thmchf-sc-preview-head -->

			<?php if( $shortcode->no_preview ) : ?>
			<div id="thmchf-sc-nopreview">Shortcode has no preview</div>
			<?php else : ?>
			<iframe src="<?php echo PLUGINCHIEFTBSC_PATH_ABC; ?>/preview.php?sc=" width="249" frameborder="0" id="thmchf-sc-preview"></iframe>
			<?php endif; ?>

		</div>
		<!-- /#thmchf-sc-preview-wrap -->

		<div class="clear"></div>

	</div>
	<!-- /#thmchf-shortcode-wrap -->

</div>
<!-- /#thmchf-popup -->

</body>
</html>