<?php

function isEmpty($campo){
//    if(){
//        
//    }
}

function isInteger($campo){
    
}

function between($campo,$min,$max){
    
}

function email($subject){
    $pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
    $response=  preg_match($pattern, $subject) ? true : false;
    return $response;
}

function userNameLongitud($subject,$min,$max){
    $pattern="/^[a-z\d_]{".$min.",".$max."}$/i";
    
}

