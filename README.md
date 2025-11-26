# SMART ASSIGNMENT SUBMISSION SYSTEM
A simple web-based system for creating assignments, submitting files, and allowing teachers to view and evaluate student work.

---

## 1. OVERVIEW
This project provides an online workflow for assignment submission.  
Teachers can create assignments, and students can upload their files.  
The system stores all data in a MySQL database and uses PHP for backend logic.

---

## 2. FEATURES

### 2.1 TEACHER FEATURES
- Create assignments with questions  
- Set submission deadlines  
- View all submissions  
- Download submitted files  
- Check submission time (late/on-time)  
- Evaluate and update marks  

### 2.2 STUDENT FEATURES
- View active assignments  
- Upload files  
- Check submission status  
- View marks and feedback  

---

## 3. TECHNOLOGIES USED
- HTML  
- CSS  
- JavaScript  
- PHP  
- MySQL  
- XAMPP  

---

## 4. PROJECT STRUCTURE
```
/project
│── README.md
│── db.php
│── index.php
│── register.php
│── logout.php
│── dashboard_student.php
│── dashboard_teacher.php
│── create_assignment.php
│── add_questions.php
│── submit_assignment.php
│── view_submission.php
│── evaluate_assignment.php
└── uploads/       (auto-created when files are uploaded)
```

---

## 5. HOW TO RUN THE PROJECT (LOCALHOST)

### Step 1: Install XAMPP  
Install XAMPP (Apache + MySQL).

### Step 2: Move Project Files  
Place the project folder inside:
```
xampp/htdocs/
```

### Step 3: Import Database  
1. Open phpMyAdmin  
2. Create a database  
3. Import the SQL file (export from your system).

### Step 4: Configure Database  
Update database credentials in:
```
db.php
```

### Step 5: Run the Project  
Open:
```
http://localhost/your-project-folder
```

---

## 6. DATABASE TABLES
- students  
- faculty  
- assignments  
- assignment_questions  
- submissions  
- submission_answers  

Each submission includes:  
- Student ID  
- Assignment ID  
- Answer file per question  
- Timestamp  
- Status  
- Marks  
- Feedback  

---

## 7. DEFAULT LOGIN (DEMO)

Teacher:  
```
Username: teacher01
Password: password
```

Student:  
```
Username: student01
Password: password
```

---

## 8. FUTURE IMPROVEMENTS
- Email notifications  
- Admin panel  
- Analytics dashboard  
- Cloud storage integration  
- Plagiarism detection system  
