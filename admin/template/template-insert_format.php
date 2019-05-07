
<?php
ini_set('display_errors', 0);

//dbデータベース
  $user = 'root';
  $passward = 'root';
  $host = 'localhost';
  $dbname = 'mysql';




  try {
    // MySQLへの接続
    $dbh = new mysqli($host, $user, $passward, $dbname);
    // 接続を使用する
    $sql = "SHOW TABLES LIKE 'test_ajax'";
    $show_tables = $dbh->query($sql);


    //table作成
    if (!$show_tables->num_rows) {
      $sql_2 = 'CREATE TABLE test_ajax(
        id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
        pure_key TEXT,
        format_time TIMESTAMP default CURRENT_TIMESTAMP,
        modify_time TIMESTAMP default CURRENT_TIMESTAMP,
        status INT(11)
      )';

      $dbh->set_charset('utf8');
      $dbh->query($sql_2);
    }
  } catch (PDOException $e) { // PDOExceptionをキャッチする
    print "エラー!: " . $e->getMessage() . "<br/gt;";
    die();
  }

  try {
    // MySQLへの接続
    $dbh = new mysqli($host, $user, $passward, $dbname);
    // 接続を使用する
    $sql = "delete from test_ajax where format_time < '". $startDate. "'";
    //$sql = "select * from test_ajax where format_time < '". $startDate. "'";
    //echo $sql;
    $dbh->query($sql);
    //var_dump($test_22);

  } catch (PDOException $e) { // PDOExceptionをキャッチする
    print "エラー!: " . $e->getMessage() . "<br/gt;";
    die();
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



//日時を取得　例)2019/03/25/
$format_time = '';
//時間を取得 例)13:30
$format_minutes = '';


//
try {
  // MySQLへの接続
  $dbh = new mysqli($host, $user, $passward, $dbname);
  // 接続を使用する
  $sql = 'SELECT * from test_ajax';
  $data_base_obj = $dbh->query($sql);
} catch (PDOException $e) { // PDOExceptionをキャッチする
  print "エラー!: " . $e->getMessage() . "<br/gt;";
  die();
}



foreach($data_base_obj as $val) {
  $format_time =  $val['format_time'];
  $format_time =  date('Y/m/d', strtotime($format_time));

  $format_minutes =  $val['format_time'];
  $format_minutes =  date('H:i', strtotime($format_minutes));

  $date_status = $val['status'];

  $schedule_json_obj[0][$format_time][$format_minutes] = $date_status;
}

//print_r($schedule_json_obj);






 ?>

<form action="./db_insert.php" method="post" name="adminform">
<table class="insert_format_table">



  <?php
  $elm_table = '';
  $elm_table .= '<tr>';
  $elm_table .= '<td>';
  $elm_table .= '</td>';
  for ($time_count=0; $time_count < count($reseve_time_arr); $time_count++) {
    $elm_table .= '<td>';
    $elm_table .= $reseve_time_arr[$time_count];
    $elm_table .= '</td>';
  }
  $elm_table .= '<td>オールチェック</td>';
  $elm_table .= '</tr>';
  for ($day_count=0; $day_count < count($period) ; $day_count++) {
    $elm_table .= '<tr>';
    $elm_table .= '<td>';
    $elm_table .= $period[$day_count];
    $elm_table .= '</td>';
    for ($time_count=0; $time_count < count($reseve_time_arr); $time_count++) {
      $elm_table .= '<td>';
      if ($schedule_json_obj[0][$period[$day_count]][$reseve_time_arr[$time_count]]) {
        $elm_table .= '<input name="'. $period_input[$day_count]. $reseve_time_input_arr[$time_count]. '" type="hidden" value="0" checked="checked" class="'.$period_input[$day_count].'">';
        $elm_table .= '<input name="'. $period_input[$day_count]. $reseve_time_input_arr[$time_count]. '" type="checkbox" value="1" checked="checked" class="'.$period_input[$day_count].'">';
      }else{
        $elm_table .= '<input name="'. $period_input[$day_count]. $reseve_time_input_arr[$time_count]. '" type="hidden" value="0" checked="checked" class="'.$period_input[$day_count].'">';
        $elm_table .= '<input name="'. $period_input[$day_count]. $reseve_time_input_arr[$time_count]. '" type="checkbox" value="1" class="'.$period_input[$day_count].'">';
      }
      $elm_table .= '</td>';
    }
    $elm_table .= '<td>
      <input type="button" value="ON" onclick="allcheck(true, '.$period_input[$day_count].');">
      <input type="button" value="OFF" onclick="allcheck(false, '.$period_input[$day_count].');">
    </td>';
    $elm_table .= '</tr>';
    $elm_table .= '';

  }
  ?>
  <?php echo $elm_table;?>
</table>
<div class="submit-fixed">
  <input type="submit" value="送信" class="btn-flat-double-border">
</div>
</form>


<style>
  .submit-fixed{
    position: fixed;
    width: 100%;
    bottom:0px;
    left: 0px;
    background-color: #ddd;
    text-align: center;
    padding: 20px 0px;
    opacity: 0.8;
  }
  .btn-flat-double-border {
  display: inline-block;
  padding: 0.5em 4em;
  text-decoration: none;
  color: #333;
  border: double 4px #333;
  border-radius: 3px;
  transition: .4s;
  font-size: 16px;
}
.btn-flat-double-border:hover {
  background: #fffbef;
  cursor: pointer;
}
</style>
