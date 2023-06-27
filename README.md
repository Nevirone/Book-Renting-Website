# Book Renting Site

This application was created as part of a project for the course "Web Applications".

## Installation

To install and run the app locally, follow these steps:

1. Clone the repository:
   git clone https://github.com/Nevirone/books-site.git
2. Install application dependencies:
  compose install
  npm install
3. Update enviroment variables
  Rename .env.example to .env
  Change DB_DATABASE to your database name
  Change DB_USERNAME and DB_PASSWORD to your database credentails
4. Generate application key
  php artisan key:generate
5. Migrate to database
  php artisan migrate