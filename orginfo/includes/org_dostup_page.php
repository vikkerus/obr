<?php  

$data = org_dostup_page();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-mat">
	<form name="dost_form" id="dost_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('dost_form');
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
				<label>Сведения о специально оборудованных учебных кабинетах</label>
                <br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
                <div>Адрес места нахождения</div>
                <div>Наименование специально оборудованного учебного кабинета</div>
                <div>Оснащенность специально специально оборудованного учебного кабинета</div>
                <div>Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['dostcab']) ? $field['dostcab'] : ''), 
						'dostcab', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'dostcab',
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
				<label>Сведения о приспособленных объектах для проведения практических занятий</label>
                <br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
                <div>Адрес места нахождения</div>
                <div>Наименование приспособленного объекта для проведения практических занятий</div>
                <div>Оснащенность приспособленного объекта для проведения практических занятий</div>
                <div>Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['dostprac']) ? $field['dostprac'] : ''), 
						'dostprac', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'dostprac',
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
				<label>Сведения о библиотеке(ах)</label>
                <br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
                <div>Наименование объекта</div>
                <div>Адрес места нахождения объекта</div>
                <div>Площадь объекта</div>
                <div>Количество мест</div>
                <div>Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['dostlib']) ? $field['dostlib'] : ''), 
						'dostlib', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'dostlib',
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
				<label> Сведения об объектах спорта</label>
                <br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
                <div>Наименование объекта</div>
                <div>Адрес места нахождения объекта</div>
                <div>Площадь объекта</div>
                <div>Количество мест</div>
                <div>Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['dostsport']) ? $field['dostsport'] : ''), 
						'dostsport', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'dostsport',
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
                <div>Наименование объекта</div>
                <div>Адрес места нахождения объекта</div>
                <div>Площадь объекта</div>
                <div>Количество мест</div>
                <div>Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['dostfood']) ? $field['dostfood'] : ''), 
						'dostfood', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'dostfood',
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
                <div>Наименование объекта</div>
                <div>Адрес места нахождения объекта</div>
                <div>Площадь объекта</div>
                <div>Количество мест</div>
                <div>Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['dostohran']) ? $field['dostohran'] : ''), 
						'dostohran', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'dostohran',
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
			<button class="form_btn" name="dost_btn" type="submit">Сохранить</button>
		</div>
	</form>
</div>
<?php endif; ?>




