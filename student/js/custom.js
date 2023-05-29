// var dictionary = JSON.parse(document.currentScript.getAttribute('data-dictionary'));
// console.log(dictionary);
// {% set array = [1, 2, 3, 4, 5] %}
// {% set dictionary = {} %}

// {% for a, b in attdictionary %}
//     Key: {{ a }}, Value: {{ b }}
//     {% set dictionary = dictionary|merge({ a: b }) %}
// {% endfor %}


{/* <td class="hike-field">
<button value="{{ student.attendance }}" class="attendance btn green" name="{{ student.rollNo }}"><p id=data>PRESENT</p></button>
</td> */}

(function ($, Drupal) {
  Drupal.behaviors.studentForm = {
    attach: function (context, settings) {
      $('.attendance-checkbox', context).on('change', function () {
        $(this).closest('form').trigger('submit');
      });
    }
  };
})(jQuery, Drupal);


const attendances = document.querySelectorAll(".attendance");
attendances.forEach(function (attendance) {
  attendance.addEventListener("click", function () {
    console.log(attendance['name']);
    // alert("clicked");
    // var value=document.getElementsByClassName("attendance");
    if(attendance['value']==0){
      var data1 = document.getElementById("data");
      // data1.innerHTML = "ABSENT";
      attendance.textContent='<p>ABSENT</p>';
      attendance.classList.remove("btn","green");
      attendance.classList.add("btn","red");
      attendance['value']=1;
      
      console.log(attendance['value']);
      
    }else{
      var data1 = document.getElementById("data");
      // data1.innerHTML = 'PRESENT';
      attendance.textContent='<p>PRESENT</p>';
      attendance.classList.remove("btn","red");
      attendance.classList.add("btn","green");
      attendance['value']=0;
      console.log(attendance['value']);
    }
    // if(attendance.textContent=='PRESENT'){
    //   attendance.textContent='ABSENT';
    //   attendance.classList.remove("green");
    //   attendance.classList.add("red");
    // }else{
    //   attendance.textContent='PRESENT';
    //   attendance.classList.remove("red");
    //   attendance.classList.add("green");
    // }
    // attendance.textContent = 'Button clicked';
        
  });

});

// var db = openDatabase('student_attendance', '1.0', 'Student DB', 65535);
// $(function(){
//   $(".attendance").click(function(){
//     db.transaction(function(transaction){
//       var sql = "INSERT INTO `studata`(`sname`, `age`, `phoneNo`, `attendence`) VALUES ('bbb',24,1234,1)";
//       transaction.executeSql(sql,undefined,function(){
//         alert("DATA is inserted");
//       },function(){
//         alert("No inserted!");
//       })
//     });
//   });
// })

// const values = document.querySelectorAll("#value");
// values.forEach(function (value) {
//   value.addEventListener("click", function () {
//     console.log(value['name']);
//     alert("clicked")
//   });

// });
// document.getElementById("valuebutton").addEventListener("click", function() {
//   alert("Hello World!");
// });

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
