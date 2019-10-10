<?php  

$data = org_material_page();

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
			<div class="input-block editor-block education_obr">
				<label>Сведения о наличии оборудованных учебных кабинетов, в том числе приспособленных для использования инвалидами и лицами с ограниченными возможностями здоровья</label>
				<br>
				<div><b>По каждой специальности/направлению подготовки должны быть отображены следующие параметры:</b></div>
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Перечень специальных помещений и помещений для самостоятельной работы;</div>
				<div>Приспособленность помещений для использования инвалидами и лицами с ограниченными возможностями здоровья;</div>							
				<br>
				<?php 
					wp_editor(
						(isset($field['pcab']) ? $field['pcab'] : ''), 
						'pcab', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'pcab',
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
			
			<div class="input-block editor-block education_obr">
				<label>Сведения о наличии объектов для проведения практических занятий, в том числе приспособленных для использования инвалидами и лицами с ограниченными возможностями здоровья</label>
				<br>
				<div><b>По каждой специальности/направлению подготовки должны быть отображены следующие параметры:</b></div>
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Перечень помещений для проведения практических занятий;</div>
				<div>Приспособленность помещений для использования инвалидами и лицами с ограниченными возможностями здоровья;</div>							
				<br>
				<?php 
					wp_editor(
						(isset($field['pprac']) ? $field['pprac'] : ''), 
						'pprac', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'pprac',
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
			
			<div class="input-block editor-block education_obr">
				<label>Сведения о наличии библиотек, в том числе приспособленных для использования инвалидами и лицами с ограниченными возможностями здоровья</label>
				<br>
				<div><b>По каждой специальности/направлению подготовки должны быть отображены следующие параметры:</b></div>
				<div>Вид помещения;</div>
				<div>Адрес местонахождения;</div>
				<div>Площадь, м<sup>2</sub>;</div>
				<div>Количество мест;</div>				
				<div>Приспособленность помещений для использования инвалидами и лицами с ограниченными возможностями здоровья;</div>							
				<br>
				<?php 
					wp_editor(
						(isset($field['plib']) ? $field['plib'] : ''), 
						'plib', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'plib',
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
			
			<div class="input-block editor-block education_obr">
				<label>Сведения об объектах спорта, в том числе приспособленных для использования инвалидами и лицами с ограниченными возможностями здоровья</label>
				<br>
				<div><b>По каждой специальности/направлению подготовки должны быть отображены следующие параметры:</b></div>
				<div>Вид помещения;</div>
				<div>Адрес местонахождения;</div>
				<div>Площадь, м<sup>2</sub>;</div>							
				<div>Приспособленность помещений для использования инвалидами и лицами с ограниченными возможностями здоровья;</div>							
				<br>
				<?php 
					wp_editor(
						(isset($field['psport']) ? $field['psport'] : ''), 
						'psport', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'psport',
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
				<label>Сведения о наличии средств обучения и воспитания</label>
				<textarea name="mat_vos" class="field"><?php echo (isset($field['mat_vos']) ? wp_unslash($field['mat_vos']) : '')?></textarea>
			</div>
			
			<div class="input-block">
				<label>Сведения о наличии средств обучения и воспитания для использования инвалидами и лицами с ограниченными возможностями здоровья</label>
				<textarea name="mat_ovz" class="field"><?php echo (isset($field['mat_ovz']) ? wp_unslash($field['mat_ovz']) : '')?></textarea>
			</div>
			
			<div class="input-block">
				<label>Сведения об обеспечении доступа в здания образовательной организации инвалидов и лиц с ограниченными возможностями здоровья</label>
				<textarea name="ovz" class="field"><?php echo (isset($field['ovz']) ? wp_unslash($field['ovz']) : '')?></textarea>
			</div>
			
			<div class="input-block input_uploader" id="mat_meals">
				<label>Сведения об условиях питания обучающихся (документ)</label>
				<input placeholder="Заголовок документа" class="doc_name" type="text" name="mat_meals_name" value="<?php echo (isset($field['mat_meals_name']) ? wp_unslash(htmlspecialchars($field['mat_meals_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="mat_meals_id" value="<?php echo (isset($field['mat_meals_id']) ? $field['mat_meals_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="mat_meals_url" value="<?php echo (isset($field['mat_meals_url']) ? $field['mat_meals_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['mat_meals_url']) && !empty($field['mat_meals_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['mat_meals_url']) && !empty($field['mat_meals_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			
			<div class="input-block">
				<label>Сведения об условиях питания обучающихся</label>
				<textarea name="mat_meals" class="field"><?php echo (isset($field['mat_meals']) ? wp_unslash($field['mat_meals']) : '')?></textarea>
			</div>
			
			<div class="input-block">
				<label>Сведения об условиях питания обучающихся с ограниченными возможностями здоровья и инвалидов</label>
				<textarea name="mat_meals_ovz" class="field"><?php echo (isset($field['mat_meals_ovz']) ? wp_unslash($field['mat_meals_ovz']) : '')?></textarea>
			</div>
			
			<div class="input-block">
				<label>Сведения об условиях охраны здоровья обучающихся</label>
				<textarea name="mat_heal" class="field"><?php echo (isset($field['mat_heal']) ? wp_unslash($field['mat_heal']) : '')?></textarea>
			</div>
			
			<div class="input-block">
				<label>Сведения об условиях охраны здоровья обучающихся с ограниченными возможностями здоровья и инвалидов</label>
				<textarea name="mat_heal_ovz" class="field"><?php echo (isset($field['mat_heal_ovz']) ? wp_unslash($field['mat_heal_ovz']) : '')?></textarea>
			</div>
			
			<div class="input-block editor-block education_obr">
				<label>Сведений о доступе к электронной информационно-образовательной среде, информационным системам и информационно-телекоммуникационным сетям и электронным ресурсам, к которым обеспечивается доступ обучающихся</label>
				<br>
				<div><b>Следует отобразить следующие данные:</b></div>
				<div>Сведения о доступе к информационным системам и информационно-телекоммуникационным сетям;</div>
				<div>Сведения о доступе к информационным системам и информационно-телекоммуникационным сетям, приспособленным для использования инвалидами и лицами с ограниченными возможностями здоровья;</div>
				<div>Общее количество компьютеров с выходом в информационно-телекоммуникационную сеть «Интернет», к которым имеют доступ обучающиеся;</div>							
				<div>Общее количество ЭБС, к которым имеют доступ обучающиеся (собственных или на договорной основе);</div>	
				<div>Наличие собственных электронных образовательных и информационных ресурсов;</div>	
				<div>Наличие сторонних электронных образовательных и информационных ресурсов;</div>	
				<div>Наличие базы данных электронного каталога;</div>	
				<div>Сведения об электронных образовательных ресурсах;</div>
				<div>Сведения об электронных образовательных ресурсах, приспособленных для использования инвалидами и лицами с ограниченными возможностями здоровья;</div>
				<div>Сведения о наличии специальных технических средств обучения коллективного и индивидуального пользования для инвалидов и лиц с ограниченными возможностями здоровья;</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['pel']) ? $field['pel'] : ''), 
						'pel', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'pel',
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








