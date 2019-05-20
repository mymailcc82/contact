<?php require_once ( dirname( __FILE__ ) . '/model/model-post-sql.php' );?>
<?php
header("Content-type: text/html; charset=UTF-8");
mb_language("Japanese");
mb_internal_encoding("UTF-8");
?>


<!doctype html><html itemscope="" itemtype="http://schema.org/SearchResultsPage" lang="ja">
<head>
  <script src="<?php echo $DOMAIN_URL;?>/contact/admin/package/js/admin.js"></script>
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
.none{
  display: none;
}
table{
  width: 100%;
  font-size: 0px;
  border-collapse:collapse;
}
tr{
  font-size: 0px;
}
.insert_format_table td{
  border: 1px solid #aaa;
  vertical-align: middle;
  text-align: center;
  font-size: 16px;
}
</style>
<header>
  <h2>ヘッダー</h2>
</header>


<main class="content-width">
<?php require_once ( dirname( __FILE__ ) . '/template/template-insert_format.php' );?>


</main>




<footer>
  <h2>フッター</h2>
</footer>
