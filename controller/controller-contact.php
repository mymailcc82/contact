<?php

  require_once ( dirname( __FILE__ ) . '/../setting.php' );
  require_once ( dirname( __FILE__ ) . '/../model/get_infomation.php' );
  require_once ( dirname( __FILE__ ) . '/../model/data_check.php' );
  require_once ( dirname( __FILE__ ) . '/../model/send_mail_about_data.php' );

  function first_do_action(){
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
    //header関数でlocationに設定するURL
    global $LOCATION_URL;
    //成功用のページ
    global $GET_DATA_SUCCESS;
    //失敗用のペー字
    global $GET_DATA_ERROR;
    //getで取得する値名
    global $GET_DATA_FLG;

    //getデーターを取得
    $get_flg_data = $_GET[$GET_DATA_FLG];

    //postデーターを$get_infomation_arrに格納
    $get_infomation = new GetInfomation;
    $get_infomation_arr = $get_infomation->get_infomation();

    $data_check = new DataCheck;
    //GETデータがないことを確認
    if(!$data_check -> check_request_get($get_infomation_arr)){
      //POSTデータがあることを確認
      if($data_check -> check_request_post($get_infomation_arr)){

        $send_mail = new SendMail;
        $send_mail_flg = $send_mail -> send_mail_to_myself($get_infomation_arr);

        //送信が成功ならリダイレクト
        if($send_mail_flg){
          header('Location:'.$LOCATION_URL. $GET_DATA_SUCCESS);
          exit;
        }else{
          header('Location:'.$LOCATION_URL. $GET_DATA_ERROR);
          exit;
        }
      }else{
        header('Location:'.$LOCATION_URL. $GET_DATA_ERROR);
        exit;
      }
    }

    //メール送信が成功か失敗 0 1
    if($get_flg_data){
      require_once ( dirname( __FILE__ ) . '../../template/template-success.php' );
    }else{
      require_once ( dirname( __FILE__ ) . '../../template/template-error.php' );
    }

    /*
    $get_infomation_arrの中身
      $get_infomation['request_data'] = サーバーリクエスト //POST or GET
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




 ?>
