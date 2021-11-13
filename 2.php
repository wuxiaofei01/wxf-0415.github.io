﻿<?php 
   $host        = "host=127.0.0.1"; 
   $port        = "port=5432"; 
   $dbname      = "dbname=testdb"; 
   $credentials = "user=postgres password=pass123"; 
 
   $db = pg_connect( "$host $port $dbname $credentials"  ); 
   if(!$db){ 
      echo "Error : Unable to open database\n"; 
   } else { 
      echo "Opened database successfully\n"; 
   } 
   $sql =<<<EOF 
      UPDATE COMPANY set SALARY = 25000.00 where ID=1; 
EOF; 
   $ret = pg_query($db, $sql); 
   if(!$ret){ 
      echo pg_last_error($db); 
      exit; 
   } else { 
      echo "Record updated successfully\n"; 
   } 
    
   $sql =<<<EOF 
      SELECT * from COMPANY; 
EOF; 
 
   $ret = pg_query($db, $sql); 
   if(!$ret){ 
      echo pg_last_error($db); 
      exit; 
   }  
   while($row = pg_fetch_row($ret)){ 
      echo "ID = ". $row[0] . "\n"; 
      echo "NAME = ". $row[1] ."\n"; 
      echo "ADDRESS = ". $row[2] ."\n"; 
      echo "SALARY =  ".$row[4] ."\n\n"; 
   } 
   echo "Operation done successfully\n"; 
   pg_close($db); 
?> 