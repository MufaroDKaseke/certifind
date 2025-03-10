# certifind
A reliable and efficient application designed to help users find verified services nearby.

## Installation

1. Download and install [XAMPP](https://www.apachefriends.org/download.html)
2. Clone this repository:
  ```bash
  cd c:/xampp/htdocs/
  git clone https://github.com/MufaroDKaseke/certifind.git
  ```
3. Create a new MySQL database named 'certifind'
4. Import the database schema:
  - Open phpMyAdmin (http://localhost/phpmyadmin)
  - Select the 'certifind' database
  - Click 'Import' and select `/certifind.sql`

5. Configure environment:
  - Rename `.env.example` to `.env`
  - Update database credentials in `.env`:
    ```
    DB_HOST=localhost
    DB_NAME=certifind
    DB_USER=root
    DB_PASS=
    ```

6. Start Apache and MySQL services in XAMPP Control Panel
7. Open your browser and navigate to `http://localhost/certifind`

## Requirements
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server
- Git