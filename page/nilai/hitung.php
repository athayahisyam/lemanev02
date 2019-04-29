<?php

// $conn = new mysqli("localhost", "root", "", "lemanev02");

class nilaiPerSoal{

    //var db_connect
    var $user;
    var $password; 
    var $database; 
    var $host;

    //var construct
    var $tablename;
    var $data_array;
    var $fieldlist;

    //scoring variables
    var $nomorSoal;
    var $nilaiSoal;
    var $totalNilai;

    public function __construct()
    {
        $this->tablename = 'tbl_transaksi_jwb';
        $this->fieldlist = array( 'jwb1', 'jwb2', 'jwb3', 'jwb4', 'jwb5', 'jwb6', 'jwb7', 'jwb8', 'jwb9', 'jwb10', 'jwb11',
        'jwb12', 'jwb13', 'jwb14', 'jwb15', 'jwb16', 'jwb17', 'jwb18', 'jwb19', 'jwb20', 'jwb21', 'jwb22', 'jwb23', 'jwb24', 'jwb25', 'jwb26', 'jwb27', 'jwb28');
    }

    function db_connect(){
        global $user, $password, $database, $host;

        $this->user = 'root';
        $this->password = '';
        $this->database = 'lemanev_02';
        $this->host = 'localhost';
        $dbconnect = mysql_connect($user, $password, $database, $host);
    }

    protected function connect(){
        return new mysqli($this->host, $this->user, $this->password, $this->database);
    }

}
?>