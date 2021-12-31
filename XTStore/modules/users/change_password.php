<?php
get_header();
?>
<?php 
$list_users = get_list_users_cat($_SESSION['user_login']);
$id =  $list_users['user_id'];
?>
<?php

if (isset($_POST['btn_change_pass'])==true) { 
    $error = array();
    $alert = array();
    // ktra password cũ
   if (empty($_POST['pass_old'])) {
       $error['pass_old'] = "Không được để trống Mật khẩu cũ";
   } else {
       if (!is_password($_POST['pass_old'])) {
           $error['pass_old'] = "Mật khẩu cũ chưa đúng định dạng";
       } else {
           
           $pass_old = md5($_POST['pass_old']);
       }
   }
    // ktra password mới
   if (empty($_POST['pass_new'])) {
       $error['pass_new'] = "Không được để trống Mật khẩu mới";
   } else {
       if (!is_password($_POST['pass_new'])) {
           $error['pass_new'] = "Mật khẩu mới chưa đúng định dạng";
       } else {
           $pass_new = $_POST['pass_new'];
       }
   }
   // ktra password nhap lai
   if (empty($_POST['confirm_pass'])) {
       $error['confirm_pass'] = "Không được để trống Xác nhận mật khẩu";
   } else {
       if (!is_password($_POST['confirm_pass'])) {
           $error['confirm_pass'] = "Xác nhận mật khẩu chưa đúng định dạng";
       } else {
           if($_POST['confirm_pass']==$pass_new) {
             $confirm_pass = md5($_POST['confirm_pass']);
           }
           else {
            $error['confirm_pass'] = "Xác nhận mật khẩu chưa đúng";
           }
          
       }
   }

   if (empty($error)) {
       $sql_change_pass = "select * from users where password ='{$pass_old}' limit 1";
       $result = mysqli_query($conn, $sql_change_pass);
       $num_rows = mysqli_num_rows($result);
       if ($num_rows > 0) {
           $sql = mysqli_query($conn, "update users set password = '$confirm_pass' where user_id ='$id'");
           $_SESSION['success'] = "Cập nhật thành công";
           echo "<script type='text/javascript'>alert('Cập nhật thành công');</script>";
        //    redirect_to("?mod=users&act=info_account");
       } else {
           $error['pass_old'] = "Mật khẩu cũ chưa đúng";
       }
   }
}
?>
<div id="main-content-wp" class="clearfix info-member-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?" title="">Đổi mật khẩu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?mod=users&act=info_account" title="">Thông tin cá nhân</a>
                </li>
               <li>
                    <a href="?mod=users&act=update" title="">Cập nhật thông tin</a>
                </li>
               <li>
                    <a href="?mod=users&act=change_password" title="">Đổi mật khẩu</a>
                </li>
                <li>
                    <a href="?mod=users&act=logout" onclick="return confirmAction_users()" title="">Đăng xuất</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">
            <div class="main-content fl-right">
                <div class="section" id="detail-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">Thay đổi mật khẩu</h3>
                    </div>
                    <div class="section-detail">
                        <form action="" id="form-profile" method="post" accept-charset="utf-8">
                            <label for="pass_old">Mật khẩu cũ</label>
                            <input type="password" name="pass_old" id="pass_old" class="input-passw">
                            <?php 
                            if (!empty($error['pass_old'])) {
                                    ?>
                                    <p class="error"><?php echo $error['pass_old']; ?></p>
                                    <?php
                                } 
                            ?></br>
                            <label for="new-pass">Mật khẩu mới</label>
                            <input type="password" name="pass_new" id="pass_new" class="input-passw">
                            <?php 
                            if (!empty($error['pass_new'])) {
                                ?>
                                <p class="error"><?php echo $error['pass_new']; ?></p>
                                <?php
                            } 
                            ?></br>
                            <label for="confirm_pass">Xác nhận mật khẩu</label>
                            <input type="password" name="confirm_pass" id="confirm_pass" class="input-passw">
                            <?php 
                            if (!empty($error['confirm_pass'])) {
                                ?>
                                <p class="error"><?php echo $error['confirm_pass']; ?></p>
                                <?php
                            } 
                            ?></br>
                            <button type="submit" name="btn_change_pass" id="btn_change_pass" class="btn-capnhat">Cập nhật</button>
                        </form> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
get_footer();
?>