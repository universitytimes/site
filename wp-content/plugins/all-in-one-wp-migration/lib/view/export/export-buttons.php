<div class="ai1wm-field-set">
	<?php if ( is_readable( AI1WM_STORAGE_PATH ) && is_writable( AI1WM_STORAGE_PATH ) ): ?>
		<div class="ai1wm-buttons">
			<div class="ai1wm-button-group ai1wm-expandable">
				<div class="ai1wm-button-main">
					<span><?php _e( 'Export To', AI1WM_PLUGIN_NAME ); ?></span>
					<span class="ai1mw-lines">
						<span class="ai1wm-line ai1wm-line-first"></span>
						<span class="ai1wm-line ai1wm-line-second"></span>
						<span class="ai1wm-line ai1wm-line-third"></span>
					</span>
				</div>
				<ul class="ai1wm-dropdown-menu ai1wm-export-providers">
					<?php foreach ( apply_filters( 'ai1wm_export_buttons', array() ) as $button ): ?>
						<li>
							<?php echo $button; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php else: ?>
		<div class="ai1wm-message ai1wm-red-message">
			<?php
			printf(
				__(
					'<h3>Site could not be exported!</h3>' .
					'<p>Please make sure that storage directory <strong>%s</strong> has read and write permissions.</p>',
					AI1WM_PLUGIN_NAME
				),
				AI1WM_STORAGE_PATH
			);
			?>
		</div>
	<?php endif; ?>
</div>
