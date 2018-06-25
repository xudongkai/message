<?php 
namespace Controller\Admin;
use Controller\Controller;
use Model\DB;
class Product extends Controller
{
    //产品管理
    public function product_list()
    {
        $this->display('Admin/Product/product_list');
    }
     //产品添加
    public function product_add()
    {
        $this->display('Admin/Product/product_add');
    }
    //分类管理
    public function product_category()
    {
        $this->display('Admin/Product/product_category_add');
    }
    //分类添加
    public function product_category_add()
    {
        $this->display('Admin/Product/product_category_add');
    }
    //品牌管理
    public function product_brand()
    {
        $this->display('Admin/Product/product_brand');
    }
   
}