<?php
/*
 * Plugin Name: Сведения об образовательной организации
 * Description: Плагин для создания страниц со сведениями об рбразовательной организации, в соответствии с законодательством РФ.
 * Version: 2.0
 * Author: RIAC
 * License: GPLv2 or later
 */


/*-----------------Удаление плагина-------------------*/

// проверка режима мультисайт

// проверить значение опции del_flag
// если значение 1  то удалять таблицы плагина
// так же удалить (при любом del flag) опцию del_flag из таблицы опций

// delete_site_option если мкльтисайт и delete_option если одиночный 

register_uninstall_hook(__FILE__, 'org_uninstall');

function org_uninstall()
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
				org_drop_table();
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
			org_drop_table();
		}
	}			
}

// функция удаления таблицы и опции
function org_drop_table()
{
	global $wpdb;
	
	// задаем название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

register_activation_hook( __FILE__, 'org_activate' );

// функция активации плагина
function org_activate($network_wide)
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
			org_create_table();
		}
		
		restore_current_blog();
	}
	else
	{
		// функция создания таблицы
		org_create_table();
	}
}


// функция создания таблицы
function org_create_table()
{
	global $wpdb;
	
	// задаем название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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
				('vacancy','Вакантные места для приема (перевода)'),
                ('dostup','Доступная среда'),
                ('mezhdu','Международное сотрудничество')
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
add_action( 'wp_insert_site', 'org_activate');        
 

/*-----------------Преобразование данных отчёта в CSV-------------------*/

// функция, преобразующая данные полученные в функции org_net_page() в файл CSV (возвращает имя файла)
function org_net_csv()
{
	// строка, которая будет записана в csv файл
	$CSV_str = '';
	
	$col_delimiter = ';'; 
	
	$row_delimiter = "\r\n";
	
	$link =  false;	
	
	if(function_exists('org_net_page'))
	{
		$data = org_net_page();
		
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
			
			$dir = $_SERVER['DOCUMENT_ROOT'].'/org_upload';
			
			// проверяем существование папки для загрузки документа, если нет, создаем
			if (!is_dir($dir))
			{
				mkdir($dir);
			}
			
			$file =  $dir.'/otchet.csv';
			
			// ссылка на файл без home/public_html в пути
			$link = site_url('/org_upload/otchet.csv');
			
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
function org_net_page()
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
						$table_name = $wpdb->base_prefix.'org_infotable';
						
						$option_table = $wpdb->base_prefix.'options';
					}
					else
					{
						$table_name = $wpdb->base_prefix.$val.'_org_infotable';
						
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
	
	load_template(dirname( __FILE__ ) . '/includes/network/org_net_page.php');
	
	return $data;
}


// функция вывода главной страницы плагина
function org_menu_page()
{	
	org_page();
}


// функция вывода страницы основных сведений
function org_main_info()
{
	echo '<h2 class="org_title">Основные сведения</h2>';
	
	org_main_info_page();
}


// функция вывода страницы структуры
function org_scructure()
{
	echo '<h2 class="org_title">Структура и органы управления образовательной организацией</h2>';
	
	org_structure_page();
}


// функция вывода страницы документов
function org_documents()
{
	echo '<h2 class="org_title">Документы</h2>';
	
	org_documents_page();
}


// функция вывода страницы образование
function org_education()
{
	echo '<h2 class="org_title">Образование</h2>';
	
	org_education_page();
}

	
// функция вывода страницы образовательные стандарты
function org_standart()
{
	echo '<h2 class="org_title">Образовательные стандарты</h2>';
	
	org_standart_page();
}	


// функция вывода страницы руководство
function org_pedagog()
{
	echo '<h2 class="org_title">Руководство. Педагогический (научно-педагогический) состав</h2>';
	
	org_pedagog_page();
}


// функция вывода страницы мто
function org_material()
{
	echo '<h2 class="org_title">Материально-техническое обеспечение и оснащенность образовательного процесса</h2>';
	
	org_material_page();
}


// функция вывода страницы стипендии
function org_stipend()
{
	echo '<h2 class="org_title">Стипендии и иные виды материальной поддержки</h2>';
	
	org_stipend_page();
}


// функция вывода страницы платных услуг
function org_platn()
{
	echo '<h2 class="org_title">Платные образовательные услуги</h2>';
	
	org_platn_page();
}


// функция вывода страницы фхд
function org_finance()
{
	echo '<h2 class="org_title">Финансово-хозяйственная деятельность</h2>';
	
	org_finance_page();
}


// функция вывода страницы вакантные места
function org_vacancy()
{
	echo '<h2 class="org_title">Вакантные места для приема (перевода)</h2>';
	
	org_vacancy_page();
}


// функция вывода страницы доступная среда
function org_dostup()
{
	echo '<h2 class="org_title">Доступная среда</h2>';
	
	org_dostup_page();
}


// функция вывода страницы международное сотрудничество
function org_sotrud()
{
	echo '<h2 class="org_title">Международное сотрудничество</h2>';
	
	org_sotrud_page();
}

/*-------------------Обработка данных------------------*/

// главная страница плагина
function org_page()
{
	load_template(dirname( __FILE__ ) . '/includes/org_page.php');
}


// страница настроек плагина
function org_settings()
{	
	$data = [];
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgset&amp;updated=true';
	
	if((($opt = get_option('del_flag')) !== false) && $opt !== '')
	{
		$data['opt'] = $opt;
	}
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['set_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgset'));
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
	
	load_template(dirname( __FILE__ ) . '/includes/org_settings.php');
	
	return $data;
}



// обработка данных на странице основных сведений
function org_main_info_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'main'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgmain&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['info_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgmain'));
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
			'info_fax'   => trim($_POST['info_fax']),
			'info_mail'  => trim($_POST['info_mail']),
			
			// данные из текстового редактора
			'infotime'   => wp_unslash($_POST['infotime']),
			'infouch'    => wp_unslash($_POST['infouch']),
			'infofil'    => wp_unslash($_POST['infofil']),
            'inforep'    => wp_unslash($_POST['inforep']),
            'infoplace'  => wp_unslash($_POST['infoplace']),
			
		];
		
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'main']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/org_main_info_page.php');
	
	return $data;
	
}


// обработка данных на странице структуры
function org_structure_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'structure'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgstruct&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['struct_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgstruct'));
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
		
	load_template(dirname( __FILE__ ) . '/includes/org_structure_page.php');
	
	return $data;
}


// обработка данных на странице документы
function org_documents_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'docs'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgdocs&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['docs_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgdocs'));
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
			'docs_paid_dog_link'   => trim($_POST['docs_paid_dog_link']),
			'docs_paid_uch_link'   => trim($_POST['docs_paid_uch_link']),
            'docs_paid_parent_link'   => trim($_POST['docs_paid_parent_link']),
			
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
			'docs_paid_dog_name'   => trim($_POST['docs_paid_dog_name']),
			'docs_paid_uch_name'   => trim($_POST['docs_paid_uch_name']),
            'docs_paid_parent_name'   => trim($_POST['docs_paid_parent_name']),
			
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
			'docs_paid_dog_id'   => trim($_POST['docs_paid_dog_id']),
			'docs_paid_uch_id'   => trim($_POST['docs_paid_uch_id']),
            'docs_paid_parent_id'   => trim($_POST['docs_paid_parent_id']),
			
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
			'docs_paid_dog_url'  => trim($_POST['docs_paid_dog_url']),
			'docs_paid_uch_url'  => trim($_POST['docs_paid_uch_url']),
            'docs_paid_parent_url'  => trim($_POST['docs_paid_parent_url']),
			
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
	
	load_template(dirname( __FILE__ ) . '/includes/org_documents_page.php');
	
	return $data;
}


// обработка данных на странице образование
function org_education_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'education'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgedu&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['edu_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgedu'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('edu_form');
		}
			
		$main_info = [
						
			// данные из текстового редактора
			'eduaccred' => wp_unslash($_POST['eduaccred']),
			'eduadop' => wp_unslash($_POST['eduadop']),
            'eduop' => wp_unslash($_POST['eduop']),
            'educhisl' => wp_unslash($_POST['educhisl']),
            'edupriem' => wp_unslash($_POST['edupriem']),
            'eduperevod' => wp_unslash($_POST['eduperevod']),
            'edunir' => wp_unslash($_POST['edunir']),
            'eduprac' => wp_unslash($_POST['eduprac']),
		
		];
			
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'education']);
			
	}
		
	load_template(dirname( __FILE__ ) . '/includes/org_education_page.php');
	
	return $data;
}


// обработка данных на странице образовfтельные стандарты
function org_standart_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'standart'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgstand&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['stand_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgstand'));
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
	
	load_template(dirname( __FILE__ ) . '/includes/org_standart_page.php');
	
	return $data;
}


// обработка данных на странице руковоство и педсостав
function org_pedagog_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'manage'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgped&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['ped_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgped'));
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
		
		if(isset($_POST['fil']) && is_array($_POST['fil']))
		{
			$main_info['fil'] = $_POST['fil'];
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
	
	load_template(dirname( __FILE__ ) . '/includes/org_pedagog_page.php');
	
	return $data;
}


// обработка данных на странице мто
function org_material_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'material'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgmat&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['mat_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgmat'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('mat_form');
		}
			
		$main_info = [
			
						
			// данные из текстового редактора
            'mtoplace' => wp_unslash($_POST['mtoplace']),
			'pcab'   => wp_unslash($_POST['pcab']),
			'pprac'  => wp_unslash($_POST['pprac']),
			'plib'   => wp_unslash($_POST['plib']),
			'psport' => wp_unslash($_POST['psport']),
			'meal'   => wp_unslash($_POST['meal']),
            'guard'  => wp_unslash($_POST['guard']),
            
            'facil'  => wp_unslash($_POST['facil']),
            'comnet' => wp_unslash($_POST['comnet']),
            'eios'   => wp_unslash($_POST['eios']),
            'own'    => wp_unslash($_POST['own']),
            'side'   => wp_unslash($_POST['side']),
            'bdec'   => wp_unslash($_POST['bdec']),
            'list'   => wp_unslash($_POST['list']),
           
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'material']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/org_material_page.php');
	
	return $data;
}


// обработка данных на странице стипендий
function org_stipend_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'stipend'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgstip&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['stip_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgstip'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('stip_form');
		}
		
		$main_info = [
			
			
			
			'stip_doc_id'   => trim($_POST['stip_doc_id']),
			'stip_doc_url'  => trim($_POST['stip_doc_url']),
			'stip_doc_name' => trim($_POST['stip_doc_name']),		
			
			'hostelInfo'     => trim($_POST['hostelInfo']),
            'interInfo'      => trim($_POST['interInfo']),
            'hostelTS'       => trim($_POST['hostelTS']),
            'interTS'        => trim($_POST['interTS']),
            'hostelLS'       => trim($_POST['hostelLS']),
            'interLS'        => trim($_POST['interLS']),
            'hostelNum'      => trim($_POST['hostelNum']),
            'interNum'       => trim($_POST['interNum']),
            'hostelFd'       => trim($_POST['hostelFd']),
            'interFd'        => trim($_POST['interFd']),
			
			
			// данные из текстового редактора
            'grant'          => wp_unslash($_POST['grant']),
			'support'        => wp_unslash($_POST['support']),
            'hostelInv'      => wp_unslash($_POST['hostelInv']),
            'interInv'       => wp_unslash($_POST['interInv']),
            'localAct'       => wp_unslash($_POST['localAct']),
            'graduateJob'    => wp_unslash($_POST['graduateJob']),
           
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'stipend']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/org_stipend_page.php');
	
	return $data;
}


// обработка данных на странице платных услуг
function org_platn_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'paid'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgplat&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['plat_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgplat'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('plat_form');
		}
			
        $main_info = [

            // данные из текстового редактора
            'paidEdu'     => wp_unslash($_POST['paidEdu']),
            'paidParents' => wp_unslash($_POST['paidParents']),

        ];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'paid']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/org_platn_page.php');
	
	return $data;
}


// обработка данных на странице ФХД
function org_finance_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'finance'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgfhd&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['fin_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgfhd'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('fin_form');
		}
		
		$main_info = [
			
			// данные из текстового редактора
			'finBFVolume'   => wp_unslash($_POST['finBFVolume']),
            'finBRVolume'   => wp_unslash($_POST['finBRVolume']),
            'finBMVolume'   => wp_unslash($_POST['finBMVolume']),
            'finPVolume'    => wp_unslash($_POST['finPVolume']),
            'volume'        => wp_unslash($_POST['volume']),
			
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'finance']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/org_finance_page.php');
	
	return $data;
}


// обработка данных на странице вакантные места
function org_vacancy_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'vacancy'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgvac&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['vac_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgvac'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('vac_form');
		}
		
		$main_info = [
			
			// данные из текстового редактора
			'vacinfo' => wp_unslash($_POST['vacinfo']),
			
		];
		
		if(isset($_POST['vac']) && is_array($_POST['vac']))
		{
			$main_info['vac'] = $_POST['vac'];
		}
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'vacancy']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/org_vacancy_page.php');
	
	return $data;
}



// обработка данных на странице доступная среда
function org_dostup_page()
{
    global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'dostup'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgdost&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['dost_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgdost'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('dost_form');
		}
			
		$main_info = [
			
            'facil'       => trim($_POST['facil']),
            'ovz'         => trim($_POST['ovz']),
            'net'         => trim($_POST['net']),
            'tech'        => trim($_POST['tech']),
            'hostel'      => trim($_POST['hostel']),
            'hostelnum'   => trim($_POST['hostelnum']),
            'internum'    => trim($_POST['internum']),
            
            
						
			// данные из текстового редактора
            'dostcab'     => wp_unslash($_POST['dostcab']),
            'dostprac'    => wp_unslash($_POST['dostprac']),
            'dostlib'     => wp_unslash($_POST['dostlib']),
            'dostsport'   => wp_unslash($_POST['dostsport']),
            'dostfood'    => wp_unslash($_POST['dostfood']),
            'dostohran'   => wp_unslash($_POST['dostohran']),
            
            'eorlink'     => wp_unslash($_POST['eorlink']),
            
            'other'       => wp_unslash($_POST['other']),
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'dostup']);
			
	}
	
	load_template(dirname( __FILE__ ) . '/includes/org_dostup_page.php');
	
	return $data;
}



// обработка данных на странице международное сотрудничество
function org_sotrud_page()
{
	global $wpdb;
	
	$data = [];
	
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	// проверяем, есть ли уже в базе данные
	$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'mezhdu'" );
	
	// ансериализация строки
	if(!empty($query) && is_string($query))
	{
		$data['restored'] = unserialize(base64_decode($query));
	}
	
	$data['action'] = $_SERVER['PHP_SELF'].'?page=orgsotr&amp;updated=true';
	
	// проверки прав пользователя и скрытых полей и запись данных в массив
	if (isset($_POST['sotr_btn']))
	{
		if (function_exists('current_user_can') && !current_user_can('manage_options'))
		{
			die(e_('Hacker?', 'orgsotr'));
		}
		
		if (function_exists('check_admin_referer'))
		{
			check_admin_referer('sotr_form');
		}
		
		$main_info = [
			
			// данные из текстового редактора
			'dog'  => wp_unslash($_POST['dog']),
            'accr' => wp_unslash($_POST['accr']),
			
		];
				
		// подготовка данных перед записью в базу
		$safe_string_main = base64_encode(serialize($main_info));
		
		$wpdb->show_errors();
		
		// запись сериализованной строки в базу
		$wpdb->update($table_name, ['section_data' => $safe_string_main], ['section_slug' => 'mezhdu']);
			
	}
	
    load_template(dirname( __FILE__ ) . '/includes/org_sotrud_page.php');
    
    return $data;
}


/*-------------------------Шорткоды-------------------------*/

// функция, собирающая параметры для страницы основных сведений на фронтэнде
function org_main_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_main] - основные сведения
function org_main_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_main_info_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_main_info_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_main', 'org_main_short' );



// функция, собирающая параметры для страницы структуры на фронтэнде
function org_struct_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_struct] - структура и органы управления
function org_struct_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_struct_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_struct_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_struct', 'org_struct_short' );



// функция, собирающая параметры для страницы документов на фронтэнде
function org_docs_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_docs] - документы
function org_docs_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_docs_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_docs_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_docs', 'org_docs_short' );



// функция, собирающая параметры для страницы образования на фронтэнде
function org_edu_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_edu] - образование
function org_edu_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_edu_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_edu_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_edu', 'org_edu_short' );



// функция, собирающая параметры для страницы образовательных стандартов на фронтэнде
function org_stand_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_stand] - образовательные стандарты
function org_stand_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_stand_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_stand_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_stand', 'org_stand_short' );



// функция, собирающая параметры для страницы руководства и педсостава на фронтэнде
function org_ped_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_ped] - руководство и педсостав
function org_ped_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_ped_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_ped_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_ped', 'org_ped_short' );



// функция, собирающая параметры для страницы материально-технического обеспечения на фронтэнде
function org_mto_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_mto] - материально-техническое обеспечение
function org_mto_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_mto_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_mto_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_mto', 'org_mto_short' );



// функция, собирающая параметры для страницы стипендий на фронтэнде
function org_stip_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_stip] - стипендии
function org_stip_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_stip_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_stip_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_stip', 'org_stip_short' );



// функция, собирающая параметры для страницы платных образовательных услуг на фронтэнде
function org_paid_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_paid] - платные образовательные услуги
function org_paid_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_paid_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_paid_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_paid', 'org_paid_short' );



// функция, собирающая параметры для страницы ФХД на фронтэнде
function org_fhd_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_fhd] - ФХД
function org_fhd_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_fhd_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_fhd_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_fhd', 'org_fhd_short' );



// функция, собирающая параметры для страницы вакантных мест на фронтэнде
function org_vac_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
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

// [org_fhd] - вакантные места
function org_vac_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_vac_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_vac_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_vac', 'org_vac_short' );




// [org_sveden] - главная страница сведений
function org_sveden_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_sveden_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_sveden_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_sveden', 'org_sveden_short' );




// функция, собирающая параметры для страницы доступной среды на фронтэнде
function org_dostup_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'dostup'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [org_dost] - доступная среда
function org_dostup_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_dostup_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_dostup_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_dost', 'org_dostup_short' );






// функция, собирающая параметры для страницы международное cотрудничество на фронтэнде
function org_sotrud_front()
{
	global $wpdb;
	
	// название таблицы
	$table_name = $wpdb->prefix . 'org_infotable' ;
	
	$data = '';
	
	// проверяем есть ли в базе таблица с таким же именем
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) 
	{
		// проверяем, есть ли уже в базе данные
		$query = $wpdb->get_var( "SELECT section_data FROM $table_name WHERE section_slug = 'mezhdu'" );

		// ансериализация строки
		if(!empty($query) && is_string($query))
		{
			$data = unserialize(base64_decode($query));
		}
	}
	
	return $data;
}

// [org_mezhd] - международное cотрудничество
function org_sotrud_short( $atts )
{
	$data = 'Страницы не существует.';
	
	if (file_exists(dirname( __FILE__ ) . '/includes/short/org_sotrud_short.php'))
	{
		// вызываем шаблон страницы		
		$data = load_template(dirname( __FILE__ ) . '/includes/short/org_sotrud_short.php');
	}
	
	return $data;
	
}
add_shortcode( 'org_mezhd', 'org_sotrud_short' );


/*--------------------Проверка ссылок-----------------------*/


// функция проверки ссылки на валидность
function org_check_url($url = '')
{	
	$return = false;
	
	if(preg_match('/^(?:([a-z]+):(?:([a-z]*):)?\/\/)?(?:([^:@]*)(?::([^:@]*))?@)?((?:[a-zа-я0-9_-]+\.)+[a-zа-я]{2,}|localhost|(?:(?:[01]?\d\d?|2[0-4]\d|25[0-5])\.){3}(?:(?:[01]?\d\d?|2[0-4]\d|25[0-5])))(?::(\d+))?(?:([^:\?\#]+))?(?:\?([^\#]+))?(?:\#([^\s]+))?$/iu', $url))
	{	
		$return = true;
	}
	
	return $return;
}


// функция проверки кодов состояния HTTP страницы по ссылке (временно не действительна!)
/*function org_get_status($url = '')
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
function org_add_menu_pages()
{
	add_menu_page( 'Сведения об Образовательной организации', 'Сведения об ОО', 'manage_options', 'orginfo', 'org_menu_page', 'dashicons-format-aside','81.1' );
	add_submenu_page( 'orginfo','Основные сведения', 'Основные сведения', 'manage_options', 'orgmain', 'org_main_info' );
	add_submenu_page( 'orginfo','Структура и органы управления образовательной организацией', 'Структура', 'manage_options', 'orgstruct', 'org_scructure' );
	add_submenu_page( 'orginfo','Документы', 'Документы', 'manage_options', 'orgdocs', 'org_documents' );
	add_submenu_page( 'orginfo','Образование', 'Образование', 'manage_options', 'orgedu', 'org_education' );
	add_submenu_page( 'orginfo','Образовательные стандарты', 'Образовательные стандарты', 'manage_options', 'orgstand', 'org_standart' );
	add_submenu_page( 'orginfo','Руководство. Педагогический (научно-педагогический) состав', 'Руководство. Педагогический состав', 'manage_options', 'orgped', 'org_pedagog' );
	add_submenu_page( 'orginfo','Материально-техническое обеспечение и оснащенность образовательного процесса', 'Материально-техническое обеспечение', 'manage_options', 'orgmat', 'org_material' );
	add_submenu_page( 'orginfo','Стипендии и иные виды материальной поддержки', 'Стипендии', 'manage_options', 'orgstip', 'org_stipend' );
	add_submenu_page( 'orginfo','Платные образовательные услуги', 'Платные образовательные услуги', 'manage_options', 'orgplat', 'org_platn' );
	add_submenu_page( 'orginfo','Финансово-хозяйственная деятельность', 'Финансово-хозяйственная деятельность', 'manage_options', 'orgfhd', 'org_finance' );  
    add_submenu_page( 'orginfo','Вакантные места для приема (перевода)', 'Вакантные места', 'manage_options', 'orgvac', 'org_vacancy' );
    
    add_submenu_page( 'orginfo','Доступная среда', 'Доступная среда', 'manage_options', 'orgdost', 'org_dostup' );
    
    add_submenu_page( 'orginfo','Международное сотрудничество', 'Международное сотрудничество', 'manage_options', 'orgsotr', 'org_sotrud' );
    
	add_submenu_page( 'orginfo','Настройки', 'Настройки', 'manage_options', 'orgset', 'org_settings' );
}


// функция добавляет пункты в административное меню СЕТИ
function org_network_menu_pages()
{
	add_menu_page( 'Сведения об Образовательной организации', 'Сведения об ОО', 'setup_network', 'orgnet', 'org_net_page', 'dashicons-format-aside','81.5' );
	
}


// подключение скриптов и стилей бэкэнда
function org_load_script()
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
	
	wp_register_style( 'orgstyle', plugins_url( 'assets/css/style.css', __FILE__ ), array(), null, 'all' );
	wp_enqueue_style( 'orgstyle' );
	
	wp_register_script( 'orgscript', plugins_url( 'assets/js/script.js', __FILE__ ), array('jquery'), null, true );
	wp_enqueue_script( 'orgscript' );
}

// скрипты и стили для фронтэнда
function org_front_style()
{	
	wp_register_style( 'orgfront', plugins_url( 'assets/css/front-style.css', __FILE__ ), array(), null, 'all' );
	wp_enqueue_style( 'orgfront' );
	
	wp_register_script( 'frontscript', plugins_url( 'assets/js/front-script.js', __FILE__ ), array('jquery'), null, true );
	wp_enqueue_script( 'frontscript' );
}

// подключение доп стиля для tinyMCE
function tiny_style() 
{
	add_editor_style( plugins_url( 'assets/css/editor-styles.css', __FILE__ ) );
}

// фикс, чтобы визувльный редактор сохранял теги в режиме редактирования "текст"
function pp_override_mce_options($initArray)
{ 
	$opts = '*[*]'; 
	
	$initArray['valid_elements'] = $opts; 
	
	$initArray['extended_valid_elements'] = $opts; 
	
	return $initArray; 
} 

add_filter('tiny_mce_before_init', 'pp_override_mce_options');


add_action( 'admin_enqueue_scripts', 'tiny_style' );
add_action( 'admin_enqueue_scripts', 'org_load_script' );
add_action( 'wp_enqueue_scripts', 'org_front_style' );
add_action( 'admin_menu', 'org_add_menu_pages' );
add_action( 'network_admin_menu', 'org_network_menu_pages' );
