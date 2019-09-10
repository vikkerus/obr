<?php 

	$data = obr_paid_front(); 

	//$link_error = '<span class="link_error">(ссылка недействительна) </span>';

?>

<div class="obr-front paid">
	<?php if(isset($data['plat']) && is_array($data['plat'])) : $plat = $data['plat']; ?>
	<div class="link-title">
		Документы о порядке оказания платных образовательных услуг, в том числе образец договора об оказании платных образовательных услуг, документ об утверждении стоимости обучения по каждой образовательной программе:
	</div>
	<div id="paid_links">
	<?php foreach($plat as $key => $val):?>
		<?php if((isset($val['docs_plat_link']) && !empty($val['docs_plat_link'])) || (isset($val['docs_plat_url']) && !empty($val['docs_plat_url']))) : ?>
		<div class="doc-block">
			<div class="content">
				<?php //echo (obr_get_status($val['docs_plat_link']) ? '' : $link_error)?>
				<a itemprop= "paidEdu" href="<?php echo ((isset($val['docs_plat_link'])) && (!empty($val['docs_plat_link'])) ? $val['docs_plat_link'] : $val['docs_plat_url'])?>" title="Порядок оказания платных образовательных услуг" target="_blank"><?php echo (isset($val['docs_plat_name']) && !empty($val['docs_plat_name'])) ? wp_unslash($val['docs_plat_name']) : 'Порядок оказания платных образовательных услуг'?></a>
			</div>
		</div>
		<?php endif;?>	
	<?php endforeach;?>
	</div>
	<?php else:?>
	<div class="link-title">
		Документы о порядке оказания платных образовательных услуг, в том числе образец договора об оказании платных образовательных услуг, документ об утверждении стоимости обучения по каждой образовательной программе:
	</div>
	<div class="none-data">нет данных</div>
	<?php endif;?>
</div>
