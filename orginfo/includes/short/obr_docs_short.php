<?php 

	$data = obr_docs_front(); 

	//$link_error = '<span class="link_error">(ссылка недействительна) </span>';

?>

<div class="obr-front docs">
	<div class="panel-group doc-group" id="obr_uch" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading_uch">					
				<a href="javascript:;"data-parent="#obr_uch" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse_uch" aria-expanded="false" aria-controls="collapse_uch">
					Учредительные документы
				</a>
			</div>

			<div id="collapse_uch" class="panel-collapse collapse" aria-labelledby="heading_uch" data-parent="#obr_uch" role="tabpanel">
				<div class="panel-body">
					<?php if((isset($data['docs_ust_link']) && !empty($data['docs_ust_link'])) || (isset($data['docs_ust_url']) && !empty($data['docs_ust_url']))) : ?>
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_ust_link']) ? '' : $link_error)?>
							<a itemprop="ustavDocLink" href="<?php echo ((isset($data['docs_ust_link'])) && (!empty($data['docs_ust_link'])) ? $data['docs_ust_link'] : $data['docs_ust_url'])?>" title="Копия устава" target="_blank"><?php echo (isset($data['docs_ust_name']) && !empty($data['docs_ust_name'])) ? wp_unslash($data['docs_ust_name']) : 'Копия устава образовательной организации'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия устава образовательной организации</div>
							<div class="none-data">нет данных</div>
						</div>
						<br>
					<?php endif;?>
					
					<?php if((isset($data['docs_lic_link']) && !empty($data['docs_lic_link'])) || (isset($data['docs_lic_url']) && !empty($data['docs_lic_url']))) : ?>	
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_lic_link']) ? '' : $link_error)?>
							<a itemprop="licenseDocLink" href="<?php echo (isset($data['docs_lic_link']) && !empty($data['docs_lic_link']) ? $data['docs_lic_link'] : $data['docs_lic_url'])?>" title="Копия лицензии" target="_blank"><?php echo (isset($data['docs_lic_name']) && !empty($data['docs_lic_name'])) ? wp_unslash($data['docs_lic_name']) : 'Копия лицензии на осуществление образовательной деятельности (с приложениями)'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия лицензии на осуществление образовательной деятельности (с приложениями)</div>
							<div class="none-data">нет данных</div>
						</div>
						<br>
					<?php endif;?>
					
					<?php if((isset($data['docs_accr_link']) && !empty($data['docs_accr_link'])) || (isset($data['docs_accr_url']) && !empty($data['docs_accr_url']))) : ?>	
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_accr_link']) ? '' : $link_error)?>
							<a itemprop="accreditationDocLink" href="<?php echo (isset($data['docs_accr_link']) && !empty($data['docs_accr_link']) ? $data['docs_accr_link'] : $data['docs_accr_url'])?>" title="Копия свидетельства" target="_blank"><?php echo (isset($data['docs_accr_name']) && !empty($data['docs_accr_name'])) ? wp_unslash($data['docs_accr_name']) : 'Копия свидетельства о государственной аккредитации (с приложениями)'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия свидетельства о государственной аккредитации (с приложениями)</div>
							<div class="none-data">нет данных</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="panel-group doc-group" id="obr_norm" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading_norm">					
				<a href="javascript:;" data-parent="#obr_norm" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse_norm" aria-expanded="false" aria-controls="collapse_norm">
					Локальные нормативные акты
				</a>
			</div>

			<div id="collapse_norm" class="panel-collapse collapse" aria-labelledby="heading_norm" data-parent="#obr_norm" role="tabpanel">
				<div class="panel-body">
					<?php if((isset($data['docs_priem_link']) && !empty($data['docs_priem_link'])) || (isset($data['docs_priem_url']) && !empty($data['docs_priem_url']))) : ?>	
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_priem_link']) ? '' : $link_error)?>
							<a itemprop="priemDocLink" href="<?php echo (isset($data['docs_priem_link']) && !empty($data['docs_priem_link']) ? $data['docs_priem_link'] : $data['docs_priem_url'])?>" title="Копия акта" target="_blank"><?php echo (isset($data['docs_priem_name']) && !empty($data['docs_priem_name'])) ? wp_unslash($data['docs_priem_name']) : 'Копия локального нормативного акта, регламентирующего правила приема обучающихся'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия локального нормативного акта, регламентирующего правила приема обучающихся</div>
							<div class="none-data">нет данных</div>
						</div>
						<br>
					<?php endif;?>
					
					<?php if((isset($data['docs_zan_link']) && !empty($data['docs_zan_link'])) || (isset($data['docs_zan_url']) && !empty($data['docs_zan_url']))) : ?>	
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_zan_link']) ? '' : $link_error)?>
							<a itemprop="modeDocLink" href="<?php echo (isset($data['docs_zan_link']) && !empty($data['docs_zan_link']) ? $data['docs_zan_link'] : $data['docs_zan_url'])?>" title="Копия акта" target="_blank"><?php echo (isset($data['docs_zan_name']) && !empty($data['docs_zan_name'])) ? wp_unslash($data['docs_zan_name']) : 'Копия локального нормативного акта, регламентирующего режим занятий обучающихся'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия локального нормативного акта, регламентирующего режим занятий обучающихся</div>
							<div class="none-data">нет данных</div>
						</div>
						<br>
					<?php endif;?>
					
					<?php if((isset($data['docs_att_link']) && !empty($data['docs_att_link'])) || (isset($data['docs_att_url']) && !empty($data['docs_att_url']))) : ?>	
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_att_link']) ? '' : $link_error)?>
							<a itemprop="tekKontrolDocLink" href="<?php echo (isset($data['docs_att_link']) && !empty($data['docs_att_link']) ? $data['docs_att_link'] : $data['docs_att_url'])?>" title="Копия акта" target="_blank"><?php echo (isset($data['docs_att_name']) && !empty($data['docs_att_name'])) ? wp_unslash($data['docs_att_name']) : 'Копия локального нормативного акта, регламентирующего формы, периодичность и порядок текущего контроля успеваемости и промежуточной аттестации обучающихся'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия локального нормативного акта, регламентирующего формы, периодичность и порядок текущего контроля успеваемости и промежуточной аттестации обучающихся</div>
							<div class="none-data">нет данных</div>
						</div>
						<br>
					<?php endif;?>
					
					<?php if((isset($data['docs_per_link']) && !empty($data['docs_per_link'])) || (isset($data['docs_per_url']) && !empty($data['docs_per_url']))) : ?>	
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_per_link']) ? '' : $link_error)?>
							<a itemprop= "perevodDocLink" href="<?php echo (isset($data['docs_per_link']) && !empty($data['docs_per_link']) ? $data['docs_per_link'] : $data['docs_per_url'])?>" title="Копия акта" target="_blank"><?php echo (isset($data['docs_per_name']) && !empty($data['docs_per_name'])) ? wp_unslash($data['docs_per_name']) : 'Копия локального нормативного акта, регламентирующего порядок и основания перевода, отчисления и восстановления обучающихся'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия локального нормативного акта, регламентирующего порядок и основания перевода, отчисления и восстановления обучающихся</div>
							<div class="none-data">нет данных</div>
						</div>
						<br>
					<?php endif;?>
					
					<?php if((isset($data['docs_voz_link']) && !empty($data['docs_voz_link'])) || (isset($data['docs_voz_url']) && !empty($data['docs_voz_url']))) : ?>	
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_voz_link']) ? '' : $link_error)?>
							<a itemprop="vozDocLink" href="<?php echo (isset($data['docs_voz_link']) && !empty($data['docs_voz_link']) ? $data['docs_voz_link'] : $data['docs_voz_url'])?>" title="Копия акта" target="_blank"><?php echo (isset($data['docs_voz_name']) && !empty($data['docs_voz_name'])) ? wp_unslash($data['docs_voz_name']) : 'Копия локального нормативного акта, регламентирующего порядок оформления возникновения, приостановления и прекращения отношений между образовательной организацией и обучающимися и (или) родителями (законными представителями) несовершеннолетних обучающихся'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия локального нормативного акта, регламентирующего порядок оформления возникновения, приостановления и прекращения отношений между образовательной организацией и обучающимися и (или) родителями (законными представителями) несовершеннолетних обучающихся</div>
							<div class="none-data">нет данных</div>
						</div>
						<br>
					<?php endif;?>
					
					<?php if((isset($data['docs_pom_link']) && !empty($data['docs_pom_link'])) || (isset($data['docs_pom_url']) && !empty($data['docs_pom_url']))) : ?>	
					<div class="doc-block">
						<div class="content">
							<?php //echo (obr_get_status($data['docs_pom_link']) ? '' : $link_error)?>
							<a href="<?php echo (isset($data['docs_pom_link']) && !empty($data['docs_pom_link']) ? $data['docs_pom_link'] : $data['docs_pom_url'])?>" title="Копия акта" target="_blank"><?php echo (isset($data['docs_pom_name']) && !empty($data['docs_pom_name'])) ? wp_unslash($data['docs_pom_name']) : 'Копия локального нормативного акта, регламентирующего размер платы за пользование жилым помещением и коммунальные услуги в общежитии'?></a>
						</div>
					</div>
					<?php else:?>
						<div class="doc-block">
							<div>Копия локального нормативного акта, регламентирующего размер платы за пользование жилым помещением и коммунальные услуги в общежитии</div>
							<div class="none-data">нет данных</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	
	<?php if(isset($data['fhd']) && is_array($data['fhd'])) : $fhd = $data['fhd']; ?>
	<div class="panel-group" id="obr_fhd" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading_fhd">				
				<a href="javascript:;" data-parent="#obr_fhd" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse_fhd" aria-expanded="false" aria-controls="collapse_fhd">
					Планы финансово-хозяйственной деятельности
				</a>
			</div>
			<div id="collapse_fhd" class="panel-collapse collapse" aria-labelledby="heading_fhd" data-parent="#obr_fhd" role="tabpanel">
				<div class="panel-body">
					<?php foreach($fhd as $key => $val):?>
						<?php if((isset($val['docs_fhd_link']) && !empty($val['docs_fhd_link'])) || (isset($val['docs_fhd_url']) && !empty($val['docs_fhd_url']))) : ?>	
							<div class="doc-block">
								<div class="content">
									<?php //echo (obr_get_status($val['docs_fhd_link']) ? '' : $link_error)?>
									<a itemprop="finPlanDocLink" href="<?php echo (isset($val['docs_fhd_link']) && !empty($val['docs_fhd_link']) ? $val['docs_fhd_link'] : $val['docs_fhd_url']);?>" title="План финансово-хозяйственной деятельности" target="_blank"><?php echo (isset($val['docs_fhd_name']) && !empty($val['docs_fhd_name']) ? wp_unslash($val['docs_fhd_name']) : 'План финансово-хозяйственной деятельности');?></a>
								</div>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				</div>
			</div>	
		</div>
	</div>
	<?php endif;?>
	
	
	
	
	<?php if(isset($data['sam']) && is_array($data['sam'])) : $sam = $data['sam']; ?>
	<div class="panel-group" id="obr_sam" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading_sam">				
				<a href="javascript:;" data-parent="#obr_sam" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse_sam" aria-expanded="false" aria-controls="collapse_sam">
					Результаты самообследования
				</a>
			</div>
			<div id="collapse_sam" class="panel-collapse collapse" aria-labelledby="heading_sam" data-parent="#obr_sam" role="tabpanel">
				<div class="panel-body">
					<?php foreach($sam as $skey => $sval):?>
						<?php if((isset($sval['docs_sam_link']) && !empty($sval['docs_sam_link'])) || (isset($sval['docs_sam_url']) && !empty($sval['docs_sam_url']))) : ?>	
							<div class="doc-block">
								<div class="content">
									<?php //echo (obr_get_status($sval['docs_sam_link']) ? '' : $link_error)?>
									<a itemprop= "reportEduDocLink" href="<?php echo (isset($sval['docs_sam_link']) && !empty($sval['docs_sam_link']) ? $sval['docs_sam_link'] : $sval['docs_sam_url']);?>" title="Отчет о результатах самообследования" target="_blank"><?php echo (isset($sval['docs_sam_name']) && !empty($sval['docs_sam_name']) ? wp_unslash($sval['docs_sam_name']) : 'Отчет о результатах самообследования');?></a>
								</div>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				</div>
			</div>	
		</div>
	</div>
	<?php endif;?>
	
	
	
	<?php if(isset($data['pred']) && is_array($data['pred'])) : $pred = $data['pred']; ?>
	<div class="panel-group" id="obr_pred" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading_pred">				
				<a href="javascript:;" data-parent="#obr_pred" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse_pred" aria-expanded="false" aria-controls="collapse_pred">
					Предписания
				</a>
			</div>
			<div id="collapse_pred" class="panel-collapse collapse" aria-labelledby="heading_pred" data-parent="#obr_pred" role="tabpanel">
				<div class="panel-body">
					<?php foreach($pred as $pkey => $pval):?>
						<?php if((isset($pval['docs_pres_link']) && !empty($pval['docs_pres_link'])) || (isset($pval['docs_pres_url']) && !empty($pval['docs_pres_url']))) : ?>	
							<div class="doc-block">
								<div class="content">
									<?php //echo (obr_get_status($pval['docs_pres_link']) ? '' : $link_error)?>
									<a itemprop= "prescriptionDocLink" href="<?php echo (isset($pval['docs_pres_link']) && !empty($pval['docs_pres_link']) ? $pval['docs_pres_link'] : $pval['docs_pres_url']);?>" title="Предписания" target="_blank"><?php echo (isset($pval['docs_pres_name']) && !empty($pval['docs_pres_name']) ? wp_unslash($pval['docs_pres_name']) : 'Предписания органов, осуществляющих государственный контроль (надзор) в сфере образования');?></a>
								</div>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				</div>
			</div>	
		</div>
	</div>
	<?php endif;?>
	
	
	
	<?php if(isset($data['otch']) && is_array($data['otch'])) : $otch = $data['otch']; ?>
	<div class="panel-group" id="obr_otch" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading_otch">				
				<a href="javascript:;" data-parent="#obr_otch" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse_otch" aria-expanded="false" aria-controls="collapse_otch">
					Отчёты об исполнении предписаний
				</a>
			</div>
			<div id="collapse_otch" class="panel-collapse collapse" aria-labelledby="heading_otch" data-parent="#obr_otch" role="tabpanel">
				<div class="panel-body">
					<?php foreach($otch as $okey => $oval):?>
						<?php if((isset($oval['docs_otch_link']) && !empty($oval['docs_otch_link'])) || (isset($oval['docs_otch_url']) && !empty($oval['docs_otch_url']))) : ?>	
							<div class="doc-block">
								<div class="content">
									<?php //echo (obr_get_status($oval['docs_otch_link']) ? '' : $link_error)?>
									<a itemprop="prescriptionOtchetDocLink" href="<?php echo (isset($oval['docs_otch_link']) && !empty($oval['docs_otch_link']) ? $oval['docs_otch_link'] : $oval['docs_otch_url']);?>" title="Отчет" target="_blank"><?php echo (isset($oval['docs_otch_name']) && !empty($oval['docs_otch_name']) ? wp_unslash($oval['docs_otch_name']) : 'Отчет об исполнении предписаний органов, осуществляющих государственный контроль (надзор) в сфере образования');?></a>
								</div>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				</div>
			</div>	
		</div>
	</div>
	<?php endif;?>
	
	<?php if((isset($data['docs_stud_link']) && !empty($data['docs_stud_link'])) || (isset($data['docs_stud_url']) && !empty($data['docs_stud_url']))) : ?>	
	<div class="doc-block">
		<div class="content">
			<?php //echo (obr_get_status($data['docs_stud_link']) ? '' : $link_error)?>
			<a itemprop="localActStud" href="<?php echo (isset($data['docs_stud_link']) && !empty($data['docs_stud_link']) ? $data['docs_stud_link'] : $data['docs_stud_url'])?>" title="Копия правил" target="_blank"><?php echo (isset($data['docs_stud_name']) && !empty($data['docs_stud_name'])) ? wp_unslash($data['docs_stud_name']) : 'Копия правил внутреннего распорядка обучающихся'?></a>
		</div>
	</div>
	<?php else:?>
		<div class="doc-block">
			<div>Копия правил внутреннего распорядка обучающихся</div>
			<div class="none-data">нет данных</div>
		</div>
		<br>
	<?php endif;?>
	
	<?php if((isset($data['docs_ord_link']) && !empty($data['docs_ord_link'])) || (isset($data['docs_ord_url']) && !empty($data['docs_ord_url']))) : ?>	
	<div class="doc-block">
		<div class="content">
			<?php //echo (obr_get_status($data['docs_ord_link']) ? '' : $link_error)?>
			<a itemprop="localActOrder" href="<?php echo (isset($data['docs_ord_link']) && !empty($data['docs_ord_link']) ? $data['docs_ord_link'] : $data['docs_ord_url'])?>" title="Копия правил" target="_blank"><?php echo (isset($data['docs_ord_name']) && !empty($data['docs_ord_name'])) ? wp_unslash($data['docs_ord_name']) : 'Копия правил внутреннего трудового распорядка'?></a>
		</div>
	</div>
	<?php else:?>
		<div class="doc-block">
			<div>Копия правил внутреннего трудового распорядка</div>
			<div class="none-data">нет данных</div>
		</div>
		<br>
	<?php endif;?>
	
	<?php if((isset($data['docs_col_link']) && !empty($data['docs_col_link'])) || (isset($data['docs_col_url']) && !empty($data['docs_col_url']))) : ?>	
	<div class="doc-block">
		<div class="content">
			<?php //echo (obr_get_status($data['docs_col_link']) ? '' : $link_error)?>
			<a itemprop="localActCollec" href="<?php echo (isset($data['docs_col_link']) && !empty($data['docs_col_link']) ? $data['docs_col_link'] : $data['docs_col_url'])?>" title="Копия коллективного договора" target="_blank"><?php echo (isset($data['docs_col_name']) && !empty($data['docs_col_name'])) ? wp_unslash($data['docs_col_name']) : 'Копия коллективного договора'?></a>
		</div>
	</div>
	<?php else:?>
		<div class="doc-block">
			<div>Копия коллективного договора</div>
			<div class="none-data">нет данных</div>
		</div>
		<br>
	<?php endif;?>
	
	<?php if((isset($data['docs_paid_link']) && !empty($data['docs_paid_link'])) || (isset($data['docs_paid_url']) && !empty($data['docs_paid_url']))) : ?>	
	<div class="doc-block">
		<div class="content">
			<?php //echo (obr_get_status($data['docs_paid_link']) ? '' : $link_error)?>
			<a itemprop= "paidEduDocLink" href="<?php echo (isset($data['docs_paid_link']) && !empty($data['docs_paid_link']) ? $data['docs_paid_link'] : $data['docs_paid_url'])?>" title="Документ о порядке оказания платных образовательных услуг" target="_blank"><?php echo (isset($data['docs_paid_name']) && !empty($data['docs_paid_name'])) ? wp_unslash($data['docs_paid_name']) : 'Документ о порядке оказания платных образовательных услуг, в том числе образец договора об оказании платных образовательных услуг, документ об утверждении стоимости обучения по каждой образовательной программе'?></a>
		</div>
	</div>
	<?php else:?>
		<div class="doc-block">
			<div>Документ о порядке оказания платных образовательных услуг, в том числе образец договора об оказании платных образовательных услуг, документ об утверждении стоимости обучения по каждой образовательной программе</div>
			<div class="none-data">нет данных</div>
		</div>
		<br>
	<?php endif;?>
	
	<?php if(isset($data['docother']) && !empty($data['docother'])) : ?>
	<div class="obr-fin">
		<div class="doc-title">Прочие документы</div>
		<div class="content">
			<?php echo $data['docother']?>
		</div>
	</div>
	<?php else:?>
		<div class="doc-block">
			<div>Прочие документы</div>
			<div class="none-data">нет данных</div>
		</div>
	<?php endif;?>
</div>
