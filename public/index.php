<?php
require_once '../config/config.php';
require_once '../app/Models/Task.php';

$task = new Task();

if(isset($_POST['title'])){
    $task->create($_POST['title']);
}

if(isset($_GET['delete'])){
    $task->delete($_GET['delete']);
}

$tasks = $task->all();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TaskFlow</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h1>TaskFlow</h1>

<form method="POST">
<input name="title" placeholder="Новая задача">
<button>Добавить</button>
</form>

<?php foreach($tasks as $item): ?>
<div class="card">
<h3>
<?=htmlspecialchars($item['title'])?>
</h3>

<p>
Статус:
<span>
<?= $item['status'] ?>
</span>
</p>
<a href="?delete=<?=$item['id']?>">Удалить</a>
</div>
<?php endforeach; ?>

</div>

</body>
</html>
