<div class="row">
  <div class="col-md-4">
  </div>

  <div class="col-md-5">
    <form class="" action="" method="post">
      <table>
        <tbody>

          <tr>
            <td> <label for="name" class="control-label">الاسم</label> </td>
            <td> <input type="text" class="form-control" id="name" name="name" value="<?=$easte_type->name?>"> </td>
          </tr>

          <tr>
            <td> </td>
            <td>
                <input type="submit" name="" class="btn btn-success" value="حفظ">
                <input type="reset" name="" class="btn btn-primary" onclick="window.location.href = '<?=base_url()."Settings/easte_type_show"?>'" value="الغاء">
             </td>
          </tr>

        </tbody>
      </table>
    </form>
  </div>

</div>
