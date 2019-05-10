<?php
  //その他のメニュー
  $else_menu_arr =$_POST["else_menu"];

  $err_massage = "メニューが選択されていません。";


  //時間
  $time = $_POST["reserve_time"];
  //$time = str_replace("00",":00", $time);


  //日付
  $reserve_date = $_POST["reserve_date"];
  $reserve_date =  date('Y年m月d日',  strtotime($reserve_date));
  //$reserve_time = "13:00";


 ?>
<link rel="stylesheet" type="text/css" href="/contact/package/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


<?php


 ?>

 <div class="contact">
   <h2 class="contact-h2">ご予約フォーム</h2>
   <div class="contact__inner">
     <h3 class="contact-h3">ご予約はカンタン3ステップ</h4>
     <ul class="contact-step">
       <li>メニュー・日時を選ぶ</li>
       <li class="active">お客様情報のご入力</li>
       <li>お客様情報のご確認</li>
     </ul>
    <h3>入力情報</h3>
    <dl class="insert-infomation">
      <dt>メニュー</dt>
      <dd>
        <?php foreach ($else_menu_arr as $else_menu_arr_key => $else_menu_arr_value): ?>
          <?php echo $else_menu_arr_value;?>
        <?php endforeach; ?>
        <?php echo $campagin_menu;?>
        <?php if (empty($else_menu_arr) && empty($campagin_menu)) {
          echo $err_massage;
        } ?>
      </dd>
      <dt>予約日</dt>
      <dd>
        <?php echo $reserve_date;?><?php echo $time;?>
      </dd>
    </dl>
    <h3>メニュー・日時にお間違えがない事を確認のうえ、下記にお客様情報をご入力ください</h3>
    <ul id="errmessage" class="errmessage">

    </ul>
    <div class="form-group">
      <form method="post" action="/contact/contact-confirm.php" name="myForm" onSubmit="return check()">
        <h3>お客様情報を入力してください</h3>
        <dl class="form-insert insert-infomation--input">
          <dt>
            <span class="your-form">お名前</span><span class="mst">必須</span>
          </dt>
          <dd>
            <input type="text" class="form-control" value="" name="name" placeholder="山田太郎">
          </dd>
          <dt>
            <span class="your-form">メール</span><span class="mst">必須</span>
          </dt>
          <dd>
            <input type="text" class="form-control" value="" name="mail" placeholder="example@example.com">
          </dd>
          <dt>
            <span class="your-form">電話番号</span><span class="mst">必須</span>
          </dt>
          <dd>
            <input type="text" class="form-control" value="" name="tel" placeholder="08012341234">
          </dd>

          <dt>
            <span class="your-form">その他</span>
          </dt>
          <dd>
            <textarea name="info" class="form-control" placeholder="ご質問・ご相談がありましたらお気軽にお申し出くださいませ。"></textarea>
          </dd>
        </dl>
        <ul>
          <li>
            <?php foreach ($else_menu_arr as $else_menu_arr_key => $else_menu_arr_value): ?>
              <input type="hidden" class="form-control" value="<?php echo $else_menu_arr_value;?>" name="else_menu[]">
            <?php endforeach; ?>
          </li>
          <li>
            <input type="hidden" class="form-control" value="<?php echo $reserve_date;?>" name="reserve_day">
          </li>
          <li>
            <input type="hidden" class="form-control" value="<?php echo $time;?>" name="reserve_time">
          </li>
        </ul>
        <div class="txt-center">
          <a href="/contact/contact.php" class="btn btn-warning">最初からやり直す</a>
          <a href="#" onClick="history.back(); return false;" class="btn btn-warning">戻る</a>
          <button type="submit" class="btn btn-warning">次へ</button>
        </div>
      </form>
    </div>


  </div>
</div>
