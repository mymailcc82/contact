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
