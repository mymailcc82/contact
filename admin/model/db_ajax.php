<?php

  $now_time = $_POST['now_time'];
  $next_week = $_POST['next_week'];
  $before_week = $_POST['brefore_week'];


  //dbデータベース
  require_once ( dirname( __FILE__ ) . '../../setting.php' );

  //日時を取得　例)2019/03/25/
  $format_time = '';
  //時間を取得 例)13:30
  $format_minutes = '';

  try {
    // MySQLへの接続
    $dbh = new mysqli($host, $user, $passward, $dbname);
    // 接続を使用する
    $sql = 'SELECT * from '.$table_name;
    $data_base_obj = $dbh->query($sql);
  } catch (PDOException $e) { // PDOExceptionをキャッチする
    print "エラー!: " . $e->getMessage() . "<br/gt;";
    die();
  }

  //$data_base_obj
  /*
    id, format_time, modify_time, status,
  */


  /*
  $schedule_json_obj[]=array(
    'date_time' => array(
      'now_time'=> $now_time,
      'next_week'=> $next_week
    ),
  );

  foreach($data_base_obj as $val) {
    $format_time =  $val['format_time'];
    $format_time =  date('Y/m/d', strtotime($format_time));

    $format_minutes =  $val['format_time'];
    $format_minutes =  date('H:i', strtotime($format_minutes));

    $date_status = $val['status'];

    $schedule_json_obj[0][$format_time][$format_minutes] = $date_status;
  }
  */

  $schedule_json_obj[]=array(
    'date_time' => array(
      'now_time'=> $now_time,
      'next_week'=> $next_week,
      'next_week'=> $before_week
    ),
  );

  foreach($data_base_obj as $val) {
    $format_time =  $val['format_time'];
    $format_time =  date('Ymd', strtotime($format_time));

    $format_minutes =  $val['format_time'];
    $format_minutes =  date('Hi', strtotime($format_minutes));

    $date_status = $val['status'];

    $schedule_json_obj[0][$format_time]['t'.$format_minutes] = $date_status;
  }






  //jsonとして出力
  header('Content-type: application/json');

  echo json_encode($schedule_json_obj);;


 ?>
