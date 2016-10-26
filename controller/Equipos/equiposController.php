<?php

include_once('../model/Equipos/equiposModel.php');

class EquiposController {

    public function editar($parametros = false) {
        $id = $parametros[1];
        $objEquipos = new EquiposModel();
        $objPersona = new EquiposModel();
        $objEstado = new EquiposModel();
        $objCentro = new EquiposModel();
        $objArea = new EquiposModel();
        $objT_equipo = new EquiposModel();
        $objMedidores = new EquiposModel();

        // Corregir: debe filtrar solo por NULL
        // $sql1 = "Select per_id, per_nombre from pag_persona WHERE estado = NULL ";
        $sql1 = "Select per_id, per_nombre from pag_persona";
        $personas = $objPersona->select($sql1);

        // $sql2 = "Select est_id, est_descripcion from pag_estado WHERE estado= 0";
        $sql2 = "Select est_id, est_descripcion from pag_estado WHERE tdoc_id=1";
        $estados = $objEstado->select($sql2);

        // $sql3 = "Select cen_id, cen_nombre from pag_centro WHERE estado= 0";
        $sql3 = "Select cen_id, cen_nombre from pag_centro";
        $centros = $objCentro->select($sql3);

        // $sql4 = "Select area_id, area_descripcion from pag_area WHERE ESTADO = 0";
        $sql4 = "Select area_id, area_descripcion from pag_area";
        $areas = $objArea->select($sql4);

        //$sql5 = "select tequi_id, tequi_descripcion from pag_tipo_de_equipo WHERE estado = 0";
        $sql5 = "select tequi_id, tequi_descripcion from pag_tipo_equipo";
        $tEquipos = $objT_equipo->select($sql5);

        $sql6 = "select * from pag_tipo_medidor";
        $medidores = $objMedidores->select($sql6);

        $sql7 = "select * from pag_det_equipo_medidor where equi_id='$id'";
        $medidoresDet = $objMedidores->select($sql7);

        $sql = "SELECT * FROM pag_equipo WHERE equi_id='$id'";
        $equipo = $objEquipos->find($sql);

        foreach ($medidores as $key => $medidor) {
            $medidores[$key]['checkeado'] = '';
            foreach ($medidoresDet as $medidorDet) {
                if ($medidor['tmed_id'] == $medidorDet['tmed_id']) {
                    $medidores[$key]['checkeado'] = 'checked';
                    break;
                }
            }
        }//foreach


        $objPersona->cerrar();
        $objEstado->cerrar();
        $objCentro->cerrar();
        $objArea->cerrar();
        $objT_equipo->cerrar();





//echo "<pre>"; die(print_r($equipo));
        // Cierra la conexion
        $objEquipos->cerrar();

        include_once("../view/Equipos/equipos/editar.html.php");
    }

    function postEditar() {

        /* Empieza Validaciones del Equipo */

        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros = "/^[0-9a-zA-Z]+$/";

        if (!isset($_POST['medidores']) or $_POST['medidores'] == "") {
            $errores[] = "El equipo debe tener al menos un <code><b>Medidor</code></b> agregado";
        }//Valida que el Nombre del equipo no este vacio

        if (!isset($_POST['equi_nombre']) or $_POST['equi_nombre'] == "") {
            $errores[] = "El campo <code><b>nombre</b></code> no puede estar vac&iacute;o";
        }//Valida que el Nombre del equipo no este vacio

        if (!isset($_POST['equi_modelo']) or $_POST['equi_modelo'] == "") {
            $errores[] = "El campo <code><b>Modelo</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['equi_serie']) or $_POST['equi_serie'] == "") {
            $errores[] = "El campo <code><b>Serie</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['equi_marca']) or $_POST['equi_marca'] == "") {
            $errores[] = "El campo <code><b>Marca</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['equi_fabricante']) or $_POST['equi_fabricante'] == "") {
            $errores[] = "El campo <code><b>Fabricante</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['equi_estado']) or $_POST['equi_estado'] == "") {
            $errores[] = "El campo <code><b>Estado</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['area_id']) or $_POST['area_id'] == "") {
            $errores[] = "El campo <code><b>Area</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['per_id']) or $_POST['per_id'] == "") {
            $errores[] = "El campo <code><b>Persona</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['equi_ubicacion']) or $_POST['equi_ubicacion'] == "") {
            $errores[] = "El campo <code><b>Ubicacion</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['equi_fecha_compra']) or $_POST['equi_fecha_compra'] == "") {
            $errores[] = "El campo <code><b>Compra del equipo</b></code> no puede estar vac&iacute;o";
        }

        if (!isset($_POST['equi_fecha_instalacion']) or $_POST['equi_fecha_instalacion'] == "") {
            $errores[] = "La <code><b>Fecha de Instalacion</b></code> no puede estar vac&iacute;a";
        }

        if (!isset($_POST['equi_vence_garantia']) or $_POST['equi_vence_garantia'] == "") {
            $errores[] = "La <code><b>Fecha de vencimiento de la Garantia</b></code> no puede estar vac&iacute;a";
        }

        if (!isset($_POST['cen_id']) or $_POST['cen_id'] == "") {
            $errores[] = "El campo <code><b>Centro</b></code> no puede estar vac&iacute;o";
        }

        /* Termino Validaciones */

        $objEquipos = new EquiposModel();
        if (count($errores) > 0) {
            setErrores($errores);
        } else {


            $equi_placa = $_POST['equi_placa'];
            //die(print_r($equi_placa));

            $equi_nombre = $_POST['equi_nombre'];
            $equi_modelo = $_POST['equi_modelo'];
            $equi_noserie = $_POST['equi_serie'];
            $equi_marca = $_POST['equi_marca'];
            $equi_fabricante = $_POST['equi_fabricante'];
            $equi_estado = $_POST['equi_estado'];
            $area_id = $_POST['area_id'];
            $per_id = $_POST['per_id'];
            $equi_ubicacion = $_POST['equi_ubicacion'];
            $equi_fecha_compra = $_POST['equi_fecha_compra'];
            $equi_fecha_instalacion = $_POST['equi_fecha_instalacion'];
            $equi_vence_garantia = $_POST['equi_vence_garantia'];
            $cen_id = $_POST['cen_id'];

            //die(print_r($_POST));

            $medidores = $_POST['medidores'];

            $sql = "UPDATE "
                    . "pag_equipo "
                    . "SET "
                    . "equi_nombre='$equi_nombre', "
                    . "per_id='$per_id', "
                    . "est_id=$equi_estado, "
                    . "equi_modelo='$equi_modelo', "
                    . "equi_serie='$equi_noserie', "
                    . "equi_fabricante='$equi_fabricante', "
                    . "equi_marca='$equi_marca', "
                    . "equi_ubicacion='$equi_ubicacion', "
                    . "equi_fecha_compra='$equi_fecha_compra', "
                    . "equi_fecha_instalacion='$equi_fecha_instalacion', "
                    . "equi_vence_garantia='$equi_vence_garantia' "
                    . "WHERE equi_id='$equi_placa'";

            //die(print_r($sql));

            $respuesta = $objEquipos->update($sql);
            if ($respuesta) {
                $sqlEliminar = "delete from pag_det_equipo_medidor where equi_id='$equi_placa'";
                $eliminar = $objEquipos->delete($sqlEliminar);
                foreach ($_POST['medidores'] as $medidor) {
                    $sql = "INSERT INTO pag_det_equipo_medidor (equi_id,tmed_id) "
                            . "values('$equi_placa',$medidor)";
                    $insert = $objEquipos->insertar($sql);
                }
            }
            $objEquipos->cerrar();
        }
        // Cierra la conexion

        echo getRespuestaAccion('listar');
    }

    function crear() {
        $objPersona = new EquiposModel();
        $objEstado = new EquiposModel();
        $objCentro = new EquiposModel();
        $objArea = new EquiposModel();
        $objT_equipo = new EquiposModel();
        $objMedidores = new EquiposModel();

        // Corregir: debe filtrar solo por NULL
        // $sql1 = "Select per_id, per_nombre from pag_persona WHERE estado = NULL ";
        $sql1 = "Select per_id, per_nombre from pag_persona";
        $personas = $objPersona->select($sql1);

        // $sql2 = "Select est_id, est_descripcion from pag_estado WHERE estado= 0";
        $sql2 = "Select est_id, est_descripcion from pag_estado WHERE tdoc_id=1";
        $estados = $objEstado->select($sql2);

        // $sql3 = "Select cen_id, cen_nombre from pag_centro WHERE estado= 0";
        $sql3 = "Select cen_id, cen_nombre from pag_centro";
        $centros = $objCentro->select($sql3);

        // $sql4 = "Select area_id, area_descripcion from pag_area WHERE ESTADO = 0";
        $sql4 = "Select area_id, area_descripcion from pag_area";
        $areas = $objArea->select($sql4);



        $sql6 = "SELECT * from pag_tipo_medidor where estado IS NULL";
        $medidores = $objMedidores->select($sql6);

        $objPersona->cerrar();
        $objEstado->cerrar();
        $objCentro->cerrar();
        $objArea->cerrar();
        $objMedidores->cerrar();


        include_once("../view/Equipos/equipos/crear.html.php");
    }

    function postCrear() {
        //--------expresiones regulares--------------------
        $errores = array();
        $patronNumeros = "/[0-9]{1,9}(\.[0-9]{0,2})?$/";
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s( )]*$/";
        $patronLetrasNumerosGuiones = "/^[0-9a-zA-Z(-_)-áéíóúñ\s]+$/";
        $patronLetrasNumeros = "/^[0-9a-zA-Z( )]+$/";

        //-----------------validaciones--------------------
        //--- Validacion cantidad campos personalizados -->
        // ----------- Fin Validacion ------------------ //
        if (!isset($_POST['equi_id']) or $_POST['equi_id'] == "") {
            $errores[] = '(*) El campo <strong><code>"N.Placa"</strong></code> es obligatorio';
        }
       
        //-------------------------------------------------------------
        if(isset($_POST['equi_id']) && !empty($_POST['equi_id'])){
            if(!preg_match($patronLetrasNumerosGuiones,$_POST['equi_id'])){
                $errores[]='(*) El campo <strong><code>"Numero de placa"</strong></code> unicamente admite letras,numeros y guiones';
            }
            $doc = "SELECT equi_id FROM pag_equipo";
            $objEquipos = new EquiposModel();
            $ids = $objEquipos->select($doc);
            // Cierra la conexion
            $objEquipos->cerrar();

            foreach ($ids as $id) {
                if ($id['equi_id'] == $_POST['equi_id']) {
                    $errores[] = '<strong>(*) El N.Placa ingresado ya se encuentra registrado</strong>';
                }
            }
        }
        
        //-------------------------------------------------------------

        if (!isset($_POST['per_id']) or $_POST['per_id'] == "") {
            $errores[] = '(*) El campo <strong><code>"Encargado"</strong></code> es obligatorio';
        }
        if (isset($_POST['per_id']) && !empty($_POST['per_id'])){
            if (!preg_match($patronNumeros,$_POST['per_id'])){
             $errores[]="(*) El campo <strong><code>'Encargado'</strong></code> debe ser Numerico";   
            }
        }
        

        if (!isset($_POST['equi_nombre']) or $_POST['equi_nombre'] == "") {
            $errores[] = '(*) El campo <strong><code>"Nombre Del Equipo"</code></strong> es obligatorio';
        }
        
        if(isset($_POST['equi_nombre']) && !empty($_POST['equi_nombre'])){
            if (isset($_POST['equi_nombre']) && !preg_match($patronLetrasNumeros, $_POST['equi_nombre'])) {
                $errores[] = '(*) El campo <strong><code>"Nombre Del Equipo"</strong></code> unicamente admite letras y numeros';
            }
        }

        if (!isset($_POST['est_id']) or $_POST['est_id'] == "") {
            $errores[] = '(*) El campo <strong><code>"Estado Del Equipo"</strong></code> es obligatorio';
        }
        
        if(isset($_POST['est_id']) && !empty($_POST['est_id'])){
            if(isset($_POST['est_id']) && !preg_match($patronNumeros,$_POST['est_id'])){
                $errores[] = '(*) El campo <strong><code>"Estado Del Equipo"</strong></code> debe ser numerico';
            }
        }

        if (!isset($_POST['equi_modelo']) or $_POST['equi_modelo'] == "") {
            $errores[] = '(*) El campo <strong><code>"Modelo"</strong></code> es obligatorio';
        }
        
        if(isset($_POST['equi_modelo']) && !empty($_POST['equi_modelo'])){
            if(isset($_POST['equi_modelo']) && !preg_match($patronNumeros,$_POST['equi_modelo'])){
                $errores[] = '(*) El campo <strong><code>"Modelo"</strong></code> debe ser numerico';
            }
        }

        if (!isset($_POST['equi_serie']) or $_POST['equi_serie'] == "") {
            $errores[] = '(*) El campo <strong><code>"No. Serie"</code></strong> es obligatorio';
        }
        
        if(isset($_POST['equi_serie']) && !empty($_POST['equi_serie'])){
            if(isset($_POST['equi_serie']) && !preg_match($patronLetrasNumerosGuiones,$_POST['equi_serie'])){
                $errores[] = '(*) El campo <strong><code>"No. Serie"</code></strong> unicamente admite Letras,numeros y guiones';
            }
        }

        if (!isset($_POST['equi_fabricante']) or $_POST['equi_fabricante'] == "") {
            $errores[] = '(*) El campo <strong><code>"Fabricante"</code></strong> es obligatorio';
        }
        
        if(isset($_POST['equi_fabricante']) && !empty($_POST['equi_fabricante'])){
            if(isset($_POST['equi_fabricante']) && !preg_match($patronLetras,$_POST['equi_fabricante'])){
                $errores[] = '(*) El campo <strong><code>"Fabricante"</code></strong> unicamente admite Letras';
            }
        }

        if (!isset($_POST['equi_marca']) or $_POST['equi_marca'] == "") {
            $errores[] = '(*) El campo <strong><code>"Marca"</strong></code> es obligatorio';
        }
        
        if(isset($_POST['equi_marca']) && !empty($_POST['equi_marca'])){
            if(isset($_POST['equi_marca']) && !preg_match($patronLetrasNumeros,$_POST['equi_marca'])){
                $errores[] = '(*) El campo <strong><code>"Marca"</code></strong> unicamente admite Letras y numeros';
            }
        }

        if (!isset($_POST['equi_ubicacion']) or $_POST['equi_ubicacion'] == "") {
            $errores[] = '(*) El campo <strong><code>"Ubicacion"</strong></code> es obligatorio';
        }
        
        if(isset($_POST['equi_ubicacion']) && !empty($_POST['equi_ubicacion'])){
            if(isset($_POST['equi_ubicacion']) && !preg_match($patronLetrasNumeros,$_POST['equi_ubicacion'])){
                $errores[] = '(*) El campo <strong><code>"Ubicacion"</code></strong> unicamente admite Letras y numeros';
            }
        }

        if (!isset($_POST['equi_fecha_compra']) or $_POST['equi_fecha_compra'] == "") {
            $errores[] = '(*) El campo <strong><code>"Fecha De Compra"</code></strong> es obligatorio';
        }
        if (!isset($_POST['equi_fecha_instalacion']) or $_POST['equi_fecha_instalacion'] == "") {
            $errores[] = '(*) El campo <strong><code>"Fecha De Instalacion"</strong></code> es obligatorio';
        }

        if (!isset($_POST['equi_vence_garantia']) or $_POST['equi_vence_garantia'] == "") {
            $errores[] = '(*) El campo <strong><code>"Vecimiento De Garantia"</strong></code> es obligatorio';
        }
        if($_POST['equi_vence_garantia'] < $_POST['equi_fecha_compra']){
            $errores[]="(*) Por favor verifique la <strong><code> 'Fecha de garantia' </strong></code> no puede ser mayor a la <strong><code>'Fecha de compra</strong></code>'";
        }
        if (!isset($_POST['cen_id']) or $_POST['cen_id'] == "") {
            $errores[] = '(*) El campo <strong><code>"Centro De Formacion"</strong></code> es obligatorio';
        }

//        if (!isset($_POST['tequi_id']) or $_POST['tequi_id'] == "") {
//            $errores[] = '(*) El campo "Tipo De Equipo" es obligatorio';
//        }

        if (!isset($_POST['area_id']) or $_POST['area_id'] == "") {
            $errores[] = '(*) El campo <strong><code>"Area"</strong></code> es obligatorio';
        }
        if (!isset($_POST['medidores']) or $_POST['medidores'] == "") {
            $errores[] = '(*) Desbes añadir al menos 1 <strong><code>"Medidor"</strong></code> para este equipo';
        }

        if (count($errores) > 0) {
            setErrores($errores);
            //----------------fin validaciones-----------------
        } else {

            $equi_id = $_POST['equi_id'];
            $per_id = $_POST['per_id'];
            $equi_nombre = $_POST['equi_nombre'];
            $est_id = $_POST['est_id'];
            $equi_modelo = $_POST['equi_modelo'];
            $equi_serie = $_POST['equi_serie'];
            $equi_fabricante = $_POST['equi_fabricante'];
            $equi_marca = $_POST['equi_marca'];
            $equi_ubicacion = $_POST['equi_ubicacion'];
            $equi_fecha_compra = $_POST['equi_fecha_compra'];
            $equi_fecha_instalacion = $_POST['equi_fecha_instalacion'];
            $equi_vence_garantia = $_POST['equi_vence_garantia'];
            $cen_id = $_POST['cen_id'];

            //die(print_r($_FILES));
            $fotoEquipo = $_FILES['ruta']['name'];
            //Asigno el nombre de la foto segun numero de placa
            $equipo_foto = "Equipo-" . $fotoEquipo;
            //Hago un explode para capturar la extension de IMAGEN
            $fotoEquipo = explode(".", $_FILES['ruta']['name']);
            //die(print_r($fotoHerramienta));
            //Nombre de la foto con la extension capturada
            $nombreFoto = $equipo_foto . "." . end($fotoEquipo);
            //die($nombreFoto);

            $ruta = $_FILES['ruta']['tmp_name'];
            //Capturo la ruta donde guardare la Imagen
            $rutaydoc = getDocumentRoot() . "/web/media/img/Equipos/" . $nombreFoto;

            if ($ruta <> "") {
                if (move_uploaded_file($ruta, $rutaydoc)) {
                    
                }
            } else {
                $rutaydoc = NULL;
            }

            $area_id = $_POST['area_id'];
            $tequi_id = $_POST['tequi_id'];

            //Borramos de la tabla Equipo el siguiente campo tmed_id, ya que eso va en la tabla
            //Detalla nombrada pag_det_equipo_medidor
            $sqlEquipo = "INSERT INTO pag_equipo "
                    . "(equi_id, "
                    . "per_id, "
                    . "equi_nombre, "
                    . "est_id, "
                    . "cen_id, "
                    . "equi_foto, "
                    . "equi_valor_tmed, " //Campo Nuevo en la BD, aun no se coloca en el formulario, (¿Para que es?)
                    . "equi_fabricante, "
                    . "equi_marca, "
                    . "equi_modelo, "
                    . "equi_serie, "
                    . "equi_ubicacion, "
                    . "equi_fecha_compra, "
                    . "equi_fecha_instalacion, "
                    . "equi_vence_garantia, "
                    . "area_id, "
                    . "tequi_id ) VALUES("
                    . "'$equi_id', "
                    . "$per_id, "
                    . "'$equi_nombre', "
                    . "$est_id, "
                    . "$cen_id, "
                    . "'$nombreFoto', "
                    . "12000, " //Valo colocado para que ingrese a la BD, no viene del formulario, esta QUEMADO. (equi_valor_tmed)
                    . "'$equi_fabricante', "
                    . "'$equi_marca', "
                    . "'$equi_modelo', "
                    . "'$equi_serie', "
                    . "'$equi_ubicacion', "
                    . "'$equi_fecha_compra', "
                    . "'$equi_fecha_instalacion', "
                    . "'$equi_vence_garantia', "
                    . "$area_id, "
                    . "'$tequi_id' )";
            //die(print_r("<br>" . $sqlEquipo. "<br>"));


            $objEquipos = new EquiposModel();

            $insertar = $objEquipos->insertar($sqlEquipo);
            //die(print_r($insertar));
            if ($insertar == true) {
                //die(print_r("INSERTO"));
                foreach ($_POST['medidores'] as $medidor) {
                    $sql = "INSERT INTO pag_det_equipo_medidor (equi_id,tmed_id) "
                            . "values('$equi_id',$medidor)";
                    $insert = $objEquipos->insertar($sql);
                }
            } else {
                //die(print_r("NO INSERTO"));
            }
            // Cierra la conexion
            $objEquipos->cerrar();
        }
        echo getRespuestaAccion('listar');
    }

    function eliminar($parametros) {
        $objEquipos = new EquiposModel();

        $id = $parametros[1];

        $sql2 = "UPDATE pag_equipo SET estado = "
                . "NOW() WHERE equi_id='$id'";
        $equipos = $objEquipos->find($sql2);

        // Cierra la conexion
        $objEquipos->cerrar();
    }

    function detalle($parametros = false) {
        $objEquipos = new EquiposModel();
        $id = $parametros[1];

        $sql = "SELECT * FROM pag_equipo,pag_persona,pag_estado"
                . " WHERE pag_equipo.per_id=pag_persona.per_id "
                . "AND pag_equipo.est_id=pag_estado.est_id "
                . "AND tdoc_id=1 AND equi_id='$id'";

        $equipo = $objEquipos->find($sql);

        // Cierra la conexion
        $objEquipos->cerrar();

        include_once("../view/Equipos/equipos/detalle.html.php");
    }

    function listar() {
        include_once("../view/Equipos/equipos/consulta.html.php");
    }

    function buscarAjax() {
        $objEquipos = new EquiposModel();

        $buscarEquipo = $_POST['busquedaEquipos'];

        $sql = "SELECT * FROM pag_equipo WHERE equi_nombre LIKE '%" . $buscarEquipo . "%' or equi_id LIKE '%" . $buscarEquipo . "%' ORDER BY equi_id ASC ";
        $consultaEquipo = $objEquipos->select($sql);


        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('equipos', 'equipos', 'listar');

        //$paginado = new Paginado($consultaEquipo, $pagina, $url);
        //$consultaEquipo = $paginado->getDatos();


        $objEquipos->cerrar();

        include_once("../view/Equipos/equipos/listar.html.php");
    }

    public function listarTipoEquipo() {

        $objT_equipo = new equiposModel();


        //$sql5 = "select tequi_id, tequi_descripcion from pag_tipo_de_equipo WHERE estado = 0";
        $sql5 = "select tequi_id, tequi_descripcion from pag_tipo_equipo";
        $tEquipos = $objT_equipo->select($sql5);

        $objT_equipo->cerrar();

        include_once("../view/Equipos/equipos/consultaTipoEquipo.html.php");
    }

    public function tipoEquipo() {
        $objCp = new equiposModel();

        $campoP = $_POST['buscarTipoEquipo'];

        $sql = "SELECT * FROM pag_tipo_equipo WHERE tequi_descripcion LIKE '%" . $campoP . "%' or tequi_id LIKE '%" . $campoP . "%' ORDER BY tequi_id ASC ";
        $consultaCampoAjax = $objCp->select($sql);

        if ($consultaCampoAjax == true) {
            
        } else {
            ?>
            <center><code>No se encontraron registros.</code></center>
            <?php

        }

        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('equipos', 'equipos', 'tipoEquipo', array('noVista', $campoP));

        $paginado = new Paginado($consultaCampoAjax, $pagina, $url, 3);
        $consultaCampoAjax = $paginado->getDatos();

        $objCp->cerrar();


        include_once("../view/Equipos/equipos/tipoEquipo.html.php");
    }

    public function agregarMedida($parametros) {
        $objTIpoEquipo = new EquiposModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_tipo_equipo WHERE tequi_id='$id'";
        $nombreEquipo = $objTIpoEquipo->find($sql);
        //die(print_r($sql));

        $sqlCP = "SELECT * FROM pag_tipo_equipo,pag_campos_personalizados,pag_det_tipoEquipo_camposPersonalizados WHERE "
                . "pag_det_tipoEquipo_camposPersonalizados.tequi_id=pag_tipo_equipo.tequi_id AND "
                . "pag_det_tipoEquipo_camposPersonalizados.cp_id=pag_campos_personalizados.cp_id AND pag_det_tipoEquipo_camposPersonalizados.tequi_id='$id' ORDER BY pag_det_tipoEquipo_camposPersonalizados.cp_id ASC ";
        $consultaTipoEquipo = $objTIpoEquipo->select($sqlCP);

        //die(print_r($consultaTipoEquipo));
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('equipos', 'equipos', 'agregarMedida', array('noVista', $id));

        $paginado = new Paginado($consultaTipoEquipo, $pagina, $url);
        $consultaTipoEquipo = $paginado->getDatos();
        $objTIpoEquipo->cerrar();

        include_once('../view/Equipos/equipos/agregarValorTipoEquipo.html.php');
    }

    public function agregarValorCamposPersonalizados() {
        $id = $_POST['idTipoEquipo'];
        $valorCampos = $_POST['cantidad'];
        $codigo = $_POST['codigoCP'];
        foreach ($codigo as $codigoCP){
            echo $codigoCP;
        }
        
        foreach ($valorCampos as $cantidad) {
            echo $cantidad."<br>";
        }
        echo $id;
    }

}
