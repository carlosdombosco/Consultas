<div class="modal fade" id="CadastrarTipoExame" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Cadastro de Tipos de Exames
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
                               <input type="text" class="form-control" name="nome" maxlength="100">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Descrição</label>
                               <textarea name="descricao" class="form-control" id="" rows="5" maxlength="256"></textarea>
                        </div>
                    </div>
                  
                    <input type="hidden" name="acao" value="cadastrar_tipo_exame">
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


