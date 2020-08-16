// Delete user
jQuery(document).ready(function () {
  jQuery(document).on("click", ".deleteUser", function () {
    var userId = $(this).data("userid"),
      hitURL = baseURL + "deleteUser",
      currentRow = $(this);
    var confirmation = confirm("Are you sure to delete this user ?");
    if (confirmation) {
      jQuery
        .ajax({
          type: "POST",
          dataType: "json",
          url: hitURL,
          data: { userId: userId },
        })
        .done(function (data) {
          console.log(data);
          currentRow.parents("tr").remove();
          if ((data.status = true)) {
            alert("User successfully deleted");
          } else if ((data.status = false)) {
            alert("User deletion failed");
          } else {
            alert("Access denied..!");
          }
        });
    }
  });

  jQuery(document).on("click", ".searchList", function () {});
});

// Delete Inventory
jQuery(document).ready(function () {
  jQuery(document).on("click", ".deleteInventory", function () {
    var inventoryId = $(this).data("inventoryid"),
      hitURL = baseURL + "deleteInventory",
      currentRow = $(this);
    var confirmation = confirm("Are you sure to delete this item ?");

    if (confirmation) {
      jQuery
        .ajax({
          type: "POST",
          dataType: "json",
          url: hitURL,
          data: { inventoryId: inventoryId },
        })
        .done(function (data) {
          console.log(data);
          currentRow.parents("tr").remove();
          if ((data.status = true)) {
            alert("Item successfully deleted");
          } else if ((data.status = false)) {
            alert("Item deletion failed");
          } else {
            alert("Access denied..!");
          }
        });
    }
  });
  jQuery(document).on("click", ".searchList", function () {});
});

// Delete Experiment
jQuery(document).ready(function () {
  jQuery(document).on("click", ".deleteExperiment", function () {
    var experimentId = $(this).data("experimentid"),
      hitURL = baseURL + "deleteExperiment",
      currentRow = $(this);
    var confirmation = confirm(
      "Are you sure to delete this Experiment Guide ?"
    );

    if (confirmation) {
      jQuery
        .ajax({
          type: "POST",
          dataType: "json",
          url: hitURL,
          data: { experimentId: experimentId },
        })
        .done(function (data) {
          console.log(data);
          currentRow.parents("tr").remove();
          if ((data.status = true)) {
            alert("Experiment Guide successfully deleted");
          } else if ((data.status = false)) {
            alert("Experiment Guide deletion failed");
          } else {
            alert("Access denied..!");
          }
        });
    }
  });
  jQuery(document).on("click", ".searchList", function () {});
});

// Delete Link
jQuery(document).ready(function () {
  jQuery(document).on("click", ".deleteLink", function () {
    var linkId = $(this).data("linkid"),
      hitURL = baseURL + "deleteLink",
      currentRow = $(this);
    var confirmation = confirm("Are you sure to delete this Link ?");

    if (confirmation) {
      jQuery
        .ajax({
          type: "POST",
          dataType: "json",
          url: hitURL,
          data: { linkId: linkId },
        })
        .done(function (data) {
          console.log(data);
          currentRow.parents("tr").remove();
          if ((data.status = true)) {
            alert("Link successfully deleted");
          } else if ((data.status = false)) {
            alert("Link deletion failed");
          } else {
            alert("Access denied..!");
          }
        });
    }
  });
  jQuery(document).on("click", ".searchList", function () {});
});

// Delete Inventory
jQuery(document).ready(function () {
  jQuery(document).on("click", ".deleteDocument", function () {
    var documentId = $(this).data("documentid"),
      hitURL = baseURL + "deleteDocument",
      currentRow = $(this);
    var confirmation = confirm("Are you sure to delete this Document ?");

    if (confirmation) {
      jQuery
        .ajax({
          type: "POST",
          dataType: "json",
          url: hitURL,
          data: { documentId: documentId },
        })
        .done(function (data) {
          console.log(data);
          currentRow.parents("tr").remove();
          if ((data.status = true)) {
            alert("Document successfully deleted");
          } else if ((data.status = false)) {
            alert("Document deletion failed");
          } else {
            alert("Access denied..!");
          }
        });
    }
  });
  jQuery(document).on("click", ".searchList", function () {});
});
