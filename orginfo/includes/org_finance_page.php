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
				<label>Сведения об объёме образовательной деятельности, финансовое обеспечение которой осуществляется за счёт <u>бюджетных ассигнований федерального бюджета</u></label>
				<?php 
					wp_editor(
						(isset($field['finfb']) ? $field['finfb'] : ''), 
						'finfb', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finfb',
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
				<label>Сведения об объёме образовательной деятельности, финансовое обеспечение которой осуществляется за счёт <u>бюджетов субъектов Российской Федерации</u></label>
				<?php 
					wp_editor(
						(isset($field['finbr']) ? $field['finbr'] : ''), 
						'finbr', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finbr',
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
				<label>Сведения об объёме образовательной деятельности, финансовое обеспечение которой осуществляется за счёт <u>местных бюджетов</u></label>
				<?php 
					wp_editor(
						(isset($field['finmb']) ? $field['finmb'] : ''), 
						'finmb', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finmb',
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
				<label>Сведения об объёме образовательной деятельности, финансовое обеспечение которой осуществляется по договорам об образовании за счёт <u>средств физических и (или) юридических лиц</u></label>
				<?php 
					wp_editor(
						(isset($field['finfiz']) ? $field['finfiz'] : ''), 
						'finfiz', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finfiz',
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
				<label>Сведения о поступлении и расходовании финансовых и материальных средств</label>
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
			
			<div class="input-block editor-block">
				<label>Ссылки на копии планов финансово-хозяйственной деятельности</label>
				<?php 
					wp_editor(
						(isset($field['finplan']) ? $field['finplan'] : ''), 
						'finplan', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'finplan',
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