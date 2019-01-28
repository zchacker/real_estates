<div class="content">
    <div class="container-fluid">
      <div class="row">
        <form id="easte_form" class="" action="" method="post">
            <div  class="col-md-9">
                <div class="">
                  <div class="form-group col-md-2 required" id="request_type">
                    <label for="" class="control-label"> نوع العملية </label>
                    <select class="form-control"   name="request_type" required autofocus>
                      <option value="1" <?php if($data->request_type == 1) echo "selected";?> >عرض</option>
                      <option value="2" <?php if($data->request_type == 2) echo "selected";?> >طلب</option>
                      <option value="3" <?php if($data->request_type == 3) echo "selected";?> >إيجار</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2 required" id="type">
                    <label for="" class="control-label" > نوع العقار </label>
                    <select class="form-control" name="type"  required>

                      <?php
                          $count = 1;
                          foreach ($easte_type as $row) {
                            $selected = "";
                            if($data->type == $count) $selected = "selected";
                            echo "<option $selected value='$row->id'>$row->name</option>";
                            $count++;
                          }
                      ?>

                    </select>
                  </div>
                  <div class="form-group col-md-2 required" id="category">
                    <label for="" class="control-label">فئة العقار</label>
                    <select class="form-control" name="category" >
                      <option <?php if($data->category == "سكني") echo "selected";?> value="سكني">سكني</option>
                      <option <?php if($data->category == "تجاري") echo "selected";?> value="تجاري">تجاري</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2 required" id="yard">
                    <label for="" class="control-label">الحرم</label>
                    <select class="form-control" name="yard" >
                      <option value=""></option>
                      <option <?php if($data->yard == "داخلي") echo "selected";?> value="داخلي">داخلي</option>
                      <option <?php if($data->yard == "خارجي") echo "selected";?> value="خارجي">خارجي</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2 required " id="space" >
                    <label for="" class="control-label">المساحة</label>
                    <input type="number" class="form-control" name="space" value="<?=$data->space?>">
                  </div>
                </div>
                <div class="">
                  <div class="form-group col-md-2" id="age"  >
                    <label for="" class="control-label">العمر</label>
                    <input type="number" class="form-control" name="age" value="<?=$data->age?>">
                  </div>
                  <div class="form-group col-md-2" id="floor_cat" >
                    <label for="" class="control-label"> فئة الادوار </label>
                    <select class="form-control" name="floor_cat">
                      <option value=""></option>
                      <option <?php if($data->floor_cat == "دورين") echo "selected";?> value="دورين">دورين</option>
                      <option <?php if($data->floor_cat == "4 أدوار") echo "selected";?> value="4 أدوار">4 أدوار</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2" id="number_of_floor">
                    <label for="" class="control-label">عدد الادوار</label>
                    <input type="number" class="form-control" name="number_of_floor" value="<?=$data->number_of_floor?>">
                  </div>
                  <div class="form-group col-md-3" id="apartment_cat">
                    <label for="" class="control-label"> فئة الشقق </label>
                    <select class="form-control" name="apartment_cat">
                      <option <?php if($data->apartment_cat == "") echo "selected";?> value=""></option>
                      <option <?php if($data->apartment_cat == "شقة واحدة") echo "selected";?> value="شقة واحدة">شقة واحدة</option>
                      <option <?php if($data->apartment_cat == "شقتين") echo "selected";?> value="شقتين">شقتين</option>
                      <option <?php if($data->apartment_cat == "شقتين أو ثلاثة") echo "selected";?> value="شقتين أو ثلاثة">شقتين أو ثلاثة</option>
                      <option <?php if($data->apartment_cat == "4 - 7 شقق") echo "selected";?> value="4 - 7 شقق">4 - 7 شقق</option>
                      <option <?php if($data->apartment_cat == "8 شقق وما فوق") echo "selected";?> value="8 شقق وما فوق">8 شقق وما فوق</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3" id="apartment_number_store">
                    <label for="" class="control-label">عدد الشقق و المحلات</label>
                    <input type="number" class="form-control"  name="apartment_number_store" value="<?=$data->apartment_number_store?>" >
                  </div>
                  <div class="form-group col-md-2"  id="estate_numebr">
                    <label for="" class="control-label">رقم العقار</label>
                    <input type="text" class="form-control" name="estate_numebr" value="<?=$data->estate_numebr?>">
                  </div>
                </div>
                <div class="">
                  <div class="form-group col-md-2" id="street">
                    <label for="" class="control-label"  >الشارع الرئيسي</label>
                    <input type="text" class="form-control" name="street" value="<?=$data->street?>">
                  </div>
                  <div class="form-group col-md-3 required" id="neighborhood" >
                    <label for="" class="control-label">الحي</label>
                    <select class="form-control" name="neighborhood">
                      <?php
                        $count = 1;
                        foreach ($neighborhood as $row) {
                            $selected = "";
                            if($data->neighborhood == $count) $selected = "selected";
                            echo "<option value='$row->id' $selected  >$row->name</option>";
                            $count++;
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2" id="planned">
                    <label for="" class="control-label">المخطط</label>
                    <input type="text" class="form-control" name="planned" value="<?=$data->planned?>">
                  </div>
                  <div class="form-group col-md-3" id="street_width" >
                    <label for="" class="control-label">عرض الشارع والوجهات </label>
                    <input type="text" class="form-control" name="street_width" value="<?=$data->street?>">
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
                    <input type="number" class="form-control" name="income" value="<?=$data->income?>">
                  </div>
                </div>
                <div class="">
                  <div class="form-group col-md-2 required" id="price">
                    <label for="" class="control-label">السعر</label>
                    <input type="text" class="form-control" name="price" value="<?=$data->price?>">
                  </div>
                  <div class="form-group col-md-2" id="percent">
                    <label for="" class="control-label" >النسبه بالمائه</label>
                    <input type="text" class="form-control" name="percent" value="<?=$data->percent?>">
                  </div>
                  <div class="form-group col-md-2 required"  id="customer_type">
                    <label for="" class="control-label" >نوع العميل</label>
                    <select class="form-control" name="customer_type" required>
                      <option value="1" <?php if($data->customer_type == 1) echo "selected"; ?> >زبون مباشر</option>
                      <option value="2" <?php if($data->customer_type == 2) echo "selected"; ?> >مالك مباشر</option>
                      <option value="3" <?php if($data->customer_type == 3) echo "selected"; ?> >وكيل</option>
                      <option value="4" <?php if($data->customer_type == 4) echo "selected"; ?> >وسيط</option>
                      <option value="5" <?php if($data->customer_type == 5) echo "selected"; ?> >وسيط أول</option>
                      <option value="6" <?php if($data->customer_type == 6) echo "selected"; ?> >وسيط ثاني</option>
                      <option value="7" <?php if($data->customer_type == 7) echo "selected"; ?> >وسيط ثالث</option>
                      <option value="8" <?php if($data->customer_type == 8) echo "selected"; ?> >وسيط رابع</option>
                      <option value="9" <?php if($data->customer_type == 9) echo "selected"; ?> >وسيط خامس</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2" id="customer_name">
                    <label for="" class="control-label" >اسم العميل</label>
                    <input type="text" class="form-control" name="customer_name"  value="<?=$data->customer_name?>" autocomplete="on">
                  </div>
                  <div class="form-group col-md-2 required" id="customer_phone" >
                    <label for="" class="control-label">تليفون العميل</label>
                    <input type="text" class="form-control" name="customer_phone" value="<?=$data->customer_phone?>" required>
                  </div>
                </div>
                <div class="">
                  <div class="form-group col-md-3" id="y" >
                    <label for="" class="control-label" >إحداثيات خط العرض</label>
                    <input type="text" class="form-control" name="y" value="<?=$data->y?>">
                  </div>
                  <div class="form-group col-md-3" id="x" >
                    <label for="" class="control-label" >إحداثيات خط الطول</label>
                    <input type="text" class="form-control" name="x" value="<?=$data->x?>">
                  </div>
                  <div class="form-group col-md-12 required" id="note">
                    <label for="" class="control-label" >ملاحظات </label>
                    <textarea name="note" class="form-control" rows="8" cols="80" ><?=$data->note?></textarea>
                  </div>

                </div>
           </div>
           <div class="col-md-3 map">
             <div id="map"></div>
             <p style="color:red;">اسحب المؤشر على الموقع الخاص بالعقار</p>
           </div>

           <div class="form-group col-md-9">
             <hr/>
             <button type="submit" class="btn btn-primary mb-2" name="button">حفظ</button>
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
        center: {lat: <?=$data->y?> , lng: <?=$data->x?>},
        zoom: 14,
        mapTypeId: 'satellite'
      });

      marker = new google.maps.Marker({
        position: {lat: <?=$data->y?> , lng: <?=$data->x?> },
        map: map,
        draggable: true
      });



      // Try HTML5 geolocation.
     /*if (navigator.geolocation) {
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
     }*/




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
            $(".map").hide();
        }else{
            $("#age").show();
            $("#space").show();
            $("#elevator").show();
            $("#street_width").show();
            $("#estate_numebr").show();
            $("#x").show();
            $("#y").show();
        }
    });

    $("select[name='type']").change(function(){

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
