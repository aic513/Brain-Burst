<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cards_model extends CI_Model {  //модель для работы с картами

    public function add_card($card) {        //добавление данных в БД
        foreach ($card as $value) {
            $this->db->insert('cards', $value);
        }
    }

    public function select_card() {                 //выбираем данные из БД
        $query = $this->db->get('cards');
        return $query->result();
    }

    public function change_card($id) {            //Получаем данные по конкретному id
        $this->db->where('cards_id', $id);
        $query = $this->db->get('cards');
        return $query->row();  //возвращает строку
    }

    public function del_card($id) {                   //удаляем карту
        $this->db->where('cards_id', $id);
        $this->db->delete('cards');
    }

    public function remove_cards() {   //очищает базу карточек
        $this->db->empty_table('cards');  //очищает все строки в таблице
    }

    public function repl($changed_card, $id) {            //редактирование данных
        $this->db->where('cards_id', $id);  //выбирает карту с НУЖНЫМ id
        $this->db->update('cards', $changed_card);  //передаем в модель измененные данные
    }

    public function main_search($search) {                //поиск по серии и номеру
        if ($search['serial']) {
            $this->db->like('serial', $search['serial'], 'both');
        }

        if ($search['number']) {
            $this->db->like('number', $search['number'], 'both');
        }
        $query = $this->db->get('cards');
        return $query->result();
    }

}
