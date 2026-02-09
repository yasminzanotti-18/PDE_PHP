<?php
session_start();


function calcularIdade($dataNascimento) {
    $dataNasc = new DateTime($dataNascimento);
    $hoje = new DateTime();
    return $hoje->diff($dataNasc)->y;
}

// Calcula média das notas
function calcularMedia($alunos) {
    $soma = 0;
    $quantidade = 0;

    foreach ($alunos as $aluno) {
        $soma= $soma + intval ($aluno['nota']);
        $quantidade++;

    }
        
        $media = $soma / $quantidade;

        return $media;
}

class Aluno {
    private $nome;
    private $sobrenome;
    private $nota;
    private $dataNascimento;

    public function __construct($nome, $sobrenome, $nota, $dataNascimento) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->nota = $nota;
        $this->dataNascimento = $dataNascimento;
    }

    public function salvar() {
        
        if (!isset($_SESSION['alunos'])) {
            $_SESSION['alunos'] = [];
        }

        
        $_SESSION['alunos'][] = [
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'nota' => $this->nota,
            'dataNascimento' => $this->dataNascimento
        ];
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nota = $_POST['nota'];
    $dataNascimento = $_POST['dataNascimento'];

    $aluno = new Aluno($nome, $sobrenome, $nota, $dataNascimento);
    $aluno->salvar();
}


if (isset($_GET['reset'])) {
    session_destroy();
   
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
</head>
<body>

<h2>Cadastro de Alunos</h2>

<form method="POST">
    Nome:<br>
    <input type="text" name="nome" required><br><br>

    Sobrenome:<br>
    <input type="text" name="sobrenome" required><br><br>

    Nota:<br>
    <input type="number" name="nota" required><br><br>

    Data de Nascimento:<br>
    <input type="date" name="dataNascimento" required><br><br>

    <button type="submit">Cadastrar</button>
    <button type="reset">Limpar Formulário</button>
</form>

<br>

<?php if (isset($_SESSION['alunos']) && count($_SESSION['alunos']) > 0): ?>

<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Nota</th>
            <th>Data de Nascimento</th>
            <th>Idade</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['alunos'] as $aluno): ?>
        <tr>
            <td><?= $aluno['nome'] ?></td>
            <td><?= $aluno['sobrenome'] ?></td>
            <td><?= $aluno['nota'] ?></td>
            <td><?= $aluno['dataNascimento'] ?></td>
            <td><?= calcularIdade($aluno['dataNascimento']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <span>Média das notas: <?= calcularMedia($_SESSION['alunos']) ?></span>
<?php endif; ?>

</body>
</html>