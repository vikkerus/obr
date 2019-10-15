<?php $data = org_vac_front(); ?>

<div class="org-front vac" itemprop="vacant">
	<?php if(isset($data['vac']) && is_array($data['vac'])) : $vac = $data['vac']; ?>
	<div class="info-block">	
		<div class="vac-block">
			<div class="table-responsive">
				<table id="vac_table">
					<tr>
						<th rowspan="2">№</th>
						<th rowspan="2">Код направления</th>
						<th rowspan="2">Наименование образовательной программы</th>
						<th rowspan="2">Наименование специальности/направления подготовки</th>
						<th colspan="4" class="text-center">Уровень образования</th>
						<th colspan="4" class="text-center">Количество вакантных мест для приема (перевода)</th>
					</tr>
					<tr>
						<th class="text-center">бакалавриат</th>
						<th class="text-center" class="text-center">специалитет</th>
						<th class="text-center">магистратура</th>
						<th class="text-center">аспирантура</th>
						<th class="text-center">за счёт бюджетных ассигнований федерального бюджета</th>
						<th class="text-center">за счёт бюджетов субъектов Российской Федерации</th>
						<th class="text-center">за счёт местных бюджетов</th>
						<th class="text-center">за счёт средств физических и (или) юридических лиц</th>
					</tr>
				<?php $i=1; foreach($vac as $key => $val): ?>
				<?php if(isset($val['op']) && !empty($val['op'])) : ?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo (isset($val['code']) && !empty($val['code'])) ? $val['code'] : ''?></td>
					<td itemprop="nameProgVacant"><?php echo (isset($val['op']) && !empty($val['op'])) ? $val['op'] : ''?></td>
					<td itemprop="specialVacant"><?php echo (isset($val['name']) && !empty($val['name'])) ? $val['name'] : ''?></td>
					<td itemprop="bachelorVacant">
						<?php 
							if(isset($val['level']) && !empty($val['level']))
							{
								if($val['level'] == 'bac')
								{
									echo 'реализуется';
								}
								else
								{
									echo 'не реализуется';
								}
							}
						;?>
					</td>
					<td itemprop="specialityVacant">
						<?php 
							if(isset($val['level']) && !empty($val['level']))
							{
								if($val['level'] == 'spec')
								{
									echo 'реализуется';
								}
								else
								{
									echo 'не реализуется';
								}
							}
						;?>
					</td>
					<td itemprop="magistracyVacant">
						<?php 
							if(isset($val['level']) && !empty($val['level']))
							{
								if($val['level'] == 'mag')
								{
									echo 'реализуется';
								}
								else
								{
									echo 'не реализуется';
								}
							}
						;?>
					</td>
					<td itemprop="postgraduateVacant">
						<?php 
							if(isset($val['level']) && !empty($val['level']))
							{
								if($val['level'] == 'asp')
								{
									echo 'реализуется';
								}
								else
								{
									echo 'не реализуется';
								}
							}
						;?>
					</td>
					<td itemprop="numberBFVacant"><?php echo (isset($val['fb']) && ($val['fb'] !== '')) ? $val['fb'] : '0'?></td>
					<td itemprop="numberBRVacant"><?php echo (isset($val['sr']) && ($val['sr'] !== '')) ? $val['sr'] : '0'?></td>
					<td itemprop="numberBMVacant"><?php echo (isset($val['mb']) && ($val['mb'] !== '')) ? $val['mb'] : '0'?></td>
					<td itemprop="numberPVacant"><?php echo (isset($val['sl']) && ($val['sl'] !== '')) ? $val['sl'] : '0'?></td>
				</tr>	
				<?php $i++; endif;?>
				<?php endforeach;?>
				</table>
			</div>
		</div>	
	</div>
	<?php else:?>
	<div class="info-block">
		<div class="none-data">нет данных</div>
	</div>
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