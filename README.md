# PHP 8.4 + Apache + PostgreSQL Docker Setup

This Docker Compose setup provides:
- Apache web server with PHP 8.4
- PostgreSQL 15 database server
- Pre-configured networking between services

## Port Mappings
- **Apache/PHP**: http://localhost:8081
- **PostgreSQL**: localhost:5435

## Quick Start

1. **Build and start the services:**
   ```bash
   docker-compose up -d --build
   ```

2. **Access the web application:**
   Open your browser and go to: http://localhost:8081

3. **Connect to PostgreSQL:**
   - Host: localhost
   - Port: 5435
   - Database: myapp
   - Username: postgres
   - Password: password

## Directory Structure

```
phpWorkspace/
├── docker-compose.yml          # Main Docker Compose configuration
├── Dockerfile                  # Custom PHP image with PostgreSQL support
├── src/                        # PHP application files
│   └── index.php              # Sample PHP file with PostgreSQL test
├── init-scripts/              # PostgreSQL initialization scripts
│   └── init.sql               # Sample database schema and data
└── apache-config/             # Apache configuration files (optional)
```

## Database Details

- **Database Name**: myapp
- **Username**: postgres
- **Password**: password
- **Internal Network**: Services communicate via Docker network
- **External Access**: Available on port 5435

## Useful Commands

- **Start services**: `docker-compose up -d`
- **Stop services**: `docker-compose down`
- **View logs**: `docker-compose logs`
- **Rebuild**: `docker-compose up -d --build`
- **Access database**: `docker-compose exec db psql -U postgres -d myapp`

## PHP Features

The PHP container includes:
- PHP 8.4 with Apache
- PostgreSQL PDO extension
- Apache mod_rewrite enabled

## Sample Database

The setup includes a sample `users` table with test data. You can modify the `init-scripts/init.sql` file to customize the initial database structure. 