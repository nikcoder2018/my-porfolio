let newquestionModal = $("#newQuestion");
let editquestionModal = $("#editQuestion");
newquestionModal.on("submit", "#questionnaire-form", function(e) {
  e.preventDefault();
  $.ajax({
    url: $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: resp.message
        }).then(result => {
          newquestionModal.find("form").trigger("reset");
          newquestionModal.modal("toggle");
          location.reload();
        });
      } else {
        swal({
          type: "error",
          text: resp.message
        });
      }
    }
  });
});
function editquestion(id) {
  $.ajax({
    url: base_url + "/admin/questionnaire/read",
    type: "POST",
    data: {
      id
    },
    success: function(resp) {
      console.log(resp);
      editquestionModal.modal("toggle");
      editquestionModal
        .find("form")
        .find("input[name=id]")
        .val(resp[0].id);
      editquestionModal
        .find("form")
        .find("textarea[name=question]")
        .val(resp[0].question);
      editquestionModal
        .find("form")
        .find("select[name=category]")
        .val(resp[0].category)
        .prop("selected", "selected");
    }
  });
}
editquestionModal.on("submit", "#questionnaire-form-update", function(e) {
  e.preventDefault();
  $.ajax({
    url: $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: resp.message
        }).then(result => {
          editquestionModal.find("form").trigger("reset");
          editquestionModal.modal("toggle");
          location.reload();
        });
      } else {
        swal({
          type: "error",
          text: resp.message
        });
      }
    }
  });
});

function deletequestion(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to undo this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(result => {
    if (result.value) {
      $.ajax({
        url: base_url + "/admin/questionnaire/delete",
        type: "POST",
        data: {
          id
        },
        success: function(resp) {
          if (resp.success) {
            swal({
              type: "success",
              text: resp.message
            }).then(result => {
              location.reload();
            });
          }
        }
      });
    }
  });
}
