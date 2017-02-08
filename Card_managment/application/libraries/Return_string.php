<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Return_string {

    public function return_substring($string, $email_enter,$password_enter) {  //на вход поступает строка,email и пароль
        $serch_pos = strpos($string, $email_enter);  //сохраняем номер начальной позиции email
        $length_pas = strlen($password_enter);  //получаем длину пароля,введенного в поле
        $length_mail = strlen($email_enter);   //получаем длину e_mail,введенного в поле
        $sum = $length_pas + $length_mail +1;  //суммируем полученные значения из длин +пробел
        $result = substr($string, $serch_pos, $sum); // ищем подстроку в строке с позиции $search_pos длиной $sum
        $delete = explode(" ", $result); //разделяем в этой подстроке пару значений по пробелу
        $email = $delete[0];
        $password = $delete[1];
        if ($password_enter == $password){  //проверяем введенное значение в поле и пароль из файла
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

}
