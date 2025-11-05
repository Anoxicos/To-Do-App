# 📝 PHP Todo List App

A simple **Todo List web app** built using **PHP** and **MySQL**.  
This project lets users **add**, **view**, **mark as done**, **undo**, and **delete** tasks.  
It’s a great starter project for learning PHP, databases, and CRUD operations.

---

## 🚀 Features

- ➕ Add new tasks  
- ✅ Mark tasks as done  
- ↩️ Undo completed tasks  
- ❌ Delete tasks  
- 🗂️ Stores data in a MySQL database  
- 🎨 Styled with a simple CSS interface  

---

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS  
- **Backend:** PHP (procedural style)  
- **Database:** MySQL  

---

## 📂 Project Structure

todolist/
│
├── db.php # Database connection
├── index.php # Main page (list + form)
├── add.php # Adds new tasks
├── done.php # Marks a task as done
├── undo.php # Reverts a done task
├── delete.php # Deletes a task
├── style.css # Styling for the app
└── README.md # Project documentation


---

## 🧰 Setup Instructions

### 1️⃣ Create the Database
Open your MySQL or phpMyAdmin and run:

```sql
CREATE DATABASE todolist_db;

USE todolist_db;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    is_done BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
### 2️⃣ Configure the Database Connection
```sql
$host = "localhost";
$user = "root";     // your MySQL username
$pass = "";         // your MySQL password
$dbname = "todolist_db";
```

### 3️⃣ Run the App
Place the project folder inside your local server (e.g. htdocs if using XAMPP).

Start Apache and MySQL from XAMPP.

Open your browser and go to:

http://localhost/todolist/index.php
