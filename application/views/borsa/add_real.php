<div class="content">
    <div class="container-fluid">
      <div class="row">
        <form id="easte_form" class="" action="<?=base_url()?>home/show_suggests" method="post">
            <div  class="col-md-9">
                <div class="">
                  <div class="form-group col-md-2 required" id="request_type">
                    <label for="" class="control-label"> نوع العملية </label>
                    <select class="form-control"   name="request_type" required autofocus>
                      <option value="1">عرض</option>
                      <option value="2" <?php if(@$_GET['phone']) echo "selected";?> >طلب</option>
                      <option value="3">إيجار</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2 required" id="type">
                    <label for="" class="control-label" > نوع العقار </label>
                    <select class="form-control" name="type"  required>

                      <?php
                          foreach ($easte_type as $row) {
                            echo "<option value='$row->id'>$row->name</option>";
                          }
                      ?>

                    </select>
                  </div>
                  <div class="form-group col-md-2 required" id="category">
                    <label for="" class="control-label">فئة العقار</label>
                    <select class="form-control" name="category" >
                      <option value="سكني">سكني</option>
                      <option value="تجاري">تجاري</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2 required" id="yard">
                    <label for="" class="control-label">الحرم</label>
                    <select class="form-control" name="yard" >
                      <option value=""></option>
                      <option value="داخلي">داخلي</option>
                      <option value="خارجي">خارجي</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2 required " id="space" >
                    <label for="" class="control-label">المساحة</label>
                    <input type="number" class="form-control" name="space" value="">
                  </div>
                </div>
                <div class="">
                  <div class="form-group col-md-2" id="age"  >
                    <label for="" class="control-label">العمر</label>
                    <input type="number" class="form-control" name="age" value="">
                  </div>
                  <div class="form-group col-md-2" id="floor_cat" >
                    <label for="" class="control-label"> فئة الادوار </label>
                    <select class="form-control" name="floor_cat">
                      <option value=""></option>
                      <option value="دورين">دورين</option>
                      <option value="4 أدوار">4 أدوار</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2" id="number_of_floor">
                    <label for="" class="control-label">عدد الادوار</label>
                    <input type="number" class="form-control" name="number_of_floor" value="">
                  </div>
                  <div class="form-group col-md-3" id="apartment_cat">
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
                  <div class="form-group col-md-3" id="apartment_number_store">
                    <label for="" class="control-label">عدد الشقق و المحلات</label>
                    <input type="number" class="form-control"  name="apartment_number_store" value="" >
                  </div>
                  <div class="form-group col-md-2"  id="estate_numebr">
                    <label for="" class="control-label">رقم العقار</label>
                    <input type="text" class="form-control" name="estate_numebr" value="">
                  </div>
                </div>
                <div class="">
                  <div class="form-group col-md-2" id="street">
                    <label for="" class="control-label"  >الشارع الرئيسي</label>
                    <input type="text" class="form-control" name="street" value="">
                  </div>
                  <div class="form-group col-md-3 required" id="neighborhood" >
                    <label for="" class="control-label">الحي</label>
                    <select class="form-control" name="neighborhood">
                      <?php
                        foreach ($neighborhood as $row) {
                            echo "<option value='$row->id'>$row->name</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2" id="planned">
                    <label for="" class="control-label">المخطط</label>
                    <input type="text" class="form-control" name="planned" value="">
                  </div>
                  <div class="form-group col-md-3" id="street_width" >
                    <label for="" class="control-label">عرض الشارع والوجهات </label>
                    <input type="text" class="form-control" name="street_width" value="">
                  </div>
                  <div class="form-group col-md-2" id="elevator" >
                    <label for="" class="control-label">المصعد</label>
                    <select class="form-control" name="elevator">
                        <option value="لا">لا</option>
                        <option value="نعم">نعم</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2" id="income">
                    <label for="" class="control-label">الدخل</label>
                    <input type="number" class="form-control" name="income" value="">
                  </div>
                </div>
                <div class="">
                  <div class="form-group col-md-2 required" id="price">
                    <label for="" class="control-label">السعر</label>
                    <input type="text" class="form-control" name="price" value="">
                  </div>
                  <div class="form-group col-md-2" id="percent">
                    <label for="" class="control-label" >النسبه بالمائه</label>
                    <input type="text" class="form-control" name="percent" value="">
                  </div>
                  <div class="form-group col-md-2 required"  id="customer_type">
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
                  <div class="form-group col-md-2" id="customer_name">
                    <label for="" class="control-label" >اسم العميل</label>
                    <input type="text" class="form-control" name="customer_name"  value="" autocomplete="on">
                  </div>
                  <div class="form-group col-md-2 required" id="customer_phone" >
                    <label for="" class="control-label">تليفون العميل</label>
                    <input type="text" class="form-control" name="customer_phone" value="<?=@$_GET['phone']?>" maxlength="10" minLength="10" required>
                  </div>
                </div>
                <div class="">
                  <div class="form-group col-md-3" id="y" >
                    <label for="" class="control-label" >إحداثيات خط العرض</label>
                    <input type="text" class="form-control" name="y" value="">
                  </div>
                  <div class="form-group col-md-3" id="x" >
                    <label for="" class="control-label" >إحداثيات خط الطول</label>
                    <input type="text" class="form-control" name="x" value="">
                  </div>
                  <div class="form-group col-md-12 required" id="note">
                    <label for="" class="control-label" >ملاحظات </label>
                    <textarea name="note" class="form-control" rows="8" cols="80" ></textarea>
                  </div>

                </div>
           </div>
           <div class="col-md-3 map">
             <div id="map"></div>
             <p style="color:red;">اسحب المؤشر على الموقع الخاص بالعقار</p>
           </div>

           <div class="form-group col-md-9">
             <hr/>
             <button type="submit" class="btn btn-primary mb-2" name="button">إضافة</button>
           </div>
        </form>
      </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK7YcBTL2ba1AS6bYqGtdOdCQMzJHXCyo&callback=initMap" async defer></script>
<script type="text/javascript">
  var map;
  var marker;
  var x;
  var y;
  var pos;

  function initMap() {

      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 24.46830352478768 , lng: 39.61075275296582},
        zoom: 14,
        mapTypeId: 'satellite'
      });

      marker = new google.maps.Marker({
        position: {lat: 24.46830352478768, lng: 39.61075275296582},
        map: map,
        draggable: true
      });



      // Try HTML5 geolocation.
     if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(function(position) {
         pos = {
           lat: position.coords.latitude,
           lng: position.coords.longitude
         };

         map.setCenter(pos);
         map.setZoom(18);
         marker.setPosition(pos);

         $("input[name='y']").val(position.coords.latitude);
         $("input[name='x']").val(position.coords.longitude);

       }, function() {
         handleLocationError(true, infoWindow, map.getCenter());
       });
     } else {
       // Browser doesn't support Geolocation
       handleLocationError(false, infoWindow, map.getCenter());
     }




      google.maps.event.addListener(marker, 'dragend' , function(){
        y = marker.getPosition().lat();
        x = marker.getPosition().lng();

        $("input[name='y']").val(y);
        $("input[name='x']").val(x);

      });
  }


  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
  }


</script>

<!-- this for autocomplete -->
<script src="<?=base_url()?>js/jquery-ui.js" charset="utf-8"></script>
<script type="text/javascript">

    $("select[name='request_type']").change(function() {
        // alert("hello" + $(this).val());
        if ($(this).val() == 2 ) {
            $("#age").hide();
            $("#space").hide();
            $("#elevator").hide();
            $("#street_width").hide();
            $("#estate_numebr").hide();
            $("#x").hide();
            $("#y").hide();
            $('.map').hide();
        }else{
            $("#age").show();
            $("#space").show();
            $("#elevator").show();
            $("#street_width").show();
            $("#estate_numebr").show();
            $("#x").show();
            $("#y").show();
            $('.map').show();
        }
    });

    $("select[name='type']").change(function(){

        if($(this).val() == 1){
          $("#age").hide();
          $("#number_of_floor").hide();
          $("#apartment_cat").hide();
          $("#apartment_number_store").hide();
          $("#elevator").hide();
          $("#income").hide();
          $("#percent").hide();
        }else{
          $("#age").show();
          $("#number_of_floor").show();
          $("#apartment_cat").show();
          $("#apartment_number_store").show();
          $("#elevator").show();
          $("#income").show();
          $("#percent").show();
        }
    });

    $("input[name='price']").blur(function(){
        var percent = 0;
        var income  = Number($("input[name='income']").val());
        var price   = Number($("input[name='price']").val());
        if(income > 0){
          percent = (income / price) * 100;
          percent = percent.toFixed(2);
          $("input[name='percent']").val(percent + " %");
        }

    });

    $("#easte_form").submit(function(e){

        if($("#space").is(":visible")){

          $("input[name='space']").removeClass("is-invalid")

          if($("input[name='space']").val().length <= 0){
            e.preventDefault();
            $("input[name='space']").addClass("is-invalid");

            alert("الرجاء تعبئة خانة المساحة")
          }
        }

        if($("#note").is(":visible")){
          if($("textarea[name='note']").val().length <= 0){
            e.preventDefault();
            alert(" الرجاء تعبئة مربع الملاحظات ");
          }
        }

        // if( $("input[name=customer_name]").val().length <= 0 ){
        //     e.preventDefault();
        //     alert("ادخل اسم العميل");
        // }

        if( $("input[name=customer_phone]").val().length <= 0 ){
            e.preventDefault();
            alert("ادخل رقم هاتف العميل");
        }

    });

    $( "input[name='customer_phone']" ).autocomplete({
      source: "<?php echo site_url('customers/get_autocomplete/?');?>"
    });

    // $( "input[name='customer_phone']" ).autocomplete({
    //   source: "<?=base_url()?>home/showCustomers",
    //   minLength: 4,
    //   select: function( event, ui ) {
    //       event.preventDefault();
    //       $("input[name='customer_phone']").val(ui.item.value);
    //   }
    // });


</script>

<script type="text/javascript">
  $(document).ready(function(){
      if($("select[name='type']").val() == 1){
        $("#age").hide();
        $("#number_of_floor").hide();
        $("#apartment_cat").hide();
        $("#apartment_number_store").hide();
        $("#elevator").hide();
        $("#income").hide();
        $("#percent").hide();
      }else{
        $("#age").show();
        $("#number_of_floor").show();
        $("#apartment_cat").show();
        $("#apartment_number_store").show();
        $("#elevator").show();
        $("#income").show();
        $("#percent").show();
      }

      $("input[name=customer_phone]").keydown(function (e) {
        //alert('hello')
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
               // Allow: Ctrl+A, Command+A
              (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
               // Allow: home, end, left, right, down, up
              (e.keyCode >= 35 && e.keyCode <= 40)) {
                   // let it happen, don't do anything
                   return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }
      });

  });
</script>
