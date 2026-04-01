# Codebase Index - Lab-PHPNative

**Project Type:** Laravel + NativePHP Desktop Application  
**Primary Purpose:** Book search and browsing application using Open Library API  
**Last Indexed:** 2026-04-01

---

## 📁 Directory Structure Overview

```
Lab-PHPNative/
├── app/                           # Main Laravel application
├── nativephp/                     # NativePHP native application files
│   └── android/                   # Android app configuration
├── public/                        # Public-facing files
├── resources/                     # Front-end resources
├── storage/                       # Application storage
├── tests/                         # Test files
└── vendor/                        # Composer dependencies
```

---

## 🎯 Core Application Files

### Laravel Configuration
| File | Purpose |
|------|---------|
| [app/config/app.php](app/config/app.php) | Main application configuration |
| [app/config/auth.php](app/config/auth.php) | Authentication providers and settings |
| [app/config/cache.php](app/config/cache.php) | Cache driver configuration |
| [app/config/database.php](app/config/database.php) | Database connection settings |
| [app/config/mail.php](app/config/mail.php) | Mail service configuration |
| [app/config/nativephp.php](app/config/nativephp.php) | NativePHP desktop app config |
| [app/config/session.php](app/config/session.php) | Session driver configuration |

### Bootstrap Files
| File | Purpose |
|------|---------|
| [app/bootstrap/app.php](app/bootstrap/app.php) | Application bootstrapping |
| [app/bootstrap/providers.php](app/bootstrap/providers.php) | Service provider registration |

### Routing
| File | Purpose |
|------|---------|
| [app/routes/web.php](app/routes/web.php) | Web routes definition |
| [app/routes/console.php](app/routes/console.php) | Console command routes |

---

## 🏗️ Application Architecture

### Controllers
Located in: `app/app/Http/Controllers/`

| Controller | Methods | Purpose |
|-----------|---------|---------|
| **ApiController.php** | `index()` | Handles book search/listing; uses ApiService to fetch data |
| **BookController.php** | `index()` | Legacy controller for book display (direct API calls) |
| **Controller.php** | - | Base controller class for all controllers |

### Models
Located in: `app/app/Models/`

| Model | Purpose |
|-------|---------|
| **User.php** | User authentication model with Factory support |

### Services
Located in: `app/app/Services/`

| Service | Methods | Purpose |
|---------|---------|---------|
| **ApiService.php** | `getBooks()` | Fetches bestseller books from Open Library API |
| | `searchBooks(string $query)` | Searches for books by query |
| | `formatBooks(array $rawBooks)` | Formats raw API responses |

### Providers
Located in: `app/app/Providers/`

| Provider | Purpose |
|----------|---------|
| **AppServiceProvider.php** | Custom application services registration |

---

## 🗄️ Database

### Migrations
Located in: `app/database/migrations/`

| Migration | Purpose |
|-----------|---------|
| **0001_01_01_000000_create_users_table.php** | Creates users table for authentication |
| **0001_01_01_000001_create_cache_table.php** | Creates cache table for caching |
| **0001_01_01_000002_create_jobs_table.php** | Creates jobs table for queue |

### Factories
Located in: `app/database/factories/`

| Factory | Purpose |
|---------|---------|
| **UserFactory.php** | Creates test/seed User model instances |

### Seeders
Located in: `app/database/seeders/`

| Seeder | Purpose |
|--------|---------|
| **DatabaseSeeder.php** | Main database seeding orchestrator |

---

## 🎨 Front-End Resources

### Views
Located in: `app/resources/views/`

| View | Purpose |
|------|---------|
| **books.blade.php** | Main book listing/search display |
| **welcome.blade.php** | Welcome page |
| **layouts/** | Layout templates directory |
| **components/** | Reusable view components directory |

### CSS & JavaScript
Located in: `app/resources/`

| File | Purpose |
|------|---------|
| **css/app.css** | Main application stylesheet |
| **js/app.js** | Main application JavaScript |
| **js/bootstrap.js** | JavaScript bootstrapping |

---

## 📦 Build & Package Management

### Configuration Files
| File | Purpose |
|------|---------|
| **app/composer.json** | PHP dependencies and project metadata |
| **app/package.json** | Node.js dependencies and npm scripts |
| **app/vite.config.js** | Vite build configuration for front-end |
| **app/phpunit.xml** | PHPUnit testing configuration |

### Application Entry Point
| File | Purpose |
|------|---------|
| **app/public/index.php** | Main web application entry point |
| **app/artisan** | Laravel CLI command runner |

---

## 🧪 Testing

Located in: `app/tests/`

| Directory/File | Purpose |
|---|---|
| **TestCase.php** | Base test class configuration |
| **Feature/** | Feature/integration tests |
| **Unit/** | Unit tests |

---

## 📱 NativePHP Desktop App

Located in: `app/nativephp/`

| File/Directory | Purpose |
|---|---|
| **nativephp.json** | NativePHP configuration and manifest |
| **android/** | Android build configuration and gradle setup |
| **binaries/** | Native binaries storage |
| **resources/** | Native app resources |

---

## 🔌 Key External Dependencies

### Top-Level Packages (via Composer)
- **Laravel Framework** - Web application framework
- **NativePHP** - Desktop application framework
- **Guzzle HTTP** - HTTP client (for Open Library API calls)
- **Workerman** - Async worker (in vendor)
- **React** - Event loop (in vendor)

### key Features
- **Open Library API Integration** - For fetching book data
- **Eloquent ORM** - Database abstraction
- **Blade Templating** - View rendering engine

---

## 🔄 Application Flow

```
Web Request
    ↓
routes/web.php (HTTP routing)
    ↓
ApiController::index()
    ↓
ApiService::getBooks() or searchBooks()
    ↓
Open Library API (https://openlibrary.org/search.json)
    ↓
ApiService::formatBooks()
    ↓
views/books.blade.php (Render)
    ↓
Response to User
```

---

## 📊 Key Functionality Summary

### Book Search & Display
- **Entry Point:** `/books` route
- **Controller:** `ApiController::index()`
- **Service:** `ApiService`
- **External API:** Open Library API
- **View:** `books.blade.php`

### Features
✅ Browse bestseller books  
✅ Search books by query  
✅ Display book information (title, author, cover, year)  
✅ Desktop application support via NativePHP  

---

## 🔍 Quick Reference

### To Add a New Feature
1. **API endpoint** → Modify `app/routes/web.php`
2. **Business logic** → Add method to `app/app/Services/ApiService.php`
3. **Controller** → Add method to controller in `app/app/Http/Controllers/`
4. **View** → Create/update `.blade.php` in `app/resources/views/`

### Common Commands
```bash
# Run application
php artisan serve

# Run tests
php artisan test

# Create migration
php artisan make:migration MigrationName

# DatabaseSeeding
php artisan db:seed

# Build front-end
npm run build
```

---

## 📝 Notes

- The application fetches book data from the **Open Library API**
- Both `ApiController` and `BookController` provide book functionality; `ApiController` uses the service layer (recommended)
- User model is set up for future authentication features
- NativePHP allows this Laravel app to run as a native desktop application
