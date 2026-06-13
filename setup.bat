@echo off
echo ========================================
echo FiraHotel Setup Script
echo ========================================
echo.

echo [1/6] Installing Composer dependencies...
call composer install
if %errorlevel% neq 0 (
    echo ERROR: Composer install failed
    pause
    exit /b 1
)
echo.

echo [2/6] Installing NPM dependencies...
call npm install
if %errorlevel% neq 0 (
    echo ERROR: NPM install failed
    pause
    exit /b 1
)
echo.

echo [3/6] Setting up environment file...
if not exist .env (
    copy .env.example .env
    echo .env file created
) else (
    echo .env file already exists
)
echo.

echo [4/6] Generating application key...
php artisan key:generate
echo.

echo [5/6] Running database migrations...
php artisan migrate
if %errorlevel% neq 0 (
    echo WARNING: Migration failed. Please check your database configuration in .env
    echo.
)
echo.

echo [6/6] Seeding sample data...
php artisan db:seed --class=FiraHotelSeeder
if %errorlevel% neq 0 (
    echo WARNING: Seeding failed. You can run it manually later with: php artisan db:seed --class=FiraHotelSeeder
    echo.
)
echo.

echo ========================================
echo Setup Complete!
echo ========================================
echo.
echo Next steps:
echo 1. Update your .env file with database credentials
echo 2. Run: npm run build
echo 3. Run: php artisan serve
echo 4. Visit: http://localhost:8000
echo.
echo For development with hot reload:
echo   npm run dev (in one terminal)
echo   php artisan serve (in another terminal)
echo.
pause
