<?php


namespace Model;


class ProductModel extends BaseModel
{
    protected $name = 'products';


    public function getById($id)
    {
        $id = (int)$id;
        $result =  $this->db->query("Select * from products where id = {$id}");
        if(!$result){
            return array();
        }
        return $result[0];
    }

    public function getThree()
        
    {
        $row_count = $this->db->query('SELECT COUNT(*) FROM products');
        $row_count = $row_count[0];
        $row_count = $row_count['COUNT(*)'] -1 ;

        $query = array();
        while (count($query) < 3) {
            $query[] = '(SELECT * FROM products LIMIT '.rand(0, $row_count).', 1)';
        }
        $query = implode(' UNION ', $query);

        //print_r($query);
       return $this->db->query($query);
        
        //return $result =  $this->db->query("Select * from products ORDER BY RAND() LIMIT  3");
    }

    public function getCart($id=array()){
        
        $id = implode(',',$id);
        $products = $this->db->query("Select * from products where id IN ({$id} )");
        return $products;
    }

    public function sort(){
        $result =  $this->db->query("Select * from products ORDER BY price");
        if(!$result){
            return array();
        }
        return $result;
    }
}