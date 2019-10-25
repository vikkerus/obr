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
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Уровень образования;</div>						
				<div>Информация о реализуемых уровнях образования;</div>
				<div>Информация о нормативных сроках обучения;</div>	
				<div>Информация о формах обучения;</div>
				<div>Информация о языках, на которых осуществляется образование (обучение);</div>
				<div>Информация о сроке действия государственной аккредитации образовательной программы (при наличии государственной аккредитации);</div>
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
				<label>Документы, регламентирующие образовательный процесс образовательной организации по <u>адаптированным</u> образовательным программам</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Информация о реализуемых уровнях образования;</div>
				<div>Образовательная программа (ссылка);</div>
				<div>Информация о формах обучения;</div>				
				<div>Cсылка на описание образовательной программы с приложением ее копии;</div>				
				<div>Ссылка на учебный план с приложением его копии;</div>				
				<div>Ссылки на аннотации к рабочим программам дисциплин (по каждой дисциплине в составе образовательной программы) с приложением их копий;</div>				
				<div>Ссылка на календарный учебный график с приложением его копии;</div>
				<div>Ссылки на информацию о практиках, предусмотренных соответствующей образовательной программой;</div>
				<div>Ссылки на нормативные и методические документы, разработанные образовательной организацией для обеспечения образовательного процесса;</div>				
				<div>Ссылки на информацию об использовании при реализации образовательнойпрограммыэлектронного обучения и дистанционных образовательных технологий;</div>				
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
				<label>Документы, регламентирующие образовательный процесс образовательной организации по <u>неадаптированным</u> образовательным программам</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Информация о реализуемых уровнях образования;</div>
				<div>Информация о формах обучения;</div>				
				<div>Cсылка на описание образовательной программы с приложением ее копии;</div>				
				<div>Ссылка на учебный план с приложением его копии;</div>				
				<div>Ссылки на аннотации к рабочим программам дисциплин (по каждой дисциплине в составе образовательной программы) с приложением их копий;</div>				
				<div>Ссылка на календарный учебный график с приложением его копии;</div>
				<div>Ссылки на информацию о практиках, предусмотренных соответствующей образовательной программой;</div>
				<div>Ссылки на нормативные и методические документы, разработанные образовательной организацией для обеспечения образовательного процесса;</div>				
				<div>Ссылки на информацию об использовании при реализации образовательнойпрограммыэлектронного обучения и дистанционных образовательных технологий;</div>			
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
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Информация о реализуемых уровнях образования;</div>
				<div>Информация о формах обучения;</div>
				<div>Информация о численности обучающихся по реализуемым образовательным программам <u>за счет бюджетных ассигнований федерального бюджета</u>, <u>бюджетов субъектов Российской Федерации</u>, <u>местных бюджетов</u> и <u>по договорам об образовании за счет средств физических и (или) юридических лиц</u>;</div>				
				<br>
				<?php 
					wp_editor(
						(isset($field['educhislen']) ? $field['educhislen'] : ''), 
						'educhislen', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'educhislen',
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
				<label>Информация о результатах приема с различными условиями приема</label>
				<br>
				<div><b>По каждой специальности/образовательной программе должны быть отображены следующие параметры:</b></div>
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Информация о реализуемых уровнях образования;</div>
				<div>Информация о формах обучения;</div>
				<div>Сведения о результатах приема <u>за счёт бюджетных ассигнований федерального бюджета</u>, <u>бюджетов субъектов Российской Федерации</u>, <u>местных бюджетов</u>, <u>за счёт средств физических и (или) юридических лиц</u>;</div>				
				<div>Сведения о средней сумме набранных баллов по всем вступительным испытаниям;</div>
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
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Информация о реализуемых уровнях образования;</div>
				<div>Информация о формах обучения;</div>
				<div>Cведения о численности обучающихся, переведенных в другие образовательные организации;</div>
				<div>Cведения о численности обучающихся, переведенных из других образовательных организаций;</div>
				<div>Cведения о численности восстановленных обучающихся;</div>
				<div>Cведения о численности отчисленных обучающихся;</div>
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
				<div>Код специальности, направления подготовки;</div>
				<div>Наименование специальности, направления подготовки;</div>
				<div>Образовательная программа (ссылка);</div>				
				<div>Перечень научных направлений, в рамках которых ведется научная (научно-исследовательская) деятельность;</div>
				<div>Сведения о количестве НПР, принимающих участие в научной (научно-исследовательской) деятельности;</div>
				<div>Сведения о количестве студентов, принимающих участие в научной (научно-исследовательской) деятельности;</div>
				<div>Сведения о количестве изданных монографий научно-педагогического персонала образовательного учреждения по всем научным направлениям за последний год;</div>
				<div>Сведения о количестве изданных и принятых к публикации статей в изданиях, рекомендованных ВАК/зарубежных для публикации научных работ за последний год;</div>
				<div>Сведения о количестве российских патентов, полученных на разработки за последний год;</div>
				<div>Сведения о количестве зарубежных патентов, полученных на разработки за последний год;</div>
				<div>Сведения о количестве российских свидетельств о регистрации объекта интеллектуальной собственности, выданных на разработки за последний год;</div>
				<div>Сведения о количестве зарубежных свидетельств о регистрации объекта интеллектуальной собственности, выданных на разработки за последний год;</div>
				<div>Сведения о среднегодовом объеме финансирования научных исследований на одного научно-педагогического работника организации (в приведенных к целочисленным значениям ставок) (тыс. руб.);</div>
				<div>Сведения о научно-исследовательской базе для осуществления научной (научно-исследовательской) деятельности;</div>																				
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
			
						
			<div id="add_prog">				
				<input class="form_btn" type="submit" value="Сохранить" name="edu_btn">
			</div>
		</div>
		
	</form>
</div>
<?php endif; ?>





