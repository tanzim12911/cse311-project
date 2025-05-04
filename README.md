# Total Football

**Total Football** is a comprehensive football information system built as a course project for **CSE311: Database Systems**. It allows management and interaction with football-related data including players, matches, statistics, and user engagement features like voting and notifications.

---

## ⚽ Overview

**Total Football** provides a structured and interactive football platform where:
- Admins can manage players, matches, and stats.
- Users can vote for the Player of the Week, create watchlists, and receive notifications.

Inspired by platforms like **Transfermarkt** and **Sofifa**, this project demonstrates the application of relational databases, SQL, and web development practices in a real-world-like scenario.

## 🚀 Features

- 🔐 **Login System** for Admin and User roles  
- 📋 **Admin Panel** for adding/editing data using Filament PHP  
- 📊 **Sofifa-style Player Statistics**  
- 🗳️ **Voting System** for Player of the Week  
- 📅 **User Watchlist** to track upcoming matches  
- 🔔 **Email/SMS Notifications** for saved matches  
- 💾 **MySQL Database** integration  
- 🎨 **Custom Frontend** using only HTML and CSS (no Bootstrap)

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS (Custom)
- **Backend**: PHP (Filament PHP for Admin)
- **Database**: MySQL
- **Notifications**: API (e.g., Twilio or SMTP)

## 🧱 Database

The SQL file `transfermarkt_db.sql` contains the full database schema with tables such as:

- `users`
- `players`
- `matches`
- `votes`
- `watchlist`
- `notifications`

## 🚧 Setup Instructions

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/total-football.git
