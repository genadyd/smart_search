<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 2/19/22
 * Time: 5:18 PM
 */


namespace App\Controllers;


class SearchFormController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index(...$args)
    {
        ob_start();
        require_once $this->templates_dir.'/search_page.php';
        ob_get_contents();
    }

}
