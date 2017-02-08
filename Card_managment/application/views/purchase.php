<div class="container-fluid">
    <h1>Покупки</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-10">
            <form action="/hello/add_buy" method="POST" >
                <div class="row">
                    <div class="form-group col-xs-1" >
                        <label for="date">Дата</label>
                    </div>
                    <div class="form-group col-xs-4">
                        <input type ="text" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-1" >
                        <label for="cost">Стоимость</label>
                    </div>
                    <div class="form-group col-xs-4" >
                        <input type="text" class="form-control" id="cost" name="cost">
                    </div>
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="hidden_id">
                <button type="submit" class="btn btn-default" name="submit">Добавить покупку</button>
                <a href="<?php echo site_url("welcome/search_cards/"); ?>" class="btn btn-success">К списку карт</a>
            </form>
        </div>
    </div>
</div>