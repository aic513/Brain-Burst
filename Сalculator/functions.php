<?php

//----функции для действий----//
function addition($arg1,$arg2) {
    return ($arg1+$arg2);
}

function subtraction($arg1,$arg2) {
    return ($arg1-$arg2);
}

function multiplication($arg1, $arg2) {
    return ($arg1 * $arg2);
}

function division($arg1,$arg2) {
    if($arg2!=0){
      return ($arg1/$arg2);  
    }
 else {
      return "делить на ноль нельзя";
    }
}

//--функция для вывода результата--//
function get_result($a,$b,$operation) {
    switch ($operation) {
        case "+":
            $result=  addition($a, $b);
            break;
        case "-":
            $result=  subtraction($a, $b);
            break;
        case "*":
            $result=  multiplication($a,$b);
            break;
        case "/":
            $result=  division($a, $b);
            break;
        default:
            break;
    }
    return $result;
}

