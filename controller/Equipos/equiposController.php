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
        
        foreach($medidores as $key=>$medidor){
            $medidores[$key]['checkeado']='';
            foreach($medidoresDet as $medidorDet){
                if($medidor['tmed_id']==$medidorDet['tmed_id']){
                    $medidores[$key]['checkeado']='checked';
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

        $equi_noplaca = $_POST['equi_noplaca'];
        $per_id = $_POST['per_id'];
        $equi_nombre = $_POST['equi_nombre'];
        $equi_estado = $_POST['equi_estado'];
        $equi_modelo = $_POST['equi_modelo'];
        $equi_noserie = $_POST['equi_noserie'];
        $equi_fabricante = $_POST['equi_fabricante'];
        $equi_marca = $_POST['equi_marca'];
        $equi_ubicacion = $_POST['equi_ubicacion'];
        $equi_fecha_compra = $_POST['equi_fecha_compra'];
        $equi_fecha_instala = $_POST['equi_fecha_instala'];
        $equi_vence_garantia = $_POST['equi_vence_garantia'];

        $objEquipos = new EquiposModel();

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
                . "equi_fecha_instalacion='$equi_fecha_instala', "
                . "equi_vence_garantia='$equi_vence_garantia' "
                . "WHERE equi_id='$equi_noplaca'";

//         die(print_r($sql));

        $respuesta = $objEquipos->update($sql);
        if ($respuesta) {
            $sqlEliminar = "delete from pag_det_equipo_medidor where equi_id='$equi_noplaca'";
            $eliminar = $objEquipos->delete($sqlEliminar);
            foreach ($_POST['medidores'] as $medidor) {
                $sql = "INSERT INTO pag_det_equipo_medidor (equi_id,tmed_id) "
                        . "values('$equi_noplaca',$medidor)";
                $insert = $objEquipos->insertar($sql);
            }
        }

        // Cierra la conexion
        $objEquipos->cerrar();

        redirect(crearUrl("equipos", "equipos", "listar"));
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

        //$sql5 = "select tequi_id, tequi_descripcion from pag_tipo_de_equipo WHERE estado = 0";
        $sql5 = "select tequi_id, tequi_descripcion from pag_tipo_equipo";
        $tEquipos = $objT_equipo->select($sql5);

        $sql6 = "SELECT * from pag_tipo_medidor where estado IS NULL";
        $medidores = $objMedidores->select($sql6);

        $objPersona->cerrar();
        $objEstado->cerrar();
        $objCentro->cerrar();
        $objArea->cerrar();
        $objT_equipo->cerrar();
        $objMedidores->cerrar();


        include_once("../view/Equipos/equipos/crear.html.php");
    }

    function postCrear() {
        //--------expresiones regulares--------------------
        $errores = array();
        $patronNumeros = "/[0-9]{1,9}(\.[0-9]{0,2})?$/";
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";

        //-----------------validaciones--------------------

        if (!isset($_POST['equi_id']) or $_POST['equi_id'] == "") {
            $errores[] = '(*) El campo "N.Placa" es obligatorio';
        }
        //-------------------------------------------------------------
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
        //-------------------------------------------------------------

        if (!isset($_POST['per_id']) or $_POST['per_id'] == "") {
            $errores[] = '(*) El campo "Encargado" es obligatorio';
        }

        if (!isset($_POST['equi_nombre']) or $_POST['equi_nombre'] == "") {
            $errores[] = '(*) El campo "Nombre Del Equipo" es obligatorio';
        }
        if (isset($_POST['equi_nombre']) && !preg_match($patronLetras, $_POST['equi_nombre'])) {
            $errores[] = '(*) El campo "Nombre Del Equipo" debe contener letras unicamente';
        }

        if (!isset($_POST['est_id']) or $_POST['est_id'] == "") {
            $errores[] = '(*) El campo "Estado Del Equipo" es obligatorio';
        }

        if (!isset($_POST['equi_modelo']) or $_POST['equi_modelo'] == "") {
            $errores[] = '(*) El campo "Modelo" es obligatorio';
        }

        if (!isset($_POST['equi_serie']) or $_POST['equi_serie'] == "") {
            $errores[] = '(*) El campo "No. Serie" es obligatorio';
        }

        if (!isset($_POST['equi_fabricante']) or $_POST['equi_fabricante'] == "") {
            $errores[] = '(*) El campo "Fabricante" es obligatorio';
        }

        if (!isset($_POST['equi_marca']) or $_POST['equi_marca'] == "") {
            $errores[] = '(*) El campo "Marca" es obligatorio';
        }

        if (!isset($_POST['equi_ubicacion']) or $_POST['equi_ubicacion'] == "") {
            $errores[] = '(*) El campo "Ubicacion" es obligatorio';
        }

        if (!isset($_POST['equi_fecha_compra']) or $_POST['equi_fecha_compra'] == "") {
            $errores[] = '(*) El campo "Fecha De Compra" es obligatorio';
        }
        if (!isset($_POST['equi_fecha_instalacion']) or $_POST['equi_fecha_instalacion'] == "") {
            $errores[] = '(*) El campo "Fecha De Instalacion" es obligatorio';
        }

        if (!isset($_POST['equi_vence_garantia']) or $_POST['equi_vence_garantia'] == "") {
            $errores[] = '(*) El campo "Vecimiento De Garantia" es obligatorio';
        }
        if (!isset($_POST['cen_id']) or $_POST['cen_id'] == "") {
            $errores[] = '(*) El campo "Centro De Formacion" es obligatorio';
        }

        if (!isset($_POST['tequi_id']) or $_POST['tequi_id'] == "") {
            $errores[] = '(*) El campo "Tipo De Equipo" es obligatorio';
        }

        if (!isset($_POST['area_id']) or $_POST['area_id'] == "") {
            $errores[] = '(*) El campo "Area" es obligatorio';
        }
        if (!isset($_POST['medidores']) or $_POST['medidores'] == "") {
            $errores[] = '(*) Añadir los medidores es Obligatorio';
        }
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl("equipos", "equipos", "crear"));
            //----------------fin validaciones-----------------
        }

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

        redirect(crearUrl("equipos", "equipos", "listar"));
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

}
