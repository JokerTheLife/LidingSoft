<?php
/**
* Второй файл примера правильного документирования
*
* @author Арбузов Владислав Евгеньевич <vladarbuzov080@gmail.com>
* @version 1.0
* @package files
*/

/**
* Класс с данными
*
* Имитирует таблицу в базе данных для тестирования кода 
*
* @package files
*/
class Table{
/**
* Массив имитирующий структуру таблицы в базе данных
* @access private
* @var array
*/
	private $arr = array(	1 => array(	'status' => 4,
										'name' => "Bob"),
							2 => array(	'status' => 2,
										'name' => "Jon")
						);
	/**
	* Получение значения
	* @param integer $id Значение для получения необходимой строчки в $arr
	* @return array
	*/
    public function __get(int $id){
    	return 
    		[
    			'status'=>$this->arr[$id]['status'],
    			'name'=>$this->arr[$id]['name']
    		];
    	}

    }
/**
* Основной класс
*
* Основной класс с индефикатором final. Класс не возможно наследовать
*
* @package files
* @final
*/
final class Item
{
	/**
	* Идентификатор пользователя
	*
	* @param integer 
	* @access private
	*/
    private $id = 0;
	/**
	* Статус
	*
	* @param integer 
	* @access private
	*/
	private $status = 0;
	/**
	* Имя
	*
	* @param string 
	* @access private
	*/
	private $name = "";
	/**
	* @param bool 
	* @access private
	*/
	private $changed = false;
	/**
	* Поле для хранения объекта класса
	*
	* @param array 
	* @access private
	* @static
	*/
    private static $instances = [];
 
    /**
     * Коструктор класса
     * 
     *
     * @param integer $id Идентификатор пользователя
     * @return void
     */

    protected function __construct(?int $id = 0){
		$this->id = $id;
		$this->init();
	}

	/**
	* Установка значения
	* @param integer $name Значение для установки поля для присвоения данных
	* @param var $value Присваиваемое значение
	* @uses Test::$name Для размещения данных
	* @return void
	*/
	public function __set(string $name, $value = null){
    	if (isset($this->$name) && $this->$name != "id"){
    		if (gettype($this->$name) == gettype($value)){
    		$this->$name = $value;
    		}
    	}
    }
    
    /**
	* Cтатический метод, управляющий доступом к экземпляру одиночки
	*
	* @param integer $id 
	* @access public
	* @static
	* @return array
	*/
    public static function getInstance(?int $id = 0): Item
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static($id);
        }
        return self::$instances[$cls];
    }

    /**
	* Метод сохранения данных в базу данных
	*
	* @uses Test::$name Для передачи данных, которые необходимо изменить
	* @uses Test::$value Для передачи данных, которые необходимо изменить
	* @uses Test::$id Для выбора изменяемого поля
	* @access public
	* @return void
	*/
    public function save(){
    	/*$result = mysql_query(Update objects set name = '.$this->value.', status = '.$this->status.' WHERE id = '.$this->id);
		if (!$result) {
    		die('Неверный запрос: ' . mysql_error());
		}*/
    }

    /**
	* Метод получения данных
	*
	* @access private
	* @return void
	*/
    private function init()
    {
    	$table = new Table();
    	$arr = $table->__get($this->id);
    	if($table != null && $arr != null){
        	$this->status = $arr['status'];
        	$this->name = $arr['name'];
    	}
    }
}
?>
