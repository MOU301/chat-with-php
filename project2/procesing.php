<?php include 'database.php';?>
<?php 
session_start();

$conn=new database('localhost','root','','udemy');

if(!isset($_SESSION['score'])){
    $_SESSION['score']=0;
    }

if(isset($_POST['send'])){
    $choice_selcted=$_POST['choice'];

    
    $q1="SELECT * FROM `chocies` WHERE `id`='$choice_selcted'";
    $row=$conn->selectByqery($q1);
    $number_question=$row['0']['num'];
   $q="SELECT * FROM `chocies` WHERE  `num`='$number_question' and `is_corect`='1'";
   $row=$conn->selectByqery($q);
   $choice_corect=$row['0']['id'];
   $total=$conn->gettotal();

   

        if($choice_selcted==$choice_corect){
          $_SESSION['score']=++$_SESSION['score'];
         }

    $nextquestion=++$number_question;
    if($nextquestion>$total){
       header('location:final.php');
       
       }
    else {
       header('location:question.php?n='.$nextquestion);
    
       }
}
?>