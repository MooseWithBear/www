
<!-- localhost 전용 db접속 -->
<?
    // $connect=mysql_connect( "localhost", "ssk", "1234") or  
    //     die( "SQL server에 연결할 수 없습니다."); 

    // mysql_select_db("ssk_db",$connect);
?>


<?
    $connect=mysql_connect( "localhost", "moosewithbear", "moose001") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("moosewithbear",$connect);
?>
