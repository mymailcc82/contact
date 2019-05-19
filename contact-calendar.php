<?php
header("Content-type: text/html; charset=UTF-8");
mb_language("Japanese");
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

$else_menu_arr =$_POST["osusume_menu"];
?>



<!doctype html><html itemscope="" itemtype="http://schema.org/SearchResultsPage" lang="ja">
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/ja.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="/contact/package/js/calendar.js"></script>
  <script src="/contact/package/js/script.js"></script>

  
  <link rel="stylesheet" type="text/css" href="/contact/package/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="/contact/package/css/style.css">
</head>

<header>
  <h2>ヘッダー</h2>
</header>




<main class="content-width">

<div class="contact">
  <h2 class="contact-h2">ご予約フォーム</h2>

  <div class="contact__inner">
    <h3 class="contact-h3">ご予約はカンタン3ステップ</h4>
    <ul class="contact-step">
      <li class="active">メニュー・日時を選ぶ</li>
      <li>お客様情報のご入力</li>
      <li>お客様情報のご確認</li>
    </ul>
    <h4 class="txt-center">
      希望日時を選択してください。
    </h4>

    <div class="btn_container">
      <input type="button" id="before_week_btn" value="前週">
      <input type="button" id="next_week_btn" value="翌週">
    </div>

    <form action="/contact/contact-step-2.php" method="post">
      <input type="hidden" name="counselingReserve.formCode" value="0016">
      <input type="hidden" name="reserve_date" value="">
      <input type="hidden" name="reserve_day" value="">
      <input type="hidden" name="reserve_time" value="">
      <input type="hidden" id = "now_time" name="now_time" value="">
      <input type="hidden" id = "next_week" name="next_week" value="">
      <input type="hidden" id = "before_week" name="before_week" value="">
      <?php foreach ($else_menu_arr as $else_menu_arr_key => $else_menu_arr_value): ?>
        <input type="hidden" class="form-control" value="<?php echo $else_menu_arr_value;?>" name="else_menu[]">
      <?php endforeach; ?>

      <div id="calendar"></div>
    </form>
    <div class="txt-center">
      <a href="#" onClick="history.back(); return false;" class="btn btn-warning">戻る</a>
    </div>
  </div>
</div>




</main>









<footer>
  <h2>フッター</h2>
</footer>
