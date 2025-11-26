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
│── index.html
│── login.php
│── config.php
│── teacher/
│── student/
│── uploads/
│── assets/
│── database/
└── README.md
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
3. Import the SQL file located in:
```
/database/assignment.sql
```

### Step 4: Configure Database  
Update database credentials in:
```
config.php
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

Each submission includes:  
- Student ID  
- Assignment ID  
- File path  
- Timestamp  
- Status  
- Marks  

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

---

## 9. LICENSE
This project is open-source and free to use.
