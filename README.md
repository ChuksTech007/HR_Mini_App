# HR Mini App (Laravel)

## Overview
This is a simple HR management system built with **Laravel**. It allows Admin users to manage employees and generate salary reports by department. The application also includes authentication, role management, and validation.

---

## Features
- User authentication (Laravel Breeze)
- Passwords securely hashed using `Hash::make`
- Role-based access control (Admin / Normal User)
- Employee CRUD (Create, Read, Update, Delete)
- Validation (unique email, numeric salary)
- Report endpoint: total salary per department (JSON)
- Optional search & filter by department or salary range

---

## Installation and Setup

### 1. Clone Repository
```bash
git clone https://github.com/ChuksTech007/HR_Mini_App.git
cd hr-mini-app
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run dev
```

### 3. Environment Configuration
Copy `.env.example` to `.env` and update database credentials.
```bash
cp .env.example .env
php artisan key:generate
```

Update the following in your `.env` file:
```
DB_DATABASE=hr_app
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Run Migrations & Seeders
```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
```

The seeder creates an admin user automatically.

**Default Admin Credentials:**
```
Email: admin@example.com
Password: Admin123!
```

### 5. Run the Server
```bash
php artisan serve
```

Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Database Structure

### users table
| Column | Type | Description |
|--------|------|--------------|
| id | int | Primary key |
| name | varchar(100) | User name |
| email | varchar(100) | Unique email |
| password | varchar(255) | Hashed password |
| role | enum('admin','user') | User role |
| created_at | timestamp | Auto timestamp |
| updated_at | timestamp | Auto timestamp |

### employees table
| Column | Type | Description |
|--------|------|--------------|
| id | int | Primary key |
| name | varchar(100) | Employee name |
| email | varchar(100) | Unique email |
| position | varchar(100) | Job position |
| department | varchar(100) | Department |
| salary | decimal(12,2) | Salary amount |
| created_at | timestamp | Auto timestamp |
| updated_at | timestamp | Auto timestamp |

---

## Available Routes

### Web Routes (Session-based Auth)
| Method | URL | Description | Middleware |
|---------|-----|-------------|-------------|
| GET | /login | Login form | guest |
| POST | /login | Process login | guest |
| GET | /dashboard | Dashboard | auth |
| GET | /employees | List all employees | auth |
| GET | /employees/create | Add new employee form | auth, admin |
| POST | /employees | Create employee | auth, admin |
| GET | /employees/{id}/edit | Edit employee | auth, admin |
| PUT | /employees/{id} | Update employee | auth, admin |
| DELETE | /employees/{id} | Delete employee | auth, admin |
| GET | /reports/salary-by-department | JSON report | auth |

### API Example (optional if added)
| Method | URL | Description |
|---------|-----|-------------|
| POST | /api/login | Login (returns token) |
| GET | /api/employees | List employees |
| GET | /api/reports/salary-by-department | Get salary report |

---

## Report Endpoint Example
**GET /reports/salary-by-department**  
Example JSON Output:
```json
{
  "Engineering": 2500000,
  "Marketing": 1200000
}
```

---

## Validation Rules
| Field | Rules |
|--------|--------|
| name | required, string, max:100 |
| email | required, email, unique:employees,email |
| position | required, string |
| department | required, string |
| salary | required, numeric, min:0 |

---

## Roles & Access
- **Admin:** Can manage all employees (CRUD + Reports)
- **User:** Can only view employees and reports

---

## Notes
- Built using Laravel 12.x and PHP 8.2
- Tailwind CSS via Laravel Breeze UI
- Database: MySQL or MariaDB
- Followed MVC structure with controllers for authentication, employees, and reports

---

## Testing (Optional)
You can test API endpoints using tools like **Postman** or **cURL**.

Example cURL command:
```bash
curl -X GET http://127.0.0.1:8000/reports/salary-by-department  -H "Accept: application/json"
```

---

## Author
Developed by **Prince Charles**  
For CBSoft Technical Test – Backend Developer (Laravel)

---

## License
This project is open-source and free to use for educational or testing purposes.
