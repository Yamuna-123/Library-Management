<?php
    class connection{
        private $DB_SERVER='localhost';
        private $DB_USERNAME='root';
        private $DB_PASS='IDYamuna@123';
        private $DB_NAME='library';
        protected $con;
        public function __construct(){
            $this->con=mysqli_connect($this->DB_SERVER,$this->DB_USERNAME,$this->DB_PASS,$this->DB_NAME);
            if($this->con===false){
                    echo "error in connection".$this->con->error();
                    $fp=fopen('../logs/text.txt','a');
                    $tmp=date('d-m-y h-i-s');
                    $str=$tmp."\n".$this->con->error()."\n";
                    fwrite($fp,$str);
                    fclose($fp);
                    echo "<br/> <br/><div> <a href='../index.php'> 
                        <button class='btn btn-secondary' > << Go Back </button> </a> <div>";
                    die('');
            }
            return $this->con;
        }
    }
?>