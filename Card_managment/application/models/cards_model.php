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

    public function del_card($id) {  //удаляем карту и покупки на ней
//        $this->db->query("DELETE cards, purchase FROM cards LEFT JOIN purchase ON cards.cards_id = purchase.card_id WHERE purchase.card_id = $id");   //запрос крутой,жаль,что не работает,когда на карте нет покупок
        $this->db->where('cards_id', $id);
        $this->db->delete('cards');
        $this->db->where('card_id', $id);
        $this->db->delete('purchase');
    }

    public function remove_cards() {   //очищает базу карточек
        $this->db->empty_table('cards');  //очищает все строки в таблице карточек
        $this->db->empty_table('purchase'); //очищает все строки в таблице покупок
    }

    public function repl($changed_card, $id) {            //редактирование данных
        $this->db->where('cards_id', $id);  //выбирает карту с НУЖНЫМ id
        $this->db->update('cards', $changed_card);  //передаем в модель измененные данные
    }

    public function main_search($search) {                //поиск по серии и номеру
        if ($search['serial']) {
            $this->db->like('serial', $search['serial'], 'after');
        }

        if ($search['number']) {
            $this->db->like('number', $search['number'], 'after');
        }
        $query = $this->db->get('cards');
        return $query->result();
    }

    public function update_summa($result,$id) {  //обновляет сумму в таблице
        $this->db->set('summa',$result);
        $this->db->where('cards_id',$id);
        $this->db->update('cards');
    }

    public function select_info($id){
        $var = $this->db->query("SELECT * FROM  `cards` INNER JOIN purchase ON cards.cards_id=$id &&  purchase.card_id=$id");
        return $var->result();
    }

}
