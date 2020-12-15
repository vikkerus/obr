<?php $data = org_vac_front(); ?>


<div class="org-front vac" itemprop="vacant">
	<?php if(isset($data['vac']) && is_array($data['vac'])) : $vac = $data['vac']; ?>
		<div class="vac-block">
			<div class="table-responsive">
				<table id="vac_table">
					<thead>
                        <tr>
                            <th rowspan="2">Код</th>
                            <th rowspan="2">Наименование профессии, специальности , направления подготовки</th>
                            <th rowspan="2">Уровень образования</th>
                            <th rowspan="2">Курс</th>
                            <th rowspan="2">Форма обучения</th>
                            <th colspan="4">Количество вакантных мест для приема (перевода) на места, финансируемые за счет</th>
                        </tr>
						<tr>
							<th>бюджетных ассигнований федерального бюджета</th>
                            <th>бюджетов субъектов Российской Федерации</th>
                            <th>местных бюджетов</th>
                            <th>по договорам об образовании за счет средств физических и (или) юридических лиц</th>                       
						</tr>
					</thead>
					<tbody>
				<?php $i=1; foreach($vac as $key => $val): ?>
				<?php if(isset($val['name']) && !empty($val['name'])) : ?>
				<tr>
					<td itemprop="eduCode"><?php echo (isset($val['code']) && !empty($val['code'])) ? $val['code'] : ''?></td>
					<td itemprop="eduName"><?php echo (isset($val['name']) && !empty($val['name'])) ? $val['name'] : ''?></td>
					<td itemprop="eduLevel"><?php echo (isset($val['level']) && !empty($val['level'])) ? $val['level'] : ''?></td>
                    <td itemprop="eduCourse"><?php echo (isset($val['kurs']) && !empty($val['kurs'])) ? $val['kurs'] : ''?></td>
                    <td itemprop="eduForm"><?php echo (isset($val['form']) && !empty($val['form'])) ? $val['form'] : ''?></td>
                    
					<td itemprop="numberBFVacant"><?php echo (isset($val['fb']) && ($val['fb'] !== '')) ? $val['fb'] : '0'?></td>
					<td itemprop="numberBRVacant"><?php echo (isset($val['sr']) && ($val['sr'] !== '')) ? $val['sr'] : '0'?></td>
					<td itemprop="numberBMVacant"><?php echo (isset($val['mb']) && ($val['mb'] !== '')) ? $val['mb'] : '0'?></td>
					<td itemprop="numberPVacant"><?php echo (isset($val['sl']) && ($val['sl'] !== '')) ? $val['sl'] : '0'?></td>
                    
				</tr>	
				<?php $i++; endif;?>
				<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>	
	<?php else:?>
		<div class="none-data">нет данных</div>
	<?php endif;?>
	
	<?php if(isset($data['vacinfo']) && !empty($data['vacinfo'])) : ?>
	<div class="info-block">
		<div class="title">Вакантные места для приема (перевода)</div>				
		<div class="content">
		<?php echo $data['vacinfo'];?>
		</div>		
	</div>
	<?php endif;?>
</div>
