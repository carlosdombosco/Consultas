<div class="modal fade" id="CadastrarExame" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Cadastro de Exames
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
                            <label>Nome</label>
                               <input type="text" class="form-control" name="nome" maxlength="100" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Tipo de exame</label>                              
                                <select name="tipo_exame" class="form-control" required> 
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
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Observação</label>
                               <textarea name="observacao" class="form-control" id="" rows="5"  maxlength="1000"></textarea>
                        </div>
                    </div>
                 
                    <input type="hidden" name="acao" value="cadastrar_exame">
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fechar
                </button>
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


