<?php
  /*
  *  @since 1.0.1 First time this was introduced.
  *
  *
  */



  require_once ( dirname( __FILE__ ) . '/controller/contact.php' );

  //*クローンより定期的にデータを取得する*//
	header("Content-type: text/html; charset=UTF-8");
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");


  function do_action(){
    display();
  }

?>