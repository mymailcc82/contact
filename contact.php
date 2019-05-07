<?php
header("Content-type: text/html; charset=UTF-8");
mb_language("Japanese");
mb_internal_encoding("UTF-8");
?>
<?php require_once ( dirname( __FILE__ ) . '/controller/controller-contact.php' );?>


<!doctype html><html itemscope="" itemtype="http://schema.org/SearchResultsPage" lang="ja">
<head>
  <link rel="stylesheet" type="text/css" href="/contact/package/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="/contact/package/css/style.css">
  <script type="text/javascript" src="/contact/package/js/jquery-2.1.3.js"></script>
  <script type="text/javascript" src="/contact/package/js/script.js"></script>
</head>
<style>
header{
  width: 100%;
  height: 500px;
  background-color: #333;
  margin-bottom: 80px;
}
footer{
  width: 100%;
  height: 300px;
  background-color: #aaa;
  margin-top: 120px;
}
h2{
  font-size: 30px;
  color: #fff;
}
footer{

}
.content-width{
  width: 1000px;
  margin:  0 auto;;
}
</style>
<header>
  <h2>ヘッダー</h2>
</header>




<main class="content-width">
  <?php
  first_do_action();
  ?>


</main>









<footer>
  <h2>フッター</h2>
</footer>
