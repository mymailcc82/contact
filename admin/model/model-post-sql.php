<?php
require_once ( dirname( __FILE__ ) . '../../setting.php' );




date_default_timezone_set('Asia/Tokyo');
//今日から2ヶ月の情報を取得します。
$startDate = date('Y-m-d');
$endDate = date('Y-m-d', strtotime('+2 month'));
$diff = (strtotime($endDate) - strtotime($startDate)) / ( 60 * 60 * 24);
for($i = 0; $i <= $diff; $i++) {
  $period[] = date('Y/m/d', strtotime($startDate . '+' . $i . 'days'));
  //スラッシュなしのパターン
  $period_input[] = date('Ymd', strtotime($startDate . '+' . $i . 'days'));

  $period_input_sql[] = date('Y-m-d', strtotime($startDate . '+' . $i . 'days'));

}





$reseve_time_arr = ['10:00', '11:30', '13:00', '14:30', '16:00', '17:30', '19:00', '20:30'];
//時間のコロンなしのパターン
$reseve_time_input_arr = ['1000', '1130', '1300', '1430', '1600', '1730', '1900', '2030'];

//検索に必要なkeyカラム名
$serach_pure_key = '';
//ステータス　0 1
$status = '';


$Today = date('Y-m-d');
$modify_time = 'cast('. $Today. ' as date)';




if($_SERVER["REQUEST_METHOD"]=='POST'){

  try {
    // MySQLへの接続
    $mysqli = new mysqli($host, $user, $passward, $dbname);


    for ($day_count=0; $day_count < count($period) ; $day_count++) {
      for ($time_count=0; $time_count < count($reseve_time_arr); $time_count++) {


        $serach_pure_key = $period_input[$day_count]. $reseve_time_input_arr[$time_count];
        $status = $_POST[$serach_pure_key];
        $format_time = "cast('".$period_input_sql[$day_count]." ".$reseve_time_arr[$time_count].":00"."' as datetime)";//.' '.$reseve_time_arr[$time_count];

        //検索
        $sql = 'SELECT COUNT(*) FROM '.$table_name.' where pure_key = '.$serach_pure_key;
        $mysqli->set_charset('utf8');
        $isset_pure_key = $mysqli->query($sql);

        //すでにデータがあるか $isset_pure_key_arr[0][0] 　true:1 false:0
        $isset_pure_key_arr = $isset_pure_key->fetch_all();
        if ($isset_pure_key_arr[0][0]) {
          $sql = "UPDATE ".$table_name." SET status =".$status.",modify_time = ". $modify_time. " WHERE ".$table_name.".pure_key =".$serach_pure_key ;

        }else{
          $sql = "INSERT INTO ".$table_name." (id, pure_key, format_time, modify_time, status) VALUES (NULL, ". $serach_pure_key. ",". $format_time. ",".$modify_time . ",". $status. ")";
        }
        $mysqli->query($sql);
      }
    }
  }catch (PDOException $e) { // PDOExceptionをキャッチする
    print "エラー!: " . $e->getMessage() . "<br/gt;";
    die();
  }

  header('Location:'.$redirect_url.$redirect_url_sub);
  exit;

}

 ?>
