# Revive AdServer Docker Setup

This Docker Compose setup provides a complete Revive AdServer environment with:
- Apache web server with PHP 8.1 (optimized for Revive AdServer compatibility)
- PostgreSQL 15 database server  
- Revive AdServer 5.5.2 pre-configured for easy installation
- All required PHP extensions for ad serving functionality

## Port Mappings
- **Apache/PHP**: http://localhost:8081
- **PostgreSQL**: localhost:5435

## Setup Instructions

### 1. Download Revive AdServer

Before building the containers, you need to download and extract Revive AdServer:

1. **Download Revive AdServer v5.5.2:**
   ```bash
   # Download the latest stable release (5.5.2)
   curl -L -o revive-adserver-5.5.2.tar.gz "https://download.revive-adserver.com/revive-adserver-5.5.2.tar.gz"
   ```
   
   Alternatively, download manually from: https://www.revive-adserver.com/download/

2. **Extract to src folder:**
   ```bash
   # Create src directory if it doesn't exist
   mkdir -p src
   
   # Extract the downloaded archive
   tar -xzf revive-adserver-5.5.2.tar.gz -C src/
   
   # Clean up the archive file
   rm revive-adserver-5.5.2.tar.gz
   ```

3. **Verify the extraction:**
   ```bash
   # You should see the following structure:
   ls -la src/revive-adserver-5.5.2/
   ```

## Quick Start

1. **Build and start the services:**
   ```bash
   docker-compose up -d --build
   ```

2. **Access Revive AdServer installer:**
   Open your browser and go to: http://localhost:8081
   
   You'll be automatically redirected to the Revive AdServer installation wizard.

3. **Complete the installation:**
   - Follow the web-based installer
   - Choose **PostgreSQL** as your database
   - Use the database connection details below

## Database Connection (for Revive AdServer installer)

When configuring the database during installation, use these settings:

- **Database Type**: PostgreSQL
- **Host**: `db`
- **Port**: `5432`
- **Database**: `myapp`
- **Username**: `postgres`
- **Password**: `password`

## Directory Structure

```
revive-adserver/
├── docker-compose.yml          # Main Docker Compose configuration
├── Dockerfile                  # Custom PHP 8.1 image with all required extensions
├── .gitignore                  # Excludes sensitive files and runtime data
├── index.php                   # Entry point (redirects to Revive AdServer)
├── src/                        # Revive AdServer installation
│   └── revive-adserver-5.5.2/  # Complete Revive AdServer package
├── init-scripts/               # PostgreSQL initialization scripts
│   └── init.sql                # Sample database schema
├── apache-config/              # Apache configuration files (optional)
└── README.md                   # This file
```

## PHP Extensions Included

The PHP 8.1 container includes all extensions required by Revive AdServer:

### Required Extensions (✅ Installed)
- **PDO & PostgreSQL**: `pdo`, `pdo_pgsql`, `pgsql`
- **MySQL Support**: `mysqli` (for flexibility)
- **File Handling**: `zip` (for archives and uploads)
- **Core Extensions**: `json`, `xml`, `pcre`, `spl`, `tokenizer` (built-in PHP 8.1)

### PHP Configuration
- **File uploads**: Enabled (10MB limit)
- **Memory limit**: 256MB
- **Execution time**: 300 seconds (for maintenance tasks)
- **Error reporting**: Production-ready settings

## Useful Commands

### Docker Management
- **Start services**: `docker-compose up -d`
- **Stop services**: `docker-compose down`
- **View logs**: `docker-compose logs`
- **Rebuild containers**: `docker-compose up -d --build`

### Database Access
- **Connect to PostgreSQL**: `docker-compose exec db psql -U postgres -d myapp`
- **External connection**: localhost:5435

### Revive AdServer
- **Access admin interface**: http://localhost:8081/src/revive-adserver-5.5.2/www/admin/
- **View delivery scripts**: http://localhost:8081/src/revive-adserver-5.5.2/www/delivery/

## Post-Installation

After completing the Revive AdServer installation:

1. **Remove installer files** (for security):
   The installer files are automatically excluded via `.gitignore`

2. **Configure ad zones and campaigns**:
   Use the admin interface to set up your advertising campaigns

3. **Implement ad delivery**:
   Use the generated ad tags in your websites

## Troubleshooting

### System Requirements Check
If the installer shows missing extensions, rebuild the container:
```bash
docker-compose down
docker-compose up --build
```

### Database Connection Issues
Ensure the database service is running:
```bash
docker-compose logs db
```

### File Permissions
If you encounter permission errors, the installer will guide you through the necessary file permission changes.

## Version Information

- **PHP**: 8.1 (optimized for Revive AdServer compatibility)
- **Apache**: Latest with mod_rewrite enabled
- **PostgreSQL**: 15
- **Revive AdServer**: 5.5.2

## Security Notes

- Database credentials are for development only
- Production deployments should use secure passwords
- The `.gitignore` file prevents committing sensitive configuration files
- Remove installer files after setup completion 