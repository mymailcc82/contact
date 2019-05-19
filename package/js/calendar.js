



class Calendar{

  constructor(){
    this.COUNT_DAY = 7; //一週間なら7を入力
    this.dayOfWeekStr = [ "日", "月", "火", "水", "木", "金", "土" ];  //数値を曜日に変更に使用
    this.Reseve_Time_Name_Arr = ['10:00', '11:30', '13:00', '14:30', '16:00', '17:30', '19:00', '20:30'];　//tableのtdで表示される時間
    this.Reseve_Time_Key_Json_Arr = ['t1000', 't1130', 't1300', 't1430', 't1600', 't1730', 't1900', 't2030'];　//jsonで取得したデータのkey名を格納
  }

  get_now_time(){
    //var now_time = moment().subtract(0, 'days').calendar();
    var now_time = moment().format('YYYY/MM/DD');
    //var now_time = new Date();
    //now_time.setTime(now_time.getTime() + 1000*60*60*9);// JSTに変換
    return now_time;
  }

  get_next_time(time){
    var now_time = time;
    var next_time = new Date(now_time);

    next_time.setDate(next_time.getDate() + this.COUNT_DAY);

    var year  = next_time.getFullYear();
    var month = ('0' + (next_time.getMonth() + 1)).slice(-2);
    var day   = ('0' + (next_time.getDate())).slice(-2);

    return String(year) + "/" + String(month) + "/" + String(day);
  }

  get_before_time(time){
    var now_time = time;
    var before_time = new Date(now_time);
    before_time.setTime(before_time.getTime() + 1000*60*60*9);// JSTに変換
    var today = this.get_now_time();

    before_time.setDate(before_time.getDate() - this.COUNT_DAY);


    var year  = before_time.getFullYear();
    var month = ('0' + (before_time.getMonth() + 1)).slice(-2);
    var day   = ('0' + (before_time.getDate())).slice(-2);

    var format_time = String(year) + "/" + String(month) + "/" + String(day);



    //今日の日付より前でないかのチェック
    if(today <= format_time){
      return format_time;
    }
    return false;
  }


  /**
   * 取得した月、次の月、次の月に行く日数を取得
   * @param {number} moment_day  - 表示される最初の日付を入力
   * @param {number} count - 取得した日付から何日後までかを取得　1週間なら
   * @return {object} -now_month, next_month, next_month_count
  **/
  check_month(moment_day,count){
    var moment_day_format = new Date(moment_day); //取得した日にちをformatに置き換える 例) 2019/03/25 -> first_data = 2019-03-25T15:00:00.000Z

    var first_day_month = moment_day_format.getMonth(); //取得した日にちの月を取得 moment_day = 2019/03/24 -> second_month = 2 typeof(number)
    first_day_month = first_day_month + 1;　// getMonth の仕様上　3月なら2を返すので、+1します。

    var second_day_month = first_day_month + 1; // moment_dayで取得した月の次の月を取得　moment_day = 2019/03/24 -> second_month = 4 typeof(number)
    var next_day_month = new Array(); //moment_dayから countの日数までの月を配列に格納　3月10日~3月12日-> ['3', '3', '3']
    var month_sum = ''; //取得した月すべてを足す　3月10日~3月12日-> 9


    //function 次の月にまたぐ日にちがいくつあるか　なければ0 全てなら6になる
    /**
    @param {time} now_month - 取得した日にちの月 5
    @param {int} sum - 取得した月から次の月に行く日数を入力
    **/
    var search_how_next_month = function(now_month, sum){
      var now_month = now_month * count;
      return sum - now_month;
    }

    // function　sumで配列内の数字をすべて足す。
    var sum  = function(arr) {
      var sum = 0;
      arr.forEach(function(elm){ sum += elm; });
      return sum;
    };

    for (var i = 0; i < count; i++) {
      var now_day = new Date(moment_day);
      var next_day = now_day.setDate( now_day.getDate() + i );
      //月データーformatに+1する 3月なら2になるので+1する
      next_day = new Date(next_day).getMonth() + 1;
      next_day_month.push(next_day);
    }

    month_sum = sum(next_day_month);
    search_how_next_month = search_how_next_month(first_day_month,month_sum);

    var get_data = {
      now_month: first_day_month,
      next_month: second_day_month,
      next_month_count : search_how_next_month
    };
    return get_data;
  }

  /**
   * tableのcolspanを分けるためのfunctionです。
   * @param {object} object  - now_month next_month next_month_count 例) 3 4 4 現在3月、次の月が4月　4月になる日にちが4日
   * @param {number} num - 取得日数　一週間なら7を入力
   * @return {object} -first_cell_num, second_sell_num, second_cell_name //second_cell_nameはsecond_sell_numが0ならnone、1以上ならblock
  **/
  devid_cell(object,num){
    var count = num
    var get_month = object;
    //最初のcolspanの数を取得
    var first_cell_num = '';
    //2つ目のcolspanの数を取得
    var second_cell_num = get_month['next_month_count'];
    //second_cellのクラス名
    var second_cell_name = 'block';
    //returnデータの格納場所
    var get_devid_cell = new Object();

    first_cell_num = count - second_cell_num;
    if (second_cell_num == 0) {
      second_cell_name = 'none';
    }
    get_devid_cell = {
      first_cell_num : first_cell_num,
      second_cell_num : second_cell_num,
      second_cell_name : second_cell_name
    }
    return get_devid_cell;
  }

  /**
   * 日にちと曜日(num) ハイフンなしの年月日を取得 例) date = 25 day = 2 datetime = 20190325
   * @param {number} time  - 時間を入力  2019/03/26
   * @param {number} count - 取得日数　一週間なら7を入力
   * @return {object}
  **/
  get_day(time, count){
    var get_date_obj = new Object(); //リターンで返すオブジェクト

    for (var i = 0; i < count; i++) {
      //formatにする 2019-03-25T15:00:00.000Z
      var first_day = new Date(time);
      //次の日にちを取得　例)1553526000000
      var next_day = first_day.setDate( first_day.getDate() + i );
      //objectのkeyの値
      var obj_name = i;
      //format_dateのデータ
      var y = new Date(next_day).getFullYear();
      var m = ("00" + (new Date(next_day).getMonth()+1)).slice(-2);
      var d = ("00" + new Date(next_day).getDate()).slice(-2);
      var format_date = y + m + d;

      get_date_obj[obj_name] = {
        'date' : new Date(next_day).getDate(),
        'day' : new Date(next_day).getDay(),
        'format_date' : format_date
      }
    }
    return get_date_obj;
  }
  /**
  * テーブルの作成
  * @param {number} time  - 時間  2019/03/26
  * @param {object} obj - jsonで取得したデータ
  **/
  display_calendar(time, obj){
    //今の時間を取得　format-> 2019/03/26
    var now_time = time;
    //jsonファイルを参照　obj
    var json_data_obj = obj[0];
    //objをarrayに変換 　json_data_obj[1] 0が取得日 date_timeの中にnow_timeとnext_timeが格納
    json_data_obj = Object.entries(json_data_obj);


    //keyを日付にvalueを時間と0or1のオブジェクト
    var custom_json_data_obj = {};
    json_data_obj.forEach(function(element){
      custom_json_data_obj[element[0]] = element[1];
    });


    //今の時間を、日にちだけで取得 例) 2019年3月25日 -> 25日
    var now_time_first = new Date(now_time);
    now_time_first = now_time_first.getDate();

    //取得した月、次の月、次の月に行く日数を取得
    var get_month = this.check_month(now_time, this.COUNT_DAY);
    //tableのcolspanを分ける
    var devid_cell_month = this.devid_cell(get_month, this.COUNT_DAY);
    //日にちと曜日(num) ハイフンなしの年月日を取得 例) date = 25 day = 2 format_date = 20190325
    var get_day_obj = this.get_day(now_time, this.COUNT_DAY);



    //HTML要素にtableを追加
    var cTable = document.createElement('table');
    //追加したテーブルにクラスを付与
    cTable.className = 'calendar-table';
    //追加したテーブルにidを付与
    cTable.id = 'calendar-table';

    //htmlのtabke内部
    var insertData = '';
    //tdの月を入力
    insertData += '<thead><tr>';
    insertData += '<td colspan="' + devid_cell_month['first_cell_num'] + '" class="insert_format_table_month">' + get_month['now_month'] + '月</td>';
    insertData += '<td colspan="' + devid_cell_month['second_cell_num'] + '" class="'+ devid_cell_month['second_cell_name'] +'">' + get_month['next_month'] + '月</td>';
    insertData += '</tr></thead>';

    insertData += '<tr>';
    //tdの日にち
    for (var td_count = 0; td_count < this.COUNT_DAY; td_count++) {
      if (this.dayOfWeekStr[get_day_obj[td_count]['day']] == '日') {
        insertData += '<td class="insert_format_table_day sunday"><p>' + get_day_obj[td_count]['date'] + '<br>(' + this.dayOfWeekStr[get_day_obj[td_count]['day']] + ')</p></td>';
      }else if (this.dayOfWeekStr[get_day_obj[td_count]['day']] == '土') {
        insertData += '<td class="insert_format_table_day saturday"><p>' + get_day_obj[td_count]['date'] + '<br>(' + this.dayOfWeekStr[get_day_obj[td_count]['day']] + ')</p></td>';
      }
      else{
        insertData += '<td class="insert_format_table_day"><p>' + get_day_obj[td_count]['date'] + '<br>(' + this.dayOfWeekStr[get_day_obj[td_count]['day']] + ')</p></td>';
      }
    }
    insertData += '</tr>';

    for (var tr_count = 0; tr_count < this.Reseve_Time_Key_Json_Arr.length; tr_count++) {
      var count = tr_count;
      insertData += '<tr>';

      for (var td_count = 0; td_count < this.COUNT_DAY; td_count++) {
        //outputで送るpostデーターのvalue値
        var idVal = get_day_obj[td_count]['format_date'] + '_' + get_day_obj[td_count]['day'] + '_' + this.Reseve_Time_Name_Arr[tr_count];

        //最初日にち　例) 20190325
        if(custom_json_data_obj[get_day_obj[td_count]['format_date']]){ 　
          var insert_first_day = custom_json_data_obj[get_day_obj[td_count]['format_date']];
        }else{
          var insert_first_day = new Array();
        }

        //予約できるのかのチェック
        if (insert_first_day[ this.Reseve_Time_Key_Json_Arr[tr_count]] == "1") {
          insertData += '<td onClick="javascript:gotoInput(\'' + idVal + '\');" class="click">';
          insertData += '<div class="time-mark">'+ this.Reseve_Time_Name_Arr[tr_count] +'</div>';
          insertData += '<div class="time-ok">◎</div>';
          insertData += '</td>';
        }else{
          insertData += '<td>';
          insertData += '<div class="time-ok">X</div>';
          insertData += '</td>';
        }
        count++;
      }
      insertData += '</tr>';
    }

    cTable.innerHTML = insertData;
    return cTable;
  }
}




function gotoInput(selectedVal) {
	var selectedArray = selectedVal.split("_");
	$('[name=reserve_date]').val(selectedArray[0]);
	$('[name=reserve_day]').val(selectedArray[1]);
	$('[name=reserve_time]').val(selectedArray[2]);

	$('form').submit();
}
