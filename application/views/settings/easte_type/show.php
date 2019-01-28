
<div class="row add_btn">

  <div class="col-md-4">
  </div>

  <div class="col-md-4">
    <a href="<?=base_url()?>Settings/add_real_easte" class="btn btn-success">اضافة نوع عقار جديد</a>
  </div>

</div>

<div class="row">

    <div class="col-md-4">
    </div>

    <div class="col-md-5">
      <table class="table table-bordered table-hover tablesorter">
        <thead>
          <th>#</th>
          <th>اسم العقار</th>
          <th>إجراء</th>
        </thead>

        <tbody>
          <?php
              foreach ($real_eastes as $value) {
                  $delete_url = base_url()."Settings/delete_real_eastes/$value->id";
                  $edit_url   = base_url()."Settings/edit_real_eastes/$value->id";

                  echo "
                    <tr>
                      <td>$value->id</td>
                      <td>$value->name</td>
                      <td><a href='$edit_url'>تعديل</a> - <a href='$delete_url'>حذف</a> </td>
                    </tr>
                  ";
              }
          ?>
        </tbody>

      </table>
    </div>

</div>
