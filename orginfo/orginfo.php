<?php
/*
 * Plugin Name: Сведения об образовательной организации
 * Description: Плагин для создания страниц со сведениями об рбразовательной организации, в соответствии с законодательством РФ.
 * Version: 1.0
 * Author: Васильева Виолетта
 * License: GPLv2 or later
 */


/*-----------------Удаление плагина-------------------*/

// проверка режима мультисайт

// проверить значение опции del_flag
// если значение 1  то удалять таблицы плагина
// так же удалить (при любом del flag) опцию del_flag из таблицы опций

// delete_site_option если мкльтисайт и delete_option если одиночный 

register_uninstall_hook(__FILE__, 'obr_uninstall');

function obr_uninstall()
{
	// проверка режима мультисайт
	if ( is_multisite())
	{
		global $wpdb;
		
		// проверяем значение опции del_flag, если 1, то удалять таблицы и опцию
		if(get_option('del_flag') == 1)
		{
			// идентификаторы блогов в сети
			$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");

			foreach ($blogids as $blog_id)
			{
				switch_to_blog($blog_id);

				// функция удаления таблицы
				obr_drop_table();
			}

			restore_current_blog();
			}
	}
	else
	{
		// проверяем значение опции del_flag, если 1, то удалять таблицы и опцию
		if(get_option('del_flag') == 1)
		{
			// функция удаления таблицы
			obr_drop_table();
		}
	}			
}

// функция удаления таблицы и опции
function obr_drop_table()
{
	global $wpdb;
	
	// задаем название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем есть ли в базе таблица с таким же именем, если есть - удаляем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name)
	{
		$sql = "DROP TABLE IF EXISTS $table_name";
		
		$wpdb->query($sql);
	}
	
	// проверяем, есть ли в таблице опций опция def_flag, если есть - удаляем
	if (!empty($wpdb->get_var("SELECT option_id FROM $wpdb->options WHERE option_name = 'del_flag'")))
	{
		$del = "DELETE FROM $wpdb->options WHERE option_name = 'del_flag'";
		
		$wpdb->query($del);
	}
}


// подключаем файл нужный для работы с БД
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');



/*-----------------Активация плагина-------------------*/

register_activation_hook( __FILE__, 'obr_activate' );

// функция активации плагина
function obr_activate($network_wide)
{	
	// проверка режима мультисайт и активации для сети
	if ( is_multisite() && $network_wide )
	{	
		global $wpdb;
		
		// идентификаторы блогов в сети
		$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");

		foreach ($blogids as $blog_id)
		{
			switch_to_blog($blog_id);

			// функция создания таблицы
			obr_create_table();
		}
		
		restore_current_blog();
	}
	else
	{
		// функция создания таблицы
		obr_create_table();
	}
}


// функция создания таблицы
function obr_create_table()
{
	global $wpdb;
	
	// задаем название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем есть ли в базе таблица с таким же именем, если нет - создаем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) 
	{		
		// устанавливаем кодировку
		$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";
		
		// запрос на создание
		$sql = "CREATE TABLE {$table_name} (
			section_id int(5) unsigned NOT NULL auto_increment,
			section_slug varchar(255) NOT NULL default '',
			section_name text NOT NULL default '',
			section_data mediumblob NOT NULL default '',
			section_update_date TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY  (section_id)
		) {$charset_collate};";
		
		// создать таблицу
		dbDelta($sql);
		
		// добавляем основные данные
		$wpdb->query("
			INSERT INTO 
				$table_name(section_slug, section_name)
			VALUES
				('main','Основные сведения'),
				('structure','Структура и органы управления образовательной организацией'),
				('docs','Документы'),
				('education','Образование'),
				('standart','Образовательные стандарты'),
				('manage','Руководство. Педагогический (научно-педагогический) состав'),
				('material','Материально-техническое обеспечение и оснащенность образовательного процесса'),
				('stipend','Стипендии и иные виды материальной поддержки'),
				('paid','Платные образовательные услуги'),
				('finance','Финансово-хозяйственная деятельность'),
				('vacancy','Вакантные места для приема (перевода)')
		");
	}
	
	// проверяем наличие опции del_flag в таблице wp_options, если нет - создаем
	if(get_option('del_flag') == false)
	{
		// по умолчанию 0
		add_option( 'del_flag', 0 );
	}
}


// вызов хука с функцией проверки существования/создания таблицы плагина
add_action( 'wp_insert_site', 'obr_activate');        
 

/*-----------------Преобразование данных отчёта в CSV-------------------*/

// функция, преобразующая данные полученные в функции obr_net_page() в файл CSV (возвращает имя файла)
function obr_net_csv()
{
	// строка, которая будет записана в csv файл
	$CSV_str = '';
	
	$col_delimiter = ';'; 
	
	$row_delimiter = "\r\n";
	
	$link =  false;	
	
	if(function_exists('obr_net_page'))
	{
		$data = obr_net_page();
		
		$heads = [
			
			'ID сайта в сети',
			'Ссылка на сайт',
			'Название сайта (блога)',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			'Название раздела',
			'Дата изменения',
			
		];
		
		$import = [];
		
		if(is_array($data) && !empty($data))
		{
			foreach($data as $key => $item)
			{
				// запищем идентификаторы сайтов в массив для импорта
				(isset($item['id']) ? ($import[$key]['id'] = $item['id']) :'' );
				
				// запищем адреса сайтов в массив для импорта
				(isset($item['url']) ? ($import[$key]['url'] = $item['url']) :'' );
				
				// запищем названия сайтов в массив для импорта
				(isset($item['name']) ? ($import[$key]['name'] = $item['name']) :'' );
				
				if(isset($item['info']) && is_array($item['info']) && (!empty($item['info'])))
				{
					foreach($item['info'] as $subkey => $subitem)
					{
						(is_object($subitem) ? ($subitem = (array)$subitem) : '' );
						
						// запищем названия разделов в массив для импорта
						(isset($subitem['section_name']) ? ($import[$key]['section_name'.$subkey] = $subitem['section_name']) :'' );
						
						// запищем даты изменения разделов в массив для импорта
						(isset($subitem['section_update_date']) ? ($import[$key]['section_update'.$subkey] = $subitem['section_update_date']) :'' );
					}
				}
			}
		}
		
		// добавляем заголовки столбцов в начало массива для импорта
		array_unshift($import, $heads);
		
		// перебираем все данные
		if(is_array($import))
		{
			foreach( $import as $row )
			{
				$cols = [];

				foreach( $row as $col_val )
				{
					// строки должны быть в кавычках ""					
					// кавычки " внутри строк нужно предварить такой же кавычкой "
					if( $col_val && preg_match('/[",;\r\n]/', $col_val) )
					{
						// поправим перенос строки
						if( $row_delimiter === "\r\n" )
						{
							$col_val = str_replace( "\r\n", '\n', $col_val );
							$col_val = str_replace( "\r", '', $col_val );
						}
						elseif( $row_delimiter === "\n" ){
							$col_val = str_replace( "\n", '\r', $col_val );
							$col_val = str_replace( "\r\r", '\r', $col_val );
						}

						$col_val = str_replace( '"', '""', $col_val ); // предваряем "
						
						$col_val = '"'. $col_val .'"'; // обрамляем в "
					}

					$cols[] = $col_val; // добавляем колонку в данные
				}

				$CSV_str .= implode( $col_delimiter, $cols ) . $row_delimiter; // добавляем строку в данные
			}
			
			$CSV_str = rtrim( $CSV_str, $row_delimiter );
			
			$dir = $_SERVER['DOCUMENT_ROOT'].'/obr_upload';
			
			// проверяем существование папки для загрузки документа, если нет, создаем
			if (!is_dir($dir))
			{
				mkdir($dir);
			}
			
			$file =  $dir.'/otchet.csv';
			
			// ссылка на файл без home/public_html в пути
			$link = site_url('/obr_upload/otchet.csv');
			
			// удаляем старый/предыдущий файл если существует
			if(file_exists($file))
			{
				unlink($file);
			}
			
			// задаем кодировку cp1251 для строки
			$CSV_str = iconv( "UTF-8", "cp1251",  $CSV_str );

			// создаем csv файл и записываем в него строку
			$done = file_put_contents( $file, $CSV_str );
			
			return $done ? $link : false;		
		}
	}
	
	return $link;
}

/*-----------------Функции вывода пунктов меню/страниц-------------------*/

// функция вывода страницы c отчётами для сети 
function obr_net_page()
{	
	$data = [];
	
	if ( is_multisite())
	{
		global $wpdb;
		
		// идентификаторы блогов в сети
		$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
		
		// проверяем есть ли массив с идентификаторами
		if(isset($blogids) && is_array($blogids))
		{
			// формируем ассоциативный массив, в котором ключ - номер идентификатора
			foreach ($blogids as $blog_id)
			{	
				$ids[$blog_id] = $blog_id;								
			}
			
			if(is_array($ids) && !empty($ids))
			{
				foreach($ids as $key => $val)
				{
					if($val == 1)
					{
						$table_name = $wpdb->base_prefix.'obr_infotable';
						
						$option_table = $wpdb->base_prefix.'options';
					}
					else
					{
						$table_name = $wpdb->base_prefix.$val.'_obr_infotable';
						
						$option_table = $wpdb->base_prefix.$val.'_options';
					}
					
					if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'"))
					{						
						// формируем запрос на выборку данных из таблиц плагина для каждого блога
						$query = "SELECT section_id, section_name, section_update_date FROM $table_name";

						$data[$key]['info'] = $wpdb->get_results($query); 
						
						$data[$key]['id'] = $key;
						
						// формируем запросы на выборку данных о сайте из таблицы опций
						$data[$key]['url'] = $wpdb->get_var("SELECT option_value FROM $option_table WHERE option_name = 'siteurl'");
						
						$data[$key]['name'] = $wpdb->get_var("SELECT option_value FROM $option_table WHERE option_name = 'blogname'");
					}				
				}				
			}			
		}
	}
	
	load_template(dirname( __FILE__ ) . '/includes/network/obr_net_page.php');
	
	return $data;
}


// функция вывода главной страницы плагина
function obr_menu_page()
{	
	obr_page();
}


// функция вывода страницы основных сведений
function obr_main_info()
{
	echo '<h2 class="obr_title">Основные сведения</h2>';
	
	obr_main_info_page();
}


// функция вывода страницы структуры
function obr_scructure()
{
	echo '<h2 class="obr_title">Структура и органы управления образовательной организацией</h2>';
	
	obr_structure_page();
}


// функция вывода страницы документов
function obr_documents()
{
	echo '<h2 class="obr_title">Документы</h2>';
	
	obr_documents_page();
}


// функция вывода страницы образование
function obr_education()
{
	echo '<h2 class="obr_title">Образование</h2>';
	
	obr_education_page();
}

	
// функция вывода страницы образовательные стандарты
function obr_standart()
{
	echo '<h2 class="obr_title">Образовательные стандарты</h2>';
	
	obr_standart_page();
}	


// функция вывода страницы руководство
function obr_pedagog()
{
	echo '<h2 class="obr_title">Руководство. Педагогический (научно-педагогический) состав</h2>';
	
	obr_pedagog_page();
}


// функция вывода страницы мто
function obr_material()
{
	echo '<h2 class="obr_title">Материально-техническое обеспечение и оснащенность образовательного процесса</h2>';
	
	obr_material_page();
}


// функция вывода страницы стипендии
function obr_stipend()
{
	echo '<h2 class="obr_title">Стипендии и иные виды материальной поддержки</h2>';
	
	obr_stipend_page();
}


// функция вывода страницы платных услуг
function obr_platn()
{
	echo '<h2 class="obr_title">Платные образовательные услуги</h2>';
	
	obr_platn_page();
}


// функция вывода страницы фхд
function obr_finance()
{
	echo '<h2 class="obr_title">Финансово-хозяйственная деятельность</h2>';
	
	obr_finance_page();
}


// функция вывода страницы вакантные места
function obr_vacancy()
{
	echo '<h2 class="obr_title">Вакантные места для приема (перевода)</h2>';
	
	obr_vacancy_page();
}

/*-------------------Обработка данных------------------*/

// главная страница плагина
function obr_page()
{
	load_template(dirname( __FILE__ ) . '/includes/obr_page.php');
}


// страница настроек плагина
function obr_settings()
{	
	$data = [];
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrset&amp;updated=true';
	
	if((($opt = get_option('del_flag')) !== false) && $opt !== '')
	{
		$data['opt'] = $opt;
	}
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['set_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrset'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('set_form');
		}
			
		$main_info = [
			
			'delflag'  => $_POST['delflag'],
			
		];
		
		// проверяем, есть ли опция del_flag
		if(get_option('del_flag') !== false)
		{
			// если есть, то в соответствии с пост значением меняем значение опции
			update_option( 'del_flag', $main_info['delflag'] );
		}
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_settings.php');
	
	return $data;
}



// обработка данных на странице основных сведений
function obr_main_info_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'main'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrmain&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['info_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrmain'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('info_form');
		}
		
		
		$main_info = [
			
			'info_name'  => trim($_POST['info_name']),
			'info_date'  => trim($_POST['info_date']),		
			'info_place' => trim($_POST['info_place']),
			'info_tel'   => trim($_POST['info_tel']),
			'info_mail'  => trim($_POST['info_mail']),
			
			// данные из текстового редактора
			'infotime'   => wp_unslash($_POST['infotime']),
			'infouch'    => wp_unslash($_POST['infouch']),
			'infofil'    => wp_unslash($_POST['infofil']),
			
		];
		
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'main']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_main_info_page.php');
	
	return $data;
	
}


// обработка данных на странице структуры
function obr_structure_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'structure'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrstruct&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['struct_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrstruct'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('struct_form');
		}
		
		$main_info = [
			
			'struct_img_url' => trim($_POST['struct_img_url']),
			'struct_img_id'  => trim($_POST['struct_img_id']),	
		];
		
		if(isset($_POST['structs']) && is_array($_POST['structs']))
		{
			$main_info['structs'] = $_POST['structs'];
		}
		
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'structure']);
			
	}
		
	load_template(dirname( __FILE__ ) . '/includes/obr_structure_page.php');
	
	return $data;
}


// обработка данных на странице документы
function obr_documents_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'docs'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrdocs&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['docs_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrdocs'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('docs_form');
		}
		
		$main_info = [
			
			// ссылки на документы
			'docs_ust_link'    => trim($_POST['docs_ust_link']),
			'docs_lic_link'    => trim($_POST['docs_lic_link']),
			'docs_accr_link'   => trim($_POST['docs_accr_link']),
			'docs_priem_link'  => trim($_POST['docs_priem_link']),
			'docs_zan_link'    => trim($_POST['docs_zan_link']),
			'docs_att_link'    => trim($_POST['docs_att_link']),
			'docs_per_link'    => trim($_POST['docs_per_link']),
			'docs_voz_link'    => trim($_POST['docs_voz_link']),
			'docs_stud_link'   => trim($_POST['docs_stud_link']),
			'docs_ord_link'    => trim($_POST['docs_ord_link']),
			'docs_col_link'    => trim($_POST['docs_col_link']),
			'docs_pom_link'    => trim($_POST['docs_pom_link']),
			'docs_paid_link'   => trim($_POST['docs_paid_link']),
			
			// заголовки документов в базе ВП
			'docs_ust_name'    => trim($_POST['docs_ust_name']),		
			'docs_lic_name'    => trim($_POST['docs_lic_name']),
			'docs_accr_name'   => trim($_POST['docs_accr_name']),
			'docs_priem_name'  => trim($_POST['docs_priem_name']),
			'docs_zan_name'    => trim($_POST['docs_zan_name']),
			'docs_att_name'    => trim($_POST['docs_att_name']),
			'docs_per_name'    => trim($_POST['docs_per_name']),
			'docs_voz_name'    => trim($_POST['docs_voz_name']),			
			'docs_stud_name'   => trim($_POST['docs_stud_name']),
			'docs_ord_name'    => trim($_POST['docs_ord_name']),
			'docs_col_name'    => trim($_POST['docs_col_name']),
			'docs_pom_name'    => trim($_POST['docs_pom_name']),
			'docs_paid_name'   => trim($_POST['docs_paid_name']),
			
			// id документов в базе ВП
			'docs_ust_id'    => trim($_POST['docs_ust_id']),		
			'docs_lic_id'    => trim($_POST['docs_lic_id']),
			'docs_accr_id'   => trim($_POST['docs_accr_id']),
			'docs_priem_id'  => trim($_POST['docs_priem_id']),
			'docs_zan_id'    => trim($_POST['docs_zan_id']),
			'docs_att_id'    => trim($_POST['docs_att_id']),
			'docs_per_id'    => trim($_POST['docs_per_id']),
			'docs_voz_id'    => trim($_POST['docs_voz_id']),			
			'docs_stud_id'   => trim($_POST['docs_stud_id']),
			'docs_ord_id'    => trim($_POST['docs_ord_id']),
			'docs_col_id'    => trim($_POST['docs_col_id']),
			'docs_pom_id'    => trim($_POST['docs_pom_id']),
			'docs_paid_id'   => trim($_POST['docs_paid_id']),
			
			// url'ы документов в базе ВП
			'docs_ust_url'   => trim($_POST['docs_ust_url']),		
			'docs_lic_url'   => trim($_POST['docs_lic_url']),
			'docs_accr_url'  => trim($_POST['docs_accr_url']),
			'docs_priem_url' => trim($_POST['docs_priem_url']),
			'docs_zan_url'   => trim($_POST['docs_zan_url']),
			'docs_att_url'   => trim($_POST['docs_att_url']),
			'docs_per_url'   => trim($_POST['docs_per_url']),
			'docs_voz_url'   => trim($_POST['docs_voz_url']),			
			'docs_stud_url'  => trim($_POST['docs_stud_url']),
			'docs_ord_url'   => trim($_POST['docs_ord_url']),
			'docs_col_url'   => trim($_POST['docs_col_url']),
			'docs_pom_url'   => trim($_POST['docs_pom_url']),
			'docs_paid_url'  => trim($_POST['docs_paid_url']),
			
			// данные из текстового редактора
			'docother'   => wp_unslash($_POST['docother']),
			
		];
		
		if(isset($_POST['otch']) && is_array($_POST['otch']))
		{
			$main_info['otch'] = $_POST['otch'];
		}
		
		if(isset($_POST['pred']) && is_array($_POST['pred']))
		{
			$main_info['pred'] = $_POST['pred'];
		}
		
		if(isset($_POST['sam']) && is_array($_POST['sam']))
		{
			$main_info['sam'] = $_POST['sam'];
		}
		
		if(isset($_POST['fhd']) && is_array($_POST['fhd']))
		{
			$main_info['fhd'] = $_POST['fhd'];
		}
		
		
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'docs']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_documents_page.php');
	
	return $data;
}


// обработка данных на странице образование
function obr_education_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'education'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obredu&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['edu_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obredu'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('edu_form');
		}
			
		$main_info = [
			
			'edu_main_lev'  => trim($_POST['edu_main_lev']),
			'edu_main_form' => trim($_POST['edu_main_form']),
			'edu_main_norm' => trim($_POST['edu_main_norm']),
			'edu_main_accr' => trim($_POST['edu_main_accr']),
			
			'edu_copy_id'   => trim($_POST['edu_copy_id']),
			'edu_copy_url'  => trim($_POST['edu_copy_url']),
			'edu_copy_name' => trim($_POST['edu_copy_name']),
			
			'edu_uch_id'   => trim($_POST['edu_uch_id']),
			'edu_uch_url'  => trim($_POST['edu_uch_url']),
			'edu_uch_name' => trim($_POST['edu_uch_name']),
			
			'edu_cal_id'   => trim($_POST['edu_cal_id']),
			'edu_cal_url'  => trim($_POST['edu_cal_url']),
			'edu_cal_name' => trim($_POST['edu_cal_name']),
			
			'edu_lang'     => trim($_POST['edu_lang']),
			'edu_nid'      => trim($_POST['edu_nid']),
			'edu_resot'    => trim($_POST['edu_resot']),
			
			// данные из текстового редактора
			'edumet'   => wp_unslash($_POST['edumet']),
			'edurespr' => wp_unslash($_POST['edurespr']),
			'eduino'   => wp_unslash($_POST['eduino']),
			
		];
		
		if(isset($_POST['edu']) && is_array($_POST['edu']))
		{
			$main_info['edu'] = $_POST['edu'];
		}
		
		
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'education']);
			
	}
		
	load_template(dirname( __FILE__ ) . '/includes/obr_education_page.php');
	
	return $data;
}


// обработка данных на странице образовfтельные стандарты
function obr_standart_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'standart'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrstand&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['stand_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrstand'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('stand_form');
		}
		
		if(isset($_POST['stand']) && is_array($_POST['stand']))
		{
			$main_info = $_POST['stand'];
		}
		
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'standart']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_standart_page.php');
	
	return $data;
}


// обработка данных на странице руковоство и педсостав
function obr_pedagog_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'manage'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrped&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['ped_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrped'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('ped_form');
		}
			
		$main_info = [
			
			'ped_name'     => trim($_POST['ped_name']),
			'ped_pos'      => trim($_POST['ped_pos']),
			'ped_tel'      => trim($_POST['ped_tel']),
			'ped_mail'     => trim($_POST['ped_mail']),
			'ped_ruc_id'   => trim($_POST['ped_ruc_id']),
			'ped_ruc_url'  => trim($_POST['ped_ruc_url'])
			
		];
		
		if(isset($_POST['zam']) && is_array($_POST['zam']))
		{
			$main_info['zam'] = $_POST['zam'];
		}
		
		if(isset($_POST['ped']) && is_array($_POST['ped']))
		{
			$main_info['ped'] = $_POST['ped'];
		}
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'manage']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_pedagog_page.php');
	
	return $data;
}


// обработка данных на странице мто
function obr_material_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'material'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrmat&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['mat_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrmat'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('mat_form');
		}
			
		$main_info = [
			
			'mat_copy_name' => trim($_POST['mat_copy_name']),
			'mat_copy_id'   => trim($_POST['mat_copy_id']),
			'mat_copy_url'  => trim($_POST['mat_copy_url']),
			'mat_uch'       => trim($_POST['mat_uch']),
			'mat_pract'     => trim($_POST['mat_pract']),
			'mat_bibl'      => trim($_POST['mat_bibl']),
			'mat_sport'     => trim($_POST['mat_sport']),
			'mat_vos'       => trim($_POST['mat_vos']),
			'mat_ohr'       => trim($_POST['mat_ohr']),
			'mat_its'       => trim($_POST['mat_its']),
			
			// данные из текстового редактора
			'matres'   => wp_unslash($_POST['matres']),
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'material']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_material_page.php');
	
	return $data;
}


// обработка данных на странице стипендий
function obr_stipend_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'stipend'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrstip&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['stip_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrstip'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('stip_form');
		}
		
		$main_info = [
			
			'stip_obsh'      => trim($_POST['stip_obsh']),
			'stip_kol'       => trim($_POST['stip_kol']),
			'stip_obsh_id'   => trim($_POST['stip_obsh_id']),
			'stip_obsh_url'  => trim($_POST['stip_obsh_url']),
			'stip_obsh_name' => trim($_POST['stip_obsh_name']),
			'stip_other'     => trim($_POST['stip_other']),
			
			// данные из текстового редактора
			'stipusl'        => wp_unslash($_POST['stipusl']),
			'stiptrud'       => wp_unslash($_POST['stiptrud']),
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'stipend']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_stipend_page.php');
	
	return $data;
}


// обработка данных на странице платных услуг
function obr_platn_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'paid'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrplat&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['plat_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrplat'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('plat_form');
		}
		
		if(isset($_POST['plat']) && is_array($_POST['plat']))
		{
			$main_info['plat'] = $_POST['plat'];
		}
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'paid']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_platn_page.php');
	
	return $data;
}


// обработка данных на странице ФХД
function obr_finance_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'finance'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrfhd&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['fin_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrfhd'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('fin_form');
		}
		
		$main_info = [
			
			// данные из текстового редактора
			'finob' => wp_unslash($_POST['finob']),
			'finpo' => wp_unslash($_POST['finpo']),
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'finance']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_finance_page.php');
	
	return $data;
}


// обработка данных на странице вакантные места
function obr_vacancy_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'vacancy'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=obrvac&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['vac_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'obrvac'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('vac_form');
		}
		
		$main_info = [
			
			// данные из текстового редактора
			'vacinfo' => wp_unslash($_POST['vacinfo']),
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'vacancy']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/obr_vacancy_page.php');
	
	return $data;
}


/*-------------------------Шорткоды-------------------------*/

// функция, собирающая параметры для страницы основных сведений на фронтэнде
function obr_main_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'main'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_main] - основные сведения
function obr_main_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_main_info_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_main_info_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_main', 'obr_main_short' );



// функция, собирающая параметры для страницы структуры на фронтэнде
function obr_struct_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'structure'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_struct] - структура и органы управления
function obr_struct_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_struct_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_struct_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_struct', 'obr_struct_short' );



// функция, собирающая параметры для страницы документов на фронтэнде
function obr_docs_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'docs'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_docs] - документы
function obr_docs_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_docs_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_docs_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_docs', 'obr_docs_short' );



// функция, собирающая параметры для страницы образования на фронтэнде
function obr_edu_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'education'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_edu] - образование
function obr_edu_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_edu_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_edu_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_edu', 'obr_edu_short' );



// функция, собирающая параметры для страницы образовательных стандартов на фронтэнде
function obr_stand_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'standart'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_stand] - образовательные стандарты
function obr_stand_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_stand_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_stand_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_stand', 'obr_stand_short' );



// функция, собирающая параметры для страницы руководства и педсостава на фронтэнде
function obr_ped_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'manage'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_ped] - руководство и педсостав
function obr_ped_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_ped_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_ped_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_ped', 'obr_ped_short' );



// функция, собирающая параметры для страницы материально-технического обеспечения на фронтэнде
function obr_mto_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'material'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_mto] - материально-техническое обеспечение
function obr_mto_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_mto_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_mto_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_mto', 'obr_mto_short' );



// функция, собирающая параметры для страницы стипендий на фронтэнде
function obr_stip_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'stipend'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_stip] - стипендии
function obr_stip_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_stip_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_stip_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_stip', 'obr_stip_short' );



// функция, собирающая параметры для страницы платных образовательных услуг на фронтэнде
function obr_paid_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'paid'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_paid] - платные образовательные услуги
function obr_paid_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_paid_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_paid_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_paid', 'obr_paid_short' );



// функция, собирающая параметры для страницы ФХД на фронтэнде
function obr_fhd_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'finance'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_fhd] - ФХД
function obr_fhd_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_fhd_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_fhd_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_fhd', 'obr_fhd_short' );



// функция, собирающая параметры для страницы вакантных мест на фронтэнде
function obr_vac_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'obr_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'vacancy'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [obr_fhd] - вакантные места
function obr_vac_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_vac_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_vac_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_vac', 'obr_vac_short' );



// [obr_sveden] - главная страница сведений
function obr_sveden_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/obr_sveden_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/obr_sveden_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'obr_sveden', 'obr_sveden_short' );


/*--------------------Проверка ссылок-----------------------*/


// функция проверки ссылки на валидность
function obr_check_url($url = '')
{	
	$return = false;
	
	if(preg_match('/^(?:([a-z]+):(?:([a-z]*):)?\/\/)?(?:([^:@]*)(?::([^:@]*))?@)?((?:[a-zа-я0-9_-]+\.)+[a-zа-я]{2,}|localhost|(?:(?:[01]?\d\d?|2[0-4]\d|25[0-5])\.){3}(?:(?:[01]?\d\d?|2[0-4]\d|25[0-5])))(?::(\d+))?(?:([^:\?\#]+))?(?:\?([^\#]+))?(?:\#([^\s]+))?$/iu', $url))
	{	
		$return = true;
	}
	
	return $return;
}


// функция проверки кодов состояния HTTP страницы по ссылке (временно не действительна!)
/*function obr_get_status($url = '')
{
	$return = true;
	
	if(!empty($url))
	{
		$ch = curl_init($url);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		curl_exec($ch);
		
		$return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		curl_close($ch);
		
		// проверяем, есть ли в ответе код ошибки 4** 
		if(($return_code == 0) || (preg_match('/(4[0-9]*)/m', $return_code)))
		{
			$return  = false;
		}		
	}
	
	return $return;
}*/



/*------------------------------------------------------------*/

	
// функция добавляет пункты в административное меню
function obr_add_menu_pages()
{
	add_menu_page( 'Сведения об Образовательной организации', 'Сведения об ОО', 'manage_options', 'orginfo', 'obr_menu_page', 'dashicons-format-aside','81.1' );
	add_submenu_page( 'orginfo','Основные сведения', 'Основные сведения', 'manage_options', 'obrmain', 'obr_main_info' );
	add_submenu_page( 'orginfo','Структура и органы управления образовательной организацией', 'Структура', 'manage_options', 'obrstruct', 'obr_scructure' );
	add_submenu_page( 'orginfo','Документы', 'Документы', 'manage_options', 'obrdocs', 'obr_documents' );
	add_submenu_page( 'orginfo','Образование', 'Образование', 'manage_options', 'obredu', 'obr_education' );
	add_submenu_page( 'orginfo','Образовательные стандарты', 'Образовательные стандарты', 'manage_options', 'obrstand', 'obr_standart' );
	add_submenu_page( 'orginfo','Руководство. Педагогический (научно-педагогический) состав', 'Руководство. Педагогический состав', 'manage_options', 'obrped', 'obr_pedagog' );
	add_submenu_page( 'orginfo','Материально-техническое обеспечение и оснащенность образовательного процесса', 'Материально-техническое обеспечение', 'manage_options', 'obrmat', 'obr_material' );
	add_submenu_page( 'orginfo','Стипендии и иные виды материальной поддержки', 'Стипендии', 'manage_options', 'obrstip', 'obr_stipend' );
	add_submenu_page( 'orginfo','Платные образовательные услуги', 'Платные образовательные услуги', 'manage_options', 'obrplat', 'obr_platn' );
	add_submenu_page( 'orginfo','Финансово-хозяйственная деятельность', 'Финансово-хозяйственная деятельность', 'manage_options', 'obrfhd', 'obr_finance' );
	add_submenu_page( 'orginfo','Вакантные места для приема (перевода)', 'Вакантные места', 'manage_options', 'obrvac', 'obr_vacancy' );
	add_submenu_page( 'orginfo','Настройки', 'Настройки', 'manage_options', 'obrset', 'obr_settings' );
}


// функция добавляет пункты в административное меню СЕТИ
function obr_network_menu_pages()
{
	add_menu_page( 'Сведения об Образовательной организации', 'Сведения об ОО', 'setup_network', 'obrnet', 'obr_net_page', 'dashicons-format-aside','81.5' );
	
}


// подключение скриптов и стилей бэкэнда
function obr_load_script()
{
	// cкрипты и стили медиа загрузчика
	if (function_exists('wp_enqueue_media')) {
		wp_enqueue_media();
	}
	else {
		wp_enqueue_style('thickbox');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
	}
	
	wp_register_script( 'fawesome', 'https://use.fontawesome.com/8aa69c98d5.js', array(), null, true );
	wp_enqueue_script( 'fawesome' );
	
	wp_register_style( 'obrstyle', plugins_url( 'assets/css/style.css', __FILE__ ), array(), null, 'all' );
	wp_enqueue_style( 'obrstyle' );
	
	wp_register_script( 'obrscript', plugins_url( 'assets/js/script.js', __FILE__ ), array('jquery'), null, true );
	wp_enqueue_script( 'obrscript' );
}

// скрипты и стили для фронтэнда
function obr_front_style()
{
	wp_register_style( 'bootstyle', plugins_url( 'assets/css/bootstrap.min.css', __FILE__ ), array(), null, 'all' );
	wp_enqueue_style( 'bootstyle' );
	
	wp_register_script( 'bootscript', plugins_url( 'assets/js/bootstrap.min.js', __FILE__ ), array('jquery'), null, true );
	wp_enqueue_script( 'bootscript' );
	
	wp_register_style( 'obrfront', plugins_url( 'assets/css/front-style.css', __FILE__ ), array(), null, 'all' );
	wp_enqueue_style( 'obrfront' );
	
	wp_register_script( 'frontscript', plugins_url( 'assets/js/front-script.js', __FILE__ ), array('jquery'), null, true );
	wp_enqueue_script( 'frontscript' );
}

// подключение доп стиля для tinyMCE
function tiny_style() 
{
	add_editor_style( plugins_url( 'assets/css/editor-styles.css', __FILE__ ) );
}

add_action( 'admin_enqueue_scripts', 'tiny_style' );
add_action( 'admin_enqueue_scripts', 'obr_load_script' );
add_action( 'wp_enqueue_scripts', 'obr_front_style' );
add_action( 'admin_menu', 'obr_add_menu_pages' );
add_action( 'network_admin_menu', 'obr_network_menu_pages' );
