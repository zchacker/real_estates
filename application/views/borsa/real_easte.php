

<style media="screen">
  .form-inline .form-control{
    width: inherit;
  }
</style>

<form class="private_form" action="" method="post">
  <input type="hidden" name="permission" value="<?=$_SESSION['permission'];?>">
</form>
<div class="content" >

      <div class="container-fluid">

      <!-- this row for map -->
      <div class="row def">

        <div class="col-md-1 hidden-sm hidden-xs">

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

        <div class="col-md-1 hidden-sm hidden-xs">

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

        <div class="col-md-10 col-sm-12 col-xs-12">
          <div id="map"></div>
        </div>
      </div>

      <hr>

      <!-- this row for simpe filters -->
      <a href="javascript:void(0)" class="btn btn-success hidden-lg hidden-md hidden-sm" id="hide_filters">اخفاء الفلاتر</a>
      <a href="javascript:void(0);" class="btn btn-success hidden-sm advanced_filters_btn hidden-lg hidden-md hidden-sm " >اظهار فلاتر متقدمة</a>
      <a href="javascript:void(0)" class="btn btn-warning hidden-lg hidden-md hidden-sm hide_map">إخفاء الخريطة</a>


      <div class="row">
        <a href="javascript:void(0);" class="hidden-sm hidden-xs" id="advanced_filters_btn">اظهار فلاتر متقدمة</a> -
        <a href="javascript:void(0);" class="hidden-sm hidden-xs" id="filters_btn">اخفاء الفلاتر</a> -
        <a href="javascript:void(0)" id="hide_map" class="hidden-sm hidden-xs hide_map">إخفاء الخريطة</a>

        <div class="filters">
          <form class="form-inline filter_forms" action="" method="post" id="filter_form">
            <?php
              if($this->show_phones == 1){
                echo '<input type="hidden" name="show_phones" id="show_phones" value="1">';
              }else{
                echo '<input type="hidden" name="show_phones" id="show_phones" value="0">';
              }
            ?>

            <input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
            <input type="hidden" name="see_aqar" id="see_aqar" value="<?=$this->see_aqar?>">
            <input type="hidden" name="phone_url_json" id="phone_url_json" value="<?php echo site_url('customers/get_autocomplete/?');?>">
            <input type="hidden" name="page_number" id="page_number" value="1">
            <input type="hidden" name="total_rows" id="total_rows"  value="<?=$total_rows?>">
            <input type="hidden" name="current_page" id="current_page" value="1">
            <input type="hidden" name="offset" id="offset" value="0">

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

            <div class="form-group filter_form1">
              <label for="">السعر</label>
              <select class="form-control" name="price_order" id="price_order" onchange="load_table_filter()">
                  <option value="-1"></option>
                  <option value="0">تصاعدي</option>
                  <option value="1">تنازلي</option>
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
                <label for="phone_box"> رقم الهاتف </label>
                <input type="text" name="phone_box" class="form-control" id="phone_box"  value="" onchange="load_table_filter()">
            </div>

          </form>

          <hr/>

        </div>
      </div>

      <!-- this for advanced filters -->
      <div class="row ">
        <div class="advanced_filters">
          <form class="form-inline filter_forms" action="" method="post" >

            <div class="form-group filter_form1">
              <label for="phone_box"> رقم الاعلان </label>
              <input type="text" name="easte_num" class="form-control" id="easte_num"  value="" onchange="load_table_filter()">
            </div>

            <div class="form-group filter_form1">
              <label for="price1"> السعر من </label>
              <input type="text" name="price1" class="form-control" id="price1"  value="0" onchange="load_table_filter()">
            </div>

            <div class="form-group filter_form1">
              <label for="price2"> السعر الى</label>
              <input type="text" name="price2" class="form-control" id="price2"  value="0" onchange="load_table_filter()">
            </div>

            <div class="form-group filter_form1">
              <label for="">المشرف</label>
              <select class="form-control" name="added_by" id="added_by" onchange="load_table_filter()">
                  <option value="-1">الكل</option>
                  <?php
                    foreach ($employes as $row) {
                        echo "<option value='$row->id'>$row->name</option>";
                    }
                  ?>
              </select>
            </div>

            <div class="form-group filter_form2">
                <label for="search_box">بحث</label>
                <input type="text" name="search_box" class="form-control" id="search_box" placeholder="بحث في الملاحظات" value="" onchange="load_table_filter()">
            </div>

            <div class="form-group filter_form1">
              <label for="have_comments">تعليقات
              <input type="checkbox" name="have_comments" id="have_comments" value="1" onchange="javascript:load_table_filter()" />
              </label>
            </div>

            <div class="form-group filter_form1">
              <label for="sent_whats">تم الارسال
                <input type="checkbox" name="sent_whats" id="sent_whats" value="1" onchange="javascript:load_table_filter()"/>
              </label>
            </div>

            <?php
              if($this->see_aqar == 1){
                echo '
                <div class="form-group filter_form1">
                  <label for="show_aqar">من عقار
                    <input type="checkbox" name="show_aqar" id="show_aqar" value="1" onchange="javascript:load_table_filter()"/>
                  </label>
                </div>';
              }
            ?>


          </form>

          <hr>
        </div>
      </div>

      <div class="row">
      </div>

      <!-- this row for buttons -->
      <div class="row">
        <div class="col-md-12">

          <div class="button_wrap">
              <select class="form-control" onchange="javascript:load_more_rows_table(this);" id="per_page" name="">
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="500">500</option>
              </select>
          </div>

          <div class="first_button_wrap">
            <a href="javascript:void(0)" id="delete_all" class="btn btn-danger">حذف</a>
          </div>

          <!-- <div class="button_wrap">
            <a href="javascript:void(0)" id="hide_map" class="btn btn-warning hide_map">إخفاء الخريطة</a>
          </div> -->

          <div class="button_wrap">
            <button type="button" title="نسخ" data-clipboard-target="#copy_area" id="copy_btn" class="btn btn-primary " name="button" onclick="javascript:getSelectedRows();" >
              <i class="fa fa-copy"></i>
            </button>
          </div>

          <div class="button_wrap">
            <button type="button" title="نسخ مع الموقع" id="copy_btn" class="btn btn-primary" name="button"  onclick="getSelectedRowsWithMap();" >
              <i class="fa fa-copy"></i>+<i class="fa fa-location-arrow"></i>
            </button>
          </div>

          <div class="button_wrap">
            <button type="button" title="نسخ مع ارسال للواتساب" id="copy_btn" class="btn btn-primary" name="button"  onclick="sendSelectedTextViaWhatsapp();" >
              <i class="fa fa-whatsapp"></i>+<i class="fa fa-copy"></i>
            </button>
          </div>

          <div class="button_wrap">
            <button type="button" title="نسخ مع ارسال الموقع عبر الواتساب" id="copy_btn" class="btn btn-primary" name="button" onclick="sendCopyRowsToWhatsWithMap();" >
              <i class="fa fa-whatsapp"></i>+<i class="fa fa-copy"></i>+<i class="fa fa-location-arrow"></i>
            </button>
          </div>

          <?php
             if($this->show_phones == 1){
          ?>
          <div class="button_wrap">
            <div class="">
              <a href="javascript:void(0)" onclick="hide_phones()" class="btn btn-danger" id='hide_phone'>اخفاء الارقام</a>
            </div>
          </div>
           <?php } ?>

          <div class="button_wrap">
            <div class="">
              <a href="<?=base_url()?>index.php/home/add_real_easte" class="btn btn-success">اضافة عقار</a>
            </div>
          </div>

          <div class="pagination_list"></div>

        </div>
      </div>

      <hr/>

      <!-- this is data table -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
          <div class="content table-responsive table-full-width">
            <table class="table_wrapper" id="data_table" >
             <thead id="table_header">
               <tr>
                 <th class=''><input type='checkbox' name='selected' value="hello" id="check_all" onclick="checkAll()"/></th>
                 <th class=''><span> نوع العملية</span></th>
                 <th class=''><span>نوع العقار</span></th>
                 <th class=''><span>فئة العقار</span></th>
                 <th class=''><span>الحرم</span></th>
                 <th class=''><span>المساحة</span></th>
                 <th class=''><span>العمر</span></th>
                 <th class=''><span>فئة الادوار</span></th>
                 <th class=''><span>عدد الادوار</span></th>
                 <th class=''><span>فئة الشقق</span></th>
                 <th class=''><span>عدد الشقق</span></th>
                 <th class=''><span>الحي</span></th>
                 <th class=''><span>المخطط</span></th>
                 <th class=''><span>الدخل</span></th>
                 <th class=''><span>السعر</span></th>
                 <th class=''><span>النسبه بالمائه</span></th>
                 <th class=''><span>نوع العميل</span></th>
                 <?php
                    if($this->show_phones == 1){
                 ?>
                 <th class=''><span>اسم العميل</span></th>
                 <th class=''><span>تليفون العميل</span></th>
                 <?php } ?>
                 <th class="">تاريخ الاضافة</th>
                 <th class=''>ملاحظات</th>
               </tr>
             </thead>
             <tbody id="table_body">
             </tbody>
            </table>
          </div>
        </div>
      </div>

  </div>
</div>

<script src="<?=base_url();?>assets/js/borsa.js" charset="utf-8"></script>
