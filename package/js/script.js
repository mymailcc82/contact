/*
$(function(){
  $("#accordion dt").on("click", function() {
    $(this).next().slideToggle();
    $(this).toggleClass("active");
  });
});
*/

function check(){
  var name = document.myForm.name.value;
  var mail = document.myForm.mail.value;
  var tel = document.myForm.tel.value;

  var errMessage = document.getElementById('errmessage');
  errMessage.textContent = '';

  var flag = 0;

  if(name == ""){ // 「お名前」の入力をチェック
		flag = 1;
    errMessage.insertAdjacentHTML('beforeend', '<li>お名前が未記入です。</li>');
	}
  if (mail == "") {
    flag = 1;
    errMessage.insertAdjacentHTML('beforeend', '<li>メールが未記入です。</li>');
  }
  if (tel == "") {
    flag = 1;
    errMessage.insertAdjacentHTML('beforeend', '<li>電話番号が未記入です。</li>');
  }
  if(flag){
		window.alert('必須項目に未入力がありました'); // 入力漏れがあれば警告ダイアログを表示
		return false; // 送信を中止
	}
	else{
		return true; // 送信を実行
	}
}

function checkFirst(){

  var osusumeMenu = document.myForm.elements['osusume_menu[]'];
  var arr1 = [];



  for (let i = 0; i < osusumeMenu.length; i++){
		if(osusumeMenu[i].checked){ //(color1[i].checked === true)と同じ
			arr1.push(osusumeMenu[i].value);
		}
	}




  if (arr1.length > 0) {
    return true;
  }else{
    window.alert('メニューを選択してください'); // 入力漏れがあれば警告ダイアログを表示
    return false;
  }

}



var json_name_path = '/contact/admin/model/db_ajax.php';

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
      url: json_name_path,
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
        url: json_name_path,
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
      url:json_name_path,
      type:"POST",
      dataType:"json",
      data:dt
    });
  };


}
