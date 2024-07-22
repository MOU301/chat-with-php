


<?php
class datadase{
    private $host;
    private $dbname;
    private $user;
    private $pass;
    private $conn;


    public function __construct($host,$user,$pass,$dbname)
    {
      $this->host=$host;
      $this->user=$user;
      $this->pass=$pass;
      $this->dbname=$dbname; 
      try{
       return $this->conn=new mysqli($this->host,$this->user,$this->pass,$this->dbname);
   
      } 
      catch(ErrorException $e){
        echo 'there is error in '.mysqli_connect_error($e);
      }
    }
   public function getConn(){
    return $this->conn;
   } 

  public function select(){
      $conn=$this->getConn();
      $q="SELECT * FROM `conversation`";
      $result=mysqli_query($conn,$q);
      
      if(mysqli_num_rows($result)>0){
        $rows=[];
          while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row; 
          }
          
      }
      return $rows;

  }
  public function insert($q){
    $conn=$this->getConn();
    $result=mysqli_query($conn,$q);
    if($result){
      return true;
    }
    else{
      return false;
    }
  }


}


?>