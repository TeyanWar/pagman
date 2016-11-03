<?php

include_once ('../model/Costos/costosModel.php');

class CostosController {

    function buscadorAjax() {

        $objReporteOt = new CostosModel();

        $OT = $_POST['OT'];
        $sql = "SELECT pag_orden_trabajo.ot_id, ot_horas_trabajadas, pag_equipo.equi_id, equi_nombre, pag_componente.comp_id, comp_descripcion, pag_insumo.ins_id, ins_nombre, ins_valor, pag_persona.per_id, per_nombre, per_valor_hora, per_valor_hora * ot_horas_trabajadas AS Total
            FROM pag_orden_trabajo, pag_equipo, pag_det_componente_ot, pag_componente, pag_det_insumo_ot, pag_insumo, pag_persona
            WHERE pag_orden_trabajo.equi_id = pag_equipo.equi_id
            AND pag_orden_trabajo.per_id = pag_persona.per_id
            AND pag_det_componente_ot.ot_id = pag_orden_trabajo.ot_id
            AND pag_det_componente_ot.comp_id = pag_componente.comp_id
            AND pag_det_insumo_ot.ot_id = pag_orden_trabajo.ot_id
            AND pag_det_insumo_ot.ins_id = pag_insumo.ins_id
            AND pag_orden_trabajo.ot_id LIKE '%" . $OT . "%'";

        $otRepors = $objReporteOt->select($sql);


        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('costos', 'costos', 'listar');

        $paginado = new Paginado($otRepors, $pagina, $url);

        $otRepors = $paginado->getDatos();

        if ($otRepors == true) {
            
        } else {
            echo "<b>'", $OT, "'</b>", " No se encontraron resultados para tu busqueda. . .";
        }

        $objReporteOt->cerrar();
        include_once("../view/Costos/costos/listar.html.php");
    }

    function listar() {

        include_once("../view/Costos/costos/buscador.html.php");
    }

    function Pdf() {


        require_once("../lib/pdf/dompdf_config.inc.php");

        $codigoHTML = '
        <html lang="es">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Reporte Ot</title>
        <style>
            table {
              border-collapse: collapse;
              border-spacing: 0;
            }

            ul li {
              list-style-type: none;
            }

            table, th, td {
              border: none;
            }

            table {
              width: 100%;
              display: table;
            }

            table.striped > tbody > tr:nth-child(odd) {
              background-color: #f2f2f2;
            }

            table.striped > tbody > tr > td {
              border-radius: 0px;
            }

            thead {
              border-bottom: 1px solid #d0d0d0;
            }

            td, th {
              padding: 15px 5px;
              display: table-cell;
              text-align: left;
              vertical-align: middle;
              border-radius: 2px;
            }
        </style>
        </head>
        <body>
        <table class="striped" cellspacing="0">
          <thead>
          <tr>
            <td colspan="9" ><CENTER><strong>REPORTE ORDENES DE TRABAJO</strong></CENTER></td>
          </tr>
          <tr>
                <th>C&oacute;digo Ot</th>
                <th>C&oacute;digo Equipo</th>
                <th>Nombre Equipo</th>
                <th>C&oacute;digo Componente</th>
                <th>Nombre Componente</th>
                <th>C&oacute;digo Insumo</th>
                <th>Nombre Insumo</th>
                <th>Valor Insumo</th>
                <th>C&oacute;digo Persona</th>
                <th>Nombre Persona</th>
                <th>Horas Trabajadas</th>
                <th>Valor Hora Persona</th>
                <th>Valor Total Horas</th>
            </tr>
          </thead>';

        //------------------------------------------------------------------
        $objReporOt = new CostosModel();
        ;

        $sql = "SELECT pag_orden_trabajo.ot_id, ot_horas_trabajadas, pag_equipo.equi_id, equi_nombre, pag_componente.comp_id, comp_descripcion, pag_insumo.ins_id, ins_nombre, ins_valor, pag_persona.per_id, per_nombre, per_valor_hora, per_valor_hora * ot_horas_trabajadas AS Total
            FROM pag_orden_trabajo, pag_equipo, pag_det_componente_ot, pag_componente, pag_det_insumo_ot, pag_insumo, pag_persona
            WHERE pag_orden_trabajo.equi_id = pag_equipo.equi_id
            AND pag_orden_trabajo.per_id = pag_persona.per_id
            AND pag_det_componente_ot.ot_id = pag_orden_trabajo.ot_id
            AND pag_det_componente_ot.comp_id = pag_componente.comp_id
            AND pag_det_insumo_ot.ot_id = pag_orden_trabajo.ot_id
            AND pag_det_insumo_ot.ins_id = pag_insumo.ins_id
            AND pag_orden_trabajo.ot_id";

        $datos = $objReporOt->select($sql);
        foreach ($datos as $dato) {
            $codigoHTML.='
            <tbody>
            <tr>
                    <td>' . $dato['ot_id'] . '</td>
                    <td>' . $dato['equi_id'] . '</td>
                    <td>' . $dato['equi_nombre'] . '</td>
                    <td>' . $dato['comp_id'] . '</td>
                    <td>' . $dato['comp_descripcion'] . '</td>
                    <td>' . $dato['ins_id'] . '</td>
                    <td>' . $dato['ins_nombre'] . '</td>
                    <td>' . $dato['ins_valor'] . '</td>
                    <td>' . $dato['per_id'] . '</td>
                    <td>' . $dato['per_nombre'] . '</td>
                    <td>' . $dato['ot_horas_trabajadas'] . '</td>
                    <td>' . $dato['per_valor_hora'] . '</td>
                    <td>' . $dato['Total'] . '</td>
            </tr>
            </tbody>';
        }
        // Cierra la conexion
        $objReporOt->cerrar();
        //------------------------------------------------------------------
        $codigoHTML.='
        </table>
        </body>
        </html>';
        $codigoHTML = utf8_encode($codigoHTML);
        $dompdf = new DOMPDF();
        $dompdf->set_paper("A4", "landscape");
        $dompdf->load_html($codigoHTML);
        ini_set("memory_limit", "128M");
        $dompdf->render();
        $dompdf->stream("OT.pdf");
    }

    function crear() {



        $objInsumos = new costosModel();
        $sql = "SELECT ins_id, ins_nombre, ins_valor FROM pag_insumo";
		$insumo = $objInsumos->select($sql); 
        
        $sql2 = "SELECT sum(ins_valor) as sumaTotal FROM pag_insumo";
        $totalInsumo = $objInsumos->select($sql2); 

        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('costos', 'costos', 'valTotalIns');

        $paginado = new Paginado($insumo, $pagina, $url);

        $insumo = $paginado->getDatos();

        $objInsumos->cerrar();
        include_once("../view/Costos/costos/valTotalIns.html.php");
    }

}
