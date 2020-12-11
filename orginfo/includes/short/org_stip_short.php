<?php $data = org_stip_front(); ?>

<div class="org-front stip" itemprop="grant" itemscope itemtype="http://obrnadzor.gov.ru/microformats/Grant">
	
	
	<?php if(isset($data['stip_doc_id']) && !empty($data['stip_doc_id'])) : ?>
	<div class="info-block">
		<div class="title">Копия локального нормативного правового акта, регламентирующего стипендиальное обеспечение</div>
		<div class="content">
			<a itemprop="localAct" href="<?php echo (isset($data['stip_doc_url']) && !empty($data['stip_doc_url'])) ? $data['stip_doc_url'] : ''?>" title="Размер платы" target="_blank"><?php echo (isset($data['stip_doc_name']) && !empty($data['stip_doc_name'])) ? wp_unslash($data['stip_doc_name']) : 'Копия локального нормативного правового акта, регламентирующего стипендиальное обеспечение'?></a>
		</div>
	</div>
	<?php else:?>
	<div class="info-block">
		<div class="title">Копия локального нормативного правового акта, регламентирующего стипендиальное обеспечение</div>
		<div class="none-data">нет данных</div>
	</div>
	<?php endif;?>
    
    <div class="info-block">
		<div class="title">Информация о предоставлении стипендии обучающимся</div>		
		<?php if(isset($data['grant']) && !empty($data['grant'])) : ?>
			<div class="content" itemprop = "grant">
			<?php echo $data['grant'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Информация о мерах социальной поддержки обучающихся</div>		
		<?php if(isset($data['support']) && !empty($data['support'])) : ?>
			<div class="content" itemprop = "support">
			<?php echo $data['support'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	<div class="info-block">
		<div class="title">Количество общежитий</div>		
		<?php if(isset($data['hostelInfo']) && !empty($data['hostelInfo'])) : ?>
			<div class="content" itemprop="hostelInfo">
			<?php echo wp_unslash($data['hostelInfo']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Количество интернатов̆</div>		
		<?php if(isset($data['interInfo']) && !empty($data['interInfo'])) : ?>
			<div class="content" itemprop="interInfo">
			<?php echo wp_unslash($data['interInfo']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Общая площадь общежитий</div>		
		<?php if(isset($data['hostelTS']) && !empty($data['hostelTS'])) : ?>
			<div class="content" itemprop="hostelTS">
			<?php echo wp_unslash($data['hostelTS']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Общая площадь интернатов</div>		
		<?php if(isset($data['interTS']) && !empty($data['interTS'])) : ?>
			<div class="content" itemprop="interTS">
			<?php echo wp_unslash($data['interTS']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Жилая площадь общежитий</div>		
		<?php if(isset($data['hostelLS']) && !empty($data['hostelLS'])) : ?>
			<div class="content" itemprop="hostelLS">
			<?php echo wp_unslash($data['hostelLS']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Жилая площадь интернатов</div>		
		<?php if(isset($data['interLS']) && !empty($data['interLS'])) : ?>
			<div class="content" itemprop="interTS">
			<?php echo wp_unslash($data['interLS']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Количество мест в общежитиях</div>		
		<?php if(isset($data['hostelNum']) && !empty($data['hostelNum'])) : ?>
			<div class="content" itemprop="hostelNum">
			<?php echo wp_unslash($data['hostelNum']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Количество мест в интернатах</div>		
		<?php if(isset($data['interNum']) && !empty($data['interNum'])) : ?>
			<div class="content" itemprop="interNum">
			<?php echo wp_unslash($data['interNum']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Обеспеченность общежитий 100% мягким и жестким инвентарем по установленным стандартным нормам</div>		
		<?php if(isset($data['hostelInv']) && !empty($data['hostelInv'])) : ?>
			<div class="content" itemprop = "hostelInv">
			<?php echo $data['hostelInv'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    <div class="info-block">
		<div class="title">Обеспеченность интернатов 100% мягким и жестким инвентарем по установленным стандартным нормам</div>		
		<?php if(isset($data['interInv']) && !empty($data['interInv'])) : ?>
			<div class="content" itemprop = "interInv">
			<?php echo $data['interInv'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    <div class="info-block">
		<div class="title">Наличие питания в общежитиях</div>		
		<?php if(isset($data['hostelFd']) && !empty($data['hostelFd'])) : ?>
			<div class="content" itemprop="hostelFd">
			<?php echo wp_unslash($data['hostelFd']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Наличие питания в интернатах</div>		
		<?php if(isset($data['interFd']) && !empty($data['interFd'])) : ?>
			<div class="content" itemprop="interFd">
			<?php echo wp_unslash($data['interFd']);?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    <div class="info-block">
		<div class="title">Информация о формировании платы за проживание в общежитии</div>		
		<?php if(isset($data['localAct']) && !empty($data['localAct'])) : ?>
			<div class="content" itemprop = "localActObSt">
			<?php echo $data['localAct'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    <div class="info-block">
		<div class="title">Информация о трудоустройстве выпускников</div>		
		<?php if(isset($data['graduateJob']) && !empty($data['graduateJob'])) : ?>
			<div class="content" itemprop = "graduateJob">
			<?php echo $data['graduateJob'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>

</div>