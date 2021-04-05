<?php 

$data = org_platn_page(); 

$error_msg = '<div class="reg-alert">Возможно адрес ссылки введён неверно, либо содержит недопустимые символы!</div>';

?>

<?php // проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-plat">
	<form name="plat_form" id="plat_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('plat_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		
		<div class="platn">
			<div class="input-block editor-block">
				<label>Информация о порядке оказания платных образовательных услуг</label>
				<?php 
					wp_editor(
						(isset($field['paidEdu']) ? $field['paidEdu'] : ''), 
						'paidEdu', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'paidEdu',
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
				<label>Информация об утверждении стоимости обучения по каждой образовательной прграмме</label>
				<?php 
					wp_editor(
						(isset($field['paidPrice']) ? $field['paidPrice'] : ''), 
						'paidPrice', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'paidPrice',
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
				<label>Документ об установлении размера платы, взимаемой с родителей (законных представителей) за присмотр и уход за детьми, осваивающими образовательные программы дошкольного образования в организациях, осуществляющих образовательную деятельность, за содержание детей в образовательной организации, реализующей образовательные программы начального общего, основного общего или среднего общего образования, если в такой образовательной организации созданы условия для проживания обучающихся в интернате, либо за осуществление присмотра и ухода за детьми в группах продленного дня в образовательной организации, реализующей образовательные программы начального общего, основного общего или среднего общего образования</label>
				<?php 
					wp_editor(
						(isset($field['paidParents']) ? $field['paidParents'] : ''), 
						'paidParents', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'paidParents',
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
				<button class="form_btn" name="plat_btn" type="submit">Сохранить</button>
			</div>
		</div>
	</form>
</div>
<?php endif; ?>
