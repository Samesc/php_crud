function searchId(newId) {
  txtIdMessage = document.getElementById("idMessage");
  txtNewId = document.getElementById("id");
  btnSaveStudent = document.getElementById("sendStudentData");

  if (newId.length == 0) {
    txtNewId.innerHTML = "";
    txtIdMessage.innerHTML = "";
    btnSaveStudent.disabled = true;
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        response = JSON.parse(this.responseText);

        if (response.success) {
          txtIdMessage.classList.add("warning");
          txtIdMessage.classList.remove("success");
          btnSaveStudent.disabled = true;
        } else {
          txtIdMessage.classList.add("success");
          txtIdMessage.classList.remove("warning");
          btnSaveStudent.disabled = false;
        }
        txtIdMessage.innerHTML = response.message;
      }
    };
    xmlhttp.open("GET", "backend/searchNewId.php?newId=" + newId, true);
    xmlhttp.send();
  }
}

function sendData() {
  validateCreateForm();
  id = document.getElementById("id").value;
  firstName = document.getElementById("firstName").value;
  secondName = document.getElementById("secondName").value;
  lastName = document.getElementById("lastName").value;
  secondLastName = document.getElementById("secondLastName").value;
  birthdate = document.getElementById("date").value;
  type = document.getElementById("type").value;

  var data = {
    id,
    firstName,
    secondName,
    lastName,
    secondLastName,
    birthdate,
    type,
  };

  mdlMessage = document.getElementById("messageModal");

  txtmdlMessage = document.getElementById("mdlMessage");
  txtmdlSuccess = document.getElementById("mdlSuccess");

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText.success);
      response = JSON.parse(this.responseText);

      txtmdlSuccess.value = response.success;
      txtmdlMessage.innerHTML = response.message;
    }
  };
  xmlhttp.open("POST", "process.php", true);
  xmlhttp.setRequestHeader("Content-Type", "application/json");
  xmlhttp.send(JSON.stringify(data));
}

function sendDataCourse() {
  validateCreateCourseForm();

  id = document.getElementById("id").value;
  nameCourse = document.getElementById("name").value;
  description = document.getElementById("description").value;
  idteacher = document.getElementById("idteacher").value;
  type = document.getElementById("type").value;
  var data = {
    id,
    nameCourse,
    description,
    idteacher,
    type,
  };

  mdlMessage = document.getElementById("messageModal");

  txtmdlMessage = document.getElementById("mdlMessage");
  txtmdlSuccess = document.getElementById("mdlSuccess");

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      result = this.responseText;
      response = JSON.parse(this.responseText);

      console.log(response.success);
      txtmdlSuccess.value = response.success;
      txtmdlMessage.innerHTML = response.message;
    }
  };
  xmlhttp.open("POST", "process.php", true);
  xmlhttp.setRequestHeader("Content-Type", "application/json");
  xmlhttp.send(JSON.stringify(data));
}

function sendDataAssignment() {
  validateAssigmentForm();
  idstudent = document.getElementById("idstudent").value;
  idcourse = document.getElementById("idcourse").value;
  type = document.getElementById("type").value;

  var data = {
    idstudent,
    idcourse,
    type,
  };

  mdlMessage = document.getElementById("messageModal");

  txtmdlMessage = document.getElementById("mdlMessage");
  txtmdlSuccess = document.getElementById("mdlSuccess");

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      response = JSON.parse(this.responseText);

      console.log(idstudent);

      console.log(idcourse);
      txtmdlSuccess.value = response.success;
      txtmdlMessage.innerHTML = response.message;
    }
  };
  xmlhttp.open("POST", "process.php", true);
  xmlhttp.setRequestHeader("Content-Type", "application/json");
  xmlhttp.send(JSON.stringify(data));
}

function UpDelsendDataAssignment() {
  validateAssigmentForm();
  id = document.getElementById("id").value;
  idstudent = document.getElementById("idstudent").value;
  idcourse = document.getElementById("idcourse").value;
  type = document.getElementById("type").value;

  var data = {
    id,
    idstudent,
    idcourse,
    type,
  };

  mdlMessage = document.getElementById("messageModal");

  txtmdlMessage = document.getElementById("mdlMessage");
  txtmdlSuccess = document.getElementById("mdlSuccess");

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      response = JSON.parse(this.responseText);

      txtmdlSuccess.value = response.success;
      txtmdlMessage.innerHTML = response.message;
    }
  };
  xmlhttp.open("POST", "process.php", true);
  xmlhttp.setRequestHeader("Content-Type", "application/json");
  xmlhttp.send(JSON.stringify(data));
}

function cleanData() {
  mdlSuccess = document.getElementById("mdlSuccess").value;
  type = document.getElementById("type").value;
  console.log(type);
  if (type == "1") {
    if (mdlSuccess == "true") {
      document.getElementById("idMessage").innerHTML = "";
      document.getElementById("id").value = "";
      //document.getElementById("firstName").value = "";
      //document.getElementById("lastName").value = "";
    }
  } else {
    location.href = "read.php";
  }
}

function valideKey(evt) {
  // code is the decimal ASCII representation of the pressed key.
  var code = evt.which ? evt.which : evt.keyCode;

  if (code == 8) {
    // backspace.
    return true;
  } else if (code >= 48 && code <= 57) {
    // is a number.
    return true;
  } else {
    // other keys.
    return false;
  }
}

function validateCreateForm() {
  $("#sendDatafrom").validate({
    rules: {
      id: {
        required: true,
        number: true,
        minlength: 1,
      },
      firstName: {
        required: true,
        maxlength: 40,
        minlength: 1,
      },
      lastName: {
        required: true,
        maxlength: 40,
        minlength: 1,
      },
      date: {
        required: true,
        date: true,
      },
    },

    messages: {
      id: {
        required: "Este campo no puede quedar vacio",
        number: "Solo se aceptan valores numericos",
      },
      firstName: {
        required: "Este campo no puede quedar vacio",
        minlength: "Este campo no puede quedar vacio",
        maxlength: "Nombre muy largo",
      },
      lastName: {
        required: "Este campo no puede quedar vacio",
        minlength: "Este campo no puede quedar vacio",
        maxlength: "Nombre muy largo",
      },
      date: {
        required: "Ingrese una fecha valida",
        date: "Ingrese una fecha valida",
      },
    },
  });
}

function validateCreateCourseForm() {
  $("#sendDatafrom").validate({
    rules: {
      id: {
        required: true,
        number: true,
        minlength: 1,
      },
      name: {
        required: true,
        maxlength: 40,
      },
      description: {
        required: true,
        maxlength: 100,
      },
      idteacher: {
        required: true,
        number: true,
      },
    },

    messages: {
      id: {
        required: "Este campo no puede quedar vacio",
        number: "Solo se aceptan valores numericos",
      },
      name: {
        required: "Este campo no puede quedar vacio",
      },
      description: {
        required: "Este campo no puede quedar vacio",
        maxlength: "La descripción es muy larga",
      },
      idteacher: {
        required: "Este campo no puede quedar vacio",
        number: "Solo se aceptan valores numericos",
      },
    },
  });
}

function validateAssigmentForm() {
  $("#sendDatafrom").validate({
    rules: {
      idstudent: {
        required: true,
        number: true,
      },
      idcourse: {
        required: true,
        number: true,
      },
    },

    messages: {
      idstudent: {
        required: "Este campo no puede quedar vacio",
        number: "Solo se aceptan valores numericos",
      },
      idcourse: {
        required: "Este campo no puede quedar vacio",
        number: "Solo se aceptan valores numericos",
      },
    },
  });
}
