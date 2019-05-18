<?php   
    class boardGame 
    {
        private $arrRowCol = array();
        private $arrColor = array("blue","yellow","red"); 

        private $intCol = 0;
        private $intRow = 0;


        function __construct($row, $col)
        {
            $this->intRow = $row;
            $this->intCol = $col;
        }

        public function createBoardInfo() 
        {
            for ($r=0 ; $r < $this->intRow ; $r++) 
            {
                for ($c=0 ; $c < $this->intCol ; $c++) 
                {
                    $this->arrRowCol[$r][$c] = $this->arrColor[array_rand($this->arrColor, 1)];
                }
            }
        }

        public function getRowColumn()
        {
            
            return $this->arrRowCol;
        }

        public function checkColor()
        {
            $blue = $yellow = $red = 0; 
            $r=0; $c=0;
            $arrNewStored = array();
            $Condition = (($this->arrRowCol[$r][$c]) && (($this->arrRowCol[$r][$c+1]) || ($this->arrRowCol[$r][$c-1]) || ($this->arrRowCol[$r-1][$c])));

            for ( ; $r < $this->intRow ; $r++)
            {
                for ( ; $c < $this->intRow ; $c++)
                {
                    if ($Condition == "blue") {
                        $blue++;
                        //store in a new array
                    }

                    if ($Condition == "yellow") {
                        $yellow++;
                    }
                    
                    if ($Condition == "red") {
                        $red++;
                    }
                }

                
            }
        }

        public function chooseColor()
        {
            
            $Color0 = $this->arrRowCol[0][0];
            $Color1 = '';

            for ($r = 0 ; $r < $this->intRow ; $r++)
            {
                for ($c = 0 ; $c < $this->intCol ; $c++)
                {
                    if (($this->arrRowCol[$r][$c] != $Color0) && ($Color1 == '')) {
                        $Color1 = $this->arrRowCol[$r][$c];
                    } elseif (($this->arrRowCol[$r][$c] != $Color1) && ($this->arrRowCol[$r][$c] != $Color0)) {
                        $Color2 = $this->arrRowCol[$r][$c];
                        break 2;
                    }
                }
            }

            echo "$Color0 // $Color1 // $Color2";
            $blue = $yellow = $red = 0;
            $retVal = $this->countColors($Color1,0,0,$blue,$yellow,$red);

        }

        public function colorCounter($y,$x,&$blue,&$yellow,&$red)
        {
            $refColor   = $this->arrRowCol[$y][$x];            
            $this->arrRowCol[$y][$x] = "white";

            if ($refColor == "blue")
                $blue++;
            if ($refColor == "yellow")
                $yellow++;
            if ($refColor == "red")
                $red++;            
            
            if ((($x + 1) < 6) && ($refColor == $this->arrRowCol[$y][$x + 1])) { // right
                $this->colorCounter($y,$x + 1,$blue,$yellow,$red);
            } elseif ((($y + 1) < 6) && ($refColor == $this->arrRowCol[$y + 1][$x] )) { // down
                $this->colorCounter($y + 1,$x,$blue,$yellow,$red);
            } elseif ((($x - 1) >= 0) && ($refColor == $this->arrRowCol[$y][$x - 1])) { // left
                $this->colorCounter($y,$x - 1,$blue,$yellow,$red);
            } elseif ((($y - 1) >= 0) && ($refColor == $this->arrRowCol[$y - 1][$x])) { // up
                $this->colorCounter($y - 1,$x,$blue,$yellow,$red);
            }

            $this->arrRowCol[$y][$x] = $refColor;

        }

        public function calcColors() 
        {
            /*define("BLUE", 0);
            define("YELLOW", 1);
            define("RED",  2);

            $arrColCnt = array();
            $arrColCnt[BLUE] = 0;
            $arrColCnt[YELLOW] = 0;
            $arrColCnt[RED] = 0;*/

            $arrColCnt = array ("blue" => 0, "yellow" => 0, "red" => 0);

            for($r=0 ; $r < $this->intRow ; $r++) 
            {

                for ($c=0 ; $c < $this->intCol ; $c++) 
                {

                    switch ($this->arrRowCol[$r][$c]) 
                    {
                        case 'blue':
                        $arrColCnt["blue"]++;
                        //$arrColCnt[BLUE]++;
                        break;

                        case 'yellow':
                        $arrColCnt["yellow"]++;
                        //$arrColCnt[YELLOW]++;
                        break;

                        case 'red':
                        $arrColCnt["red"]++;
                        //$arrColCnt[RED]++;
                        break;
                    }

                }

            }

            echo "{$arrColCnt["blue"]}<br/>";
            echo "{$arrColCnt["yellow"]}<br/>";
            echo "{$arrColCnt["red"]}<br/>";

            $topColor = array_search(max($arrColCnt),$arrColCnt);
            echo "{$topColor}";
        }
    }

    class getPrimeNumber 
    {
        public function primeNumbers() //list the first 15 prime numbers
        {
            $counter = 0;  
            $prime_num = 2; //prime numbers starts with 2

            while ($counter < 15) //count up to 15
            {
                $div_counter=0;  
                
                for ($i=1 ; $i <= $prime_num ; $i++) 
                {
                    if (($prime_num%$i)== 0) { //if $num=4 then $num % 3 = 1   
                        $div_counter++; 
                    }
                }

                if ($div_counter <= 2) {
                    echo "{$prime_num}, ";  
                    $counter = $counter + 1;
                }

                $prime_num = $prime_num + 1;  
            }
        }

        function calcPrimeNumber()
        {
            if(isset($_POST['input'])) {
                $input = $_POST['input'];  
                for ($i=2 ; $i <= $input-1 ; $i++) 
                {  
                    if ($input % $i == 0) {  
                        $value= True;  
                    }
                }  
                if (isset($value) && $value) {  
                    echo 'The Number '. $input . ' is not prime';
                    $_POST['input'] = NULL;
                } else {  
                    echo 'The Number '. $input . ' is prime';
                    $_POST['input'] = NULL;
                }
            } 

            /*if (!isset($_SESSION)) { //this statements are used in unsetting the POST when browser is refreshed
                session_start();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_SESSION['postdata'] = $_POST;
                unset($_POST);
                header("Location: ".$_SERVER['PHP_SELF']);
                exit;
            }*/
        }
    }
?>