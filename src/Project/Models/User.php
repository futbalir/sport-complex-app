<?
namespace Project\Models;
use Project\Models\ActiveRecord;

class User extends ActiveRecord
{
    /** @var string */
    public $login;
    /** @var string */
    public $password;
    /** @var string */
    public $status;
    public $phone;
    public $age;
    /**
    * @return string
    */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
    * @return string
    */
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function getPhone():string
    {
        return $this->phone;
    }
    public function getAge(): string
    {
        return $this->age;
    }
    public function setLogin($a)
    {
        $this->login = $a;
    }

    public function setPassword($b)
    {
        $this->password = $b;
    }

    public function setStatus($d)
    {
        $this->status = $d;
    }
    public function setPhone($e)
    {
        $this->phone = $e;
    }
    public function setAge($f)
    {
        $this->age = $f;
    }
    public static function getFields(): array
    {
        return ['id', 'login', 'password', 'status', 'phone', 'age'];
    }
}