<?php

    $sql = "SELECT P.PAC_NOME, T.TIE_NOME, E.EXA_NOME, format(CON_DATA, 'dd/MM/yyyy') AS DATA, C.CON_TIE_CODIGO_FK, C.CON_EXA_CODIGO_FK, C.CON_CODIGO_PK, C.CON_DATA, FORMAT(CON_HORA, N'hh\:mm') AS CON_HORA, C.CON_PROTOCOLO FROM CONSULTA C
    INNER JOIN EXAME E ON C.CON_EXA_CODIGO_FK = E.EXA_CODIGO_PK
    INNER JOIN TIPO_EXAME T ON C.CON_TIE_CODIGO_FK = T.TIE_CODIGO_PK
    INNER JOIN PACIENTE P ON C.CON_PAC_CODIGO_FK = P.PAC_CODIGO_PK ORDER BY CON_CODIGO_PK DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $consultas = $stmt->fetchAll(PDO::FETCH_OBJ);

    include 'modal_cad_exame.php';
?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Consultas
                    </div>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline mr-2">
                            
                        </div>
                        <a href="filtro_paciente.php" class="btn btn-success font-weight-bolder">                   

                            <span>
                                <i class="la la-plus"></i>
                                <span>
                                    Nova Consulta
                                </span>
                            </span>
                        </a>                        

                    </div>
                   
                </div>
                <div class="card-body">
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Pesquisar..." id="kt_datatable_search_query" />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Paciente</th>
                                <th>Tipo Exame</th>                           
                                <th>Exame</th>                           
                                <th>Data</th>                    
                                <th>Hora</th>                           
                                <th>Protocolo</th>                           
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($consultas as $consulta):
                              include 'modal_excluir_consulta.php';
                            
                            ?>                  
                            <tr>
                                <td><?=$consulta->CON_CODIGO_PK?></td>
                                <td><?=$consulta->PAC_NOME?></td>
                                <td><?=$consulta->TIE_NOME?></td>                             
                                <td><?=$consulta->EXA_NOME?></td>                             
                                <td><?=$consulta->DATA?></td>                             
                                <td><?=$consulta->CON_HORA?></td>                             
                                <td><?=$consulta->CON_PROTOCOLO?></td>                             
                                <td>
								    <a data-toggle="modal" href='#EditarConsulta<?=$consulta->CON_CODIGO_PK;?>' class="btn btn-xs red far fa fa-edit" title="Editar"></i></a>                                    
								    <a data-toggle="modal" href='#ExcluirConsulta<?=$consulta->CON_CODIGO_PK;?>' class="btn btn-xs red far fa-trash-alt" title="Excluir"></i></a>                                    
								</td>                   
                            </tr> 
                            
                        <?php 
                            include 'modal_editar_consultas.php';
                            endforeach;
                        ?>    
                            
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="assets/js/pages/crud/ktdatatable/base/html-table.js"></script>

<!-- SCRIPT DE VALIDAÇÃO -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
<script src="js/validation.js"></script>
            