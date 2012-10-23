<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new pluginchief_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>

<div id="pluginchief-popup">

  <div id="pluginchief-shortcode-wrap">

    <div id="pluginchief-sc-form-wrap">

      <div id="pluginchief-sc-form-head">
        <?php echo $shortcode->popup_title; ?>
      </div><!-- #pluginchief-sc-form-head -->

      <form method="post" id="pluginchief-sc-form">

        <table id="pluginchief-sc-form-table">
        
          <?php echo $shortcode->output; ?>
          
          <tbody>
            <tr class="form-row">
              <?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
              <td class="field"><a href="#" class="button-primary pluginchief-insert">Insert Shortcode</a></td>             
            </tr>
          </tbody>
        
        </table><!-- #pluginchief-sc-form-table -->

      </form><!-- #pluginchief-sc-form -->

    </div><!-- #pluginchief-sc-form-wrap -->

    <div class="clear"></div>

  </div><!-- #pluginchief-shortcode-wrap -->

</div><!-- #pluginchief-popup -->
</body>
</html>