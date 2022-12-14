  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Administrador de usuarios</h1>
<p class="mb-4">En esta tabla se mostrara todos los usuarios del sistema </p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de usuarios</h6>
    </div>
                          
    <div class="card-body">
                            <span class="float-right" data-toggle="tooltip" data-placement="top" title="Nuevo usuario">
                                <button type="button" class="btn float-left bg-primary text-white" data-toggle="modal" data-target="#insertarUsuario">
                                <i class="fas fa-plus"></i> 
                                </button>
                            </span>
                            <br>
                            <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Fecha Registro</th>
                        <th>Fecha Actualizacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Fecha Registro</th>
                        <th>Fecha Actualizacion</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                                    <?php
                                    $num = 1;
                                    foreach ($infoUsuarios->result() as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $num;?></td>
                                            <td>
                                              <?php
                                              $foto=$row->imagen;
                                              if($foto==""){
                                                //mostrar imagen por defecto
                                                ?>
                                                <img width="100" src="<?php echo base_url(); ?>/uploads/usuarios/perfil.png" alt="">

                                                <?php

                                               
                                              }else{
                                                //mostrar la foto del usuario
                                                ?>
                                                <img width="100" src="<?php echo base_url(); ?>/uploads/usuarios/<?php echo $foto; ?>" alt="">
                                                <?php

                                              }
                                              ?>
                                            </td>
                                            <td><?php echo $row->nombres; ?></td>
                                            <td><?php echo $row->apellidopat; ?></td>
                                            <td><?php echo $row->apellidomat; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td>
                                                <?php
                                                if ($row->Estado == '1') {
                                                ?>
                                                   <span class="badge bg-success text-white">HABILITADO</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <span class="badge bg-danger text-white" >DESHABILITADO</span>
                                                        <?php
                                                    }
                                                        ?>
                                            </td>
                                            <td>
                                            <?php
                                                if ($row->idRol == '1') {
                                                ?>
                                                   <span class="badge bg-info text-white">Administrador</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <span class="badge bg-info text-white" >Distribuidor</span>
                                                        <?php
                                                    }
                                                        ?>
                                                   

                                            </td>
                                            <td ><?php echo formatearFecha($row->fechaRegistro); ?></td>
                                             <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>
                                             <td>
                                                    <div class="row">
                                                    <div class="col-md-6 col-6">
                                                        <!--<button class="btn btn-block btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></button>-->
                                                        <span data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <button type="button" class="btn btn-block btn-sm btn-info" data-toggle="modal" data-target="#editarUsuario<?php echo $row->idUsuario; ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <?php
                                                        if ($row->Estado == "1") {
                                                        ?>
                                                            <!--<button class="btn btn-block btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></button>-->
                                                            <span data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                                <button type="button" class="btn btn-block btn-sm btn-danger" data-toggle="modal" data-target="#eliminarUsuario<?php echo $row->idUsuario; ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <!--<button class="btn btn-block btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Restaurar"><i class="fas fa-trash-restore"></i></button>-->
                                                            <span data-toggle="tooltip" data-placement="top" title="Restaurar">
                                                                <button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#restaurarUsuario<?php echo $row->idUsuario; ?>">
                                                                    <i class="fas fa-trash-restore"></i>
                                                                </button>
                                                            </span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </td>
                                                                      
                                        </tr>
                                    <?php
                                    $num++;
                                    }

                                    ?>
                                </tbody>
            </table>
        </div>
    </div>
</div>

   <!-- MODAL PARA INSERTAR -->
   <div class="modal fade" id="insertarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-white bg-primary">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>index.php/usuarios/store" method="post" class="needs-validation" autocomplete="off" novalidate>
                            <div class="mb-3">
                                <label for="">Nombre:</label>
                                <input type="text" class="form-control text-uppercase" name="Nombre" data-toggle="tooltip" 
                                    data-placement="left" title="Nombre del Usuario" placeholder="Nombre del Usuario" required>
                                <div class="valid-feedback">OK.</div>
                                <div class="invalid-feedback">Es necesario el nombre del Usuario.</div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                            <label for="">Apellido Paterno:</label>
                                            <input type="text" class="form-control text-uppercase" name="ApellidoPaterno" 
                                                data-toggle="tooltip" data-placement="left" title="Apellidos" placeholder="Apellido paterno" required>
                                        <div class="valid-feedback">OK.</div>
                                        <div class="invalid-feedback">Es necesario el apellido paterno.</div>
                                    </div>
                                      <div class="col-md-6">
                                            <label for="">Apellido Materno:</label>
                                            <input type="text" class="form-control text-uppercase" name="ApellidoMaterno" data-toggle="tooltip" 
                                                data-placement="left" title="Apellidos" placeholder="Apellido paterno">
                                        <div class="valid-feedback">OK.</div>
                                        <div class="invalid-feedback">Es necesario el apellido materno.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                        <div class="col-md-6">
                                             <label for="">Sexo:</label>
                                        <select class="form-control" name="Sexo" data-toggle="tooltip" data-placement="left" title="Sexo" required>
                                            <option value selected>Seleccionar</option>
                                                <option value="F">FEMENINO</option>
                                                <option value="M">MASCULINO</option>
                                        </select>
                                            <div class="valid-feedback">OK.</div>
                                            <div class="invalid-feedback">Es necesario seleccionar una opcion.</div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="">Correo:</label>
                                        <input type="text-uppercase" class="form-control text-uppercase" name="Correo" data-toggle="tooltip" data-placement="left" title="Direcci??n" placeholder="Correo" required>
                                        <div class="valid-feedback">OK.</div>
                                         <div class="invalid-feedback">Es necesario el correo electronico.</div>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Cedula:</label>
                                        <input type="text-uppercase" class="form-control text-uppercase" name="Cedula" data-toggle="tooltip" data-placement="left" title="Direcci??n" placeholder="Cedula" required>
                                        <div class="valid-feedback">OK.</div>
                                         <div class="invalid-feedback">Es necesario la cedula de identidad.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Telefono:</label>
                                        <input type="text-uppercase" class="form-control text-uppercase" name="Telefono" data-toggle="tooltip" data-placement="left" title="Direcci??n" placeholder="Telefono" required>
                                        <div class="valid-feedback">OK.</div>
                                         <div class="invalid-feedback">Es necesario el el numero de telefono.</div>
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                               <div class="col-md-6">
                                             <label for="">Rol:</label>
                                                <select name="rol" id="rol" class="form-control" data-toggle="tooltip" data-placement="left" title="Rol" required>
                                                    <?php foreach($roles as $rol):?>
                                                        <option value="<?php echo $rol->idRol;?>"><?php echo $rol->nombre;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            <div class="valid-feedback">OK.</div>
                                            <div class="invalid-feedback">Es necesario seleccionar una opcion.</div>
                                </div>
                                  
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3 float-right">
                                <button type="reset" class="btn btn-dark">Limpiar formulario</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php
        foreach ($infoUsuarios->result() as $row) {
        ?>
            <!--MODAL PARA ACTUALIZAR-->
            <div class="modal fade" id="editarUsuario<?php echo $row->idUsuario; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="<?php echo base_url(); ?>index.php/usuarios/update" method="post" class="needs-validation" autocomplete="off" novalidate>
                                <div class="mb-3">
                                    <label for="">Nombre:</label>
                                    <input type="text" class="form-control text-uppercase" value="<?php echo htmlspecialchars($row->nombres); ?>" name="Nombre" data-toggle="tooltip" data-placement="left" title="Nombre del Usuario" placeholder="Nombre del Usuario" required>
                                    <div class="valid-feedback">OK.</div>
                                    <div class="invalid-feedback">Es necesario el nombre del Usuario.</div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                                <label for="">Apellido Paterno:</label>
                                                <input type="text" class="form-control text-uppercase" value="<?php echo htmlspecialchars($row->apellidopat); ?>" name="ApellidoPaterno" data-toggle="tooltip" data-placement="left" title="Apellido paterno" placeholder="Apellido paterno" required>
                                            <div class="valid-feedback">OK.</div>
                                            <div class="invalid-feedback">Es necesario el apellido paterno.</div>
                                        </div>
                                         <div class="col-md-6">
                                                <label for="">Apellido Materno:</label>
                                                <input type="text" class="form-control text-uppercase" value="<?php echo htmlspecialchars($row->apellidomat); ?>" name="ApellidoMaterno" data-toggle="tooltip" data-placement="left" title="Apellido paterno" placeholder="Apellido paterno" required>
                                            <div class="valid-feedback">OK.</div>
                                            <div class="invalid-feedback">Es necesario el apellido paterno.</div>
                                        </div>
                                  
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Sexo:</label>
                                            <select class="form-control" name="Sexo" data-toggle="tooltip" data-placement="right" title="Sexo" required>
                                            <option value="F">FEMENINO</option>
                                                <option value="M">MASCULINO</option>
                                            </select>
                                            <div class="valid-feedback">OK.</div>
                                            <div class="invalid-feedback">Es necesario seleccionar este campo.</div>
                                        </div>
                                        <div class="col-md-6">
                                             <label for="">Cedula:</label>
                                                <input type="input" class="form-control text-uppercase" value="<?php echo htmlspecialchars($row->Cedula); ?>" name="Cedula" data-toggle="tooltip" data-placement="left" title="Cedula" placeholder="Cedula" required>
                                            <div class="valid-feedback">OK.</div>
                                            <div class="invalid-feedback">Es necesario la cedula de identidad.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                             <label for="">Telefono:</label>
                                                <input type="input" class="form-control text-uppercase" value="<?php echo htmlspecialchars($row->Telefono); ?>" name="Telefono" data-toggle="tooltip" data-placement="left" title="Cedula" placeholder="Cedula" required>
                                            <div class="valid-feedback">OK.</div>
                                            <div class="invalid-feedback">Es necesario la cedula de identidad.</div>
                                        </div>
                                    <div class="col-md-6">
                                        <label for="">Correo:</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($row->email); ?>" name="Correo" data-toggle="tooltip" data-placement="Bottom" title="Correo" placeholder="nombre del Usuario" required>
                                        <div class="valid-feedback">OK.</div>
                                        <div class="invalid-feedback">Es necesario el correo electronico.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                               <div class="col-md-6">
                                             <label for="">Rol:</label>
                                        <select class="form-control" name="Rol" data-toggle="tooltip" data-placement="left" title="Rol" required>
                                                    <?php foreach($roles as $rol):?>
                                                        <option value="<?php echo $rol->idRol;?>"><?php echo $rol->nombre;?></option>
                                                    <?php endforeach;?>
                                        </select>
                                            <div class="valid-feedback">OK.</div>
                                            <div class="invalid-feedback">Es necesario seleccionar una opcion.</div>
                                </div>
                                
                                </div>
                            </div>
                                <hr>
                                <div class="mb-3 float-right">
                                    <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--MODAL PARA ELIMINAR-->
            <div class="modal fade" id="eliminarUsuario<?php echo $row->idUsuario; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Esta segur@ de eliminar al Usuario "<?php echo $row->nombres; ?>".</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <?php
                            echo form_open_multipart('usuarios/deleteRestorebd');
                            ?>
                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                            <input type="hidden" name="estado" value="0">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Continuar
                            </button>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--MODAL PARA RESTAURAR-->
            <div class="modal fade" id="restaurarUsuario<?php echo $row->idUsuario; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-success">
                            <h5 class="modal-title" id="exampleModalLabel">Recuperar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Esta segur@ de restaurar al Usuario "<?php echo $row->nombres; ?>".</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <?php
                            echo form_open_multipart('usuarios/deleteRestorebd');
                            ?>
                            <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                            <input type="hidden" name="estado" value="1">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-trash-restore"></i> Continuar
                            </button>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->