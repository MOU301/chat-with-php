<?php include 'inc/header.php' ;?>
<?php
$conn=new database('localhost','root','','udemy');
$total=$conn->gettotal();
$nextnumber=$total+1;
  if(isset($_POST['register'])){
    $question_number=filter_input(INPUT_POST,'question_number',FILTER_SANITIZE_NUMBER_INT);
    $corect_choice=filter_input(INPUT_POST,'corect_choice',FILTER_SANITIZE_NUMBER_INT);
    $text_question=filter_input(INPUT_POST,'text_question',FILTER_SANITIZE_STRING);
    $choices=[];
    $choices[1]=filter_input(INPUT_POST,'choice1',FILTER_SANITIZE_STRING);
    $choices[2]=filter_input(INPUT_POST,'choice2',FILTER_SANITIZE_STRING);
    $choices[3]=filter_input(INPUT_POST,'choice3',FILTER_SANITIZE_STRING);
    $choices[4]=filter_input(INPUT_POST,'choice4',FILTER_SANITIZE_STRING);

if(!empty($question_number) && !empty($corect_choice) && !empty($text_question)){
     if($conn->insertq('questions',$question_number,$text_question)){ 
            foreach($choices as $choice=>$value){
                 if($value!='') {
                    if($corect_choice==$choice){
                        $is_corect=1;
                        }   
                        else{
                        $is_corect=0;
                        }
                        if($conn->insertch('chocies',$question_number,$is_corect,$value)){
                        continue ;
                        } 
                        else{
                        echo 'Erorr Erorr Erorr ';
                        }
                 }   
            }
        }
       $success='register the question ok ';
       header("Refresh:1; url=add.php");
    }
 else{
        $error='Fill all the field please !!';
     }

    
}
?>
 <main >
    <div class="container">
    <h2 class=<?php echo isset($success) ? "success":"" ;?>><?php echo $success ?? null ;?></h2>
        <h2 class=<?php echo isset($error) ? "error":"" ;?>><?php echo $error ?? null ;?></h2>
        <h1> add a question</h1>
        <form class="add" action="add.php" method="post">
            <p>
                <label>question number : </label>
                <input type="number" value=<?php echo $nextnumber; ?> name='question_number'>
            </p>
            <p>
                <label style="color:red;" >Text question  :</label>
                <input type="text" name="text_question">
            </p>
            <p>
                <label>choice #1 : </label>
                <input type="text" name='choice1'>
            </p>
            <p>
                <label>choice #2 : </label>
                <input type="text" name='choice2'>
            </p>
            <p>
                <label>choice #3 : </label>
                <input type="text" name='choice3'>
            </p>
            <p>
                <label>choice #4 : </label>
                <input type="text" name='choice4'>
            </p>
            <p>
                <label >corect choice number :</label>
                <input type="number" name="corect_choice">

            </p>
            <input class="start" type="submit" name="register" value="send">
        </form>

    </div>
 </main>
<?php include 'inc/footer.php' ; ?>