<?
namespace Project\Models;
class Tenni extends ActiveRecord{
    public $login;
    public $phone;
    public $age;
    public function getLogin(): string
    {
        return $this->login;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getAge(): string
    {
        return $this->age;
    }
    public function setLogin($a)
    {
        $this->login=$a;
    }
    public function setPhone($b)
    {
        $this->phone=$b;
    }
    public function setAge($c)
    {
        $this->age=$c;
    }
    public static function getFields(): array
    {
        return ['id', 'login', 'phone', 'age'];
    }
}