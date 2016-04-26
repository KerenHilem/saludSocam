<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Metas</h1>
      </div>
     

  <style>
  .demo {
    border:1px solid #C0C0C0;
    border-collapse:collapse;
    padding:5px;
  }
  .demo th {
    border:1px solid #C0C0C0;
    padding:5px;
    background:#F0F0F0;
  }
  .demo td {
    border:1px solid #C0C0C0;
    padding:5px;
  }
</style>
<table class="demo">
  <caption>META AFFASPE 2016</caption>
  <thead>
  <tr>
    <th>DETECCIONES</th>
    <th><table id="demo" style="text-align: start;">  <thead> <tr>    <th>MEXICALI<br><br></th>
  </tr> </thead></table></th>
    <th>TIJUANA<br></th>
    <th>ENSENADA</th>
    <th><table id="demo" style="text-align: start;">  <thead> <tr>    <th>VICENTE GRO</th>
  </tr> </thead></table></th>
    <th><table id="demo" style="text-align: start;">  <thead> <tr>    <th>ESTATAL</th>
  </tr> </thead></table></th>
  </tr> </thead>  <tbody> <tr>
    <td>CITOLOGIAS 1° VEZ 25 A 34</td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">9053.58</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">15,743</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">3861.56983</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="139" style="border-collapse:
 collapse;width:104pt"> <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="139" style="height: 15pt; width: 104pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">1,188</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="98" style="border-collapse:
 collapse;width:74pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="98" style="height: 15pt; width: 74pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">29,704</td>
  </tr>
  <tbody></table></td>
  </tr>
  <tr>
    <td>&nbsp;CITOLOGIAS 1° VEZ 35 A 64</td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">2657.16</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">5,299</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">1299.6464</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="139" style="border-collapse:
 collapse;width:104pt"> <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="139" style="height: 15pt; width: 104pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">400</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="98" style="border-collapse:
 collapse;width:74pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="98" style="height: 15pt; width: 74pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">9,997</td>
  </tr>
  <tbody></table></td>
  </tr>
  <tr>
    <td>&nbsp;CAPTURA DE HIBRIDOS 1°VEZ</td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">4951.1445</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">14,902</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">3655.2555</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="139" style="border-collapse:
 collapse;width:104pt"> <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="139" style="height: 15pt; width: 104pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">1,125</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="98" style="border-collapse:
 collapse;width:74pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="98" style="height: 15pt; width: 74pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">28,117</td>
  </tr>
  <tbody></table></td>
  </tr>
  <tr>
    <td>&nbsp;CITO + VPH MUJER 25 A 64</td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">7608.3045</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">35,944</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">8816.47173</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="139" style="border-collapse:
 collapse;width:104pt"> <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="139" style="height: 15pt; width: 104pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">2,713</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="98" style="border-collapse:
 collapse;width:74pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="98" style="height: 15pt; width: 74pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">67,819</td>
  </tr>
  <tbody></table></td>
  </tr>
  </tbody>
</table>

<style>
  .demo {
    border:1px solid #C0C0C0;
    border-collapse:collapse;
    padding:5px;
  }
  .demo th {
    border:1px solid #C0C0C0;
    padding:5px;
    background:#F0F0F0;
  }
  .demo td {
    border:1px solid #C0C0C0;
    padding:5px;
  }
</style>
<table class="demo">
  <caption>DISTRIBUCION META 2016</caption>
  <thead>
  <tr>
    <th>DISTRIBUCION</th>
    <th>JURISDICCION 2</th>
    <th>TECATE<br></th>
    <th>ROSARITO</th>
    <th>TIJUANA</th>
  </tr> </thead>  <tbody> <tr>
    <td>EXPLOCACION CLINICA<br></td>
    <td>&nbsp;15994.658<br></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="88" style="border-collapse:
 collapse;width:66pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="88" style="height: 15pt; width: 66pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">800</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;1120<br></td>
    <td>&nbsp;14075<br></td>
  </tr>
  <tr>
    <td>MASTOGRAFIAS 40 A 49<br></td>
    <td>&nbsp;4694.316<br></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="88" style="border-collapse:
 collapse;width:66pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="88" style="height: 15pt; width: 66pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">235</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;329</td>
    <td>4114</td>
  </tr>
  <tr>
    <td>MASTOGRAFIAS 50 A 69</td>
    <td>&nbsp;8747.02195<br></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="80" style="border-collapse:
 collapse;width:60pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="80" style="height: 15pt; width: 60pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">14,902</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;612<br></td>
    <td>&nbsp;7697<br></td>
  </tr>
  <tr>
    <td>&nbsp;MASTOGRAFIAS 40 A 69</td>
    <td>&nbsp;13441.33795<br></td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="88" style="border-collapse:
 collapse;width:66pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="88" style="height: 15pt; width: 66pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">437</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;941<br></td>
    <td>&nbsp;11828<br></td>
  </tr>
  <tr>
    <td>&nbsp;CITOLOGIAS 1° VEZ 25 A 34</td>
    <td>15743.32</td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="88" style="border-collapse:
 collapse;width:66pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="88" style="height: 15pt; width: 66pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">787</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;1043</td>
    <td>&nbsp;13854</td>
  </tr>
  <tr>
    <td>&nbsp;CITOLOGIAS 1° VEZ 35 A 64</td>
    <td>&nbsp;5298.5584</td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="88" style="border-collapse:
 collapse;width:66pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="88" style="height: 15pt; width: 66pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">265</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;372</td>
    <td>&nbsp;4663</td>
  </tr>
  <tr>
    <td>&nbsp;CAPTURA DE HIBRIDOS 1°VEZ</td>
    <td>&nbsp;14902.1955</td>
    <td>&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="88" style="border-collapse:
 collapse;width:66pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="88" style="height: 15pt; width: 66pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">745</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;1040</td>
    <td>&nbsp;13114</td>
  </tr>
  <tr>
    <td>&nbsp;CITO + VPH MUJER 25 A 64</td>
    <td>&nbsp;35944</td>
    <td><table border="0" cellpadding="0" cellspacing="0" width="88" style="border-collapse:
 collapse;width:66pt">  <tbody><tr height="20" style="height:15.0pt">
  <td height="20" class="xl65" width="88" style="height: 15pt; width: 66pt; padding: 5px; border: 1px solid rgb(192, 192, 192);">1,797</td>
  </tr>
  <tbody></table></td>
    <td>&nbsp;2546</td>
    <td>&nbsp;31631</td>
  </tr>
  <tbody>
</table>
</section>
<?php
  include("../footer.php");
?>