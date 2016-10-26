<?php
include_once '../model/Grafico/graficoModel.php';

class graficoController {

    function Vergrafico() {
        //---------consulta para aplicarlos en el grafico de mantenimientos preventivos-------
        $año = $_POST['año'];
        $objGraf = new GraficoModel();

            $siestd = "SELECT COUNT(*) AS tsi FROM pag_orden_trabajo "
                    . "WHERE pag_orden_trabajo.estandar='Si cumple' "
                    . "AND pag_orden_trabajo.id_mantenimiento IS NOT NULL "
                    . "AND pag_orden_trabajo.estandar IS NOT NULL "
                    . "AND pag_orden_trabajo.estado IS NULL "
                    . "AND YEAR(ot_fecha_creacion)='$año' "
                    . "ORDER BY pag_orden_trabajo.ot_id";

            $si = $objGraf->find($siestd);
            //-------------------------------------------------------
            $nosmant = "SELECT COUNT(*) AS tno FROM pag_orden_trabajo "
                    . "WHERE pag_orden_trabajo.estandar='No cumple' "
                    . "AND pag_orden_trabajo.id_mantenimiento IS NOT NULL "
                    . "AND pag_orden_trabajo.estandar IS NOT NULL "
                    . "AND pag_orden_trabajo.estado IS NULL "
                    . "AND YEAR(ot_fecha_creacion)='$año' "
                    . "ORDER BY pag_orden_trabajo.ot_id";

            $no = $objGraf->find($nosmant);

            //----------------------------------------------------------
            $totalUni=($si['tsi']+$no['tno']);

            //-----------porcentaje los que si cumplen------------------
            $Svalort = (($si['tsi']/$totalUni)*100);
            $porS = round($Svalort, 1);
            //-----------porcentaje los que no cumplen------------------
            $Nvalotal = (($no['tno']/$totalUni)*100);
            $porN = round($Nvalotal, 1);
        // Cierra la conexion
        $objGraf->cerrar();

        $porcentajes = array(0 => $porS,1 => $porN);
        echo json_encode($porcentajes);
    //--------------------------fin grafico de mantenimientos preventivos------------------
    }
    
    
}
