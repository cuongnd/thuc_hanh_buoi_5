<?php
class ProductController extends Controller {
    function save(){
        echo "hello save product";
        die;
    }
    function listing(){
        $this->view('product.list');
    }


}
