<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {  //Контроллер покупок

    public function show_buy($id) {  //Показать покупку
        $this->load->view('header');
        $this->id=$id;
        $this->load->view('purchase',$this);
        $this->load->view('footer');
    }

    public function add_buy() { //Добавить покупку
        $buy = array(                 //Передаем данные в массив
            'date_purchase' => $this->input->post('date')." ".  date("H:i:s"),  //дата покупки
            'cost_purchase' => $this->input->post('cost'),  //стоимость покупки
            'card_id' => $this->input->post('hidden_id'),  //id карты в скрытом инпуте
        );
        $this->load->model('purchase_model');    //обращаемся к модели
        $this->purchase_model->add_purchase($buy);  //обращаемся к методу в модели
        redirect('/welcome/search_cards','refresh'); //перегружаем страницу
    }

    public function delete_buyes() {            //удаляет все покупки со всех карт
        $this->load->model('purchase_model');
        $this->purchase_model->del_buyes();
        redirect('/welcome/search_cards/', 'refresh');
    }

     public function delete_buy($id){       //удаление покупок с одной карты
        $this->load->model('purchase_model');
        $this->purchase_model->del_buy($id);
        redirect('/welcome/search_cards/', 'refresh');
    }

}