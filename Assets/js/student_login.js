
document.getElementById("studentLoginForm").addEventListener("submit", function (e) {

    const studentId = document.getElementById("n3").value;
    const name = document.getElementById("n1").value;
    const password = document.getElementById("n5").value;


    // Student ID cannot be empty
    if (studentId === "") {
        alert("Please enter your student ID.");
        e.preventDefault();
        return;
    }


    // Name cannot be empty
    if (name === "") {
        alert("Please enter your name.");
        e.preventDefault();
        return;
    }


    // Password cannot be empty
    if (password === "") {
        alert("Please enter your password.");
        e.preventDefault();
        return;
    }


    // Spaces are not allowed
    if (/\s/.test(studentId)) {
        alert("Student ID cannot contain spaces.");
        e.preventDefault();
        return;
    }

    if (/\s/.test(name)) {
        alert("Name cannot contain spaces.");
        e.preventDefault();
        return;
    }

    if (/\s/.test(password)) {
        alert("Password cannot contain spaces.");
        e.preventDefault();
        return;
    }


    // Student ID numbers only
    if (!/^\d+$/.test(studentId)) {
        alert("Student ID must contain numbers only.");
        e.preventDefault();
        return;
    }


    // Name letters only
    if (!/^[A-Za-z]+$/.test(name)) {
        alert("Name can contain letters only.");
        e.preventDefault();
        return;
    }


    // Password minimum 6 characters
    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        e.preventDefault();
        return;
    }

});
