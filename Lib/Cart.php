<?php

namespace Lib;

class Cart
{
    private $products;

    function __construct()
    {
        $this->products = Cookie::get('products') == null ?
            array()
            :
            unserialize(Cookie::get('products'));
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function addProduct($id)
    {
        $id = (int)$id;

        if (!in_array($id, $this->products)) {
            array_push($this->products, $id);
        }

        Cookie::set('products', serialize($this->products));
    }

    public function deleteProduct($id)
    {
        $id = (int)$id;

        $key = array_search($id, $this->products);
        if ($key !== false) {
            unset($this->products[$key]);
        }

        Cookie::set('products', serialize($this->products));
    }

    public function clear()
    {
        Cookie::delete('products');
    }

    //Также добавим метод, который проверяет, пуста ли корзина.
//Для этого необходимо применить оператор отрицания к массиву продуктов, что автоматически приведет его к логическому типу данных:

    public function isEmpty()
    {
        return !$this->products;
    }

}