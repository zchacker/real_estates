<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-9">

            <?php
              if(@$_SESSION['permission'] == 1 ){

                $u = base_url()."settings/get_easte_added_by/?id=0";
                echo "<a href='$u' style='color:red;'>اظهار العقارات المضافة بواسطة البوت</a>";
                echo "<hr/>";

              }
            ?>

          <div class="table-responsive">
            <table class="med_table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>اسم الموظف</th>
                  <th>نوعه</th>
                  <th>اضافة عقارات</th>
                  <th>مشاهدة هواتف العملاء</th>
                  <th>إرسال رسائل</th>
                  <th>العقارات</th>
                  <th>إجراء</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  foreach ($users as $key => $value) {
                    $type = "مشرف";
                    $add_real = 'لا';
                    $see_phone = 'لا';
                    $send_msgs = 'لا';

                    if($value->permission == 1)
                      $type = "مدير";

                    if($value->add_real == 1)
                      $add_real = "نعم";

                    if($value->see_phone == 1)
                      $see_phone = "نعم";

                    if($value->send_msgs == 1)
                      $send_msgs = "نعم";

                    $update = base_url().'settings/update_emploee/';
                    $delete = base_url().'settings/delete_employee/';

                    $easte = base_url().'settings/get_easte_added_by/?id=';

                    echo "
                      <tr>
                        <td>$i</td>
                        <td>$value->name</td>
                        <td>$type</td>
                        <td>$add_real</td>
                        <td>$see_phone</td>
                        <td>$send_msgs</td>
                        <td><a href='$easte$value->id'>جميع العقارات</a></td>
                        <td><a href='".$update."$value->id'>تعديل</a> - <a href='".$delete."$value->id'>حذف</a></td>
                      </tr>
                    ";
                    $i++;
                  }
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

    </div>
</div>
