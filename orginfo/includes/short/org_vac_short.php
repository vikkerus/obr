<?php $data = org_vac_front(); ?>

<div class="org-front vac">
	<div class="info-block">
		<div class="title">Вакантные места для приема (перевода)</div>		
		<?php if(isset($data['vacinfo']) && !empty($data['vacinfo'])) : ?>
			<div class="content" itemprop="vacant" itemscope itemtype="http://obrnadzor.gov.ru/microformats/Vacant">
			<?php echo $data['vacinfo'];?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
</div>