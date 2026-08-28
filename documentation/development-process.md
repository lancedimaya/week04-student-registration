# Development Process — Student Registration System

This document outlines the software development process followed while building the **Student Registration System** using Laravel.

---

## 1. Requirements Analysis

The College of Information Technology needed to transition from paper-based student registration to a digital system. The functional requirements were:

- Register a student
- Upload a profile picture
- Validate required fields
- Display success and error notifications
- Store student information in the database
- View the registered student details after successful registration

## 2. Database Design

A `students` table was designed to store all student information. The migration was created using Laravel Migrations, with unique constraints on `student_id` and `email`, and a nullable `middle_name`.

## 3. Backend Development

### Controllers

`StudentController` was created with four methods:

- `index()` — Displays a list of all registered students
- `create()` — Shows the registration form
- `store()` — Validates and stores a new student, including the profile picture upload
- `show()` — Displays a single student's details

### Validation

Server-side validation was implemented inside the `store()` method using Laravel's validation rules:

```php
$request->validate([
    'student_id' => 'required|string|max:50|unique:students,student_id',
    'first_name' => 'required|string|max:100',
    'middle_name' => 'nullable|string|max:100',
    'last_name' => 'required|string|max:100',
    'email' => 'required|email|max:255|unique:students,email',
    'mobile_number' => 'required|numeric',
    'date_of_birth' => 'required|date|before:today',
    'gender' => 'required|in:Male,Female,Other',
    'program' => 'required|string|max:150',
    'year_level' => 'required|string|max:50',
    'address' => 'required|string|max:500',
    'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
]);
```

### File Upload

The profile picture is uploaded using Laravel Storage:

```php
$path = $request->file('profile_picture')->store('profile_pictures', 'public');
```

The file is stored in `storage/app/public`, and only the generated path is saved to the database. The storage symlink is created with `php artisan storage:link`.

### Flash Messages

A success message is flashed to the session and displayed after registration:

```php
return redirect()
    ->route('students.show', $student->id)
    ->with('success', 'Student registered successfully!');
```

## 4. Frontend Development

Blade templates were used to build the user interface:

- `layouts/app.blade.php` — Main layout with navigation and flash message display
- `students/create.blade.php` — Registration form with grouped fields and validation errors
- `students/index.blade.php` — List of all registered students
- `students/show.blade.php` — Student profile page with photo and details

Tailwind CSS was used for responsive, professional styling.

## 5. Routing

Routes were defined in `routes/web.php`:

| Method | URI                  | Action                       |
| ------ | -------------------- | ---------------------------- |
| GET    | `/`                  | Redirect to students list    |
| GET    | `/students`          | `StudentController@index`    |
| GET    | `/register`          | `StudentController@create`   |
| POST   | `/students`          | `StudentController@store`    |
| GET    | `/students/{student}` | `StudentController@show`     |

## 6. Testing

Feature tests were written using PHPUnit to verify:

- Page loads (form and index)
- Validation errors on invalid input
- Successful registration with file upload
- Duplicate rejection
- Student details display

## 7. Version Control

Git was used for version control with meaningful commit messages (e.g., `feat:`, `fix:`, `docs:`, `test:`, `refactor:` prefixes) following the Conventional Commits convention.

## 8. Documentation

This README and development documentation were written in Markdown to document the project setup, schema, routes, and testing.
