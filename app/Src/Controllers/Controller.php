<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/19/22
 * Time: 4:50 PM
 */


namespace App\Controllers;


abstract class Controller
{
   public $templates_dir , $layouts_dir;

   public function __construct(){
       require_once 'config.php';
       /** @var  $public */
       $this->templates_dir = $public['templates_dir'];
       $this->layouts_dir = $public['layouts_dir'];
       $this->components_dir = $public['components_dir'];
       $this->scripts_dir = $public['scripts_dir'];
       $this->styles_dir = $public['styles_dir'];
   }

   abstract function index(...$args);
}
