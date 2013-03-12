<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new pluginninja_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>

<div id="pluginninja-popup">

  <div id="pluginninja-shortcode-wrap">

    <div id="pluginninja-sc-form-wrap">

      <div id="pluginninja-sc-form-head">
        <?php echo $shortcode->popup_title; ?>
      </div><!-- #pluginninja-sc-form-head -->

      <form method="post" id="pluginninja-sc-form">

        <table id="pluginninja-sc-form-table">
        
          <?php echo $shortcode->output; ?>
          
          <tbody>
            <tr class="form-row">
              <?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
              <td class="field"><a href="#" class="button-primary pluginninja-insert">Insert Shortcode</a></td>             
            </tr>
          </tbody>
        
        </table><!-- #pluginninja-sc-form-table -->

      </form><!-- #pluginninja-sc-form -->

    </div><!-- #pluginninja-sc-form-wrap -->

    <div class="clear"></div>

  </div><!-- #pluginninja-shortcode-wrap -->

</div><!-- #pluginninja-popup -->
</body>
</html>