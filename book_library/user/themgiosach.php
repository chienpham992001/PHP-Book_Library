<?php
session_start();
include("config.php");
//Cộng số lượng
if (isset($_GET['cong_sl'])) {
    $id = $_GET['cong_sl'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);

            $_SESSION['cart'] = $product;
        } else {
            $tangsl =  $cart_item['soluong'] + 1;
            if ($cart_item['soluong'] < 5) {
                $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' => $tangsl,'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);
            }
            else{
                $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' =>  $cart_item['soluong'],'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

//Trừ số lượng
if (isset($_GET['tru_sl'])) {
    $id = $_GET['tru_sl'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);

            $_SESSION['cart'] = $product;
        } else {
            $tangsl =  $cart_item['soluong'] -1;
            if ($cart_item['soluong'] > 1) {
                $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' => $tangsl,'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);
            }
            else{
                $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' =>  $cart_item['soluong'],'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

//xoa sach
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    foreach ($_SESSION['cart'] as $cart_item) {
        //ktra id trong session trùng với id được get ra k, in lại session ngoại trừ session có id trên
        if ($cart_item['id'] != $id) {
            $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);
        }
        $_SESSION['cart'] = $product;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

//xoa tat ca sach
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

//them
if (isset($_POST['themgiosach'])) {
    //session_destroy();
    $id = $_GET['sach_id'];
    $soluong = 1;
    $sql = "SELECT book_name,book_id,book.image,cost FROM book WHERE book_id = '" . $id . "' LIMIT 1";
    $querry = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($querry);
    if ($row) {
        $new_product =  array(array('book_name' => $row['book_name'], 'image' => $row['image'], 'id' => $id, 'soluong' => $soluong,'cost' => $row['cost'], 'book_id' => $row['book_id']));
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //Nếu dữ liệu trùng
                if ($cart_item['id'] == $id) {

                    $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' => $soluong,'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);
                    $found = true;
                }
                //Nếu dữ liệu không trùng
                else {
                    $product[] =  array('book_name' => $cart_item['book_name'], 'image' => $cart_item['image'], 'id' => $cart_item['id'], 'soluong' => $soluong,'cost' => $cart_item['cost'], 'book_id' => $cart_item['book_id']);
                }
            }
            //Liên kết dữ new_product với product
            if ($found == false) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    // header('Location:giosach.php');
    //ở lại trang hiện tại khi thêm sách vào giỏ
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
