<div class="content">
    <div class="container-fluid">
      <div class="row show_real_data">
        <?php

          $request_type   = '' ;
          $customer_type  = '' ;

          if($data->request_type == 1)
            $request_type = 'عرض' ;

          if($data->request_type == 2)
            $request_type = 'طلب' ;

          if($data->request_type == 3)
            $request_type = 'إيجار' ;

          if($data->customer_type == 1)
            $customer_type = 'زبون مباشر';

          if($data->customer_type == 2)
            $customer_type = 'مالك مباشر';

          if($data->customer_type == 3)
            $customer_type = 'وكيل';

          if($data->customer_type == 4)
            $customer_type = 'وسيط';

          if($data->customer_type == 5)
            $customer_type = 'وسيط اول';

          if($data->customer_type == 6)
            $customer_type = 'وسيط ثاني';

          if($data->customer_type == 7)
            $customer_type = 'وسيط ثالث';

          if($data->customer_type == 8)
            $customer_type = 'وسيط رابع';

          if($data->customer_type == 9)
            $customer_type = 'وسيط خامس';
        ?>
        <?php
          if($_SESSION['permission'] == 1){
            if($data->add_by_aqar == 1){
              echo "
                <div class='col-md-12'>
                  <a href='$data->aqar_url' style='color:red' target='_blank'>الرابط في موقع عقار</a>
                </div>
              ";
            }
          }
        ?>
        <div class="col-md-12">
          <h3><?=$request_type?> رقم :- <?=$data->id;?></h3>
        </div>
        <div class="col-md-4">
          <strong>نوع العقار : </strong> <span><?=$data->type_name;?></span>
        </div>
        <div class="col-md-4">
          <strong>فئة العقار	: </strong> <span><?=$data->type_name;?></span>
        </div>
        <div class="col-md-4">
          <strong>الحرم : </strong> <span><?=$data->yard;?></span>
        </div>
        <div class="col-md-4">
          <strong>المساحة: </strong> <span><?=$data->space;?></span>
        </div>
        <div class="col-md-4">
          <strong>العمر: </strong> <span><?=$data->age;?></span>
        </div>
        <div class="col-md-4">
          <strong>فئة الادوار	: </strong> <span><?=$data->floor_cat;?></span>
        </div>
        <div class="col-md-4">
          <strong>عدد الادوار	: </strong> <span><?=$data->number_of_floor;?></span>
        </div>
        <div class="col-md-4">
          <strong>فئة الشقق	 : </strong> <span><?=$data->apartment_cat;?></span>
        </div>
        <div class="col-md-4">
          <strong>عدد الشقق	: </strong> <span><?=$data->apartment_number_store;?></span>
        </div>
        <div class="col-md-4">
          <strong>الحي: </strong> <span><?=$data->neighborhood_name;?></span>
        </div>
        <div class="col-md-4">
          <strong>المخطط : </strong> <span><?=$data->planned;?></span>
        </div>
        <div class="col-md-4">
          <strong>الدخل : </strong> <span><?=$data->income;?></span>
        </div>
        <div class="col-md-4">
          <strong>السعر : </strong> <span><?=$data->price;?></span>
        </div>
        <div class="col-md-4">
          <strong>النسبة بالمئة	 : </strong> <span><?=$data->percent;?></span>
        </div>
        <div class="col-md-4">
          <strong>نوع العميل	 : </strong> <span><?=$customer_type;?></span>
        </div>
        <div class="col-md-4">
          <strong>تاريخ الاضافة		 : </strong> <span><?=$data->add_time;?></span>
        </div>
        <div class="col-md-8">
          <hr/>
          <strong>ملاحظات : </strong> <span><?=$data->note;?></span>
        </div>
        <?php
          if($data->x > 0 && $data->y > 0){
        ?>
        <br/>
        <div class="col-md-12">
          <div id="one_map" style="height:500px;"></div>
        </div>
        <?php } ?>
        
      </div>

      <br/>

      <div class="">
        <?php
            if($data->whatsapp_sent == 1)
              echo "<p style='color:green;'>تم مراسلته بالواتساب</p>";
        ?>
      </div>

      <hr>

      <?php
        //$tweet_url = "https://twitter.com/intent/tweet?text=";

        $tweet_url = "$request_type رقم : $data->id \r\n";
        $tweet_url .= "نوع العقار :  $data->type_name \r\n";
        $tweet_url .= "فئة العقار : $data->category \r\n";
        $tweet_url .= "المخطط : $data->planned \r\n";
        $tweet_url .= "السعر : $data->price \r\n";
        $tweet_url .= "رقم الجوال: - 0580011337 \r\n";
        $tweet_url .= "\r\n #عقارات  #عقار  #المدينة_المنورة #  #الوساطة_التعاونية";

      ?>

      <div class="row">
        <a href="<?=base_url()?>real_estate/edit/<?=$data->id?>" class="btn btn-warning">تعديل</a>
        <a href="javascript:delete_confirm()" class="btn btn-danger">حذف</a>
        <a href="javascript:sendWhatsapp()" class="btn btn-success">أرسل إلى واتساب</a>
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button btn btn-primary" data-text="<?=$tweet_url?>" data-url=" " data-via="" data-lang="ar" data-show-count="true">غرد</a>
      </div>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

      <div class="">
        <h5>التعليقات</h5>
      </div>
      <!-- commnets -->
      <?php
        foreach ($comments as $val) {

          if($_SESSION['id'] == $val->user)
            $btn = "<button class='btn btn-danger delete_btn' value='$val->id' >حذف</button>";
          else
            $btn = "";

          echo "
          <div class='row comment_body'>
            <div class='col-md-12'>
              <h2>$val->name</h2>
              <p>$val->content</p>
              $btn
            </div>
          </div>
          ";
        }
      ?>

      <hr>
      <!-- add comment -->
      <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
          <form class="" action="" method="post">
            <div class="">
              <textarea class="comment" name="comment" rows="3" cols="80" required></textarea>
            </div>
            <div class="">
              <button type="submit" class="btn btn-primary" name="button">أضف تعليقك</button>
            </div>
          </form>
        </div>
      </div>

    </div>
</div>

<form class="" action="" method="post">
  <input type="hidden" name="x" id="x" value="<?=$data->x;?>">
  <input type="hidden" name="y" id="y" value="<?=$data->y;?>">
</form>

<script type="text/javascript">

  function delete_confirm() {
    var confirm = window.confirm("متأكد من الحذف ؟");
    if(confirm == true){
      window.location="<?=base_url()?>real_estate/delete/<?=$data->id?>";
    }

  }

  function sendWhatsapp(){


      <?php

        $real_data = $request_type.' رقم : '.$data->id .'\n';
        $real_data .= 'نوع العقار :  '.$data->type_name.' \n';
        $real_data .= 'فئة العقار : '.$data->category.' \n';
        $real_data .= 'المخطط : '.$data->planned.' \n';
        $real_data .= 'الحي : '.$data->neighborhood_name.' \n';
        if($data->income > 0)
          $real_data .= 'الدخل :  '.$data->income.'\n';
        $real_data .= 'السعر : '.$data->price.' \n';
        $note = str_replace("\r\n","",$data->note);
        $note = str_replace("\n","",$note);
        $note = trim($note);
        $real_data .= 'تفاصيل أكثر : '.$note.'\n';

        // here to replace the note for the offer if $_GET['offer'] exsit
        if(@$_GET['offer']){
          $offer = $_GET['offer'];
          $new_note =  $this -> real_estate_model -> get_real_estate_data($offer) -> result()[0];

          $real_data = $request_type.' رقم : '.$new_note->id .'\n';
          $real_data .= 'نوع العقار :  '.$new_note->type_name.' \n';
          $real_data .= 'فئة العقار : '.$new_note->category.' \n';
          $real_data .= 'المخطط : '.$new_note->planned.' \n';
          $real_data .= 'الحي : '.$new_note->neighborhood_name.' \n';
          if($new_note->income > 0)
            $real_data .= 'الدخل :  '.$new_note->income.'\n';
          $real_data .= 'السعر : '.$new_note->price.' \n';
          $note = str_replace("\r\n","",$new_note->note);
          $note = str_replace("\n","",$note);
          $note = trim($note);
          $real_data .= 'تفاصيل أكثر : '.$note.'\n';
        }

      ?>

      var real_data = "<?=trim($real_data);?>";


      $('input[name=easte_type]').val(<?=$data->type?>);
      $('input[name=easte_id]').val(<?=$data->id?>);
      $('input[name=sent_whatsapp]').val('true');
      $("#phone").val(<?=$data->customer_phone?>);
      $("#whatsmsg").val(real_data);
      $("#location").prop('disabled', true);
      $('#id01').show();
      document.getElementById('id01').style.display='block';

  }

  $('.delete_btn').click(function(){
    var comment_id = $(this).val();
    var real_id = <?=$data->id?>;
    var jqxhr = $.get( "<?=base_url();?>real_estate/delete_comment/" + real_id + "/" + comment_id, function() {

                })
                .done(function() {
                  //alert( "تم الحذف" );
                })
                .fail(function() {
                  alert( "حدث خطأ غير متوقع" );
                })
                .always(function() {
                  //alert( "finished" );
                });

      $(this).parent().parent().remove();

  });

  function hide_popup_window(){
    document.getElementById('id01').style.display='none';
  }

  function initMap() {
    var x = $('#x').val();
    var y = $('#y').val();

    if(x > 0 && y > 0){
      map = new google.maps.Map(document.getElementById('one_map'), {
        center: {lat: parseFloat(y) , lng: parseFloat(x) },
        zoom: 14,
        mapTypeId: 'satellite'
      });

      marker = new google.maps.Marker({
        position: {lat: parseFloat(y) , lng: parseFloat(x) },
        map: map,
        draggable: true
      });
    }
  }

  $(document).ready(function(){
     initMap();
  });

</script>
