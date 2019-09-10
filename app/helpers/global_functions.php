<?php

function partnersTypesArray()
{
    $types =[
        1=>'متجر',
        2=>'مطعم',
        3=>'استشارات',
        4=>'خدمات',
        5=>'مركز تجاري',
        6=>'شركة'
        ];
    return $types;
}


function unique_validate($field){
    return "unique:partners,".$field."|unique:embassadors,".$field;
}

?>