<div class="content">
    <div class="container-fluid">
      <div class="row add_btn">

        <div class="col-md-4">
        </div>

        <div class="col-md-4">
          <a href="<?=base_url()?>Customers" class="btn btn-info">عودة</a>
          <a href="<?=base_url()?>Customers/add_group" class="btn btn-success">إضافة مجموعة</a>
        </div>


      </div>
      <hr>
      <div class="row">

          <div class="col-md-4">
          </div>

          <div class="col-md-5">
            <?php echo $this->pagination->create_links();?>
            <div class="content table-responsive table-full-width">
              <table class="normal_table ">
                <thead>
                  <th>#</th>
                  <th>الاسم</th>
                  <th>أجراء</th>
                </thead>

                <tbody>
                  <?php
                      $count = 1;
                      foreach ($groups as $value) {

                        if($value->id == 1)
                          continue;

                          $delete_url = base_url()."Customers/delete_group/$value->id";
                          $edit_url   = base_url()."Customers/edit_group/$value->id";

                          echo "
                            <tr>
                              <td>$count</td>
                              <td>$value->group_name</td>
                              <td><a href='$edit_url'>تعديل</a> - <a href='$delete_url'>حذف</a> </td>
                            </tr>
                          ";

                          $count++;
                      }
                  ?>
                </tbody>

              </table>
            </div>
          </div>

      </div>

    </div>
</div>
