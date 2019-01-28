<div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
          <strong style="color:red;"><?=$msg;?></strong>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-5">
          <form class="" action="" method="post">
                <div class="form-group">
                  <label for="name" class="control-label">الاسم</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?=$customer->name?>">
                </div>

                <div class="form-group">
                  <label for="phone" class="control-label">رقم الهاتف</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="<?=$customer->phone?>">
                </div>

                <div class="form-group">
                  <label for="group" class="control-label">المجموعة</label>
                  <select class="form-control" name="group" id="group">
                    <?php
                       foreach ($groups as $value) {

                           if($customer->phone_group == $value->id)
                             echo "<option value='$value->id' selected >$value->group_name</option>";
                           else
                             echo "<option value='$value->id'>$value->group_name</option>";
                       }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="neighborhood" class="control-label">الحي</label>
                  <select class="form-control" name="neighborhood" id="neighborhood">
                      <option value="0">الكل</option>
                    <?php
                       foreach ($neighborhood as $value) {
                         if($customer->neighborhood == $value->id)
                           echo "<option value='$value->id' selected >$value->name</option>";
                         else
                           echo "<option value='$value->id'>$value->name</option>";
                       }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="customer_type" class="control-label">نوع العميل</label>
                  <select class="form-control" name="customer_type" id="customer_type">
                      <option value="0" <?php if($customer->customer_type == 0) echo "selected"; ?> >الكل</option>
                      <option value="1" <?php if($customer->customer_type == 1) echo "selected"; ?>>زبون مباشر</option>
                      <option value="2" <?php if($customer->customer_type == 2) echo "selected"; ?>>مالك مباشر</option>
                      <option value="3" <?php if($customer->customer_type == 3) echo "selected"; ?>>وكيل</option>
                      <option value="4" <?php if($customer->customer_type == 4) echo "selected"; ?>>وسيط</option>
                      <option value="5" <?php if($customer->customer_type == 5) echo "selected"; ?>>وسيط أول</option>
                      <option value="6" <?php if($customer->customer_type == 6) echo "selected"; ?>>وسيط ثاني</option>
                      <option value="7" <?php if($customer->customer_type == 7) echo "selected"; ?>>وسيط ثالث</option>
                      <option value="8" <?php if($customer->customer_type == 8) echo "selected"; ?>>وسيط رابع</option>
                      <option value="9" <?php if($customer->customer_type == 9) echo "selected"; ?>>وسيط خامس</option>
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
