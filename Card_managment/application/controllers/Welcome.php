<?php

ini_set('max_execution_time', 900);

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {  //Контроллер для карточек

    public function index() {            //загрузка первоначальной страницы
        $this->load->view('header');
        $this->load->view('form');
        $this->load->view('footer');
    }

    public function main() {                //добавление карт
//        $this->benchmark->mark('code_start');
        $serial = $this->input->post('serial'); // присваиваем значение в переменую для удобства
        $amount = $this->input->post('amount');
        $card = array(); //создаем пустой массив $card
        $time_form = $this->input->post('time'); //беру значения time из формы
        for ($i = 1; $i <= $amount; $i++) {   //с каждым проходом создается +1 карточка и все они образуют многомерный массив
            $card[$i]['serial'] = $serial;
            $card[$i]['number'] = $i;
//          $card[$i]['status']= 0; //если используешь php_my_admin
            $card[$i]['relise_date'] = date("Y-m-d H:i:s"); //записываем дату выпуска
            $time = strtotime(date("Y-m-d H:i:s") . "+" . $time_form . "days"); //высчитываем  дату окончания
            $time_after = date("Y-m-d H:i:s", $time); //преобразуем секунды в дату и время
            $card[$i]['expired_date'] = $time_after; //присваиваем элементу массива значение даты и времени
        }

        $this->load->model('cards_model');   //обращаемся к модели
        $this->cards_model->add_card($card);  //обращаемся к методу модели
//        $this->benchmark->mark('code_end');
//        echo $this->benchmark->elapsed_time('code_start', 'code_end');
        redirect('/welcome/search_cards','refresh');  //перегружаем страницу

    }

    public function search_cards() {  //вывод списка карточек
        $this->load->view('header');
        $this->load->model('cards_model');
        $this->data = $this->cards_model->select_card();  //в этом переменной data присваиваю метод select_card из модели cards_model
        $this->load->view('search', $this); //передаю значения из метода select_card во view
        $this->load->view('footer');
    }

    public function edit_cards($id) {  //редактирование карт
        $this->load->view('header');
        $this->load->model('cards_model');
        $this->result = $this->cards_model->change_card($id);  //присваиваю значения переменной $result
        $this->load->view('edit_cards_form', $this); //передаю значения во view
        $this->load->view('footer');
    }

    public function replace_card($id) {  //вставка измененных данных
       $this->load->view('header');
       $this->load->model('cards_model');
       $changed_card=array();  //заводим массив для карт с новыми данными
       $changed_card['serial']= $this->input->post('serial');
       $changed_card['relise_date']=$this->input->post('relise_date');
       $changed_card['expired_date']=$this->input->post('expired_date');
       $changed_card['summa']=  $this->input->post('summa');
       if($changed_card['summa'] > 0.00){          //если сумма > 0, то статус меняется на активный
           $changed_card['status'] = 1;
       }
       $this->value=$this->cards_model->repl($changed_card,$id);  //передаем значения в модель
       redirect('/welcome/search_cards/', 'refresh');
    }

    public function delete_card($id){       //удаление карты
        $this->load->model('cards_model');
        $this->cards_model->del_card($id);
        redirect('/welcome/search_cards/', 'refresh');
    }

    public function del_all_cards() {        //удаляет все карты
        $this->load->model('cards_model');
        $this->cards_model->remove_cards();
        redirect('/welcome/search_cards/', 'refresh');
    }

    public function search_data(){        //поиск по серии и номеру
       $search['serial']=  $this->input->post('search_serial');
       $search['number']=  $this->input->post('search_number');
       $this->load->model('cards_model');
       $this->data = $this->cards_model->main_search($search);
       $this->load->view('header');
       $this->load->view('search',$this);
       $this->load->view('footer');
    }

    public function show_purchase($id){
        $this->load->model('cards_model');
        $this->res = $this->cards_model->select_info($id);
        $this->load->view('card_info',$this);
    }

}
