let studentLoginForm = $("#student-login");

studentLoginForm.on("submit", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: $(this).serialize(),
    success: function(response) {
      showMessage(response, studentLoginForm);
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

let editAccount = $("#editAccount");
function edit_account(id) {
  editAccount.modal("toggle");
  editForm = editAccount.find("form");
  $.ajax({
    url: base_url + "/api/students/read",
    type: "POST",
    data: { id },
    success: function(resp) {
      editForm.find("input[name=id]").val(resp.id);
      editForm.find("input[name=username]").val(resp.username);
      editForm.find("input[name=firstname]").val(resp.firstname);
      editForm.find("input[name=mi]").val(resp.middleinitial);
      editForm.find("input[name=lastname]").val(resp.lastname);
      editForm.find("input[name=contact]").val(resp.contact_no);
      editForm.find("input[name=student_id]").val(resp.student_id);
      editForm
        .find("select[name=course] option[value=" + resp.course + "]")
        .attr("selected", "selected");
      editForm
        .find("img")
        .attr("src", base_url + "uploads/profile/" + resp.profile_pic);
    }
  });
}
editAccount.find("form").on("submit", function(e) {
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
      if (response.type == "success") {
        swal({
          type: "success",
          text: response.text
        }).then(result => {
          location.reload();
        });
      } else {
        swal({
          type: "fail",
          text: response.text
        });
      }
    }
  });
});
function changeAvatar() {
  form = editAccount.find("form");
  form.find("input[name=avatar]").click();
}
editAccount.on("change", "input[name=avatar]", function() {
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

let changePasswordModal = $("#changePassword");
function changepassword_account(id) {
  changePasswordModal.modal("toggle");
}
changePasswordModal.on("submit", "form", function(e) {
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
    url: base_url + "api/students/changepassword",
    type: "POST",
    data: {
      password,
      newpassword
    },
    success: function(resp) {
      if (resp.success) {
        changePasswordModal.find("form").trigger("reset");
        changePasswordModal.modal("toggle");
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

$(document).ready(function() {
  //rotation speed and timer
  var speed = 10000;

  var run = setInterval(rotate, speed);
  var slides = $(".slide");
  var container = $("#slides ul");
  var elm = container.find(":first-child").prop("tagName");
  var item_width = container.width();
  var previous = "prev"; //id of previous button
  var next = "next"; //id of next button
  slides.width(item_width); //set the slides to the correct pixel width
  container.parent().width(item_width);
  container.width(slides.length * item_width); //set the slides container to the correct total width
  container.find(elm + ":first").before(container.find(elm + ":last"));
  resetSlides();

  //if user clicked on prev button

  $("#buttons a").click(function(e) {
    //slide the item

    if (container.is(":animated")) {
      return false;
    }
    if (e.target.id == previous) {
      container.stop().animate(
        {
          left: 0
        },
        1500,
        function() {
          container.find(elm + ":first").before(container.find(elm + ":last"));
          resetSlides();
        }
      );
    }

    if (e.target.id == next) {
      container.stop().animate(
        {
          left: item_width * -2
        },
        1500,
        function() {
          container.find(elm + ":last").after(container.find(elm + ":first"));
          resetSlides();
        }
      );
    }

    //cancel the link behavior
    return false;
  });

  //if mouse hover, pause the auto rotation, otherwise rotate it
  container
    .parent()
    .mouseenter(function() {
      clearInterval(run);
    })
    .mouseleave(function() {
      run = setInterval(rotate, speed);
    });

  function resetSlides() {
    //and adjust the container so current is in the frame
    container.css({
      left: -1 * item_width
    });
  }
});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
  $("#next").click();
}
