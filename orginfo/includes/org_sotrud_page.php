<?php  $data = org_sotrud_page(); ?>

<?php // проверяем, если $data['dostup'] равен 1, то отображать форму, иначе писать "Обратитесь к администратору"
 if($data['mezhdu'] === '1') : ?>

<?php // проверяем, есть ли в переданном массиве элемент action
 if(isset($data['action'])) : ?>
<div class="page-mat">
	<form name="sotr_form" id="sotr_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('sotr_form');
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
				<label>Информация о заключенных и планируемых к заключению договорах с иностранными и (или) международными организациями по вопросам образования и науки</label>
                <br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
                <div>Название государства</div>
                <div>Наименование организации</div>
                <div>Реквизиты договора (наименование, дата, номер, срок действия)</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['dog']) ? $field['dog'] : ''), 
						'dog', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'dog',
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
				<label>Информация о международной аккредитации</label>
                <br>
				<div><b>Должны быть отображены следующие параметры:</b></div>
                <div>Код</div>
                <div>Наименование профессии, специальности, направления подготовки</div>
                <div>Наименование аккредитующей организации</div>
                <div>Срок действия международной аккредитации (дата окончания действия свидетельства о международной аккредитации)</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['accr']) ? $field['accr'] : ''), 
						'accr', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'accr',
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
			<button class="form_btn" name="sotr_btn" type="submit">Сохранить</button>
		</div>
	</form>
</div>
<?php endif; ?>
<?php else:?>
Данный раздел отсутствует в базе данных. Обратитесь к администратору! 
<?php endif;?>




