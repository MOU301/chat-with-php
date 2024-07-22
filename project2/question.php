<?php include 'inc/header.php' ;?>

<?php
session_start();
$n=$_GET['n'];
$conn=new database('localhost','root','','udemy');
echo $n;
$question=$conn->select('questions',$n);
$choice=$conn->selectall('chocies',$n);
$total=$conn->gettotal();

?>
<main>
    <div class="container">
        <h4>Question <?php echo $n ;?> of  <?php echo $total; ?></h4>
        <p class="question"><?php echo $question['text_question'] ;?></p>
         <form action="procesing.php" class="answer" method="post">
              <ul>
                <?php foreach($choice as $choice) :?>
                <li><input type="radio" name="choice" value=<?php echo $choice['id'] ;?>><?php echo $choice['text_choice'];?></li>
                <?php endforeach ;?>
              </ul>
           <input type="submit" name="send" value="send">
         </form>
    </div>
</main>

<?php include 'inc/footer.php'; ?>