<?php 

	$data = org_paid_front(); 

	//$link_error = '<span class="link_error">(ссылка недействительна) </span>';

?>

<div class="org-front paid">
		<div class="info-block">
            <div class="title">Информация о порядке оказания платных образовательных услуг</div>		
            <?php if(isset($data['paidEdu']) && !empty($data['paidEdu'])) : ?>
                <div class="content" itemprop = "paidEdu">
                <?php echo $data['paidEdu'];?>
                </div>
            <?php else:?>
                <div class="none-data">нет данных</div>
            <?php endif;?>		
        </div>
    
		<div class="info-block">
            <div class="title">Информация об утверждении стоимости обучения по каждой образовательной прграмме</div>		
            <?php if(isset($data['paidPrice']) && !empty($data['paidPrice'])) : ?>
                <div class="content">
                <?php echo $data['paidPrice'];?>
                </div>
            <?php else:?>
                <div class="none-data">нет данных</div>
            <?php endif;?>		
        </div>
    
		<div class="info-block">
            <div class="title">Документ об установлении размера платы, взимаемой с родителей (законных представителей) за присмотр и уход за детьми</div>		
            <?php if(isset($data['paidParents']) && !empty($data['paidParents'])) : ?>
                <div class="content" itemprop = "paidParents">
                <?php echo $data['paidParents'];?>
                </div>
            <?php else:?>
                <div class="none-data">нет данных</div>
            <?php endif;?>		
        </div>
</div>
