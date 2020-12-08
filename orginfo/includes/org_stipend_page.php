<?php  

$data = org_stipend_page();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-stip">
	<form name="stip_form" id="stip_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('stip_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		
		<div class="stipend">
			
			<div class="input-block input_uploader" id="stip_input_2">
				<label>Копия локального нормативного правового акта, регламентирующего стипендиальное обеспечение</label>
				<input placeholder="Заголовок документа" class="doc_name" type="text" name="stip_doc_name" value="<?php echo (isset($field['stip_doc_name']) ? wp_unslash(htmlspecialchars($field['stip_doc_name'])) : '')?>">				
				<input class="doc_id block-hidden" type="text" name="stip_doc_id" value="<?php echo (isset($field['stip_doc_id']) ? $field['stip_doc_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="stip_doc_url" value="<?php echo (isset($field['stip_doc_url']) ? $field['stip_doc_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['stip_doc_url']) && !empty($field['stip_doc_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['stip_doc_url']) && !empty($field['stip_doc_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
            
            
            
            
            
            
            
            
            
			
			<div class="input-block">
				<label>Информация о наличии общежития, интерната (в том числе для лиц с ОВЗ)</label>
				<textarea name="stip_obsh" class="field"><?php echo (isset($field['stip_obsh']) ? wp_unslash($field['stip_obsh']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Информация о количестве жилых помещений в общежитии, интернате для иногородних обучающихся (в том числе для лиц с ОВЗ)</label>
				<textarea name="stip_kol" class="field"><?php echo (isset($field['stip_kol']) ? wp_unslash($field['stip_kol']) : '')?></textarea>
			</div>
			<div class="input-block input_uploader" id="stip_input_1">
				<label>Копия локального нормативного акта, регламентирующего размер платы за пользование жилым помещением и коммунальные услуги в общежитии</label>
				<input placeholder="Заголовок документа" class="doc_name" type="text" name="stip_obsh_name" value="<?php echo (isset($field['stip_obsh_name']) ? wp_unslash(htmlspecialchars($field['stip_obsh_name'])) : '')?>">				
				<input class="doc_id block-hidden" type="text" name="stip_obsh_id" value="<?php echo (isset($field['stip_obsh_id']) ? $field['stip_obsh_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="stip_obsh_url" value="<?php echo (isset($field['stip_obsh_url']) ? $field['stip_obsh_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['stip_obsh_url']) && !empty($field['stip_obsh_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['stip_obsh_url']) && !empty($field['stip_obsh_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block ">
				<label>Информация об иных видах материальной поддержки обучающихся</label>
				<textarea name="stip_other" class="field"><?php echo (isset($field['stip_other']) ? wp_unslash($field['stip_other']) : '')?></textarea>
			</div>
			<div class="input-block editor-block">
				<label>Информация о трудоустройстве выпускников (документы, таблица или текст)</label>
				<?php 
					wp_editor(
						(isset($field['stiptrud']) ? $field['stiptrud'] : ''), 
						'stiptrud', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'stiptrud',
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
				<button class="form_btn" name="stip_btn" type="submit">Сохранить</button>
			</div>
		</div>	
	</form>
</div>
<?php endif; ?>