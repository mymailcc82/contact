<?php

  //その他のメニュー
  $name =$_POST["name"];
  $mail =$_POST["mail"];
  $tel =$_POST["tel"];
  $info =$_POST["info"];

  $reserve_day = $_POST["reserve_day"];
  $reserve_time = $_POST["reserve_time"];


  $osusume_menu_arr = $_POST["else_menu"];

  function erro_bool($str){
    if ($str) {
      echo $str;
    }else{
      echo '<span class="err">';
      echo "入力がありません。";
      echo "</span>";
    }
  }
 ?>


 <div class="contact">
   <h2 class="contact-h2">ご予約フォーム</h2>
   <div class="contact__inner">
     <h3 class="contact-h3">ご予約はカンタン3ステップ</h4>
     <ul class="contact-step">
       <li>メニュー・日時を選ぶ</li>
       <li>お客様情報のご入力</li>
       <li class="active">お客様情報のご確認</li>
     </ul>

     <h3>入力情報</h3>
     <dl class="insert-infomation">
       <dt>名前</dt>
       <dd><?php erro_bool($name);?></dd>
       <dt>メール</dt>
       <dd><?php erro_bool($mail);?></dd>
       <dt>電話</dt>
       <dd><?php erro_bool($tel);?></dd>
       <dt>その他</dt>
       <dd><?php erro_bool($info);?></dd>
       <dt>メニュー</dt>
       <dd>
         <?php foreach ($osusume_menu_arr as $osusume_menu_arr_key => $osusume_menu_arr_value): ?>
           <?php echo $osusume_menu_arr_value;?>
         <?php endforeach; ?>
         <?php if (empty($osusume_menu_arr)) {
           echo '<span class="err">入力がありません。</span>';
         } ?>
       </dd>
       <dt>日時</dt>
       <dd><?php echo $reserve_day.$reserve_time;　?></dd>


     </dl>

     <h3>メニュー・日時・お客様情報に誤りがないでしょうか？</h3>
     <div class="form-group txt-center">
       <form method="post" action="/contact/contact-finish.php" name="myForm">
         <ul class="form-insert">
           <li>
             <input type="hidden" name="name" class="form-control" value="<?php echo $name;?>">
           </li>
           <li>
             <input type="hidden" name="mail" class="form-control" value="<?php echo $mail;?>">
           </li>
           <li>
             <input type="hidden" name="tel" class="form-control" value="<?php echo $tel;?>">
           </li>
           <li>
             <input type="hidden" name="info" class="form-control" value="<?php echo $info;?>">
           </li>
           <li>
             <?php foreach ($osusume_menu_arr as $osusume_menu_arr_key => $osusume_menu_arr_value): ?>
               <input type="hidden" class="form-control" value="<?php echo $osusume_menu_arr_value;?>" name="osusume_menu[]">
             <?php endforeach; ?>
           </li>
           <li>
             <input type="hidden" class="form-control" value="<?php echo $reserve_day;?>" name="reserve_day">
           </li>
           <li>
             <input type="hidden" class="form-control" value="<?php echo $reserve_time;?>" name="reserve_time">
           </li>

         </ul>
         <a href="/contact/contact.php" class="btn btn-warning">最初からやり直す</a>
         <a href="#" onClick="history.back(); return false;" class="btn btn-warning">戻る</a>
         <button type="submit" class="btn btn-warning">予約を確定する</button>
         </form>
     </div>


     </div>

   </div>
 </div>
