# AI Agent Instructions for Helpdesk System CT

This is a Laravel-based helpdesk system for tracking and managing support tickets/reports. Here's what you need to know to work effectively with this codebase:

## Architecture Overview

- **Core Domain**: Helpdesk ticket management system with locations, areas, and issue tracking
- **Key Models**:
  - `Laporan`: Core report/ticket model with relationships to other entities
  - `Pic`: Person in charge of handling tickets
  - `Lokasi` and `Area`: Location hierarchy for issue tracking
  - `Permasalahan`: Types of issues/problems that can be reported
  - `Status` and `Priority`: Ticket state and urgency tracking

## Development Workflow

1. Setup:
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

2. Database: Uses MySQL with migrations in `database/migrations/`
   - Key tables are timestamped with "2025" prefix for proper ordering
   - Run `php artisan migrate:fresh --seed` to reset with sample data

3. Development Server:
```bash
php artisan serve
```

## Project Conventions

1. **Route Organization**:
   - Web routes in `routes/web.php` grouped by feature
   - Authentication uses simple session-based admin login

2. **Model Patterns**:
   - Use explicit primary key naming (e.g., `id_laporan`, `id_pic`)
   - Relationship methods follow Laravel conventions
   - File uploads handled in `public/uploads/` directory

3. **Views**:
   - Uses Blade templating in `resources/views/`
   - Admin template assets in `resources/admin_template/`

## Key Integration Points

1. **Authentication**:
   - Custom login via `LoginController`
   - Session-based admin authentication

2. **File Handling**:
   - Report images stored in `public/uploads/`
   - Configure storage links if needed: `php artisan storage:link`

3. **Frontend**:
   - Uses Laravel Mix for asset compilation
   - Run `npm install && npm run dev` for frontend assets

## Common Tasks

1. Adding new report fields:
   - Add column to `laporans` table migration
   - Add to `$fillable` in `Laporan` model
   - Update relevant form views and controllers

2. Adding new relationships:
   - Create migration for new table
   - Create model with proper relationships
   - Update existing models if needed

Remember to follow Laravel's conventions for naming and organization. Reference existing implementations when adding new features.
