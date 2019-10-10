<?php $data = org_fhd_front(); ?>

<div class="org-front fhd" itemprop="volume">

	<div class="info-block">
		<div class="title">Сведения об объёме образовательной деятельности, финансовое обеспечение которой осуществляется за счёт <u>бюджетных ассигнований федерального бюджета</u></div>		
		<?php if(isset($data['finfb']) && !empty($data['finfb'])) : ?>
			<div class="content" itemprop="finBFVolume">
			<?php echo $data['finfb'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об объёме образовательной деятельности, финансовое обеспечение которой осуществляется за счёт <u>бюджетов субъектов Российской Федерации</u></div>		
		<?php if(isset($data['finbr']) && !empty($data['finbr'])) : ?>
			<div class="content" itemprop="finBRVolume">
			<?php echo $data['finbr'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об объёме образовательной деятельности, финансовое обеспечение которой осуществляется за счёт <u>местных бюджетов</u></div>		
		<?php if(isset($data['finmb']) && !empty($data['finmb'])) : ?>
			<div class="content" itemprop="finBMVolume">
			<?php echo $data['finmb'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения об объёме образовательной деятельности, финансовое обеспечение которой осуществляется по договорам об образовании за счёт <u>средств физических и (или) юридических лиц</u></div>		
		<?php if(isset($data['finfiz']) && !empty($data['finfiz'])) : ?>
			<div class="content" itemprop="finPVolume">
			<?php echo $data['finfiz'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения о поступлении и расходовании финансовых и материальных средств</div>		
		<?php if(isset($data['finpo']) && !empty($data['finpo'])) : ?>
			<div class="content" itemprop="finRec">
			<?php echo $data['finpo'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Планы финансово-хозяйственной деятельности</div>		
		<?php if(isset($data['finplan']) && !empty($data['finplan'])) : ?>
			<div class="content" itemprop="planFinRec">
			<?php echo $data['finplan'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>



</div>