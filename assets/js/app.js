$(document).ready(function () {
  let form = $("#splinterForm");

  let submitBtn = $("#submitBtn");

  let todo = $("#todo");

  toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: true,
    progressBar: false,
    positionClass: "toast-bottom-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    newestOnTop: true,
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };

  function loadTodo() {
    $.ajax({
      type: "GET",
      url: "ajax/read.php",
      dataType: "html",
      success: function (response) {
        todo.html(response);
      },
    });
  }
  loadTodo();

  // Make the AJAX Request on Form Submit
  $(submitBtn).on("click", function (e) {
    e.preventDefault();

    let title = $("#todo_title").val();
    let details = $("#todo_details").val();

    // validate
    if ((title.length || details.length) == 0 || title.length == 0) {
      toastr.error("You must write something!");
      return false;
    }

    $.ajax({
      type: "POST",
      url: "ajax/create.php",
      data: {
        title: title,
        details: details,
      },
      dataType: "html",
      success: function (response) {
        if (response == 1) {
          toastr.success("ToDo Created For You 😀");
          loadTodo(); // load the todo grid section
          form.trigger("reset"); // reset the form
        } else {
          toastr.error("Something Went Wrong! ⚠");
        }
      },
    });
  });

  // Update a TODO Status to Finished
  $(document).on("click", ".btn_finished", function () {
    let todoId = $(this).data("id");
    let isFinished = $(this).data("status");

    if (!isFinished) {
      $.ajax({
        type: "POST",
        url: "ajax/markDone.php",
        data: { id: todoId },
        dataType: "html",
        success: function (response) {
          if (response == 1) {
            toastr.success("Congrats! ToDo Completed 🥳");
            loadTodo();
          } else {
            toastr.error("Couldn't Updated ToDo ☹");
            loadTodo();
          }
        },
      });
    } else {
      $.ajax({
        type: "POST",
        url: "ajax/markNotDone.php",
        data: { id: todoId },
        dataType: "html",
        success: function (response) {
          if (response == 1) {
            toastr.warning("Uh Oh! ToDo Incompleted 🙁");
            loadTodo();
          } else {
            toastr.error("Couldn't Process The Action 😢");
            loadTodo();
          }
        },
      });
    }
    isFinished = !isFinished;
  });

  // Make an AJAX Request for Deleting a TODO
  $(document).on("click", ".btn_delete", function () {
    let todoId = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "ajax/delete.php",
      data: { id: todoId },
      dataType: "html",
      success: function (response) {
        if (response == 1) {
          toastr.success("ToDo Deleted Successfully 🤩");
          loadTodo();
        } else {
          toastr.error("Couldn't Delete Your ToDo 😢");
        }
      },
    });
  });
});
