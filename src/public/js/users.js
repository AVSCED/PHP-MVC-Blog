$(document).ready(function () {
  displayData();
  //when admin wants to change status to inactive
  $(document).on("click", ".btn-success", function () {
    var id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "../../controllers/adminPageController.php",
      data: { id: id, action: "inactive" },
      success: function (response) {
        displayData();
        location.reload();
      },
    });
  });
  //when admin wants to change status to active
  $(document).on("click", ".btn-danger", function () {
    var id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "../../controllers/adminPageController.php",
      data: { id: id, action: "active" },
      success: function (response) {
        displayData();
        location.reload();
      },
    });
  });
});

function displayData() {
  $.ajax({
    type: "POST",
    url: "../../controllers/adminPageController.php",
    success: function (res) {},
  });
}
