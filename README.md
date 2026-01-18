# Virtual Mining Machine (VMM)

Virtual Mining Machine (VMM) is a Laravel-based web application that simulates a virtual cryptocurrency mining system.  
The platform allows users to register, manage virtual mining machines, monitor mining performance, and track earnings through a secure and user-friendly dashboard. Administrators can fully control users, machines, configurations, and system settings from the backend.

---

## 📌 Project Overview

The Virtual Mining Machine (VMM) system is designed to demonstrate how a virtual mining ecosystem can be managed digitally.  
It focuses on performance tracking, earning calculations, and centralized system control using Laravel.

---

## 🚀 Features

### 👤 User Features
- User Registration & Login
- Secure Authentication
- User Dashboard
- View Assigned Virtual Mining Machines
- Mining Status Monitoring
- Earnings Calculation
- Earnings History
- Profile Management
- Password Change

### 🛠️ Admin Features
- Admin Login & Dashboard
- User Management (View, Activate, Deactivate)
- Virtual Mining Machine Management
- Mining Power / Rate Configuration
- Earnings Management & Reports
- System Settings Control

---

## 🧑‍💻 Technology Stack

- **Framework:** Laravel
- **Programming Language:** PHP
- **Frontend:** Blade Template, Bootstrap
- **Database:** MySQL
- **Authentication:** Laravel Authentication
- **Security:** CSRF Protection, Form Validation
- **Server:** Apache / Nginx

---

## 📦 Installation & Setup

Follow the steps below to run the project locally.

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-username/virtual-mining-machine-vmm.git
cd virtual-mining-machine-vmm

2️⃣ Install Composer Dependencies
composer install

3️⃣ Environment Configuration
cp .env.example .env
php artisan key:generate

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vmm_database
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Run Database Migrations
php artisan migrate

5️⃣ Run the Application
php artisan serve

Now open your browser and visit:
http://127.0.0.1:8000

🗂️ Project Structure
app/
 ├── Http/
 │   ├── Controllers/
 │   ├── Middleware/
 ├── Models/
 ├── Services/
resources/
 ├── views/
 ├── css/
 ├── js/
routes/
 ├── web.php
database/
 ├── migrations/
 ├── seeders/
public/
 ├── assets/



