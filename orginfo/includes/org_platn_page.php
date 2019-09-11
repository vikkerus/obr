<?php 

$data = org_platn_page(); 

$error_msg = '<div class="reg-alert">Возможно адрес ссылки введён неверно, либо содержит недопустимые символы!</div>';

?>

<div class="alert">
	Вставьте ссылку на документ в поле "Ссылка на ...." <b>ИЛИ</b> загрузите документ, кликнув на кнопку "Загрузить документ".
	<br>
	Адрес ссылки следует вводить полностью, включая начало адреса, такое как <b>"http://"</b>, <b>"https://"</b> и т.д..
</div>

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
			<div class="plat-title">Документы о порядке оказания платных образовательных услуг, в том числе образец договора об оказании платных образовательных услуг, документ об утверждении стоимости обучения по каждой образовательной программе</div>
			<?php if(isset($data['restored']['plat']) && is_array($data['restored']['plat'])) : $plat = $data['restored']['plat']; ?>
				
			<?php foreach($plat as $key => $val):?>
			<div class="plat_item" id="plat_<?php echo $key?>" name="plat_<?php echo $key?>">
				<div class="input-block" id="doc_plat_<?php echo $key?>">
					<?php 
						if(isset($val['docs_plat_link']) && !empty($val['docs_plat_link']))
						{
							if(!org_check_url($val['docs_plat_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<div class="plat-link">
						<input placeholder="Ссылка на копию документа" class="field" type="text" name="plat[<?php echo $key?>][docs_plat_link]" value="<?php echo (isset($val['docs_plat_link']) ? $val['docs_plat_link'] : '')?>">
					</div>
					<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="plat[<?php echo $key?>][docs_plat_name]" value="<?php echo (isset($val['docs_plat_name']) ? wp_unslash(htmlspecialchars($val['docs_plat_name'])) : '')?>">
					<input class="doc_id block-hidden" type="text" name="plat[<?php echo $key?>][docs_plat_id]" value="<?php echo (isset($val['docs_plat_id']) ? $val['docs_plat_id'] : '')?>">
					<input class="doc_url" readonly="readonly" type="text" name="plat[<?php echo $key?>][docs_plat_url]" value="<?php echo (isset($val['docs_plat_url']) ? $val['docs_plat_url'] : '')?>">
					<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($val['docs_plat_url']) && !empty($val['docs_plat_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
					<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($val['docs_plat_url']) && !empty($val['docs_plat_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
				</div>
				<a href="javascript:;" class="plat_remove link_remove">Удалить документ</a>
			</div>
			<?php endforeach;?>
			<?php else:?>
			<div class="plat_item" id="plat_plat_1" name="plat_plat_1">
				<div class="input-block" id="doc_plat_plat_1">
					<div class="plat-link">
						<input placeholder="Ссылка на копию документа" class="field" type="text" name="plat[plat_1][docs_plat_link]" value="">
					</div>
					<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="plat[plat_1][docs_plat_name]" value="">
					<input class="doc_id block-hidden" type="text" name="plat[plat_1][docs_plat_id]" value="">
					<input class="doc_url" readonly="readonly" type="text" name="plat[plat_1][docs_plat_url]" value="">
					<a href="javascript:;" class="doc_upload link_btn">Загрузить документ</a>
					<a href="javascript:;" class="doc_remove link_btn block-hidden">Очистить документ</a>
				</div>
				<a href="javascript:;" class="plat_remove link_remove">Удалить документ</a>
			</div>
			<?php endif;?>
			<div id="add_plat">
				<input class="form_btn" type="button" value="Добавить документ" id="clone_plat">
				<button class="form_btn" name="plat_btn" type="submit">Сохранить</button>
			</div>
		</div>	
	</form>
</div>
<?php endif; ?>
