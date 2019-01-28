<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-5">
          <form class="" action="" method="post">

              <div class="form-group">
                <label for="name" class="control-label">الاسم</label>
                <input type="text" class="form-control" id="group_name" name="group_name" value="<?=$phone_group->group_name?>">
              </div>

              <div class="form-group">
                <input type="submit" name="" class="btn btn-success" value="حفظ">
                <input type="reset" name="" class="btn btn-primary" onclick="window.location.href = '<?=base_url()."Customers/show_groups"?>'" value="الغاء">
              </div>

          </form>
        </div>

      </div>

    </div>
</div>
