<?php
header("Content-Type: text/html; charset=utf-8");
require_once ("functions.php");

if (isset($_POST['a']) && isset($_POST['b'])) {
    $operation = $_POST['operation'];
    $result = get_result((int)$_POST['a'],(int)$_POST['b'], $operation);
    if (!$commo = mysqli_connect('localhost', 'root', '')) {
        die('Невозможно установить соединение!');
    }
    mysqli_select_db($commo, 'calc_db') or die('не была выбрана база данных');   // снова выбираем ее или выводится предупреждение,что она не выбрана
    mysqli_query($commo, "INSERT INTO `calc_res` (`a`, `b`,`res`) VALUES ('{$_POST['a']}','{$_POST['b']}','{$result}')");
}

if(isset($_POST['return'])){
    $a=mysqli_fetch_array(mysqli_query($commo,"SELECT * FROM `calc_res` ORDER BY id DESC LIMIT 1"));
   

}

?>

<form method="POST">
    <span class="number_one">
        <label for="number_1">Введите число </label>
        <input type="text" name="a" value="<?= isset($a) ? $a['a'] : $_POST['a']; ?>" id="number_1">
    </span>
    <span class="number_two">
        <label for="number_2">Введите число</label>
        <input type="text" name="b" value="<?= isset($a) ? $a['b'] : $_POST['b']; ?>" id="number_2">
    </span>
    <input type="submit" value="=">
     <span class="result">
         <?= isset($a) ? $a['res'] : $result;?>
    </span>
    <p>Операции</p>
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <b><?=$operation;?></b>
    
    <button type="submit" value="<?=$_POST['return'] ?>" name="return">Вернуть из базы</button>
    
</form>


