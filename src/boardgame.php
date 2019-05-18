<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body 
            {
                font-family: Verdana, sans-serif;
                color: #545659;
            }
            h2.exer_heading 
            {
                margin-left: 20px;
            }
            td 
            {
                height: 50px;
                width: 50px;
                border: 1px solid black;
            }
        </style>
    </head>
<body>
    <?php
        require_once 'C:\wamp64\www\test\control.php';
        const ROWCOL = 4;
        $board = new boardGame(ROWCOL, ROWCOL);
        $prime = new getPrimeNumber();

        $board->createBoardInfo();
    ?>
    <h2 class="exer_heading">BOARDGAME EXERCISE</h2>
    <div style="margin: 20px;">
        <table>
    <?php
    $arrRowCol = $board->getRowColumn();
        for ($r=0; $r < ROWCOL; $r++) 
        {
            echo "<tr>";
            for ($c=0; $c < ROWCOL; $c++) 
            {
                echo "<td style='background-color:".$arrRowCol[$r][$c]."'></td>";
            }
            echo "</tr>";
        }
        
        
    ?>
        </table>
    </div>
    <div style="margin: 20px;">
        <?php
            $blue = $yellow = $red = 0;
            
            $board->colorCounter(0,0,$blue,$yellow,$red);
            echo "B {$blue} , Y {$yellow} , R {$red}";
        ?>
    </div>

    <h2 class="exer_heading">PRIME NUMBER EXERCISE</h2>
    <div style="margin: 20px; border: 1px solid #eee; padding: 10px; width: 400px;">
    The first 15 prime numbers are:
    <?php
        $prime->primeNumbers();
    ?>
    </div>
    
    <form method="post" style="margin: 20px 20px 5px 20px; border: 1px solid #eee; padding: 10px; width: 400px;">  
        Enter a Number: <input type="text" name="input"> <input type="submit" name="submit" value="Submit">  
    </form>  
    <div style="margin: 0 20px; border: 1px solid #eee; padding: 10px; width: 400px;">
        Answer:
    <?php
        $prime->calcPrimeNumber();
    ?>
    </div>
    
    <!-- <form method="post" action="<?php //echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="fname" value="">
    <input type="submit">
    </form> -->

    <?php

        /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $_REQUEST['fname'];
            if (empty($fname)) {
                echo "Name is empty";
            } else {
                echo $fname;
            }
        }*/
    ?>

</body>
</html>