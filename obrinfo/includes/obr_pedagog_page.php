<?php  

$data = obr_pedagog_page();

$nophoto = '/wp-content/plugins/obrinfo/assets/img/no-photo.jpg';

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-ped">
	<form name="ped_form" id="ped_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('ped_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		
		<div class="manage">
			<div class="input-block input_uploader" id="ped_ruc_img">
				<div class="img-preview">
					<img src="<?php echo (isset($field['ped_ruc_url']) && !empty($field['ped_ruc_url'])? $field['ped_ruc_url'] : $nophoto)?>"/>
				</div>
				<label>Фото руководителя</label>
				<input class="doc_id block-hidden" type="text" name="ped_ruc_id" value="<?php echo (isset($field['ped_ruc_id']) ? $field['ped_ruc_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="ped_ruc_url" value="<?php echo (isset($field['ped_ruc_url']) ? $field['ped_ruc_url'] : '')?>">
				<a href="javascript:;" class="doc_upload img link_btn <?php echo (!empty($field['ped_ruc_url']) && !empty($field['ped_ruc_id']) ? 'block-hidden' : '')?>">Загрузить фото</a>
				<a href="javascript:;" class="doc_remove img link_btn <?php echo (!empty($field['ped_ruc_url']) && !empty($field['ped_ruc_id']) ? '' : 'block-hidden')?>">Очистить фото</a>				
			</div>
			<div class="input-block">
				<label>Ф.И.О. руководителя образовательной организации</label>
				<input type="text" class="field" name="ped_name" value="<?php echo (isset($field['ped_name']) ? wp_unslash(htmlspecialchars($field['ped_name'])) : '')?>">
			</div>
			<div class="input-block">
				<label>Должность руководителя образовательной организации</label>
				<input type="text" class="field" name="ped_pos" value="<?php echo (isset($field['ped_pos']) ? wp_unslash(htmlspecialchars($field['ped_pos'])) : '')?>">
			</div>
			<div class="input-block">
				<label>Контактные телефоны руководителя образовательной организации</label>
				<input type="text" class="field" name="ped_tel" value="<?php echo (isset($field['ped_tel']) ? wp_unslash(htmlspecialchars($field['ped_tel'])) : '')?>">
			</div>
			<div class="input-block">
				<label>Адреса электронной почты руководителя образовательной организации</label>
				<input type="text" class="field" name="ped_mail" value="<?php echo (isset($field['ped_mail']) ? wp_unslash(htmlspecialchars($field['ped_mail'])) : '')?>">
			</div>
			
			<div class="sub-title">Заместители руководителя:</div>
			<div class="alert">Обязательно заполните поле "Ф.И.О. заместителя", иначе заместитель не будет отображен на сайте. </div>
			<div class="zam-block">
				<?php if(isset($data['restored']['zam']) && is_array($data['restored']['zam'])) : $zam = $data['restored']['zam']; ?>

				<?php foreach($zam as $key => $val):?>

					<div class="zam_item" id="zam_<?php echo $key?>" name="zam_<?php echo $key?>">
						<div class="input-block input_uploader" id="zam_<?php echo $key?>_img">
							<div class="img-preview">
								<img src="<?php echo (isset($val['url']) && !empty($val['url']) ? $val['url'] : $nophoto)?>"/>
							</div>
							<label>Фото заместителя</label>			
							<input class="doc_id block-hidden" type="text" name="zam[<?php echo $key?>][id]" value="<?php echo (isset($val['id']) ? $val['id'] : '')?>">
							<input class="doc_url" readonly="readonly" type="text" name="zam[<?php echo $key?>][url]" value="<?php echo (isset($val['url']) ? $val['url'] : '')?>">
							<a href="javascript:;" class="doc_upload img link_btn <?php echo (!empty($val['url']) && !empty($val['id']) ? 'block-hidden' : '')?>">Загрузить фото</a>
							<a href="javascript:;" class="doc_remove img link_btn <?php echo (!empty($val['url']) && !empty($val['id']) ? '' : 'block-hidden')?>">Очистить фото</a>		
						</div>
						<div class="input-block">
							<label>Ф.И.О. заместителя руководителя образовательной организации (руководителя филиала)</label>
							<input type="text" name="zam[<?php echo $key?>][name]" class="field" value="<?php echo (isset($val['name']) ? wp_unslash(htmlspecialchars($val['name'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Должность заместителя руководителя образовательной организации (руководителя филиала)</label>
							<input type="text" name="zam[<?php echo $key?>][post]" class="field" value="<?php echo (isset($val['post']) ? wp_unslash(htmlspecialchars($val['post'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Контактные телефоны заместителя руководителя образовательной организации (руководителя филиала)</label>
							<input type="text" name="zam[<?php echo $key?>][tel]" class="field" value="<?php echo (isset($val['tel']) ? wp_unslash(htmlspecialchars($val['tel'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Адреса электронной почты заместителя руководителя образовательной организации (руководителя филиала)</label>
							<input type="text" name="zam[<?php echo $key?>][mail]" class="field" value="<?php echo (isset($val['mail']) ? wp_unslash(htmlspecialchars($val['mail'])) : '')?>">
						</div>
						<a href="javascript:;" class="zam_remove link_remove">Удалить заместителя</a>
					</div>

				<?php endforeach;?>

				<?php else:?>
				
					<div class="zam_item" id="zam_zam_1" name="zam_zam_1">
						<div class="input-block input_uploader" id="zam_zam_1_img">
							<div class="img-preview">
								<img src="<?php echo $nophoto;?>"/>
							</div>
							<label>Фото заместителя</label>			
							<input class="doc_id block-hidden" type="text" name="zam[zam_1][id]" value="">
							<input class="doc_url" readonly="readonly" type="text" name="zam[zam_1][url]" value="">
							<a href="javascript:;" class="doc_upload img link_btn">Загрузить фото</a>
							<a href="javascript:;" class="doc_remove img link_btn block-hidden">Очистить фото</a>		
						</div>
						<div class="input-block">
							<label>Ф.И.О. заместителя руководителя образовательной организации (руководителя филиала)</label>
							<input type="text" name="zam[zam_1][name]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Должность заместителя руководителя образовательной организации (руководителя филиала)</label>
							<input type="text" name="zam[zam_1][post]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Контактные телефоны заместителя руководителя образовательной организации (руководителя филиала)</label>
							<input type="text" name="zam[zam_1][tel]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Адреса электронной почты заместителя руководителя образовательной организации (руководителя филиала)</label>
							<input type="text" name="zam[zam_1][mail]" class="field" value="">
						</div>
						<a href="javascript:;" class="zam_remove link_remove">Удалить заместителя</a>
					</div>

				<?php endif?>
				
				<div id="add_zamblock">
					<input class="form_btn" type="button" value="Добавить заместителя" id="add_zam">
				</div>
			</div>
			
			<div class="sub-title">Педагогические работники:</div>
			<div class="alert">Обязательно заполните поле "Ф.И.О. педагогического работника", иначе педагог не будет отображен на сайте. </div>
			<div class="ped-block">
				<?php if(isset($data['restored']['ped']) && is_array($data['restored']['ped'])) : $ped = $data['restored']['ped']; ?>

				<?php foreach($ped as $pkey => $pval):?>
				
					<div class="ped_item" id="ped_<?php echo $pkey?>" name="ped_<?php echo $pkey?>">
						<div class="input-block input_uploader" id="ped_<?php echo $key?>_img">
							<div class="img-preview">
								<img src="<?php echo (isset($pval['url']) && !empty($pval['url']) ? $pval['url'] : $nophoto)?>"/>
							</div>
							<label>Фото педагога</label>			
							<input class="doc_id block-hidden" type="text" name="ped[<?php echo $pkey?>][id]" value="<?php echo (isset($pval['id']) ? $pval['id'] : '')?>">
							<input class="doc_url" readonly="readonly" type="text" name="ped[<?php echo $pkey?>][url]" value="<?php echo (isset($pval['url']) ? $pval['url'] : '')?>">
							<a href="javascript:;" class="doc_upload img link_btn <?php echo (!empty($pval['url']) && !empty($pval['id']) ? 'block-hidden' : '')?>">Загрузить фото</a>
							<a href="javascript:;" class="doc_remove img link_btn <?php echo (!empty($pval['url']) && !empty($pval['id']) ? '' : 'block-hidden')?>">Очистить фото</a>		
						</div>
						<div class="input-block">
							<label>Ф.И.О. педагогического работника образовательной организации</label>
							<input type="text" name="ped[<?php echo $pkey?>][name]" class="field" value="<?php echo (isset($pval['name']) ? wp_unslash(htmlspecialchars($pval['name'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Занимаемая должность (должности) педагогического работника</label>
							<input type="text" name="ped[<?php echo $pkey?>][post]" class="field" value="<?php echo (isset($pval['post']) ? wp_unslash(htmlspecialchars($pval['post'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Преподаваемые педагогическим работником дисциплины</label>
							<input type="text" name="ped[<?php echo $pkey?>][dis]" class="field" value="<?php echo (isset($pval['dis']) ? wp_unslash(htmlspecialchars($pval['dis'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Ученая степень (или уровень образования) педагогического работника (при наличии)</label>
							<input type="text" name="ped[<?php echo $pkey?>][step]" class="field" value="<?php echo (isset($pval['step']) ? wp_unslash(htmlspecialchars($pval['step'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Ученое звание (или квалификация) педагогического работника (при наличии)</label>
							<input type="text" name="ped[<?php echo $pkey?>][zvan]" class="field" value="<?php echo (isset($pval['zvan']) ? wp_unslash(htmlspecialchars($pval['zvan'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Наименование направления подготовки и (или) специальности педагогического работника</label>
							<input type="text" name="ped[<?php echo $pkey?>][spec]" class="field" value="<?php echo (isset($pval['spec']) ? wp_unslash(htmlspecialchars($pval['spec'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Данные о повышении квалификации и (или) профессиональной переподготовке педагогического работника (при наличии)</label>
							<textarea name="ped[<?php echo $pkey?>][qual]" class="field"><?php echo (isset($pval['qual']) ? wp_unslash(htmlspecialchars($pval['qual'])) : '')?></textarea>
						</div>
						<div class="input-block">
							<label>Общий стаж работы педагогического работника</label>
							<input type="text" name="ped[<?php echo $pkey?>][sum]" class="field" value="<?php echo (isset($pval['sum']) ? wp_unslash(htmlspecialchars($pval['sum'])) : '')?>">
						</div>
						<div class="input-block">
							<label>Стаж работы педагогического работника по специальности</label>
							<input type="text" name="ped[<?php echo $pkey?>][ped]" class="field" value="<?php echo (isset($pval['ped']) ? wp_unslash(htmlspecialchars($pval['ped'])) : '')?>">
						</div>
						<a href="javascript:;" class="ped_remove link_remove">Удалить педагога</a>
					</div>
				
				<?php endforeach;?>
				
				<?php else:?>
				
					<div class="ped_item" id="ped_ped_1" name="ped_ped_1">
						<div class="input-block input_uploader" id="ped_ped_1_img">
							<div class="img-preview">
								<img src="<?php echo $nophoto;?>"/>
							</div>
							<label>Фото педагога</label>			
							<input class="doc_id block-hidden" type="text" name="ped[ped_1][id]" value="">
							<input class="doc_url" readonly="readonly" type="text" name="ped[ped_1][url]" value="">
							<a href="javascript:;" class="doc_upload img link_btn">Загрузить фото</a>
							<a href="javascript:;" class="doc_remove img link_btn block-hidden">Очистить фото</a>		
						</div>
						<div class="input-block">
							<label>Ф.И.О. педагогического работника образовательной организации</label>
							<input type="text" name="ped[ped_1][name]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Занимаемая должность (должности) педагогического работника</label>
							<input type="text" name="ped[ped_1][post]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Преподаваемые педагогическим работником дисциплины</label>
							<input type="text" name="ped[ped_1][dis]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Ученая степень педагогического работника (при наличии)</label>
							<input type="text" name="ped[ped_1][step]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Ученое звание педагогического работника (при наличии)</label>
							<input type="text" name="ped[ped_1][zvan]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Наименование направления подготовки и (или) специальности педагогического работника</label>
							<input type="text" name="ped[ped_1][spec]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Данные о повышении квалификации и (или) профессиональной переподготовке педагогического работника (при наличии)</label>
							<textarea name="ped[ped_1][qual]" class="field"></textarea>
						</div>
						<div class="input-block">
							<label>Общий стаж работы педагогического работника</label>
							<input type="text" name="ped[ped_1][sum]" class="field" value="">
						</div>
						<div class="input-block">
							<label>Стаж работы педагогического работника по специальности</label>
							<input type="text" name="ped[ped_1][ped]" class="field" value="">
						</div>
						<a href="javascript:;" class="ped_remove link_remove">Удалить педагога</a>
					</div>
				
				<?php endif;?>
				<div id="add_pedblock">
					<input class="form_btn" type="button" value="Добавить педагога" id="add_ped">
					<input class="form_btn" type="submit" value="Сохранить" name="ped_btn">
				</div>
			</div>
		</div>	
		
	</form>
</div>
<?php endif; ?>









