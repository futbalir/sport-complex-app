<?
namespace Project\Controllers;
use Project\View\View;
class RaspisanieController{
    public $view;
    public function __construct()
    {
        $this->view= new View(__DIR__.'/../../../templates');
    }
    public function renderRaspisanie(){
        $this->view->render('view/timetable.php');
    }
    public function renderContacts(){
        $this->view->render('view/contacts.php');
    }
}