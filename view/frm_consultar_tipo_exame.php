<?php

    $sql = "SELECT * FROM TIPO_EXAME ORDER BY TIE_NOME ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tipos = $stmt->fetchAll(PDO::FETCH_OBJ);

    include 'modal_cad_tipo_exame.php';
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
                        <h3 class="card-label">Tipos de Exames
                        <!--<span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span></h3>-->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="#" class="btn btn-success font-weight-bolder" data-toggle="modal" data-target="#CadastrarTipoExame">                   

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
                                <th>Descrição</th>                           
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($tipos as $tipo):?>                  
                            <tr>
                                <td><?=$tipo->TIE_NOME?></td>
                                <td><?=$tipo->TIE_DESCRICAO?></td>                             
                                <td>
								    <a data-toggle="modal" href='#EditarTipo<?=$tipo->TIE_CODIGO_PK;?>' class="btn btn-xs red far fa fa-edit" title="Editar"></i></a>                                    
								    <a data-toggle="modal" href='#ExcluirTipoExame<?=$tipo->TIE_CODIGO_PK;?>' class="btn btn-xs red far fa-trash-alt" title="Excluir"></i></a>                                    
								</td>                   
                            </tr> 
                            
                        <?php 
                          include 'modal_excluir_tipo_exame.php';
                          include 'modal_editar_tipo_exame.php';                          
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
