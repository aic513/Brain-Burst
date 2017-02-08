<?
if ($res == FALSE) {
    echo 'Нет покупок на карте';
} else {
    $arr_info = json_decode(json_encode($res), True);
    echo '<h2 style="font-style: italic">Информация по карте № ' . $arr_info[0]['card_id'] . '</h2>';
    echo '<p> Дата выпуска: ' . $arr_info[0]['relise_date'] . '</p>';
    echo '<p> Дата истечения срока: ' . $arr_info[0]['relise_date'] . '</p>';
    echo '<p> Сумма на карте: ' . $arr_info[0]['summa'] . ' руб.</p>';
    foreach ($arr_info as $key => $value) {
        echo '<h4>Покупка на сумму ' . $value['cost_purchase'] . ' руб. была совершена ' . $value['date_purchase'] . '</h4>';
    }
}

