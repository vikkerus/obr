<?php 

	$data = obr_stand_front(); 

	//$link_error = '<span class="link_error">(ссылка недействительна) </span>';

?>

<div class="obr-front stand">
	<?php if(is_array($data) && !empty($data)) : ?>
	<div class="link-title">
		Копии федеральных государственных образовательных стандартов:
	</div>
	
	<div id="stand_links">
	<?php foreach($data as $key => $val):?>
		<?php if(isset($val['link']) && !empty($val['link'])) : ?>
		<div class="info-link">
			<?php //echo (obr_get_status($val['link']) ? '' : $link_error)?>
			<a itemprop="eduStandartDoc" href="<?php echo $val['link']?>" title="Образовательный стандарт" target="_blank"><?php echo (isset($val['name']) && !empty($val['name'])) ? wp_unslash($val['name']) : 'Копия федерального государственного образовательного стандарта'?></a>
		</div>
		<?php endif;?>						
	<?php endforeach;?>
	</div>
	<?php else:?>
		<div class="none-data">нет данных</div>
	<?php endif;?>
</div>
