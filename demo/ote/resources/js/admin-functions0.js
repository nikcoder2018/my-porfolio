let newStudent = $("#newStudent");
let newTeacher = $("#newTeacher");
let newSubject = $("#newSubject");
let newDepartment = $("#newDepartment");
let newClass = $("#newClass");
let newCategory = $("#newCategory");

let editStudent = $("#editStudent");
let editTeacher = $("#editTeacher");
let editSubject = $("#editSubject");
let editCategory = $("#editCategory");
let editDepartment = $("#editDepartment");
let viewClassStudents = $("#viewClassStudents");

newStudent.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: {
      usertype: "student",
      username: $(this)
        .find("input[name=username]")
        .val(),
      password: $(this)
        .find("input[name=password]")
        .val(),
      lastname: $(this)
        .find("input[name=lastname]")
        .val(),
      middleinitial: $(this)
        .find("input[name=middleinitial]")
        .val(),
      firstname: $(this)
        .find("input[name=firstname]")
        .val(),
      email: $(this)
        .find("input[name=email]")
        .val(),
      course: $(this)
        .find("select[name=course] :selected")
        .val()
    },
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "New Student Successfully Added"
        }).then(result => {
          newStudent.find("form").trigger("reset");
          newStudent.modal("toggle");
          location.reload();
        });
      } else {
        swal({
          type: "error",
          text: resp.error_message
        });
      }
    }
  });
});
newTeacher.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: {
      lastname: $(this)
        .find("input[name=lastname]")
        .val(),
      middleinitial: $(this)
        .find("input[name=middleinitial]")
        .val(),
      firstname: $(this)
        .find("input[name=firstname]")
        .val(),
      email: $(this)
        .find("input[name=email]")
        .val(),
      position: $(this)
        .find("select[name=position] :selected")
        .val()
    },
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "New Teacher Successfully Added"
        }).then(result => {
          newStudent.find("form").trigger("reset");
          newStudent.modal("toggle");
          location.reload();
        });
      } else {
        swal({
          type: "error",
          text: resp.error_message
        });
      }
    }
  });
});
newSubject.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "New Subject Successfully Added"
        }).then(result => {
          newStudent.find("form").trigger("reset");
          newStudent.modal("toggle");
          location.reload();
        });
      } else {
        swal({
          type: "error",
          text: resp.error_message
        });
      }
    }
  });
});

newDepartment.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "New Department Successfully Added"
        }).then(result => {
          newDepartment.find("form").trigger("reset");
          newDepartment.modal("toggle");
          location.reload();
        });
      } else {
        swal({
          type: "error",
          text: resp.error_message
        });
      }
    }
  });
});
editDepartment.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "Department Successfully Updated"
        }).then(result => {
          editDepartment.find("form").trigger("reset");
          editDepartment.modal("toggle");
          location.reload();
        });
      } else {
        swal({
          type: "error",
          text: resp.error_message
        });
      }
    }
  });
});
function editdepartment(id) {
  let editForm = editDepartment.find("form");
  editDepartment.modal("toggle");
  $.ajax({
    url: base_url + "departments/read",
    type: "POST",
    data: {
      id
    },
    success: function(resp) {
      editForm.find("input[name=id]").val(resp.request_data[0].id);
      editForm
        .find("input[name=name]")
        .val($.ucfirst(resp.request_data[0].name));
    }
  });
}
function deletedepartment(id) {
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
        url: base_url + "departments/delete",
        type: "POST",
        data: {
          id
        },
        success: function(resp) {
          if (resp.success) {
            swal({
              type: "success",
              text: "Department Successfully Deleted"
            }).then(result => {
              location.reload();
            });
          }
        }
      });
    }
  });
}

let addStudentBtn = newClass.find("#addStudentBtn");
let studentlist = [];
addStudentBtn.on("click", function() {
  let isExist = false;
  let form = newClass.find("form");
  let val = form.find("select[name=student] :selected").val();
  let name = form.find("select[name=student] :selected").text();
  if (val == "-") {
    return;
  }
  $.each(studentlist, function(key, item) {
    if (item.id == val) {
      isExist = true;
    }
  });
  console.log(studentlist);
  if (!isExist) {
    studentlist.push({ id: val, name: name });
    loadStudentList();
    isExist = false;
  }
});
function loadStudentList() {
  let counter = 1;
  let list = newClass.find("#student-list");
  list.empty();
  $.each(studentlist, function(key, item) {
    list.append(
      '<li class="list-group-item clear-fix">' +
        counter +
        ". " +
        item.name +
        " <button type='button' class='btn btn-link pull-right' onclick='removeStudentList(" +
        key +
        ")'><span class='fa fa-trash'></span></button></li>"
    );
    counter++;
  });
}
function removeStudentList(index) {
  studentlist.splice(index, 1);
  loadStudentList();
  console.log(studentlist);
}
newClass.on("submit", "form", function(e) {
  e.preventDefault();
  let subject = $(this)
    .find("select[name=subject] :selected")
    .val();
  let students = studentlist;
  let adviser = $(this)
    .find("select[name=adviser] :selected")
    .val();
  if (subject == "-" || adviser == "-") {
    return;
  }
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: {
      subject,
      students,
      adviser
    },
    success: function(resp) {
      if (resp.added > 0) {
        swal({
          type: "success",
          text:
            resp.added +
            " added in the class and " +
            resp.exist +
            " students already existed."
        }).then(result => {
          newStudent.find("form").trigger("reset");
          newStudent.modal("toggle");
          location.reload();
        });
      } else {
        swal({
          type: "error",
          text:
            resp.added +
            " added in the class and " +
            resp.exist +
            " students already existed."
        }).then(result => {
          newStudent.find("form").trigger("reset");
          newStudent.modal("toggle");
          location.reload();
        });
      }
    }
  });
});

newCategory.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "Category Successfully Added"
        }).then(result => {
          newCategory.find("form").trigger("reset");
          newCategory.modal("toggle");
          location.reload();
        });
      } else if (resp.type == "fail") {
        newCategory
          .find(".alert")
          .show()
          .html(resp.message);
      }
    }
  });
});

editStudent.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "Student Successfully Updated"
        }).then(result => {
          editStudent.find("form").trigger("reset");
          editStudent.modal("toggle");
          location.reload();
        });
      } else if (resp.type == "fail") {
        editStudent
          .find(".alert")
          .show()
          .html(resp.message);
      }
    }
  });
});
editTeacher.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "Teacher Successfully Updated"
        }).then(result => {
          editTeacher.find("form").trigger("reset");
          editTeacher.modal("toggle");
          location.reload();
        });
      } else if (resp.type == "fail") {
        editTeacher
          .find(".alert")
          .show()
          .html(resp.message);
      }
    }
  });
});
editSubject.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "Subject Successfully Updated"
        }).then(result => {
          editSubject.find("form").trigger("reset");
          editSubject.modal("toggle");
          location.reload();
        });
      } else if (resp.type == "fail") {
        editSubject
          .find(".alert")
          .show()
          .html(resp.message);
      }
    }
  });
});
editCategory.on("submit", "form", function(e) {
  e.preventDefault();
  $.ajax({
    url: base_url + $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(),
    success: function(resp) {
      if (resp.success) {
        swal({
          type: "success",
          text: "Category Successfully Updated"
        }).then(result => {
          editCategory.find("form").trigger("reset");
          editCategory.modal("toggle");
          location.reload();
        });
      } else {
        editCategory;
        swal({
          type: "error",
          text: resp.message
        });
      }
    }
  });
});
function editstudent(id) {
  let editForm = editStudent.find("form");
  editStudent.modal("toggle");
  $.ajax({
    url: base_url + "users/read",
    type: "POST",
    data: {
      id
    },
    success: function(resp) {
      editForm.find("input[name=id]").val(resp.request_data[0].id);
      editForm.find("input[name=username]").val(resp.request_data[0].username);
      editForm.find("input[name=lastname]").val(resp.request_data[0].lastname);
      editForm
        .find("input[name=middleinitial]")
        .val(resp.request_data[0].middleinitial);
      editForm
        .find("input[name=firstname]")
        .val(resp.request_data[0].firstname);
      editForm.find("input[name=email]").val(resp.request_data[0].email);
      editForm
        .find("select[name=course]")
        .val(resp.request_data[0].course)
        .prop("selected", "selected");
    }
  });
}
function deletestudent(id) {
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
        url: base_url + "users/delete",
        type: "POST",
        data: {
          id
        },
        success: function(resp) {
          if (resp.success) {
            swal({
              type: "success",
              text: "Student Successfully Deleted"
            }).then(result => {
              location.reload();
            });
          }
        }
      });
    }
  });
}
function editteacher(id) {
  let editForm = editTeacher.find("form");
  editTeacher.modal("toggle");
  $.ajax({
    url: base_url + "teachers/read",
    type: "POST",
    data: {
      id
    },
    success: function(resp) {
      editForm.find("input[name=id]").val(resp.request_data[0].id);
      editForm.find("input[name=lastname]").val(resp.request_data[0].lastname);
      editForm
        .find("input[name=middleinitial]")
        .val(resp.request_data[0].middleinitial);
      editForm
        .find("input[name=firstname]")
        .val(resp.request_data[0].firstname);
      editForm.find("input[name=email]").val(resp.request_data[0].email);
      editForm
        .find("select[name=position]")
        .val(resp.request_data[0].position)
        .prop("selected", "selected");
    }
  });
}
function deleteteacher(id) {
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
        url: base_url + "teachers/delete",
        type: "POST",
        data: {
          id
        },
        success: function(resp) {
          if (resp.success) {
            swal({
              type: "success",
              text: "Teacher Successfully Deleted"
            }).then(result => {
              location.reload();
            });
          }
        }
      });
    }
  });
}
function editsubject(id) {
  let editForm = editSubject.find("form");
  editSubject.modal("toggle");
  $.ajax({
    url: base_url + "subjects/read",
    type: "POST",
    data: {
      id
    },
    success: function(resp) {
      editForm.find("input[name=id]").val(resp.request_data[0].id);
      editForm.find("input[name=title]").val(resp.request_data[0].title);
      editForm.find("input[name=code]").val(resp.request_data[0].code);
    }
  });
}
function deletesubject(id) {
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
        url: base_url + "subjects/delete",
        type: "POST",
        data: {
          id
        },
        success: function(resp) {
          if (resp.success) {
            swal({
              type: "success",
              text: "Subject Successfully Deleted"
            }).then(result => {
              location.reload();
            });
          }
        }
      });
    }
  });
}
function viewclassstudents(subject, adviser) {
  viewClassStudents.modal("toggle");
  let tbody = viewClassStudents.find("tbody");
  tbody.empty();
  $.ajax({
    url: base_url + "classes/read",
    type: "POST",
    data: {
      subject,
      adviser
    },
    success: function(resp) {
      console.log(resp);
      let counter = 0;
      $.each(resp.request_data, function(index, item) {
        counter++;
        let row = "<tr>";
        row += "<td>" + counter + "</td>";
        row += "<td>" + item.firstname + "</td>";
        row += "<td>" + item.middleinitial + "</td>";
        row += "<td>" + item.lastname + "</td>";
        row += "<td>" + item.course + "</td>";
        row += "<td>";
        row +=
          '<button class="btn btn-danger btn-sm" onclick="removeClassStudent(' +
          item.class_id +
          ')">Remove</button>';
        row += "</td>";
        row += "</tr>";
        tbody.append(row);
      });
    }
  });
}
function removeClassStudent(id) {
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
        url: base_url + "classes/delete",
        type: "POST",
        data: {
          id
        },
        success: function(resp) {
          if (resp.success) {
            swal({
              type: "success",
              text: "Student Successfully Removed"
            }).then(result => {
              location.reload();
            });
          }
        }
      });
    }
  });
}
function deleteClass(subject, adviser) {
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
        url: base_url + "classes/delete_entire",
        type: "POST",
        data: {
          subject,
          adviser
        },
        success: function(resp) {
          if (resp.success) {
            swal({
              type: "success",
              text: "Entire Class Successfully Removed"
            }).then(result => {
              location.reload();
            });
          }
        }
      });
    }
  });
}
function editcategory(id) {
  let editForm = editCategory.find("form");
  editCategory.modal("toggle");
  $.ajax({
    url: base_url + "category/read",
    type: "POST",
    data: {
      id
    },
    success: function(resp) {
      editForm.find("input[name=id]").val(resp.request_data[0].id);
      editForm.find("input[name=name]").val(resp.request_data[0].category);
    }
  });
}
function deletecategory(id) {
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
        url: base_url + "category/delete",
        type: "POST",
        data: {
          id
        },
        success: function(resp) {
          if (resp.success) {
            swal({
              type: "success",
              text: "Category Successfully Deleted"
            }).then(result => {
              location.reload();
            });
          }
        }
      });
    }
  });
}

function print_report() {
  var content = document.getElementById("report-table").innerHTML;
  var mywindow = window.open("", "Print", "height=600,width=800");

  mywindow.document.write("<html>");
  mywindow.document.write("</head><body >");
  mywindow.document.write(content);
  mywindow.document.write("</body></html>");

  mywindow.document.close();
  mywindow.focus();
  mywindow.print();
  mywindow.close();
  return true;
}

function download_pdf() {
  let filter_key = $("select[name=filter_key] :selected").val();
  let filter_value = null;
  let filter_value2 = null;
  if (filter_key == "date") {
    filter_value = $("input[name=filter_value]").val();
    filter_value2 = $("input[name=filter_value2]").val();
  } else if (filter_key == "remarks") {
    filter_value = $("select[name=filter_value] :selected").val();
  } else {
    filter_value = $("input[name=filter_value]").val();
  }
  if ((filter_key = "date")) {
    window.location =
      base_url +
      "reports/create_pdf?key=" +
      filter_key +
      "&value=" +
      filter_value +
      "&value2=" +
      filter_value2;
  } else if (filter_key != "-" && filter_value != "") {
    window.location =
      base_url +
      "reports/create_pdf?key=" +
      filter_key +
      "&value=" +
      filter_value;
  } else {
    window.location = base_url + "reports/create_pdf";
  }
}

function reloadReportsTable() {
  let filter_key = $("select[name=filter_key] :selected").val();
  let filter_value = null;
  if (filter_key == "remarks") {
    filter_value = $("select[name=filter_value] :selected").val();
  } else {
    filter_value = $("input[name=filter_value]").val();
  }
  let filter_value2 = null;
  if (filter_key == "date") {
    filter_value2 = $("input[name=filter_value2]").val();
  }
  $.ajax({
    url: base_url + "reports/ajax_data",
    type: "POST",
    data: {
      filter_key,
      filter_value,
      filter_value2
    },
    success: function(data) {
      loadReports(data);
    }
  });
}

$("select[name=filter_key]").on("change", function() {
  if (this.value == "remarks") {
    $("#input_value")
      .removeAttr("name")
      .hide();
    $("#select_value")
      .attr("name", "filter_value")
      .show();
    $("#date_value")
      .removeAttr("name")
      .hide();
    $("#date_value2")
      .removeAttr("name")
      .hide();
  }
  if (this.value == "date") {
    $("#input_value")
      .removeAttr("name")
      .hide();
    $("#select_value")
      .removeAttr("name")
      .hide();
    $("#date_value")
      .attr("name", "filter_value")
      .show();
    $("#date_value2")
      .attr("name", "filter_value2")
      .show();
  }
  if (this.value != "date" && this.value != "remarks") {
    $("#input_value")
      .attr("name", "filter_value")
      .show();
    $("#select_value")
      .removeAttr("name")
      .hide();
    $("#date_value")
      .removeAttr("name")
      .hide();
    $("#date_value2")
      .removeAttr("name")
      .hide();
  }
});

function initReports() {
  $("select[name=filter_key] :selected").prop("selected", false);
  $("select[name=filter_value] :selected").prop("selected", false);
  $("#input_value").val("");
  $("#date_value").val("");
  $("select[name=filter_key]").change();
  $.ajax({
    url: base_url + "reports/ajax_data",
    type: "POST",
    success: function(data) {
      loadReports(data);
    }
  });
}
initReports();

function loadReports(data = false) {
  let table = $("#report-table").find("table");
  let tableBody = table.find("tbody");
  tableBody.empty();

  let counter = 1;
  $.each(data, function(i, v) {
    let remarks = "";
    let scale = "";
    if (v.total_rate >= 97 && v.total_rate <= 100) {
      remarks = "Outstanding";
      scale = 5;
    } else if (v.total_rate >= 92 && v.total_rate <= 96) {
      remarks = "Very Satisfactory";
      scale = 4;
    } else if (v.total_rate >= 86 && v.total_rate <= 91) {
      remarks = "Satisfactory";
      scale = 3;
    } else if (v.total_rate >= 80 && v.total_rate <= 85) {
      remarks = "Fair";
      scale = 2;
    } else if (v.total_rate >= 0 && v.total_rate <= 79) {
      remarks = "Poor";
      scale = 1;
    }
    let row = "<tr>";
    row += "<td>" + counter++ + "</td>";
    row += "<td>" + v.student_id + "</td>";
    row += "<td>" + v.student_name + "</td>";
    row += "<td>" + v.teacher_name + "</td>";
    row += "<td>" + scale + "</td>";
    row += "<td>" + remarks + "</td>";
    row += "<td>" + convertToDateFormat(v.created_at) + "</td>";
    row += "</tr>";
    tableBody.append(row);
  });
}

function convertToDateFormat(date) {
  let d = new Date(date);
  var months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
  ];
  let month_date = d.getDate();
  if (d.getDate() < 10) {
    month_date = "0" + d.getDate();
  }
  return months[d.getMonth()] + " " + month_date + ", " + d.getFullYear();
}
(function($) {
  $.ucfirst = function(str) {
    var text = str;

    var parts = text.split(" "),
      len = parts.length,
      i,
      words = [];
    for (i = 0; i < len; i++) {
      var part = parts[i];
      var first = part[0].toUpperCase();
      var rest = part.substring(1, part.length);
      var word = first + rest;
      words.push(word);
    }

    return words.join(" ");
  };
})(jQuery);

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
