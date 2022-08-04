<div class="modal fade" id="EditarTipo<?=$tipo->TIE_CODIGO_PK;?>"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Tipos de Exames: <?=$tipo->TIE_NOME?>
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
                            <label>Nome</label>
                               <input type="text" class="form-control" name="nome" max="100" value="<?=$tipo->TIE_NOME?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Descrição</label>
                               <textarea name="descricao" class="form-control" id="" rows="5"><?=$tipo->TIE_DESCRICAO?></textarea>
                        </div>
                    </div>
                  
                    <input type="hidden" name="acao" value="editar_tipo_exame">
                    <input type="hidden" name="CODIGO" value="<?=$tipo->TIE_CODIGO_PK?>">
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


