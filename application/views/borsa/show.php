<blockquote class="twitter-tweet"><p lang="en" dir="ltr">Sunsets don&#39;t get much better than this one over <a href="https://twitter.com/GrandTetonNPS?ref_src=twsrc%5Etfw">@GrandTetonNPS</a>. <a href="https://twitter.com/hashtag/nature?src=hash&amp;ref_src=twsrc%5Etfw">#nature</a> <a href="https://twitter.com/hashtag/sunset?src=hash&amp;ref_src=twsrc%5Etfw">#sunset</a> <a href="http://t.co/YuKy2rcjyU">pic.twitter.com/YuKy2rcjyU</a></p>&mdash; US Department of the Interior (@Interior) <a href="https://twitter.com/Interior/status/463440424141459456?ref_src=twsrc%5Etfw">May 5, 2014</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


<div class="edit_real_easte" id="edit_real_easte">
  <div class="edit_body">
    <div class="edit_head">
      <span class="left_x w3-button " onclick="document.getElementById('edit_real_easte').style.display='none';">&times;</span>
    </div>
    <div class="edit_form">

      <div style="display:none;" id="aqar_box">
        <a href="#" style="color:red;" target="_blank" id="aqar_url">>>>>>>> الرابط في موقع عقار <<<<<<<<</a>
      </div>

      <form id="easte_form" class="" action="<?=base_url();?>home/update_real" method="post">
        <div class="row">
          <div  class="col-md-8">
              <div class="form-row">
                <div class="form-group med_input" id="real_number">
                  <label for="" class="control-label"> رقم </label>
                  <input type="number" class="form-control" name="real_number" value="" readonly>
                </div>
                <div class="form-group med_input required" id="request_type1">
                  <label for="" class="control-label"> نوع العملية </label>
                  <select class="form-control"   name="request_type" required autofocus>
                    <option value="1">عرض</option>
                    <option value="2">طلب</option>
                    <option value="3">إيجار</option>
                  </select>
                </div>
                <div class="form-group med_input required" id="type1">
                  <label for="" class="control-label" > نوع العقار </label>
                  <select class="form-control" name="type"  required>

                    <?php
                        foreach ($easte_type as $row) {
                          echo "<option value='$row->id'>$row->name</option>";
                        }
                    ?>

                  </select>
                </div>
                <div class="form-group med_input required" id="category1">
                  <label for="" class="control-label">فئة العقار</label>
                  <select class="form-control" name="category" >
                    <option value="سكني">سكني</option>
                    <option value="تجاري">تجاري</option>
                  </select>
                </div>
                <div class="form-group med_input required" id="yard1">
                  <label for="" class="control-label">الحرم</label>
                  <select class="form-control" name="yard" >
                    <option value=""></option>
                    <option value="داخلي">داخلي</option>
                    <option value="خارجي">خارجي</option>
                  </select>
                </div>
                <div class="form-group small_input required " id="space1" >
                  <label for="" class="control-label">المساحة</label>
                  <input type="number" class="form-control" name="space" value="">
                </div>
                <div class="form-group small_input" id="age1"  >
                  <label for="" class="control-label">العمر</label>
                  <input type="number" class="form-control" name="age" value="">
                </div>
                <div class="form-group med_input" id="floor_cat1" >
                  <label for="" class="control-label"> فئة الادوار </label>
                  <select class="form-control" name="floor_cat">
                    <option value=""></option>
                    <option value="دورين">دورين</option>
                    <option value="4 أدوار">4 أدوار</option>
                  </select>
                </div>
                <div class="form-group med_input" id="number_of_floor1">
                  <label for="" class="control-label">عدد الادوار</label>
                  <input type="number" class="form-control" name="number_of_floor" value="">
                </div>
                <div class="form-group med_input" id="apartment_cat1">
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
                <div class="form-group med_input" id="apartment_number_store1">
                  <label for="" class="control-label">عدد الشقق </label>
                  <input type="number" class="form-control"  name="apartment_number_store" value="" >
                </div>
                <div class="form-group med_input"  id="estate_numebr1">
                  <label for="" class="control-label">رقم العقار</label>
                  <input type="text" class="form-control" name="estate_numebr" value="">
                </div>
                <div class="form-group larg_input" id="street1">
                  <label for="" class="control-label"  >الشارع الرئيسي</label>
                  <input type="text" class="form-control" name="street" value="">
                </div>
                <div class="form-group med_input required" id="neighborhood1" >
                  <label for="" class="control-label">الحي</label>
                  <select class="form-control" name="neighborhood">
                    <?php
                      foreach ($neighborhood as $row) {
                          echo "<option value='$row->id'>$row->name</option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group med_input" id="planned1">
                  <label for="" class="control-label">المخطط</label>
                  <input type="text" class="form-control" name="planned" value="">
                </div>
                <div class="form-group very_larg_input" id="street_width1" >
                  <label for="" class="control-label">عرض الشارع والوجهات </label>
                  <input type="text" class="form-control" name="street_width" value="">
                </div>
                <div class="form-group med_input" id="elevator1" >
                  <label for="" class="control-label">المصعد</label>
                  <select class="form-control" name="elevator">
                      <option value="لا">لا</option>
                      <option value="نعم">نعم</option>
                  </select>
                </div>
                <div class="form-group med_input" id="income1">
                  <label for="" class="control-label">الدخل</label>
                  <input type="number" class="form-control" name="income" value="">
                </div>
                <div class="form-group med_input required" id="price1">
                  <label for="" class="control-label">السعر</label>
                  <input type="text" class="form-control" name="price" value="">
                </div>
                <div class="form-group med_input" id="percent1">
                  <label for="" class="control-label" >النسبه بالمائه</label>
                  <input type="text" class="form-control" name="percent" value="">
                </div>
                <div class="form-group med_input required"  id="customer_type1">
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
                <div class="form-group med_input" id="customer_name1">
                  <label for="" class="control-label" >اسم العميل</label>
                  <input type="text" class="form-control" name="customer_name"  value="" autocomplete="on">
                </div>
                <div class="form-group larg_input required" id="customer_phone1" >
                  <label for="" class="control-label">تليفون العميل</label>
                  <input type="text" class="form-control" name="customer_phone" value="" required>
                </div>
                <div class="form-group very_larg_input" id="y1" >
                  <label for="" class="control-label" >إحداثيات خط العرض</label>
                  <input type="text" class="form-control" name="y" value="">
                </div>
                <div class="form-group very_larg_input" id="x1" >
                  <label for="" class="control-label" >إحداثيات خط الطول</label>
                  <input type="text" class="form-control" name="x" value="">
                </div>
              </div>

              <!-- <div class="form-row">
              </div>
              <div class="form-row">
              </div>
              <div class="form-row">
              </div> -->

              <div class="form-row">
                <div class="form-group col-md-12 required" id="note">
                  <label for="" class="control-label" >ملاحظات </label>
                  <textarea name="note" class="form-control" rows="3" cols="80" ></textarea>
                </div>
                <div class="form-group col-md-1">
                  <!-- document.getElementById('edit_real_easte').style.display='none'; -->
                  <button type="submit  " id="save_edit_btn" class="btn btn-primary mb-2" name="button" onclick="$('.edit_real_easte').hide();">إضافة</button>
                </div>
                <div class="form-group col-md-1">
                  <button type="button" id="delete_btn" onclick="ConfirmDialog('هل أنت متأكد؟');" class="btn btn-danger mb-2" name="button">حذف</button>
                </div>
              </div>
         </div>
         <div class="col-md-3">
           <div id="edit_map"></div>
           <p style="color:red;">اسحب المؤشر على الموقع الخاص بالعقار</p>
         </div>
       </div>
      </form>
    </div>
  </div>
</div>

<div id="id01" class="w3-modal">
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

          <div class="form-row col-md-12">

            <div class="col-md-6">
              <label for="phone" class="control-label">الرقم</label>
              <input type="tel" class="form-control" name="phone" value="" placeholder="552155471" autocomplete="off" required autofocus>
            </div>

            <div class="col-md-6">
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

          </div>

          <div class="form-row col-md-12">

            <div class="col-md-6">

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

            <div class="col-md-6">
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
 </div>

<div class="row ">
  <div class="container">
    <div class="row">

      <div class="col-md-10">
        <div id="map"></div>
      </div>
      <div id="def">

      </div>
      <div class="col-md-1 def">
        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/land.png" alt="">
            قطعة ارض
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/apartment.png" alt="">
            شقة تمليك
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/apartment2.png" alt="">
            شقة مفروشة
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/apartment3.png" alt="">
            شقة ايجار
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/building.png" alt="">
            عمارة سكنية
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/building2.png" alt="">
            عمارة تجارية
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/land-marker.png" alt="">
            مخطط
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/exhibition.png" alt="">
            معرض
          </p>
        </div>
      </div>

      <div class="col-md-1 def">

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/resort.png" alt="">
            استراحة
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/factory.png" alt="">
            مصنع
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/farm.png" alt="">
            مزرعة
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/home.png" alt="">
            منزل
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/villa.png" alt="">
            فيلا
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/villa_bulding.png" alt="">
            فيلا مع عمارة
          </p>
        </div>

        <div class="map_icon_defention">
          <p>
            <img src="<?=base_url()?>img/station.png" alt="">
            محطة وقود
          </p>
        </div>

      </div>
    </div>

  </div>
</div>

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
            <option value="1">شقة واحدة</option>
            <option value="2">شقتين</option>
            <option value="3">شقتين أو ثلاثة</option>
            <option value="4">4 - 7 شقق</option>
            <option value="5">8 شقق وما فوق</option>
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

        <div class="form-group filter_form2">
            <label for="phone_box"> رقم الهاتف </label>
            <input type="text" name="phone_box" class="form-control" id="phone_box"  value="" onchange="load_table_filter()">
        </div>

      </div>


    </form>

  </div>

</div>

<!-- <div class="row">

</div> -->

<div class="row">
  <div class="col-md-1 col-sm-1">
      <select class="form-control" id="per_page" name="">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="200">200</option>
        <option value="500">500</option>
      </select>
  </div>

  <div class="col-md-3 col-sm-3">
    <div class="pagination_list"></div>
  </div>

  <div class="col-md-1 col-sm-1">
    <button type="button" id="edit_row" onclick="edit_popup(this);" class="btn btn-success" style="display:none;" >تعديل</button>
  </div>

  <!-- <div class="col-md-1 col-sm-1">
    <button type="button" id="edit_row" onclick="edit_popup(this);" class="btn btn-success" style="display:blcok;" >تعديل</button>
  </div> -->

  <div class="first_button_wrap">
    <a href="#" id="hide_map" class="btn btn-warning">إخفاء</a>
  </div>

  <div class="button_wrap">
    <button type="button" title="نسخ" id="copy_btn" class="btn btn-primary " name="button" onclick="getSelectedRows();copySelected();" >
      <i class="fa fa-copy"></i>
    </button>
  </div>

  <div class="button_wrap">
    <button type="button" title="نسخ مع الموقع" id="copy_btn" class="btn btn-primary" name="button"  onclick="getSelectedRowsWithMap();copySelected();" >
      <i class="fa fa-copy"></i>+<i class="fa fa-location-arrow"></i>
    </button>
  </div>


  <div class="button_wrap">
    <button type="button" title="نسخ مع ارسال للواتساب" id="copy_btn" class="btn btn-primary" name="button"  onclick="sendSelectedTextViaWhatsapp();copySelected();" >
      <i class="fa fa-whatsapp"></i>+<i class="fa fa-copy"></i>
    </button>
  </div>

  <div class="button_wrap">
    <button type="button" title="نسخ مع ارسال الموقع عبر الواتساب" id="copy_btn" class="btn btn-primary" name="button" onclick="sendSelectedTextViaWhatsapp();copySelected();" >
      <i class="fa fa-whatsapp"></i>+<i class="fa fa-copy"></i>+<i class="fa fa-location-arrow"></i>
    </button>
  </div>

  <div class="button_wrap">
    <div class="">
      <a href="<?=base_url()?>index.php/home/add_real_easte" class="btn btn-success">اضافة عقار</a>
    </div>
  </div>


</div>

<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table id="data_table" >
       <thead id="table_header">
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
           <th class='larg_cell'><span>الحي</span></th>
           <th class='medume_cell'><span>المخطط</span></th>
           <th class='small_cell'><span>الدخل</span></th>
           <th class='small_cell'><span>السعر</span></th>
           <th class='small_cell'><span>النسبه بالمائه</span></th>
           <th class='small_cell'><span>نوع العميل</span></th>
           <?php
              if($this->show_phones == 1){
           ?>
           <th class='small_cell'><span>اسم العميل</span></th>
           <th class='small_cell'><span>تليفون العميل</span></th>
           <?php } ?>
           <th class="larg_cell">تاريخ الاضافة</th>
           <th class='larg_cell'>ملاحظات</th>
         </tr>
       </thead>
       <tbody id="table_body">
       </tbody>
     </table>
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
        //$.post( "<?=base_url();?>home/update_real", $( "#easte_form" ).serialize() );
        //initMap();
        //$('[data-toggle="tooltip"]').tooltip();
        $( "#phone_box" ).autocomplete({
          source: "<?php echo site_url('customers/get_autocomplete/?');?>"
        });

        var current_page      = parseInt( $("#current_page").val() );
        var total_rows        = $("#total_rows").val();
        var per_page          = $("#per_page").val();

        if(per_page == 0)
          per_page = 20;
        var offset            = ( current_page - 1) * per_page;

        var real_easte_data   = "<?=base_url()?>index.php/home/all_real_easte_json/" + offset + "/" + per_page;
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
              var char_limit = 25;

              if(note.length < char_limit)
              	note = '<div> ' + note + '</div>';
              else
                note = '<div><span class="short-text">' + note.substr(0, char_limit) + '</span><span class="long-text">' + note.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

              //note = truncate.apply(note, [70, true]);
              //console.log(showGetResult(value.type))

              real_data += '<tr class='+row_class+'>';
              real_data += '<td  class="small_cell select_checkbox"><input type="checkbox" onchange="selectRow(this)" name="selected" value="'+ value.id  +'"/></td>';
              real_data += '<td class="medume_cell">'+ request_type +'</td>';
              real_data += '<td class="medume_cell">'+ value.type_name  + '</td>';
              real_data += '<td class="medume_cell">'+ value.category + '</td>';
              real_data += '<td class="small_cell">'+ value.yard + '</td>';
              real_data += '<td class="small_cell">'+ value.space + '</td>';
              real_data += '<td class="small_cell">'+ value.age +'</td>';
              real_data += '<td class="small_cell">'+ value.floor_cat +'</td>';
              real_data += '<td class="small_cell">'+ value.number_of_floor +'</td>';
              real_data += '<td class="medume_cell">'+ value.apartment_cat +'</td>';
              real_data += '<td class="small_cell">'+ value.apartment_number_store +'</td>';
              real_data += '<td class="medume_cell">'+ value.neighborhood_name +'</td>';
              real_data += '<td class="medume_cell">'+ value.planned +'</td>';
              real_data += '<td class="small_cell">'+ value.income +'</td>';
              real_data += '<td class="small_cell">'+ value.price +'</td>';
              real_data += '<td class="small_cell">'+ value.percent +'</td>';
              real_data += '<td class="small_cell">'+ customer_type +'</td>';
              <?php
                if($this->show_phones == 1){
              ?>
              real_data += '<td class="small_cell">'+ value.customer_name +'</td>';
              real_data += '<td class="small_cell">'+ value.customer_phone +'</td>';
              <?php } ?>
              real_data += '<td class="larg_cell">'+ value.add_time +'</td>';
              real_data += '<td class="larg_cell">'+ note +'</td>';


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


            for( var x = current_page ; x <= (current_page + 2)  && x <= total_pages ; x++ ){
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

            $("#map").toggle('slow');
            $(".def").toggle('slow');

            var hide = 'إخفاء';
            var show = 'إظهار';

            if( $("#hide_map").html() == hide ){
                $("#hide_map").html(show);
            } else {
                $("#hide_map").html(hide);
            }

        });

    });

    $(".show-more-button").click(function(){
      alert("hello world");
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
      var phone_box     = document.getElementById("phone_box");


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

      if(phone_box.value.length > 7){
          if(filters.length == 0) {
              filters += "WHERE real_easte.customer_phone LIKE '"+phone_box.value+"'";
          }else{
              filters += "AND real_easte.customer_phone LIKE '"+phone_box.value+"'";
          }
      }

      console.log(filters);

      var result     = null;
      var scriptUrl  = "<?=base_url()?>index.php/home/get_real_easte_data_with_filter_rows/?q=" + filters;

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

      var real_easte_data = "<?=base_url()?>index.php/home/all_real_easte_json_with_filter/"+offset+"/"+per_page+"/?q="+filters;
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

            var char_limit = 25;

            if(note.length < char_limit)
              note = '<div> ' + note + '</div>';
            else
              note = '<div><span class="short-text">' + note.substr(0, char_limit) + '</span><span class="long-text">' + note.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';


            //note = truncate.apply(note, [70, true]);

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
            real_data += '<td>'+ customer_type +'</td>';
            <?php
              if($this->show_phones == 1){
            ?>
            real_data += '<td>'+ value.customer_name +'</td>';
            real_data += '<td>'+ value.customer_phone +'</td>';
            <?php } ?>
            real_data += '<td class="larg_cell">'+ value.add_time +'</td>';
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
    var phone_box     = document.getElementById("phone_box");

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

    if(phone_box.value.length > 7){
        if(filters.length == 0) {
            filters += "WHERE real_easte.customer_phone LIKE '"+phone_box.value+"'";
        }else{
            filters += "AND real_easte.customer_phone LIKE '" + phone_box.value + "'";
        }
    }

    console.log(filters);

    var result     = null;
    var scriptUrl  = "<?=base_url()?>index.php/home/get_real_easte_data_with_filter_rows/?q=" + filters;

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

    var real_easte_data = "<?=base_url()?>index.php/home/all_real_easte_json_with_filter/"+offset+"/"+ per_page +"/?q="+filters;
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

          var char_limit = 25;

          if(note.length < char_limit)
            note = '<div> ' + note + '</div>';
          else
            note = '<div><span class="short-text">' + note.substr(0, char_limit) + '</span><span class="long-text">' + note.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';


          //note = truncate.apply(note, [70, true]);
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
          real_data += '<td>'+ customer_type +'</td>';
          <?php
            if($this->show_phones == 1){
          ?>
          real_data += '<td>'+ value.customer_name +'</td>';
          real_data += '<td>'+ value.customer_phone +'</td>';
          <?php } ?>
          real_data += '<td class="larg_cell">'+ value.add_time +'</td>';
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

  // read more
  function readMore(e){
      // If text is shown less, then show complete
    	if(e.getAttribute('data-more') == 0) {
    		e.setAttribute('data-more', 1);
    		e.style.display = 'block';
    		e.innerHTML = 'أقل';

    		e.previousSibling.style.display = 'none';
    		e.previousSibling.previousSibling.style.display = 'inline';
    	}
    	// If text is shown complete, then show less
    	else if(e.getAttribute('data-more') == 1) {
    		e.setAttribute('data-more', 0);
    		e.style.display = 'inline';
    		e.innerHTML = 'المزيد';

    		e.previousSibling.style.display = 'inline';
    		e.previousSibling.previousSibling.style.display = 'none';
    	}
  }
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

  var selected_count = 0;
  // select one row
  function selectRow(e){

      if(e.checked == true){
          var row = e.parentElement.parentElement;
          row.classList.add('selected');
          selected_count++;

          if(selected_count == 1){
            $("#edit_row").show();
            $("#edit_row").val(e.value);
          }else{
            $("#edit_row").hide();
          }

      } else {
          var row = e.parentElement.parentElement;
          row.classList.remove('selected');
          selected_count--;

          if(selected_count == 1){
            $("#edit_row").show();
            $("#edit_row").val(e.value);
          }else{
            $("#edit_row").hide();
          }
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

      alert(real_data);

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

  function edit_popup(e){
    var real_id   = e.value;
    var api       = "<?=base_url()?>index.php/home/get_real_easte_data_as_json/" + real_id;
    $('#easte_form').trigger("reset");

    $.ajaxSetup({
        async: false
    });

    $.getJSON( api , function(data){
        $.each( data , function( key, val ){
            //console.log("yardd : " + val.yard);

            $("#easte_form input[name=real_number]").val(val.id);
            $("#easte_form select[name=request_type] option[value="+val.request_type+"]").attr('selected','selected');
            $("#easte_form select[name=type] option[value="+val.type+"]").attr('selected','selected');
            $("#easte_form select[name=category] option[value="+val.category+"]").attr('selected','selected');
            if(val.yard.length > 0)
              $("#easte_form select[name=yard] option[value="+val.yard+"]").attr('selected','selected');
            $("#easte_form input[name=space]").val(val.space);
            $("#easte_form input[name=age]").val(val.age);
            if(val.floor_cat.length > 0)
              $("#easte_form select[name=floor_cat] option[value="+val.floor_cat+"]").attr('selected','selected');
            $("#easte_form input[name=number_of_floor]").val(val.number_of_floor);
            if(val.apartment_cat.length > 0)
              $("#easte_form select[name=apartment_cat] option[value="+val.apartment_cat+"]").attr('selected','selected');
            $("#easte_form input[name=apartment_number_store]").val(val.apartment_number_store);
            $("#easte_form input[name=estate_numebr]").val(val.estate_numebr);
            $("#easte_form input[name=street]").val(val.street);
            if(val.neighborhood.length > 0)
              $("#easte_form select[name=neighborhood] option[value="+val.neighborhood+"]").attr('selected','selected');
            $("#easte_form input[name=planned]").val(val.planned);
            $("#easte_form input[name=street_width]").val(val.street_width);
            if(val.elevator.length > 0)
              $("#easte_form select[name=elevator] option[value="+val.elevator+"]").attr('selected','selected');
            $("#easte_form input[name=income]").val(val.income);
            $("#easte_form input[name=price]").val(val.price);
            $("#easte_form input[name=percent]").val(val.percent);
            if(val.customer_type.length > 0)
              $("#easte_form select[name=customer_type] option[value="+val.customer_type+"]").attr('selected','selected');
            $("#easte_form input[name=customer_name]").val(val.customer_name);
            $("#easte_form input[name=customer_phone]").val(val.customer_phone);
            $("#easte_form input[name=y]").val(val.y);
            $("#easte_form input[name=x]").val(val.x);
            $("#easte_form textarea[name=note]").val(val.note);

            console.log('aqar :' + val.aqar_url.length);

            <?php
              if($_SESSION['permission'] == 1){
                echo "
                  if(val.aqar_url.length > 0){
                    $('#aqar_url').attr('href', val.aqar_url);
                    $('#aqar_box').show();
                  }
                ";
              }
            ?>

            openMap(val.x , val.y);

        });
    });

    $(".edit_real_easte").show('slow');
  }

  var map;
  var marker;
  //var x;
  //var y;

  function openMap(x , y) {
      console.log("X : " + x + " Y:  "  + y);

      map = new google.maps.Map(document.getElementById('edit_map'), {
        center: {lat: parseFloat(y) , lng: parseFloat(x) },
        zoom: 14,
        mapTypeId: 'satellite'
      });

      marker = new google.maps.Marker({
        position: {lat: parseFloat(y) , lng: parseFloat(x) },
        map: map,
        draggable: true
      });

      google.maps.event.addListener(marker, 'dragend' , function(){
        y = marker.getPosition().lat();
        x = marker.getPosition().lng();

        $("input[name='y']").val(y);
        $("input[name='x']").val(x);

      });
  }

  function ConfirmDialog(message) {
      $('<div></div>').appendTo('body')
      .html('<div><h6>'+message+'؟</h6></div>')
      .dialog({
          modal: true, title: '!!حذف', zIndex: 10000, autoOpen: true,
          width: 'auto', resizable: false,
          buttons: {
              نعم: function () {
                  var id = $("#easte_form input[name=real_number]").val();
                  var url = '<?=base_url()?>';
                  window.location.replace( url + "home/delete_easte/" + id);
                  $(this).dialog("close");
              },
              لا: function () {
                  //$('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');

                  $(this).dialog("close");
              }
          },
          close: function (event, ui) {
              $(this).remove();
          }
      });
  };

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
                  icon = icon_base + 'villa.png';
              }else if(val.type == 5){
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
