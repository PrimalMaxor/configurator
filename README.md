# Configurator

A web-based frame configurator application built with Laravel and Vue.js that allows users to design and visualize custom frames with various dimensions and dividers.

## Features

- **Interactive Frame Design**: Create custom frames with configurable dimensions (width, height, thickness)
- **Divider System**: Add internal dividers to organize frame compartments
- **Real-time Visualization**: SVG-based preview that updates in real-time as you configure
- **Measurement Indicators**: Visual measurement arrows and labels showing frame dimensions
- **User Authentication**: Secure user registration and login system
- **Responsive Design**: Modern, mobile-friendly interface built with Tailwind CSS

## Technology Stack

- **Backend**: Laravel 11 (PHP)
- **Frontend**: Vue.js 3 with Inertia.js
- **Styling**: Tailwind CSS
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Breeze

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- MySQL or PostgreSQL database

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd configurator
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   Edit `.env` file and set your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=configurator
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database (optional)**
   ```bash
   php artisan db:seed
   ```

8. **Build frontend assets**
   ```bash
   npm run build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`

## Development

### Running in development mode

1. **Start the Laravel development server**
   ```bash
   php artisan serve
   ```

2. **Start Vite development server (in another terminal)**
   ```bash
   npm run dev
   ```

### Available Artisan Commands

- `php artisan migrate` - Run database migrations
- `php artisan db:seed` - Seed the database with sample data
- `php artisan route:list` - List all registered routes
- `php artisan make:controller` - Create a new controller
- `php artisan make:model` - Create a new model

### Available NPM Scripts

- `npm run dev` - Start Vite development server
- `npm run build` - Build assets for production
- `npm run preview` - Preview production build

## Project Structure

```
configurator/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/              # Eloquent models
│   ├── Services/            # Business logic services
│   └── Providers/           # Service providers
├── resources/
│   ├── js/
│   │   ├── Components/      # Vue.js components
│   │   ├── Layouts/         # Page layouts
│   │   └── Pages/           # Inertia.js pages
│   └── css/                 # Stylesheets
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/            # Database seeders
│   └── factories/          # Model factories
└── routes/                 # Application routes
```

## Key Components

### Frame Configuration
- **ConfiguratorController**: Handles frame configuration logic
- **SvgGeneratorService**: Generates SVG visualizations of frames
- **Configurator.vue**: Main configuration interface
- **ConfiguratorConfigure.vue**: Detailed configuration panel

### Authentication
- Laravel Breeze provides user authentication
- Email verification system
- Password reset functionality

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
