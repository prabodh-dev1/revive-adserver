# Apache Configuration Directory

This directory is for optional Apache configuration files that will be mounted into the Docker container.

## Purpose

Custom Apache configuration files placed in this directory will be:
- Mounted into the Apache container at `/etc/apache2/conf-available/`
- Automatically enabled during container startup
- Used to override or extend the default Apache configuration

## Usage

### Adding Custom Configuration

1. Create `.conf` files in this directory:
   ```bash
   # Example: Create a custom virtual host
   touch apache-config/custom-vhost.conf
   
   # Example: Add custom security headers
   touch apache-config/security-headers.conf
   ```

2. The Docker container will automatically:
   - Copy these files to `/etc/apache2/conf-available/`
   - Enable them with `a2enconf`
   - Reload Apache configuration

### Common Use Cases

- **Custom Virtual Hosts**: Additional sites or subdomains
- **Security Headers**: CORS, CSP, HSTS configurations
- **URL Rewriting**: Custom mod_rewrite rules
- **Performance Tuning**: Caching, compression settings
- **SSL/TLS Configuration**: Custom certificate handling

### Example Configuration Files

#### Security Headers (`security-headers.conf`)
```apache
Header always set X-Frame-Options DENY
Header always set X-Content-Type-Options nosniff
Header always set X-XSS-Protection "1; mode=block"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

#### Custom Rewrite Rules (`custom-rewrites.conf`)
```apache
<Directory "/var/www/html">
    RewriteEngine On
    # Add your custom rewrite rules here
</Directory>
```

## Docker Integration

The `docker-compose.yml` file includes a volume mount:
```yaml
volumes:
  - ./apache-config:/etc/apache2/conf-available/custom/
```

This allows you to modify Apache configuration without rebuilding the container.

## Notes

- Configuration files should use the `.conf` extension
- Invalid configuration will prevent Apache from starting
- Test configurations before deploying to production
- See the main [README.md](../README.md) for complete setup instructions 