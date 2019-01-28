<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <button type="button" class="show_note_box" name="button">أضف ملاحظة <i class="ti-pencil-alt"></i></button>
      </div>
      <br>
    </div>
    <div class='row'>
    <?php
      foreach ($notes as $value) {
         echo "
              <div class='col-md-3 note'>
                <div class='note_header'>
                  <strong>$value->name</strong> - <span>$value->date</span>
                </div>
                <div class='note_body'>
                  <p>$value->body</p>
                </div>
                <div class='delete_note'>
                  <button type='button' class='btn btn-danger delete_note_btn' value='$value->id' name='button'>حذف</button>
                </div>
              </div>
                ";
      }
    ?>
    </div>
  </div>
</div>

<div class="float_note">
  <form class="" action="" method="post">
    <div class="note_box">
      <label for="">الملاحظة</label>
      <textarea name="note_body" rows="8" cols="80" maxlength="500"></textarea>
      <button type="submit" class="btn btn-success" name="button">حفظ الملاحظة</button>
      <button type="button" class="btn btn-danger close_note" name="button">إغلاق</button>
    </div>
  </form>
</div>

<script type="text/javascript">
  $('.close_note').click(function(){
    $('.float_note').fadeOut(400);
  });

  $('.show_note_box').click(function(){
    $('.float_note').fadeIn(1000);
  })

  $('.delete_note_btn').click(function(){
    var note_id = $(this).val();
    var jqxhr = $.get( "<?=base_url();?>notes/delete_note/" + note_id, function() {

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

</script>
