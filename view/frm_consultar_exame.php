<?php

    $sql = "SELECT E.*, T.TIE_NOME  FROM EXAME E
    INNER JOIN TIPO_EXAME T ON E.EXA_TIE_CODIGO_FK = T.TIE_CODIGO_PK
    ORDER BY E.EXA_NOME ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $exames = $stmt->fetchAll(PDO::FETCH_OBJ);

    include 'modal_cad_exame.php';
?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Exames
                        <!--<span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span></h3>-->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="#" class="btn btn-success font-weight-bolder" data-toggle="modal" data-target="#CadastrarExame">                   

                            <span>
                                <i class="la la-plus"></i>
                                <span>
                                    Novo
                                </span>
                            </span>
                        </a>                        

                    </div>

                    
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
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
                                <th>Nome</th>
                                <th>Tipo</th>                           
                                <th>Observação</th>                           
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($exames as $exame):
                              include 'modal_excluir_exame.php';
                            
                            
                            ?>                  
                            <tr>
                                <td><?=$exame->EXA_NOME?></td>
                                <td><?=$exame->TIE_NOME?></td>                             
                                <td><?=$exame->EXA_OBSERVACAO?></td>                             
                                <td>
								    <a data-toggle="modal" href='#EditarExame<?=$exame->EXA_CODIGO_PK;?>' class="btn btn-xs red far fa fa-edit" title="Editar"></i></a>                                    
								    <a data-toggle="modal" href='#ExcluirExame<?=$exame->EXA_CODIGO_PK;?>' class="btn btn-xs red far fa-trash-alt" title="Excluir"></i></a>                                    
								</td>                   
                            </tr> 
                            
                        <?php 
                            include 'modal_editar_exame.php';
                            endforeach;
                        ?>    
                            
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>


<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<script src="assets/js/pages/crud/ktdatatable/base/html-table.js"></script>

<!-- SCRIPT DE VALIDAÇÃO -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
<script src="js/validation.js"></script>
            