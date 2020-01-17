<?php 
/**
* Базовый класс для животных
*/
abstract class Animal
{
	// уникальный идентификатор животного
	static $id=0;

	// получения продукта, то есть сколько даёт... 
	public abstract function getProduct();

}

 /**
 * Класс Коровы
 */
class Cow extends Animal
{
	// конструктор для уникального идентификатор	 
	public function __construct()
	{
		$this->id = parent::$id++;
	}
	
	//  молоко 
	public function getProduct()
	{
		return rand(8,10);
	} 
	
} 

/**
 * Класс курицы
 */

class Hen extends Animal
{
 	// конструктор для уникального идентификатор
	public function __construct()
	{
		$this->id = parent::$id++;
	}
	
	//яицо
	public function getProduct()
	{
		return rand(0,1);
	} 
}
// Хлев
class Barn 
{
	//регистрация коров в хлеву
	public function createCow()
	{
		return new Cow;
	}

	//регистрация куриц в хлеву
	public function createHen()
	{
		return new Hen;
	}
} 

// Создание объекта Хлев
$barn = new Barn();

$array = array(); // массив для хранения 

//регистрация кур
for($i=1;$i<=20;$i++){
    $array[]=$barn->createHen();
}

//регистрация коров
for($i=1;$i<=10;$i++){
    $array[]=$barn->createCow();
}
 
// корзина для молоко и яиц 
$milk = 0;
$eggs = 0; 

// процесс собрание продуктов
foreach ($array as $animals){

	 if ($animals instanceOf Cow)
	 {
	 	$milk += $animals->getProduct();
	 }
	 elseif ($animals instanceOf Hen) {
	 	 $eggs += $animals->getProduct();
	 }

}
//результат
echo "eggs =  ".$eggs.'</br>';
echo "milk = ".$milk;

?> 
