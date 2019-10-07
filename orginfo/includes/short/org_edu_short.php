<?php $data = org_edu_front(); ?>

<div class="org-front edu">
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
		<div class="title">Документы, регламентирующие образовательный процесс образовательной организации по <u>адаптированным</u> образовательным программам</div>	
		<?php if(isset($data['eduadop']) && !empty($data['eduadop'])) : ?>
			<div class="content">
			<?php echo $data['eduadop']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Документы, регламентирующие образовательный процесс образовательной организации по <u>неадаптированным</u> образовательным программам</div>	
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
		<?php if(isset($data['educhislen']) && !empty($data['educhislen'])) : ?>
			<div class="content">
			<?php echo $data['educhislen']?>
			</div>
		<?php else:?>
			<div class="none-data">нет данных</div>
		<?php endif;?>	
	</div>
	
	<div class="info-block">
		<div class="title">Информация о результатах приема с различными условиями приема</div>	
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
</div>
