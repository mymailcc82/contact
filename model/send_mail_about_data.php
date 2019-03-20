<?php
  class SendMail{
    function send_mail_to_myself($post_data_arr){
      //自分のメールアドレス
      global $MY_MAILADORESS;
      //タイトル ファイルの読み込み場所
      global $TEMPLATE_SEND_MY_TITLE;
      //content ファイルの読み込み場所
      global $TEMPLATE_SEND_MY_CONTENT;



      //ポストデーターを格納
      $get_infomation_arr = $post_data_arr;

      //お問い合わせタイトル
      $title = '';
      //お問い合わせコンテンツ
      $content ='';


      //置きかえ用コード
      $template_name = '$template_name';
      $template_mail = '$template_mail';
      $template_tel = '$template_tel';
      $template_info = '$template_info';
      $template_campagin_menu = '$template_campagin_menu';
      $template_else_menu = '$template_else_menu';
      $template_reserve_day = '$template_reserve_day';
      $template_reserve_time = '$template_reserve_time';



      //title ファイルの読み込み
      $title = file_get_contents($TEMPLATE_SEND_MY_TITLE);
      //content ファイルの読み込み
      $content = file_get_contents($TEMPLATE_SEND_MY_CONTENT);

      //contentの置き換え
      $content = str_replace($template_name, $get_infomation_arr['name'] ,$content);
      $content = str_replace($template_mail, $get_infomation_arr['mail'] ,$content);
      $content = str_replace($template_tel, $get_infomation_arr['tel'] ,$content);
      $content = str_replace($template_info, $get_infomation_arr['info'] ,$content);
      $content = str_replace($template_campagin_menu, $get_infomation_arr['campagin_menu'] ,$content);
      $content = str_replace($template_else_menu, $get_infomation_arr['else_menu'] ,$content);
      $content = str_replace($template_reserve_day, $get_infomation_arr['reserve_day'] ,$content);
      $content = str_replace($template_reserve_time, $get_infomation_arr['reserve_time'] ,$content);


      //メールの送信
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");


      if(mb_send_mail($MY_MAILADORESS,$title,$content)){
        return true;
      }else{
        return false;
      }
      


    }

    function send_mail_to_customer(){
      return false;
    }

  }


 ?>
