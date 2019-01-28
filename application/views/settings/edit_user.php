<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">

          <?=$msg;?>
          <form class="" action="" method="post">
            <div class="form-group  " >
                <label for="" class="control-label">الاسم</label>
                <input type="text" class="form-control" name="name" value="<?=@$val->name?>" >
            </div>

            <div class="form-group  required" >
                <label for="" class="control-label">رقم الهاتف</label>
                <input type="tel" class="form-control" name="phone" value="<?=@$val->phone?>" required>
            </div>

            <div class="form-group required" >
                <label for="" class="control-label">الايميل</label>
                <input type="email" class="form-control" name="email" value="<?=@$val->email?>" required>
            </div>

            <div class="form-group required" >
                <label for="" class="control-label">الصلاحيات</label>
                <select class="form-control" name="permission" required>
                  <option value="1" <?php echo @$val->permission == 1 ? "selected" : "";?> >مدير</option>
                  <option value="2" <?php echo @$val->permission == 2 ? "selected" : "";?>>مشرف</option>
                </select>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="add_real" name="add_real" <?php echo @$val->add_real == 1 ? "checked" : "";?> >
              <label class="form-check-label" for="add_real">اضافة عقارات</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="see_phone" name="see_phone" <?php echo @$val->see_phone == 1 ? "checked" : "";?>>
              <label class="form-check-label" for="see_phone">مشاهدة هواتف العملاء</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="send_msgs" name="send_msgs" <?php echo @$val->send_msgs == 1 ? "checked" : "";?>>
              <label class="form-check-label" for="send_msgs">أرسال رسائل واتساب</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="see_aqar" name="see_aqar" <?php echo @$val->see_aqar == 1 ? "checked" : "";?>>
              <label class="form-check-label" for="send_msgs">مشاهدة عروض عقار</label>
            </div>

            <div class="col-md-12">
              <br/>
              <br/>
              <strong style="color:red;">اتركه فارغ في حالة عدم الرغبة في تعديل كلمة المرور</strong>
              <br/>
            </div>

            <div class="form-group required" >
                <label for="" class="control-label">كلمة السر</label>
                <input type="password" class="form-control" name="pass" value="" >
            </div>

            <div class="form-group  required" >
                <label for="" class="control-label">اعد تأكيد كلمة السر</label>
                <input type="password" class="form-control" name="second_pass" value="" >
            </div>

            <div class="form-group required" >
                <input type="submit" class="btn btn-success"  value="حفظ">
            </div>

          </form>

        </div>
      </div>

    </div>
</div>
