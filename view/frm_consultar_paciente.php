<?php


    $sql = "SELECT PAC_CODIGO_PK, PAC_NOME, PAC_CPF, format(PAC_DATA_NASCIMENTO, 'dd/MM/yyyy') as DATA_FORMATADA, PAC_DATA_NASCIMENTO, PAC_SEXO, PAC_TELEFONE, PAC_EMAIL FROM PACIENTE ORDER BY PAC_CODIGO_PK DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $pacientes = $stmt->fetchAll(PDO::FETCH_OBJ);

    include 'modal_cad_paciente.php';
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
                        <h3 class="card-label">Pacientes
                        <!--<span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span></h3>-->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="#" class="btn btn-success font-weight-bolder" data-toggle="modal" data-target="#CadastrarPaciente">                   

                            <span>
                                <i class="la la-user-plus"></i>
                                <span>
                                    Novo Paciente
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
                                <th>CPF</th>
                                <th>Data Nascimento</th>
                                <th>Sexo</th>
                                <th>Telefone</th>     
                                <th>Email</th>                             
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($pacientes as $paciente):
                            include 'modal_excluir_paciente.php';
                            
                            
                            ?>                  
                            <tr>
                                <td><?=$paciente->PAC_NOME?></td>
                                <td><?=$paciente->PAC_CPF?></td>
                                <td><?=$paciente->DATA_FORMATADA?></td>
                                <td><?=$paciente->PAC_SEXO?></td> 
                                <td><?=$paciente->PAC_TELEFONE?></td>
                                <td><?=$paciente->PAC_EMAIL?></td>                                 
                                <td>
								    <a data-toggle="modal" href='#EditarPaciente<?=$paciente->PAC_CODIGO_PK;?>' class="btn btn-xs red far fa fa-edit" title="Editar"></i></a>                                    
								    <a data-toggle="modal" href='#ExcluirPaciente<?=$paciente->PAC_CODIGO_PK;?>' class="btn btn-xs red far fa-trash-alt" title="Excluir"></i></a>                                    
								</td>                   
                            </tr> 
                            
                        <?php 
                            include 'modal_editar_paciente.php';
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
            