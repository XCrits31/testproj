# Event & Venue Management Platform (Test Task)

A robust Laravel-based web application built as a technical test task to demonstrate clean CRUD architecture, role-based access control, API integration, and automated testing (CI/CD).

## Key Features & Architecture

* **Role-Based Access Control (RBAC):** Integrated Laravel Breeze for authentication, extended with custom user roles (Admin vs. Regular User). 
  * *Admins* have full CRUD permissions over Events and Venues tables.
  * *Regular users* are restricted to read-only access.
* **Smart Weather Integration & Caching:** Detects the user's location via IP address on the fly to fetch and display current regional weather data. To prevent API rate-limiting and boost performance, weather data is cached in **Redis** with a time-to-live (TTL) restriction.
* **Advanced Data Handling:** Server-side pagination, dynamic sorting, and image processing (via `Intervention Image`) for event/venue banners.
* **Automated Workflow (CI/CD):** The codebase is fully covered with **PHPUnit** feature tests targeting core CRUD operations and authentication guardrails. A **GitHub Actions** workflow triggers on every push to ensure no breaking changes hit the main branch.

## Tech Stack

* **Backend:** PHP 8.2+, Laravel 11
* **Database & Caching:** MySQL 8, Redis
* **Frontend:** Vite, TailwindCSS / Bootstrap
* **Testing & DevOps:** PHPUnit, GitHub Actions
* **Key Packages:** Laravel Breeze, Intervention Image

## Core Logic 

### 1. Authorization Guardrails
Role checks are handled efficiently via Laravel **Middleware**. If a regular user tries to force a `POST/PUT/DELETE` route, the application aborts immediately with a `403 Forbidden` response.

### 2. Weather Fetching & Redis Lifecycle
Instead of spamming the third-party weather API on every page refresh, the logic follows a standard caching pattern:
User req -> Check Redis Cache for IP/Region
- Cache Hit  -> Return cached weather JSON immediately
- Cache Miss -> Fetch from Weather API -> Save to Redis -> Return data
