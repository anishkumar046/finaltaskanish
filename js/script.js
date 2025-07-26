const facultyData = {
  "asharma": {
    password: "1234",
    name: "Dr. A. Sharma",
    timetable: ["Mon 10AM - DBMS", "Wed 2PM - AI"],
    activities: ["Seminar on ML", "Research Project: AI"]
  },
  "bsingh": {
    password: "5678",
    name: "Ms. B. Singh",
    timetable: ["Tue 11AM - Web Dev", "Thu 1PM - Java"],
    activities: ["Web Dev Workshop", "Student Project Mentor"]
  }
};

function loginFaculty() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  if (facultyData[username] && facultyData[username].password === password) {
    localStorage.setItem("facultyUser", username);
    window.location.href = "dashboard.html";
  } else {
    alert("Invalid credentials");
  }
}

window.onload = function () {
  const user = localStorage.getItem("facultyUser");
  if (user && facultyData[user]) {
    document.getElementById("facultyName").innerText = facultyData[user].name;

    document.getElementById("timetableList").innerHTML =
      facultyData[user].timetable.map(item => `<li>${item}</li>`).join("");

    document.getElementById("activityList").innerHTML =
      facultyData[user].activities.map(item => `<li>${item}</li>`).join("");
  }
};
