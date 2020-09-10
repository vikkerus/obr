<?php  

$data = org_documents_page();

$error_msg = '<div class="reg-alert">Возможно адрес ссылки введён неверно, либо содержит недопустимые символы!</div>';

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>
<div class="page-docs">
	<form name="docs_form" id="docs_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">

		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('docs_form');
			}
		?>
		
		<?php 
			// проверяем наличие в массиве элемента restored
			if(isset($data['restored']) && is_array($data['restored']))
			{
				$field = $data['restored'];
			}
		?>
		<div class="fhd-text alert">
			Вставьте ссылку на документ в поле "Ссылка на ...." <b>ИЛИ</b> загрузите документ, кликнув на кнопку "Загрузить документ".
			<br>
			Адрес ссылки следует вводить полностью, включая начало адреса, такое как <b>"http://"</b>, <b>"https://"</b> и т.д..
		</div>
		<div class="uploads">
			<div class="input-block" id="doc_input_1">
				<div class="fhd-link">
					<label>Ссылка на копию устава</label>
					<?php 
						if(isset($field['docs_ust_link']) && !empty($field['docs_ust_link']))
						{
							if(!org_check_url($field['docs_ust_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_ust_link" value="<?php echo (isset($field['docs_ust_link']) ? $field['docs_ust_link'] : '')?>">
				</div>
				<label>Копия устава образовательной организации</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_ust_name" value="<?php echo (isset($field['docs_ust_name']) ? wp_unslash(htmlspecialchars($field['docs_ust_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_ust_id" value="<?php echo (isset($field['docs_ust_id']) ? $field['docs_ust_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_ust_url" value="<?php echo (isset($field['docs_ust_url']) ? $field['docs_ust_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_ust_url']) && !empty($field['docs_ust_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_ust_url']) && !empty($field['docs_ust_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_2">
				<div class="fhd-link">
					<label>Ссылка на копию лицензии</label>
					<?php 
						if(isset($field['docs_lic_link']) && !empty($field['docs_lic_link']))
						{
							if(!org_check_url($field['docs_lic_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_lic_link" value="<?php echo (isset($field['docs_lic_link']) ? $field['docs_lic_link'] : '')?>">
				</div>
				<label>Копия лицензии на осуществление образовательной деятельности (с приложениями)</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_lic_name" value="<?php echo (isset($field['docs_lic_name']) ? wp_unslash(htmlspecialchars($field['docs_lic_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_lic_id" value="<?php echo (isset($field['docs_lic_id']) ? $field['docs_lic_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_lic_url" value="<?php echo (isset($field['docs_lic_url']) ? $field['docs_lic_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_lic_url']) && !empty($field['docs_lic_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_lic_url']) && !empty($field['docs_lic_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_3">
				<div class="fhd-link">
					<label>Ссылка на копию свидетельства</label>
					<?php 
						if(isset($field['docs_accr_link']) && !empty($field['docs_accr_link']))
						{
							if(!org_check_url($field['docs_accr_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_accr_link" value="<?php echo (isset($field['docs_accr_link']) ? $field['docs_accr_link'] : '')?>">
				</div>
				<label>Копия свидетельства о государственной аккредитации (с приложениями)</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_accr_name" value="<?php echo (isset($field['docs_accr_name']) ? wp_unslash(htmlspecialchars($field['docs_accr_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_accr_id" value="<?php echo (isset($field['docs_accr_id']) ? $field['docs_accr_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_accr_url" value="<?php echo (isset($field['docs_accr_url']) ? $field['docs_accr_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_accr_url']) && !empty($field['docs_accr_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_accr_url']) && !empty($field['docs_accr_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_4">
				<div class="fhd-link">
					<label>Ссылка на копию акта, регламентирующего правила приема обучающихся</label>
					<?php 
						if(isset($field['docs_priem_link']) && !empty($field['docs_priem_link']))
						{
							if(!org_check_url($field['docs_priem_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_priem_link" value="<?php echo (isset($field['docs_priem_link']) ? $field['docs_priem_link'] : '')?>">
				</div>
				<label>Копия локального нормативного акта, регламентирующего правила приема обучающихся</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_priem_name" value="<?php echo (isset($field['docs_priem_name']) ? wp_unslash(htmlspecialchars($field['docs_priem_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_priem_id" value="<?php echo (isset($field['docs_priem_id']) ? $field['docs_priem_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_priem_url" value="<?php echo (isset($field['docs_priem_url']) ? $field['docs_priem_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_priem_url']) && !empty($field['docs_priem_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_priem_url']) && !empty($field['docs_priem_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_5">
				<div class="fhd-link">
					<label>Ссылка на копию акта, регламентирующего режим занятий обучающихся</label>
					<?php 
						if(isset($field['docs_zan_link']) && !empty($field['docs_zan_link']))
						{
							if(!org_check_url($field['docs_zan_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_zan_link" value="<?php echo (isset($field['docs_zan_link']) ? $field['docs_zan_link'] : '')?>">
				</div>
				<label>Копия локального нормативного акта, регламентирующего режим занятий обучающихся</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_zan_name" value="<?php echo (isset($field['docs_zan_name']) ? wp_unslash(htmlspecialchars($field['docs_zan_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_zan_id" value="<?php echo (isset($field['docs_zan_id']) ? $field['docs_zan_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_zan_url" value="<?php echo (isset($field['docs_zan_url']) ? $field['docs_zan_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_zan_url']) && !empty($field['docs_zan_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_zan_url']) && !empty($field['docs_zan_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_6">
				<div class="fhd-link">
					<label>Ссылка на копию акта, регламентирующего формы, периодичность и порядок текущего контроля успеваемости и промежуточной аттестации обучающихся</label>
					<?php 
						if(isset($field['docs_att_link']) && !empty($field['docs_att_link']))
						{
							if(!org_check_url($field['docs_att_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_att_link" value="<?php echo (isset($field['docs_att_link']) ? $field['docs_att_link'] : '')?>">
				</div>
				<label>Копия локального нормативного акта, регламентирующего формы, периодичность и порядок текущего контроля успеваемости и промежуточной аттестации обучающихся</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_att_name" value="<?php echo (isset($field['docs_att_name']) ? wp_unslash(htmlspecialchars($field['docs_att_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_att_id" value="<?php echo (isset($field['docs_att_id']) ? $field['docs_att_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_att_url" value="<?php echo (isset($field['docs_att_url']) ? $field['docs_att_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_att_url']) && !empty($field['docs_att_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_att_url']) && !empty($field['docs_att_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_7">
				<div class="fhd-link">
					<label>Ссылка на копию акта, регламентирующего порядок и основания перевода, отчисления и восстановления обучающихся</label>
					<?php 
						if(isset($field['docs_per_link']) && !empty($field['docs_per_link']))
						{
							if(!org_check_url($field['docs_per_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_per_link" value="<?php echo (isset($field['docs_per_link']) ? $field['docs_per_link'] : '')?>">
				</div>
				<label>Копия локального нормативного акта, регламентирующего порядок и основания перевода, отчисления и восстановления обучающихся</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_per_name" value="<?php echo (isset($field['docs_per_name']) ? wp_unslash(htmlspecialchars($field['docs_per_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_per_id" value="<?php echo (isset($field['docs_per_id']) ? $field['docs_per_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_per_url" value="<?php echo (isset($field['docs_per_url']) ? $field['docs_per_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_per_url']) && !empty($field['docs_per_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_per_url']) && !empty($field['docs_per_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_8">
				<div class="fhd-link">
					<label>Ссылка на копию акта, регламентирующего порядок оформления возникновения, приостановления и прекращения отношений между образовательной организацией и обучающимися и (или) родителями (законными представителями) несовершеннолетних обучающихся</label>
					<?php 
						if(isset($field['docs_voz_link']) && !empty($field['docs_voz_link']))
						{
							if(!org_check_url($field['docs_voz_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_voz_link" value="<?php echo (isset($field['docs_voz_link']) ? $field['docs_voz_link'] : '')?>">
				</div>
				<label>Копия локального нормативного акта, регламентирующего порядок оформления возникновения, приостановления и прекращения отношений между образовательной организацией и обучающимися и (или) родителями (законными представителями) несовершеннолетних обучающихся</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_voz_name" value="<?php echo (isset($field['docs_voz_name']) ? wp_unslash(htmlspecialchars($field['docs_voz_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_voz_id" value="<?php echo (isset($field['docs_voz_id']) ? $field['docs_voz_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_voz_url" value="<?php echo (isset($field['docs_voz_url']) ? $field['docs_voz_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_voz_url']) && !empty($field['docs_voz_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_voz_url']) && !empty($field['docs_voz_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>	
			<div class="input-block" id="doc_input_9">
				<div class="fhd-link">
					<label>Ссылка на копию правил внутреннего распорядка обучающихся</label>
					<?php 
						if(isset($field['docs_stud_link']) && !empty($field['docs_stud_link']))
						{
							if(!org_check_url($field['docs_stud_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_stud_link" value="<?php echo (isset($field['docs_stud_link']) ? $field['docs_stud_link'] : '')?>">
				</div>
				<label>Копия правил внутреннего распорядка обучающихся</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_stud_name" value="<?php echo (isset($field['docs_stud_name']) ? wp_unslash(htmlspecialchars($field['docs_stud_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_stud_id" value="<?php echo (isset($field['docs_stud_id']) ? $field['docs_stud_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_stud_url" value="<?php echo (isset($field['docs_stud_url']) ? $field['docs_stud_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_stud_url']) && !empty($field['docs_stud_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_stud_url']) && !empty($field['docs_stud_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_10">
				<div class="fhd-link">
					<label>Ссылка на копию правил внутреннего трудового распорядка</label>
					<?php 
						if(isset($field['docs_ord_link']) && !empty($field['docs_ord_link']))
						{
							if(!org_check_url($field['docs_ord_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_ord_link" value="<?php echo (isset($field['docs_ord_link']) ? $field['docs_ord_link'] : '')?>">
				</div>
				<label>Копия правил внутреннего трудового распорядка</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_ord_name" value="<?php echo (isset($field['docs_ord_name']) ? wp_unslash(htmlspecialchars($field['docs_ord_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_ord_id" value="<?php echo (isset($field['docs_ord_id']) ? $field['docs_ord_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_ord_url" value="<?php echo (isset($field['docs_ord_url']) ? $field['docs_ord_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_ord_url']) && !empty($field['docs_ord_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_ord_url']) && !empty($field['docs_ord_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_11">
				<div class="fhd-link">
					<label>Ссылка на копию коллективного договора</label>
					<?php 
						if(isset($field['docs_col_link']) && !empty($field['docs_col_link']))
						{
							if(!org_check_url($field['docs_col_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_col_link" value="<?php echo (isset($field['docs_col_link']) ? $field['docs_col_link'] : '')?>">
				</div>
				<label>Копия коллективного договора</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_col_name" value="<?php echo (isset($field['docs_col_name']) ? wp_unslash(htmlspecialchars($field['docs_col_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_col_id" value="<?php echo (isset($field['docs_col_id']) ? $field['docs_col_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_col_url" value="<?php echo (isset($field['docs_col_url']) ? $field['docs_col_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_col_url']) && !empty($field['docs_col_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_col_url']) && !empty($field['docs_col_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_12">
				<div class="fhd-link">
					<label>Ссылка на копию акта, регламентирующего размер платы за пользование жилым помещением и коммунальные услуги в общежитии</label>
					<?php 
						if(isset($field['docs_pom_link']) && !empty($field['docs_pom_link']))
						{
							if(!org_check_url($field['docs_pom_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_pom_link" value="<?php echo (isset($field['docs_pom_link']) ? $field['docs_pom_link'] : '')?>">
				</div>
				<label>Копия локального нормативного акта, регламентирующего размер платы за пользование жилым помещением и коммунальные услуги в общежитии</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_pom_name" value="<?php echo (isset($field['docs_pom_name']) ? wp_unslash(htmlspecialchars($field['docs_pom_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_pom_id" value="<?php echo (isset($field['docs_pom_id']) ? $field['docs_pom_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_pom_url" value="<?php echo (isset($field['docs_pom_url']) ? $field['docs_pom_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_pom_url']) && !empty($field['docs_pom_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_pom_url']) && !empty($field['docs_pom_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			<div class="input-block" id="doc_input_13">
				<div class="fhd-link">
					<label>Ссылка на копию документа о порядке оказания платных образовательных услуг</label>
					<?php 
						if(isset($field['docs_paid_link']) && !empty($field['docs_paid_link']))
						{
							if(!org_check_url($field['docs_paid_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_paid_link" value="<?php echo (isset($field['docs_paid_link']) ? $field['docs_paid_link'] : '')?>">
				</div>
				<label>Документ о порядке оказания платных образовательных услуг</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_paid_name" value="<?php echo (isset($field['docs_paid_name']) ? wp_unslash(htmlspecialchars($field['docs_paid_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_paid_id" value="<?php echo (isset($field['docs_paid_id']) ? $field['docs_paid_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_paid_url" value="<?php echo (isset($field['docs_paid_url']) ? $field['docs_paid_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_paid_url']) && !empty($field['docs_paid_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_paid_url']) && !empty($field['docs_paid_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			
			
			<div class="input-block" id="doc_input_14">
				<div class="fhd-link">
					<label>Ссылка на образец договора об оказании платных образовательных услуг</label>
					<?php 
						if(isset($field['docs_paid_dog_link']) && !empty($field['docs_paid_dog_link']))
						{
							if(!org_check_url($field['docs_paid_dog_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_paid_dog_link" value="<?php echo (isset($field['docs_paid_dog_link']) ? $field['docs_paid_dog_link'] : '')?>">
				</div>
				<label>Образец договора об оказании платных образовательных услуг</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_paid_dog_name" value="<?php echo (isset($field['docs_paid_dog_name']) ? wp_unslash(htmlspecialchars($field['docs_paid_dog_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_paid_dog_id" value="<?php echo (isset($field['docs_paid_dog_id']) ? $field['docs_paid_dog_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_paid_dog_url" value="<?php echo (isset($field['docs_paid_dog_url']) ? $field['docs_paid_dog_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_paid_dog_url']) && !empty($field['docs_paid_dog_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_paid_dog_url']) && !empty($field['docs_paid_dog_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
            
            
            
            
            <div class="input-block" id="doc_input_20">
				<div class="fhd-link">
					<label>Ссылка на копию документа об установлении размера платы, взимаемой с родителей (законных представителей) за присмотр и уход  задетьми, осваивающими  образовательные программы дошкольного образования в организациях, осуществляющих  образовательную деятельность,  за содержание  детей  в образовательной  организации, реализующей образовательные программы начального общего,  основного общего или  среднего  общего образования,   если   в   такой   образовательной организации  созданы   условия для  проживанияобучающихся  в  интернате,  либо за  осуществление присмотра и ухода за детьми в группах продленного дня  в  образовательной организации,  реализующей образовательные программы  начального  общего, основного общего или среднего общего образования</label>
					<?php 
						if(isset($field['docs_paid_parent_link']) && !empty($field['docs_paid_parent_link']))
						{
							if(!org_check_url($field['docs_paid_parent_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_paid_parent_link" value="<?php echo (isset($field['docs_paid_parent_link']) ? $field['docs_paid_parent_link'] : '')?>">
				</div>
				<label>Документ об установлении размера платы, взимаемой с родителей (законных представителей) за присмотр и уход  задетьми, осваивающими  образовательные программы дошкольного образования в организациях, осуществляющих  образовательную деятельность,  за содержание  детей  в образовательной  организации, реализующей образовательные программы начального общего,  основного общего или  среднего  общего образования,   если   в   такой   образовательной организации  созданы   условия для  проживанияобучающихся  в  интернате,  либо за  осуществление присмотра и ухода за детьми в группах продленного дня  в  образовательной организации,  реализующей образовательные программы  начального  общего, основного общего или среднего общего образования</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_paid_parent_name" value="<?php echo (isset($field['docs_paid_parent_name']) ? wp_unslash(htmlspecialchars($field['docs_paid_parent_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_paid_parent_id" value="<?php echo (isset($field['docs_paid_parent_id']) ? $field['docs_paid_parent_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_paid_parent_url" value="<?php echo (isset($field['docs_paid_parent_url']) ? $field['docs_paid_parent_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_paid_parent_url']) && !empty($field['docs_paid_parent_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_paid_parent_url']) && !empty($field['docs_paid_parent_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
            
            
			
			
			<div class="input-block" id="doc_input_15">
				<div class="fhd-link">
					<label>Ссылка на документ об утверждении стоимости обучения каждой образовательной программе</label>
					<?php 
						if(isset($field['docs_paid_uch_link']) && !empty($field['docs_paid_uch_link']))
						{
							if(!org_check_url($field['docs_paid_uch_link']))
							{
								echo $error_msg;
							}
						}
					?>
					<input class="field" type="text" name="docs_paid_uch_link" value="<?php echo (isset($field['docs_paid_uch_link']) ? $field['docs_paid_uch_link'] : '')?>">
				</div>
				<label>Документ об утверждении стоимости обучения каждой образовательной программе</label>
				<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="docs_paid_uch_name" value="<?php echo (isset($field['docs_paid_uch_name']) ? wp_unslash(htmlspecialchars($field['docs_paid_uch_name'])) : '')?>">
				<input class="doc_id block-hidden" type="text" name="docs_paid_uch_id" value="<?php echo (isset($field['docs_paid_uch_id']) ? $field['docs_paid_uch_id'] : '')?>">
				<input class="doc_url" readonly="readonly" type="text" name="docs_paid_uch_url" value="<?php echo (isset($field['docs_paid_uch_url']) ? $field['docs_paid_uch_url'] : '')?>">
				<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($field['docs_paid_uch_url']) && !empty($field['docs_paid_uch_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
				<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($field['docs_paid_uch_url']) && !empty($field['docs_paid_uch_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
			</div>
			
			<!-----------------ФХД-------------------->
			<div class="sub-title">План ФХД:</div>

			<div class="fhd">
				<?php if(isset($data['restored']['fhd']) && is_array($data['restored']['fhd'])) : $fhd = $data['restored']['fhd']; ?>
				
				<?php foreach($fhd as $fkey => $fval):?>
				<div class="fhd_item" id="fhd_<?php echo $fkey?>" name="fhd_<?php echo $fkey?>">
					<div class="input-block" id="doc_fhd_<?php echo $fkey?>">
						<div class="fhd-link">
							<label>Ссылка на план ФХД</label>
							<?php 
								if(isset($fval['docs_fhd_link']) && !empty($fval['docs_fhd_link']))
								{
									if(!org_check_url($fval['docs_fhd_link']))
									{
										echo $error_msg;
									}
								}
							?>
							<input class="field" type="text" name="fhd[<?php echo $fkey?>][docs_fhd_link]" value="<?php echo (isset($fval['docs_fhd_link']) ? $fval['docs_fhd_link'] : '')?>">
						</div>
						<label>Копия плана финансово-хозяйственной деятельности образовательной организации, утвержденного в установленном законодательством Российской Федерации порядке, или бюджетных смет образовательной организации</label>
						<input placeholder="Заголовок документа или ссылки или ссылки" class="doc_name" type="text" name="fhd[<?php echo $fkey?>][docs_fhd_name]" value="<?php echo (isset($fval['docs_fhd_name']) ? wp_unslash(htmlspecialchars($fval['docs_fhd_name'])) : '')?>">
						<input class="doc_id block-hidden" type="text" name="fhd[<?php echo $fkey?>][docs_fhd_id]" value="<?php echo (isset($fval['docs_fhd_id']) ? $fval['docs_fhd_id'] : '')?>">
						<input class="doc_url" readonly="readonly" type="text" name="fhd[<?php echo $fkey?>][docs_fhd_url]" value="<?php echo (isset($fval['docs_fhd_url']) ? $fval['docs_fhd_url'] : '')?>">
						<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($fval['docs_fhd_url']) && !empty($fval['docs_fhd_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($fval['docs_fhd_url']) && !empty($fval['docs_fhd_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
					</div>
					<a href="javascript:;" class="fhd_remove link_remove">Удалить план</a>
				</div>
				<?php endforeach;?>
				<?php else:?>
				<div class="fhd_item" id="fhd_fhd_1" name="fhd_fhd_1">
					<div class="fhd-link">
						<label>Ссылка на план ФХД</label>
						<input class="field" type="text" name="fhd[fhd_1][docs_fhd_link]" value="">
					</div>
					<div class="input-block" id="doc_fhd_fhd_1">
						<label>Копия плана финансово-хозяйственной деятельности образовательной организации, утвержденного в установленном законодательством Российской Федерации порядке, или бюджетных смет образовательной организации</label>
						<input placeholder="Заголовок документа или ссылки или ссылки" class="doc_name" type="text" name="fhd[fhd_1][docs_fhd_name]" value="">
						<input class="doc_id block-hidden" type="text" name="fhd[fhd_1][docs_fhd_id]" value="">
						<input class="doc_url" readonly="readonly" type="text" name="fhd[fhd_1][docs_fhd_url]" value="">
						<a href="javascript:;" class="doc_upload link_btn">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn block-hidden">Очистить документ</a>
					</div>
					<a href="javascript:;" class="fhd_remove link_remove">Удалить план</a>
				</div>
				<?php endif;?>
				<div id="add_fhd">
					<input class="form_btn" type="button" value="Добавить план ФХД" id="clone_fhd">
				</div>
			</div>
			
			
			
			<!-----------------Самообследование-------------------->
			<div class="sub-title">Самообследования:</div>
			
			<div class="samoob">
				<?php if(isset($data['restored']['sam']) && is_array($data['restored']['sam'])) : $sam = $data['restored']['sam']; ?>
				
				<?php foreach($sam as $skey => $sval):?>
				<div class="sam_item" id="sam_<?php echo $skey?>" name="sam_<?php echo $skey?>">
					<div class="input-block" id="doc_sam_<?php echo $skey?>">
						<div class="fhd-link">
							<label>Ссылка на результаты самообследования</label>
							<?php 
								if(isset($sval['docs_sam_link']) && !empty($sval['docs_sam_link']))
								{
									if(!org_check_url($sval['docs_sam_link']))
									{
										echo $error_msg;
									}
								}
							?>
							<input class="field" type="text" name="sam[<?php echo $skey?>][docs_sam_link]" value="<?php echo (isset($sval['docs_sam_link']) ? $sval['docs_sam_link'] : '')?>">
						</div>
						<label>Отчет о результатах самообследования</label>
						<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="sam[<?php echo $skey?>][docs_sam_name]" value="<?php echo (isset($sval['docs_sam_name']) ? wp_unslash(htmlspecialchars($sval['docs_sam_name'])) : '')?>">
						<input class="doc_id block-hidden" type="text" name="sam[<?php echo $skey?>][docs_sam_id]" value="<?php echo (isset($sval['docs_sam_id']) ? $sval['docs_sam_id'] : '')?>">
						<input class="doc_url" readonly="readonly" type="text" name="sam[<?php echo $skey?>][docs_sam_url]" value="<?php echo (isset($sval['docs_sam_url']) ? $sval['docs_sam_url'] : '')?>">
						<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($sval['docs_sam_url']) && !empty($sval['docs_sam_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($sval['docs_sam_url']) && !empty($sval['docs_sam_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
					</div>
					<a href="javascript:;" class="sam_remove link_remove">Удалить отчёт</a>
				</div>
				<?php endforeach;?>
				<?php else:?>
				<div class="sam_item" id="sam_sam_1" name="sam_sam_1">
					<div class="input-block" id="doc_sam_sam_1">
						<div class="fhd-link">
							<label>Ссылка на результаты самообследования</label>
							<input class="field" type="text" name="sam[sam_1][docs_sam_link]" value="">
						</div>
						<label>Отчет о результатах самообследования</label>
						<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="sam[sam_1][docs_sam_name]" value="">
						<input class="doc_id block-hidden" type="text" name="sam[sam_1][docs_sam_id]" value="">
						<input class="doc_url" readonly="readonly" type="text" name="sam[sam_1][docs_sam_url]" value="">
						<a href="javascript:;" class="doc_upload link_btn">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn block-hidden">Очистить документ</a>
					</div>
					<a href="javascript:;" class="sam_remove link_remove">Удалить отчёт</a>
				</div>
				<?php endif;?>
				<div id="add_sam">
					<input class="form_btn" type="button" value="Добавить результат" id="clone_sam">
				</div>
			</div>
			
			
			<!-----------------Предписания-------------------->
			
			<div class="sub-title">Предписания:</div>
			
			<div class="predp">
				<?php if(isset($data['restored']['pred']) && is_array($data['restored']['pred'])) : $pred = $data['restored']['pred']; ?>
				
				<?php foreach($pred as $pkey => $pval):?>
				<div class="pred_item" id="pred_<?php echo $pkey?>" name="pred_<?php echo $pkey?>">
					<div class="input-block" id="doc_pred_<?php echo $pkey?>">
						<div class="fhd-link">
							<label>Ссылка на предписания</label>
							<?php 
								if(isset($pval['docs_pres_link']) && !empty($pval['docs_pres_link']))
								{
									if(!org_check_url($pval['docs_pres_link']))
									{
										echo $error_msg;
									}
								}
							?>
							<input class="field" type="text" name="pred[<?php echo $pkey?>][docs_pres_link]" value="<?php echo (isset($pval['docs_pres_link']) ? $pval['docs_pres_link'] : '')?>">
						</div>
						<label>Предписания органов, осуществляющих государственный контроль (надзор) в сфере образования</label>
						<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="pred[<?php echo $pkey?>][docs_pres_name]" value="<?php echo (isset($pval['docs_pres_name']) ? wp_unslash(htmlspecialchars($pval['docs_pres_name'])) : '')?>">
						<input class="doc_id block-hidden" type="text" name="pred[<?php echo $pkey?>][docs_pres_id]" value="<?php echo (isset($pval['docs_pres_id']) ? $pval['docs_pres_id'] : '')?>">
						<input class="doc_url" readonly="readonly" type="text" name="pred[<?php echo $pkey?>][docs_pres_url]" value="<?php echo (isset($pval['docs_pres_url']) ? $pval['docs_pres_url'] : '')?>">
						<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($pval['docs_pres_url']) && !empty($pval['docs_pres_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($pval['docs_pres_url']) && !empty($pval['docs_pres_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
					</div>
					<a href="javascript:;" class="pred_remove link_remove">Удалить предписание</a>
				</div>
				<?php endforeach;?>
				<?php else:?>
				<div class="pred_item" id="pred_pred_1" name="pred_pred_1">
					<div class="input-block" id="doc_pred_pred_1">
						<div class="fhd-link">
							<label>Ссылка на предписания</label>
							<input class="field" type="text" name="pred[pred_1][docs_pres_link]" value="">
						</div>
						<label>Предписания органов, осуществляющих государственный контроль (надзор) в сфере образования</label>
						<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="pred[pred_1][docs_pres_name]" value="">
						<input class="doc_id block-hidden" type="text" name="pred[pred_1][docs_pres_id]" value="">
						<input class="doc_url" readonly="readonly" type="text" name="pred[pred_1][docs_pres_url]" value="">
						<a href="javascript:;" class="doc_upload link_btn">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn block-hidden">Очистить документ</a>
					</div>
					<a href="javascript:;" class="pred_remove link_remove">Удалить предписание</a>
				</div>
				<?php endif;?>
				<div id="add_pred">
					<input class="form_btn" type="button" value="Добавить предписание" id="clone_pred">
				</div>
			</div>
			
			<!-----------------Отчёты------------------->
			
			<div class="sub-title">Отчёты об исполнении предписаний:</div>
			
			<div class="otchet">
				<?php if(isset($data['restored']['otch']) && is_array($data['restored']['otch'])) : $otch = $data['restored']['otch']; ?>
				
				<?php foreach($otch as $key => $val):?>
				<div class="otch_item" id="otch_<?php echo $key?>" name="otch_<?php echo $key?>">
					<div class="input-block" id="doc_otch_<?php echo $key?>">
						<div class="fhd-link">
							<label>Ссылка на отчеты об исполнении предписаний</label>
							<?php 
								if(isset($val['docs_otch_link']) && !empty($val['docs_otch_link']))
								{
									if(!org_check_url($val['docs_otch_link']))
									{
										echo $error_msg;
									}
								}
							?>
							<input class="field" type="text" name="otch[<?php echo $key?>][docs_otch_link]" value="<?php echo (isset($val['docs_otch_link']) ? $val['docs_otch_link'] : '')?>">
						</div>
						<label>Отчеты об исполнении предписаний органов, осуществляющих государственный контроль (надзор) в сфере образования</label>
						<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="otch[<?php echo $key?>][docs_otch_name]" value="<?php echo (isset($val['docs_otch_name']) ? wp_unslash(htmlspecialchars($val['docs_otch_name'])) : '')?>">
						<input class="doc_id block-hidden" type="text" name="otch[<?php echo $key?>][docs_otch_id]" value="<?php echo (isset($val['docs_otch_id']) ? $val['docs_otch_id'] : '')?>">
						<input class="doc_url" readonly="readonly" type="text" name="otch[<?php echo $key?>][docs_otch_url]" value="<?php echo (isset($val['docs_otch_url']) ? $val['docs_otch_url'] : '')?>">
						<a href="javascript:;" class="doc_upload link_btn <?php echo (!empty($val['docs_otch_url']) && !empty($val['docs_otch_id']) ? 'block-hidden' : '')?>">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn <?php echo (!empty($val['docs_otch_url']) && !empty($val['docs_otch_id']) ? '' : 'block-hidden')?>">Очистить документ</a>
					</div>
					<a href="javascript:;" class="otch_remove link_remove">Удалить отчёт</a>
				</div>
				<?php endforeach;?>
				<?php else:?>
				<div class="otch_item" id="otch_otch_1" name="otch_otch_1">
					<div class="input-block" id="doc_otch_otch_1">
						<div class="fhd-link">
							<label>Ссылка на отчеты об исполнении предписаний</label>
							<input class="field" type="text" name="otch[otch_1][docs_otch_link]" value="">
						</div>
						<label>Отчеты об исполнении предписаний органов, осуществляющих государственный контроль (надзор) в сфере образования</label>
						<input placeholder="Заголовок документа или ссылки" class="doc_name" type="text" name="otch[otch_1][docs_otch_name]" value="">
						<input class="doc_id block-hidden" type="text" name="otch[otch_1][docs_otch_id]" value="">
						<input class="doc_url" readonly="readonly" type="text" name="otch[otch_1][docs_otch_url]" value="">
						<a href="javascript:;" class="doc_upload link_btn">Загрузить документ</a>
						<a href="javascript:;" class="doc_remove link_btn block-hidden">Очистить документ</a>
					</div>
					<a href="javascript:;" class="otch_remove link_remove">Удалить отчёт</a>
				</div>
				<?php endif;?>
				<div id="add_otch">
					<input class="form_btn" type="button" value="Добавить отчёт" id="clone_otch">
				</div>
			</div>
			<div class="input-block editor-block">
				<label>Дополнительные документы (при наличии. можно добавить несколько)</label>
				<?php 
					wp_editor(
						(isset($field['docother']) ? $field['docother'] : ''), 
						'docother', 
						array(
							'wpautop'       => 0,
							'media_buttons' => 1,
							'textarea_name' => 'docother',
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
				<button class="form_btn" name="docs_btn" type="submit">Сохранить</button>
			</div>
		</div>	
		
	</form>
</div>
<?php endif; ?>
