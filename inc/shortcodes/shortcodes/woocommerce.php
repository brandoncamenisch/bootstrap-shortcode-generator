<?php

/**
 * plchf_add_downloadable_products_my_account function.
 *
 * @access public
 * @return void
 */
function plchf_add_downloadable_products_my_account(){
	global $woocommerce, $post, $product, $wpdb, $thepostid, $wp_query;
	$user  = wp_get_current_user();
  $subscription = get_user_meta( get_current_user_id(), 'pluginchief-membership', true );
	//If membership is active
	if ( class_exists( 'Woocommerce' ) && is_user_logged_in() && $subscription == 'Yes' ) {

?>
	<table class="shop_table my_account_orders">

		<thead>
			<tr>
				<th class="hidden-phone"><span class="nobr"><?php _e('Last Updated', 'woocommerce'); ?></span></th>
				<th><span class="nobr"><?php _e('Product', 'woocommerce'); ?></span></th>
				<th><span class="nobr"><?php _e('', 'woocommerce'); ?></span></th>
			</tr>
		</thead>

		<tbody>

			<?php
			//ARGS

			$args = array(
				'post_type' => 'product',
				'wp_terms' => 'membership',
				'meta_key' => '_downloadable',
				'meta_value' => 'yes',
				'tax_query' => array(
	    		array(
		    	'taxonomy' => 'product_cat',
		    	'terms' => 'membership',
		    	'field' => 'slug',
		    	'operator' => 'IN'
		    	)
	    )
	   );

			//QUERY
			$the_query = new WP_Query( $args );
			?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php global $woocommerce, $post, $product, $wpdb;
				$download_link = get_post_meta($post->ID, '_file_path', true);
				?>
				<tr class="order">
				<td class="hidden-phone"><?php the_modified_date(); ?></td>
				<td><?php the_title(); ?></td>
				<td>
					<?php	do_action( 'woocommerce_after_shop_loop_item' );?>
				</td>
				<tr class="order">
			<?php
			endwhile;
			// Reset Post Data
			wp_reset_postdata();
			?>

		</tbody>

	</table>

<?php

	} else {

		echo 'You Either have no available downloads or your not a PluginChief member!';
	}


}//end function
add_shortcode( 'plchf_downloadable', 'plchf_add_downloadable_products_my_account' );

