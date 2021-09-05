<?php 

class Product{

//アクセス修飾子, private(外からアクセスできない), protected(自分・継承), public(公開)

//変数

private $product = [];

//関数

//初回に呼ばれる
function __construct($product){
  $this->product = $product;
}

public function getProduct(){
  echo $this->product;
}

public function addProduct($item){
  $this->product .= $item;
}

public static function getStaticProduct($str){
  echo $str;
}
}

$instance = new Product('テスト');

var_dump($instance);

$instance->getProduct();
echo '<br>';

$instance->addProduct('追加分');

$instance->getProduct();

//静的(static) クラス名::関数名
Product::getStaticProduct('静的');
echo '<br>';


