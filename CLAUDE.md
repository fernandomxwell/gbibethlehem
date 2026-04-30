# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

GBI Bethlehem ("Gereja Baptis Indonesia Bethlehem") is a Laravel 13 church website — a single public-facing landing page displaying worship schedules, activities, and location info. No authentication or admin panel exists yet.

- **Locale/timezone:** Indonesian (`id`) / `Asia/Jakarta`
- **Database:** SQLite for development, configurable to MySQL/PostgreSQL
- **PHP requirement:** 8.3+

## Commands

```bash
# First-time setup (installs deps, creates .env, migrates, builds frontend)
composer setup

# Start all dev servers concurrently (Laravel, queue, logs, Vite)
composer dev

# Run tests
composer test
# or
php artisan test

# Run a single test file or method
php artisan test tests/Feature/ExampleTest.php
php artisan test --filter=test_method_name

# Lint PHP code
./vendor/bin/pint

# Frontend
npm run dev      # Vite dev server
npm run build    # Production build
```

## Architecture

### Request Flow

All web traffic routes to a single controller:
- `GET /` → `LandingController@index` → `landing/index.blade.php`

`LandingController` queries `Activity`, `ServiceType`, and `ScheduleGroup` models and passes data to the view.

### Domain Models

The core domain has four custom models — **migrations for these do not yet exist** and must be created:

| Model | Table | Key Fields |
|---|---|---|
| `Activity` | `activities` | `start_time`, SoftDeletes |
| `ServiceType` | `service_types` | SoftDeletes |
| `Schedule` | `schedules` | `scheduled_date` |
| `ScheduleGroup` | `schedule_groups` | — |

Relationships:
- `Activity` ↔ `ServiceType` — many-to-many via `activity_service_type` pivot
- `Activity` → `ScheduleGroup` — hasMany
- `ScheduleGroup` → `Schedule` — hasMany
- `Schedule` → `Activity`, `ServiceType`, `ScheduleGroup` — belongsTo

### Frontend

Blade templates in `resources/views/landing/index.blade.php` (~850 lines). The view is heavily styled with inline Tailwind configuration, custom animations (fade-up, scroll-reveal), glassmorphism effects, and glassmorphism effects. External dependencies loaded via CDN:
- **Tailwind CSS v4** (via Vite plugin for compiled CSS; also CDN script inline for custom config)
- **Font Awesome 6.5.1** — icons
- **Inter** — Google Fonts

`resources/js/app.js` is currently empty. `resources/css/app.css` imports Tailwind with custom theme.

### Infrastructure

Sessions, cache, and queues all use the **database** driver. The SQLite file lives at `database/database.sqlite`.
