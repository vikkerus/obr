<?php  

$data = org_finance_page();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-fin">
	<form name="fin_form" id="fin_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('fin_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		
		<div class="finance">
			
			<div class="input-block editor-block">
				<label>Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется за счет бюджетных ассигнований федерального бюджета</label>
				<?php 
					wp_editor(
						(isset($field['finBFVolume']) ? $field['finBFVolume'] : ''), 
						'finBFVolume', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finBFVolume',
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
				<label>Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется за счет бюджетов субъектов Российской Федерации</label>
				<?php 
					wp_editor(
						(isset($field['finBRVolume']) ? $field['finBRVolume'] : ''), 
						'finBRVolume', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finBRVolume',
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
				<label>Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется за счет местных бюджетов</label>
				<?php 
					wp_editor(
						(isset($field['finBMVolume']) ? $field['finBMVolume'] : ''), 
						'finBMVolume', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finBMVolume',
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
				<label>Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется по договорам об образовании за счет средств физических и (или) юридических лиц</label>
				<?php 
					wp_editor(
						(isset($field['finPVolume']) ? $field['finPVolume'] : ''), 
						'finPVolume', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finPVolume',
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
				<label>Информация о поступлении и расходовании финансовых и материальных средств</label>
                <br>
                <div><b>Должны быть отображены следующие параметры:</b></div>
                <div>Год отчетности;</div>
                <div>Информация о поступлении финансовых и материальных средств;</div>
                <div>Информация о расходовании финансовых и материальных средств;</div>
				<br>
				<?php 
					wp_editor(
						(isset($field['volume']) ? $field['volume'] : ''), 
						'volume', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'volume',
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
				<label>Копия плана финансово-хозяйственной деятельности</label>               
				<?php 
					wp_editor(
						(isset($field['fhdplan']) ? $field['fhdplan'] : ''), 
						'fhdplan', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'fhdplan',
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
				<button class="form_btn" name="fin_btn" type="submit">Сохранить</button>
			</div>
		</div>	
		
	</form>
</div>
<?php endif; ?>