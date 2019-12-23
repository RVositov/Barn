<?php 

abstract class Animal
{
	public $id;
}
 
class Cow extends Animal
{
	 
	public function __construct($id)
	{
		$this->id = $id;
	}
	
	public function getMilk()
	{
		return rand(8,10);
	} 
	
} 

class Hen extends Animal
{
 	
	public function __construct($id)
	{
		$this->id  = $id;
	}
	
	public function getEggs()
	{
		return rand(0,1);
	}
} 
 
 
class Barn 
{
	private $cowCount;
	private $henCount;
    public $cows; 
	private $hens;
	private $animal=array();
	public $eggsCount;
	public $milkLitres;
	public function __construct($cowCount, $henCount)
	{	
		$this->cowCount = $cowCount;
		$this->henCount = $henCount;	
		$this->cows = array($cowCount);
		$this->hens = array($henCount);
		 
	 }
	 
	public function addAnimal($animal)
	 {
		 $this->animal[] = $animal;
	}
	
	public function collect()
	{
		foreach($this->animal as $animals)
		{
			if ($animals instanceof Cow)
			{
				$this->milkLitres += $animals->getMilk();
			}
			elseif ($animals instanceof Hen)
			{
				$this->eggsCount+= $animals->getEggs(); 
			}
			
		}
	}
	
	 
	public function countAnimals()
	{
		return count($this->animal);
	}
 
}
$barn = new Barn();

for ($i = 1; $i<=20; $i++){
$barn->addAnimal(new Cow($i));
}

for ($i = 1; $i<=10; $i++){
$barn->addAnimal(new Hen($i));
}

$barn->collect();

  echo "animals = ".$barn->countAnimals()."<br>";
  echo "Milk Litres = ".$barn->milkLitres."<br>";
  echo "Eggs count = ".$barn->eggsCount."<br>";
  
  

?>