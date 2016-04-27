<?php 
$printer = "//10.118.3.44/HP LaserJet M1530 MFP Series PCL 6 (Copiar 1)"; 
if($ph = printer_open($printer)) 
{ 
   // Get file contents 
   $fh = fopen("prueba.txt", "rb"); 
   $content = fread($fh, filesize("prueba.txt")); 
   fclose($fh); 
        
   // Set print mode to RAW and send PDF to printer 
   printer_set_option($ph, PRINTER_MODE, "RAW"); 
   printer_write($ph, $content); 
   printer_close($ph); 
} 
else 
	echo "Couldn't connect..."; 
?>