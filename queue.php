<?
class Queue
{
	const MAX_SIZE=100;
	private $front;
	private $rear;
	private $count;
	private $array=array();

	public function __construct()
	{
		$this->front = 0 ;
		$this->rear = self::MAX_SIZE - 1;
		$this->count = 0 ; 
	}

	public function isEmpty()
	{
		return $this->count == 0 ? true : false ;
	}

	public function isFull()
	{
		return $this->count == self::MAX_SIZE ? true : false ;
	}

	public function add($ele)
	{
		if($this->isFull())
			return "Is full already";
		else{
			$this->rear = ($this->rear + 1) % self::MAX_SIZE ;
			$this->array[$this->rear] = $ele ;
			$this->count++; 
		}
	}

	public function delete()
	{
		if($this->isEmpty()){
			return "is empty already" ;
		}else{
			$this->front = ($this->front + 1) % self::MAX_SIZE ;
			$this->count-- ; 
		}
	}

	public function getFrontValue()
	{
		assert(!$this->isEmpty()) ;

		return $this->array[$this->front] ;
	}

	public function getRearValue()
	{
		assert(!$this->isEmpty()) ;
		
		return $this->array[$this->rear] ;
	}

	public function printQueueElements()
	{
		assert(!$this->isEmpty()) ;
		for($i=$this->front; $i != $this->rear; $i=($i+1)%self::MAX_SIZE){
			echo $this->array[$i]." <br>";
		}

		echo $this->array[$this->rear] ;
	}

}

$queueObj = new Queue;
$queueObj->add(10) ;
$queueObj->add(15) ;
$queueObj->add(20) ;
$queueObj->delete() ;
$queueObj->printQueueElements() ;

?>