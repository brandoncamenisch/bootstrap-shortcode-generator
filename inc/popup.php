<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new mountaininja_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>

<div id="mountaininja-popup">

  <div id="mountaininja-shortcode-wrap">

    <div id="mountaininja-sc-form-wrap">

      <div id="mountaininja-sc-form-head">
        <?php echo $shortcode->popup_title; ?>
      </div><!-- #mountaininja-sc-form-head -->

      <form method="post" id="mountaininja-sc-form">

        <table id="mountaininja-sc-form-table">
        
          <?php echo $shortcode->output; ?>
          
          <tbody>
            <tr class="form-row">
              <?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
              <td class="field"><a href="#" class="button-primary mountaininja-insert">Insert Shortcode</a></td>             
            </tr>
          </tbody>
        
        </table><!-- #mountaininja-sc-form-table -->

      </form><!-- #mountaininja-sc-form -->

    </div><!-- #mountaininja-sc-form-wrap -->

    <div class="clear"></div>

  </div><!-- #mountaininja-shortcode-wrap -->

</div><!-- #mountaininja-popup -->
</body>
</html>