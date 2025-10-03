<?php

$task_file = __DIR__ . '/tasks.txt';
if (!file_exists($task_file)) {
	touch($task_file);
}
$tasks = file($task_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Add new task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['new_task']) && trim($_POST['new_task']) !== '') {
		$new_task = htmlspecialchars(trim($_POST['new_task']));
		file_put_contents($task_file, $new_task . PHP_EOL, FILE_APPEND);
		header('Location: ' . $_SERVER['REQUEST_URI']);
		exit;
	}
	// Delete task
	if (isset($_POST['delete_task'])) {
		$delete_index = (int)$_POST['delete_task'];
		if (isset($tasks[$delete_index])) {
			unset($tasks[$delete_index]);
			file_put_contents($task_file, implode(PHP_EOL, $tasks) . PHP_EOL);
			header('Location: ' . $_SERVER['REQUEST_URI']);
			exit;
		}
	}
}

$title = 'To-Do List';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<h1>Lista de tareas pendientes:</h1>
<p>Aquí puedes gestionar tus tareas pendientes. Añade nuevas tareas, márcalas como completadas o elimínalas cuando
    ya no las necesites.</p>
<ul id="task-list">
	<?php foreach ($tasks as $i => $task): ?>
      <li>
				<?php echo $task; ?>
          <form method="post" style="display:inline;" onsubmit="return confirm('¿Eliminar esta tarea?');">
              <input type="hidden" name="delete_task" value="<?php echo $i; ?>">
              <button type="submit">Eliminar</button>
          </form>
      </li>
	<?php endforeach; ?>
</ul>

<form method="post" id="task-form">
    <label for="new-task">Nueva tarea:</label>
    <input type="text" id="new-task" name="new_task" placeholder="Nueva tarea" required>
    <button type="submit">Añadir tarea</button>
</form>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>D