# FiraHotel - Deployment Guide

## 🚀 Production Deployment Checklist

### Pre-Deployment

#### 1. Environment Configuration
```bash
# Copy and configure production environment
cp .env.example .env.production
```

Update `.env.production`:
```env
APP_NAME=FiraHotel
APP_ENV=production
APP_DEBUG=false
APP_URL=https://firahotel.com

# Database
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=firahotel_prod
DB_USERNAME=prod_user
DB_PASSWORD=secure_password

# Cache & Session
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Redis
REDIS_HOST=your-redis-host
REDIS_PASSWORD=redis_password
REDIS_PORT=6379

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS="noreply@firahotel.com"
MAIL_FROM_NAME="FiraHotel"
```

#### 2. Security Hardening
```bash
# Generate secure app key
php artisan key:generate --force

# Set proper permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Clear sensitive data
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

#### 3. Optimize for Production
```bash
# Install production dependencies only
composer install --optimize-autoloader --no-dev

# Build optimized assets
npm run build

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize
```

---

## 🌐 Deployment Options

### Option 1: Shared Hosting (cPanel)

#### Requirements
- PHP 8.2+
- MySQL 5.7+
- Composer
- Node.js (for building assets)

#### Steps
1. **Upload Files**
   - Upload all files except `node_modules` and `vendor`
   - Point domain to `public` directory

2. **Install Dependencies**
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

3. **Configure Database**
   - Create MySQL database via cPanel
   - Update `.env` with credentials

4. **Run Migrations**
   ```bash
   php artisan migrate --force
   php artisan db:seed --class=FiraHotelSeeder
   ```

5. **Set Permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

---

### Option 2: VPS (Ubuntu/Nginx)

#### Server Requirements
- Ubuntu 22.04 LTS
- Nginx
- PHP 8.2-FPM
- MySQL 8.0
- Redis
- Supervisor (for queues)

#### Installation Script
```bash
#!/bin/bash

# Update system
sudo apt update && sudo apt upgrade -y

# Install Nginx
sudo apt install nginx -y

# Install PHP 8.2
sudo apt install software-properties-common -y
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-curl php8.2-zip php8.2-redis -y

# Install MySQL
sudo apt install mysql-server -y
sudo mysql_secure_installation

# Install Redis
sudo apt install redis-server -y
sudo systemctl enable redis-server

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install nodejs -y

# Install Supervisor
sudo apt install supervisor -y
```

#### Nginx Configuration
Create `/etc/nginx/sites-available/firahotel`:
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name firahotel.com www.firahotel.com;
    root /var/www/firahotel/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Enable site:
```bash
sudo ln -s /etc/nginx/sites-available/firahotel /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

#### SSL Certificate (Let's Encrypt)
```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d firahotel.com -d www.firahotel.com
```

#### Deploy Application
```bash
# Clone repository
cd /var/www
sudo git clone https://github.com/your-repo/firahotel.git
cd firahotel

# Install dependencies
composer install --optimize-autoloader --no-dev
npm install
npm run build

# Set permissions
sudo chown -R www-data:www-data /var/www/firahotel
sudo chmod -R 755 storage bootstrap/cache

# Configure environment
cp .env.example .env
php artisan key:generate
nano .env  # Edit database credentials

# Run migrations
php artisan migrate --force
php artisan db:seed --class=FiraHotelSeeder

# Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### Queue Worker (Supervisor)
Create `/etc/supervisor/conf.d/firahotel-worker.conf`:
```ini
[program:firahotel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/firahotel/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/firahotel/storage/logs/worker.log
stopwaitsecs=3600
```

Start worker:
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start firahotel-worker:*
```

---

### Option 3: Docker Deployment

#### Dockerfile
```dockerfile
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

# Set working directory
WORKDIR /var/www

# Copy application
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-dev
RUN npm install && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
```

#### docker-compose.yml
```yaml
version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: firahotel-app
    restart: unless-stopped
    working_dir: /var/www
    volumes:
      - ./:/var/www
    networks:
      - firahotel

  nginx:
    image: nginx:alpine
    container_name: firahotel-nginx
    restart: unless-stopped
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - ./:/var/www
      - ./docker/nginx:/etc/nginx/conf.d
    networks:
      - firahotel

  mysql:
    image: mysql:8.0
    container_name: firahotel-mysql
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: firahotel
      MYSQL_ROOT_PASSWORD: secret
      MYSQL_USER: firahotel
      MYSQL_PASSWORD: secret
    volumes:
      - mysql-data:/var/lib/mysql
    networks:
      - firahotel

  redis:
    image: redis:alpine
    container_name: firahotel-redis
    restart: unless-stopped
    networks:
      - firahotel

networks:
  firahotel:
    driver: bridge

volumes:
  mysql-data:
```

Deploy:
```bash
docker-compose up -d
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed --class=FiraHotelSeeder
```

---

## 📊 Post-Deployment

### 1. Monitoring Setup

#### Laravel Telescope (Development)
```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```

#### Error Tracking (Sentry)
```bash
composer require sentry/sentry-laravel
php artisan sentry:publish --dsn=your-dsn
```

### 2. Backup Strategy

#### Database Backup Script
```bash
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups/firahotel"
DB_NAME="firahotel"

mkdir -p $BACKUP_DIR
mysqldump -u root -p$DB_PASSWORD $DB_NAME | gzip > $BACKUP_DIR/db_$DATE.sql.gz

# Keep only last 7 days
find $BACKUP_DIR -name "db_*.sql.gz" -mtime +7 -delete
```

Add to crontab:
```bash
0 2 * * * /path/to/backup.sh
```

### 3. Performance Monitoring

#### Enable OPcache
Edit `/etc/php/8.2/fpm/php.ini`:
```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.interned_strings_buffer=16
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
```

#### Redis Configuration
Edit `/etc/redis/redis.conf`:
```conf
maxmemory 256mb
maxmemory-policy allkeys-lru
```

---

## 🔒 Security Checklist

- [ ] SSL certificate installed
- [ ] `.env` file secured (not in git)
- [ ] Database credentials strong
- [ ] APP_DEBUG=false in production
- [ ] File permissions correct (755/644)
- [ ] Firewall configured (UFW)
- [ ] Regular security updates
- [ ] Backup system in place
- [ ] Rate limiting enabled
- [ ] CSRF protection active

---

## 🚨 Troubleshooting

### 500 Internal Server Error
```bash
# Check logs
tail -f storage/logs/laravel.log
tail -f /var/log/nginx/error.log

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Permission Issues
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 755 storage bootstrap/cache
```

### Database Connection Failed
```bash
# Test connection
php artisan tinker
>>> DB::connection()->getPdo();
```

---

## 📈 Scaling Considerations

### Horizontal Scaling
- Load balancer (Nginx/HAProxy)
- Multiple app servers
- Centralized session storage (Redis)
- CDN for static assets

### Database Optimization
- Read replicas
- Query optimization
- Indexing strategy
- Connection pooling

### Caching Strategy
- Redis for sessions/cache
- OPcache for PHP
- Browser caching
- CDN caching

---

**Deployment Date:** _____________
**Deployed By:** _____________
**Version:** 1.0.0
