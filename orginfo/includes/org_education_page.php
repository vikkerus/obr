<?php  

$data = org_education_page();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>

<div class="page-edu">
	<form name="edu_form" id="edu_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('edu_form');
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
				<label>Информация о реализуемых уровнях образования</label>
				<textarea name="edu_main_lev"><?php echo (isset($field['edu_main_lev']) ? wp_unslash($field['edu_main_lev']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Информация о формах обучения</label>
				<textarea name="edu_main_form"><?php echo (isset($field['edu_main_form']) ? wp_unslash($field['edu_main_form']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Информация о нормативных сроках обучения</label>
				<textarea name="edu_main_norm"><?php echo (isset($field['edu_main_norm']) ? wp_unslash($field['edu_main_norm']) : '')?></textarea>
			</div>
			<div class="input-block">
				<label>Информация о сроке действия государственной аккредитации образовательной программы (при наличии государственной аккредитации)</label>
				<textarea name="edu_main_accr"><?php echo (isset($field['edu_main_accr']) ? wp_unslash($field['edu_main_accr']) : '')?></textarea>
			</div>
			<div class="input-block input_uploader edu-docs" id="edu_uch">
				<label>Информация об учебном плане</label>	
				<input placeholder="Заголовок документа" class="doc_name" type="text" name="edu_uch_name" value="<?php echo (isset($field['edu_uch_name']) ? wp_unslash(htmlspecialchars($field['edu_uch_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="edu_uch_id" value="<?php echo (isset($field['edu_uch_id']) ? $field['edu_uch_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="edu_uch_url" value="<?php echo (isset($field['edu_uch_url']) ? $field['edu_uch_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['edu_uch_url']) && !empty($field['edu_uch_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['edu_uch_url']) && !empty($field['edu_uch_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block input_uploader edu-docs" id="edu_cal">
				<label>Информация о календарном учебном графике</label>		
				<input placeholder="Заголовок документа" class="doc_name" type="text" name="edu_cal_name" value="<?php echo (isset($field['edu_cal_name']) ? wp_unslash(htmlspecialchars($field['edu_cal_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="edu_cal_id" value="<?php echo (isset($field['edu_cal_id']) ? $field['edu_cal_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="edu_cal_url" value="<?php echo (isset($field['edu_cal_url']) ? $field['edu_cal_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['edu_cal_url']) && !empty($field['edu_cal_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['edu_cal_url']) && !empty($field['edu_cal_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block editor-block">
				<label>Информация о методических и об иных документах, разработанных образовательной организацией для обеспечения образовательного процесса</label>
				<?php 
					wp_editor(
						(isset($field['edumet']) ? $field['edumet'] : ''), 
						'edumet', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'edumet',
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
				<label>Информация о языках, на которых осуществляется образование (обучение)</label>
				<input type="text" name="edu_lang" class="field" value="<?php echo (isset($field['edu_lang']) ? wp_unslash(htmlspecialchars($field['edu_lang'])) : '')?>">
			</div>
			<div class="input-block editor-block">
				<label>О заключенных и планируемых к заключению договорах с иностранными и (или) международными организациями по вопросам образования и науки</label>
				<?php 
					wp_editor(
						(isset($field['eduino']) ? $field['eduino'] : ''), 
						'eduino', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'eduino',
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
				<label>Информация о направлениях и результатах научной (научно-исследовательской) деятельности и научно-исследовательской базе для ее осуществления</label>
				<textarea name="edu_nid"><?php echo (isset($field['edu_nid']) ? wp_unslash($field['edu_nid']) : '')?></textarea>
			</div>
			<div class="input-block editor-block">
				<label>Информация о результатах приема по каждому направлению подготовки или специальности с различными условиями приема (на места, финансируемые за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов, по договорам об образовании за счет средств физических и (или) юридических лиц) с указанием средней суммы набранных баллов по всем вступительным испытаниям</label>
				<?php 
					wp_editor(
						(isset($field['edurespr']) ? $field['edurespr'] : ''), 
						'edurespr', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'edurespr',
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
				<label>Информация о результатах перевода, восстановления и отчисления</label>
				<textarea name="edu_resot"><?php echo (isset($field['edu_resot']) ? wp_unslash($field['edu_resot']) : '')?></textarea>
			</div>
			<div class="input-block input_uploader edu-docs" id="edu_copy">
				<label>Копия учебной программы (необязательно)</label>	
				<input placeholder="Заголовок документа" class="doc_name" type="text" name="edu_copy_name" value="<?php echo (isset($field['edu_copy_name']) ? wp_unslash(htmlspecialchars($field['edu_copy_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="edu_copy_id" value="<?php echo (isset($field['edu_copy_id']) ? $field['edu_copy_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="edu_copy_url" value="<?php echo (isset($field['edu_copy_url']) ? $field['edu_copy_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['edu_copy_url']) && !empty($field['edu_copy_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['edu_copy_url']) && !empty($field['edu_copy_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			
			<div class="sub-title">По каждой образовательной программе:</div>
			<div class="fhd-text alert">
				Обязательно заполните поле "Наименование образовательной программы" (при наличии программы), иначе программа не будет отображена на сайте.
			</div>
			
			<?php if(isset($data['restored']['edu']) && is_array($data['restored']['edu'])) : $edu = $data['restored']['edu']; ?>
			
				<?php foreach($edu as $key => $val):?>
			
				<div class="edu_item" id="edu_<?php echo $key?>" name="edu_<?php echo $key?>">
					<div class="input-block">
						<label>Наименование образовательной программы</label>
						<input type="text" name="edu[<?php echo $key?>][edu_name]" class="field" value="<?php echo (isset($val['edu_name']) ? wp_unslash(htmlspecialchars($val['edu_name'])) : '')?>">
					</div>
					<div class="input-block">
						<label>Уровень образования</label>
						<input type="text" name="edu[<?php echo $key?>][edu_lev]" class="field" value="<?php echo (isset($val['edu_lev']) ? wp_unslash(htmlspecialchars($val['edu_lev'])) : '')?>">
					</div>
					<div class="input-block">
						<label>Код специальности, направления подготовки</label>
						<input type="text" name="edu[<?php echo $key?>][edu_code]" class="field" value="<?php echo (isset($val['edu_code']) ? wp_unslash(htmlspecialchars($val['edu_code'])) : '')?>">
					</div>
					<div class="input-block input_uploader" id="edu_org_<?php echo $key?>">
						<label>Информация об описании образовательной программы</label>	
						<input placeholder="Заголовок документа" class="doc_name" type="text" name="edu[<?php echo $key?>][edu_org_name]" value="<?php echo (isset($val['edu_org_name']) ? wp_unslash(htmlspecialchars($val['edu_org_name'])) : '')?>">
						<input class="doc_id block-hidden" type="text" name="edu[<?php echo $key?>][edu_org_id]" value="<?php echo (isset($val['edu_org_id']) ? $val['edu_org_id'] : '')?>">
						<input class="doc_url" readonly="readonly" type="text" name="edu[<?php echo $key?>][edu_org_url]" value="<?php echo (isset($val['edu_org_url']) ? $val['edu_org_url'] : '')?>">
						<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($val['edu_org_url']) && !empty($val['edu_org_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($val['edu_org_url']) && !empty($val['edu_org_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
					</div>
					<div class="input-block">
						<label>Информация об аннотации к рабочим программам дисциплин (по каждой дисциплине в составе образовательной программы)</label>
						<textarea name="edu[<?php echo $key?>][edu_ann]"><?php echo (isset($val['edu_ann']) ? wp_unslash($val['edu_ann']) : '')?></textarea>
					</div>
					<div class="input-block">
						<label>Информация о практиках, предусмотренных соответствующей образовательной программой</label>
						<textarea name="edu[<?php echo $key?>][edu_pract]"><?php echo (isset($val['edu_pract']) ? wp_unslash($val['edu_pract']) : '')?></textarea>
					</div>
					<div class="input-block">
						<label>Информация о численности обучающихся по реализуемым образовательным программам за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов и по договорам об образовании за счет средств физических и (или) юридических лиц</label>
						<div class="pop">
							<div class="pop-title">За счет бюджета:</div>
							<input type="text" name="edu[<?php echo $key?>][edu_budg]" class="field" value="<?php echo (isset($val['edu_budg']) ? wp_unslash(htmlspecialchars($val['edu_budg'])) : '')?>">
						</div>
						<div class="pop">
							<div class="pop-title">Платное обучение:</div>
							<input type="text" name="edu[<?php echo $key?>][edu_paid]" class="field" value="<?php echo (isset($val['edu_paid']) ? wp_unslash(htmlspecialchars($val['edu_paid'])) : '')?>">
						</div>
					</div>
					<a href="javascript:;" class="edu_remove link_remove">Удалить образовательную программу</a>
				</div>
			
				<?php endforeach;?>
			
			<?php else:?>
			
			<div class="edu_item" id="edu_edu_1" name="edu_edu_1">
				<div class="input-block">
					<label>Наименование образовательной программы</label>
					<input type="text" name="edu[edu_1][edu_name]" class="field">
				</div>
				<div class="input-block">
					<label>Уровень образования</label>
					<input type="text" name="edu[edu_1][edu_lev]" class="field">
				</div>
				<div class="input-block">
					<label>Код специальности, направления подготовки</label>
					<input type="text" name="edu[edu_1][edu_code]" class="field">
				</div>
				<div class="input-block input_uploader" id="edu_org_1">
					<label>Информация об описании образовательной программы</label>	
					<input placeholder="Заголовок документа" class="doc_name" type="text" name="edu[edu_1][edu_org_name]" value="">
					<input class="doc_id block-hidden" type="text" name="edu[edu_1][edu_org_id]" value="">
					<input class="doc_url" readonly="readonly" type="text" name="edu[edu_1][edu_org_url]" value="">
					<a href="javascript:;" class="doc_upload link_btn">Загрузить документ</a>
					<a href="javascript:;" class="doc_remove link_btn block-hidden">Очистить документ</a>
				</div>
				<div class="input-block">
					<label>Информация об аннотации к рабочим программам дисциплин (по каждой дисциплине в составе образовательной программы)</label>
					<textarea name="edu[edu_1][edu_ann]"></textarea>
				</div>
				<div class="input-block">
					<label>Информация о практиках, предусмотренных соответствующей образовательной программой</label>
					<textarea name="edu[edu_1][edu_pract]"></textarea>
				</div>
				<div class="input-block">
					<label>Информация о численности обучающихся по реализуемым образовательным программам за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов и по договорам об образовании за счет средств физических и (или) юридических лиц</label>
					<div class="pop">
						<div class="pop-title">За счет бюджета:</div>
						<input type="text" name="edu[edu_1][edu_budg]" class="field">
					</div>
					<div class="pop">
						<div class="pop-title">Платное обучение:</div>
						<input type="text" name="edu[edu_1][edu_paid]" class="field">
					</div>
				</div>				
				<a href="javascript:;" class="edu_remove link_remove">Удалить программу</a>
			</div>
			
			<?php endif;?>
						
			<div id="add_prog">
				<input class="form_btn" type="button" value="Добавить программу" id="add_edu">
				<input class="form_btn" type="submit" value="Сохранить" name="edu_btn">
			</div>
		</div>
		
	</form>
</div>
<?php endif; ?>





