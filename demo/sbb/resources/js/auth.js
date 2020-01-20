let form_login = $("#form-login");
let form_signup = $("#form-signup");

form_login.on("submit", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: $(this).serialize(),
    success: function(response) {
      showMessage(response, form_login);
    }
  });
});
form_signup.on("submit", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: $(this).serialize(),
    success: function(response) {
      showMessage(response, form_signup);
    }
  });
});
function showMessage(response, element = false) {
  if (response.type == "validation") {
    element.find(".message").empty();
    $.each(response.message, function(key, item) {
      let message =
        '<div class="alert alert-danger" role="alert">' + item + "</div>";
      element.find(".message").append(message);
    });
  }
  if (response.type == "success") {
    swal({
      type: "success",
      text: response.message
    }).then(function(result) {
      if (response.redirect != null) {
        window.location.href = base_url + response.redirect;
      }
    });
  }
  if (response.type == "fail") {
    swal({
      type: "error",
      text: response.message
    });
  }
}

let registerStudentModal = $("#registerStudentModal");
registerForm = registerStudentModal.find("form");
function changeAvatar() {
  registerForm.find("input[name=avatar]").click();
}
registerStudentModal.find("form").on("submit", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function(response) {
      showMessage(response);
    }
  });
});
registerForm.on("change", "input[name=avatar]", function() {
  var url = this.value;
  var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
  if (
    this.files &&
    this.files[0] &&
    (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
  ) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $(".avatar_inner_container > img").attr("src", e.target.result);
    };

    reader.readAsDataURL(this.files[0]);
  } else {
    $(".avatar_inner_container > img").attr("src", "/assets/no_preview.png");
  }
});
