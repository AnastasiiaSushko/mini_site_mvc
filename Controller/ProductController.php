<?php
/**
 * Created by PhpStorm.
 * User: Nastia
 * Date: 21.11.2016
 * Time: 13:52
 */

namespace Controller;


use Lib\Cart;

use Model\ProductModel;

class ProductController extends BaseController
{
    protected $name = 'Products';

    public function all(){
        $products = new ProductModel();
        $this->data['products'] = $products->getAll();
        $this->render('products');
    }

    public function display($id){
        $product = new ProductModel();
        $product = $product->getById($id);
        if(!$product){
            $this->render('noProduct');
            die;
        }
        $this->data['product'] = $product;
        $this->render('product');
    }
    
    public function main(){
        $products = new ProductModel();
        $this->data['products'] = $products->getThree();
        $this->render('main');
    }

    public function addToCart($id)
    {
        if (isset($_SESSION['id'])) {
            $cart = new Cart();
            $cart->addProduct($id);
            header('Location: /1/product/cart');
        }else {
            header('Location:/1/user/registration');
        }
    }

    public function deleteFromCart($id)
    {
        if (isset($_SESSION['id'])) {
            $cart = new Cart();
            $cart->deleteProduct($id);
            header('Location: /1/product/cart');
        }else {
            header('Location:/1/index/index');
        }
    }

    public function cart()
    {
        if (isset($_SESSION['id'])) {

            $cart = new Cart();
            $product = new ProductModel();

            if(!$cart->isEmpty()){
                $products = $cart->getProducts();
                $all_products = $product->getCart($products);

                $this->data['products'] = $all_products;
                $this->render('cart');
            }else{
                $this->data['products'] = array();
                $this->render('cart');
            }

        }else {
            header('Location:/1/index/index');
        }
    }



    public function sort(){
        $products = new ProductModel();
        $this->data['products'] = $products->sort();
        $this->render('products');
    }

}