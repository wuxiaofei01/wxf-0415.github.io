<?php 
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
      INSERT INTO COMPANY (20194687,123456) 
EOF; 
 
   $ret = pg_query($db, $sql); 
   if(!$ret){ 
      echo pg_last_error($db); 
   } else { 
      echo "Records created successfully\n"; 
   } 
   pg_close($db); 
?> 