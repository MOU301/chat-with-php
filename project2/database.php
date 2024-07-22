<?php 
class database{
    private $conn;
    public function __construct($host,$user,$pass,$dbname){
        try{
        $this->conn=new mysqli($host,$user,$pass,$dbname);
        }catch(ErrorException $e){
          echo 'there is erorr in conction with databse '.mysqli_connect_error($e);
        }   
    }
//get to connction with database
    public function getconn(){
        return $this->conn;
    }

    //get count the  question in the database
    public function gettotal(){
        $conn=$this->getconn();
        $q="SELECT * FROM `questions`";
        $result=mysqli_query($conn,$q);
        return mysqli_num_rows($result);
    }
   

//select data from teble in databse one row 
    public function select($table,$id){
        $this->getconn();
        $q="SELECT * FROM `$table` WHERE `num`='$id'";
        $result=mysqli_query($this->getconn(),$q);
        if($result){
            $row=[];
            if(mysqli_num_rows($result)>0){
            
            $row[]=mysqli_fetch_assoc($result);
            return $row[0];
            }else{
                echo 'there is not questions in database';
            }
        }else{
            echo "error in the sected the date from database ";
        }

    }
    //select data from teble in database multi row
    public function selectall($table,$id){
        $this->getconn();
        $q="SELECT * FROM `$table` WHERE `num`='$id'";
        $result=mysqli_query($this->getconn(),$q);
        if($result){
            $rows=[];
            if(mysqli_num_rows($result)>0){
               while($row=mysqli_fetch_assoc($result)){
                $rows[]=$row;
               }
            
            
            }else{
                echo 'there is not questions in database';
            }
        }else{
            echo "error in the sected the date from database ";
        }
        return $rows;

    }
//insest data to database to table from 3 colum
public function insertch($table,$value1,$value2,$value3){
    $conn=$this->getconn();
    $q="INSERT INTO `$table` (`num`, `is_corect`, `text_choice`) VALUES ( '$value1', '$value2', '$value3')";
    $result=mysqli_query($conn,$q);
    if($result){
        return true;
    }
    else{
        return false ;
    }
  }

  public function insertq($table,$val1,$val2){
    $conn=$this->getconn();
   $q="INSERT INTO `$table` ( `num`,`text_question`) VALUES ('$val1','$val2')";
    $result=mysqli_query($conn,$q);
    if($result){
        return true;
    }
    else{
        return false ;
    }
  }


  public function selectByqery($q){
    $conn=$this->getconn();
    $result=mysqli_query($conn,$q);
    if($result){
        $rows=[];
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $rows[]=$row;
            }
        }
        return $rows;
    }

  }

}







?>