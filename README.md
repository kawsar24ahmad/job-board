
# Job-Board


## Features


## Installation

### Prerequisites

Ensure you have the following installed on your local environment:

- PHP >= 8.0
- Composer
- Laravel 11
- MySQL
- Node.js (for frontend assets)

### Steps

1. Clone the repository:

   ```bash
   git clone https://github.com/kawsar24ahmad/job-board.git
   ```

2. Navigate to the project directory:

   ```bash
   cd Job-Board
   ```

3. Install dependencies:

   ```bash
   composer install
   npm install
   ```

4. Set up the environment file:

   ```bash
   cp .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Set up your database connection in the `.env` file.

7. Run the migrations:

   ```bash
   php artisan migrate
   ```

8. Run the application:

   ```bash
   php artisan serve
   ```

9. Open your browser and go to `http://localhost:8000`.

## Testing

To run the unit and feature tests, use the following command:

```bash
php artisan test
```

You can also use Pest for more readable test cases:

```bash
php artisan pest
```

## Contribution

If you'd like to contribute to this project, please fork the repository, create a branch for your changes, and submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).
