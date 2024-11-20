<?php
// Inicia a sessão para acessar os dados armazenados
session_start();

// Verifica se o parâmetro 'id' foi passado
if (!isset($_GET['id'])) {
    echo "Produto não encontrado.";
    exit;
}

// Recupera o ID do produto a ser editado
$idProduto = $_GET['id'];

// Verifica se o produto existe
if (!isset($_SESSION['produtos'][$idProduto])) {
    echo "Produto não encontrado.";
    exit;
}

// Recupera os dados do produto
$produto = $_SESSION['produtos'][$idProduto];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="editar.css">
</head>
<body>
    <h1>Editar Produto</h1>
    
    <form action="catalogo.php" method="POST">
        <input type="hidden" name="editar" value="1"> <!-- Flag para edição -->
        <input type="hidden" name="idProduto" value="<?php echo $idProduto; ?>"> <!-- ID do produto -->
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo htmlspecialchars($produto['descricao']); ?>" required>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" value="<?php echo $produto['preco']; ?>" step="0.01" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="<?php echo $produto['quantidade']; ?>" required>

        <div class="buttons-container">
            <button class="voltar"><a href="catalogo.php"> < Voltar</a></button>
            <button type="submit">Salvar Alterações</button>
        </div>
       </form>

    <footer>
        <p>Desenvolvido por  <a href="https://github.com/lorranalacerda">Lorrana Lacerda</a>
            <br> Técnica em Desenvolvimento de Sistemas
        </p> 
    </footer>
</body>
</html>
