<?php $data = obr_mto_front(); ?>

<div class="obr-front mto">
	<?php if(isset($data['mat_copy_id']) && !empty($data['mat_copy_id'])) : ?>
	<div class="info-block">
		<div class="title">Копия документа о материально-техническом обеспечении</div>
		<div class="content">
			<a href="<?php echo (isset($data['mat_copy_url']) && !empty($data['mat_copy_url'])) ? $data['mat_copy_url'] : ''?>" title="Материально-техническое обеспечение" target="_blank"><?php echo (isset($data['mat_copy_name']) && !empty($data['mat_copy_name'])) ? wp_unslash($data['mat_copy_name']) : 'Материально-техническое обеспечение'?></a>
		</div>
	</div>
	<?php endif;?>
	
	
	<div class="info-block">
		<div class="title">Оборудованные учебные кабинеты (в том числе для лиц с ОВЗ)</div>		
		<?php if(isset($data['mat_uch']) && !empty($data['mat_uch'])) : ?>
			<div class="content" itemprop="purposeCab purposeCabOvz">
			<?php echo wp_unslash($data['mat_uch'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>


	<div class="info-block">
		<div class="title">Объекты для проведения практических занятий (в том числе для лиц с ОВЗ)</div>	
		<?php if(isset($data['mat_pract']) && !empty($data['mat_pract'])) : ?>
			<div class="content" itemprop="purposePrac purposePracOvz">
			<?php echo wp_unslash($data['mat_pract'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

	
	<div class="info-block">
		<div class="title">Библиотеки (в том числе для лиц с ОВЗ)</div>
		<div class="content" itemprop="purposeLibr purposeLibrOvz">
			<?php if(isset($data['mat_bibl']) && !empty($data['mat_bibl'])) : ?>
			<?php echo wp_unslash($data['mat_bibl'])?>
			<?php else:?>
				<div class="none-data">нет данных</div>
			<?php endif;?>
		</div>
	</div>
	
	<div class="info-block">
		<div class="title">Объекты спорта (в том числе для лиц с ОВЗ)</div>	
		<?php if(isset($data['mat_sport']) && !empty($data['mat_sport'])) : ?>
			<div class="content" itemprop="purposeSport purposeSportOvz">
			<?php echo wp_unslash($data['mat_sport'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Средства обучения и воспитания (в том числе для лиц с ОВЗ)</div>	
		<?php if(isset($data['mat_vos']) && !empty($data['mat_vos'])) : ?>
			<div class="content" itemprop="purposeFacil purposeFacilOvz">
			<?php echo wp_unslash($data['mat_vos'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Условия питания и охраны здоровья обучающихся (в том числе для лиц с ОВЗ)</div>
		<div class="content" itemprop="mealsDocLink meals mealsOvz">
			<?php if(isset($data['mat_ohr']) && !empty($data['mat_ohr'])) : ?>
			<?php echo wp_unslash($data['mat_ohr'])?>
			<?php else:?>
				<div class="none-data">нет данных</div>
			<?php endif;?>
		</div>
	</div>
	
	<div class="info-block">
		<div class="title">Доступ к информационным системам и информационно-телекоммуникационным сетям (в том числе для лиц с ОВЗ)</div>	
		<?php if(isset($data['mat_its']) && !empty($data['mat_its'])) : ?>
			<div class="content" itemprop="comNet comNetOvz">
			<?php echo wp_unslash($data['mat_its'])?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Электронные образовательные ресурсы</div>	
		<?php if(isset($data['matres']) && !empty($data['matres'])) : ?>
			<div class="content" itemprop="erList erListOvz">
			<?php echo $data['matres']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
</div>













