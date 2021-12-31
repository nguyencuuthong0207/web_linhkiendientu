<?php
get_header();
?> 

<?php
if (isset($_POST['btn_add'])) {
    $error = array();
    //Ktra mã dm
//    if (empty($_POST['cat_id'])) {
//        $error['cat_id'] = "Bạn chưa nhập Mã danh mục";
//    } else {
//        $cat_id = $_POST['cat_id'];
//    }
//Ktra danh muc sp
    if (empty($_POST['cat_name'])) {
        $error['cat_name'] = "Bạn chưa nhập Tên danh mục";
    } else {
        $cat_name = $_POST['cat_name'];
    }

// Bước 3: Kết luận
    if (empty($error)) {
        if (!check_product_cat_exists($cat_name)) {
            $sql = "INSERT INTO `category` (`cat_name`)"
                    . "VALUES('{$cat_name}')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['success'] = "Thêm mới thành công";
                redirect_to("?mod=product_cat&act=main");
            } else {
                $_SESSION['error'] = "Thêm mới thất bại";
            }
        } else {
            $_SESSION['error'] = "Tên danh mục sản phẩm đã tồn tại";
        }
    }
}
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục sản phẩm</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']) ?>
                </div>
            <?php endif; ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <!--                        <label for="cat_id">Mã danh mục</label>
                                                <input type="text" name="cat_id" id="cat_id" >-->

                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" >
                        <?php
                        if (!empty($error['cat_name'])) {
                            ?>
                            <p class="error"><?php echo $error['cat_name']; ?></p>
                            <?php
                        }
                        ?>
                        <button type="submit" name="btn_add" id="btn_add">Thêm mới</button>
                        <?php echo form_error('account'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>