# Total Football

**Total Football** is a comprehensive football information system built as a course project for **CSE311: Database Systems**. It allows management and interaction with football-related data including players, matches, statistics, and user engagement features like match start notifications.

---

## ⚽ Overview

**Total Football** provides a structured and interactive football platform where:
- Admins can manage players, matches, and stats.
- Users can view teams, competitions, and player stats, create watchlists, and receive notifications.

Inspired by platforms like **Transfermarkt** and **Sofifa**, this project demonstrates the application of relational databases, SQL, and web development practices in a real-world-like scenario.

## 🚀 Features

- 🔐 **Login System** for Admin and User roles  
- 📋 **Admin Panel** for adding/editing data using Filament PHP  
- 📊 **Sofifa-style Player Statistics**   
- 📅 **User Watchlist** to track upcoming matches  
- 🔔 **Email Notifications** for subscribed matches  
- 💾 **MySQL Database** integration  
- 🎨 **Custom Frontend** using only HTML and CSS (no Bootstrap)

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS (Custom)
- **Backend**: PHP (Filament PHP for Admin)
- **Database**: MySQL
- **Notifications**: Mailhog

## 🧱 Database Schema

You can view the complete schema for the database here:  
👉 [CSE311 Project Final - DrawSQL Schema](https://drawsql.app/teams/jkteam-1/diagrams/cse311projectfinal-2)

## 🚧 Setup Instructions

1.  **Clone the repository**:
    ```bash
    git clone [https://github.com/yourusername/total-football.git](https://github.com/yourusername/total-football.git)
    ```
    Navigate into the cloned directory:
    ```bash
    cd total-football
    ```
2.  **Import the Database**:
    Use phpMyAdmin or the MySQL command-line interface (CLI) to import the provided SQL file:
    ```bash
    mysql -u your_username -p your_database_name < transfermarkt_db.sql
    ```
    (Replace `your_username` and `your_database_name` with your actual database credentials).
3.  **Configure Backend**:
    Ensure your local server environment supports PHP.

    Install PHP dependencies, including Filament PHP, using Composer:
    ```bash
    composer install
    ```
    Copy the example environment file and create your `.env` file:
    ```bash
    cp .env.example .env
    ```
    Edit the newly created `.env` file to configure your database connection and any necessary API credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

    # Other configurations...
    ```
    Generate an application key:
    ```bash
    php artisan key:generate
    ```
4.  **Start the Server**:
    You can use PHP's built-in development server:
    ```bash
    php artisan serve
    ```
5.  **Access the App**:
    Open your web browser and go to `http://127.0.0.1:8000/admin`.

## 📬 Notification Setup

To enable Email notifications within the application, run **mailhog** and go to `http://localhost:8025/`

## 📚 Course Info

Course: CSE311L – Database Systems Lab
Institution: North South University
Instructor: NDA
Semester: Spring 2025
Project Type: Lab Group Project

## 📄 License

This project is licensed under the MIT License. See the LICENSE file for details.
