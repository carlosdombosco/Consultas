<script>
        $(document).ready(function(){
        $('#tipo_exame').change(function(){
            $('#exame').load('exames.php?tipo_exame='+$('#tipo_exame').val());
        });
        });
</script>

<div class="modal fade" id="EditarConsulta<?=$consulta->CON_CODIGO_PK;?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Consulta <br>
                    Paciente: <?=$consulta->PAC_NOME?><br>
                    Protocolo Nº: <?=$consulta->CON_PROTOCOLO?>         
                </h5>
             

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/editar.php" method="post">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Tipo de exame</label>                              
                                <select class="form-control m-input" name="tipo_exame" id="tipo_exame" required>
                                    <option value="<?=$consulta->CON_TIE_CODIGO_FK?>"><?=$consulta->TIE_NOME?></option>
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
                                        <option value="<?=$consulta->CON_EXA_CODIGO_FK?>"><?=$consulta->EXA_NOME?></option>
                                    </select>
                            </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Data</label>
                               <input type="date" class="form-control" name="data" value="<?=$consulta->CON_DATA?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Hora</label>
                               <input type="time" class="form-control" name="hora" value="<?=$consulta->CON_HORA?>" required>
                        </div>
                    </div>
                 
                    <input type="hidden" name="acao" value="editar_consulta">                    
                    <input type="hidden" name="CODIGO" value="<?=$consulta->CON_CODIGO_PK?>">
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>


