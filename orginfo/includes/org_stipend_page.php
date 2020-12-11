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
            
            <div class="input-block editor-block">
				<label>Информация о предоставлении стипендии обучающимся</label>
				<?php 
					wp_editor(
						(isset($field['grant']) ? $field['grant'] : ''), 
						'grant', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'grant',
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
				<label>Информация о мерах социальной поддержки обучающихся</label>
				<?php 
					wp_editor(
						(isset($field['support']) ? $field['support'] : ''), 
						'support', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'support',
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
				<label>Количество общежитий</label>
				<textarea name="hostelInfo" class="field"><?php echo (isset($field['hostelInfo']) ? wp_unslash($field['hostelInfo']) : '')?></textarea>
			</div>
            <div class="input-block">
				<label>Количество интернатов</label>
				<textarea name="interInfo" class="field"><?php echo (isset($field['interInfo']) ? wp_unslash($field['interInfo']) : '')?></textarea>
			</div>
            <div class="input-block">
				<label>Общая площадь общежитий</label>
				<textarea name="hostelTS" class="field"><?php echo (isset($field['hostelTS']) ? wp_unslash($field['hostelTS']) : '')?></textarea>
			</div>
            <div class="input-block">
				<label>Общая площадь интернатов</label>
				<textarea name="interTS" class="field"><?php echo (isset($field['interTS']) ? wp_unslash($field['interTS']) : '')?></textarea>
			</div>
            <div class="input-block">
				<label>Жилая площадь общежитий</label>
				<textarea name="hostelLS" class="field"><?php echo (isset($field['hostelLS']) ? wp_unslash($field['hostelLS']) : '')?></textarea>
			</div>
            <div class="input-block">
				<label>Жилая площадь интернатов</label>
				<textarea name="interLS" class="field"><?php echo (isset($field['interLS']) ? wp_unslash($field['interLS']) : '')?></textarea>
			</div>
            <div class="input-block">
				<label>Количество мест в общежитиях</label>
				<textarea name="hostelNum" class="field"><?php echo (isset($field['hostelNum']) ? wp_unslash($field['hostelNum']) : '')?></textarea>
			</div>
            <div class="input-block">
				<label>Количество мест в интернатах</label>
				<textarea name="interNum" class="field"><?php echo (isset($field['interNum']) ? wp_unslash($field['interNum']) : '')?></textarea>
			</div>
            <div class="input-block editor-block">
				<label>Обеспеченность общежитий 100% мягким и жестким инвентарем по установленным стандартным нормам</label>
				<?php 
					wp_editor(
						(isset($field['hostelInv']) ? $field['hostelInv'] : ''), 
						'hostelInv', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'hostelInv',
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
				<label>Обеспеченность интернатов 100% мягким и жестким инвентарем по установленным стандартным нормам</label>
				<?php 
					wp_editor(
						(isset($field['interInv']) ? $field['interInv'] : ''), 
						'interInv', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'interInv',
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
				<label>Наличие питания (да/нет) в общежитиях</label>
				<textarea name="hostelFd" class="field"><?php echo (isset($field['hostelFd']) ? wp_unslash($field['hostelFd']) : '')?></textarea>
			</div>
            <div class="input-block">
				<label>Наличие питания (да/нет) в интернатах</label>
				<textarea name="interFd" class="field"><?php echo (isset($field['interFd']) ? wp_unslash($field['interFd']) : '')?></textarea>
			</div>
            <div class="input-block editor-block">
				<label>Информация о формировании платы за проживание в общежитии</label>
				<?php 
					wp_editor(
						(isset($field['localAct']) ? $field['localAct'] : ''), 
						'localAct', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'localAct',
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
				<label>Информация о трудоустройстве выпускников</label>
				<?php 
					wp_editor(
						(isset($field['graduateJob']) ? $field['graduateJob'] : ''), 
						'graduateJob', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'graduateJob',
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