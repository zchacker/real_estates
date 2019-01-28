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

  <div class="col-md-4">
    <h2>أضافة عقار</h2>
    <br>
    <br>
    <br>
    <form class="" action="" method="post">
      <table>
        <tr>
          <td> <label for="name" style="font-size:18px;">الاسم : </label> </td>
          <td> <input type="text" class="form-control" id="name" name="name" value="" autocomplete="off"> </td>
        </tr>

        <tr>
          <td></td>
          <td>
            <input type="submit" name="" class="btn btn-success" value="أضف">
            <input type="reset" name="" class="btn btn-primary" onclick="window.location.href = '<?=base_url()."Settings/easte_type_show"?>'" value="إلغاء">
          </td>
        </tr>

      </table>
    </form>
  </div>



</div>
