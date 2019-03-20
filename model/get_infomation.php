<?php

class GetInfomation{
  function get_infomation(){
    //情報の格納場所
    $get_infomation = array();

    //global $_POST["name"];

    $name =$_POST["name"];
    $mail =$_POST["mail"];
    $tel =$_POST["tel"];
    $info =$_POST["info"];

    $reserve_day = $_POST["reserve_day"];
    $reserve_time = $_POST["reserve_time"];

    $campagin_menu = $_POST["campagin_menu"];
    $else_menu = $_POST["else_menu"];

    $get_infomation['name'] = $name;
    $get_infomation['mail'] = $mail;
    $get_infomation['tel'] = $tel;
    $get_infomation['info'] = $info;
    $get_infomation['reserve_day'] = $reserve_day;
    $get_infomation['reserve_time'] = $reserve_time;
    $get_infomation['campagin_menu'] = $campagin_menu;
    $get_infomation['else_menu'] = $else_menu;



    return $get_infomation;
  }
}

?>
