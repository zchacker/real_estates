<div class="content">
    <div class="container-fluid">
      <div class="row add_btn">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
          <?=$msg?>
        </div>

      </div>
      <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-5">
          <form class="" action="" method="post">

                <div class="form-group">
                  <label for="name" class="control-label">الاسم</label>
                  <input type="text" class="form-control" id="name" name="name" value="">
                </div>
                <div class="form-group">
                  <label for="phone" class="control-label">رقم الهاتف</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="">
                </div>

                <div class="form-group">
                  <label for="group" class="control-label">المجموعة</label>
                  <select class="form-control" name="group" id="group">
                    <?php
                       foreach ($groups as $value) {

                           // if($customer->phone_group == $value->id)
                           //   echo "<option value='$value->id' selected >$value->group_name</option>";
                           // else
                             echo "<option value='$value->id'>$value->group_name</option>";
                       }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <input type="submit" name="" class="btn btn-success" value="حفظ">
                  <input type="reset" name="" class="btn btn-primary" onclick="window.location.href = '<?=base_url()."Customers/index"?>'" value="الغاء">
                </div>

          </form>
        </div>

      </div>
    </div>
</div>
