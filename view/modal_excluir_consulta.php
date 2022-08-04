<div class="modal fade" id="ExcluirConsulta<?=$consulta->CON_CODIGO_PK;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="../controller/excluir.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir Consulta Nº : <?php echo $consulta->CON_CODIGO_PK?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                       Confirma exclusão do paciente?
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="acao" value="excluir_consulta">
                        <input type="hidden" name="CODIGO" value="<?=$consulta->CON_CODIGO_PK?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Sim</button>
                    </div>
                </form>                                            
            </div>
        </div>
    </div>