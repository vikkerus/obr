<h2 class="obr_title">Настройки</h2>

<?php 

$data = obr_settings();

// проверяем, есть ли в переданном массиве элемент action
if(isset($data['action'])) : ?>

<div class="settings-block">
	<form id="set_form" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>" method="post">
		<?php 	
			if (function_exists('wp_nonce_field'))
			{
				wp_nonce_field('set_form');
			}
		?>
		<div class="del">Удалять таблицы плагина при деинсталляции?</div>
		<p><i>Если сайт является главным в сети (в режиме мультисайт), то при удалении плагина для сети, дочерние сайты будут использовать значение, выбранное для родительского сайта. (прим. если выбрать "Да" для главного сайта, то при удалении плагина для сети, будут удалены таблицы для всех дочерних сайтов, независимо от выбранного варианта.)</i></p>
		<div class="switch">
	  		<input type="radio" class="switch-input" name="delflag" value="0" id="off" <?php echo (isset($data['opt']) && ($data['opt'] == 0) ? 'checked' : '')?>>
	  		<label for="off" class="switch-label switch-label-off">Нет</label>
	  		<input type="radio" class="switch-input" name="delflag" value="1" id="on" <?php echo (isset($data['opt']) && ($data['opt'] == 1) ? 'checked' : '')?>>
	  		<label for="on" class="switch-label switch-label-on">Да</label>
	  		<span class="switch-selection"></span>
		</div>
		<div class="button-block">
			<button type="submit" name="set_btn" class="form_btn">Сохранить</button>
		</div>
	</form>
</div>

<?php endif;?>
