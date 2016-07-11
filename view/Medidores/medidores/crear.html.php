<div class="card-panel"> 
    <div class="container">
        <form role="form" action="<?php echo crearUrl('medidores', 'medidores', 'postCrear') ?>" method="post">
            <h4 class="header2">Crear T&iacute;po de Medidor</h4>
            <!--Inicio rastro de miga-->
            <ol class="breadcrumbs">
                <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                <li><a href="#">Medidores</a></li>
                <li class="active">Crear T&iacute;po de medidor</li>
            </ol>
            <!--Fin rastro de miga-->

            <!--Inicio mensaje de campos obligatorios-->
            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Fin mensaje de campos obligatorios-->

            <div class="row">
                <div class="input-field col s6">
                    <input id="nombre" name="nombre" type="text" class="validate" length="20" required="true">
                    <label for="nombre">&nbsp;(*) Nombre del medidor</label>
                </div>

                <div class="input-field col s6">
                    <input id="acronimo" name="acronimo" type="text" class="validate" length="3" required="true">
                    <label for="acronimo">&nbsp;(*) Acr&oacute;nimo</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <select name="estado" id="estado" required="true">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                    <label>&nbsp;(*) Estado</label>
                </div>

                <div class="input-field col s6">
                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="100" required="true"></textarea>
                    <label for="descripcion">&nbsp;(*) Descripci&oacute;n</label>
                </div>

                <button class="btn teal waves-effect waves-light right" type="submit" name="action" onclick="Materialize.toast('¡Registro exitos!', 4000, 'rounded')">
                    Crear medidor
                    <i class="mdi-content-add left"> </i>
                </button>
            </div>
        </form>
    </div>
</div>