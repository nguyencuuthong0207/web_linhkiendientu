<?php
get_header()
?>
<?php
//$sql = "SELECT * FROM `page`";
//$result = mysqli_query($conn, $sql);
//$row = array();
//$num_rows = mysqli_num_rows($result);
//if ($num_rows > 0) {
//    $row = $result->fetch_assoc();
//}

//show_array($row);
?>
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?" title="">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php get_sidebar_product_page(); ?> 
        <div class="main-content fl-right">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Liên hệ</h3>
                </div>
                <div class="section-detail">
                    <div class="detail">
                        <p>Website bán phụ kiện máy tính XT Store</p>
                        <p>Địa chỉ: Tp.Hồ Chí Minh</p>
                        <p> <a href="tel:0778627147">Số điện thoại: 0123456789</a> </p>
                        <p> <a href="mailto:nguyencuuthong0207@gmail.com">Email: nguyencuuthong0207@gmail.com</a></p>
                    </div>
                </div>
            </div>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    
                    <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
