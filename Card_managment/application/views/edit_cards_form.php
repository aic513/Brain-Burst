<h1>Редактирование карт</h1>
<div class="row">
    <div class="container-fluid">
        <form action="<?php echo site_url("welcome/replace_card/" . $result->cards_id); ?>" method="POST">
            <div class="row">
                <div class="form-group col-xs-1">
                    <label for="serial">Серия</label>
                </div>
                <div class="form-group col-xs-4">
                    <input type="text" class="form-control" id="serial" name="serial" value="<?php echo $result->serial; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-1" >
                    <label for="relise_date">Дата выпуска</label>
                </div>
                <div class="form-group col-xs-4" >
                    <input type="text" class="form-control" id="relise_date" name="relise_date" value="<?php echo $result->relise_date; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-1" >
                    <label for="expired_date">Дата окончания</label>
                </div>
                <div class="form-group col-xs-4" >
                    <input type="text" class="form-control" id="expired_date" name="expired_date" value="<?php echo $result->expired_date; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-1" >
                    <label for="time">Сумма</label>
                </div>
                <div class="form-group col-xs-4" >
                    <input type="text" class="form-control" id="summa" name="summa" value="<?php echo $result->summa; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-1" >
                    <label for="status_id">Активация карты</label>
                </div>
                <div class="form-group col-xs-4" >
                    <?php if ($result->summa == 0.00){ ?>
                        <select disabled class="form-control " id="status_id" name="status">
                            <option  value="1">активирована </option>
                            <option selected value="0">не активирована </option>
                        </select>
                        <?php
                    } else {
                        ?>
                        <select class="form-control " id="status_id" name="status">
                            <option selected value="1">активирована </option>
                            <option value="0">не активирована </option>
                        </select>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="replace">Изменить</button>
        </form>
    </div>
</div>