<form method="POST" action="controlador/alta_benef_sql.php">
<h4>Alta de beneficiarios</h4>
    <div class="form-row">

        <div class="form-group col-md-2">
            <label for="nombres">Nombre(s)*</label>
            <input type="text" class="form-control" id="nombres" name="nombres" autofocus required>
        </div>

        <div class="form-group col-md-2">
            <label for="apellido_p">Apellido Paterno*</label>
            <input type="text" class="form-control" id="apellido_p" name="apellido_p" required>
        </div>

        <div class="form-group col-md-2">
            <label for="apellido_m">Apellido Materno*</label>
            <input type="text" class="form-control" id="apellido_m" name="apellido_m" required>
        </div>

        <div class="form-group col-md-2">
            <label for="fech_nacimiento">Fecha Nacimiento</label>
            <input type="date" value="2020-01-01" class="form-control" id="fech_nacimiento" name="fech_nacimiento">
        </div>

        <div class="form-group col-md-1">
            <label for="vulnerable">Vulnerable</label>
            <select class="form-control" id="vulnerable" name="vulnerable">
            <option value="no">No</option>
            <option value="si">Si</option>
            </select>
        </div>
        
        <div class="form-group col-md-1">
            <label for="nivel">Nivel</label>
            <select class="form-control" id="nivel" name="nivel">
            <option value="">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

            </select>
        </div>

        <div class="form-group col-md-1">
            <label for="genero">Genero</label>
            <select class="form-control" id="genero" name="genero">
            <option value=""></option>
            <option value="m">M</option>
            <option value="f">F</option>
            </select>
        </div>
                
    </div> <!--Termina row-->
    <br>

    <div class="form-row">
        
        <div class="form-group col-md-2">
            <label for="curp">Curp</label>
            <input type="text" class="form-control" id="curp" name="curp">
        </div>

        <div class="form-group col-md-2">
            <label for="tipo_identificacion">Identificacion</label>
            <select class="form-control" id="tipo_identificacion" name="tipo_identificacion">
            <option value="ine">INE</option>
            <option value="ife">IFE</option>
            <option value="pasaporte">Pasaporte</option>
            <option value="licencia">Licencia Conducir</option>
            <option value="otro">Otro</option>
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="numero_identificacion">Numero de Identificación</label>
            <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
        </div>

        <div class="form-group col-md-2">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        
        <div class="form-group col-md-2">
            <label for="telefono">Telefono
            </label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="form-group col-md-1">
            <label for="whats">Whatsapp</label>
            <select class="form-control" id="whats" name="whats">
            <option value=""></option>
            <option value="no">No</option>
            <option value="si">Si</option>
            </select>
        </div>

    </div> <!--Termina row-->




    <br>


    <div class="form-row">
            
            
        <div class="form-group col-md-2">
            <label for="calle">Calle</label>
            <input type="text" class="form-control" id="calle" name="calle">
        </div>

        <div class="form-group col-md-1">
            <label for="numero">Numero</label>
            <input type="text" class="form-control" id="numero" name="numero">
        </div>

        <div class="form-group col-md-1">
            <label for="numero_int">Numero int.</label>
            <input type="text" class="form-control" id="numero_int" name="numero_int">
        </div>

        <div class="form-group col-md-2">
            <label for="colonia">Colonia</label>
            <select id="colonia" name="colonia" class="form-control">
                <?php
                $query = $mysqli -> query ("SELECT * FROM colonias");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id'].'">'.$valores['nombre_colonia'].'</option>'; }?>
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="otra_colonia">Otra Colonia</label>
            <input type="text" class="form-control" id="otra_colonia" name="otra_colonia">
        </div>
        
        <div class="form-group col-md-2">
            <label for="referencia">Referencia de domicilio</label>
            <input type="text" class="form-control" id="referencia" name="referencia">
        </div>

        

    </div> <!--Termina row-->

<br>

    <div class="form-row">


        <div class="form-group col-md-2">
            <label for="origen">Origen</label>
            <select id="origen" name="origen" class="form-control">
                <?php
                $query = $mysqli -> query ("SELECT * FROM origenes");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>'; }?>
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="promueve">Promueve</label>
            <select id="promueve" name="promueve" class="form-control">
                <?php
                $query = $mysqli -> query ("SELECT * FROM promotores");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>'; }?>
            </select>
        </div>
        
        <div class="form-group col-md-2">
            <label for="medio">Medio</label>
            <select id="medio" name="medio" class="form-control">
                <?php
                $query = $mysqli -> query ("SELECT * FROM medio_contacto");
                while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>'; }?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="solicitud_basico">Solicitud (Basico)</label>
            <input type="text" class="form-control" id="solicitud_basico" name="solicitud_basico">
        </div>

    </div> <!--Termina row-->
<br>
    <div class="dropdown-divider"></div>
<br>
<h5>Registrar un Auxiliar</h5>
    <div class="form-row">

        <div class="form-group col-md-2">
            <label for="nombres_auxiliar">Nombre(s) de Auxiliar</label>
            <input type="text" class="form-control" id="nombres_auxiliar" name="nombres_auxiliar">
        </div>

        <div class="form-group col-md-2">
            <label for="apellido_p_auxiliar">Apellido Paterno de Aux</label>
            <input type="text" class="form-control" id="apellido_p_auxiliar" name="apellido_p_auxiliar">
        </div>

        <div class="form-group col-md-2">
            <label for="apellido_m_auxiliar">Apellido Materno de Aux</label>
            <input type="text" class="form-control" id="apellido_m_auxiliar" name="apellido_m_auxiliar">
        </div>

        <div class="form-group col-md-2">
            <label for="telefono_auxiliar">Telefono de Aux</label>
            <input type="text" class="form-control" id="telefono_auxiliar" name="telefono_auxiliar">
        </div>

        <div class="form-group col-md-2">
            <label for="parentesco">Parentesco</label>
            <select class="form-control" id="parentesco" name="parentesco">
            <option value="">Ninguno</option>
            <option value="padre">Padre</option>
            <option value="hijo">Hijo</option>
            <option value="hermano">Hermano</option>
            <option value="nieto">Nieto</option>
            <option value="otro">Otro</option>
            </select>
        </div>

    </div>

<br>
<br>

    <button class="btn btn-primary" type="submit" name="guardar_salir" id="guardar_salir"> <i class="far fa-save mr-2"></i>  Guardar y Salir</button>
    <button class="btn btn-primary" type="submit" name="continuar" id="continuar" value="Siguiente"> <i class="fas fa-forward mr-2"></i> Inscribir a un Programa</button>
    
  
</form>


<?php $conn=null?>
<?php mysqli_close($mysqli)?>
