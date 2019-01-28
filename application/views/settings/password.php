<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <?=$msg;?>
          <form class="" action="" method="post">
            <div class="form-group  required" >
                <label for="" class="control-label">كلمة  السر القديمة</label>
                <input type="password" class="form-control" name="old_pass" value="" required>
            </div>

            <div class="form-group  required" >
                <label for="" class="control-label">كلمة السر الجديدة</label>
                <input type="password" class="form-control" name="new_pass" value="" required>
            </div>

            <div class="form-group  required" >
                <label for="" class="control-label">اعد تأكيد كلمة السر</label>
                <input type="password" class="form-control" name="second_pass" value="" required>
            </div>


            <div class="form-group  required" >
                <input type="submit" class="btn btn-success"  value="حفظ">
            </div>

          </form>

        </div>
      </div>

    </div>
</div>
