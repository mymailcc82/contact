


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


</style>
<div class="contact">
  <h2 class="contact-h2">ご予約フォーム</h2>
  <div class="contact__inner">
    <h3 class="contact-h3">ご予約はカンタン3ステップ</h4>
    <ul class="contact-step">
      <li class="active">メニュー・日時を選ぶ</li>
      <li>お客様情報のご入力</li>
      <li>お客様情報のご確認</li>
    </ul>

    <div class="form-group" id="accordion">
      <form method="post" action="/contact/contact-calendar.php" name="myForm" onSubmit="return checkFirst()">
        <h3 class="contact-h3">メニューを選択してください</h3>
        <dl class="form-group">
          <dt><h4 class="contact-h4">キャンペーンメニュー</h4></dt>
          <dd>
            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="SHR全身脱毛D　1年コース" />
              <span class="checkbox-icon"></span>
              SHR 全身脱毛D　1年コース・・・¥168,000
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>
          </dd>
        </dl>
        <dl class="form-group">
          <dt><h4 class="contact-h4">おすすめメニュー</h4></dt>
          <dd>
            <h5>Facial</h5>
            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU体験コース" />
              <span class="checkbox-icon"></span>
              シーラインHIFU体験コース・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>




            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="ラバトロン体験コース" />
              <span class="checkbox-icon"></span>
              ラバトロンリフトアップ体験コース・・・¥6,000
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <h5>Body</h5>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインボディ体験コース" />
              <span class="checkbox-icon"></span>
              シーラインボディ体験コース・・・￥19,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="ツインクライオ体験コース" />
              <span class="checkbox-icon"></span>
              ツインクライオ体験コース・・・￥9,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <h5>Remover</h5>
            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="SHR 全身脱毛 A" />
              <span class="checkbox-icon"></span>
              SHR 全身脱毛 A・・・¥45,000
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="osusume_menu[]">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="SHR 全身脱毛 B" />
              <span class="checkbox-icon"></span>
              SHR 全身脱毛 B・・・¥42,000
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>
          </dd>

        </dl>


        <dl class="form-group">
          <dt><h4 class="contact-h4">その他体験メニュー</h4></dt>
          <dd>
            <h5>Facial</h5>
            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <h5>Body</h5>
            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <h5>Remover</h5>
            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>

            <label>
              <input type="checkbox" class="checkbox" name="osusume_menu[]" value="シーラインHIFU" />
              <span class="checkbox-icon"></span>
              シーラインHIFU・・・￥12,800
            </label>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="cs_checkbox" name="menu_2">
                <span class="checkbox-icon"></span>
               Checkbox
              </label>
            </div>
          </dd>

        </dl>
        <div class="txt-center">
          <button type="submit" class="btn btn-warning">次へ</button>
        </div>
      </form>
    </div>
  </div>

</div>
