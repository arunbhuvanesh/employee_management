# employee_management

After clone the project first install composer and npm

composer install
npm install

# laravel breeze compile assets file:
npm run dev

# Generate the application key
php artisan key:generate

# Set up your .env file
Edit the .env file and update the following:
DB_DATABASE, DB_USERNAME, DB_PASSWORD

# Run database migrations
php artisan migrate

# Run seeders:
php artisan db:seed

# Serve the application
php artisan serve

