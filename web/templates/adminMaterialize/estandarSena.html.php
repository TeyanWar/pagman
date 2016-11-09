<table style="border: 1px solid black;">
    <tr>
        <th style="border: 1px solid black;">
    <center><img src="<?php echo addLib('img/sena/logo_sena.jpg') ?>" style="width: 100px;"></center>
        </th>
        <th style="border: 1px solid black;">
    <center><h5>Especificaciones</h5></center>
        </th>
        <td style="border: 1px solid black;">
                <b>Fecha:</b> <?php
                $time = time();
                echo "<font face='arial'>" . date("d-m-Y");
                ?><br>
                <b>Usuario: </b><?php echo $_SESSION['login']['rol_nombre']; ?>
        </td>
    </tr>

</tr>
</table>

