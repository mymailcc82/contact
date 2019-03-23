<?php
  //その他のメニュー
  $else_menu_arr =$_POST["osusume_menu"];



  $campagin_menu =$_POST["menu"];

  $reserve_day = "2019/03/02";
  $reserve_time = "13:00";


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

<h3>first-input</h3>

<ul class="step">
  <li>メニュー・日時を選ぶ</li>
  <li class="active">お客様情報のご入力</li>
  <li>お客様情報のご確認</li>
</ul>

<div>
  <h3>入力情報</h3>
  <h4>
  <?php
    echo $campagin_menu;
    foreach ($else_menu_arr as $else_menu_arr_key => $else_menu_arr_value) {
      echo ',';
      echo $else_menu_arr_value;
    }
  ?>

  </h4>
</div>
<h3>メニュー・日時にお間違えがない事を確認のうえ、下記にお客様情報をご入力ください</h3>
<div class="form-group">
  <form method="post" action="/contact/contact-confirm.php" name="myForm">
    <h3>お客様情報を入力してください</h3>
    <dl class="form-insert">
      <li>
        <span class="your-form">お名前</span>
        <input type="text" class="form-control" value="" name="name" placeholder="山田太郎">
      </li>
      <li>
        <span class="your-form">メール</span>
        <input type="text" class="form-control" value="" name="mail" placeholder="example@example.com">
      </li>
      <li>
        <span class="your-form">電話番号※ハイフンなし</span>
        <input type="text" class="form-control" value="" name="tel" placeholder="08000000000">
      </li>
      <li>
        <span class="your-form">その他</span>
        <textarea name="info" class="form-control"></textarea>
      </li>



      <li>
        <input type="hidden" class="form-control" value="<?php echo $campagin_menu;?>" name="campagin_menu">
      </li>
      <li>
        <?php foreach ($else_menu_arr as $else_menu_arr_key => $else_menu_arr_value): ?>
          <input type="hidden" class="form-control" value="<?php echo $else_menu_arr_value;?>" name="else_menu[]">
        <?php endforeach; ?>
      </li>
      <li>
        <input type="hidden" class="form-control" value="<?php echo $reserve_day;?>" name="reserve_day">
      </li>
      <li>
        <input type="hidden" class="form-control" value="<?php echo $reserve_time;?>" name="reserve_time">
      </li>

    </dl>
</div>

    <button type="submit" class="btn btn-warning">次へ</button>
  </form>
</div>
