<?php  

$data = obr_material_page();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-mat">
	<form name="mat_form" id="mat_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('mat_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		<div class="mat-block">
			<div class="input-block input_uploader" id="mat_copy">
				<label>Копия документа о материально-техническом обеспечении (необязательно)</label>	
				<input placeholder="Заголовок документа" class="doc_name" type="text" name="mat_copy_name" value="<?php echo (isset($field['mat_copy_name']) ? wp_unslash(htmlspecialchars($field['mat_copy_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="mat_copy_id" value="<?php echo (isset($field['mat_copy_id']) ? $field['mat_copy_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="mat_copy_url" value="<?php echo (isset($field['mat_copy_url']) ? $field['mat_copy_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['mat_copy_url']) && !empty($field['mat_copy_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['mat_copy_url']) && !empty($field['mat_copy_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block">
				<label>Сведения о наличии оборудованных учебных кабинетов (в том числе для лиц с ОВЗ)</label>
				<textarea name="mat_uch" class="field"><?php echo (isset($field['mat_uch']) ? wp_unslash($field['mat_uch']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Сведения о наличии объектов для проведения практических занятий (в том числе для лиц с ОВЗ)</label>
				<textarea name="mat_pract" class="field"><?php echo (isset($field['mat_pract']) ? wp_unslash($field['mat_pract']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Сведения о наличии библиотек (в том числе для лиц с ОВЗ)</label>
				<textarea name="mat_bibl" class="field"><?php echo (isset($field['mat_bibl']) ? wp_unslash($field['mat_bibl']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Сведения о наличии объектов спорта</label>
				<textarea name="mat_sport" class="field"><?php echo (isset($field['mat_sport']) ? wp_unslash($field['mat_sport']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Сведения о наличии средств обучения и воспитания</label>
				<textarea name="mat_vos" class="field"><?php echo (isset($field['mat_vos']) ? wp_unslash($field['mat_vos']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Сведения об условиях питания и охраны здоровья обучающихся (в том числе для лиц с ОВЗ)</label>
				<textarea name="mat_ohr" class="field"><?php echo (isset($field['mat_ohr']) ? wp_unslash($field['mat_ohr']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Сведения о доступе к информационным системам и информационно-телекоммуникационным сетям</label>
				<textarea name="mat_its" class="field"><?php echo (isset($field['mat_its']) ? wp_unslash($field['mat_its']) : '')?></textarea>
			</div>
			<div class="input-block editor-block">
				<label>Сведения об электронных образовательных ресурсах</label>
				<?php 
					wp_editor(
						(isset($field['matres']) ? $field['matres'] : ''), 
						'matres', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'matres',
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
		</div>
		<div class="input-block">
			<button class="form_btn" name="mat_btn" type="submit">Сохранить</button>
		</div>
	</form>
</div>
<?php endif; ?>








