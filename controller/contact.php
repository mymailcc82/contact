<?php

  require_once ( dirname( __FILE__ ) . '/../setting.php' );
  require_once ( dirname( __FILE__ ) . '/../model/get_infomation.php' );
  require_once ( dirname( __FILE__ ) . '/../model/data_check.php' );
  require_once ( dirname( __FILE__ ) . '/../model/send_mail_about_data.php' );

  function first_do_action(){
    echo "成功aaaa";

    require_once ( dirname( __FILE__ ) . '../../template/template-first-input.php' );
  }

  function insert_custom_infomation(){
    echo "成功ステップ2";

    require_once ( dirname( __FILE__ ) . '../../template/template-second-input.php' );
  }

  function confirm_insert(){
    echo "確認画面";

    require_once ( dirname( __FILE__ ) . '../../template/template-confirm.php' );
  }

  function do_action_finish(){
    global $LOCATION_URL;
    global $LOCATION_URL_ERROR;
    $get_infomation = new GetInfomation;
    $get_infomation_arr = $get_infomation->get_infomation();


    $data_check = new DataCheck;
    if($data_check->check_post_name($get_infomation_arr)){
      $send_mail = new SendMail;
      $send_mail_flg = $send_mail -> send_mail_to_myself($get_infomation_arr);

      //送信が成功ならリダイレクト
      if($send_mail_flg){
        header('Location:'.$LOCATION_URL);
        exit;
      }else{
        header('Location:'.$LOCATION_URL_ERROR);
        exit;
      }
    }else{
      header('Location:'.$LOCATION_URL_ERROR);
      exit;
    }


    /*
    $get_infomation_arrの中身
      $get_infomation_arr['name'] = 名前
      $get_infomation_arr['mail'] = メール
      $get_infomation_arr['tel'] = 電話
      $get_infomation_arr['info'] = その他
      $get_infomation_arr['campagin_menu'] = キャンペーンメニュー
      $get_infomation_arr['else_menu'] = その他メニュー
      $get_infomation_arr['reserve_day'] = 日にち
      $get_infomation_arr['reserve_time'] = 時間
    */
  }

  function success_message(){
    require_once ( dirname( __FILE__ ) . '../../template/template-success.php' );
  }

  function error_message(){
    require_once ( dirname( __FILE__ ) . '../../template/template-error.php' );
  }





 ?>
