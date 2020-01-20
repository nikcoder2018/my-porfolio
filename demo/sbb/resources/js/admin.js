let newAnnouncements = $("#newAnnouncements");
let editAnnouncements = $("#editAnnouncements");
let smsModal = $("#sendSMSModal");

newAnnouncements.on("submit", "form", function (e) {
  e.preventDefault();

  let headline = $(this)
    .find("input[name=headline]")
    .val();
  let message = $(this)
    .find("textarea[name=message]")
    .val();
  let department = $(this)
    .find("select[name=department] option:selected")
    .val();
  let sms_switch = 0;
  if ($("#cb_sendsms").is(":checked")) {
    sms_switch = 1;
  } else {
    sms_switch = 0;
  }
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: {
      headline: headline,
      message: message,
      department: department,
      sms_switch: sms_switch
    },
    success: function (response) {
      newAnnouncements.modal("toggle");
      showMessage(response);
    }
  });
});
editAnnouncements.on("submit", "form", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function (response) {
      editAnnouncements.modal("toggle");
      showMessage(response);
    }
  });
});

function delete_announcement(id) {
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
        url: "/api/announcements/delete",
        type: "POST",
        data: { id },
        success: function (response) {
          showMessage(response);
        }
      });
    }
  });
}

function showhide_announcement(id, visible) {
  let list = $("#announcements");
  let btn = list.find("#btn-sh-" + id);
  if (visible == 1) {
    visible = 0;
    btn.attr("data-original-title", "Show on Bulletin Board");
    btn.attr("onclick", "showhide_announcement(" + id + ", " + visible + ")");
    btn.find("svg.feather.feather-eye-off").replaceWith(feather.toSvg("eye"));
  } else if (visible == 0) {
    visible = 1;
    btn.attr("data-original-title", "Hide on Bulletin Board");
    btn.attr("onclick", "showhide_announcement(" + id + ", " + visible + ")");
    btn.find("svg.feather.feather-eye").replaceWith(feather.toSvg("eye-off"));
  }
  $.ajax({
    url: base_url + "api/announcements/showhide",
    method: "POST",
    data: {
      id: id,
      visible: visible
    },
    success: function (response) {
      console.log(response);
    }
  });
}

function update_announcement(id) {
  editAnnouncements.modal("toggle");
  let editForm = editAnnouncements.find("form");
  $.ajax({
    url: base_url + "api/announcements/read",
    type: "POST",
    data: { id },
    success: function (resp) {
      editForm.find("input[name=id]").val(resp.id);
      editForm.find("textarea[name=message]").val(resp.message);
      editForm.find("input[name=headline]").val(resp.headline);
      editForm.find("select[name=department] option").removeAttr("selected");
      editForm
        .find("select[name=department] option[value=" + resp.department + "]")
        .attr("selected", "selected");
    }
  });
}

function send_sms(id) {
  smsModal.modal("toggle");
  let smsForm = smsModal.find("form");
  $.ajax({
    url: base_url + "api/announcements/read",
    type: "POST",
    data: { id },
    success: function (resp) {
      smsForm.find("input[name=id]").val(resp.id);
      smsForm.find("textarea[name=message]").val(resp.message);
      smsForm
        .find("select[name=department] option[value=" + resp.department + "]")
        .attr("selected", "selected");
    }
  });
}

smsModal.on("submit", "form", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function (response) {
      smsModal.modal("toggle");
      showMessage(response);
    }
  });
});

function showMessage(response) {
  if (response.type == "success") {
    swal({
      type: "success",
      text: response.text
    }).then(function (result) {
      if (response.redirect != null) {
        window.location.href = base_url + response.redirect;
      }
    });
  }

  if (response.type == "fail") {
    swal({
      type: "error",
      text: response.text
    });
  }
  if (response.type == "validation") {
    $(".message").empty();
    $.each(response.text, function (key, item) {
      let message =
        '<div class="alert alert-danger" role="alert">' + item + "</div>";
      $(".message").append(message);
    });
  }
}
let registerStudentModal = $("#registerStudentModal");
let updateStudentModal = $("#updateStudentModal");
let smsStudentModal = $("#smsStudentModal");
let addNewPresidentModal = $("#addNewPresidentModal");
let updatePresidentModal = $("#updatePresidentModal");
registerStudentModal.find("form").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      showMessage(response);
    }
  });
});
let updateStudentForm = updateStudentModal.find("form");
function changeStudentAvatar() {
  updateStudentForm.find("input[name=avatar]").click();
}
updateStudentForm.on("change", "input[name=avatar]", function () {
  var url = this.value;
  var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
  if (
    this.files &&
    this.files[0] &&
    (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
  ) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(".avatar_inner_container > img").attr("src", e.target.result);
    };

    reader.readAsDataURL(this.files[0]);
  } else {
    $(".avatar_inner_container > img").attr("src", "/assets/no_preview.png");
  }
});
let registerStudentForm = registerStudentModal.find("form");
function registerStudentAvatar() {
  registerStudentForm.find("input[name=avatar]").click();
}
registerStudentForm.on("change", "input[name=avatar]", function () {
  var url = this.value;
  var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
  if (
    this.files &&
    this.files[0] &&
    (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
  ) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(".avatar_inner_container > img").attr("src", e.target.result);
    };

    reader.readAsDataURL(this.files[0]);
  } else {
    $(".avatar_inner_container > img").attr("src", "/assets/no_preview.png");
  }
});
function settingsSMSStudent(id) {
  smsStudentModal.modal("toggle");
  let smsForm = smsStudentModal.find("form");
  $.ajax({
    url: base_url + "api/students/read",
    type: "POST",
    data: { id },
    success: function (resp) {
      smsStudentModal
        .find(".modal-title")
        .html(
          "Send SMS to " +
          resp.firstname +
          " " +
          resp.lastname +
          " #" +
          resp.contact_no
        );
      smsForm.find("input[name=mobile_no]").val(resp.contact_no);
    }
  });
}
smsStudentModal.find("form").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    method: "POST",
    data: $(this).serialize(),
    success: function (response) {
      showMessage(response);
      smsStudentModal.modal("toggle");
      smsStudentModal.find("textarea[name=message]").val("");
    }
  });
});
function settingsEditStudent(id) {
  updateStudentModal.modal("toggle");
  let editForm = updateStudentModal.find("form");
  $.ajax({
    url: base_url + "/api/students/read",
    type: "POST",
    data: { id },
    success: function (resp) {
      editForm.find("input[name=id]").val(resp.id);
      editForm.find("input[name=lastname]").val(resp.lastname);
      editForm.find("input[name=firstname]").val(resp.firstname);
      editForm.find("input[name=mi]").val(resp.middleinitial);
      editForm
        .find("select[name=course] option[value=" + resp.course + "]")
        .removeAttr("selected");
      editForm
        .find("select[name=course] option[value=" + resp.course + "]")
        .attr("selected", "selected");
      editForm.find("input[name=contact]").val(resp.contact_no);
      editForm.find("input[name=student_id]").val(resp.student_id);
      editForm
        .find("img")
        .attr("src", base_url + "uploads/profile/" + resp.profile_pic);
    }
  });
}
addNewPresidentModal.find("form").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      showMessage(response);
    }
  });
});
let addNewPresidentChangeAvatar = addNewPresidentModal.find("form");
function addPresidentAvatar() {
  addNewPresidentChangeAvatar.find("input[name=avatar]").click();
}
addNewPresidentChangeAvatar.on("change", "input[name=avatar]", function () {
  var url = this.value;
  var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
  if (
    this.files &&
    this.files[0] &&
    (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
  ) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(".avatar_inner_container > img").attr("src", e.target.result);
    };

    reader.readAsDataURL(this.files[0]);
  } else {
    $(".avatar_inner_container > img").attr("src", "/assets/no_preview.png");
  }
});
updateStudentModal.find("form").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      showMessage(response);
    }
  });
});
function settingsDeleteStudent(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to undo this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(result => {
    if (result.value) {
      $.ajax({
        url: "/api/students/delete/",
        type: "POST",
        data: { id },
        success: function (response) {
          showMessage(response);
        }
      });
    }
  });
}
updatePresidentModal.find("form").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    dataType: "json",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      showMessage(response);
    }
  });
});
let updatePresidentChangeAvatar = updatePresidentModal.find("form");
function changePresidentAvatar() {
  updatePresidentChangeAvatar.find("input[name=avatar]").click();
}
updatePresidentChangeAvatar.on("change", "input[name=avatar]", function () {
  var url = this.value;
  var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
  if (
    this.files &&
    this.files[0] &&
    (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
  ) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(".avatar_inner_container > img").attr("src", e.target.result);
    };

    reader.readAsDataURL(this.files[0]);
  } else {
    $(".avatar_inner_container > img").attr("src", "/assets/no_preview.png");
  }
});
function settingsEditPresident(id) {
  updatePresidentModal.modal("toggle");
  let editForm = updatePresidentModal.find("form");
  $.ajax({
    url: base_url + "api/presidents/read",
    type: "POST",
    data: { id },
    success: function (resp) {
      editForm.find("input[name=id]").val(resp.id);
      editForm.find("input[name=lastname]").val(resp.lastname);
      editForm.find("input[name=firstname]").val(resp.firstname);
      editForm.find("input[name=mi]").val(resp.middleinitial);
      editForm
        .find("select[name=course] option[value=" + resp.course + "]")
        .removeAttr("selected");
      editForm
        .find("select[name=course] option[value=" + resp.course + "]")
        .attr("selected", "selected");
      editForm.find("input[name=contact]").val(resp.contact_no);
      editForm.find("input[name=studentid]").val(resp.student_id);
      editForm
        .find("img")
        .attr("src", base_url + "uploads/profile/" + resp.profile_pic);
    }
  });
}

function settingsDeletePresident(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to undo this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(result => {
    if (result.value) {
      $.ajax({
        url: "/api/presidents/delete",
        type: "POST",
        data: { id },
        success: function (response) {
          showMessage(response);
        }
      });
    }
  });
}

let editAccount = $("#editAccount");
function edit_account(id) {
  editAccount.modal("toggle");
  editForm = editAccount.find("form");
  $.ajax({
    url: base_url + "/api/account/read",
    type: "POST",
    data: { id },
    success: function (resp) {
      if (resp.success) {
        editForm.find("input[name=id]").val(resp.data.id);
        editForm.find("input[name=username]").val(resp.data.username);
        editForm.find("input[name=firstname]").val(resp.data.firstname);
        editForm.find("input[name=mi]").val(resp.data.middleinitial);
        editForm.find("input[name=lastname]").val(resp.data.lastname);
        editForm.find("input[name=contact]").val(resp.data.contact_no);
        editForm
          .find("select[name=course] option[value=" + resp.data.course + "]")
          .attr("selected", "selected");
      }
    }
  });
}
editAccount.find("form").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    method: "POST",
    data: $(this).serialize(),
    success: function (response) {
      showMessage(response);
    }
  });
});
function delete_account(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to undo this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(result => {
    if (result.value) {
      $.ajax({
        url: base_url + "admin/account/delete/",
        type: "POST",
        data: { id },
        success: function (response) {
          showMessage(response);
        }
      });
    }
  });
}
let createEventModal = $("#createEventModal");
let updateEventModal = $("#updateEventModal");
createEventModal.find("form").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    method: "POST",
    data: $(this).serialize(),
    success: function (response) {
      showMessage(response);
    }
  });
});

function update_event(id) {
  updateEventModal.modal("toggle");
  let editForm = updateEventModal.find("form");
  $.ajax({
    url: base_url + "api/events/read",
    type: "POST",
    data: { id },
    success: function (resp) {
      editForm.find("input[name=id]").val(resp[0].id);
      editForm.find("input[name=title]").val(resp[0].title);
      editForm.find("textarea[name=description]").val(resp[0].description);
      editForm.find("select[name=department] option").removeAttr("selected");
      editForm
        .find(
          "select[name=department] option[value=" + resp[0].department + "]"
        )
        .attr("selected", "selected");

      editForm.find("input[name=date]").val(resp[0].event_date);
      editForm.find("input[name=time_start]").val(resp[0].event_time_start);
      editForm.find("input[name=time_end]").val(resp[0].event_time_end);
      editForm.find("input[name=location]").val(resp[0].location);
    }
  });
}

updateEventModal.find("form").on("submit", function (e) {
  e.preventDefault();
  console.log($(this).serialize());
  $.ajax({
    url: base_url + $(this).attr("action"),
    method: "POST",
    data: $(this).serialize(),
    success: function (response) {
      showMessage(response);
    }
  });
});

function delete_event(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to undo this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(result => {
    if (result.value) {
      $.ajax({
        url: "/api/events/delete",
        type: "POST",
        data: { id },
        success: function (response) {
          showMessage(response);
        }
      });
    }
  });
}

let createActivityModal = $("#createActivityModal");
createActivityModal.on("submit", "form", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    fileElementId: "activity_img",
    data: new FormData(this),
    processData: false,
    contentType: false,
    cache: false,
    async: false,
    success: function (response) {
      createActivityModal.modal("toggle");
      showMessage(response);
    }
  });
});
let thumbnail = $("#activity_img");
let viewImageModal = $("#viewImageModal");
thumbnail.on("click", function () {
  viewImageModal
    .find("#image-gallery-image")
    .attr("src", thumbnail[0].currentSrc);
  viewImageModal.modal("toggle");
});
function viewThumbnail(src) {
  let viewImageModal = $("#viewImageModal");
  viewImageModal.find("#image-gallery-image").attr("src", src);
  viewImageModal.modal("toggle");
}
function deleteActivity(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to undo this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(result => {
    if (result.value) {
      $.ajax({
        url: "/api/activities/delete",
        type: "POST",
        data: { id },
        success: function (response) {
          showMessage(response);
        }
      });
    }
  });
}

let changePasswordModal = $("#changePassword");
function changepassword_account(id) {
  changePasswordModal.modal("toggle");
}
changePasswordModal.on("submit", "form", function (e) {
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
    url: base_url + "api/account/changepassword",
    type: "POST",
    data: {
      password,
      newpassword
    },
    success: function (resp) {
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
//change profile
let changeProfileForm = $("#changeProfileForm");
function changeProfile() {
  changeProfileForm.find("input").click();
}
changeProfileForm.on("change", "input", function () {
  changeProfileForm.find("button[type=submit]").click();
});
changeProfileForm.on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: $(this).attr("action"), // Url to which the request is send
    type: "POST", // Type of request to be send, called as method
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function (resp) {
      if (resp) {
        swal({
          type: "success",
          text: "Profile Picture Updated Successfully"
        }).then(result => {
          location.reload();
        });
      }
    }
  });
});

let newSliderModal = $("#newSlider");
let editSliderModal = $("#editSlider");

newSliderModal.on("submit", "form", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + "api/slider/add",
    type: "POST",
    data: $(this).serialize(),
    success: function (response) {
      showMessage(response);
    }
  });
});
editSliderModal.on("submit", "form", function (e) {
  e.preventDefault();
  $.ajax({
    url: base_url + "api/slider/edit",
    type: "POST",
    data: $(this).serialize(),
    success: function (response) {
      showMessage(response);
    }
  });
});
function editSlider(id) {
  editSliderModal.modal("toggle");
  let editForm = editSliderModal.find("form");
  $.ajax({
    url: base_url + "api/slider/read",
    type: "POST",
    data: { id },
    success: function (resp) {
      editForm.find("input[name=id]").val(resp.id);
      editForm.find("input[name=header]").val(resp.header);
      editForm.find("textarea[name=body]").val(resp.body);
    }
  });
}
function deleteSlider(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to undo this!",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(result => {
    if (result.value) {
      $.ajax({
        url: base_url + "api/slider/delete",
        type: "POST",
        data: { id },
        success: function (response) {
          showMessage(response);
        }
      });
    }
  });
}
//activate data-tables
$(document).ready(function () {
  $("#data-table").DataTable();
  $("#tbl_students").DataTable({
    order: [[6, "desc"]]
  });
  $("#tbl_presidents").DataTable({
    order: [[6, "desc"]]
  });
});
