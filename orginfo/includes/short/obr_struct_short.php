<?php $data = obr_struct_front(); ?>

<div class="obr-front structure">
	<?php if(isset($data['struct_img_url']) && !empty($data['struct_img_url'])) : ?>
	<div class="info-block image">	
		<img src="<?php echo $data['struct_img_url']?>" alt="Схема структуры"/>
	</div>
	<?php endif;?>
	
	<?php if(isset($data['structs']) && is_array($data['structs'])) : $structs = $data['structs']; ?>
	
	<div class="panel-group" id="obr_struct" role="tablist" aria-multiselectable="true">
		<?php foreach($structs as $key => $val):?>
		<?php if(isset($val['name']) && !empty($val['name'])) :?>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading<?php echo $key?>">
				<?php if(isset($val['name']) && !empty($val['name'])) : ?>			
				<a href="javascript:;" data-parent="#obr_struct" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse<?php echo $key?>" aria-expanded="false" aria-controls="collapse<?php echo $key?>">
					<?php echo wp_unslash($val['name']);?>
				</a>
				<?php endif;?>
			</div>

			<div id="collapse<?php echo $key?>" class="panel-collapse collapse" aria-labelledby="heading<?php echo $key?>" data-parent="#obr_struct" itemprop="structOrgUprav" role="tabpanel">
				<div class="panel-body">
					<div class="str-block">
						<div class="title">Наименование</div>				
						<?php if(isset($val['name']) && !empty($val['name'])) : ?>
							<div class="content" itemprop="name">
							<?php echo wp_unslash($val['name'])?>
							</div>
						<?php else:?>
							<div class="none-data">нет данных</div>
						<?php endif;?>		
					</div>
					

					<div class="str-block">
						<div class="title">Ф.И.О. руководителя</div>				
						<?php if(isset($val['fio']) && !empty($val['fio'])) : ?>
							<div class="content" itemprop="fio post">
							<?php echo wp_unslash($val['fio'])?>
							</div>
						<?php else:?>
							<div class="none-data">нет данных</div>
						<?php endif;?>	
					</div>


					<div class="str-block">
						<div class="title">Адрес</div>		
						<?php if(isset($val['place']) && !empty($val['place'])) : ?>
							<div class="content" itemprop="addressStr">
							<?php echo wp_unslash($val['place'])?>
							</div>
						<?php else:?>
							<div class="none-data">нет данных</div>
						<?php endif;?>					
					</div>

					
					<div class="str-block">
						<div class="title">Сайт</div>					
						<?php if(isset($val['site']) && !empty($val['site'])) : ?>
							<div class="content" itemprop="site">
							<?php echo wp_unslash($val['site'])?>
							</div>
						<?php else:?>
							<div class="none-data">нет данных</div>
						<?php endif;?>		
					</div>

					
					<div class="str-block">
						<div class="title">Электронная почта</div>				
						<?php if(isset($val['mail']) && !empty($val['mail'])) : ?>
							<div class="content" itemprop="email">
							<?php echo wp_unslash($val['mail'])?>
							</div>
						<?php else:?>
							<div class="none-data">нет данных</div>
						<?php endif;?>
					</div>
					
					
					<div class="str-block">
						<div class="title">Положение с приложением копии</div>			
						<?php if(isset($val['url']) && !empty($val['url'])) : ?>
						<div class="content" itemprop="divisionClauseDocLink">
							<a href="<?php echo (isset($val['url']) && !empty($val['url'])) ? $val['url'] : ''?>" title="Положение" target="_blank"><?php echo (isset($val['docs_name']) && !empty($val['docs_name'])) ? wp_unslash($val['docs_name']) : 'Положение о структурном подразделении'?></a>
						</div>
						<?php else:?>
							<div class="none-data">нет данных</div>
						<?php endif;?>						
					</div>
				</div>
			</div>
		</div>
		<?php else:?>
			<div class="none-data">нет данных о структурных подразделениях</div>
		<?php endif;?>
		<?php endforeach;?>
	</div>
	<?php else:?>
			<div class="none-data">нет данных</div>
	<?php endif;?>
</div>