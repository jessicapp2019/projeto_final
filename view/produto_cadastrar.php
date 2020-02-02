<?php require('../include/header.php'); ?>


<?php
// Conexão com o banco de dados

include("../conexao/conexao.php");
	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
		$descricao = $_POST["descricao"];
		$categoria = $_POST["categoria"];
		$preco = $_POST["preco"];
		$imagem = $_FILES["imagem"];
		// Se a foto estiver sido selecionada
	if (!empty($imagem["name"])) {
		// Largura máxima em pixels
		$largura = 95000;
		// Altura máxima em pixels
		$altura = 980000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000000000;
		$error = array();
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($imagem["tmp_name"]);
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}	
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($imagem["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
		// Se não houver nenhum erro
		if (count($error) == 0) {
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotosprodutos/" . $nome_imagem;
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
			// Insere os dados no banco
			$sql = "insert into produto values(null,'".$descricao."','".$categoria."','".$preco."','".$nome_imagem."')";
			$resultado = mysqli_query($conexao,$sql); 
			if ($resultado){
				echo "Você foi cadastrado com sucesso.";
			}
		}
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
		}
	}
?>
<div class="container">
	<h1>Cadastrar Produto</h1>
		
	<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" name="cadastro" >
		
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" id="descricao" placeholder="descricão" name="descricao">
    </div>

    <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input type="text" class="form-control" id="categoria" placeholder="categoria" name="categoria">
    </div>

    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="text" class="form-control" id="preco" placeholder="preço" name="preco">
    </div>

	<div class="form-group">
		<label for="imagem">Imagem:</label>
		<input type="file" class="btn btn-primary" id="imagem" name="imagem" >
	</div><br><br>

	<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="cadastrar" class="btn btn-primary"value="Cadastrar"/>
		<button type="reset" class="btn btn-danger">Limpar</button>
	</div>
	</form>
</div>
     <?php require ('../include/footer.php') ?> 
    
                                            