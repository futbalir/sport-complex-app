<?

namespace Project\Controllers;

use Project\Models\Section;
use Project\View\View;
use Project\Models\User;

class UserController
{
    public $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function user()
    {
        $user = User::findAll();
        $this->view->render('view/login.php', ['user' => $user]);
    }
    public function view(int $id)
    {
        $user = User::getById($id);
        $this->view->render('view/redact.php', ['user' => $user]);
    }

    public function reg()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        if ($password != $confirm) {
            echo ("Пароли не совпали");
        } else {
            $user = new User();
            $user->setLogin($login);
            $user->setPassword($password);
            $user->setStatus(1);
            $user->setPhone($phone);
            $user->setAge($age);
            $allMail = $user->getByLogin($login);
            if (!$allMail) {
                $array = $user->getFields();
                $user->getMass($array);
                $user->save2();
                header("Location:/login");
            } else {
                echo ("Такой уже есть");
            }
        }
    }

    public function auth()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = new User();
        $user->setLogin($login);
        $user->setPassword($password);
        $allMail = $user->getByLogin($login);


        $dbEmail = $allMail->login;
        $dbPass = $allMail->password;

        if ($dbEmail == $login && $dbPass == $password) {
            $dbStatus = $allMail->status;
            session_start();
            $_SESSION['user'] = [
                'id' => $allMail->getId(),
                'login' => $dbEmail,
                'status' => $dbStatus,
                'phone' => $allMail->phone,
                'age' => $allMail->age
            ];
            header("Location:/login");
        } else {
            echo ("Неверный логин или пароль");
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location:/login");
    }

    public function update()
    {
        $id = $_POST['id'];
        $login = $_POST['login'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $action = new User;
        $action->setLogin($login);
        $action->setPhone($phone);
        $action->setAge($age);
        $action->setId($id);
        $array = $action->getFields();
        $action->getMass($array);
        $action->save2();
        header("Location:/login");
    }
    public function delete()
    {
        $id = $_POST['id'];
        $action = new User;
        $action->setId($id);
        $action->delete();
        header("Location:/login");
    }

    public function add()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $path = 'public/images/'.$image['name'];
        $save = move_uploaded_file($image['tmp_name'],$path);
        if(!$save){
            echo("Ошибка емаё");
        }else{
            $action = new Section;
            $action->setName($name);
            $action->setImage($path);
            $action->setDescription($description);
            $array = $action->getFields();
            $action->getMass($array);
            $action->save2();
            header("Location:/login");    
        }
    }
}
