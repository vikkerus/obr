<?php $data = check_new_columns();?>

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
    
    echo '<br>';
    
    if(!empty($data['mezhdu']) && is_array($data['mezhdu']))
    {
        // проверим, есть ли в массиве значений Доступная среда нулевые значения
        $mezhdu = in_array('0',$data['mezhdu'], true);
        
        // если есть, то выведем соответствующее сообщение
        if($mezhdu === true)
        {
            echo 'Раздел "Международное сотрудничество" присутствует не на всех сайтах. <b>Требуется обновление!</b>';
        }
        else
        {
            echo 'Раздел "Международное сотрудничество" присутствует на всех сайтах.';
        }
    }
}

?>


<form name="new_form" id="new_form" method="post" action="<?php echo (is_string($data['action']) ? $data['action'] : '')?>">
    <?php 	
        if (function_exists('wp_nonce_field'))
        {
            wp_nonce_field('new_form');
        }
    ?>
    <input style="margin-top: 15px;" class="form_btn" type="submit" value="Обновить" name="new_btn"> 
    <p><b>После нажатия кнопки "Обновить", обновите страницу, чтобы увидеть изменения!</b></p>
</form>


