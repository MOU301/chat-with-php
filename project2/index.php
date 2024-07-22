<?php include 'inc/header.php' ;?>
<?php 
session_start();
unset($_SESSION['score']);
$conn=new database('localhost','root','','udemy');
$total=$conn->gettotal(); ?>
    <main>
      <div class="container">
        <h2>Test Your php Knowledge</h2>
        <p>This is a multiple choice quizz to Test your Knowledge of php</p>
        <ul>
            <li><strong>Number of Qusetion :</strong><?php echo $total; ?></li>
            <li><strong>Type :</strong>multiple</li>
            <li><strong>Estmated time :</strong><?php echo $total*1; ?> </li>
        </ul>
         <a href="question.php?n=1" class="start">Start Quiz</a>
      </div>
    </main>
<?php include 'inc/footer.php'; ?>