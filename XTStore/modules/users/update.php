<?php
get_header();
?>
<?php 
$list_users = get_list_users_cat($_SESSION['user_login']);
$id =  $list_users['user_id'];
//show_array($list_users);
?>

<?php
if (isset($_POST['btn_update'])) {
    $error = array(); // Bước 1: Phất cờ
    $alert = array(); // mảng dùng để thông báo
    // Kiểm tra fullname
    if (empty($_POST['fullname'])) {
        $error['fullname'] = "Không được để trống fullname";
    } else {
        $fullname = $_POST['fullname'];
    }

    // Kiểm tra giới tính
    if (empty($_POST['gender'])) {
        $error['gender'] = "Bạn cần chọn giới tính";
    } else {
        $gender = $_POST['gender'];
    }
    // Kiểm tra email
    if (empty($_POST['email'])) {
        $error['email'] = "Không được để trống Email";
    } else {
        if (!is_email($_POST['email'])) {
            $error['email'] = "Email không đúng định dạng";
        } else { // khớp định dạng
            $email = $_POST['email'];
        }
    }

    // Kiểm tra phone
    if (empty($_POST['phone'])) {
        $error['phone'] = "Không được để trống Số điện thoại";
    } else {
        if (!is_phone_number($_POST['phone'])) {
            $error['phone'] = "Số điện thoại k đúng định dạng";
        } else {
            $phone = $_POST['phone'];
        }
    }

    // Kiểm tra address
    if (empty($_POST['address'])) {
        $error['address'] = "Không được để trống Địa chỉ";
    } else {
        $address = $_POST['address'];
    }
    if (!empty($_POST['status'])) {
        $status = $_POST['status'];
    }

    // Bước 3: Kết luận
    if (empty($error)) {
       
        $sql = "update users set fullname='$fullname', gender ='$gender', email ='$email', phone ='$phone', address ='$address' where user_id='$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Cập nhật thành công";
            redirect_to("?mod=users&act=info_account");
        } else {
            $_SESSION['error'] = "Cập nhật thất bại";
        }
    }
}
?>


<?php
if (!empty($alert['success'])) {
    ?>
    <p class="success"><?php echo $alert['success']; ?></p>
    <?php
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
                        <a href="?" title="">Thông tin cá nhân</a>
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
                        <h3 class="section-title">Cập nhật thông tin</h3>
                    </div>


                    <div class="clearfix"></div>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error'])
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="section" id="detail-page">
                        <div class="section-detail">
                        <form id="form-upload-user"  action=""  method="post">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" name="fullname" value="<?php if (!empty($list_users['fullname'])) echo $list_users['fullname']; ?>" id="username" ></br>
                                <?php
                                if (!empty($error['fullname'])) {
                                    ?>
                                    <p class="error"><?php echo $error['fullname']; ?></p>
                                    <?php
                                }
                                ?>
                                <label for="email">Email</label>
                                <input type="text" name="email" value="<?php if (!empty($list_users['email'])) echo $list_users['email']; ?>" id="email" ></br>
                                <?php
                                if (!empty($error['email'])) {
                                    ?>
                                    <p class="error"><?php echo $error['email']; ?></p>
                                    <?php
                                }
                                ?>
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" value="<?php if (!empty($list_users['phone'])) echo $list_users['phone']; ?>" id="phone" ></br>
                                <?php
                                if (!empty($error['phone'])) {
                                    ?>
                                    <p class="error"><?php echo $error['phone']; ?></p>
                                    <?php
                                }
                                ?>


                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" value="<?php if (!empty($list_users['address'])) echo $list_users['address']; ?>" id="address" ></br>
                                <?php
                                if (!empty($error['address'])) {
                                    ?>
                                    <p class="error"><?php echo $error['address']; ?></p>
                                    <?php
                                }
                                ?>
                                <label for="gender">Giới tính</label>
                                <select name="gender" class="gender-seclect">
                                    <option value="">--Chọn giới tính--</option>
                                    <option <?php if (isset($list_users['gender']) && $list_users['gender'] == 'male') echo "selected='selected'"; ?> value="male">Nam</option>
                                    <option <?php if (isset($list_users['gender']) && $list_users['gender'] == 'female') echo "selected='selected'"; ?> value="female">Nữ</option>
                                </select></br>
                                <?php
                                if (!empty($error['gender'])) {
                                    ?>
                                    <p class="error"><?php echo $error['gender']; ?></p>
                                    <?php
                                }
                                ?>
                                
                                <button type="submit" name="btn_update" id="btn_update" class="btn-capnhat">Cập nhật</button>
                            </form>
                        </div>
                    </div>


                    
                </div>
            </div>

        </div>
    </div>
</div>

<?php
get_footer();
?>