<form method="POST" action="controlador/alta_benef_sql.php">

    <div class="form-row">

        <div class="form-group col-md-2">
            <label for="aux_fam">Nombre(s)</label>
            <input type="text" class="form-control" id="nombres_aux">
        </div>

        <div class="form-group col-md-2">
            <label for="aux_fam">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido_p_aux">
        </div>

        <div class="form-group col-md-2">
            <label for="aux_fam">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido_m_aux">
        </div>

        <div class="form-group col-md-2">
            <label for="aux_fam">Telefono</label>
            <input type="tel" class="form-control" id="telefono">
        </div>

        
        <div class="form-group col-md-2">
            <label for="vulnerable">Parentesco</label>
            <select class="form-control" id="parentesco">
            <option value="">Ninguno</option>
            <option value="padre">Padre</option>
            <option value="hijo">Hijo</option>
            <option value="hermano">Hermano</option>
            <option value="otro">Otro</option>
            </select>
        </div>
    </div>
    <button class="btn btn-primary" type="submit" name="guardar_salir" id="guardar_salir"> <i class="far fa-save mr-2"></i>  Guardar y Salir</button>
    <button class="btn btn-primary" type="submit" name="continuar" id="continuar" value="Siguiente"> <i class="fas fa-forward mr-2"></i> Inscribir Beneficiario a un Programa</button>

</form>