<?php defined( 'ABSPATH' ) or exit;

$tabs = array(
	'fields'        => __( 'Fields', 'mailchimp-for-wp' ),
	'messages'      => __( 'Messages', 'mailchimp-for-wp' ),
	'settings'      => __( 'Settings', 'mailchimp-for-wp' ),
	'appearance'    => __( 'Appearance', 'mailchimp-for-wp' )
);


?>
<div id="mc4wp-admin" class="wrap mc4wp-settings">

	<p class="breadcrumb">
		<span class="prefix"><?php echo __( 'You are here: ', 'mailchimp-for-wp' ); ?></span>
		<a href="<?php echo admin_url( 'admin.php?page=mailchimp-for-wp' ); ?>">MailChimp for WordPress</a> &rsaquo;
		<a href="<?php echo admin_url( 'admin.php?page=mailchimp-for-wp-forms' ); ?>"><?php _e( 'Forms', 'mailchimp-for-wp' ); ?></a> &rsaquo;
		<span class="current-crumb"><strong>Form <?php echo $form_id; ?> | <?php echo $form->name; ?></strong></span>
	</p>

	<div class="row">

		<!-- Main Content -->
		<div class="main-content col col-4">

			<h1 class="page-title">
				<?php _e( "Edit Form", 'mailchimp-for-wp' ); ?>

				<!-- Form actions -->
				<?php do_action( 'mc4wp_admin_edit_forms_after_title' ); ?>
			</h1>

			<h2 style="display: none;"></h2><?php // fake h2 for admin notices ?>

			<!-- Wrap entire page in <form> -->
			<form method="post">
				<input type="hidden" name="_mc4wp_action" value="edit_form" />
				<input type="hidden" name="mc4wp_form_id" value="<?php echo esc_attr( $form->ID ); ?>" />
				<?php wp_nonce_field( 'edit_form', '_mc4wp_nonce' ); ?>

				<div id="titlediv" class="small-margin">
					<div id="titlewrap">
						<label class="screen-reader-text" for="title"><?php _e( 'Enter form title here', 'mailchimp-for-wp' ); ?></label>
						<input type="text" name="mc4wp_form[name]" size="30" value="<?php echo esc_attr( $form->name ); ?>" id="title" spellcheck="true" autocomplete="off" placeholder="<?php echo __( "Enter the title of your sign-up form", 'mailchimp-for-wp' ); ?>" style="line-height: initial;" >
					</div>
					<div class="inside" style="margin-top: 3px;">

						<input id="shortcode" type="hidden" value="[mc4wp_form id='<?php echo $form->ID; ?>']">

						<a href="#" class="button-secondary" onclick="prompt('Shortcode:', document.getElementById('shortcode').value); return false;">
							<span class="dashicons dashicons-editor-code"></span>
							<?php _e( 'Get shortcode', 'mailchimp-for-wp' ); ?>
						</a>

						<a href="<?php echo esc_url( $previewer->get_preview_url() ); ?>" target="_blank" class="button-secondary">
							<span class="dashicons dashicons-welcome-view-site" style=""></span>
							<?php _e( 'Preview this form', 'mailchimp-for-wp' ); ?>
						</a>

					</div>
				</div>

				<h2 class="nav-tab-wrapper" id="mc4wp-tabs-nav">
					<?php foreach( $tabs as $tab => $name ) {
						echo sprintf( '<a class="nav-tab %s" id="nav-tab-%s" href="%s">%s</a>', ( $active_tab === $tab ) ? 'nav-tab-active' : '', $tab, $this->tab_url( $tab ), $name );
					} ?>
				</h2>

				<div id="mc4wp-tabs">

					<?php foreach( $tabs as $tab => $name ) : ?>

						<!-- .tab -->
						<div class="tab <?php if( $active_tab === $tab ) { echo 'tab-active'; } ?>" id="tab-<?php echo $tab; ?>">
							<?php include dirname( __FILE__ ) . '/tabs/form-' . $tab .'.php'; ?>
						</div>
						<!-- / .tab -->

					<?php endforeach; // foreach tabs ?>


				</div>

			</form><!-- Entire page form wrap -->


			<?php include MC4WP_PLUGIN_DIR . 'includes/views/parts/admin-footer.php'; ?>

		</div>

		<!-- Sidebar -->
		<div class="sidebar col col-2">
			<?php include MC4WP_PLUGIN_DIR . 'includes/views/parts/admin-sidebar.php'; ?>
		</div>


	</div>

</div>