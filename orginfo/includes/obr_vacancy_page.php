<?php  

$data = obr_vacancy_page();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-vac">
	<form name="vac_form" id="vac_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('vac_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		
		<div class="vacancy">
			<div class="input-block editor-block">
				<label>Информация о количестве вакантных мест для приема (перевода) по каждой образовательной программе, специальности, направлению подготовки (на места, финансируемые за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов, по договорам об образовании за счет средств физических и (или) юридических лиц)</label>
				<?php 
					wp_editor(
						(isset($field['vacinfo']) ? $field['vacinfo'] : ''), 
						'vacinfo', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'vacinfo',
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
				<button class="form_btn" name="vac_btn" type="submit">Сохранить</button>
			</div>
		</div>	
		
	</form>
</div>
<?php endif; ?>