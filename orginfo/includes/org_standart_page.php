<?php  

$data = org_standart_page();

$error_msg = '<div class="reg-alert">Возможно адрес ссылки введён неверно, либо содержит недопустимые символы!</div>';?>

<div class="alert">Адрес ссылки следует вводить полностью, включая начало адреса, такое как <b>"http://"</b>, <b>"https://"</b> и т.д..</div>

<?php // проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-stand">
	<form name="stand_form" id="stand_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('stand_form');
			}
		?>
		
		<div class="links">
			<div class="links-title">Ссылки на копии федеральных государственных образовательных стандартов</div>
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored'])) : $field = $data['restored'];
			
		?>
			
		<?php foreach($field as $key => $val):?>
			
			<div class="stand_item" name="stand_<?php echo $key?>" id="stand_<?php echo $key?>">
				<?php 
					if(isset($val['link']) && !empty($val['link']))
					{
						if(!org_check_url($val['link']))
						{
							echo $error_msg;
						}
					}
				?>
				<div class="input-block">
					<input placeholder="Заголовок ссылки" class="doc_name" type="text" name="stand[<?php echo $key?>][name]" value="<?php echo (isset($val['name']) ? wp_unslash(htmlspecialchars($val['name'])) : '')?>">
					<input type="text" name="stand[<?php echo $key?>][link]" value="<?php echo (isset($val['link']) ? $val['link'] : '')?>" placeholder="Ссылка">
				</div>
				<a href="javascript:;" class="stand_remove link_remove">Удалить ссылку</a>
			</div>
			
		<?php endforeach;?>	
			
		<?php else:?>
			<div class="stand_item" name="stand_links_1" id="stand_links_1">
				<div class="input-block">
					<input placeholder="Заголовок ссылки" class="doc_name" type="text" name="stand[links_1][name]" value="">
					<input type="text" name="stand[links_1][link]" value="" placeholder="Ссылка">
				</div>
				<a href="javascript:;" class="stand_remove link_remove">Удалить ссылку</a>
			</div>
		<?php endif;?>
			<div id="add_stand">
				<input class="form_btn" type="button" value="Добавить ссылку на документ" id="add_link">
				<input class="form_btn" type="submit" value="Сохранить" name="stand_btn">
			</div>
		</div>	
		
	</form>
</div>
<?php endif; ?>
