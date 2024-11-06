<?

namespace Project\Models;

use Project\Models\Article;
use Project\Services\Connect;
use Reflection;
use ReflectionClass;
use ReflectionObject;

abstract class ActiveRecord
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public $data = [];

    public function __set(string $name, $value)
    {
        $cameCaseName = $this->underscoreToCamelCase($name);
        $this->$cameCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function getTableName(): string
    {
        $className = explode('\\', get_called_class());
        $className = end($className);
        $tableName = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $className)) . 's';
        return $tableName;
    }

    public static function findAll(): array
    {
        $db = new Connect();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    public static function getById(int $id): ?self
    {
        $db = new Connect();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    abstract protected static function getFields();

    public function getMass($array)
    {
        //reflection obj
        $reflectionObj = new ReflectionObject($this);
        $data = [];
        foreach ($array as $polya) {
            $property = $reflectionObj->getProperty($polya);
            $property->setAccessible(true);
            $chlen = $property->getValue($this);
            if ($chlen !== null) {
                // Поле не равно NULL, добавляем его в новый массив
                $data[$polya] = $chlen;
            }
        }
        $this->data = $data;
    }
    public function save2()
    {
        if (!empty($this->id)) {
            $this->update();
        } else {
            $this->add();
        }
    }
    public function update()
    {
        $db = new Connect();
        $query = "UPDATE " . static::getTableName() . " SET ";
        $result = array_map(function ($key, $value) {
            return $key . ' = :' . $key;
        }, array_keys($this->data), $this->data);
        $result_string = implode(', ', $result);
        $query .= $result_string . " WHERE id = :id";
        $query = str_replace("id = :id, ", "", $query);
        return $db->query($query, $this->data, static::class);
    }
    public function add()
    {
        $db = new Connect();
        $query = "INSERT INTO " . static::getTableName() . " (";
        $keys = array_keys($this->data);
        $result = implode(', ', $keys);
        $query .= $result . ") VALUES (";
        $result2 = ':' . implode(', :', $keys);
        $query .= $result2 . ")";
        return $db->query($query, $this->data, static::class);
    }
    public function delete()
    {
        $id = $this->id;
        $db = new Connect();
        return $db->query(
            'DELETE FROM `' . static::getTableName() . "` WHERE id = :id",
            [':id' => $id],
            static::class
        );
    }
    public static function getByLogin($login): ?self
    {
        $db = new Connect();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE login=:login;',
            [':login' => $login],
            static::class
        );
        return $entities ? $entities[0] : null;
    }
}
