Smart Assignment Submission System

A web-based platform that allows students to submit assignments online and enables teachers to view, evaluate, and manage submissions efficiently.
This system simplifies the submission workflow and reduces manual work.

Features
Faculty Side

Create and upload new assignments

Set deadlines

View all student submissions

Download submitted files

Track late submissions

Update evaluation status

Student Side

View available assignments

Upload and submit assignment files

Check submission status

View evaluated marks and feedback

Technologies Used

HTML5, CSS3

JavaScript

PHP (server-side logic)

MySQL (database)

XAMPP / Localhost for development

Folder Structure
project/
│── index.html
│── login.php
│── config.php
│── student/
│── teacher/
│── uploads/
│── assets/
│── database/
└── README.md

How to Run the Project Locally

Install a local server environment (XAMPP recommended).

Place the project folder inside:

xampp/htdocs/


Start Apache and MySQL from XAMPP Control Panel.

Open phpMyAdmin and import the SQL file located in:

/database/assignment.sql


Configure database credentials inside config.php.

Run the application in the browser:

http://localhost/project-folder-name

Database Structure
Tables:

students

faculty

assignments

submissions

Each submission contains:

Student ID

Assignment ID

File path

Submission timestamp

Evaluation status

Default Login Credentials (Demo)

Student account:

Username: student01  
Password: password


Faculty account:

Username: teacher01  
Password: password


(You can modify these in the database.)

Future Enhancements

Email notification system

Detailed marks with automatic score calculation

Admin dashboard for managing users

Cloud storage integration (Google Drive / AWS S3)

Analytics for teacher dashboard
