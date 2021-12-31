<?php
function get_list_price_under_2m($cat_id){
    $result = db_fetch_array("SELECT * FROM `product` WHERE cat_id = $cat_id and status = 1 and `price_new`< 2000000");
    return $result;
}
function get_list_price_2m_to_5m($cat_id){
    $result = db_fetch_array("SELECT * FROM `product` WHERE cat_id = $cat_id and status = 1 and `price_new`>=2000000 and `price_new`<= 5000000");
    return $result;
}
function get_list_price_5m_to_10m($cat_id){
    $result = db_fetch_array("SELECT * FROM `product` WHERE cat_id = $cat_id and status = 1 and `price_new`>= 5000000 and `price_new`<= 10000000");
    return $result;
}
function get_list_price_on_10m($cat_id){
    $result = db_fetch_array("SELECT * FROM `product` WHERE cat_id = $cat_id and status = 1 and `price_new`> 10000000");
    return $result;
}

 
