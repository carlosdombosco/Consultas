<div class="modal fade" id="EditarPaciente<?=$paciente->PAC_CODIGO_PK;?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Alterar Paciente: <?=$paciente->PAC_NOME?>
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
                               <input type="text" class="form-control" name="nome" value="<?=$paciente->PAC_NOME?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label>CPF</label>
                               <input type="text" class="form-control" name="cpf" value="<?=$paciente->PAC_CPF?>">
                        </div>
                        <div class="col-md-4">
                            <label>Data Nascimento</label>
                               <input type="date" class="form-control" name="data_nascimento" value="<?=$paciente->PAC_DATA_NASCIMENTO?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Sexo</label>
                               <select name="sexo" class="form-control">
                                <option value="<?=$paciente->PAC_SEXO?>"><?=$paciente->PAC_SEXO?></option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="FEMININO">FEMININO</option>
                               </select>
                        </div>
                        <div class="col-md-6">
                            <label>Telefone</label>
                               <input type="text" attrname="telephone1"  class="form-control" name="telefone" value="<?=$paciente->PAC_TELEFONE?>">
                               
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>E-mail</label>
                               <input type="email" class="form-control" name="email" value="<?=$paciente->PAC_EMAIL?>">
                        </div>
                    </div>

                    <input type="hidden" name="acao" value="alterar_paciente">
                    <input type="hidden" name="CODIGO" value="<?=$paciente->PAC_CODIGO_PK?>">

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