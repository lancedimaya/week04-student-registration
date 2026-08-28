# 🎓 Student Registration System (Laravel)

A full-featured **Student Registration System** built with **Laravel 12**. This project was developed as part of the College of Information Technology's transition from paper-based student registration to a digital registration system.

As a Junior Laravel Developer, the goal was to build a registration module that allows students to register online while ensuring that submitted information is valid, secure, and stored correctly.

---

## ✨ Features

- ✅ **Registration Form** — Responsive, grouped, and polished HTML form built with Blade templates
- ✅ **Server-Side Validation** — Laravel validation rules for every required field
- ✅ **Unique Constraints** — Student ID and Email Address are validated as unique
- ✅ **Profile Picture Upload** — Securely stores images in `storage/app/public` and saves only the file path in the database
- ✅ **Flash Messages** — Displays a success notification after registration
- ✅ **Validation Errors** — Displays field-level error messages on failed submission
- ✅ **Student Profile View** — Shows the registered student's details and uploaded photo
- ✅ **Student List** — View all registered students
- ✅ **MySQL / SQLite Support** — Database-agnostic migration
- ✅ **Automated Tests** — Feature tests for validation, file upload, and display

---

## 🛠 Tech Stack

| Technology    | Purpose                         |
| ------------- | ------------------------------- |
| PHP 8.3       | Server-side scripting language  |
| Laravel 12    | Web application framework       |
| Blade         | Templating engine               |
| MySQL / SQLite | Relational database            |
| Tailwind CSS  | Utility-first CSS framework     |
| PHPUnit       | Testing framework               |

---

## 📁 Project Structure

```
week04-student-registration/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── StudentController.php
│   └── Models/
│       └── Student.php
├── database/
│   └── migrations/
│       └── 2026_08_28_000000_create_students_table.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── students/
│           ├── create.blade.php
│           ├── index.blade.php
│           └── show.blade.php
├── routes/
│   └── web.php
├── storage/
│   └── app/
│       └── public/
│           └── profile_pictures/
├── tests/
│   └── Feature/
│       └── StudentRegistrationTest.php
├── screenshots/
├── documentation/
└── README.md
```

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.2 or higher
- Composer
- MySQL 8+ (optional — SQLite works out of the box)

### Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/<your-username>/week04-student-registration.git
   cd week04-student-registration
   ```

2. **Install dependencies**

   ```bash
   composer install
   ```

3. **Set up the environment file**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**

   - **Option A — SQLite (default, no setup required):**
     ```bash
     touch database/database.sqlite
     php artisan migrate
     ```

   - **Option B — MySQL:**
     Edit `.env` and update the following:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=student_registration
     DB_USERNAME=root
     DB_PASSWORD=your_password
     ```
     Then run:
     ```bash
     php artisan migrate
     ```

5. **Create the storage link (for profile pictures)**

   ```bash
   php artisan storage:link
   ```

6. **Run the development server**

   ```bash
   php artisan serve
   ```

   The app will be available at `http://127.0.0.1:8000`.

---

## 🧭 Routes

| Method | URI                  | Name               | Action                     | Description                      |
| ------ | -------------------- | ------------------ | -------------------------- | -------------------------------- |
| GET    | `/`                  | —                  | —                          | Redirect to students list        |
| GET    | `/students`          | `students.index`   | `StudentController@index`  | List all registered students     |
| GET    | `/register`          | `students.create`  | `StudentController@create` | Show registration form           |
| POST   | `/students`          | `students.store`   | `StudentController@store`  | Save registration (with upload)  |
| GET    | `/students/{student}` | `students.show`    | `StudentController@show`   | Show student details             |

---

## 🗄 Database Schema

**`students`** table:

| Column           | Type        | Constraints       |
| ---------------- | ----------- | ----------------- |
| id               | bigint      | primary key       |
| student_id       | varchar     | unique, required  |
| first_name       | varchar     | required          |
| middle_name      | varchar     | nullable          |
| last_name        | varchar     | required          |
| email            | varchar     | unique, required  |
| mobile_number    | varchar     | required          |
| date_of_birth    | date        | required          |
| gender           | varchar     | required          |
| program          | varchar     | required          |
| year_level       | varchar     | required          |
| address          | text        | required          |
| profile_picture  | varchar     | required          |
| created_at       | timestamp   | —                 |
| updated_at       | timestamp   | —                 |

---

## 🧪 Testing

Run the feature test suite:

```bash
php artisan test
```

Or run the student registration tests directly:

```bash
php artisan test --filter=StudentRegistrationTest
```

The tests cover:

- The registration form page loads
- The students index page loads
- Validation fails when required fields are missing
- Validation fails when a non-image file is uploaded
- A student registers successfully with a profile picture
- Duplicate student IDs and emails are rejected
- The show page displays the registered student details

---

## 📸 Screenshots


| Screenshot              | Description                                |
| ----------------------- | ------------------------------------------ |
| `registration-form.png` | The student registration form              |
| `validation-errors.png` | Form showing validation error messages     |
| `success-message.png`   | Success notification after registration    |
| `student-profile.png`   | Registered student profile page            |
| `students-list.png`     | List of registered students                |

---

## 📚 Documentation

Additional documentation can be found in the [`documentation/`](documentation/) folder.

---

## 🔒 Security Notes

- **Validation** — All input is validated server-side before being stored.
- **File Upload** — Profile pictures are restricted to JPG, JPEG, and PNG with a max size of 2MB.
- **Mass Assignment** — The `Student` model uses an explicit `$fillable` list.
- **CSRF Protection** — Forms include Laravel's `@csrf` token.

---

## 📄 License

This project is for educational purposes as part of the **College of Information Technology** curriculum.
