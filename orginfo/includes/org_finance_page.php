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
				<label>Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов, по договорам об образовании за счет средств физических и (или) юридических лиц</label>
				<?php 
					wp_editor(
						(isset($field['finob']) ? $field['finob'] : ''), 
						'finob', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finob',
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
				<?php 
					wp_editor(
						(isset($field['finpo']) ? $field['finpo'] : ''), 
						'finpo', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finpo',
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