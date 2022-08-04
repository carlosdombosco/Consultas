<?php
/*
    $sql = "SELECT PAC_CODIGO_PK, PAC_NOME FROM PACIENTE WHERE PAC_CODIGO_PK = ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $exames = $stmt->fetchAll(PDO::FETCH_OBJ);
*/
?>

<script>
        $(document).ready(function(){
        $('#tipo_exame').change(function(){
            $('#exame').load('exames.php?tipo_exame='+$('#tipo_exame').val());
        });
        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

        
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    

                <div class="row">
            <div class="col-xl">
                <!--begin:: Form consultar cliente-->
                <div class="m-portlet m-portlet--mobile">
						    <!--begin::Portlet-->
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													CADASTRO DE SCRIPTS 
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										

                                        <!-- CONTEÚDO DO FORMULÁRIO DE CADASTRO -->
                                        <form action="action.php" method="post">
										    <div class="tab-content">
                                                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                                                        <div class="row">                                                                                                                      
                                                            <div class="col-md-12">
                                                            <label>Tipo de exame</label>                              
                                                                <select class="form-control m-input" name="tipo_exame" id="tipo_exame" required>
                                                                    <option value="">Selecione...</option>
                                                                    <?php 
                                                                        $sql_tipo = "SELECT TIE_CODIGO_PK, TIE_NOME FROM TIPO_EXAME ORDER BY TIE_NOME ASC";
                                                                        $stm = $conn->prepare($sql_tipo);
                                                                        $stm->execute();
                                                                        $tipos = $stm->fetchAll(PDO::FETCH_OBJ);
                                                                        foreach ($tipos as $tipo) { ?> 
                                                                        <option value="<?=$tipo->TIE_CODIGO_PK?>" ><?=$tipo->TIE_NOME?></option> 
                                                                    <?php }
                                                                    ?> 
                                                                </select>  
                                                            </div>

                                                            <div class="col-md-12"><br>                                                                                                            
                                                                <label>Exame</label>
                                                                    <select class="form-control m-input" id="exame" name="exame" required>
                                                                        <option value="">Selecione...</option>
                                                                    </select>
                                                            </div> 
                                                        </div>
                                                        <br><br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="hidden" name="acao" value="cadastrar_script">
                                                                <a href="index.php" class="btn m-btn--pill btn-secondary">Cancelar</a>
                                                                <button type="submit" class="btn m-btn--pill btn-primary">Salvar</button>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                    </div>         
                                                                                         
                                                </form>
											<div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
												

                                            

                                            
                                    
											</div>
										</div> <!-- FIM DO FORMULÁRIO DE CADASTRO -->
							
									    </div>
									</div>
								</div>
								<!--end::Portlet-->

						</div>
					</div>
                <!--end:: Form consultar cliente-->
            </div>
        </div>

                    
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
            