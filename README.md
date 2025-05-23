# 📝 Laravel Blog Web App

This project is a **Blog Web Application** built as part of the [**Laravel For Absolute Beginners**](https://www.udemy.com/course/laravel-for-absolute-beginners/) course on Udemy by **Mahmoud Anwar**. The project covers fundamental Laravel concepts including routing, models, migrations, seeding, Blade templates, and basic CRUD operations.

---

## 📜 About the Course

-   **Course Title:** Laravel For Absolute Beginners
-   **Instructor:** Mahmoud Anwar
-   **Platform:** [Udemy](https://www.udemy.com/course/laravel-for-absolute-beginners/)
-   **Certificate:** ✅ Successfully completed

This course helped me gain hands-on experience in Laravel by building this project from scratch.

---

## 🚀 Installation Instructions

1. Clone the Repository

```
git clone https://github.com/SeifeldenAtia/Postify.git
cd YOUR-REPO-NAME
```

2. Environment Setup
   copy your `.env.example` file as `.env` and configure your Database connection:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

3. Install Dependencies

```
composer install
npm install
npm run build
```

4. Generate Application Key
   You have to generate new application key as below.

```
php artisan key:generate
```

5. Run Migrations and Seeders
   You have to run all the migration files included with the project and also run seeders as below.

```
php artisan migrate
php artisan db:seed
```
