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
            <div class="input-block editor-block education_obr">
				<label>Сведения о каждом месте осуществления образовательной деятельности, в том числе не указываемых в соответствии с частью 4 статьи 91 Федерального закона от 29.12.2012 N 273-ФЗ "Об образовании в Российской Федерации" (Собрание законодательства Российской Федерации, 2012, N 53, ст. 7598; 2019, N 49, ст. 6962) в приложении к лицензии на осуществление образовательной деятельности</label>							
				<br>
				<?php 
					wp_editor(
						(isset($field['mtoplace']) ? $field['mtoplace'] : ''), 
						'mtoplace', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'mtoplace',
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
				<label>Сведения о наличии оборудованных учебных кабинетов</label>
				<br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
				<div>Адрес места нахождения;</div>
				<div>Наименование оборудованного учебного кабинетова;</div>
				<div>Оснащенность оборудованного учебного кабинетова;</div>										
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
				<label>Сведения о наличии объектов для проведения практических занятий</label>
				<br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
				<div>Адрес места нахождения;</div>
				<div>Наименование объекта для проведения практических занятий;</div>
				<div>Оснащенность объекта для проведения практических занятий;</div>											
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
				<label>Сведения о наличии библиотек</label>
				<br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
				<div>Наименование объекта;</div>
				<div>Адрес места нахождения объекта;</div>
				<div>Площадь объекта;</div>
				<div>Количество мест;</div>															
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
				<label>Сведения об объектах спорта</label>
				<br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
				<div>Наименование объекта;</div>
				<div>Адрес места нахождения объекта;</div>
				<div>Площадь объекта;</div>
				<div>Количество мест;</div>							
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
			
			
            <div class="input-block editor-block education_obr">
				<label>Сведения об условиях питания обучающихся</label>
				<br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
				<div>Наименование объекта;</div>
				<div>Адрес места нахождения объекта;</div>
				<div>Площадь объекта;</div>
				<div>Количество мест;</div>							
				<br>
				<?php 
					wp_editor(
						(isset($field['meal']) ? $field['meal'] : ''), 
						'meal', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'meal',
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
				<label>Сведения об условиях охраны здоровья обучающихся</label>
				<br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
				<div>Наименование объекта;</div>
				<div>Адрес места нахождения объекта;</div>
				<div>Площадь объекта;</div>
				<div>Количество мест;</div>							
				<br>
				<?php 
					wp_editor(
						(isset($field['guard']) ? $field['guard'] : ''), 
						'guard', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'guard',
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
				<label>Сведения о средствах обучения и воспитания</label>										
				<br>
				<?php 
					wp_editor(
						(isset($field['facil']) ? $field['facil'] : ''), 
						'facil', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'facil',
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
				<label>Сведения о доступе к информационным системам и информационно-телекоммуникационным сетям</label>										
				<br>
				<?php 
					wp_editor(
						(isset($field['comnet']) ? $field['comnet'] : ''), 
						'comnet', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'comnet',
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
				<label>Наличие в образовательной организации электронной информационно-образовательной среды</label>										
				<br>
				<?php 
					wp_editor(
						(isset($field['eios']) ? $field['eios'] : ''), 
						'eios', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'eios',
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
				<label>Количество собственных электронных образовательных и информационных ресурсов</label>										
				<br>
				<?php 
					wp_editor(
						(isset($field['own']) ? $field['own'] : ''), 
						'own', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'own',
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
				<label>Количество сторонних электронных образовательных и информационных ресурсов</label>										
				<br>
				<?php 
					wp_editor(
						(isset($field['side']) ? $field['side'] : ''), 
						'side', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'side',
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
				<label>Количество баз данных электронного каталога</label>										
				<br>
				<?php 
					wp_editor(
						(isset($field['bdec']) ? $field['bdec'] : ''), 
						'bdec', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'bdec',
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
				<label>Ссылка на электронный образовательный ресурс, к которым обеспечивается доступ обучающихся</label>										
				<br>
				<?php 
					wp_editor(
						(isset($field['list']) ? $field['list'] : ''), 
						'list', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'list',
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








