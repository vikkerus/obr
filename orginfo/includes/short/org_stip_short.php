<?php $data = org_stip_front(); ?>

<div class="org-front stip" itemprop="grant" itemscope itemtype="http://obrnadzor.gov.ru/microformats/Grant">
	<div class="info-block">
		<div class="title">Сведения о видах стипендий</div>		
		<?php if(isset($data['stip_type']) && !empty($data['stip_type'])) : ?>
			<div class="content" itemprop="typeGrant">
			<?php echo wp_unslash($data['stip_type']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<?php if(isset($data['stip_doc_id']) && !empty($data['stip_doc_id'])) : ?>
	<div class="info-block">
		<div class="title">Копия локального нормативного правового акта, регламентирующего стипендиальное обеспечение</div>
		<div class="content">
			<a itemprop="localGrant" href="<?php echo (isset($data['stip_doc_url']) && !empty($data['stip_doc_url'])) ? $data['stip_doc_url'] : ''?>" title="Размер платы" target="_blank"><?php echo (isset($data['stip_doc_name']) && !empty($data['stip_doc_name'])) ? wp_unslash($data['stip_doc_name']) : 'Копия локального нормативного правового акта, регламентирующего стипендиальное обеспечение'?></a>
		</div>
	</div>
	<?php else:?>
	<div class="info-block">
		<div class="title">Копия локального нормативного правового акта, регламентирующего стипендиальное обеспечение</div>
		<div class="none-data">нет данных</div>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['stip_fed_id']) && !empty($data['stip_fed_id'])) : ?>
	<div class="info-block">
		<div class="title">Копия нормативного правового акта федерального уровня, регламентирующего стипендиальное обеспечение</div>
		<div class="content">
			<a itemprop="federalGrant" href="<?php echo (isset($data['stip_fed_url']) && !empty($data['stip_fed_url'])) ? $data['stip_fed_url'] : ''?>" title="Размер платы" target="_blank"><?php echo (isset($data['stip_fed_name']) && !empty($data['stip_fed_name'])) ? wp_unslash($data['stip_fed_name']) : 'Копия нормативного правового акта федерального уровня, регламентирующего стипендиальное обеспечение'?></a>
		</div>
	</div>
	<?php else:?>
	<div class="info-block">
		<div class="title">Копия нормативного правового акта федерального уровня, регламентирующего стипендиальное обеспечение</div>
		<div class="none-data">нет данных</div>
	</div>
	<?php endif;?>
	
	<div class="info-block">
		<div class="title">Общежитие, интернат (в том числе для лиц с ОВЗ)</div>		
		<?php if(isset($data['stip_obsh']) && !empty($data['stip_obsh'])) : ?>
			<div class="content" itemprop="hostelInfo">
			<?php echo wp_unslash($data['stip_obsh']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

	<div class="info-block hidden" hidden="">
		<div class="title">Общежитие, интернат (в том числе для лиц с ОВЗ)</div>		
		<?php if(isset($data['stip_obsh']) && !empty($data['stip_obsh'])) : ?>
			<div class="content" itemprop="hostelInfoOvz">
			<?php echo wp_unslash($data['stip_obsh']);?>
			</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Количество жилых помещений в общежитии, интернате для иногородних обучающихся (в том числе для лиц с ОВЗ)</div>	
		<?php if(isset($data['stip_kol']) && !empty($data['stip_kol'])) : ?>
			<div class="content" itemprop="hostelNum">
			<?php echo wp_unslash($data['stip_kol']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block hidden" hidden="">
		<div class="title">Количество жилых помещений в общежитии, интернате для иногородних обучающихся (в том числе для лиц с ОВЗ)</div>	
		<?php if(isset($data['stip_kol']) && !empty($data['stip_kol'])) : ?>
			<div class="content" itemprop="hostelNumOvz">
			<?php echo wp_unslash($data['stip_kol']);?>
			</div>		
		<?php endif;?>		
	</div>
	<?php if(isset($data['stip_obsh_id']) && !empty($data['stip_obsh_id'])) : ?>
	<div class="info-block">
		<div class="title">Копия локального нормативного акта, регламентирующего размер платы за пользование жилым помещением и коммунальные услуги в общежитии</div>
		<div class="content">
			<a itemprop="localActObSt" href="<?php echo (isset($data['stip_obsh_url']) && !empty($data['stip_obsh_url'])) ? $data['stip_obsh_url'] : ''?>" title="Размер платы" target="_blank"><?php echo (isset($data['stip_obsh_name']) && !empty($data['stip_obsh_name'])) ? wp_unslash($data['stip_obsh_name']) : 'Акт, регламентирующий размер платы за пользование жилым помещением и коммунальные услуги в общежитии'?></a>
		</div>
	</div>
	<?php else:?>
	<div class="info-block">
		<div class="title">Копия локального нормативного акта, регламентирующего размер платы за пользование жилым помещением и коммунальные услуги в общежитии</div>
		<div class="none-data">нет данных</div>
	</div>
	<?php endif;?>
	<div class="info-block">
		<div class="title">Иные виды материальной поддержки обучающихся</div>	
		<?php if(isset($data['stip_other']) && !empty($data['stip_other'])) : ?>
			<div class="content" itemprop="support">
			<?php echo wp_unslash($data['stip_other']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

	<div class="info-block">
		<div class="title">Трудоустройство выпускников</div>		
		<?php if(isset($data['stiptrud']) && !empty($data['stiptrud'])) : ?>
			<div class="content" itemprop = "graduateJob">
			<?php echo $data['stiptrud'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
</div>