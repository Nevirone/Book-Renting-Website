composer install

npm install

copy .env.example and rename it to .env

Change DB_DATABASE to name of your database (change username and password if required)

php artisan key:generate

php artisan migrate

To setup project locally you need few steps:

# Clone this repository
git clone https://github.com/Nevirone/booking-site.git FOLDER_NAME

# Move to cloned repository
cd FOLDER_NAME

# Install dependencies
composer install
npm install

# Copy .env.example file and renamt it to .env

# Change DB_DATABASE to your database name
# Change DB_USERNAME and DB_PASSWORD if required

# Generate application key
php artisan key:generate

# Migrate tables to database
php artisan migrate

All done, good job
