<?php
  include_once 'config.php';
  
  class library extends connection{
    function __construct(){
      parent::__construct();
    }
    function getdata($query){
      $result=$this->con->query($query);
      if($result==false){
          echo $query."Error while running the query<br/>".mysqli_error($this->con);
              $fp=fopen('../logs/text.txt','a');
              $tmp=date('d-m-y h-m-s');
              $str="\n".$tmp."\n".$query."\n".mysqli_error($this->con)."\n";
              fwrite($fp,$str);
              fclose($fp);
              echo "<br/> <br/><div> <a href='../index.php'> 
                    <button class='btn btn-secondary' > << Go Back </button> </a> <div>";
          return false;
      }
      $records =array();
      while($row=$result->fetch_assoc()){
        $records[]=$row;
      }
      return $records;
    }
    function editdata($query){
      $result=$this->con->query($query);
      if($result==false){
          echo $query."Error while running the query<br/>".mysqli_error($this->con);
              $fp=fopen('../logs/text.txt','a');
              $tmp=date('d-m-y h-m-s');
              $str="\n".$tmp."\n".$query."\n".mysqli_error($this->con)."\n";
              fwrite($fp,$str);
              fclose($fp);
              echo "<br/> <br/><div> <a href='../index.php'> 
                    <button class='btn btn-secondary' > << Go Back </button> </a> <div>";
          return false;
      }
    }
     function countdata($query){
      $result=$this->con->query($query);
     // $res=$result->num_rows();
      if($result==false){
          echo $query."Error while running the query<br/>".mysqli_error($this->con);
              $fp=fopen('../logs/text.txt','a');
              $tmp=date('d-m-y h-m-s');
              $str=$tmp."\n".$query."\n".mysqli_error($this->con)."\n";
              fwrite($fp,$str);
              fclose($fp);
              echo "<br/> <br/><div> <a href='../index.php'> 
                    <button class='btn btn-secondary' > << Go Back </button> </a> <div>";
          return false;
      }
      return $result;
    }
  } 
?>