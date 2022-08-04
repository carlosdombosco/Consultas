<div class="modal fade" id="CadastrarPaciente" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Cadastro de pacientes
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
                        <div class="col-md-8">
                            <label>CPF</label>
                               <input type="text" class="form-control" name="cpf">
                        </div>
                        <div class="col-md-4">
                            <label>Data Nascimento</label>
                               <input type="date" class="form-control" name="data_nascimento">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Sexo</label>
                               <select name="sexo" class="form-control">
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="FEMININO">FEMININO</option>
                               </select>
                        </div>
                        <div class="col-md-6">
                            <label>Telefone</label>
                               <input type="text" attrname="telephone1" class="form-control"  name="telefone" />

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>E-mail</label>
                               <input type="email" class="form-control" name="email">
                        </div>
                    </div>

                    <input type="hidden" name="acao" value="cadastrar_paciente">
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


