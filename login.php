<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php
// Conexão com o banco de dados
$db = new PDO('mysql:host=localhost;dbname=chatapp;charset=utf8', 'root', 'root');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos do formulário foram preenchidos
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['image'])) {
        // Query para inserir um novo registro na tabela users
        $query = 'INSERT INTO users (email, password, name, image) VALUES (?, ?, ?, ?)';
        $statement = $db->prepare($query);

        // Executa a query, passando os valores do formulário como parâmetros
        $statement->execute(array($_POST['email'], $_POST['password'], $_POST['name'], $_POST['image']));
        
        exit();
    }
}

// Recupera todos os registros da tabela users
$query = 'SELECT * FROM users';
$statement = $db->prepare($query);
$statement->execute();
$results = $statement->fetchAll();
?>


<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Bate Papo</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>E-mail</label>
          <input type="text" name="email" placeholder="Coloque o seu e-mail" required>
        </div>
        <div class="field input">
          <label>Senha</label>
          <input type="password" name="password" placeholder="Digite sua senha" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Entrar">
        </div>
      </form>
      <div class="link">Você não tem uma conta? <a href="index.php">Crie uma conta aqui</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
