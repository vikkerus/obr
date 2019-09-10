<?php $data = obr_edu_front(); ?>

<div class="obr-front edu">
	<div class="info-block">
		<div class="title">Реализуемые уровни образования</div>
		<?php if(isset($data['edu_main_lev']) && !empty($data['edu_main_lev'])) : ?>
			<div class="content" itemprop="eduLevel">
			<?php echo wp_unslash($data['edu_main_lev'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Формы обучения</div>	
		<?php if(isset($data['edu_main_form']) && !empty($data['edu_main_form'])) : ?>
			<div class="content" itemprop="eduForm">
			<?php echo wp_unslash($data['edu_main_form'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Нормативные сроки обучения</div>	
		<?php if(isset($data['edu_main_norm']) && !empty($data['edu_main_norm'])) : ?>
			<div class="content" itemprop="learningTerm">
			<?php echo wp_unslash($data['edu_main_norm'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

	<div class="info-block">
		<div class="title">Срок действия государственной аккредитации</div>	
		<?php if(isset($data['edu_main_accr']) && !empty($data['edu_main_accr'])) : ?>
			<div class="content" itemprop="eduAccred dateEnd">
			<?php echo wp_unslash($data['edu_main_accr'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

	<?php if(isset($data['edu_uch_id']) && !empty($data['edu_uch_id'])) : ?>
	<div class="info-block">
		<div class="title">Учебный план</div>
		<div class="content">
			<a itemprop="educationPlan adEducationPlan" href="<?php echo (isset($data['edu_uch_url']) && !empty($data['edu_uch_url'])) ? $data['edu_uch_url'] : ''?>" title="Учебный план" target="_blank"><?php echo (isset($data['edu_uch_name']) && !empty($data['edu_uch_name'])) ? wp_unslash($data['edu_uch_name']) : 'Учебный план'?></a>
		</div>
	</div>
	<?php else:?>
	<div class="info-block">
		<div class="title">Учебный план</div>
		<div class="content">
			<div class="none-data">нет данных</div>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['edu_cal_id']) && !empty($data['edu_cal_id'])) : ?>
	<div class="info-block">
		<div class="title">Календарный учебный график</div>
		<div class="content">
			<a itemprop= "educationShedule adEducationShedule" href="<?php echo (isset($data['edu_cal_url']) && !empty($data['edu_cal_url'])) ? $data['edu_cal_url'] : ''?>" title="Календарный учебный график" target="_blank"><?php echo (isset($data['edu_cal_name']) && !empty($data['edu_cal_name'])) ? wp_unslash($data['edu_cal_name']) : 'Календарный учебный график'?></a>
		</div>
	</div>
	<?php else:?>
	<div class="info-block">
		<div class="title">Календарный учебный график</div>
		<div class="content">
			<div class="none-data">нет данных</div>
		</div>
	</div>
	<?php endif;?>
	
	<div class="info-block">
		<div class="title">Методические и иные документы, разработанные образовательной организацией для обеспечения образовательного процесса</div>	
		<?php if(isset($data['edumet']) && !empty($data['edumet'])) : ?>
			<div class="content" itemprop= "methodology adMethodology">
			<?php echo $data['edumet']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Языки, на которых осуществляется образование (обучение)</div>
		<?php if(isset($data['edu_lang']) && !empty($data['edu_lang'])) : ?>
			<div class="content" itemprop="language">
			<?php echo wp_unslash($data['edu_lang'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">О заключенных и планируемых к заключению договорах с иностранными и (или) международными организациями по вопросам образования и науки</div>	
		<?php if(isset($data['eduino']) && !empty($data['eduino'])) : ?>
			<div class="content">
			<?php echo $data['eduino']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Направления и результаты научной (научно-исследовательской) деятельности и научно-исследовательская база для ее осуществления</div>	
		<?php if(isset($data['edu_nid']) && !empty($data['edu_nid'])) : ?>
			<div class="content" itemprop="eduNir">
			<?php echo wp_unslash($data['edu_nid'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Результаты приема</div>	
		<?php if(isset($data['edurespr']) && !empty($data['edurespr'])) : ?>
			<div class="content" itemprop="eduPriem">
			<?php echo $data['edurespr']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Результаты перевода, восстановления и отчисления</div>		
		<?php if(isset($data['edu_resot']) && !empty($data['edu_resot'])) : ?>
			<div class="content" itemprop="eduPerevod">
			<?php echo wp_unslash($data['edu_resot'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<?php if(isset($data['edu_copy_id']) && !empty($data['edu_copy_id'])) : ?>
	<div class="info-block">
		<div class="title">Копия учебной программы</div>
		<div class="content">
			<a href="<?php echo (isset($data['edu_copy_url']) && !empty($data['edu_copy_url'])) ? $data['edu_copy_url'] : ''?>" title="Копия учебной программы" target="_blank"><?php echo (isset($data['edu_copy_name']) && !empty($data['edu_copy_name'])) ? wp_unslash($data['edu_copy_name']) : 'Копия учебной программы'?></a>
		</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['edu']) && is_array($data['edu'])) : $edu = $data['edu']; ?>
	
	<div id="obr_edu" class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Код</th>
					<th>Наименование образовательной программы</th>
					<th>Уровень образования</th>
					<th>Описание образовательной программы</th>
					<th>Аннотация к рабочей программе</th>
					<th>Практики, предусмотренные образовательной программой</th>
					<th>Численности обучающихся по реализуемым образовательным программам</th>
				</tr>
			</thead>
			<tbody itemprop="eduNir">
				<?php $i = 0; foreach($edu as $key => $val): $i++;?>
				<?php if(isset($val['edu_name']) && !empty($val['edu_name'])) :?>
				<tr class="signal-line" itemprop="eduOp adeduOp">
					<td itemprop="eduCode">
						<?php if(isset($val['edu_code']) && !empty($val['edu_code'])) : ?>
							<?php echo wp_unslash($val['edu_code'])?>
						<?php endif;?>
					</td>
					<td itemprop="eduName">
						<?php if(isset($val['edu_name']) && !empty($val['edu_name'])) : ?>
							<?php echo wp_unslash($val['edu_name'])?>
						<?php endif;?>
					</td>
					<td itemprop="eduLevel">
						<?php if(isset($val['edu_lev']) && !empty($val['edu_lev'])) : ?>
							<?php echo wp_unslash($val['edu_lev'])?>
						<?php endif;?>
					</td>
					<td>
						<?php if(isset($val['edu_obr_id']) && !empty($val['edu_obr_id'])) : ?>
							<a itemprop="opMain adOpMain" href="<?php echo (isset($val['edu_obr_url']) && !empty($val['edu_obr_url'])) ? $val['edu_obr_url'] : ''?>" title="Описание образовательной программы" target="_blank"><?php echo (isset($val['edu_obr_name']) && !empty($val['edu_obr_name'])) ? wp_unslash($val['edu_obr_name']) : 'Описание образовательной программы'?></a>
						<?php endif;?>
					</td>
					<td itemprop= "educationAnnotation adEducationAnnotation">
						<?php if(isset($val['edu_ann']) && !empty($val['edu_ann'])) : ?>
							<?php echo wp_unslash($val['edu_ann'])?>
						<?php endif;?>
					</td>
					<td itemprop="eduPr">
						<?php if(isset($val['edu_pract']) && !empty($val['edu_pract'])) : ?>
							<?php echo wp_unslash($val['edu_pract'])?>
						<?php endif;?>
					</td>
					<td itemprop="eduChislen">
						<?php if((isset($val['edu_budg']) && !empty($val['edu_budg'])) || (isset($val['edu_paid']) && !empty($val['edu_paid']))) : ?>
							<?php if(isset($val['edu_budg']) && ($val['edu_budg'] !='')) : ?>
						<i>За счет бюджета:</i> <span itemprop="numberBFpriem numberBRpriem numberBMpriem"><?php echo wp_unslash($val['edu_budg'])?></span>
							<?php endif;?>
							<br>
							<?php if(isset($val['edu_paid']) && ($val['edu_paid'] !='')) : ?>
						<i>За счет средств физических и (или) юридических лиц:</i> <span itemprop="numberPpriem"><?php echo wp_unslash($val['edu_paid'])?></span>
							<?php endif;?>
						<?php endif;?>
					</td>
				</tr>
				<?php endif;?>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
	<?php endif;?>
</div>
