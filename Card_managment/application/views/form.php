<div class="container-fluid col-sm-offset-4">
    <h1>Генерация карт</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-10">
            <form action="/welcome/main" method="POST" >
                <div class="row">
                    <div class="form-group col-sm-1">
                        <label for="serial">Серия</label>
                    </div>
                    <div class="form-group col-sm-5 col-md-offset-2 col-sm-offset-2">
                        <input type="text" class="form-control" id="serial" name="serial">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-1" >
                        <label for="amount">Количество карт</label>
                    </div>
                    <div class="form-group col-sm-5 col-md-offset-2 col-sm-offset-2" >
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-1" >
                        <label for="time">Срок окончания активности</label>
                    </div>
                    <div class="form-group col-sm-5 col-md-offset-2 col-sm-offset-2" >
                        <select style="text-align-last:center;" class="form-control " id="time" name="time">
                            <option value="365">1год</option>
                            <option value="182">6 месяцев</option>
                            <option value="30">1месяц</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-default" name="submit">Создать карты</button>
                <a href="<?php echo site_url("welcome/search_cards/"); ?>" type="submit" class="btn btn-success ">Покзать карты</a>
            </form>
        </div>
    </div>
</div>

