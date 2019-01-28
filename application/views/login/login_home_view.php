  <div class="login_wrapper">
    <?=$msg;?>
    <form action="" method="post">
     <div class="container">
       <label for="uname"><b>اسم المستخدم</b></label>
       <input type="text" placeholder="اسم المستخدم" name="user" value="" autofocus required autocomplete="on" />

       <!-- <input type="text" name="" value=""> -->

       <label for="psw"><b>كلمة المرور</b></label>
       <input type="password" placeholder="كلمة المرور" name="pass" value="" required autocomplete="off" />

       <button type="submit">ارسال</button>
       <label>
         <input type="checkbox" name="remember"> تذكرني
       </label>
     </div>

     <div class="container" style="background-color:#f1f1f1">
       <a href="<?=base_url();?>resetpassword">نسيت كلمة المرور ؟ </a>
       <!-- <button type="button" class="cancelbtn">إلغاء</button>
       <span class="psw"><a href="#">نسيت كلمة المرور ؟ </a></span> -->
     </div>
    </form>
  </div>
