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
			<div class="input-block editor-block education_obr">
				<label>Информация о сроке действия государственной аккредитации образовательной программы, о языках, на которых осуществляется образование (обучение)</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Код</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Уровень образования</div>
                <div>Образовательная программа</div>
                <div>Нормативный срок обучения</div>
                <div>Форма обучения</div>
                <div>Срок действия государственной аккредитации образовательной программы (при наличии государственной аккредитации)</div>
                <div>Языки, на которых осуществляется образование (обучение)</div>
                <div>Присваиваемые по профессиям, специальностям и направлениям подготовки квалификации</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['eduaccred']) ? $field['eduaccred'] : ''), 
						'eduaccred', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'eduaccred',
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
				<label>Наличие специальных <u>(адаптированных)</u> образовательных программ и методов обучения</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
				<div>Код</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Уровень образования</div>
                <div>Образовательная программа</div>
                <div>Форма обучения</div>
                <div>Описание образовательной программы</div>
                <div>Учебный план</div>
                <div>Аннотации к рабочим программам дисциплин</div>
                <div>Календарный учебный график</div>
                <div>Практики</div>
                <div>Методические и иные документы</div>
                <div>Использование при реализации образовательных программ электронного обучения и дистанционных
                образовательных технологий</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['eduadop']) ? $field['eduadop'] : ''), 
						'eduadop', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'eduadop',
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
				<label>Наличие специальных <u>(неадаптированных)</u> образовательных программ и методов обучения</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
				<div>Код</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Уровень образования</div>
                <div>Образовательная программа</div>
                <div>Форма обучения</div>
                <div>Описание образовательной программы</div>
                <div>Учебный план</div>
                <div>Аннотации к рабочим программам дисциплин</div>
                <div>Календарный учебный график</div>
                <div>Практики</div>
                <div>Методические и иные документы</div>
                <div>Использование при реализации образовательных программ электронного обучения и дистанционных
                образовательных технологий</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['eduop']) ? $field['eduop'] : ''), 
						'eduop', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'eduop',
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
				<label>Информация о численности обучающихся по реализуемым образовательным программам</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
				<div>Код</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Уровень образования</div>
                <div>Форма обучения</div>
                <div>Численность обучающихся, чел.</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['educhisl']) ? $field['educhisl'] : ''), 
						'educhisl', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'educhisl',
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
				<label>Информация о результатах приема с различными условиями приема (на места, финансируемые за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов, по договорам об образовании за счет средств физических и (или) юридических лиц)</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Код</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Уровень образования</div>
                <div>Форма обучения</div>
                <div>Численность обучающихся, чел.</div>
                <div>Средняя сумма баллов по аттестату</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['edupriem']) ? $field['edupriem'] : ''), 
						'edupriem', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'edupriem',
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
				<label>Информация о результатах перевода, восстановления и отчисления</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Уровень образования</div>
                <div>Форма обучения</div>
                <div>Численность обучающихся, переведенных в другие ОО</div>
                <div>Численность обучающихся, переведенных из других ОО</div>
                <div>Численность обучающихся, восстановленных обучающихся</div>
                <div>Численность отчисленных обучающихся</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['eduperevod']) ? $field['eduperevod'] : ''), 
						'eduperevod', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'eduperevod',
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
				<label>Информация о научно-исследовательской работе по каждой образовательной программе</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Код специальности/ направления подготовки</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Образовательная программа</div>
                <div>Название научного направления / научной школы</div>
                <div>Количество НПР, принимающих участие в научной (научно-исследовательской) деятельности</div>
                <div>Количество студентов, принимающих участие в научной (научно-исследовательской) деятельности</div>
                <div>Количество изданных монографий научно-педагогических работников образовательной организации по
                всем научным направлениям за последний год</div>
                <div>Количество изданных и принятых к публикации статей в изданиях, рекомендованных ВАК/зарубежных
                для публикации научных работ за последний год</div>
                <div>Количество патентов, полученных на разработки за последний год: российских/ зарубежных</div>
                <div>Количество свидетельств о регистрации объекта интеллектуальной собственности, выданных на
                разработки за последний год: российских/зарубежных</div>
                <div>Среднегодовой объем финансирования научных исследований на одного научно-педагогического
                работника организации (в приведенных к целочисленным значениям ставок)</div>
                <div>Научно-исследовательская база для осуществления научной (научно-исследовательской) деятельности</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['edunir']) ? $field['edunir'] : ''), 
						'edunir', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'edunir',
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
				<label>Наличие практики</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Код</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Год начала подготовки</div>
                <div>Профиль программы</div>
                <div>Реализуемые формы обучения</div>
                <div>Наличие практики (з.е./недели)</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['eduprac']) ? $field['eduprac'] : ''), 
						'eduprac', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'eduprac',
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
            
						
			<div id="add_prog">				
				<input class="form_btn" type="submit" value="Сохранить" name="edu_btn">
			</div>
		</div>
		
	</form>
</div>
<?php endif; ?>





