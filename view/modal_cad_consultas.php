<script>
        $(document).ready(function(){
        $('#tipo_exame').change(function(){
            $('#exame').load('exames.php?tipo_exame='+$('#tipo_exame').val());
        });
        });
</script>

<div class="modal fade" id="CadastrarConsulta" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Agendar Consultas - Paciente: <label id="paciente"></label>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/cadastrar.php" method="post">
                    <div class="form-group row">
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
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Data</label>
                               <input type="date" class="form-control" name="data" required>
                        </div>
                        <div class="col-md-6">
                            <label>Hora</label>
                               <input type="time" class="form-control" name="hora" required>
                        </div>
                    </div>
                 
                    <input type="hidden" name="acao" value="cadastrar_consulta">
                    
                    <input type="hidden" name="paciente" id="codigo_paciente">
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>


