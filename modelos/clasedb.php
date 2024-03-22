<?php


 /* class clasedb{

     private $db;
     public function conectar(){

         $this->db=new mysqli("localhost","root","X~FR7>OKbp+iH}+/","id18707449_boleta_ranking") or die ("no se pudo conectar con Mysql");
         $this->db->set_charset("utf8");
        return $this->db;
     }

 } */


 class clasedb{
     private $db;
     public function conectar(){
         $this->db=new mysqli("localhost","root","","fesnasol") or die ("no se pudo conectar con Mysql");
         $this->db->set_charset("utf8");
        return $this->db;
     }

 }



 ?>