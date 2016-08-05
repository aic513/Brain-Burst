<div class="container-fluid">
    <h1>Список карт</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-10">
            <form action="/welcome/search_data" method="POST" >
                <div class="row">
                    <div class="form-group col-sm-2" >
                        <label for="serial">Поиск по серии карты</label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" id="serial" name="search_serial">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-2" >
                        <label for="serial">Поиск по номеру</label>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" id="serial" name="search_number">
                    </div>
                </div>
                <?php
                $data1 = array(  //используем хелпер
                    'name' => 'submit',
                    'value' => 'true', //
                    'type' => 'submit',
                    'content' => 'Выбрать',
                    'class' => 'btn btn-default'
                );
                echo form_button($data1);
                ?>
                <a href="<?php echo site_url("welcome/del_all_cards/"); ?>" class="btn btn-danger" id="delete" name="del_all">Удалить все карты</a>
                <a href="<?php echo site_url("hello/delete_buyes/"); ?>" type="submit" class="btn btn-warning">Удалить покупки на всех картах</a>
                <a href="<?php echo site_url("welcome/index/"); ?>" class="btn btn-info" id="delete" name="del_all">Назад к генерации</a>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="table-responsive">
        <table style="font-style:italic; font-family:Consolas;" class="table table-condensed table-hover table-bordered">
            <thead>
                <tr>
                    <th style="background-color:#bbeeff;">Серия</th>
                    <th class="active">Номер</th>
                    <th style="background-color:#EACEAA;">Дата выпуска</th>
                    <th class="success">Дата окончания</th>
                    <th class="warning">Сумма</th>
                    <th class="danger">Статус</th>
                    <th class="info">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $value) { ?>
                    <tr style="background-color:#d8fffe">
                        <td><?php echo $value->serial; ?></td>
                        <td><?php echo $value->number; ?></td>
                        <td><?php echo $value->relise_date; ?></td>
                        <td><?php echo $value->expired_date; ?></td>
                        <td><?php echo $value->summa; ?></td>
                        <td><?php echo $value->status; ?></td>
                        <td><a href="<?php echo site_url("welcome/delete_card/" . $value->cards_id); ?>" class="btn btn-danger" id="delete" name="delete">Удалить карту</a>
                            <?php echo "<br>"; ?>
                            <a href="<?php echo site_url("welcome/edit_cards/" . $value->cards_id); ?>" class="btn btn-info" id="edit">Редактировать карту</a>
                            <?php
                            echo "<br>";
                            if ($value->summa > 0.00) {  //если сумма > 0, то кнопка активна и по карте можно совершать покупку
                                ?>
                                <a href="<?php echo site_url("hello/show_buy/" . $value->cards_id); ?>" type="submit" class="btn btn-success">Совершить покупку</a>
                                <?php echo "<br>" ?><a href="<?php echo site_url("hello/delete_buy/ . $value->cards_id"); ?>" type="submit" class="btn btn-warning">Удалить покупки на карте</a>
                            <?php } else {  //иначе кнопка не активна и купить ничего нельзя
                                ?>
                                <a href="#" class="btn btn-default">Совершить покупку</a>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
