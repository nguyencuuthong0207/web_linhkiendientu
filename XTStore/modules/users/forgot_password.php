<?php
get_header();
?> 
<?php
if (isset($_POST['btn_reset'])) {
    $error = array();
    if (empty($_POST['email'])) {
        $error['email'] = "Không được để trống email";
    } else {
        if (!is_email($_POST['email'])) {
            $error['email'] = "Email chưa đúng định dạng";
        } else {
            $email = $_POST['email'];
        }
    }
    // Kết luận
    if (empty($error)) {
        if (check_email($email)) {
                $new_pass = substr(rand(0,999999), 0 , 8); // update pass cho user cần khôi phục mật khẩu
                $password = md5($new_pass);
                $sql = "update users set password = '$password' where email = '$email'";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['success'] = "Cập nhật thành công";
                    sendPasswordChange($email, $new_pass);
                    
                } else {
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
                     
            } else {
            $error['account'] = "Email không tồn tại trong hệ thống ";
        }
    }
}
?>
<?php 
function sendPasswordChange($email, $new_pass){
    require "PHPMailer-master/src/PHPMailer.php"; 
    require "PHPMailer-master/src/SMTP.php"; 
    require 'PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'nguyencuuthong0207@gmail.com'; // SMTP username
        $mail->Password = '1999Kuthong';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('nguyencuuthong0207@gmail.com', 'AMART' ); 
        $mail->addAddress($email); 
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Fogot password';
        $noidungthu = "Mật khẩu mới của bạn là : {$new_pass}"; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        redirect_to("?mod=users&act=login");
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}


?>
<div id="main-content-login" class="login-page">
    <div class="wp-inner clearfix">
        <div class="info fl-left">
            <div class="thumb thumb_login1">
                <img src="https://kenh14cdn.com/thumb_w/660/2020/4/17/photo-9-15870618316201274745969.jpg">
            </div>
        </div>
        <div class="form-reg-wp fl-right">
            <div class="forgot_password">
                <h1 class="post_title">Khôi phục mật khẩu</h1>
                <form id="form-forgot-password" action="" method="post">
                    <input type="text" name="email" value="<?php echo set_value('email') ?>" class="email_forgot_pass" placeholder="Email">
                    <?php echo form_error('email'); ?>
                    <input type="submit" name="btn_reset" id="btn_reset" value="Gửi yêu cầu">
                    <?php
                    if (!empty($error['acount'])) {
                        ?>
                        <p class="error"><?php echo $error['acount']; ?></p>
                        <?php
                    }
                    ?>
                </form>
                <div id="have-account">
                    <a href="?mod=users&act=login" id="lost-pass" title="Đăng Nhập">Đăng Nhập</a>/
                    <a href="?mod=users&act=register" id="lost-pass" title="Đăng ký">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>