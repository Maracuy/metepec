<?php
// Realizamos la conexión con el servidor
  $mysqli = new mysqli('localhost', 'mtpkbps3_wp873', '0.kz8M4(!hpS8N[-', 'mtpkbps3_wp873');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html";>
    <meta name="viewport" content="width=device-width", initial-scale="1.0"/>
    <title>SOLICITUD DE PROGRAMAS</title>
    
<style type="text/css">

  
  p { color: black; 
        font-family: Verdana;
        font-size: 10px;
        text-align: left;
  }

                
  p { width: auto; 
        border: black 0px dotted; 
        margin: 5px; 
        padding:5px;} 
        
p2 { width: 170px; 
    border: black 0px dotted; 
    margin: 1px; 
    padding:5px;} 
    

p3 { color: black; 
        font-family: Verdana;
        font-size: 10px;
        text-align: left;
}

p3 { width: 240px; 
    border: black 0px dotted; 
    margin: 1px; 
    padding:5px;
} 
    
fieldset { width: auto; 
    border: black 1px dotted; 
    margin: 1px; 
    padding:5px; } 
    
    
legend { color: black; 
        font-family: Verdana;
        font-size: 12px;
        text-align: left; } 
    
option value { width: auto; 
    border: black 1px dotted; 
    margin: 1px; 
    padding:5px; } 
    
/*
  Este es el nvo */
.flex-container {
  display: flex;
    flex-wrap: wrap;
}

</style>
</head>
<body>
<form action="subirmysql.php" method="POST" align="center">
    
<fieldset> 
<legend>SECTOR DE ATENCIÓN</legend>
    <div class="flex-container">
        
       <p>SECTOR:</br><select>
        <option value="0" id="SECTOR" name="SECTOR"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_02_sect");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_sect].'</option>'; }
        ?></select></p> 
        
    </div>
</fieldset>  

<fieldset>   
<legend>...</legend>
    <div class="flex-container">
      
       <p>STATUS:</br><select>
        <option value="0" id="ST_IN" name="ST_IN"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_03_stin");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_stin].'</option>'; }
        ?></select></p> 
      
      <p>RESPONSABLE:</br><select>
        <option value="0" id="REPL" name="REPL"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_04_repl");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_repl].'</option>'; }
        ?></select></p> 
        
    <p>CAPTURA:</br><select>
        <option value="0" id="CAPT" name="CAPT"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_06_capt");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_capt].'</option>'; }
        ?></select></p> 
     
       <p>ORIGEN:</br><select>
        <option value="0" id="ORIG" name="ORIG"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_08_orig");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_orig].'</option>'; }
        ?></select></p> 
   
   <p>PROMUEVE:</br><select>
        <option value="0" id="PROM" name="PROM"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_09_prom");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_prom].'</option>'; }
        ?></select></p> 
        
   <p>MEDIO:</br><select>
        <option value="0" id="MEDI" name="MEDI"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_10_medi");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_medi].'</option>'; }
        ?></select></p> 
        
            </div>
</fieldset>  

<fieldset>   
<legend>...</legend>
    <div class="flex-container">
   
    <p>SOLICITUD:</br>
    <input type2="text" placeholder="ESCRIBA AQUÍ SU SOLICITUD..." id="SOLIC" name="SOLIC"></p>
    
            <p>FECHA_LIMITE:</br>
    <input type="text" placeholder="FYYYYMMDD" id="F_LIM" name="F_LIM"></p>
        
            </div>
</fieldset>  

<fieldset>   
<legend>...</legend>
    <div class="flex-container">
              
    <p>BENEFICIARIO:</br>
    <input type="text" placeholder="PAT MAT NOM" id="BENEF" name="BENEF">
           <button name="button">
           <a href="http://metepec.work/tareas" target="_blank">PF</a></button></p>
    
      <p>VULN:</br><select>
        <option value="0" id="VULN" name="VULN"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_14_vuln");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_vuln].'</option>'; }
        ?></select></p> 
      
    <p3>AUXILIAR:</br>
    <input type="text" placeholder="FAMILIAR O TT" id="AUXI" name="AUXI">
           <button name="button">
           <a href="http://metepec.work/tareas" target="_blank">PF</a></button></p3>
    
     <p>TELEFONO:</br>
    <input type="text" placeholder="NNN NNN NNNN" id="TEL" name="TEL"></p>
    
      <p>COLONIA:</br><select>
        <option value="0" id="COLO" name="COLO"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_17_colo");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_colo].'</option>'; }
        ?></select></p> 
    
        </div>
</fieldset>  

<fieldset>   
<legend>...</legend>
    <div class="flex-container">
    
    <p>PROGRAMA:</br><select>
        <option value="0" id="PROG" name="PROG"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_18_prog");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_prog].'</option>'; }
        ?></select></p> 
   
    <p>DEPTO:</br><select>
        <option value="0" id="DEPT" name="DEPT"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_19_dept");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_dept].'</option>'; }
        ?></select></p> 
        
    <p>RESPONSABLE:</br><select>
        <option value="0" id="RSPN" name="RSPN"></option><?php
            $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_20_rspn");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_rspn].'</option>'; }
        ?></select></p> 
    
    <p>SE ACEPTA:</br><select>
        <option value="0" id="ACEP" name="ACEP"></option><?php
            $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_21_acep");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_acep].'</option>'; }
        ?></select></p> 
        
    </div>  
</fieldset>  
        
<fieldset>
    <legend>...</legend>
    <div class="flex-container">
        
    <p>TIPO:</br><select>
        <option value="0" id="TIPO" name="TIPO"></option><?php
            $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_22_tipo");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_tipo].'</option>'; }
        ?></select></p> 
        
    <p>D_OFC:</br><select>
            <option value="0" id="D_OFC" name="D_OFC"></option><?php
            $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_23_dofc");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_dofc].'</option>'; }
        ?></select></p> 
        
    <p>D_DCT:</br><select>
        <option value="0" id="D_DCT" name="D_DCT"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_24_ddct");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_ddct].'</option>'; }
        ?></select></p> 
        
    <p>D.I.:</br><select>
            <option value="0" id="D_IDI" name="D_IDI"></option><?php
            $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_25_didi");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_didi].'</option>'; }
        ?></select></p> 
        
    <p>D.C.:</br><select>
        <option value="0" id="D_CDC" name="D_CDC"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_26_dcdc");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_dcdc].'</option>'; }
        ?></select></p> 
        
    <p>D.N.:</br><select>
        <option value="0" id="D_NDN" name="D_NDN"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_27_dndn");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_dndn].'</option>'; }
        ?></select></p> 
        
    <p>D.D.:</br><select>
        <option value="0"id="D_DDD" name="D_DDD"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_28_dddd");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_dddd].'</option>'; }
        ?></select></p> 
        
    <p>G_DOC:</br><select>
        <option value="0" id="G_DOC" name="G_DOC"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_35_gdoc");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_gdoc].'</option>'; }
        ?></select></p> 
        
    <p>DOC:</br><select>
        <option value="0" id="DOC" name="DOC"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_36_doc");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_doc].'</option>'; }
        ?></select></p> 
        
    <p>E_DOC:</br><select>
        <option value="0" id="E_DOC" name="E_DOC"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_37_edoc");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_edoc].'</option>'; }
        ?></select></p> 
        
    </div>
</fieldset>  

<fieldset>   
<legend>...</legend>
    <div class="flex-container">
        
    <p>SE ENLISTA:</br><select>
        <option value="0" id="LIST" name="LIST"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_29_list");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_list].'</option>'; }
        ?></select></p> 
        
    <p>ENVIADA:</br><select>
        <option value="0" id="E_LST" name="E_LST"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_30_elst");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_elst].'</option>'; }
        ?></select></p> 
        
    <p>RESPUESTA:</br>
        <input type="text" placeholder="ESCRIBA AQUI..." id="RESP" name="RESP">
    
    <p>ENV. RESP:</br><select>
        <option value="0" id="E_RSP" name="E_RSP"></option><?php
            $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_32_ersp");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_ersp].'</option>'; }
        ?></select></p> 
        
    <p>SOLIC. VISITA:</br>
        <input type="text" placeholder="YYYYMMDD" id="F_SOL" name="F_SOL">
        
    <p>FECHA VISITA:</br>
        <input type="text" placeholder="YYYYMMDD" id="F_VST" name="F_VIS">
    
    <p>REQ. ACOMPAÑAMIENTO:</br><select>
        <option value="0" id="RACO" name="RACO"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_34_raco");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_raco].'</option>'; }
        ?></select></p> 
    
    <p>CAPTURA:</br><select>
        <option value="0" id="CAPF" name="CAPF"></option><?php
          $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_34_capf");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_capf].'</option>'; }
        ?></select></p> 
           
    <p>REPORTE:</br>
        <input type="text" placeholder="YYYYMMDD" id="REPT" name="REPT">
 
    </div>
</fieldset>  

<fieldset> 
<legend>.../legend>
    <div class="flex-container">
        
    <p>ACCIONES:</br>
        <input type="text" placeholder="QUE PROCEDE" id="ACCN" name="ACN">
        
    <p>STATUS:</br><select>
        <option value="0" id="ST_FN" name="ST_FN"></option><?php
            $query = $mysqli -> query ("SELECT * FROM wpw1_supsystic_membership_activity_menu_40_stfn");
            while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[m_stfn].'</option>'; }
        ?></select></p> 
    
    <button><input type="submit" value="CAPTURAR" formmethod="POST"/></button>
        

        
   </div>  
        </fieldset>
</form>
</body>
</html>