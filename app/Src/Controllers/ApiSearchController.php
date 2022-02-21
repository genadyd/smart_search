<?php


namespace App\Controllers;


use App\Models\Model;
use App\Models\SearchModel;

class ApiSearchController implements ApiControllerI
{
    private Model $model;
    public function __construct(){
        $this->model = new SearchModel();
    }
    /**  */
   public function dataProcessor(){
       $data_array = json_decode(file_get_contents("php://input"));
       $search_value =  htmlspecialchars(trim($data_array->searchValue));
       $pattern = '/\s{2,}/';
       $search_value = preg_replace($pattern,' ', $search_value);
       if(!empty($data_array->filter)){
           return $this->model->additional_search($search_value, $data_array->filter);
       }
       return $this->model->search($search_value);
   }
}
