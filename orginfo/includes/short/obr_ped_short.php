<?php $data = obr_ped_front(); ?>

<div class="obr-front ped">
	<?php if(isset($data['ped_name']) && !empty($data['ped_name'])) : ?>
	<div class="ruc-block" itemprop="rucovodstvo rucovodstvoFil">
		<div class="ruc-title">Руководитель:</div>
		<div class="content-block">
			<?php if(isset($data['ped_ruc_url']) && !empty($data['ped_ruc_url'])) : ?>
			<div class="img-block">
				<img alt="Руководитель" src="<?php echo $data['ped_ruc_url'];?>"/>
			</div>
			<?php endif;?>
			<div class="text-block">
				<?php if(isset($data['ped_name']) && !empty($data['ped_name'])) : ?>
					<div class="title">Ф.И.О. руководителя</div>
					<div class="content"  itemprop="fio">
						<?php echo wp_unslash($data['ped_name']);?>
					</div>
				<?php endif;?>
				
				<?php if(isset($data['ped_pos']) && !empty($data['ped_pos'])) : ?>
					<div class="title">Должность</div>
					<div class="content" itemprop="post">
						<?php echo wp_unslash($data['ped_pos']);?>
					</div>
				<?php endif;?>
				
				<?php if(isset($data['ped_tel']) && !empty($data['ped_tel'])) : ?>
					<div class="title">Контактные телефоны</div>
					<div class="content" itemprop="telephone">
						<?php echo wp_unslash($data['ped_tel']);?>
					</div>
				<?php endif;?>
				
				<?php if(isset($data['ped_mail']) && !empty($data['ped_mail'])) : ?>
					<div class="title">Электронная почта</div>
					<div class="content" itemprop="email">
						<?php echo wp_unslash($data['ped_mail']);?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
	<?php endif;?>
	
	<div class="zam-block" itemprop="rucovodstvo rucovodstvoFil">
		<div class="ruc-title">Заместители руководителя:</div>
		<?php if(isset($data['zam']) && is_array($data['zam'])) : $zam = $data['zam']; ?>
		<div class="panel-group" id="obr_zam" role="tablist" aria-multiselectable="true">
			<?php foreach($zam as $key => $val):?>
			<?php if(isset($val['name']) && !empty($val['name'])) :?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?php echo $key?>">
					<?php if(isset($val['name']) && !empty($val['name'])) : ?>			
					<a href="javascript:;" data-parent="#obr_zam" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse<?php echo $key?>" aria-expanded="false" aria-controls="collapse<?php echo $key?>">
						<?php echo wp_unslash($val['name']);?>
					</a>
					<?php endif;?>
				</div>

				<div id="collapse<?php echo $key?>" class="panel-collapse collapse" aria-labelledby="heading<?php echo $key?>" data-parent="#obr_zam" role="tabpanel">
					<div class="panel-body">
						<?php if(isset($val['url']) && !empty($val['url'])) : ?>
						<div class="img-block">
							<img alt="Заместитель" src="<?php echo $val['url'];?>"/>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['name']) && !empty($val['name'])) : ?>
						<div class="zam-item">
							<div class="title">Ф.И.О. заместителя</div>
							<div class="content" itemprop="fio">
								<?php echo wp_unslash($val['name'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['post']) && !empty($val['post'])) : ?>
						<div class="zam-item">
							<div class="title">Должность</div>
							<div class="content" itemprop="post">
								<?php echo wp_unslash($val['post'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['tel']) && !empty($val['tel'])) : ?>
						<div class="zam-item">
							<div class="title">Контактные телефоны</div>
							<div class="content" itemprop="telephone">
								<?php echo wp_unslash($val['tel'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['mail']) && !empty($val['mail'])) : ?>
						<div class="zam-item">
							<div class="title">Электронная почта</div>
							<div class="content" itemprop="email">
								<?php echo wp_unslash($val['mail'])?>
							</div>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<?php endif;?>
			<?php endforeach;?>
		</div>
		<?php endif;?>
	</div>
	
	<div class="ped-block" itemprop="teachingStaff">
		<div class="ruc-title">Педагогические работники:</div>
		<?php if(isset($data['ped']) && is_array($data['ped'])) : $ped = $data['ped']; ?>
		<div class="panel-group" id="obr_ped" role="tablist" aria-multiselectable="true">
			<?php foreach($ped as $key => $val):?>
			<?php if(isset($val['name']) && !empty($val['name'])) :?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?php echo $key?>">
					<?php if(isset($val['name']) && !empty($val['name'])) : ?>			
					<a href="javascript:;" data-parent="#obr_ped" class="panel-title" role="button" data-toggle="collapse" data-target="#collapse<?php echo $key?>" aria-expanded="false" aria-controls="collapse<?php echo $key?>">
						<?php echo wp_unslash($val['name']);?>
					</a>
					<?php endif;?>
				</div>

				<div id="collapse<?php echo $key?>" class="panel-collapse collapse" aria-labelledby="heading<?php echo $key?>" data-parent="#obr_ped" role="tabpanel">
					<div class="panel-body">
						<?php if(isset($val['url']) && !empty($val['url'])) : ?>
						<div class="img-block">
							<img alt="Заместитель" src="<?php echo $val['url'];?>"/>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['name']) && !empty($val['name'])) : ?>
						<div class="zam-item">
							<div class="title">Ф.И.О. педагогического работника</div>
							<div class="content" itemprop="fio">
								<?php echo wp_unslash($val['name'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['post']) && !empty($val['post'])) : ?>
						<div class="zam-item">
							<div class="title">Должность</div>
							<div class="content" itemprop="post">
								<?php echo wp_unslash($val['post'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['dis']) && !empty($val['dis'])) : ?>
						<div class="zam-item">
							<div class="title">Преподаваемые дисциплины</div>
							<div class="content" itemprop= "teachingDiscipline">
								<?php echo wp_unslash($val['dis'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['step']) && !empty($val['step'])) : ?>
						<div class="zam-item">
							<div class="title">Ученая степень (или уровень образования)</div>
							<div class="content" itemprop= "teachingLevel degree">
								<?php echo wp_unslash($val['step'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['zvan']) && !empty($val['zvan'])) : ?>
						<div class="zam-item">
							<div class="title">Ученое звание (или квалификация)</div>
							<div class="content" itemprop= "teachingQual academStat">
								<?php echo wp_unslash($val['zvan'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['spec']) && !empty($val['spec'])) : ?>
						<div class="zam-item">
							<div class="title">Направления подготовки (или специальности)</div>
							<div class="content" itemprop= "employeeQualification">
								<?php echo wp_unslash($val['spec'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['qual']) && !empty($val['qual'])) : ?>
						<div class="zam-item">
							<div class="title">Данные о повышении квалификации (или профессиональной переподготовке) </div>
							<div class="content" itemprop= "profDevelopment">
								<?php echo wp_unslash($val['qual'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['sum']) && ($val['sum'] !='')) : ?>
						<div class="zam-item">
							<div class="title">Общий стаж работы</div>
							<div class="content" itemprop= "genExperience">
								<?php echo wp_unslash($val['sum'])?>
							</div>
						</div>
						<?php endif;?>
						
						<?php if(isset($val['ped']) && ($val['ped'] !='')) : ?>
						<div class="zam-item">
							<div class="title">Педагогический стаж работы</div>
							<div class="content" itemprop= "specExperience">
								<?php echo wp_unslash($val['ped'])?>
							</div>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<?php endif;?>
			<?php endforeach;?>
		</div>
		<?php endif;?>
	</div>
</div>