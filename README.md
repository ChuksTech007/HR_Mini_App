# HR Mini-App (Laravel)

This is a Laravel-based HR mini-application to manage employees.

## Features implemented

- Authentication using Laravel's built-in scaffolding (hashed passwords).
- Role management: `role` column on users (`admin` / `normal`) and `AdminMiddleware` to protect admin routes.
- Employee CRUD (Add, Edit, Delete, List) via `EmployeeController` (JSON REST endpoints).
- Validation via `StoreEmployeeRequest` (email unique, salary numeric, etc.).
- Report API endpoint that returns **total salary per department** in JSON:
  - `GET /api/reports/salary-by-department`
- Bonus features:
  - Search / filter on employee listing: by `department`, `min_salary`, `max_salary`, `q` (name or position).
  - Role management present (`role` field + middleware).

## Important files / routes

- Migrations: `database/migrations/*` (creates `users`, `employees`, adds `role`).
- Employee model: `app/Models/Employee.php`
- Employee controller: `app/Http/Controllers/EmployeeController.php` (REST)
- Report controller: `app/Http/Controllers/ReportController.php`
- API route for report: `routes/api.php` -> `/api/reports/salary-by-department`
- Web routes: `routes/web.php` registers resource routes for `employees` under `auth` + `admin` middleware.

## How to run (local)

1. Requirements:
   - PHP 8.2+
   - Composer
   - MySQL / MariaDB (or other DB supported by Laravel)
   - Node.js & npm (for frontend scaffolding if needed)

2. Steps:
   ```bash
   # unzip / place project folder, then:
   cd "HR Mini-App"
   composer install
   cp .env.example .env
   # set DB credentials in .env
   php artisan key:generate
   php artisan migrate
   # optionally seed users or create an admin user
   ```

3. Authentication:
   - The project includes Laravel auth scaffolding. Create a user and set `role` to `admin` in the DB to access `/employees` resource routes.

## API examples

- List employees (with filters):
  ```
  GET /employees?department=Engineering&min_salary=50000&max_salary=200000&q=John
  ```

- Create employee:
  ```
  POST /employees
  {
    "name":"John Doe",
    "email":"john@example.com",
    "position":"Engineer",
    "salary":50000,
    "department":"Engineering"
  }
  ```

- Report:
  ```
  GET /api/reports/salary-by-department
  Response:
  {
    "Engineering": 250000.00,
    "Marketing": 120000.00
  }
  ```

## Assumptions & Notes

- Auth uses Laravel hashing (bcrypt/argon) — stored hashed in `users.password`.
- The `employees.salary` column is DECIMAL(10,2).
- Update endpoint performs a uniqueness check for `email` to allow updating other fields without changing email.
- The project was partially implemented; I completed the Employee model and controller CRUD + filtering, and added README.
- If you'd like, I can:
  - Add API authentication via Sanctum for API endpoints.
  - Provide seeders to create an admin user.
  - Add front-end views or API tests.

