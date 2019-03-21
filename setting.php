<?php
  //情報の設定

  //自分のメールアドレス
  $MY_MAILADORESS = 'mymailcc82@icloud.com';

  //自分に送るメールタイトルのファイル名
  $TEMPLATE_SEND_MY_TITLE = '././template/template-send_mail_to_myself_title.txt';

  //自分に送るメールタイトルのファイル名
  $TEMPLATE_SEND_MY_CONTENT = '././template/template-send_mail_to_myself_content.txt';

  //header関数でlocationに設定するURL。
  $LOCATION_URL ='http://localhost:8888/contact/contact-finish.php';
  //$LOCATION_URL ='http://highneeds-dev.work/contact/contact-finish.php';

  $GET_DATA_FLG = 'flg';







  // 入力不要です。
  $GET_DATA_SUCCESS = '?'.$GET_DATA_FLG.'=1';
  $GET_DATA_ERROR = '?'.$GET_DATA_FLG.'=0';


 ?>
