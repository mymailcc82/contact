<?php

  function display(){
    echo "成功aaaa";

    require_once ( dirname( __FILE__ ) . '../../template/first-input.php' );
  }

  function display_1(){
    echo "成功ステップ2";

    require_once ( dirname( __FILE__ ) . '../../template/second-input.php' );
  }

  function display_2(){
    echo "確認画面";

    require_once ( dirname( __FILE__ ) . '../../template/confirm.php' );
  }

  function display_finish(){
    echo "完了";

    require_once ( dirname( __FILE__ ) . '../../template/finish.php' );
  }





 ?>
