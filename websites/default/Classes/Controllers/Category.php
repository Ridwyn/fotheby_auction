<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;


class Category {
    private $dbtables;
    
    public function __construct(...$params) {
        $this->dbtables=Helper::db_array_column($params);
    }

    public function view(){

       $jobs;
       $title;
       if (isset($_GET['id'])) {
            $jobs=$this->dbtables['job']->find('categoryId',$_GET['id']);
            $title=$this->dbtables['category']->findByID($_GET['id'])[0]['name'];
       }else{
            $jobs=$this->dbtables['job']->find('location',$_GET['location']);
            $title=$_GET['location'];
       }

       $categories= $this->dbtables['category']->findAll();
       $locations=[];
       foreach ($this->dbtables['job']->findAll() as $key => $job) {
         $locations[$job['location']]=$job['location'];
       };
        return[
            'template'=>'category.html.php',
            'title' => $title,
            'variables'=>['jobs'=>$jobs,'categories'=>$categories,'locations'=>$locations, 'categoryName'=>$title],
        ];
    }

    public function list(){
        $categories=$this->dbtables['category']->findAll();
        return[
            'template'=>'adminCategory.html.php',
            'title' => 'Categories',
            'variables'=>['categories'=>$categories,],
        ];
    }

    
    public function editSubmit(){
        $category = $_POST['category'];
        $this->dbtables['category']->save($category);   
        header('location: /categories/list');
     }
     
     public function editForm(){
        $category=null;
        if (isset($_GET['id'])) {
           $category = $this->dbtables['category']->findByID($_GET['id'])[0];
          
        } else {
           $category = false;
        }
        return [
           'template' => 'categoryForm.html.php',
           'variables' => ['category'=>$category],
           'title' => 'Edit Category'
        ];
          
    }

    public function delete(){
        $this->dbtables['category']->deleteByID($_POST['category']['id']);
        header('location: /categories/list');
    }



}