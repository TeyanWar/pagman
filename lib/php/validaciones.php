<?php

function isInteger($campo){
    
}

function email($subject){
    $pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
    $response=  preg_match($pattern, $subject) ? true : false;
    return $response;
}

function between($field,$min,$max){
    $pattern="/^[\w\W]{".$min.",".$max."}$/";
    return preg_match($pattern, $field);
}

