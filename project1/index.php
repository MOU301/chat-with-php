<?php 
//to adding for the prokects ajax and adding users in the projects after of udemy course
?>




<?php include 'database.php' ;?>
<?php
$conv=new datadase('localhost','root','','udemy');
$message=$conv->select();

if(isset($_POST['send'])){
    $name=filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
    $messages=filter_input(INPUT_POST,'message',FILTER_SANITIZE_STRING);
   date_default_timezone_get();
   $time=date('h:i:s a',time());
   //valdiate
   if(!empty($name) || !empty($messages)){
  //   send to the datebase

        $q="INSERT INTO `conversation` ( `name`, `message`, `time_create_at`) VALUES ('$name', '$messages', '$time')"; 
        if($conv->insert($q)){
          
         header('location:index.php');
        }
        else{
            $error='error in connection with database';
            
        }
   } 
   else{
    $error='fill the field please';

   }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="shoutit">
        <header>
            <h1>shoutit</h1>
        </header>
        <div class="shouts">
          
            <ul>
                <?php foreach($message as $m):?>
                    <li class="shout"><span><?php echo $m['time_create_at'];?> - </span><strong><?php echo $m['name'] ;?>  :  </strong><?php echo $m['message'];?> </li> 
                 <?php endforeach;?>   
                
            </ul>

            </div>
               
            <form class="send" action="index.php" method="post">
               <div class="error"><?php echo $error ?? '';?></div> 
                <input type="text"  name="name" placeholder="your name">
                <textarea  name="message" placeholder="your message"></textarea>
                <div><input type="submit" name="send" value="send"></div>
            </form>
       
    </div>
</body>
</html>