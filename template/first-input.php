
<link rel="stylesheet" type="text/css" href="/contact/package/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<style>
.radio {
display: none;
}
.radio + .radio-icon:before {
content: "\f3a6";
font-family: "Ionicons";
color: #ccc;
font-size: 22px;
}
.radio:checked + .radio-icon:before {
content: "\f3a7";
color: #17bcdf;
}

.checkbox {
  display: none;
}
.checkbox + .checkbox-icon {
  position: relative;
  vertical-align: middle;
}
.checkbox + .checkbox-icon:before {
  content: "\f372";
  font-family: "Ionicons";
  color: #ccc;
  font-size: 22px;
}
.checkbox:checked + .checkbox-icon:before {
  content: "\f374";
  color: #17bcdf;
}
.step{
  display: flex;
}
.step li{
  display:block;
}
.active{
  background-color: #ffff00;
}
</style>

<h3>first-input</h3>

<ul class="step">
  <li class="active">メニュー・日時を選ぶ</li>
  <li>お客様情報の誤入力</li>
  <li>お客様情報のご確認</li>
</ul>

<div class="form-group">
  <form method="post" action="/contact-step-2.php" name="myForm">
    <h3>メニューを選択してください。</h3>
    <h4>キャンペーンメニュー</h4>
    <div class="form-group">
      <label>
        <input type="checkbox" class="checkbox" name="menu" value="全身脱毛" />
        <span class="checkbox-icon"></span>
        全身脱毛D
      </label>
      <div class="checkbox">
        <label>
          <input type="checkbox" class="cs_checkbox" name="menu_2">
          <span class="checkbox-icon"></span>
         Checkbox
        </label>
      </div>
    </div>
    <h4>その他体験メニュー</h4>
    <div class="form-group">
      <select name="example">
        <option value="選択肢1">HIFU</option>
        <option value="選択肢2">脱毛</option>
        <option value="選択肢3">メンズ</option>
      </select>
    </div>
</div>

    <button type="submit" class="btn btn-warning">次へ</button>
  </form>
</div>
