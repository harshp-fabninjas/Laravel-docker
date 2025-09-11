# Laravel 12 Docker Setup with Hot Reloading

A complete Laravel 12 development environment with Docker that supports hot reloading for Blade templates and other changes.

## 🚀 Features

- **Laravel 12** - Latest Laravel framework
- **PHP 8.2** - With all necessary extensions
- **MySQL 8.0** - Database server
- **Redis** - For caching and sessions
- **Nginx** - Web server with optimized configuration
- **phpMyAdmin** - Database management interface
- **Hot Reloading** - Blade template changes reflect instantly
- **Volume Mounting** - All changes persist and sync in real-time

## 📋 Prerequisites

- Docker Desktop installed and running
- Docker Compose v3.8+
- Git (for cloning)

## 🛠️ Quick Start

1. **Clone or download this project**
   ```bash
   git clone <your-repo-url>
   cd Laravel-docker
   ```

2. **Start the Docker services**
   ```bash
   docker-compose up -d
   ```

3. **Install Composer dependencies**
   ```bash
   docker-compose exec app composer install
   ```

4. **Generate application key**
   ```bash
   docker-compose exec app php artisan key:generate
   ```

5. **Run database migrations**
   ```bash
   docker-compose exec app php artisan migrate
   ```

6. **Access your application**
   - **Laravel App**: http://localhost:8080
   - **phpMyAdmin**: http://localhost:8081
   - **Demo Page**: http://localhost:8080/demo

## 🔥 Hot Reloading

This setup supports hot reloading for:
- ✅ Blade templates (`.blade.php` files)
- ✅ PHP files
- ✅ CSS/JS files
- ✅ Configuration files

**How it works:**
- All project files are mounted as volumes in the Docker container
- Changes to files are immediately reflected without rebuilding containers
- Nginx is configured with appropriate timeouts for development
- PHP-FPM processes files in real-time

## 🐳 Docker Services

| Service | Container Name | Port | Description |
|---------|---------------|------|-------------|
| **app** | laravel_app | 9000 | PHP-FPM with Laravel |
| **webserver** | laravel_webserver | 8080 | Nginx web server |
| **db** | laravel_db | 3306 | MySQL 8.0 database |
| **redis** | laravel_redis | 6379 | Redis cache/session store |
| **phpmyadmin** | laravel_phpmyadmin | 8081 | Database management |

## 📁 Project Structure

```
Laravel-docker/
├── app/                    # Laravel application code
├── bootstrap/              # Laravel bootstrap files
├── config/                 # Laravel configuration
├── database/               # Migrations, seeders, factories
├── docker/                 # Docker configuration files
│   ├── nginx/
│   │   └── conf.d/
│   │       └── app.conf    # Nginx configuration
│   └── php/
│       └── local.ini       # PHP configuration
├── public/                 # Web root
├── resources/
│   ├── views/              # Blade templates
│   │   ├── welcome.blade.php
│   │   └── demo.blade.php  # Hot reloading demo
│   ├── css/                # CSS files
│   └── js/                 # JavaScript files
├── routes/                 # Route definitions
├── storage/                # Laravel storage
├── tests/                  # Test files
├── docker-compose.yml      # Docker Compose configuration
├── Dockerfile             # PHP-FPM container definition
└── README.md              # This file
```

## 🛠️ Development Commands

### Docker Commands
```bash
# Start all services
docker-compose up -d

# Stop all services
docker-compose down

# View logs
docker-compose logs -f

# Restart a specific service
docker-compose restart app

# Execute commands in the app container
docker-compose exec app php artisan [command]
```

### Laravel Commands
```bash
# Run migrations
docker-compose exec app php artisan migrate

# Create a new migration
docker-compose exec app php artisan make:migration create_example_table

# Run seeders
docker-compose exec app php artisan db:seed

# Clear caches
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear

# Generate application key
docker-compose exec app php artisan key:generate

# Create a new controller
docker-compose exec app php artisan make:controller ExampleController

# Create a new model
docker-compose exec app php artisan make:model Example
```

### Composer Commands
```bash
# Install dependencies
docker-compose exec app composer install

# Add a new package
docker-compose exec app composer require package/name

# Update dependencies
docker-compose exec app composer update

# Show installed packages
docker-compose exec app composer show
```

## 🔧 Configuration

### Environment Variables
The `.env` file is configured for Docker:
```env
APP_URL=http://localhost:8080
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
REDIS_HOST=redis
```

### Database Access
- **Host**: localhost
- **Port**: 3306
- **Database**: laravel
- **Username**: laravel
- **Password**: laravel
- **Root Password**: root

### phpMyAdmin Access
- **URL**: http://localhost:8081
- **Username**: root
- **Password**: root

## 🧪 Testing Hot Reloading

1. **Start the services**:
   ```bash
   docker-compose up -d
   ```

2. **Open the demo page**: http://localhost:8080/demo

3. **Edit a Blade template**:
   - Open `resources/views/demo.blade.php`
   - Make any change (e.g., change text, colors, add content)
   - Save the file

4. **Refresh the browser** - changes should appear instantly!

5. **Try editing other files**:
   - `resources/views/welcome.blade.php`
   - `routes/web.php`
   - Any PHP file in the `app/` directory

## 🐛 Troubleshooting

### Common Issues

**Port already in use:**
```bash
# Check what's using the port
lsof -i :8080
# Kill the process or change the port in docker-compose.yml
```

**Permission issues:**
```bash
# Fix storage permissions
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

**Database connection issues:**
```bash
# Check if MySQL is running
docker-compose exec db mysql -u root -p
# Enter password: root
```

**Cache issues:**
```bash
# Clear all caches
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear
docker-compose exec app php artisan route:clear
```

### Viewing Logs
```bash
# View all logs
docker-compose logs

# View specific service logs
docker-compose logs app
docker-compose logs webserver
docker-compose logs db

# Follow logs in real-time
docker-compose logs -f app
```

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Docker Documentation](https://docs.docker.com/)
- [Docker Compose Documentation](https://docs.docker.com/compose/)
- [Nginx Documentation](https://nginx.org/en/docs/)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test the hot reloading functionality
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

**Happy coding! 🚀**

*This setup provides a complete Laravel development environment with Docker and hot reloading capabilities. Any changes to Blade templates or PHP files will be reflected immediately without rebuilding containers.*