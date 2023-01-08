  <?php

function currency_format($number, $suffix = 'đ')
{
    if (! empty($number)) {
        return number_format($number, 0, ',', '.') . "{$suffix}";
    }
}
echo'<div class="row justify-content-center align-items-center g-2">';
foreach ($products as $product) {
    
    echo '<div class="col-3 body-text card p-2  product-item">';
    echo '<a href="productdetail?id=' . $product->ID_PROC . '"';
    echo '	class=" "> <img src="' . $url . 'image/' . $product->img . '"';
    echo '	class="card-img-top img-item " alt="..."></a>';
    echo '<div class="card-body">';
    echo '	<a href="#" class="card-title body-text product-name ">' . $product->NAME_PROC . '</a>';
    echo '	<div class="text-secondary h3">' . currency_format($product->PRICE) . '</div>';
    echo '	<div>';
    echo '	<i class="fa fa-star checked"></i> <i class="fa fa-star checked"></i>';
    echo '		<i class="fa fa-star checked"></i> <i class="fa fa-star checked"></i>';
    echo '		<i class="fa fa-star"></i>';
    echo '	</div>';
    echo '	<div class="d-flex p-2">'; 
    echo '		<a class="btn btn-secondary me-1 btn-hover" href="cart">Mua ngay</a>';
    echo '<button class="btn btn-warning ms-1 btn-hover" onclick="' . 'addProductToCart(' . trim($product->ID_PROC) . ')">Thêm vào <i ';
    echo 'class="fa fa-cart-shopping"></i></button>';
    echo '	</div></div> </div>';
}
if ($check) {
echo '<div class="d-flex justify-content-center align-items-center " id ="changeAmountShow">
    <btn  class="btn btn-light pt-2 mt-4 w-25"
        onclick="moreProduct()">
        Xem thêm 4 sản phẩm <i class="fa-solid fa-arrow-down"></i>
        </a>
        </div>';
}else{
    echo '<div class="d-flex justify-content-center align-items-center"  id ="changeAmountShow">
    <btn class="btn btn-light pt-2 mt-4 w-25"
        onclick="defaulamountshow()">
        Hiển thị ít sản phẩm hơn <i class="fa-solid fa-arrow-up"></i>
        </a>
        </div>';
}
echo '</div>'   ;

?>