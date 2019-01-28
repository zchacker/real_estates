<div class="content">
    <div class="container-fluid">
      <div class="row add_btn">

        <div class="col-md-4">
        </div>

        <div class="col-md-1">
          <a href="<?=base_url()?>Customers/add_customer" class="btn btn-success">إضافة عميل</a>
        </div>

        <div class="col-md-4">
          <!-- <div class="form-group row"> -->
            <form class="form-group row" action="" method="get">
              <div class="col-md-5">
                <select class="form-control" name="group" id="group">
                  <option value="0">الكل</option>
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
              <div class="col-md-5">
                <input type="text" name="phone" value="" placeholder="رقم الهاتف" id="phone" class="form-control" autocomplete="off">
              </div>
              <div class="col-md-2">
                <button type="submit"  class="btn btn-primary">بحث</button>
              </div>
            </form>
          <!-- </div> -->
        </div>

        <div class="col-md-2">
          <a href="<?=base_url()?>Customers/show_groups" class="btn btn-warning">المجموعات</a>
        </div>

      </div>
      <div class="row">

          <div class="col-md-4">
          </div>

          <div class="col-md-5">

            <div class="">

            </div>
            <?php echo $this->pagination->create_links();?>
            <div class="content table-responsive table-full-width">
              <table class="normal_table">
                <thead>
                  <th>#</th>
                  <th>اسم العميل</th>
                  <th>رقم الهاتف</th>
                  <th>اسم المجموعة</th>
                  <th>أجراء</th>
                </thead>

                <tbody>
                  <?php

                      $page_number = 1;

                      if(strlen($this->uri->segment(3)) == 0 )
                       $page_number = 1;
                      else {
                       $page_number = $this->uri->segment(3);
                      }

                      $count = $page_number;

                      // echo "<pre>";
                      // print_r($customers);
                      // echo "</pre>";
                      foreach ($customers as $value) {
                          $delete_url = base_url()."Customers/delete_customer/$value->customer_id";
                          $edit_url   = base_url()."Customers/edit_customer/$value->customer_id";

                          echo "
                            <tr>
                              <td>$count</td>
                              <td>$value->name</td>
                              <td>$value->phone</td>
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

<script type="text/javascript">
    $(document).ready(function(){
        $( "#phone" ).autocomplete({
          source: "<?php echo site_url('customers/get_autocomplete/?');?>"
        });
    });
</script>
