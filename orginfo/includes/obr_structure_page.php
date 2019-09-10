<?php 

$data = obr_structure_page();

$nophoto = '/wp-content/plugins/orginfo/assets/img/no-photo.jpg';

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>

<div class="page-struct">
	<form name="struct_form" id="struct_form" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>" method="post">

		<?php 
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('struct_form');
			}
		?>

		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		<div class="struct-image-block">
			<div class="input-block input_uploader" id="struct_img">
				<div class="img-preview">
					<img src="<?php echo (isset($field['struct_img_url']) && !empty($field['struct_img_url'])? $field['struct_img_url'] : $nophoto)?>"/>
				</div>
				<label>Изображение схемы структуры</label>
				<input class="doc_id block-hidden" type="text" name="struct_img_id" value="<?php echo (isset($field['struct_img_id']) ? $field['struct_img_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="struct_img_url" value="<?php echo (isset($field['struct_img_url']) ? $field['struct_img_url'] : '')?>">
				<a href="javascript:;" class="doc_upload img link_btn <?php echo (!empty($field['struct_img_url']) && !empty($field['struct_img_id']) ? 'block-hidden' : '')?>">Загрузить фото</a>
				<a href="javascript:;" class="doc_remove img link_btn <?php echo (!empty($field['struct_img_url']) && !empty($field['struct_img_id']) ? '' : 'block-hidden')?>">Очистить фото</a>				
			</div>
		</div>
		<div class="alert">Обязательно заполните поле "Наименование структурного подразделения" (при наличии подразделения), иначе подразделение не будет отображено на сайте. </div>
		<?php if(isset($data['restored']['structs']) && is_array($data['restored']['structs'])) : $structs = $data['restored']['structs']; ?>
		
			<?php foreach($structs as $key => $val):?>

			<div class="struct_item" name="struct_<?php echo $key?>" id="struct_<?php echo $key?>">
				<div class="input-block">
					<label>Наименование структурного подразделения (органа управления)</label>
					<input type="text" name="structs[<?php echo $key?>][name]" class="field" value="<?php echo (isset($val['name']) ? wp_unslash(htmlspecialchars($val['name'])) : '')?>">
				</div>
				<div class="input-block">
					<label>Информация о руководителе структурного подразделения</label>
					<input type="text" name="structs[<?php echo $key?>][fio]" class="field" value="<?php echo (isset($val['fio']) ? wp_unslash(htmlspecialchars($val['fio'])) : '')?>">
				</div>
				<div class="input-block">
					<label>Информация о месте нахождения структурного подразделения</label>
					<input type="text" name="structs[<?php echo $key?>][place]" class="field" value="<?php echo (isset($val['place']) ? wp_unslash(htmlspecialchars($val['place'])) : '')?>">
				</div>
				<div class="input-block">
					<label>Информация об адресе официального сайта в сети «Интернет» структурного подразделения (при наличии)</label>
					<input type="text" name="structs[<?php echo $key?>][site]" class="field" value="<?php echo (isset($val['site']) ? wp_unslash(htmlspecialchars($val['site'])) : '')?>">
				</div>
				<div class="input-block">
					<label>Информация об адресах электронной почты структурного подразделения (при наличии)</label>
					<input type="text" name="structs[<?php echo $key?>][mail]" class="field" value="<?php echo (isset($val['mail']) ? wp_unslash(htmlspecialchars($val['mail'])) : '')?>">
				</div>
				<div class="input-block input_uploader" id="input_<?php echo $key?>">
					<label>Сведения о наличии положения о структурном подразделениии (об органе управления) с приложением копии указанного положения (при его наличии)</label>
					<input placeholder="Заголовок документа" class="doc_name" type="text" name="structs[<?php echo $key?>][docs_name]" value="<?php echo (isset($val['docs_name']) ? wp_unslash(htmlspecialchars($val['docs_name'])) : '')?>">
					<input class="doc_id block-hidden" type="text" name="structs[<?php echo $key?>][docs]" value="<?php echo (isset($val['docs']) ? $val['docs'] : '')?>">	
					<input class="doc_url" readonly="readonly" type="text" name="structs[<?php echo $key?>][url]" value="<?php echo (isset($val['url']) ? $val['url'] : '')?>">
					<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($val['url']) && !empty($val['docs']) ? 'block-hidden' : '')?>">Загрузить документ</a>
					<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($val['url']) && !empty($val['docs']) ? '' : 'block-hidden')?>">Очистить документ</a>
				</div>
				<a href="javascript:;" class="struct_remove link_remove">Удалить структурное подразделение</a>
			</div>

			<?php endforeach;?>


		<?php else:?>

		<div class="struct_item" id="struct_struct_1" name="struct_struct_1">
			<div class="input-block">
				<label>Наименование структурного подразделения (органа управления)</label>
				<input type="text" name="structs[struct_1][name]" class="field">
			</div>
			<div class="input-block">
				<label>Информация о руководителе структурного подразделения</label>
				<input type="text" name="structs[struct_1][fio]" class="field">
			</div>
			<div class="input-block">
				<label>Информация о месте нахождения структурного подразделения</label>
				<input type="text" name="structs[struct_1][place]" class="field">
			</div>
			<div class="input-block">
				<label>Информация об адресе официального сайта в сети «Интернет» структурного подразделения (при наличии)</label>
				<input type="text" name="structs[struct_1][site]" class="field">
			</div>
			<div class="input-block">
				<label>Информация об адресах электронной почты структурного подразделения (при наличии)</label>
				<input type="text" name="structs[struct_1][mail]" class="field">
			</div>
			<div class="input-block input_uploader" id="input_struct_1">
				<label>Сведения о наличии положения о структурном подразделении (об органе управления) с приложением копии указанного положения (при его наличии)</label>	
				<input placeholder="Заголовок документа" class="doc_name" type="text" name="structs[struct_1][docs_name]" value="">
				<input class="doc_id block-hidden" type="text" name="structs[struct_1][docs]" value="">
				<input class="doc_url" readonly="readonly" type="text" name="structs[struct_1][url]" value="">
				<a href="javascript:;" class="doc_upload link_btn">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn block-hidden">Очистить документ</a>
			</div>	
			<a href="javascript:;" class="struct_remove link_remove">Удалить структурное подразделение</a>
		</div>
		<?php endif;?>
		<div id="add_block">
			<input class="form_btn" type="button" value="Добавить подразделение" id="add_struct">
			<input class="form_btn" type="submit" value="Сохранить" name="struct_btn">
		</div>
	</form>
</div>
<?php endif;?>





