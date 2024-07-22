<?php include 'inc/header.php'; 
session_start();
?>

<main>
    <div class="container">
        <h2>Your Done!</h2>
        <p class="n">Congrats! You comlited the test final score : <?php echo $_SESSION['score'];?> </p>
        <a class="start" href="index.php" >Tast Again</a>
    </div>
</main>
<?php include 'inc/footer.php';?>