<?php

  class DataCheck{

    //postに名前があるか
    function check_post_name($get_data_arr){

      if($get_data_arr['name']){
        return true;
      }
      return false;
    }
    /*
    //必須入力がされているかどうか
    function check_required_input($get_data_arr){
      if(isset($get_data_arr['name'])){
        return true;
      }
      return false;
    }*/

    //ポストデータがあるかないか
    function check_request_post($get_data_arr){

      if($get_data_arr['request_data'] == "POST"){
        return true;
      }
      return false;
    }

    //ゲットデータがあるかないか
    function check_request_get($get_data_arr){

      if($get_data_arr['request_data'] == "GET"){
        return true;
      }
      return false;
    }


  }

?>
