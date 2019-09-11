<?php  

$data = org_main_info_page();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-main">
	<form name="info_form" id="info_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('info_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>

		<div class="inputs">
			<div class="input-block">
				<label>Полное наименование образовательной организации (по уставу)</label>
				<input name="info_name" type="text" value="<?php echo (isset($field['info_name']) ? wp_unslash(htmlspecialchars($field['info_name'])) : '')?>" class="field">
			</div>
			<div class="input-block">
				<label>Дата создания образовательной организации</label>
				<input name="info_date" type="text" value="<?php echo (isset($field['info_date']) ? wp_unslash(htmlspecialchars($field['info_date'])) : '')?>" class="field">
			</div>
			<div class="input-block">
				<label>Информация о месте нахождения образовательной организации</label>
				<textarea name="info_place" class="field"><?php echo (isset($field['info_place']) ? wp_unslash($field['info_place']) : '')?></textarea>
			</div>
			<div class="input-block editor-block">
				<label>Информация об учредителе (учредителях) образовательной организации</label>
				<?php 
					wp_editor(
						(isset($field['infouch']) ? $field['infouch'] : ''), 
						'infouch', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'infouch',
							'tabindex'      => null,
							'textarea_rows' => 10,
							'teeny'         => 0,
							'dfw'           => 0,
							'tinymce'       => 1,
							'quicktags'     => 1,
							'drag_drop_upload' => true
						)
					);
				?>
			</div>
			<div class="input-block">
				<label>Информация о филиалах</label>
				<?php 
					wp_editor(
						(isset($field['infofil']) ? $field['infofil'] : ''), 
						'infofil', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'infofil',
							'tabindex'      => null,
							'textarea_rows' => 10,
							'teeny'         => 0,
							'dfw'           => 0,
							'tinymce'       => 1,
							'quicktags'     => 1,
							'drag_drop_upload' => true
						)
					);
				?>
			</div>
			<div class="input-block editor-block">
				<label>Информация о режиме и графике работы образовательной организации</label>
				<?php 
					wp_editor(
						(isset($field['infotime']) ? $field['infotime'] : ''), 
						'infotime', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'infotime',
							'tabindex'      => null,
							'textarea_rows' => 10,
							'teeny'         => 0,
							'dfw'           => 0,
							'tinymce'       => 1,
							'quicktags'     => 1,
							'drag_drop_upload' => true
						)
					);
				?>
			</div>
			<div class="input-block">
				<label>Информация о контактных телефонах образовательной организации</label>
				<textarea name="info_tel" class="field"><?php echo (isset($field['info_tel']) ? wp_unslash($field['info_tel']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Информация об адресах электронной почты образовательной организации</label>
				<textarea name="info_mail" class="field"><?php echo (isset($field['info_mail']) ? wp_unslash($field['info_mail']) : '')?></textarea>
			</div>
		</div>
		
		<div class="input-block">
			<button class="form_btn" name="info_btn" type="submit">Сохранить</button>
		</div>
	</form>
</div>
<?php endif; ?>