<?php $data = check_new_columns(); echo '<pre>'; var_dump($data); echo '</pre>';?>

<?php

if(!empty($data) && is_array($data))
{    
    if(!empty($data['dostup']) && is_array($data['dostup']))
    {
        // проверим, есть ли в массиве значений Доступная среда нулевые значения
        $dostup = in_array('0',$data['dostup'], true);
        
        // если есть, то выведем соответствующее сообщение
        if($dostup === true)
        {
            echo 'Раздел "Доступная среда" присутствует не на всех сайтах. <b>Требуется обновление!</b>';
        }
        else
        {
            echo 'Раздел "Доступная среда" присутствует на всех сайтах.';
        }
    }
}

?>


