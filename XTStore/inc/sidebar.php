<?php
require 'db/connect.php';
$id = (int) $_GET['id'];
$sql = "SELECT * FROM `category` WHERE `cat_id` = '{$id}'";
$result = mysqli_query($conn, $sql);
$list_cat = array();
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    $row = $result->fetch_assoc();
    $list_cat[] = $row;
}
//show_array($list_cat);
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
<?php
//show_array($price);
?>


<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
           <?php
            if(isset($list_category)){
            ?>
            <ul class="list-item">
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
            <?php
            }
            ?>
        </div>
    </div>
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <form method="POST" action="">
                <?php
                if (isset($list_cat)) {
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <td colspan="2">Giá</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_cat as $item) {
                                ?>
                                <tr>
                                    <td><a href="?mod=product_price&act=product_price_under_2m&id=<?php echo $item['cat_id'] ?>">Dưới 2.000.000đ</a></td>
                                </tr>
                                <tr>
                                    <td><a href="?mod=product_price&act=product_price_2m_to_5m&id=<?php echo $item['cat_id'] ?>">2.000.000đ - 5.000.000đ</a></td>
                                </tr>
                                <tr>
                                    <td><a href="?mod=product_price&act=product_price_5m_to_10m&id=<?php echo $item['cat_id'] ?>">5.000.000đ - 10.000.000đ</a></td>
                                </tr>
                               
                                <tr>
                                    <td><a href="?mod=product_price&act=product_price_on_10m&id=<?php echo $item['cat_id'] ?>">Trên 10.000.000đ</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>

</div>