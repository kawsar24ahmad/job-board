
# Job-Board

A job board application built with Laravel 11. This platform allows users to post and view job listings, manage applications, and more.

## Features

- User authentication (login, register)
- Job posting and management
- Job application functionality
- Admin dashboard for managing users and jobs

## Installation

### Prerequisites

Ensure you have the following installed on your local environment:

- PHP >= 8.0
- Composer
- Laravel 11
- MySQL
- Node.js (for managing frontend assets)

### Steps

1. **Clone the Repository**

   Clone the project repository to your local machine:

   ```bash
   git clone https://github.com/kawsar24ahmad/job-board.git
   ```

2. **Navigate to the Project Directory**

   Change into the project directory:

   ```bash
   cd Job-Board
   ```

3. **Install Dependencies**

   Install PHP and Node.js dependencies:

   ```bash
   composer install
   npm install
   ```

4. **Set Up the Environment File**

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

5. **Generate the Application Key**

   Generate the Laravel application key:

   ```bash
   php artisan key:generate
   ```

6. **Configure the Database**

   Set up your database connection in the `.env` file.

7. **Run Migrations**

   Apply the database migrations to set up the schema:

   ```bash
   php artisan migrate
   ```

8. **Start the Application**

   Start the Laravel development server:

   ```bash
   php artisan serve
   ```

9. **Access the Application**

   Open your browser and navigate to:

   ```
   http://localhost:8000
   ```

## Contribution

We welcome contributions to this project! To contribute:

1. Fork the repository.
2. Create a new branch for your changes.
3. Submit a pull request with a description of your changes.

## License

This project is open-source and available under the [MIT License](LICENSE).
