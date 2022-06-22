$(document).ready(function () {
  let form = $("#splinterForm");

  let submitBtn = $("#submitBtn");

  let todo = $("#todo");

  function loadTodo() {
    $.ajax({
      type: "GET",
      url: "read.php",
      dataType: "html",
      success: function (response) {
        todo.html(response);
      },
    });
  }

  loadTodo();

  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
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

  // Make the AJAX Request on Form Submit
  $(submitBtn).on("click", function (e) {
    e.preventDefault();

    let title = $("#todo_title").val();
    let details = $("#todo_details").val();

    // validate

    $.ajax({
      type: "POST",
      url: "create.php",
      data: {
        title: title,
        details: details,
      },
      dataType: "html",
      success: function (response) {
        if (response == 1) {
          toastr.success("TODO Added Successfully");
          loadTodo();
        } else {
          toastr.error("Something Was Wrong!");
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
        url: "markDone.php",
        data: { id: todoId },
        dataType: "html",
        success: function (response) {
          if (response == 1) {
            toastr.success("TODO Finished");
            loadTodo();
          } else {
            toastr.error("Couldn't Process");
            loadTodo();
          }
        },
      });
    } else {
      $.ajax({
        type: "POST",
        url: "markNotDone.php",
        data: { id: todoId },
        dataType: "html",
        success: function (response) {
          if (response == 1) {
            toastr.info("TODO Unfinished");
            loadTodo();
          } else {
            toastr.error("Couldn't Process");
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
      url: "delete.php",
      data: { id: todoId },
      dataType: "html",
      success: function (response) {
        if (response == 1) {
          toastr.success("TODO Deleted");
          loadTodo();
        } else {
          toastr.error("Couldn't Delete");
        }
      },
    });
  });
});
