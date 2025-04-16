# GreenBasket Project Setup

## Requirements
- PHP >= 8.2
- Composer
- MySQL or other supported DB
- Node.js & NPM/Yarn
- Laravel CLI (optional)

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/ahmud-z/green-basket.git
   cd green-basket
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Copy `.env` file and generate app key**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**  
   Update `.env` with your DB credentials:
   ```
   DB_DATABASE=your_db
   DB_USERNAME=your_user
   DB_PASSWORD=your_password
   ```

5. **Run migrations (and seed if needed)**
   ```bash
   php artisan migrate --seed
   ```

6. **Install frontend dependencies**
   ```bash
   npm install && npm run dev
   ```

7. **Start the local server**
   ```bash
   php artisan serve
   ```

Your Laravel app should now be running at `http://127.0.0.1:8000`.
