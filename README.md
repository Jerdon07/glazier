# Glazier

**A lightweight doughnut shop management system built with Laravel.**

DoughDesk is a learning project focused on strengthening my Laravel fundamentals and Eloquent ORM skills through a practical doughnut shop management application.

The project covers product management, ingredient tracking, recipe management, and ingredient cost estimation. It is designed to demonstrate core Laravel development skills through a small, maintainable application rather than unnecessary complexity.

## Features

### Product Management
- Create, view, update, and delete doughnut products.
- Manage product names, descriptions, prices, categories, and availability.
- Search and filter products.
- Paginate product listings.

### Ingredient Management
- Manage ingredients used in doughnut production.
- Record ingredient units, costs, and stock quantities.
- Maintain ingredient information for recipe calculations.

### Recipe Management
- Associate multiple ingredients with a doughnut product.
- Define the required quantity of each ingredient.
- View the ingredients and quantities required for each recipe.

### Cost Calculator
- Estimate ingredient costs per doughnut.
- Calculate estimated gross profit based on selling price and ingredient costs.
- Compare products by estimated profitability.

### Production Tracking *(Planned)*
- Record production batches and quantities.
- Maintain a history of doughnut production.
- View production summaries.

## Tech Stack

- **Backend:** PHP, Laravel
- **Database:** SQLite or PostgreSQL
- **Frontend:** Blade, HTML, Tailwind CSS
- **Testing:** Pest
- **Version Control:** Git and GitHub

## Learning Objectives

This project is intended to strengthen my understanding of:

- Laravel routing, controllers, and request validation.
- Eloquent models, queries, and mass assignment.
- Database migrations, foreign keys, and relationships.
- One-to-many and many-to-many relationships.
- Eager loading and query optimization.
- CRUD operations and pagination.
- Pest feature testing.
- Clean, maintainable Laravel application structure.

## Database Design

The initial database design consists of the following tables:

| Table | Purpose |
|---|---|
| `products` | Stores doughnut product information. |
| `ingredients` | Stores ingredient details, costs, and stock quantities. |
| `recipes` | Connects products and ingredients, including required quantities. |
| `production_batches` | Records production quantities and dates. *(Planned)* |

The `recipes` table serves as the intermediate table for the many-to-many relationship between products and ingredients.

## Installation

### Requirements

- PHP version compatible with the installed Laravel version.
- Composer
- Node.js and npm
- SQLite or PostgreSQL
- Git

### Setup

1. Clone the repository.

   ```bash
   git clone <repository-url>
   cd doughdesk
   ```

2. Install PHP dependencies.

   ```bash
   composer install
   ```

3. Create your environment file.

   ```bash
   cp .env.example .env
   ```

4. Generate the application key.

   ```bash
   php artisan key:generate
   ```

5. Configure your database connection in `.env`.

6. Run database migrations.

   ```bash
   php artisan migrate
   ```

7. Install frontend dependencies.

   ```bash
   npm install
   ```

8. Start the development servers.

   ```bash
   npm run dev
   ```

   In another terminal:

   ```bash
   php artisan serve
   ```

9. Open the local URL displayed by Artisan, typically `http://127.0.0.1:8000`.

## Testing

Run the automated test suite using:

```bash
php artisan test
```

Tests will cover core application behavior, including CRUD operations, validation, and database relationships as these features are implemented.

## Project Status

**Status:** In Development

DoughDesk is being developed incrementally, starting with product CRUD and progressing toward ingredient management, recipe relationships, and cost estimation.

Features marked as planned are not yet considered implemented.

## Future Improvements

- Production batch tracking.
- Ingredient stock monitoring.
- Low-stock notifications.
- Dashboard summaries for products and estimated profitability.
- Additional feature tests and query optimization.

## Purpose

DoughDesk is both a practical application idea and a hands-on exercise in becoming more independent with Laravel and Eloquent ORM. The goal is to understand the reasoning behind the implementation, write maintainable code, and develop the confidence to build Laravel applications without relying on AI to generate the core logic.
