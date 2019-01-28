<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

          <!-- <strong>هنا تجد اعدادات الموقع وتحديثها</strong>
          <ul>
            <li> <a href="<?=base_url()?>/Settings/easte_type_show">أنواع العقارات</a> </li>
            <li> <a href="#"> أسماء الأحياء </a> </li>
          </ul> -->

          <a href="<?=base_url()?>settings/neighborhoods" class="box_link">
            <div class="change_password">
                <strong>أسماء الأحياء</strong>
            </div>
          </a>

          <a href="<?=base_url()?>settings/edit_user" class="box_link">
            <div class="change_password">
                <strong>تعديل معلوماتي</strong>
            </div>
          </a>

          <a href="<?=base_url()?>settings/change_password" class="box_link">
            <div class="change_password">
                <strong>تغير كلمة المرور</strong>
            </div>
          </a>

          <?php
            if( get_cookie('permission') == 1 || @$_SESSION['permission'] == 1 ){
          ?>
          <a href="<?=base_url()?>settings/add_user" class="box_link">
            <div class="change_password">
                <strong>اضافة مشرف</strong>
            </div>
          </a>

          <a href="<?=base_url()?>settings/edit_settings" class="box_link">
            <div class="change_password">
                <strong>تعديل اعدادات الموقع</strong>
            </div>
          </a>

          <a href="<?=base_url()?>settings/edit_news_bar" class="box_link">
            <div class="change_password">
                <strong>اعدادات شريط الاخبار</strong>
            </div>
          </a>
          <?php
            }
          ?>

        </div>
      </div>

    </div>
</div>
