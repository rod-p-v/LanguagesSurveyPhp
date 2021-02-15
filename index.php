<?php  include 'survey.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Programing language survey</title>
</head>
<body>
    <form action="#" method="POST">

    <?php 
        $survey = new survey();
        $showResults= false;
        if(isset($_POST['language'])){
            $showResults=true;
            $survey->setOptionSelected($_POST['language']);
            $survey->vote();
        }

    ?>
    
    <h2>Which your favorite programing language?</h2>

        <?php 
        
        if ($showResults) {
            $results = $survey->showResults();

            echo'<h2>Total votes '.$survey->getTotalVotes().'</h2>';

            foreach($results as $result){
                $porcentage=$survey->getPorcentageVotes($result['votes']);

                include 'views\viewResults.php';

            }

            include_once 'back.php';

        }else {
            
            include 'views\viewVotes.php';
            
        }

        ?>
    
    </form>

</body>
</html>