<?php $data = org_fhd_front(); ?>

<div class="org-front fhd" itemprop="finSred">

	<div class="info-block">
		<div class="title">Сведения о поступлении финансовых и материальных средств</div>		
		<?php if(isset($data['finpost']) && !empty($data['finpost'])) : ?>
			<div class="content" itemprop="finPost">
			<?php echo $data['finpost'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
	
	<div class="info-block">
		<div class="title">Сведения о расходовании финансовых и материальных средств</div>		
		<?php if(isset($data['finras']) && !empty($data['finras'])) : ?>
			<div class="content" itemprop="finRas">
			<?php echo $data['finras'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>		
	</div>
</div>