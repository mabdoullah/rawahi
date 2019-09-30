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
function usersTables(){
    return ['admins','agents','ambassadors','partners','users'];
}
function unique_validate($field){
    $array=[];
    foreach (usersTables() as $table) {
      array_push($array,'unique:'.$table.",".$field);
    }
    return @implode('|',$array);
    //return "unique:partners,".$field."|unique:ambassadors,".$field."|unique:agents,".$field;
}
function update_unique_validate($field,$id,$table){
  $array = [];
  foreach (usersTables() as $tbl) {
    $str = "unique:".$tbl.",".$field;
    if($tbl == $table){$str.= ",".$id ;}
    @array_push($array , $str);
    }
    return @implode('|',$array);
}


function valid_email() {
  return "email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
}


function generate_ambassador_number($id){
  return $id;
}
?>
