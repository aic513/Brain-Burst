<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authorisation extends CI_Controller {

    public function index() {  //загружаем вьюху
        $this->load->view('header');
        $this->load->view('authorisation__form');
        $this->load->view('footer');
    }

    public function load() {
        $this->load->helper('file');  //подключаем функцию для работы с файлами в фреймворке
        $this->load->library('Return_string.php'); //подключаем класс,с написанной нами функцией
        $string =file_get_contents('./application/controllers/data.php'); //считывает весь файл в строку
        $email_enter = $this->input->post('email'); //то что ввели в поле email
        $passw_enter = $this->input->post('password');  //то что введи в поле пароль
        $return_data = $this->return_string->return_substring($string,$email_enter,$passw_enter); //ищем введеный email в файле
        if ($return_data) {
            redirect('/welcome/index/', 'refresh');
        }
       else {
       echo "ошибка входа,проверьте данные";
       $this->load->view('header');
        $this->load->view('authorisation__form');
        $this->load->view('footer');
       }
    }
}
