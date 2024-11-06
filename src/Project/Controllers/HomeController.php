<?
namespace Project\Controllers;

use Project\View\View;

class HomeController{
    public $view;
    public function __construct()
    {
        $this->view=new View(__DIR__. '/../../../templates');
    }
    public function renderHome(){
        
        $this->view->render('view/home.php'); 
    }
}