<?php

$form = empty( $field['form_select'] ) ? '' : FrmForm::getOne( $field['form_select'] );
if ( empty( $form ) ) {
	?>
	<span class="frm-with-left-icon frm-not-set" id="setup-message-<?php echo esc_attr( $field['id'] ); ?>">
		<?php FrmProAppHelper::icon_by_class( 'frmfont frm_report_problem_solid_icon' ); ?>
		<input type="text" value="<?php esc_attr_e( 'This field is not set up yet.', 'formidable-pro' ); ?>" disabled />
	</span>
	<?php
} else {
	?>
	<div class="frm-embed-field-placeholder frm_grid_container">
		<div class="frm-fake-field"></div>
		<div class="frm-fake-field"></div>
		<div class="frm-fake-field frm6 frm_form_field"></div>
		<div class="frm-fake-field frm6 frm_form_field"></div>
		<div class="frm-embed-message">
			<?php
			echo esc_html(
				sprintf(
					/* translators: %1$s: Form name */
					__( 'Embedded Form: %1$s', 'formidable-pro' ),
					$form->name
				)
			);
			?>
		</div>
	</div>
	<?php
}
