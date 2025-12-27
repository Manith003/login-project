# 🔐 Login & Profile Management System

A full-stack authentication and profile management system built using **PHP, MySQL, MongoDB, Redis, Docker, and jQuery AJAX**, deployed on **Render**.

This project demonstrates real-world backend concepts such as secure authentication, session handling, multi-database usage, and containerized deployment.

---

## 🚀 Features

- User Registration & Login  
- Secure password hashing  
- Session management using **Redis**  
- Profile view & update  
- Login activity logging using **MongoDB**  
- MySQL database with **PDO & prepared statements**  
- AJAX-based frontend (no form submission)  
- Dockerized & deployed on Render  

---

## 🛠 Tech Stack

- **Frontend:** HTML, Bootstrap, jQuery, AJAX  
- **Backend:** PHP 8.2  
- **Databases:** MySQL, MongoDB, Redis  
- **DevOps:** Docker, Composer, Render  

---

## 🗂 Project Structure

```
login-project/
├── backend/
│   ├── api/
│   └── config/
├── frontend/
│   └── public/
│       ├── js/
│       ├── backend.php
│       ├── login.html
│       ├── register.html
│       └── profile.html
├── Dockerfile
├── composer.json
└── README.md
```

---

## 🔄 Application Flow

```
Register → Login → Profile
```

- MySQL → user & profile data  
- Redis → session storage  
- MongoDB → login logs  

---

## 🔐 Security Highlights

- Password hashing using `password_hash()`  
- Prepared SQL statements  
- Redis-based session handling  
- Environment variables for credentials  

---

## 🐳 Deployment

- Fully Dockerized application  
- Deployed on **Render**  
- Composer dependencies installed inside container  
- PHP router file (`backend.php`) used to expose backend APIs securely  

---

## 👤 Author

**Manith Kumar**  
BCA Student | Full-Stack Developer  

---

⭐ This project reflects real-world backend development and production debugging experience.
