# PHP MySQL CRUD Registration Form with Login & DataTables

This project is a **simple PHP CRUD (Create, Read, Update, Delete) Registration Form** with:
- Login functionality
- Image upload
- DataTables integration for managing users
---
## 📁 Folder Structure
```
registrationform/
├── images/              <-- Folder to store uploaded images
├── connection.php       <-- Database connection file
├── delete.php           <-- Deletes user records
├── display.php          <-- Displays user data with DataTables
├── index.php            <-- Registration form
├── login.php            <-- Login page
├── update_design.php    <-- Update form to edit users
├── style.css            <-- Main styling file
├── login-style.css      <-- Styling for the login page
```

---

##  Required Folder – `images`

You **must create a folder named `images`** in your project directory.  
This folder will store the **uploaded profile images** of each user.

---

##  Database Setup

### ➤ **Database Name:** `registrationform`  
### ➤ **Table Name:** `form`

### ➤ **Table Columns:**
| #  | Column Name | Type         | Collation           | Null | Default | Extra          |
|----|-------------|--------------|---------------------|------|---------|----------------|
| 1  | id          | int(11)      |                     | No   | None    | AUTO_INCREMENT |
| 2  | image       | varchar(400) | utf8mb4_general_ci  | No   | None    |                |
| 3  | fname       | varchar(200) | utf8mb4_general_ci  | No   | None    |                |
| 4  | lname       | varchar(200) | utf8mb4_general_ci  | No   | None    |                |
| 5  | username    | varchar(200) | utf8mb4_general_ci  | No   | None    |                |
| 6  | password    | varchar(20)  | utf8mb4_general_ci  | No   | None    |                |
| 7  | gender      | varchar(10)  | utf8mb4_general_ci  | No   | None    |                |
| 8  | email       | varchar(30)  | utf8mb4_general_ci  | No   | None    |                |
| 9  | caste       | varchar(10)  | utf8mb4_general_ci  | No   | None    |                |
| 10 | language    | varchar(40)  | utf8mb4_general_ci  | No   | None    |                |
| 11 | phone       | varchar(10)  | utf8mb4_general_ci  | No   | None    |                |
| 12 | address     | varchar(200) | utf8mb4_general_ci  | No   | None    |                |

---

##  How to Run the Project

### 1. Clone the Repository
```bash
git clone https://github.com/PankajPote18/php-mysql-crud.git
```

### 2. Set Up Your Local Server
- Install **XAMPP**, **WAMP**, or any PHP/MySQL environment.
- Place the project folder (`registrationform`) in your server's root directory (`htdocs` for XAMPP).
Example path:
```
C:\xampp\htdocs\registrationform
```

### 3. Configure the Database Connection
In the file `connection.php`, update your MySQL connection details

### 4. Import the Database
- Open **phpMyAdmin**
- Create a new database named **`registrationform`**
- Create a table named **`form`** with the structure shown above.

### 5. Create the `images` Folder
Make sure you have this folder inside your project directory:
```
registrationform/images
```

### 6. Access the Application
Open your browser and visit:
```
http://localhost/registrationform/index.php
```

---

##  Features
- User registration form with validation.
- Upload and store profile images in the `images/` folder.
- Login functionality (`login.php`).
- Display all users in a searchable, sortable, and paginated table using **DataTables** (`display.php`).
- Edit and update user details (`update_design.php`).
- Delete user records and remove associated images (`delete.php`).

---

##  Technologies Used
- PHP (Core)
- MySQL (phpMyAdmin)
- HTML / CSS
- JavaScript
- DataTables

---

##  Author
Created by **Pankaj Pote**  
GitHub: [PankajPote18](https://github.com/PankajPote18)

