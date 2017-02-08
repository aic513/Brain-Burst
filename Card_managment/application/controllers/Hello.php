<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {  //Контроллер покупок

    public function show_buy($id) {  //Показать покупку
        $this->load->view('header');
        $this->id = $id;
        $this->load->view('purchase', $this);
        $this->load->view('footer');
    }

    public function add_buy() { //Добавить покупку
        $buy = array(//Передаем данные в массив
            'date_purchase' => $this->input->post('date'), //дата покупки
            'cost_purchase' => $this->input->post('cost'), //стоимость покупки
            'card_id' => $this->input->post('hidden_id'), //id карты в скрытом инпуте
        );
        $this->load->model('purchase_model');    //обращаемся к модели
        $this->purchase_model->add_purchase($buy);  //обращаемся к методу в модели
        $id = $this->input->post('hidden_id');    //присваиваем переменной $id скрытый input
        $summa = $this->purchase_model->select_sum($id); //присваиваем в $summa выбранный $id
        if ($summa->summa < $buy['cost_purchase']) {  //если сумма на карте меньше, чем стоимость покупки
            $this->error = "Сумма покупки больше,чем сумма на карте"; //выводим ошибку
            $id = $this->input->post('hidden_id');
            $this->load->view('header');
            $this->load->view('error_view', $this);
            $this->load->view('footer');
        } else {                                             //иначе
            $result = $summa->summa - $buy['cost_purchase']; //записываем в $result разность между суммой на карте и ценой покупки
            $this->load->model('cards_model'); //обращаемся к модели
            $this->cards_model->update_summa($result, $id); //записваем $result в базу
            redirect('/welcome/search_cards', 'refresh'); //перегружаем страницу
        }
    }

    public function delete_buyes() {            //удаляет все покупки со всех карт
        $this->load->model('purchase_model');
        $this->purchase_model->del_buyes();
        redirect('/welcome/search_cards/', 'refresh');
    }

    public function delete_buy($id) {       //удаление покупок с одной карты
        $this->load->model('purchase_model');
        $this->purchase_model->del_buy($id);
        redirect('/welcome/search_cards/', 'refresh');
    }
}
