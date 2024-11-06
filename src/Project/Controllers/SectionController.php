<?
namespace Project\Controllers;
use Project\View\View;
use Project\Models\Section;
use Project\Models\Footballer;
use Project\Models\Wrestler;
use Project\Models\Fitnes;
use Project\Models\Athlete;
use Project\Models\Tenni;
use Project\Models\Pool;

class SectionController{
    public $view;
    public function __construct()
    {
        $this->view = new View(__DIR__.'/../../../templates');
    }
    public function section(){
        $section = Section::findAll();
        $this->view->render('view/sections.php', ['section'=>$section]);
    //    header("Location: /sections?msg=тутчето ты хочешь сообщить");
    }

    public function add($section){
        if(empty($section)){
            echo "Ошибка: не указана секция";
            return;
        }
        $login = $_POST['login'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        switch($section){
            case "Футбол":
                $action = new Footballer;
                break;
            case "Борьба":
                $action = new Wrestler;
                break;
            case "Фитнес":
                $action = new Fitnes;
                break;
            case "Тренажерный зал":
                $action = new Athlete;
                break;
            case "Бильярд":
                $action = new Pool;
                break;
            case "Теннис":
                $action = new Tenni;
                break;
            default:
                echo "Ошибка: неизвестная секция";
                return;
        }
        $action->setLogin($login);
        $action->setPhone($phone);
        $action->setAge($age);
        $array = $action->getFields();
        $action->getMass($array);
        $action->save2();
        if(!$_SESSION['user']){
            echo('Вам нужно зарегистрироваться');
        }else{
            $message = "Вы успешно записались на секцию:".$section;
        echo "<script>alert('$message'); window.location.replace('/sections');</script>";
        return;    
        }
    }

    public function redsect($id){
        $section = Section::getById($id);
        $this->view->render('view/redsect.php', ['section'=>$section]);
    }

    public function update(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $path = '';
        if(isset($image['name']) && !empty($image['name'])){
            $path = 'public/images/'.$image['name'];
            $save = move_uploaded_file($image['tmp_name'],$path);
            if(!$save){
                echo("Ошибка бабаш");
                return;
            }
        }
        $action = new Section;
        $action->setId($id);
        $action->setName($name);
        $action->setDescription($description);
        if(!empty($path)){
            $action->setImage($path);
        }
        $array = $action->getFields();
        $action->getMass($array);
        $action->save2();
        header("Location:/sections");
    }

    public function delete(){
        $id = $_POST['id'];
        $action = new Section;
        $action->setId($id);
        $action->delete();
        header("Location:/sections");
    }
}