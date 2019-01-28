
<!-- <div id="id01" class="w3-modal">
   <div class="w3-modal-content w3-animate-zoom">
     <div class="w3-container">
       <header class="w3-container w3-teal">
        <h2>إرسال رسالة واتساب</h2>
      </header>
       <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>

       <form class="" target="_blank" action="<?=base_url()?>WhatappSender/send_msg" method="post" id="whatsapp_form">

          <input type="hidden" name="easte_type" id="easte_type" value="">
          <input type="hidden" name="easte_id" id="easte_id" value="">

          <div class="form-row col-md-9">
              <label for="name">الاسم</label>
              <input type="text" class="form-control" name="name" value="">
          </div>

          <div class="form-row col-md-9">
            <label for="phone" class="control-label">الرقم</label>
            <input type="tel" class="form-control" name="phone" value="" placeholder="552155471" autocomplete="off" required autofocus>
          </div>

          <div class="form-row col-md-9">
            <label for="type" class="control-label">نوع العقار</label>
            <select class="form-control" name="type" id="type" onchange="load_table_filter()">
              <option value="0">الكل</option>
              <?php
                  foreach ($easte_type as $row) {
                    echo "<option value='$row->id'>$row->name</option>";
                  }
              ?>
            </select>
          </div>

          <div class="form-row col-md-9">
              <input type="checkbox" id="location"  name="location" value="">
              <label for="location" >تضمين الموقع على الخريطة</label>
          </div>

          <div class="form-row col-md-12">
            <label for="whatsmsg" class="control-label" >الرسالة</label>
            <textarea name="whatsmsg" class="form-control" id="whatsmsg" rows="8" cols="80"></textarea>
          </div>

          <div class="form-row col-md-1">
            <label for=""></label>
            <button type="submit" onclick="hide_popup_window()" class="btn btn-primary mb-2" name="button">أرسل</button>
          </div>

       </form>
     </div>
   </div>
 </div> -->

<!-- <div class="row ">
  <div class="container">
    <div class="row">
      <div class="col-md-1">

        <a href="#" id="hide_map" class="btn btn-warning">إخفاء</a>
        <br><br>

        <button type="button" title="نسخ" id="copy_btn" class="btn btn-primary " name="button" onclick="getSelectedRows();copySelected();" >
          <i class="fa fa-copy"></i>
        </button>

        <br><br>
        <button type="button" title="نسخ مع الموقع" id="copy_btn" class="btn btn-primary" name="button"  onclick="getSelectedRowsWithMap();copySelected();" >
          <i class="fa fa-copy"></i>+<i class="fa fa-location-arrow"></i>
        </button>

        <br><br>
        <button type="button" title="نسخ مع ارسال للواتساب" id="copy_btn" class="btn btn-primary" name="button"  onclick="sendSelectedTextViaWhatsapp();copySelected();" >
          <i class="fa fa-whatsapp"></i>+<i class="fa fa-copy"></i>
        </button>

        <br><br>
        <button type="button" title="نسخ مع ارسال الموقع عبر الواتساب" id="copy_btn" class="btn btn-primary" name="button" onclick="sendSelectedTextViaWhatsapp();copySelected();" >
          <i class="fa fa-whatsapp"></i>+<i class="fa fa-copy"></i>+<i class="fa fa-location-arrow"></i>
        </button>

        <div class="add_real_btn">
          <a href="<?=base_url()?>index.php/home/add_real_easte" class="btn btn-success">اضافة عقار</a>
        </div>

      </div>
      <div class="col-md-11">
        <div id="map"></div>
      </div>
    </div>

  </div>
</div> -->

<div class="row">

  <div class="col-md-1"></div>

  <div class="col-md-11">

    <!-- <div class="row add_real_btn">
      <a href="<?=base_url()?>index.php/home/add_real_easte" class="btn btn-success">اضافة عقار</a>
    </div> -->

    <form class="" action="" method="post" id="filter_form">

      <input type="hidden" name="page_number" id="page_number" value="1">
      <input type="hidden" name="total_rows" id="total_rows"  value="<?=$total_rows?>">

      <input type="hidden" name="current_page" id="current_page" value="1">
      <input type="hidden" name="offset" id="offset" value="0">

      <div class="row">

        <div class="form-group filter_form1">
          <label for="phone_box"> رقم الاعلان </label>
          <input type="text" name="easte_num" class="form-control" id="easte_num"  value="" onchange="load_table_filter()">
        </div>

        <div class="form-group filter_form1">
          <label for="">نوع العملية</label>
          <select class="form-control" name="request_type" id="request_type" onchange="load_table_filter()">
            <option value="0">الكل</option>
            <option value="1" class='row1'>عرض</option>
            <option value="2" class='row2'>طلب</option>
            <option value="3" class='row3'>ايجار</option>
          </select>
        </div>

        <div class="form-group filter_form1">
          <label for="">فئة العقار</label>
          <select class="form-control" name="category" id="category" onchange="load_table_filter()">
            <option value="0">الكل</option>
            <option value="سكني">سكني</option>
            <option value="تجاري">تجاري</option>
          </select>
        </div>

        <div class="form-group filter_form1">
          <label for="">نوع العقار</label>
          <select class="form-control" name="real_type" id="real_type" onchange="load_table_filter()">
            <option value="0">الكل</option>

            <?php
                foreach ($easte_type as $row) {
                  echo "<option value='$row->id'>$row->name</option>";
                }
            ?>
          </select>
        </div>

        <div class="form-group filter_form1">
          <label for="">فئة الادوار</label>
          <select class="form-control" name="floor_cat" id="floor_cat" onchange="load_table_filter()">
            <option value="0">الكل</option>
            <option value="دورين">دورين</option>
            <option value="4 أدوار">4 أدوار</option>
          </select>
        </div>

        <div class="form-group filter_form1">
          <label for="">فئة الشقق</label>
          <select class="form-control" name="apartment_cat" id="apartment_cat" onchange="load_table_filter()">
            <option value="0">الكل</option>
            <option value="شقة واحدة">شقة واحدة</option>
            <option value="شقتين">شقتين</option>
            <option value="شقتين أو ثلاثة">شقتين أو ثلاثة</option>
            <option value="4 - 7 شقق">4 - 7 شقق</option>
            <option value="8 شقق وما فوق">8 شقق وما فوق</option>
          </select>
        </div>

        <div class="form-group filter_form1">
          <label for="">الحى</label>
          <select class="form-control" name="neighborhood" id="neighborhood" onchange="load_table_filter()">
              <option value="0">الكل</option>
            <?php
              foreach ($neighborhood as $row) {
                  echo "<option value='$row->id'>$row->name</option>";
              }
            ?>
          </select>
        </div>

        <div class="form-group filter_form2">
          <label for="">استثمارى (بدخل)</label>
          <select class="form-control" name="income" id="income" onchange="load_table_filter()">
            <option value="0">الكل</option>
            <option value="نعم">نعم</option>
            <option value="لا">لا</option>
          </select>
        </div>

        <div class="form-group filter_form1">
          <label for="">نوع العميل</label>
          <select class="form-control" name="customer_type" id="customer_type" onchange="load_table_filter()" >
            <option value="0">الكل</option>
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

        <div class="form-group filter_form2">
            <label for="search_box">بحث</label>
            <input type="text" name="search_box" class="form-control" id="search_box" placeholder="بحث" value="" onchange="load_table_filter()">
        </div>

        <!-- <div class="form-group filter_form2 d-md-none d-sm-none">
            <label for="phone_box"> رقم الهاتف </label>
            <input type="text" name="phone_box" class="form-control" id="phone_box"  value="" onchange="load_table_filter()">
        </div> -->

      </div>


    </form>

  </div>

</div>


    <div class="row">
      <div class="col-md-1 col-sm-2">
          <select class="form-control" id="per_page" name="">
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="500">500</option>
          </select>
      </div>

      <div class="col-md-9 col-sm-4">
        <div class="pagination_list"></div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table id="data_table">
           <thead>
             <tr>
               <th class='small_cell'><input type='checkbox' name='selected' value="hello" id="check_all" onclick="checkAll()"/></th>
               <th class='medume_cell'><span> نوع العملية</span></th>
               <th class='medume_cell'><span>نوع العقار</span></th>
               <th class='medume_cell'><span>فئة العقار</span></th>
               <th class='small_cell'><span>الحرم</span></th>
               <th class='small_cell'><span>المساحة</span></th>
               <th class='small_cell'><span>العمر</span></th>
               <th class='small_cell'><span>فئة الادوار</span></th>
               <th class='small_cell'><span>عدد الادوار</span></th>
               <th class='medume_cell'><span>فئة الشقق</span></th>
               <th class='small_cell'><span>عدد الشقق</span></th>
               <th class='medume_cell'><span>الحي</span></th>
               <th class='medume_cell'><span>المخطط</span></th>
               <th class='small_cell'><span>الدخل</span></th>
               <th class='small_cell'><span>السعر</span></th>
               <th class='small_cell'><span>النسبه بالمائه</span></th>
               <th class='larg_cell'>ملاحظات</th>
             </tr>
           </thead>
           <tbody id="table_body">

           </tbody>
         </table>
       </doiv>
      </div>
    </div>
   </div>

  <div class="row">
    <div class="col-md-9 col-sm-4">
      <div class="pagination_list"></div>
    </div>
  </div>
<!-- </div> -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK7YcBTL2ba1AS6bYqGtdOdCQMzJHXCyo&callback=initMap" async defer></script>

<!-- this for table sorting -->
<script type="text/javascript">

    function showGetResult( name ) {
       var result     = null;
       var scriptUrl  = "<?=base_url()?>index.php/home/get_real_easte_type/" + name;
       $.ajax({
          url: scriptUrl,
          type: 'get',
          dataType: 'html',
          async: false,
          success: function(data) {
              result = data;
          }
       });
       return result;
    }

    function truncate( n, useWordBoundary ){
        if (this.length <= n) { return this; }
        var subString = this.substr(0, n-1);
        return (useWordBoundary
           ? subString.substr(0, subString.lastIndexOf(' '))
           : subString) + "&hellip;";
    };

    $(document).ready(function(){

        //$('[data-toggle="tooltip"]').tooltip();

        var current_page      = parseInt( $("#current_page").val() );
        var total_rows        = $("#total_rows").val();
        var per_page          = $("#per_page").val();

        if(per_page == 0)
          per_page = 20;
        var offset            = ( current_page - 1) * per_page;

        var real_easte_data   = "<?=base_url()?>index.php/users/all_real_easte_json/" + offset + "/" + per_page;
        var real_easte_typee ;
        var x = 0;

        $("#offset").val(offset);

        $.getJSON(real_easte_data , function(data){

            var real_data = '';


            $.each(data,function(key , value){

              var row_class = "row1";
              if(value.request_type == 1)
                row_class = "row1";
              else if(value.request_type == 2)
                row_class ="row2";
              else if(value.request_type == 3)
                row_class ="row3";


              var request_type = "عرض";
              if(value.request_type == 1)
                request_type = "عرض";
              else if(value.request_type == 2)
                request_type = "طلب";
              else if(value.request_type == 3)
                request_type = "إيجار";

              var customer_type = "";

              if(value.customer_type == 1)
                  customer_type = "زبون مباشر";
              else if(value.customer_type == 2)
                  customer_type = "مالك مباشر";
              else if(value.customer_type == 3)
                  customer_type = "وكيل";
              else if(value.customer_type == 4)
                  customer_type = "وسيط";
              else if(value.customer_type == 5)
                  customer_type = "وسيط أول";
              else if(value.customer_type == 6)
                  customer_type = "وسيط ثاني";
              else if(value.customer_type == 7)
                  customer_type = "وسيط ثالث";
              else if(value.customer_type == 8)
                  customer_type = "وسيط رابع";
              else if(value.customer_type == 9)
                  customer_type = "وسيط خامس";


              var note = value.note;
              note = truncate.apply(note, [100, true]);
              //console.log(showGetResult(value.type))

              real_data += '<tr class='+row_class+'>';
              real_data += '<td class="select_checkbox"><input type="checkbox" onchange="selectRow(this)" name="selected" value="'+ value.id  +'"/></td>';
              real_data += '<td>'+ request_type +'</td>';
              real_data += '<td>'+ value.type_name  + '</td>';
              real_data += '<td>'+ value.category + '</td>';
              real_data += '<td>'+ value.yard + '</td>';
              real_data += '<td>'+ value.space + '</td>';
              real_data += '<td>'+ value.age +'</td>';
              real_data += '<td>'+ value.floor_cat +'</td>';
              real_data += '<td>'+ value.number_of_floor +'</td>';
              real_data += '<td>'+ value.apartment_cat +'</td>';
              real_data += '<td>'+ value.apartment_number_store +'</td>';
              real_data += '<td>'+ value.neighborhood_name +'</td>';
              real_data += '<td>'+ value.planned +'</td>';
              real_data += '<td>'+ value.income +'</td>';
              real_data += '<td>'+ value.price +'</td>';
              real_data += '<td>'+ value.percent +'</td>';
              real_data += '<td>'+ note +'</td>';

            });

            $("#table_body").empty();
            $("#table_body").append(real_data);



            // this section for pagination
            var pagination_links  = "";
            var total_pages       = total_rows / per_page;
            total_pages           = Math.ceil(total_pages);

            pagination_links = "<div class='pagging text-center'>";
            pagination_links += "<nav>";
            pagination_links += "<ul class='pagination pagination-smd'>";



            if(current_page != 1){

                pagination_links += "<li class='page-item'>";
                pagination_links += "<a class='page-link' href='javascript:load_table( 1 )'  >الاولى</a>";
                pagination_links += "</li>";

                pagination_links += "<li class='page-item'>";
                pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page - 1) + " )'>  << </a>";
                pagination_links += "</li>";
            }


            for( var x = current_page ; x <= (current_page + 5)  && x <= total_pages ; x++ ){
              if(x == current_page) {
                  pagination_links += "<li class='page-item active'>";
                  pagination_links += "<a class='page-link' href='javascript:load_table(" + x + ")'  >" + x + "<span class='sr-only'>(current)</span></a>";
                  pagination_links += "</li>";
              } else {
                  pagination_links += "<li class='page-item'>";
                  pagination_links += "<a class='page-link' href='javascript:load_table(" + x +")'  >" + x + "</a>";
                  pagination_links += "</li>";
              }
            }

            if(current_page < total_pages){
                pagination_links += "<li class='page-item'>";
                pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page + 1) + " )'>  >> </a>";
                pagination_links += "</li>";

                pagination_links += "<li class='page-item'>";
                pagination_links += "<a class='page-link' href='javascript:load_table( "+ total_pages +")'  >الأخيرة</a>";
                pagination_links += "</li>";
            }



            pagination_links += "</ul>";
            pagination_links += "</nav>";
            pagination_links += "</div>";

            $(".pagination_list").append(pagination_links);

            $('#data_table').tablesorter( { headers: { 0: { sorter: false} } } );

        });

        $("#hide_map").click(function(){

            $("#map").toggle();

            var hide = 'إخفاء';
            var show = 'إظهار';

            if( $("#hide_map").html() == hide ){
                $("#hide_map").html(show);
            } else {
                $("#hide_map").html(hide);
            }

        });


    });

</script>

<!-- load table from link -->
<script type="text/javascript">

    function load_table(current_page) {

      var current_page      = parseInt( current_page );
      var per_page          = $("#per_page").val();

      if(per_page == 0)
        per_page = 20;
      var offset            = ( current_page - 1) * per_page;

      $("#current_page").val(current_page);

      var filters = "";
      //console.log(filters.length)
      var request_type  = document.getElementById("request_type")
      var category      = document.getElementById("category")
      var type          = document.getElementById("real_type")
      var floor_cat     = document.getElementById("floor_cat")
      var apartment_cat = document.getElementById("apartment_cat")
      var neighborhood  = document.getElementById("neighborhood")
      var income        = document.getElementById("income")
      var customer_type = document.getElementById("customer_type")
      var search_box    = document.getElementById("search_box");
      //var phone_box     = document.getElementById("phone_box");


      if(request_type.value != 0) {

          if(filters.length == 0) {
              filters += "WHERE real_easte.request_type='"+request_type.value+"'";
          }else{
              filters += "AND real_easte.request_type='"+request_type.value+"'";
          }
      }

      if(category.value != 0) {
          if(filters.length == 0) {
              filters += "WHERE real_easte.category='"+category.value+"'";
          }else{
              filters += "AND real_easte.category='"+category.value+"'";
          }
      }

      if(type.value != 0) {
          if(filters.length == 0) {
              filters += "WHERE real_easte.type="+type.value+" ";
          }else{
              filters += "AND real_easte.type="+type.value+" ";
          }
      }

      if(floor_cat.value != 0) {
          if(filters.length == 0) {
              filters += "WHERE real_easte.floor_cat='"+floor_cat.value+"'";
          }else{
              filters += "AND real_easte.floor_cat='"+floor_cat.value+"'";
          }
      }

      if(apartment_cat.value != 0) {
          if(filters.length == 0) {
              filters += "WHERE real_easte.apartment_cat='"+apartment_cat.value+"'";
          }else{
              filters += "AND real_easte.apartment_cat='"+apartment_cat.value+"'";
          }
      }

      if(neighborhood.value != 0) {
          if(filters.length == 0) {
              filters += "WHERE real_easte.neighborhood="+neighborhood.value+" ";
          }else{
              filters += "AND real_easte.neighborhood="+neighborhood.value+" ";
          }
      }

      if(income.value != 0) {
          if(income.value == "نعم"){
              if(filters.length == 0) {
                  filters += "WHERE real_easte.income > 0";
              }else{
                  filters += "AND real_easte.income > 0 ";
              }
          } else {
              if(filters.length == 0) {
                  filters += "WHERE real_easte.income = 0";
              }else{
                  filters += "AND real_easte.income = 0 ";
              }
          }
      }

      if(customer_type.value != 0) {
          if(filters.length == 0) {
              filters += "WHERE real_easte.customer_type="+customer_type.value+" ";
          }else{
              filters += "AND real_easte.customer_type="+customer_type.value+" ";
          }
      }

      if(search_box.value.length > 3){
          if(filters.length == 0) {
              filters += "WHERE real_easte.note LIKE '%"+search_box.value+"%' ";
          }else{
              filters += "AND real_easte.note LIKE '%"+search_box.value+"%' ";
          }
      }

      // if(phone_box.value.length > 7){
      //     if(filters.length == 0) {
      //         filters += "WHERE real_easte.customer_phone LIKE '"+phone_box.value+"'";
      //     }else{
      //         filters += "AND real_easte.customer_phone LIKE '"+phone_box.value+"'";
      //     }
      // }

      console.log(filters);

      var result     = null;
      var scriptUrl  = "<?=base_url()?>index.php/users/get_real_easte_data_with_filter_rows/?q=" + filters;

      $.ajax({
         url: scriptUrl,
         type: 'get',
         dataType: 'html',
         async: false,
         success: function(data) {
             result = data;
         }
      });

      var total_rows  =  result;

      var real_easte_data = "<?=base_url()?>index.php/users/all_real_easte_json_with_filter/"+offset+"/"+per_page+"/?q="+filters;
      var real_easte_typee ;
      var x = 0;

      $.ajaxSetup({
          async: true
      });

      $.getJSON(real_easte_data , function(data){
          var real_data = '';
          $.each(data,function(key , value){

            var row_class = "row1";
            if(value.request_type == 1)
              row_class = "row1";
            else if(value.request_type == 2)
              row_class ="row2";
            else if(value.request_type == 3)
              row_class ="row3";

            var request_type = "عرض";
            if(value.request_type == 1)
              request_type = "عرض";
            else if(value.request_type == 2)
              request_type = "طلب";
            else if(value.request_type == 3)
              request_type = "إيجار";


            var customer_type = "";

            if(value.customer_type == 1)
                customer_type = "زبون مباشر";
            else if(value.customer_type == 2)
                customer_type = "مالك مباشر";
            else if(value.customer_type == 3)
                customer_type = "وكيل";
            else if(value.customer_type == 4)
                customer_type = "وسيط";
            else if(value.customer_type == 5)
                customer_type = "وسيط أول";
            else if(value.customer_type == 6)
                customer_type = "وسيط ثاني";
            else if(value.customer_type == 7)
                customer_type = "وسيط ثالث";
            else if(value.customer_type == 8)
                customer_type = "وسيط رابع";
            else if(value.customer_type == 9)
                customer_type = "وسيط خامس";


            var note = value.note;
            note = truncate.apply(note, [100, true]);

            real_data += '<tr class='+row_class+'>';
            real_data += '<td class="select_checkbox"><input type="checkbox" onchange="selectRow(this)" value="'+ value.id  +'" name="selected"/></td>';
            real_data += '<td>'+ request_type +'</td>';
            real_data += '<td>'+ value.type_name  + '</td>';
            real_data += '<td>'+ value.category + '</td>';
            real_data += '<td>'+ value.yard + '</td>';
            real_data += '<td>'+ value.space + '</td>';
            real_data += '<td>'+ value.age +'</td>';
            real_data += '<td>'+ value.floor_cat +'</td>';
            real_data += '<td>'+ value.number_of_floor +'</td>';
            real_data += '<td>'+ value.apartment_cat +'</td>';
            real_data += '<td>'+ value.apartment_number_store +'</td>';
            real_data += '<td>'+ value.neighborhood_name +'</td>';
            real_data += '<td>'+ value.planned +'</td>';
            real_data += '<td>'+ value.income +'</td>';
            real_data += '<td>'+ value.price +'</td>';
            real_data += '<td>'+ value.percent +'</td>';
            real_data += '<td>'+ note +'</td>';

          });

          $("#table_body").empty();
          $("#table_body").append(real_data);

          // this section for pagination
          var pagination_links  = "";
          var total_pages       = total_rows / per_page;
          total_pages           = Math.ceil(total_pages);

          pagination_links = "<div class='pagging text-center'>";
          pagination_links += "<nav>";
          pagination_links += "<ul class='pagination pagination-smd'>";



          if(current_page != 1){

              pagination_links += "<li class='page-item'>";
              pagination_links += "<a class='page-link' href='javascript:load_table( 1 )'  >الاولى</a>";
              pagination_links += "</li>";

              pagination_links += "<li class='page-item'>";
              pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page - 1) + " )'>  << </a>";
              pagination_links += "</li>";
          }

          for( var x = current_page ; x <= (current_page + 5)  && x <= total_pages ; x++ ){
            if(x == current_page) {
                pagination_links += "<li class='page-item active'>";
                pagination_links += "<a class='page-link' href='javascript:load_table(" + x + ")'  >" + x + "<span class='sr-only'>(current)</span></a>";
                pagination_links += "</li>";
            } else {
                pagination_links += "<li class='page-item'>";
                pagination_links += "<a class='page-link' href='javascript:load_table(" + x +")'  >" + x + "</a>";
                pagination_links += "</li>";
            }
          }

          if(current_page < total_pages){

              pagination_links += "<li class='page-item'>";
              pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page + 1) + " )'>  >> </a>";
              pagination_links += "</li>";

              pagination_links += "<li class='page-item'>";
              pagination_links += "<a class='page-link' href='javascript:load_table( "+ total_pages +")'  >الأخيرة</a>";
              pagination_links += "</li>";
          }




          pagination_links += "</ul>";
          pagination_links += "</nav>";
          pagination_links += "</div>";

          $(".pagination_list").html('');
          $(".pagination_list").append(pagination_links);

          //$('#data_table').tablesorter( { headers: { 0: { sorter: false} } } );
          $("#data_table").trigger("update");




      });

    }

</script>

<!-- load table with filters -->
<script type="text/javascript">

  function load_table_filter(){

    var current_page      = parseInt( $("#current_page").val() );
    //var total_rows        = $("#total_rows").val();
    var per_page          = parseInt( $("#per_page").val() );

    if(per_page == 0)
      per_page = 20;
    var offset            = ( current_page - 1) * per_page;


    var filters = "";

    var easte_num     = document.getElementById("easte_num");
    var request_type  = document.getElementById("request_type");
    var category      = document.getElementById("category");
    var type          = document.getElementById("real_type");
    var floor_cat     = document.getElementById("floor_cat");
    var apartment_cat = document.getElementById("apartment_cat");
    var neighborhood  = document.getElementById("neighborhood");
    var income        = document.getElementById("income");
    var customer_type = document.getElementById("customer_type");
    var search_box    = document.getElementById("search_box");
    //var phone_box     = document.getElementById("phone_box");

    console.log(type.value);

    if(easte_num.value.length > 2 ){
      if(filters.length == 0) {
          filters += "WHERE real_easte.id='"+easte_num.value+"'";
      }else{
          filters += "AND real_easte.id='"+easte_num.value+"'";
      }
    }

    if(request_type.value != 0) {

        if(filters.length == 0) {
            filters += "WHERE real_easte.request_type='"+request_type.value+"'";
        }else{
            filters += "AND real_easte.request_type='"+request_type.value+"'";
        }
    }

    if(category.value != 0) {
        if(filters.length == 0) {
            filters += "WHERE real_easte.category='"+category.value+"'";
        }else{
            filters += "AND real_easte.category='"+category.value+"'";
        }
    }


    if(type.value != 0) {
        if(filters.length == 0) {
            filters += "WHERE real_easte.type="+type.value+" ";
        }else{
            filters += "AND real_easte.type="+type.value+" ";
        }
    }

    if(floor_cat.value != 0) {
        if(filters.length == 0) {
            filters += "WHERE real_easte.floor_cat='"+floor_cat.value+"'";
        }else{
            filters += "AND real_easte.floor_cat='"+floor_cat.value+"'";
        }
    }

    if(apartment_cat.value != 0) {
        if(filters.length == 0) {
            filters += "WHERE real_easte.apartment_cat='"+apartment_cat.value+"'";
        }else{
            filters += "AND real_easte.apartment_cat='"+apartment_cat.value+"'";
        }
    }

    if(neighborhood.value != 0) {
        if(filters.length == 0) {
            filters += "WHERE real_easte.neighborhood="+neighborhood.value+" ";
        }else{
            filters += "AND real_easte.neighborhood="+neighborhood.value+" ";
        }
    }

    if(income.value != 0) {
        if(income.value == "نعم"){
            if(filters.length == 0) {
                filters += "WHERE real_easte.income > 0";
            }else{
                filters += "AND real_easte.income > 0 ";
            }
        } else {
            if(filters.length == 0) {
                filters += "WHERE real_easte.income = 0";
            }else{
                filters += "AND real_easte.income = 0 ";
            }
        }
    }

    if(customer_type.value != 0) {
        if(filters.length == 0) {
            filters += "WHERE real_easte.customer_type="+customer_type.value+" ";
        }else{
            filters += "AND real_easte.customer_type="+customer_type.value+" ";
        }
    }

    if(search_box.value.length > 3){
        if(filters.length == 0) {
            filters += "WHERE real_easte.note LIKE '%"+search_box.value+"%' ";
        }else{
            filters += "OR real_easte.note LIKE '%"+search_box.value+"%' OR real_easte.planned LIKE '%"+search_box.value+"%' OR real_easte.category LIKE '%"+search_box.value+"%' OR real_easte.yard LIKE '%"+search_box.value+"%' ";
        }
    }

    // if(phone_box.value.length > 7){
    //     if(filters.length == 0) {
    //         filters += "WHERE real_easte.customer_phone LIKE '"+phone_box.value+"'";
    //     }else{
    //         filters += "AND real_easte.customer_phone LIKE '" + phone_box.value + "'";
    //     }
    // }

    console.log(filters);

    var result     = null;
    var scriptUrl  = "<?=base_url()?>index.php/users/get_real_easte_data_with_filter_rows/?q=" + filters;

    $.ajax({
       url: scriptUrl,
       type: 'get',
       dataType: 'html',
       async: false,
       success: function(data) {
           result = data;
       }
    });

    var total_rows  =  result;

    var real_easte_data = "<?=base_url()?>index.php/users/all_real_easte_json_with_filter/"+offset+"/"+ per_page +"/?q="+filters;
    var real_easte_typee ;
    var x = 0;

    $.ajaxSetup({
        async: true
    });

    $.getJSON(real_easte_data , function(data){
        var real_data = '';
        $.each(data,function(key , value){

          var row_class = "row1";
          if(value.request_type == 1)
            row_class = "row1";
          else if(value.request_type == 2)
            row_class ="row2";
          else if(value.request_type == 3)
            row_class ="row3";

          var request_type = "عرض";
          if(value.request_type == 1)
            request_type = "عرض";
          else if(value.request_type == 2)
            request_type = "طلب";
          else if(value.request_type == 3)
            request_type = "إيجار";

          var customer_type = "";

          if(value.customer_type == 1)
              customer_type = "زبون مباشر";
          else if(value.customer_type == 2)
              customer_type = "مالك مباشر";
          else if(value.customer_type == 3)
              customer_type = "وكيل";
          else if(value.customer_type == 4)
              customer_type = "وسيط";
          else if(value.customer_type == 5)
              customer_type = "وسيط أول";
          else if(value.customer_type == 6)
              customer_type = "وسيط ثاني";
          else if(value.customer_type == 7)
              customer_type = "وسيط ثالث";
          else if(value.customer_type == 8)
              customer_type = "وسيط رابع";
          else if(value.customer_type == 9)
              customer_type = "وسيط خامس";


          var note = value.note;
          note = truncate.apply(note, [100, true]);
          //console.log(showGetResult(value.type))

          real_data += '<tr class='+row_class+'>';
          real_data += '<td class="select_checkbox"><input type="checkbox" onchange="selectRow(this)" value="'+ value.id  +'" name="selected"/></td>';
          real_data += '<td>'+ request_type +'</td>';
          real_data += '<td>'+ value.type_name  + '</td>';
          real_data += '<td>'+ value.category + '</td>';
          real_data += '<td>'+ value.yard + '</td>';
          real_data += '<td>'+ value.space + '</td>';
          real_data += '<td>'+ value.age +'</td>';
          real_data += '<td>'+ value.floor_cat +'</td>';
          real_data += '<td>'+ value.number_of_floor +'</td>';
          real_data += '<td>'+ value.apartment_cat +'</td>';
          real_data += '<td>'+ value.apartment_number_store +'</td>';
          real_data += '<td>'+ value.neighborhood_name +'</td>';
          real_data += '<td>'+ value.planned +'</td>';
          real_data += '<td>'+ value.income +'</td>';
          real_data += '<td>'+ value.price +'</td>';
          real_data += '<td>'+ value.percent +'</td>';
          real_data += '<td>'+ note +'</td>';

        }); // end of foreache


        $("#table_body").empty();
        $("#table_body").append(real_data);

        $("#data_table").trigger("update");
        //$('#data_table').tablesorter( { headers: { 0: { sorter: false} } } );

        // this section for pagination
        var pagination_links  = "";
        var total_pages       = total_rows / per_page;
        total_pages           = Math.ceil(total_pages);

        pagination_links = "<div class='pagging text-center'>";
        pagination_links += "<nav>";
        pagination_links += "<ul class='pagination pagination-smd'>";

        pagination_links += "<li class='page-item'>";
        pagination_links += "<a class='page-link' href='javascript:load_table( 1 )'  >الاولى</a>";
        pagination_links += "</li>";

        if(current_page != 1){
            pagination_links += "<li class='page-item'>";
            pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page - 1) + " )'>  << </a>";
            pagination_links += "</li>";
        }

        for( var x = current_page ; x <= (current_page + 5)  && x <= total_pages ; x++ ){
          if(x == current_page) {
              pagination_links += "<li class='page-item active'>";
              pagination_links += "<a class='page-link' href='javascript:load_table(" + x + ")'  >" + x + "<span class='sr-only'>(current)</span></a>";
              pagination_links += "</li>";
          } else {
              pagination_links += "<li class='page-item'>";
              pagination_links += "<a class='page-link' href='javascript:load_table(" + x +")'  >" + x + "</a>";
              pagination_links += "</li>";
          }
        }

        if(current_page < total_pages){
            pagination_links += "<li class='page-item'>";
            pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page + 1) + " )'>  >> </a>";
            pagination_links += "</li>";
        }


        pagination_links += "<li class='page-item'>";
        pagination_links += "<a class='page-link' href='javascript:load_table( "+ total_pages +")'  >الأخيرة</a>";
        pagination_links += "</li>";

        pagination_links += "</ul>";
        pagination_links += "</nav>";
        pagination_links += "</div>";

        $(".pagination_list").html('');
        $(".pagination_list").append(pagination_links);



    });

  }

</script>

<!-- check all button and filter-->
<script type="text/javascript">

  // check all rows
  function checkAll(){
      var input, table, tr, td, i;

      input = $("#check_all");
      if(input.prop("checked")){
          $("#data_table > tbody > tr").each(function(){
              td = $('.select_checkbox');
              td.find('input[type="checkbox"]').prop("checked", true);
              $(this).addClass('selected');
          });
      }else{
          $("#data_table > tbody > tr").each(function(){
              td = $('.select_checkbox');
              td.find('input[type="checkbox"]').prop("checked", false);
              $(this).removeClass('selected');
          });
      }

  }

  // select one row
  function selectRow(e){
      if(e.checked == true){
          var row = e.parentElement.parentElement;
          row.classList.add('selected');
      } else {
          var row = e.parentElement.parentElement;
          row.classList.remove('selected');
      }
  }

  // filter script
  function filterTable(){

    var input, filter, table, tr, td, i;
    input = document.getElementById("request_type");
    filter = input.value.toUpperCase();
    table = document.getElementById("data_table");
    tr = table.getElementsByTagName("tr");

    if(filter != 0){

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }

    } else {
        for (i = 0; i < tr.length; i++) {
          tr[i].style.display = "";
        }
    }

  }

  // get selected rows
  function getSelectedRows(){

      var rows = $('.selected');
      var real_data = "";
      real_data += "بورصة الوساطة التعاونية الذكية\n\n";

      rows.each(function(){

        var columns   = $(this).find('td > input');
        var id        = $(this).children().children()[0].value
        var api       = "<?=base_url()?>index.php/home/get_real_easte_data_as_json/" + id;

        $.ajaxSetup({
            async: false
        });
        $.getJSON( api , function(data){
            $.each( data , function( key, val ){
                  var request_type = "عرض";
                  if(val.request_type == 1)
                    request_type = "عرض";
                  else if(val.request_type == 2)
                    request_type = "طلب";
                  else if(val.request_type == 3)
                    request_type = "إيجار";

                  real_data +=  "رقم الاعلان :- " + val.id;
                  real_data +=  "\nنوع العقار: " + val.type_name ;
                  real_data +=  "\n فئة العقار : " + val.category;
                  real_data +=  "\nالحي :- " + val.neighborhood_name;
                  if(val.income > 0)
                    real_data +=  "\nالدخل :- " + val.income;
                  real_data +=  "\nالمساحة : " + val.space;
                  real_data +=  "\nتفاصيل أكثر : " + val.note + "\n";
                  real_data +=  "==========================================\n";

            });

        });
      });// end of rows

      var $temp = $("<textarea>");
      $("body").append($temp);
      $temp.val(real_data).select();
      document.execCommand("copy");
      $temp.remove();
      alert("تم النسخ");
      var tooltip = document.getElementById("myTooltipp");
      tooltip.innerHTML = "تم النسخ ";

  }

  // get selected rows with maps
  function getSelectedRowsWithMap(){

      var rows = $('.selected');
      var real_data = "";
      real_data += "بورصة الوساطة التعاونية الذكية\n\n";

      rows.each(function(){

        var columns   = $(this).find('td > input');
        var id        = $(this).children().children()[0].value
        var api       = "<?=base_url()?>index.php/home/get_real_easte_data_as_json/" + id;
        var url       = "https://www.google.com/maps/search/?api=1&query=";

        $.ajaxSetup({
            async: false
        });
        $.getJSON( api , function(data){
            $.each( data , function( key, val ){
                  var request_type = "عرض";
                  if(val.request_type == 1)
                    request_type = "عرض";
                  else if(val.request_type == 2)
                    request_type = "طلب";
                  else if(val.request_type == 3)
                    request_type = "إيجار";

                  real_data +=  "رقم الاعلان :- " + val.id;
                  real_data +=  "\nنوع العقار: " + val.type_name ;
                  real_data +=  "\n فئة العقار : " + val.category;
                  real_data +=  "\nالحي :- " + val.neighborhood_name;
                  if(val.income > 0)
                    real_data +=  "\nالدخل :- " + val.income;
                  real_data +=  "\nالمساحة : " + val.space;
                  real_data +=  "\nتفاصيل أكثر : " + val.note + "\n";

                  if(val.y == 0 || val.x == 0)
                    real_data +=  "==========================================\n";
                  else{
                    real_data +=  "الموقع على الخريطة : " + url + val.y + "," + val.x + "\n";
                    real_data +=  "==========================================\n";
                  }


            });

        });
      });// end of rows

      $.ajaxSetup({
          async: true
      });

      var $temp = $("<textarea>");
      $("body").append($temp);
      $temp.val(real_data).select();
      document.execCommand("copy");
      $temp.remove();
      alert("تم النسخ");
      var tooltip = document.getElementById("myTooltipp");
      tooltip.innerHTML = "تم النسخ ";

  }

  // send copied text via whatsapp
  function sendSelectedTextViaWhatsapp(){

      var rows = $('.selected');
      var real_data = "";
      real_data += "بورصة الوساطة التعاونية الذكية\n\n";

      rows.each(function(){

        var columns   = $(this).find('td > input');
        var id        = $(this).children().children()[0].value
        var api       = "<?=base_url()?>index.php/home/get_real_easte_data_as_json/" + id;

        $.ajaxSetup({
            async: false
        });
        $.getJSON( api , function(data){
            $.each( data , function( key, val ){
                  var request_type = "عرض";
                  if(val.request_type == 1)
                    request_type = "عرض";
                  else if(val.request_type == 2)
                    request_type = "طلب";
                  else if(val.request_type == 3)
                    request_type = "إيجار";

                  $("#easte_type").val(val.type);
                  $("#easte_id").val(val.id);

                  real_data +=  "رقم الاعلان :- " + val.id;
                  real_data +=  "\nنوع العقار: " + val.type_name ;
                  real_data +=  "\n فئة العقار : " + val.category;
                  real_data +=  "\nالحي :- " + val.neighborhood_name;
                  if(val.income > 0)
                    real_data +=  "\nالدخل :- " + val.income;
                  real_data +=  "\nالمساحة : " + val.space;
                  real_data +=  "\nتفاصيل أكثر : " + val.note + "\n";
                  real_data +=  "==========================================\n";

            });

        });
      });// end of rows

      var $temp = $("<textarea>");
      $("body").append($temp);
      $temp.val(real_data).select();
      document.execCommand("copy");
      $temp.remove();
      //alert("تم النسخ");


      $("#whatsmsg").val(real_data);
      $("#location").prop('disabled', true);

      document.getElementById('id01').style.display='block';

  }

  // send copied text via whatsapp with map url
  function sendSelectedTextViaWhatsapp(){

      var rows = $('.selected');
      var real_data = "";
      real_data += "بورصة الوساطة التعاونية الذكية\n\n";

      rows.each(function(){

        var columns   = $(this).find('td > input');
        var id        = $(this).children().children()[0].value
        var api       = "<?=base_url()?>index.php/home/get_real_easte_data_as_json/" + id;
        var url       = "https://www.google.com/maps/search/?api=1&query=";

        $.ajaxSetup({
            async: false
        });

        $.getJSON( api , function(data){
            $.each( data , function( key, val ){
                  var request_type = "عرض";
                  if(val.request_type == 1)
                    request_type = "عرض";
                  else if(val.request_type == 2)
                    request_type = "طلب";
                  else if(val.request_type == 3)
                    request_type = "إيجار";

                  $("#easte_type").val(val.type);
                  $("#easte_id").val(val.id);

                  real_data +=  "رقم الاعلان :- " + val.id;
                  real_data +=  "\nنوع العقار: " + val.type_name ;
                  real_data +=  "\n فئة العقار : " + val.category;
                  real_data +=  "\nالحي :- " + val.neighborhood_name;
                  if(val.income > 0)
                    real_data +=  "\nالدخل :- " + val.income;
                  real_data +=  "\nالمساحة : " + val.space;
                  real_data +=  "\nتفاصيل أكثر : " + val.note + "\n";

                  if(val.x == 0 || val.y == 0)
                      real_data +=  "==========================================\n";
                  else{
                      real_data +=  "الموقع على الخريطة : " + url + val.y + "," + val.x + "\n";
                      real_data +=  "==========================================\n";
                  }


            });

        });
      });// end of rows

      var $temp = $("<textarea>");
      $("body").append($temp);
      $temp.val(real_data).select();
      document.execCommand("copy");
      $temp.remove();
      //alert("تم النسخ");


      $("#whatsmsg").val(real_data);
      $("#location").prop('disabled', true);

      document.getElementById('id01').style.display='block';

  }


  function outFunc() {
    var tooltip = document.getElementById("myTooltipp");
    tooltip.innerHTML = "نسخ الى الحافظة";
  }

</script>

 <!-- this for maps -->
<script type="text/javascript">

  function initMap() {
      var map;
      var bounds = new google.maps.LatLngBounds();
      var myStyles =[
          {
              featureType: "poi",
              elementType: "labels",
              stylers: [
                    { visibility: "off" }
              ]
          }
      ];
      var mapOptions = {
          mapTypeId: 'roadmap' //'satellite'
      };

      // Display a map on the web page
      map = new google.maps.Map(document.getElementById("map"), mapOptions , myStyles);
      map.setTilt(50);

      // Add multiple markers to map
      var infoWindow  = new google.maps.InfoWindow(), marker, i;
      var api         = "<?=base_url()?>index.php/home/mapJson";

      var count = 0;

      $.getJSON( api , function( data ) {
          $.each( data, function( key, val ) {

              if(val.y == 0 && val.x == 0)
                return;

              count++;
              var request_type = "عرض";

              if(val.request_type == 1)
                request_type = "عرض";
              else if(val.request_type == 2)
                request_type = "طلب";
              else if(val.request_type == 3)
                request_type = "إيجار";

              var infoWindowContent;
              var test = '';
              var img_base = "<?=base_url()?>img/";

              $.get( "<?=base_url()?>index.php/home/get_real_easte_type/" + val.type , function( data ) {
                  var real_easte_typee = data;
                  test = "hello";

                  infoWindowContent =
                  '<div id="iw-container" style="width: 250px;">' +
                    '<div class="iw-title">#' + val.id + '# ' + request_type + ' ' + real_easte_typee + '</div>' +
                    '<div class="iw-content">'+
                      '<span class="span_line">نوع العقار : ' + real_easte_typee + '</span>' +
                      '<span class="span_line">فئة العقار : '+  val.category +'</span>'+
                      '<span class="span_line">المساحة : ' + val.space + '</span>'+
                      '<div id="more_info" style="display:none;">'+
                        '<span class="span_line">المخطط : ' + val.planned + '</span>' +
                        '<strong>السعر: <span style="color:red;">' + val.price + '</span></strong>' +
                        '</hr>'+
                        '<p> ملاحظات : '+ val.note +'</p>'+
                      '</div>'+
                      '<a href="#" id="more" onClick="divFunction()" >المزيد...</a>' +
                      '<div class="whatsapp_box">'+
                        '<a href="#" onClick="sendWhatsapp(' + val.id + ' );" ><img src="' + img_base + 'whatsapp-logo.png" ></a>'+
                      '</div>'+
                    '</div>'+
                    '<div class="iw-bottom-gradient"></div>'+
                  '</div>';

              } , 'html' );



              // Add marker to map
              var position = new google.maps.LatLng( val.y , val.x );
              var icon_base = "<?=base_url()?>img/";
              var icon = '';

              if(val.type == 1 ){
                  icon = icon_base + 'land.png';
              }else if(val.type == 2 && val.category == 'تجاري'){
                  icon = icon_base + 'building2.png';
              }else if(val.type == 2 && val.category == 'سكني'){
                  icon = icon_base + 'building.png';
              }else if(val.type == 3){
                  icon = icon_base + 'hotel.png';
              }else if(val.type == 4){
                  icon = icon_base + 'villa_bulding.png';
              }else if(val.type == 6){
                  icon = icon_base + 'home.png';
              }else if(val.type == 7){
                  icon = icon_base + 'resort.png';
              }else if(val.type == 8){
                  icon = icon_base + 'apartment.png';
              }else if(val.type == 9){
                  icon = icon_base + 'apartment2.png';
              }else if(val.type == 10){
                  icon = icon_base + 'apartment3.png';
              }else if(val.type == 11){
                  icon = icon_base + 'exhibition2.png';
              }else if(val.type == 12){
                  icon = icon_base + 'farm.png';
              }else if(val.type == 13){
                  icon = icon_base + 'factory.png';
              }else if(val.type == 14){
                  icon = icon_base + 'station.png';
              }else if(val.type == 15){
                  icon = icon_base + 'land-marker.png';
              }

              else {
                icon = icon_base + 'pin.png';
              }

              bounds.extend(position);
              marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  icon : icon
                  //title: markers[i][0]
              });

              // Add info window to marker
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                      infoWindow.setContent(infoWindowContent);
                      infoWindow.setOptions({maxWidth:750});
                      infoWindow.open(map, marker);
                  }
              })(marker, i));

              // Center the map to fit all markers on the screen
              map.fitBounds(bounds);


              // infoWindow style
              // google.maps.event.addListener( infoWindow , 'domready', function() {
              //    // Reference to the DIV that wraps the bottom of infowindow
              //    var iwOuter = $('.gm-style-iw');
              //
              //    /* Since this div is in a position prior to .gm-div style-iw.
              //     * We use jQuery and create a iwBackground variable,
              //     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
              //    */
              //    var iwBackground = iwOuter.prev();
              //
              //    // Removes background shadow DIV
              //    iwBackground.children(':nth-child(2)').css({'display' : 'none'});
              //
              //    // Removes white background DIV
              //    iwBackground.children(':nth-child(4)').css({'display' : 'none'});
              //
              //    // Moves the infowindow 115px to the right.
              //    iwOuter.parent().parent().css({left: '115px'});
              //
              //    // Moves the shadow of the arrow 76px to the left margin.
              //    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
              //
              //    // Moves the arrow 76px to the left margin.
              //    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
              //
              //    // Changes the desired tail shadow color.
              //    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});
              //
              //    // Reference to the div that groups the close button elements.
              //    var iwCloseBtn = iwOuter.next();
              //
              //    // Apply the desired effect to the close button
              //    iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
              //
              //    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
              //    if($('.iw-content').height() < 140){
              //      $('.iw-bottom-gradient').css({display: 'none'});
              //    }
              //
              //    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
              //    iwCloseBtn.mouseout(function(){
              //      $(this).css({opacity: '1'});
              //    });
              //  });

          });
      });


      // Set zoom level
      var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
          this.setZoom(14);
          google.maps.event.removeListener(boundsListener);
      });

      //console.log(count);

    }

    // Load initialize function
    //google.maps.event.addDomListener(window, 'load', initMap);
    function divFunction(){

         var more_info_box = document.getElementById("more_info");
         var more_info_btn = document.getElementById("more");

         more_info_btn.style.display = "none";
         more_info_box.style.display = "block";
    }

</script>

<!-- send whatsapp -->
<script type="text/javascript">

  function sendWhatsapp( real_id ){

    var location = $("#location");
    var msg_box = $("#whatsmsg");
    var content = "";
    var api = "<?=base_url()?>index.php/home/real_easte_json/"+ real_id;

    location.click(function(){
        if($(this).is(":checked")){
          //var url = "https://www.google.com/maps/@?api=1&map_action=map&center="+location.val()+"&zoom=12";
          var url = "https://www.google.com/maps/search/?api=1&query="+location.val();
          $("#whatsmsg").val($("#whatsmsg").val() + "\n" + url);

        }else{
          $("#whatsmsg").val('')
          $.getJSON( api, function(data){
            $.each( data, function( key, val ){

                var request_type = "عرض";
                if(val.request_type == 1)
                  request_type = "عرض";
                else if(val.request_type == 2)
                  request_type = "طلب";
                else if(val.request_type == 3)
                  request_type = "إيجار";



                $.get( "<?=base_url()?>index.php/home/get_real_easte_type/" + val.type , function( data ) {
                    var real_easte_typee = data;

                    content = "رقم العرض :- "+ val.id + "\n"+
                    "نوع الطلب :- " + request_type + "\n"+
                    "نوع العقار :- " + real_easte_typee + "\n"+
                    "فئة العقار :- "+  val.category + "\n" +
                    " السعر :- " + val.price + "\n" +
                    "ملاحظات :- " + val.note + "\n";

                    $("#whatsmsg").val(content);

                } , 'html' );


            });
          });
        }
    });

    $.getJSON( api, function(data){
      $.each( data, function( key, val ){

          var request_type = "عرض";
          if(val.request_type == 1)
            request_type = "عرض";
          else if(val.request_type == 2)
            request_type = "طلب";
          else if(val.request_type == 3)
            request_type = "إيجار";



          $.get( "<?=base_url()?>index.php/home/get_real_easte_type/" + val.type , function( data ) {
              var real_easte_typee = data;
              $("#easte_type").val(val.type);
              $("#easte_id").val(real_id)

              content = "رقم العرض :- "+ val.id + "\n"+
              "نوع الطلب :- " + request_type + "\n"+
              "نوع العقار :- " + real_easte_typee + "\n"+
              "فئة العقار :- "+  val.category + "\n" +
              " السعر :- " + val.price + "\n" +
              "ملاحظات :- " + val.note + "\n";

              location.val(val.y + "," + val.x);
              $("#whatsmsg").val(content);

          } , 'html' );


      });
    });

    document.getElementById('id01').style.display='block';
  }
</script>

<script type="text/javascript">
  function hide_popup_window(){
    document.getElementById('id01').style.display='none';
  }
</script>
