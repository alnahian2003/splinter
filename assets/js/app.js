$(document).ready(function () {
  let form = $("#splinterForm");

  let submitBtn = $("#submitBtn");

  $(submitBtn).on("click", function (e) {
    e.preventDefault();

    let title = $("#todo_title").val();
    let details = $("#todo_details").val();

    // Validate the form inputs
    // if (title == "" && details == "") {
    //   alert("Please fill out all fields to make a TODO");
    //   return false;
    // } elseif(title==""){
    //     alert("You can't only input the details. You have to submit a title");
    //     return false;
    // }

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
          $("#intro h1").html("TODO Added To DB");
        } else {
          $("#intro h1").html("Something Was Wrong");
        }
      },
    });
  });
});
