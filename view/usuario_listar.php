<?php
$page = 'listar_usuario';
require('../include/header.php');
?>
<!-- Listar usuarios -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Listar Usuário</h2>
            </div>
        </div>
        <!--<div class="alert alert-success" role="alert">
                    Usuário apagado com Sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>-->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Celular</th>
                  
                        
                    </tr>
                </thead>
                <tbody>                    
                    <tr>
                        <th></th>
                        <td></td>
                        
                        <td class="text-center">
                            <span class="d-none d-md-block">
                                <a href="usuario_visualizar.php?id=<?=$id_usuario?>"
                                    class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                    data-target="#visualizarRegistro">Visualizar</a>

                                <a href="usuario_editar.php?id=<?=$id_usuario?>"
                                    class="btn btn-outline-warning btn-sm">Editar</a>

                                <a href="usuario_apagar.php?id=<?=$id_usuario?>" class="btn btn-outline-danger btn-sm"
                                    data-toggle="modal" data-target=" #apagarRegistro">Apagar</a>
                            </span> 
                            <div class="dropdown d-block d-md-none">
                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ações
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                    <a class="dropdown-item" href="visualizar.php?id=<?=$id_usuario?>"
                                        data-toggle="modal" data-target="#visualizarRegistro">Visualizar</a>
                                    <a class="dropdown-item" href="usuario_editar.php?id=<?=$id_usuario?>">Editar</a>
                                    <a class="dropdown-item" href="usuario_apagar.html" data-toggle="modal"
                                        data-target="#apagarRegistro">Apagar</a>
                                </div>
                            </div>
                        </td>
                    </tr>                    
                </tbody>
            </table>            
        </div>
    </div>
</div>
<!-- Modal para confirmar a exclusão de um registro-->
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
                <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                <a href="usuario_apagar.php?id="><button type="button"  class="btn btn-danger">Sim</button></a>
            </div>
        </div>
    </div>
</div>

<?php
    require('../include/footer.php');
?>