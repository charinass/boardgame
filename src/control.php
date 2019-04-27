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

            for($r = 0; $r < count($this->arrRowCol); $r++) 
            {

                for ($c = 0; $c < count($this->arrRowCol); $c++) 
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


        public function calcAlgorithm()
        {
            
        }

        

    }

    class getPrimeNumber 
    {
        public function primeNumbers() //list the first 15 prime numbers
        {
            $counter = 0;  
            $prime_num = 2; //prime numbers starts with 2

            echo "The first 15 prime numbers are: <br/>";
            while ($counter < 15) //count up to 15
            {
                $div_counter=0;  
                
                for ($i=1 ; $i <= $prime_num; $i++) 
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
                for ($i = 2; $i <= $input-1; $i++) 
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