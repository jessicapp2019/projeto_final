<?php
$page = 'novo_usuario';
require('../include/header.php');

?>

<!-- Formulario de cadastro  -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
            <h1>Cadastrar Usuário</h1>
            </div>
        </div>
        

        <form name="usuario" method="post" action="../include/usuario-include.php">
          <!--<div class="form-row">-->
                
            <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
    </div>
                
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
    </div>

    <div class="form-group">
        <label for="celular">Celular:</label>
        <input type="text" class="form-control" id="celular" placeholder="Celular " name="celular">
    </div>

    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
    </div>
         
            
        <input type="submit" name="cadastrar" class="btn btn-primary"value="Cadastrar"/>
        <button type="reset" class="btn btn-danger">Limpar</button>

        </form>
    </div>

</div>
</div>
</div>
<!-- Modal para confirmar a exclusão de um registo-->

</div>

<!-- Modal para confirmar a exclusão de um registo-->

<div class="modal fade" id="apagarRegistro" tabindex="-1" role="dialog" aria-labelledby="apagarRegistro"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Excluir item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluiir o item selecionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Apagar</button>
            </div>
        </div>
    </div>
</div>
<?php
    require('../includes/footer.php');
?>