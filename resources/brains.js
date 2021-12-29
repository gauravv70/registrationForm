function getData() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var pwd = document.getElementById("pwd").value;
    var conpwd = document.getElementById("conpwd").value;
    var gender = document.getElementById("gender").value;
    var data = {
        fName: fname,
        lName: lname,
        email: email,
        password: pwd,
        gender: gender,
        confirmedPassword: conpwd
    };
    return data;
}
function validateData(data) {
    if (data.confirmedPassword !== data.password) {
        window.alert("Passwords do not match");
    } else if (!data.fName || !data.lName || !data.gender || !data.email || !data.password || !data.confirmedPassword) {
        window.alert("Please enter all details");
    } else {
        return true;
    }
    return false;
}
function sendData() {
    var data = getData();
    if (validateData(data)) {
        const xhr = new XMLHttpRequest();
        xhr.onload = function () {
            window.alert("Details saved successfully");
            document.querySelector("form").reset();
        }
        xhr.open("POST", "resources/connector.php");
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(JSON.stringify(data));

    }
}
