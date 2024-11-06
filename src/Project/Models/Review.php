<?
namespace Project\Models;
class Review extends ActiveRecord{
    public $name;
    public $email;
    public $phone;
    public $review;
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail():string
    {
        return $this->email;
    }
    public function getPhone():string
    {
        return $this->phone;
    }
    public function getReview():string
    {
        return $this->review;
    }
    public function setName($a){
        $this->name=$a;
    }
    public function setEmail($b){
        $this->email=$b;
    }
    public function setPhone($c){
        $this->phone=$c;
    }
    public function setReview($d){
        $this->review=$d;
    }
    public static function getFields():array
    {
        return ['id', 'name', 'email', 'phone', 'review'];
    }
}