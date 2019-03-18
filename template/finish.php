<?php
  //その他のメニュー
  $name =$_POST["name"];
  $mail =$_POST["mail"];
  $tel =$_POST["tel"];
  $info =$_POST["info"];

  $reserve_day = $_POST["reserve_day"];
  $reserve_time = $_POST["reserve_time"];

  $campagin_menu = $_POST["campagin_menu"];
  $else_menu = $_POST["else_menu"];




 ?>
<link rel="stylesheet" type="text/css" href="/contact/package/bootstrap/css/bootstrap.min.css">
<style>
.step{
  display: flex;
}
.step li{
  display:block;
}
.active{
  background-color: #ffff00;
}
</style>
<h3>完了しました。</h3>

<ul class="step">
  <li>メニュー・日時を選ぶ</li>
  <li>お客様情報のご入力</li>
  <li>お客様情報のご確認</li>
  <li class="active">ご予約完了</li>
</ul>

<div>
  <h3>入力情報</h3>
  <dl>
    <dt>名前</dt>
    <dd><?php echo $name;　?></dd>
    <dt>メール</dt>
    <dd><?php echo $mail;　?></dd>
    <dt>電話</dt>
    <dd><?php echo $tel;　?></dd>
    <dt>その他</dt>
    <dd><?php echo $info;　?></dd>
    <dt>メニュー</dt>
    <dd><?php echo $campagin_menu."&".$else_menu;　?></dd>
    <dt>日時</dt>
    <dd><?php echo $reserve_day."&".$reserve_time;　?></dd>
  </dl>

</div>
