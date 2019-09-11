<?php $data = org_fhd_front(); ?>

<div class="org-front fhd" itemprop="volume">

	<div class="info-block">
		<div class="title">Объем образовательной деятельности, финансовое обеспечение которой осуществляется за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов, по договорам об образовании за счет средств физических и (или) юридических лиц</div>		
		<?php if(isset($data['finob']) && !empty($data['finob'])) : ?>
			<div class="content" itemprop="finBFVolume finBRVolume finBMVolume finPVolume">
			<?php echo $data['finob'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>

	
	<div class="info-block">
		<div class="title">Поступление и расходовании финансовых и материальных средств</div>		
		<?php if(isset($data['finpo']) && !empty($data['finpo'])) : ?>
			<div class="content" itemprop="finRec">
			<?php echo $data['finpo'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

</div>