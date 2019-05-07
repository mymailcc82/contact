//ロード時に
$(document).ready( function(){


  //カレンダーオブジェクトの作成
  var calendar_main = new Calendar();

  //現在の時間を取得
  var now_time = calendar_main.get_now_time();
  //現在の時間から1週間後を取得
  var next_week = calendar_main.get_next_time(now_time);


  calendar_jquery_ajax().done(function(data) {
    //console.log(data);
    var data_insert = calendar_main.display_calendar(now_time, data);
    document.getElementById('calendar').appendChild(data_insert);
    //$('#next_week').val(data[0].date_time.next_week);

    $('#next_week').val(next_week);
    $('#now_time').val(now_time);

  }).fail(function(data) {
    console.log(data);
  });


  //ajax通信をします。
  function calendar_jquery_ajax(){
    //Ajaxに渡すデータ
    var dt = {
      'now_time': now_time,
      'next_week': next_week
    };
    //Ajax通信を行う
    return $.ajax({
      url:"/ajax/admin/model/db_ajax.php",
      type:"POST",
      dataType:"json",
      data:dt
    });
  };


});

$(function(){
  $('#next_week_btn').click(function(){
    search_calendar_next();
  });

});

$(function(){
  $('#before_week_btn').click(function(){
    search_calendar_before();
  });
});

function search_calendar_before(){
  var calendar_main = new Calendar();
  var now_time = $('#now_time').val();
  var bofore_time = calendar_main.get_before_time(now_time);


  //beforetimeが今日よりも前かをチェック
  if(bofore_time){
    $('#next_week').val($("#now_time").val());
    $('#now_time').val($("#before_week").val());

    now_time = $('#now_time').val();


    $('#before_week').val(bofore_time);


    var next_week = $('#next_week').val();

    //2回目以降にしよう テーブルの中をからにします。
    var data_delete = document.getElementById('calendar-table');
    document.getElementById('calendar').removeChild(data_delete);

    calendar_jquery_ajax().done(function(data) {
      console.log(data);
      var data_insert = calendar_main.display_calendar(now_time, data);
      document.getElementById('calendar').appendChild(data_insert);

      $('#next_week').val(next_week);
      $('#now_time').val(now_time);
      $('#before_week').val(bofore_time);

    }).fail(function(data) {
      console.log(data);
    });

    //ajax通信をします。
    function calendar_jquery_ajax(){
      //Ajaxに渡すデータ
      var dt = {
        'now_time': now_time,
        'next_week': next_week,
        'before_week': bofore_time

      };
      //Ajax通信を行う
      return $.ajax({
        url:"/ajax/admin/model/db_ajax.php",
        type:"POST",
        dataType:"json",
        data:dt
      });
    };
  }else{
    alert('前週のデータはございません。');
  }


}




function search_calendar_next(){
  var calendar_main = new Calendar();
  var before_time = $('#now_time').val();
  $('#before_week').val($("#now_time").val());
  $('#now_time').val($("#next_week").val());

  var now_time = $('#now_time').val();

  var next_week = calendar_main.get_next_time(now_time);
  $('#next_week').val(next_week);





  //2回目以降にしよう テーブルの中をからにします。
  var data_delete = document.getElementById('calendar-table');
  document.getElementById('calendar').removeChild(data_delete);

  calendar_jquery_ajax().done(function(data) {
    console.log(data);
    var data_insert = calendar_main.display_calendar(now_time, data);
    document.getElementById('calendar').appendChild(data_insert);


  }).fail(function(data) {
    console.log(data);
  });

  //ajax通信をします。
  function calendar_jquery_ajax(){
    //Ajaxに渡すデータ
    var dt = {
      'now_time': now_time,
      'next_week': next_week,
      'before_week': before_time

    };
    //Ajax通信を行う
    return $.ajax({
      url:"/ajax/admin/model/db_ajax.php",
      type:"POST",
      dataType:"json",
      data:dt
    });
  };


}
