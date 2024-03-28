<?php
/**
 * The template for the header sticky bar.
 * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
 *
 * @author        Redux Framework
 * @package       ReduxFramework/Templates
 * @version:      4.4.2
 */

?>
<div id="redux-sticky">
	<div id="info_bar">
		<a href="javascript:void(0);"
			class="expand_options<?php echo esc_attr( ( $this->parent->args['open_expanded'] ) ? ' expanded' : '' ); ?>"<?php echo( true === $this->parent->args['hide_expand'] ? ' style="display: none;"' : '' ); ?>>
			<?php esc_attr_e( 'Expand', 'redux-framework' ); ?>
		</a>
		<div class="redux-action_bar">
			<span class="spinner"></span>
			<?php
			if ( false === $this->parent->args['hide_save'] ) {
				submit_button( esc_attr__( 'Save Changes', 'redux-framework' ), 'primary', 'redux_save', false, array( 'id' => 'redux_top_save' ) );
			}

			?>
		</div>
		<div class="clear"></div>
	</div>

	<!-- Notification bar -->
	<div id="redux_notification_bar">
		<?php $this->notification_bar(); ?>
	</div>
</div>