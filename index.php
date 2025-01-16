<?php require 'template/header.php'; ?>
  <div class="container mt-5">
    <h1>Lista attività da svolgere</h1>
    <form id="todo-form">
      <div class="mb-3">
        <label for="todo-input" class="form-label">Inserisci una nuova attività:</label>
        <input type="text" class="form-control" id="todo-input" name="todo" placeholder="Inserire attività" required>
      </div>
      <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
    <hr>
    <ul id="todo-list" class="list-group mt-3">
      <!-- Le todo saranno inserite qui -->
    </ul>
  </div>
<?php require 'template/footer.php'; ?>