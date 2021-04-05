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
				<label>Реализуемые уровни образования</label>
				<input name="edu_level" type="text" value="<?php echo (isset($field['edu_level']) ? wp_unslash(htmlspecialchars($field['edu_level'])) : '')?>" class="field">
			</div>
            <div class="input-block">
				<label>Формы обучения</label>
				<input name="edu_form" type="text" value="<?php echo (isset($field['edu_form']) ? wp_unslash(htmlspecialchars($field['edu_form'])) : '')?>" class="field">
			</div>
            <div class="input-block">
				<label>Нормативные сроки обучения</label>
				<input name="edu_time" type="text" value="<?php echo (isset($field['edu_time']) ? wp_unslash(htmlspecialchars($field['edu_time'])) : '')?>" class="field">
			</div>
            
            <div class="input-block editor-block education_obr">
				<label>Сроки действия государственной аккредитации образзовательной программы (при наличии)</label>				
				<?php 
					wp_editor(
						(isset($field['accredtime']) ? $field['accredtime'] : ''), 
						'accredtime', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'accredtime',
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
				<label>Описание образовательной программы с приложением её копии</label>				
				<?php 
					wp_editor(
						(isset($field['programinfo']) ? $field['programinfo'] : ''), 
						'programinfo', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'programinfo',
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
				<label>Учебный план</label>				
				<?php 
					wp_editor(
						(isset($field['teachplan']) ? $field['teachplan'] : ''), 
						'teachplan', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'teachplan',
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
				<label>Аннотации к рабочим программам</label>				
				<?php 
					wp_editor(
						(isset($field['workannot']) ? $field['workannot'] : ''), 
						'workannot', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'workannot',
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
				<label>Календарный учебный график</label>				
				<?php 
					wp_editor(
						(isset($field['calendargraf']) ? $field['calendargraf'] : ''), 
						'calendargraf', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'calendargraf',
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
				<label>Методические и иные документы, разработанные образовательной организацией для обеспечания образовательного процесса</label>				
				<?php 
					wp_editor(
						(isset($field['metoddocs']) ? $field['metoddocs'] : ''), 
						'metoddocs', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'metoddocs',
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
				<label>Реализуемые образовательные программы с указанием учебных предметов, курсов, дисциплин (модулей), практики, предусмотренных соответствующей образовательной программой</label>				
				<?php 
					wp_editor(
						(isset($field['programs']) ? $field['programs'] : ''), 
						'programs', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'programs',
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
				<label>Информация об использовании при реализации образовательной программы электронного обучения и дистанционных образовательных технологий</label>		
				<?php 
					wp_editor(
						(isset($field['electron']) ? $field['electron'] : ''), 
						'electron', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'electron',
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
            <div class="input-block">
				<label>Языки, на которых осуществляется образование (обучение)</label>
				<input name="edu_lang" type="text" value="<?php echo (isset($field['edu_lang']) ? wp_unslash(htmlspecialchars($field['edu_lang'])) : '')?>" class="field">
			</div>
            <div class="input-block editor-block education_obr">
				<label>Лицензия на осуществление образовательной деятельности</label>
				<?php 
					wp_editor(
						(isset($field['licenz']) ? $field['licenz'] : ''), 
						'licenz', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'licenz',
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
				<label>Информация о сроке действия государственной аккредитации образовательной программы, о языках, на которых осуществляется образование (обучение)</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Код</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Уровень образования</div>
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
                <div>Форма обучения</div>
                <div>Описание образовательной программы</div>
                <div>Учебный план</div>
                <div>Аннотации к рабочим программам дисциплин</div>
                <div>Календарный учебный график</div>
                <div>Практики, предусмотренные соответствующей образовательной программой</div>
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
                <div>Форма обучения</div>
                <div>Описание образовательной программы</div>
                <div>Учебный план</div>
                <div>Аннотации к рабочим программам дисциплин</div>
                <div>Календарный учебный график</div>
                <div>Практики, предусмотренные соответствующей образовательной программой</div>
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
				<label>Информация о результатах перевода, восстановления и отчисления</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Код</div>
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
				<label>Информация о направлениях и результатах научной (научно-исследовательской) деятельности и научно-исследовательской базе для ее осуществления (для образовательных организаций высшего образования и организаций дополнительного профессионального образования)</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Код специальности, направления подготовки</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Реализуемый уровень образования</div>
                <div>Перечень научных направлений, в рамках которых ведется научная (научно-исследовательская) деятельность</div>         
                <div>Результаты научной (научно-исследовательской) деятельности</div>         
                <div>Сведения о научно-исследовательской базе для осуществления научной (научно-исследовательской) деятельности</div>                       
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
				<label>Информация о профессионально- общественной аккредитации образовательной программы (при наличии)</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
                <div>Код</div>
                <div>Наименование специальности, направления подготовки</div>
                <div>Наименование аккредитующей организации</div>
                <div>Срок действия профессионально-общественной аккредитации образовательной программы</div>
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





