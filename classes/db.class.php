<?php
 
class DB
{
                public $query = NULL;
                public $sqlResult = NULL;               
                private $conn_id = false;
 
                private $sqlHost;
                private $sqlDatabase;
                private $sqlUser;
                private $sqlPassword;
               
                private $projectStatus = "test";
               
                public function setSqlHost($value)
                {
                               $this->sqlHost = $value;
                }
               
                public function getSqlHost()
                {
                               return $this->sqlHost;
                }
 
                public function setSqlDatabase($value)
                {
                               $this->sqlDatabase = $value;
                }
               
                public function getSqlDatabase()
                {
                               return $this->sqlDatabase;
                }
 
                public function setSqlUser($value)
                {
                               $this->sqlUser = $value;
                }
               
                public function getSqlUser()
                {
                               return $this->sqlUser;
                }
 
                public function setSqlPassword($value)
                {
                               $this->sqlPassword = $value;
                }
               
                public function getSqlPassword()
                {
                               return $this->sqlPassword;
                }
 
                public function setQuery($value)
                {
                       $this->query = trim($value);
                }
               
                public function getQuery()
                {
                               return $this->query;
                }
 
                public function setProjectStatus($value)
                {
                               $this->projectStatus = $value;
                }
               
                public function getProjectStatus()
                {
                               return $this->projectStatus;
                }
 
                function __construct()
                {
                               $this->sqlHost = SQL_HOST;
                               $this->sqlDatabase = SQL_DATABASE;
                               $this->sqlUser = SQL_USER;
                               $this->sqlPassword = SQL_PASSWORD;
                }
 
  public function DatabaseConnect() {
      $this->conn_id = mysqli_connect($this->sqlHost, $this->sqlUser, $this->sqlPassword, $this->sqlDatabase);
      $this->conn_id->set_charset("utf8");
      if (mysqli_connect_error()) {
            die('Error de Conexión ('.mysqli_connect_errno() .')'. mysqli_connect_error());
      } 
  }
               
  public function ExecuteQuery() {
        
        if(!$this->conn_id){ $this->DatabaseConnect(); }
       // echo $this->query."<br><br>";
        $this->sqlResult = mysqli_query($this->conn_id, $this->query);          
  }
               
  function GetResult(){
          $retArray = array();
          $this->ExecuteQuery();
           if($this->sqlResult!=NULL){
            while($rs=mysqli_fetch_assoc($this->sqlResult)){
                $retArray[] = $rs;
            } 
            $this->CleanQuery(); 
          }
          
          return $retArray;
  }
 
  function GetTotalRows(){
          $this->ExecuteQuery();                              
          return mysqli_num_rows($this->sqlResult);
  }
 
  function GetRow(){
          $this->ExecuteQuery();
          $rs=NULL;
          if($this->sqlResult!=NULL){
            $rs=mysqli_fetch_assoc($this->sqlResult);
            $this->CleanQuery();
          }
          
          return $rs;
  }
 
  function InsertData(){
          $this->ExecuteQuery();
          $last_id=mysqli_insert_id($this->conn_id);
           
          
          return $last_id;
  }
 
  function UpdateData(){
          $this->ExecuteQuery();
          $return = mysqli_affected_rows($this->conn_id);
         // $this->CleanQuery();
          return $return;
  }
 
  function DeleteData(){
          return $this->UpdateData();
  }
               
  function CleanQuery(){
        if($this->sqlResult!=NULL){
           mysqli_free_result($this->sqlResult);
        }
       
   
  }               
  function EnumSelect( $table , $field ){
        $this->query = "SHOW COLUMNS FROM `$table` LIKE '$field' ";
        $this->ExecuteQuery();
        $row = mysqli_fetch_array( $this->sqlResult , MYSQL_NUM );
        $regex = "/'(.*?)'/";
        preg_match_all( $regex , $row[1], $enum_array );
        $enum_fields = $enum_array[1];
        return( $enum_fields );
  }             
}?>