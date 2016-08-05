<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model {

    public function add_purchase($buy) {  //Добавляем покупку в модель
        $this->db->insert('purchase', $buy);
    }

    public function del_buyes() {    //удаляет все покупки со всех карт
        $this->db->empty_table('purchase');
    }

    public function del_buy($id) {
        $this->db->where('card_id', $id);
        $this->db->delete('purchase');
    }

    



}
