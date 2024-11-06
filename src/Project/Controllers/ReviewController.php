<?
namespace Project\Controllers;
use Project\View\View;
use Project\Models\Review;
class ReviewController{
    public $view;
    public function __construct()
    {
        $this->view = new View(__DIR__.'/../../../templates');
    }
    public function renderReview(){
        
        $this->view->render('view/feedback.php'); 
    }
    public function add()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $review = $_POST['review'];
        $action = new Review;
        $action->setName($name);
        $action->setEmail($email);
        $action->setPhone($phone);
        $action->setReview($review);
        $array = $action->getFields();
        $action->getMass($array);
        $action->save2();
        header("Location:/feedback");
    }
}