// const checkboxes = document.querySelectorAll(".employee-checkbox");
// checkboxes.forEach(function (checkbox) {
//   checkbox.addEventListener("change", function () {
//     const hikePercentageContainer = this.parentNode.querySelector(
//       ".hike-percentage-container"
//     );
//     hikePercentageContainer.style.display = this.checked ? "block" : "none";
//   });
// });


const attendances = document.querySelectorAll(".attendance");
attendances.forEach(function (attendance) {
  attendance.addEventListener("click", function () {
    // if (attendance == "1"){
    //   print("PRESENT");
    //   alert('present');}
    // else{
    //   print("ABSENT");
    //   alert('absent');}
    console.log(attendance['name']);
    // alert("clicked")
    attendance += 1;

    // updateAttendance(attendance['name']);
    
    });

});

// function updateAttendance(name) {
//    var xhr = new XMLHttpRequest();
//    var url = 'update-attendance.php'; // Replace with the URL of your server-side PHP script
  
//    xhr.open('POST', url, true);
//    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
//    xhr.onreadystatechange = function() {
//    if (xhr.readyState === 4 && xhr.status === 200) {
//    console.log(xhr.responseText); // Handle the response here
//    }
//    };
   
//    var requestBody = 'name=' + encodeURIComponent(name);
//    xhr.send(requestBody);
//   }

// var mysql = require('mysql');
// var con = mysql.createConnection({
//   host: "localhost",
//   user: "root",
//   password: "",
//   database: "student_attandance"
// });
// con.connect(function (err) {
//   if (err) {throw err;}
//   console.log("Connected!");
//   var sql = "INSERT INTO sdata(sname,age,phoneNO,attendance) VALUES('Ajeet Kumar', '27', '12345',1)";
//   con.query(sql, function (err, result) {
//     if (err){
//       throw err;}
//     console.log("1 record inserted");
//   });
// });

// =======================
// const mysql = require('mysql');
// const connection = mysql.createConnection({
//   host: 'localhost',
//   user: 'root',
//   password: '',
// });

// connection.connect((error) => {
//   if(error){
//     console.log('Error connecting to the MySQL Database');
//     return;
//   }
//   console.log('Connection established sucessfully');
// });
// connection.end((error) => {
// });



// ===========================
// // server.js

//

// const express = require('express');
// const bodyParser = require('body-parser');
// const mysql = require('mysql'); // Assuming you're using MySQL

//

// const app = express();
// const port = 3000;

//

// // Create a MySQL connection
// const connection = mysql.createConnection({
//  host: 'localhost',
//  user: 'your_username',
//  password: 'your_password',
//  database: 'your_database',
// });

//

// // Connect to the database
// connection.connect((err) => {
//  if (err) {
//  console.error('Error connecting to database:', err);
//  return;
//  }
//  console.log('Connected to the database');
// });

//

// // Middleware for parsing JSON requests
// app.use(bodyParser.json());

//

// // API endpoint to modify the table
// app.post('/modify-table', (req, res) => {
//  const { id, newName } = req.body;

//

//  // Example: Updating a record in the table
//  const sql = `UPDATE your_table SET name = '${newName}' WHERE id = ${id}`;

//

//  connection.query(sql, (err, result) => {
//  if (err) {
//  console.error('Error modifying table:', err);
//  res.status(500).json({ error: 'Failed to modify table' });
//  return;
//  }

//

//  res.json({ message: 'Table modified successfully' });
//  });
// });

//

// // Start the server
// app.listen(port, () => {
//  console.log(`Server is listening on port ${port}`);
// });
