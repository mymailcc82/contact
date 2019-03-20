<?php

  class DataCheck{

    //postに名前があるか
    function check_post_name($get_data_arr){

      if(($get_data_arr['name'])){
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
  }
?>
