<?php $data = org_edu_front(); ?>

<div class="org-front edu" itemprop="eduObrProg">
	<div class="info-block">
		<div class="title">Информация о сроке действия государственной аккредитации образовательной программы, о языках, на которых осуществляется образование (обучение)</div>	
		<?php if(isset($data['eduaccred']) && !empty($data['eduaccred'])) : ?>
			<div class="content">
			<?php echo $data['eduaccred']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>

    <div class="info-block">
		<div class="title">Наличие специальных <u>(адаптированных)</u> образовательных программ и методов обучения</div>	
		<?php if(isset($data['eduadop']) && !empty($data['eduadop'])) : ?>
			<div class="content">
			<?php echo $data['eduadop']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Наличие специальных <u>(неадаптированных)</u> образовательных программ и методов обучения</div>	
		<?php if(isset($data['eduop']) && !empty($data['eduop'])) : ?>
			<div class="content">
			<?php echo $data['eduop']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Информация о численности обучающихся по реализуемым образовательным программам</div>	
		<?php if(isset($data['educhisl']) && !empty($data['educhisl'])) : ?>
			<div class="content">
			<?php echo $data['educhisl']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Информация о результатах приема с различными условиями приема (на места, финансируемые за счет бюджетных ассигнований федерального бюджета, бюджетов субъектов Российской Федерации, местных бюджетов, по договорам об образовании за счет средств физических и (или) юридических лиц)</div>	
		<?php if(isset($data['edupriem']) && !empty($data['edupriem'])) : ?>
			<div class="content">
			<?php echo $data['edupriem']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Информация о результатах перевода, восстановления и отчисления</div>	
		<?php if(isset($data['eduperevod']) && !empty($data['eduperevod'])) : ?>
			<div class="content">
			<?php echo $data['eduperevod']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Информация о научно-исследовательской работе по каждой образовательной программе</div>	
		<?php if(isset($data['edunir']) && !empty($data['edunir'])) : ?>
			<div class="content">
			<?php echo $data['edunir']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
    
    <div class="info-block">
		<div class="title">Наличие практики</div>	
		<?php if(isset($data['eduprac']) && !empty($data['eduprac'])) : ?>
			<div class="content">
			<?php echo $data['eduprac']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
</div>
