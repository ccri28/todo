<script src="assets/js/jquery.min.js"></script>
  <script>
    $(document).ready(function() {

      $.ajax({
          type: "POST",
          url: "get_todo.php",
          data: {},
          success: function(data) {
          //addTodo(todo);
          $('#todo-list').html(data);
          }
      });

      // Funzione per aggiungere una nuova todo alla lista
      function addTodo(todo) {
        const li = $('<li class="list-group-item">');
        const checkbox = $('<input type="checkbox">');
        const span = $('<span>').text(todo);
        const button = $('<button class="btn btn-danger float-end">Elimina</button>');
        li.append(checkbox, span, button);
        $('#todo-list').append(li);
      }

      // Funzione per eliminare una todo dalla lista
      function removeTodo(li) {
        li.remove();
      }

      // Evento per l'invio del form
      /*$('#todo-form').submit(function(e) {
        e.preventDefault();
        const todo = $('#todo-input').val();
        addTodo(todo);
        $('#todo-input').val('');
      });*/ 
      // Evento per l'invio del form
        $('#todo-form').submit(function(e) {
            e.preventDefault();
            const todo = $('#todo-input').val();
            if(todo == '') 
            {
              alert('ERRORE! Il campo di testo non può essere vuoto');
              return;
            }
            $.ajax({
            type: "POST",
            url: "save_todo.php",
            data: {todo: todo},
            success: function(data) {
                //addTodo(todo);
                $('#todo-input').val('');
                location.reload();
            }
            });
        });

        $(document).on('click', '.delete', function() {
          var response = confirm("Sei sicuro di voler eliminare questa todo?");
          var id = $(this).data('id');
          if(response) 
          {
            $.ajax({
            type: "POST",
            url: "delete_todo.php",
            data: {id: id},
            success: function(data) {
                location.reload();
            }
            });
          }
        });

        $(document).on('click', '.check', function() {
          var id = $(this).data('id');
          
            $.ajax({
            type: "POST",
            url: "check_todo.php",
            data: {id: id},
            success: function(data) {
                location.reload();
            }
            });
        });
    });
  </script>
</body>
</html>