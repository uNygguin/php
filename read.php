<?php
require 'banco.php';
$id = null;
if(!empty($_GET['codigo'])){
    $id = $_REQUEST['codigo'];
}

if (null == $id) {
    header("Location: index.php");
}else{
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  tb_alunos where codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>INFORMAÇÕES DO CONTATO</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="card">
                <div class="card-header">
                    <h3 class="well">Informações do Contato</h3>
                </div>
                <div class="container">
                    <div class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">NOME</label>
                            <div class="controls form-control">
                                <label class="carousel-inner">
                                    <?php echo $data['nome']; ?>
                                </label>
                            </div>
                        </div>
                    
                        <div class="control-group">
                            <label class="control-label">ENDEREÇO</label>
                            <div class="controls form-control disable">
                                <label class="carousel-inner">
                                    <?php echo $data['endereco']; ?>
                                </label>
                            </div>
                        </div>

                      
                        <div class="control-group">
                            <label class="control-label">Telefone</label>
                            <div class="controls form-control disable">
                                <label class="carousel-inner">
                                    <?php echo $data['fone']; ?>
                                </label>
                            </div>
                        </div>

                        
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls form-control disable">
                                <label class="carousel-inner">
                                    <?php echo $data['email']; ?>
                                </label>
                            </div>
                        </div>

                        
                        <div class="control-group">
                            <label class="control-label">Idade</label>
                            <div class="controls form-control disable">
                                <label class="carousel-inner">
                                    <?php echo $data['idade']; ?>
                                </label>
                            </div>
                        </div>

                        <br>

                        <div class="form-actions">
                            <a href="index.php" type="btn" class="btn btn-primary">Voltar</a>
                        </div>

                    </div>
                </div>

            </div>
        
        </div>

    </div>
</body>

</html>