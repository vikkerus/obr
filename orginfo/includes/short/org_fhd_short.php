<?php $data = org_fhd_front(); ?>

<div class="org-front fhd" itemprop="finSred">

	<div class="info-block">
		<div class="title">Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется за счет бюджетных ассигнований федерального бюджета</div>		
		<?php if(isset($data['finBFVolume']) && !empty($data['finBFVolume'])) : ?>
			<div class="content" itemprop="finBFVolume">
			<?php echo $data['finBFVolume'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется за счет бюджетов субъектов Российской Федерации</div>		
		<?php if(isset($data['finBRVolume']) && !empty($data['finBRVolume'])) : ?>
			<div class="content" itemprop="finBRVolume">
			<?php echo $data['finBRVolume'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется за счет местных бюджетов</div>		
		<?php if(isset($data['finBMVolume']) && !empty($data['finBMVolume'])) : ?>
			<div class="content" itemprop="finBMVolume">
			<?php echo $data['finBMVolume'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Информация об объеме образовательной деятельности, финансовое обеспечение которой осуществляется по договорам об образовании за счет средств физических и (или) юридических лиц</div>		
		<?php if(isset($data['finPVolume']) && !empty($data['finPVolume'])) : ?>
			<div class="content" itemprop="finPVolume">
			<?php echo $data['finPVolume'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
    
    <div class="info-block">
		<div class="title">Информация о поступлении и расходовании финансовых и материальных средств</div>		
		<?php if(isset($data['volume']) && !empty($data['volume'])) : ?>
			<div class="content" itemprop="volume">
			<?php echo $data['volume'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>

</div>