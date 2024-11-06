<?
namespace Project\Models;
use Project\Models\ActiveRecord;
class Section extends ActiveRecord{
    public $name;
    public $image;
    public $description;
    public function getName():string
    {
        return $this->name;
    }
    public function getImage():string
    {
        return $this->image;
    }
    public function getDescription():string
    {
        return $this->description;
    }
    public function setName($a){
        $this->name=$a;
    }
    public function setImage($b){
        $this->image=$b;
    }
    public function setDescription($c){
        $this->description=$c;
    }
    public static function getFields():array
    {
        return ['id', 'name', 'image', 'description'];
    }
}