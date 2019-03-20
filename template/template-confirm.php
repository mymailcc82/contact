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
<link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<style>
.radio {
display: none;
}
.radio + .radio-icon:before {
content: "\f3a6";
font-family: "Ionicons";
color: #ccc;
font-size: 22px;
}
.radio:checked + .radio-icon:before {
content: "\f3a7";
color: #17bcdf;
}

.checkbox {
  display: none;
}
.checkbox + .checkbox-icon {
  position: relative;
  vertical-align: middle;
}
.checkbox + .checkbox-icon:before {
  content: "\f372";
  font-family: "Ionicons";
  color: #ccc;
  font-size: 22px;
}
.checkbox:checked + .checkbox-icon:before {
  content: "\f374";
  color: #17bcdf;
}
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

<?php


 ?>

<h3>確認画面</h3>

<ul class="step">
  <li>メニュー・日時を選ぶ</li>
  <li>お客様情報のご入力</li>
  <li class="active">お客様情報のご確認</li>
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
<h3>メニュー・日時・お客様情報に誤りがないでしょうか？</h3>
<div class="form-group">
  <form method="post" action="/contact/contact-finish.php" name="myForm">
    <h4>下記項目は非表示にします。</h4>
    <dl class="form-insert">
      <li>
        <span class="your-form">お名前</span>
        <input type="hidden" name="name" class="form-control" value="<?php echo $name;?>">
      </li>
      <li>
        <span class="your-form">メール</span>
        <input type="hidden" name="mail" class="form-control" value="<?php echo $mail;?>">
      </li>
      <li>
        <span class="your-form">電話番号※ハイフンなし</span>
        <input type="hidden" name="tel" class="form-control" value="<?php echo $tel;?>">
      </li>
      <li>
        <span class="your-form">その他</span>
        <input type="hidden" name="info" class="form-control" value="<?php echo $info;?>">
      </li>

      <li>
        <span class="your-form">メニュー</span>
        <input type="hidden" class="form-control" value="<?php echo $campagin_menu;?>" name="campagin_menu">
      </li>
      <li>
        <span class="your-form">その他メニュー</span>
        <input type="hidden" class="form-control" value="<?php echo $else_menu;?>" name="else_menu">
      </li>
      <li>
        <span class="your-form">予約日にち</span>
        <input type="hidden" class="form-control" value="<?php echo $reserve_day;?>" name="reserve_day">
      </li>
      <li>
        <span class="your-form">予約時間</span>
        <input type="hidden" class="form-control" value="<?php echo $reserve_time;?>" name="reserve_time">
      </li>

    </dl>
</div>

    <button type="submit" class="btn btn-warning">予約を確定する</button>
  </form>
</div>
