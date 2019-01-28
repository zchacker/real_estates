<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>

                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
        </div>
    </div>
</footer>

</div>
</div>

<!-- this is context menu -->
<ul class='custom-menu' style="list-style: none; padding: 0;">
  <li data-action = "eidt"   data-id="" >تعديل</li>
  <li data-action = "copy"    data-id="" >نسخ</li>
  <li data-action = "copy_phone" data-id="" >نسخ رقم الهاتف</li>
  <li data-action = "whats"  data-id="" >ارسال عبر الواتساب</li>
  <li data-action = "tweet"  data-id="" >إرسال الى تويتر</li>
  <br>  
  <li data-action = "del"    data-id="" >حذف</li>
</ul>

<div class="edit_popup"></div>

<!-- edit popup -->
<div class="popup_form" id="edit_real_easte">
  <div class="edit_head">
    <span class="left_x w3-button " onclick="javascript:hide_popup();">&times;</span>
  </div>
  <div style="display:none;" id="aqar_box">
    <a href="#" style="color:red;" target="_blank" id="aqar_url">>>>>>>> الرابط في موقع عقار <<<<<<<<</a>
  </div>

  <form id="easte_form" action="<?=base_url();?>home/update_real" method="post">
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="real_number">
      <label for="" class="control-label"> رقم </label>
      <input type="number" class="form-control" name="real_number" value="" readonly>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6 required" id="request_type1">
      <label for="" class="control-label"> نوع العملية </label>
      <select class="form-control"   name="request_type" required autofocus>
        <option value="1">عرض</option>
        <option value="2">طلب</option>
        <option value="3">إيجار</option>
      </select>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6 required" id="type1">
      <label for="" class="control-label" > نوع العقار </label>
      <select class="form-control" name="type"  required>

        <?php
            foreach ($easte_type as $row) {
              echo "<option value='$row->id'>$row->name</option>";
            }
        ?>

      </select>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6 required" id="yard1">
      <label for="" class="control-label">الحرم</label>
      <select class="form-control" name="yard" >
        <option value=""></option>
        <option value="داخلي">داخلي</option>
        <option value="خارجي">خارجي</option>
      </select>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6 required " id="space1" >
      <label for="" class="control-label">المساحة</label>
      <input type="number" class="form-control" name="space" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="age1"  >
      <label for="" class="control-label">العمر</label>
      <input type="number" class="form-control" name="age" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="floor_cat1" >
      <label for="" class="control-label"> فئة الادوار </label>
      <select class="form-control" name="floor_cat">
        <option value=""></option>
        <option value="دورين">دورين</option>
        <option value="4 أدوار">4 أدوار</option>
      </select>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="number_of_floor1">
      <label for="" class="control-label">عدد الادوار</label>
      <input type="number" class="form-control" name="number_of_floor" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="apartment_cat1">
      <label for="" class="control-label"> فئة الشقق </label>
      <select class="form-control" name="apartment_cat">
        <option value=""></option>
        <option value="شقة واحدة">شقة واحدة</option>
        <option value="شقتين">شقتين</option>
        <option value="شقتين أو ثلاثة">شقتين أو ثلاثة</option>
        <option value="4 - 7 شقق">4 - 7 شقق</option>
        <option value="8 شقق وما فوق">8 شقق وما فوق</option>
      </select>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="apartment_number_store1">
      <label for="" class="control-label">عدد الشقق </label>
      <input type="number" class="form-control"  name="apartment_number_store" value="" >
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6"  id="estate_numebr1">
      <label for="" class="control-label">رقم العقار</label>
      <input type="text" class="form-control" name="estate_numebr" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="street1">
      <label for="" class="control-label"  >الشارع الرئيسي</label>
      <input type="text" class="form-control" name="street" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6 required" id="neighborhood1" >
      <label for="" class="control-label">الحي</label>
      <select class="form-control" name="neighborhood">
        <?php
          foreach ($neighborhood as $row) {
              echo "<option value='$row->id'>$row->name</option>";
          }
        ?>
      </select>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="planned1">
      <label for="" class="control-label">المخطط</label>
      <input type="text" class="form-control" name="planned" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="street_width1" >
      <label for="" class="control-label">عرض الشارع والوجهات </label>
      <input type="text" class="form-control" name="street_width" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="elevator1" >
      <label for="" class="control-label">المصعد</label>
      <select class="form-control" name="elevator">
          <option value="لا">لا</option>
          <option value="نعم">نعم</option>
      </select>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="income1">
      <label for="" class="control-label">الدخل</label>
      <input type="number" class="form-control" name="income" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6 required" id="price1">
      <label for="" class="control-label">السعر</label>
      <input type="text" class="form-control" name="price" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="percent1">
      <label for="" class="control-label" >النسبه بالمائه</label>
      <input type="text" class="form-control" name="percent" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6 required"  id="customer_type1">
      <label for="" class="control-label" >نوع العميل</label>
      <select class="form-control" name="customer_type" required>
        <option value="1">زبون مباشر</option>
        <option value="2">مالك مباشر</option>
        <option value="3">وكيل</option>
        <option value="4">وسيط</option>
        <option value="5">وسيط أول</option>
        <option value="6">وسيط ثاني</option>
        <option value="7">وسيط ثالث</option>
        <option value="8">وسيط رابع</option>
        <option value="9">وسيط خامس</option>
      </select>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="customer_name1">
      <label for="" class="control-label" >اسم العميل</label>
      <input type="text" class="form-control" name="customer_name"  value="" autocomplete="on">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6 required" id="customer_phone1" >
      <label for="" class="control-label">تليفون العميل</label>
      <input type="text" class="form-control" name="customer_phone" maxlength="10" minLength="10" value="" required>
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="y1" >
      <label for="" class="control-label" >إحداثيات خط العرض</label>
      <input type="text" class="form-control" name="y" value="">
    </div>
    <div class="form-group col-md-2 col-lg-2 col-xs-6 col-sm-6" id="x1" >
      <label for="" class="control-label" >إحداثيات خط الطول</label>
      <input type="text" class="form-control" name="x" value="">
    </div>
    <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12 required" id="note">
      <label for="" class="control-label" >ملاحظات </label>
      <textarea name="note" class="form-control" rows="3" cols="80" ></textarea>
    </div>
    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
      <div id="edit_map"></div>
      <p style="color:red;">اسحب المؤشر على الموقع الخاص بالعقار</p>
    </div>
    <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
      <button type="submit" id="save_edit_btn" class="btn btn-default mb-2" name="button" onclick="$('.edit_real_easte').hide();">حفظ</button>
      <button type="button" onclick="javascript:hide_popup();" class="btn btn-danger">أغلاق</button>
    </div>

  </form>
</div>

<!-- send to wahtsapp -->
<div id="id01" class="w3-modal">
   <div class="w3-modal-content w3-animate-zoom">
     <div class="w3-container">
       <header class="w3-container w3-teal">
        <h2>إرسال رسالة واتساب</h2>
       </header>
       <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
       <div class="wrapper">
         <form class="" target="_blank" action="<?=base_url()?>WhatappSender/send_msg" method="post" id="whatsapp_form">

            <input type="hidden" name="easte_type" id="easte_type" value="">
            <input type="hidden" name="easte_id" id="easte_id" value="">
            <input type="hidden" name="sent_whatsapp" id="sent" value="false">

            <div class="form-group col-md-12">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" name="name" value="">
            </div>

            <div class="form-group col-md-6">
              <label for="phone" class="control-label">الرقم</label>
              <input type="tel" class="form-control" id="phone" name="phone" value="" placeholder="552155471" autocomplete="off" required autofocus maxlength="10" minLength="10">
            </div>

            <div class="form-group col-md-6">
              <label for="" class="control-label" >نوع العميل</label>
              <select class="form-control" name="customer_type" required>
                <option value="1">زبون مباشر</option>
                <option value="2">مالك مباشر</option>
                <option value="3">وكيل</option>
                <option value="4">وسيط</option>
                <option value="5">وسيط أول</option>
                <option value="6">وسيط ثاني</option>
                <option value="7">وسيط ثالث</option>
                <option value="8">وسيط رابع</option>
                <option value="9">وسيط خامس</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="type" class="control-label">الحي</label>
              <select class="form-control" name="neighborhood" >
                <option value="0">الكل</option>
                <?php
                    foreach ($neighborhood as $row) {
                      echo "<option value='$row->id'>$row->name</option>";
                    }
                ?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="type" class="control-label">نوع العقار</label>
              <select class="form-control" name="easte_type" id="easte_type" >
                <option value="0">الكل</option>
                <?php
                    foreach ($easte_type as $row) {
                      echo "<option value='$row->id'>$row->name</option>";
                    }
                ?>
              </select>
            </div>

            <div class="form-group col-md-12">
                <input type="checkbox" id="location"  name="location" value="">
                <label for="location" >تضمين الموقع على الخريطة</label>
            </div>

            <div class="form-group col-md-12">
              <label for="whatsmsg" class="control-label" >الرسالة</label>
              <textarea name="whatsmsg" class="form-control" id="whatsmsg" rows="8" cols="80"></textarea>
            </div>

            <div class="form-group col-md-12">
              <label for=""></label>
              <button type="submit" onclick="hide_popup_window()" class="btn btn-primary mb-2" name="button">أرسل</button>
              <button type="button" class="btn btn-danger" onclick="document.getElementById('id01').style.display='none'">أغلق</button>
            </div>

         </form>

       </div>

     </div>
   </div>
 </div>


</body>


<!-- copy dialog -->
<div class="ios_copy">
  <form class="ios_form" action="" method="post">
    <div class="form-group">
      <textarea name="copied_text" class="form-control copied_text" rows="8" cols="80"></textarea>
    </div>
    <p>الرجاء انسخ ما بداخل المربع</p>
    <div class="form-group">
      <button type="button" class="btn btn-danger"  name="button" onclick="javascript:hide_ios_copy();" >اغلاق</button>
    </dvi>
  </form>
</div>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?=base_url();?>assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="<?=base_url();?>assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?=base_url();?>assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK7YcBTL2ba1AS6bYqGtdOdCQMzJHXCyo&callback=initMap" async defer></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="<?=base_url();?>assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<!-- <script src="<?=base_url();?>assets/js/demo.js"></script> -->


</html>
