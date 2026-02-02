# Author Book Project (Laravel)

This is a Laravel-based web application for managing authors and books.

## Requirements
- PHP (>= 8.0)
- Composer
- Laravel
- MySQL (or any supported database)
- Git
- VS Code (optional)

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/HarshithaaJ/author-book.git


2. Navigate into the project directory:

        cd author-book

3.Install dependencies:

     composer install

4.Create environment file:

     cp .env.example .env


  5.Generate application key:

    php artisan key:generate

6. Configure database in .env file:

       DB_DATABASE=authorbook
       DB_USERNAME=authorbook
       DB_PASSWORD=******

7.Run migrations:

    php artisan migrate

8.Start the development server:

    php artisan serve


9.Open in browser:

http://127.0.0.1:8000
