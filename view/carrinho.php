<?php
	session_start();

	 if(!isset($_SESSION['carrinho'])){ 
        $_SESSION['carrinho'] = array(); 
    } 

	if(isset($_GET['acao'])){ 
        //ADICIONAR CARRINHO 
        if($_GET['acao'] == 'add'){ 
            $id_produto = intval($_GET['id_produto']); 
            if(!isset($_SESSION['carrinho'][$produto])){ 
                $_SESSION['carrinho'][$produto] = 1; 
            } else { 
                $_SESSION['carrinho'][$produto] += 1; 
            } 
		}
		
		//REMOVER
		 if($_GET['acao'] == 'del'){ 
            $produto = intval($_GET['id_produto']); 
            if(isset($_SESSION['carrinho'][$produto])){ 
                unset($_SESSION['carrinho'][$produto]); 
            } 
		 }
		
		//ALTERAR QUANTIDADE
		if($_GET['acao'] == 'up'){ 
            if(is_array($_POST['prod'])){ 
                foreach($_POST['prod'] as $id_produto => $qtd){
                        $id_produto  = intval($id_produto);
                        $qtd = intval($qtd);
                        if(!empty($qtd) || $qtd <> 0){
                            $_SESSION['carrinho'][$id_produto] = $qtd;
                        }else{
                            unset($_SESSION['carrinho'][$id_produto]);
						}
					}
            	}
        	}
			
		  if($_GET['acao'] == 'finalizar'){ 
            $id_produto = intval($_GET['id_produto']); 
            if(!isset($_SESSION['carrinho'][$id_produto])){ 
                $_SESSION['carrinho'][$id_produto] = 1; 
            } else { 
                $_SESSION['carrinho'][$id_produto] += 1; 
            } 
		}
		
		  if($_GET['acao'] == 'pedidos'){ 
            $id_produto = intval($_GET['id_produto']); 
            if(!isset($_SESSION['carrinho'][$id_produto])){ 
                $_SESSION['carrinho'][$id_produto] = 1; 
            } else { 
                $_SESSION['carrinho'][$id_produto] += 1; 
            } 
		}
		}

?>

    <?php
       require('../include/header.php');
    
        
        ?>
<br>
 
 <div >   
<div class="container" style="color: black; background-color: white; border-radius: 2em; padding: 4em;">
    
    	<div class="card mt-5" >
			 <div class="card-body">
	    		<h4 class="card-title">Carrinho</h4>
	    	</div>
		</div>
		
		
		
	<div class="table-responsive">
	<table class="table table-strip  ">
        
		<thead>
			<tr>
				<th width="244">DESCRIÇÃO</th>
				<th width="244">TAMANHO</th>
				<th width="244">QUANTIDADE</th>
				<th width="244">PREÇO</th>
				<th width="244">SUBTOTAL</th>
				<th width="244">REMOVER</th>
			</tr>
		</thead>
		
			<form action="?acao=up" method="post">
		
				
		
				
		<tbody>
			<?php
			
				if(count($_SESSION['carrinho']) == 0){
					
					echo('<tr><td colspan="5">Nenhum produto no carrinho</td></tr>');
					
				}else{
					
                    include("../conexao/conexao.php");
					$total = 0;
					foreach($_SESSION['carrinho'] as $codproduto => $qtd){
						
						$sql     = "SELECT * FROM produto WHERE id_produto = '$id_produto'";
						$executa = mysqli_query($conexao, $sql) or die (mysqli_error());
						$in      = mysqli_fetch_assoc($executa);
						
						$descricao    = $in ['descricao'];
						
						$preco   = number_format ($in ['preco'], 2,',','.');
						$sub     = number_format ($in ['preco'] * $qtd, 2,',','.');
						$total   += $in['preco'] * $qtd;
						
						echo '<tr>
				
								<td>'.$descricao.'</td>
                              
								<td><input  size="3" style="color: black;" name="prod['.$id_produto.']" value="'.$qtd.'" ></td>
                                
								<td>R$ '.$preco.'</td>
                                
								<td>R$'.$sub.'</td>
                                
								<td><a href="?acao=del&id_produto='.$id_produto.'" class="btn btn-danger">Remover</td>

							  </tr>' ;
					}
					
						$total = number_format($total, 2, ',', '.');
                echo 	'<tr>                         
                            <td colspan="4">Total</td>
                            <td>R$ '.$total.'</td>
                    	</tr>';
				}
			
			?>
		          <td ><input class="btn btn-primary"  type="submit" value="Atualizar Carrinho"/></td>
                
			
				<td ><a class="btn btn-info" href="../view/produto_listar.php">Continuar comprando</a></td>
				
				<td>  
			<a href="" class="btn btn-primary"  value="finalizar">Finalizar Compra</a></td>
			
	
		</tbody>
			
			</form>
		
	</table>
	<div>
</div>
</body>
</html>