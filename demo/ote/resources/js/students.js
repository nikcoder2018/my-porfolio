//let newStudentModal = $("#newStudent");

// newStudentModal.find("select[name=department]").on("change", function() {
//   $.ajax({
//     url:base_url+'/admin/'
//   })
// });

let evaluateModal = $("#evaluateModal");
function evaluateTeacher(id) {
  evaluateModal.modal("toggle");
  evaluateModal.find("input[name=teacher]").val(id);
}

evaluateModal.on("submit", "form", function(e) {
  e.preventDefault();
  evaluateModal.find("button[type=submit]").html("Saving...");

  evaluateModal.find("button[type=submit]").prop("disabled", true);

  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "Evaluation Successfully Submitted"
        }).then(result => {
          evaluateModal.modal("toggle");
          evaluateModal.find("form").trigger("reset");
          location.reload();
        });
      }
    }
  });
});

$("#changepassword-form").on("submit", function(e) {
  e.preventDefault();
  let password = $(this)
    .find("input[name=password]")
    .val();
  let newpassword = $(this)
    .find("input[name=newpassword]")
    .val();
  let confirmnewpassword = $(this)
    .find("input[name=confirmnewpassword]")
    .val();
  let alert = $(this).find(".alert");

  if (password == newpassword) {
    alert.show();
    alert.html("New password is de same with the old password");
    return;
  }
  if (newpassword != confirmnewpassword) {
    alert.show();
    alert.html("Confirm Password not matched with new password");
    return;
  }
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: {
      password,
      newpassword
    },
    success: function(resp) {
      if (resp.success) {
        alert.hide();
        swal({
          type: "success",
          text: resp.message
        });
      } else {
        alert.show();
        alert.html(resp.message);
      }
    }
  });
});
