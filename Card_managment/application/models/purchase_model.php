<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model {

    public function add_purchase($buy) {  //Добавляем покупку в модель
        $this->db->insert('purchase', $buy);
        $this->db->query('UPDATE cards SET cards.count_purchase=cards.count_purchase+1 WHERE cards_id='.$buy['card_id']);
    }

    public function del_buyes() {    //удаляет все покупки со всех карт
        $this->db->empty_table('purchase');
    }

    public function del_buy($id) {    //удаляет покупки с 1-ой карты
        $this->db->where('card_id', $id);
        $this->db->delete('purchase');
        $this->db->query('UPDATE cards SET cards.count_purchase=0 WHERE cards_id='.$id);
    }

    public function select_sum($id) {
        $this->db->select('summa');
        $this->db->where('cards_id',$id);
        $result=$this->db->get('cards');
        return $result->row();
    }







}
