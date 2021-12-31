<?php
require 'db/connect.php';
?>
<?php
$sql = "SELECT * FROM `category` where status = 1";
$result = mysqli_query($conn, $sql);
$list_category = array();
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_category[] = $row;
    }
}
//show_array($list_category);
?>
<div id="footer-wp">
    <div id="foot-body" class="foot-body-container">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title"><img src="public/images/logo-main.png" alt=""></h3>
                <p class="desc">XT Store luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="public/images/img-foot.png" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">Thông tin cửa hàng</h3>
                <ul class="list-item">
                    <li>
                        <p>TP.HCM</p>
                    </li>
                    <li>
                        <p>0123456789</p>
                    </li>
                    <li>
                        <p>nguyencuuthong0207@gmail.com</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">Chính sách mua hàng</h3>
                <ul class="list-item">
                    <li>
                        <a href="" title="">Quy định - chính sách</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách bảo hành - đổi trả</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách hội viện</a>
                    </li>
                    <li>
                        <a href="" title="">Giao hàng - lắp đặt</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">Bảng tin</h3>
                <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                <div id="form-reg">
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">© Sinh Viên | Trường Đại Học Giao Thông Vận Tải TP.HCM</p>
        </div>
    </div>
</div>
</div>
<div id="menu-respon">
    <a href="?page=home" title="" class="logo">
        <img src="public/images/logo-main.png" alt="">
    </a>
    <div id="menu-respon-wp">
        <div id="main-menu-wp">
            <ul class="" id="main-menu-respon">
                <li>
                    <a href="?" title="">Trang chủ</a>
                </li>
                <li>
                    <a  href="#" title="">Danh mục sản phẩm</a>
                    <ul class="sub-menu">
                    <?php
                foreach($list_category as $category){
                ?>
                <li>
                    <a href="?mod=product&act=category_product&id=<?php echo $category['cat_id'] ?>" title=""><?php echo $category['cat_name'] ?></a>
                </li>
                <?php
                }
                ?>
                    </ul>
                </li>
               
                <li>
                    <a href="?mod=page&act=main" title="">Giới thiệu</a>
                </li>
                <li>
                    <a href="?mod=post&act=blog" title="">Blog</a>
                </li>
                <li>
                    <a href="?mod=page&act=contact" title="">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="btn-top"><img src="public/images/icon-to-top.png" alt=""/></div>
<div id="fb-root"></div>

</body>
</html>