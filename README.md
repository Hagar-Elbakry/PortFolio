# Portfolio Platform

A Laravel-based portfolio platform with a customizable dashboard and template. Each user can add their own data via an admin panel, which is then rendered to public views.

## Features

- User authentication and admin panel powered by Filament
- Dynamic resume, projects, education, skills, and languages sections
- Responsive frontend with Bootstrap and Blade templates
- Each user manages their own profile and content

## How to Use

1. **Clone the repository:**
   ```sh
   git clone https://github.com/Hagar-Elbakry/PortFolio.git
   cd Portfolio
   ```

2. **Install dependencies:**
   ```sh
   composer install
   npm install
   ```

3. **Set up environment:**
   - Copy `.env.example` to `.env` and configure your database and storage settings.
   - Generate an application key:
     ```sh
     php artisan key:generate
     ```

4. **Run migrations and create storage link:**
   ```sh
   php artisan migrate
   php artisan storage:link
   ```

5. **Create an admin user for Filament dashboard:**
   ```sh
   php artisan make:filament-user
   ```
   Follow the prompts to set up your admin credentials.

6. **Access the admin panel:**
   - Visit `/admin` in your browser and log in with your admin credentials.
   - Add your own data (profile, resume, projects, etc.) via the dashboard.

7. **Set Portfolio Owner:**
   - In the user form in Filament, make sure to set the **Portfolio Owner** toggle to `true`.

7. **View your public portfolio:**
   -  Visit `/` to see your portfolio rendered with the data you entered.
  
## Dashboard Demo

See how to log in and manage your data in the admin panel:

https://github.com/user-attachments/assets/6c7b365d-c6f9-4b6b-88fa-475fa1c7552c

---

## Portfolio Demo

See how your portfolio is rendered for visitors:

https://github.com/user-attachments/assets/b8617114-8a81-43df-a3e4-75098a5a76b6

---

**Note:** This platform is designed as a template. Each user can add and manage their own data through the dashboard, making it fully customizable.
