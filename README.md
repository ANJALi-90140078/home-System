# BCA Home Services Project
This Project is a web-based platform designed to connect users with home service providers for a variety of tasks such as cleaning, plumbing, electrical work, and more. The system allows users to book services, manage their appointments, and view available service providers in their area, while service providers can manage their service offerings and availability. An admin panel is included to oversee users, services, and bookings.

This project is built using PHP, MySQL, and is designed to run on a XAMPP server.

## Table of Contents

- [Features](#features)
- [Installation Guide](#installation-guide)
  - [Prerequisites](#prerequisites)
  - [Setup Instructions](#setup-instructions)
- [Tech Stack](#tech-stack)
- [How to Use](#how-to-use)
- [Contributing](#contributing)
- [Future Improvements](#future-improvements)
- [License](#license)
- [Contact](#contact)

## Features

- **User Registration & Login:** Users can register and log in to book home services.
- **Service Catalog:** A variety of home services are available, such as cleaning, plumbing, and electrical work.
- **Booking System:** Users can book services based on available times.
- **Service Provider Dashboard:** Service providers can manage their services, update availability, and check bookings.
- **Admin Panel:** Admins can oversee users, service providers, and bookings.


## Installation Guide

### Prerequisites
To run this project on your local machine, ensure the following software is installed:

- **XAMPP** (for running Apache server and MySQL database)
   - Download XAMPP from [Apache Friends](https://www.apachefriends.org/download.html) and install it on your machine.

- **PHPMyAdmin**: You'll use PHPMyAdmin (bundled with XAMPP) to manage the MySQL database.


### Setup Instructions

1. **Clone the repository:**

   ```bash
   git clone https://github.com/deepkorat/BCA-home-Services-Project.git
   ```

2. **Move the project:** 

   Move the cloned project folder into the `htdocs` directory of your XAMPP installation:

   ```bash
   C:/xampp/htdocs/BCA-home-Services-Project
   ```

3. **Create the database:**
   -  Open your browser and go to http://localhost/phpmyadmin.
   - Create a new database (e.g., hs).
   - Import the provided SQL file (database.sql) located in the repository:
      - Go to the "Import" tab in PHPMyAdmin.
      - Select the hs.sql file from your project folder. (database file that contains sql query for create all required tables.)
      - Click on "Go" to import the database structure and data.

4. **Configure database connection:**
- The project already contains a `dbconnect.php` file for database connection.
- Ensure that the dbconnect.php file contains the correct database credentials:
```php
$server = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";  // Leave blank for XAMPP default
$database = "hs";  // Name of the database you created
```
- Open your browser and navigate to http://localhost/BCA-home-Services-Project/db/dbconnect.php to make database connection.

5. **Run the project:**
- After successfully connection of database, you can access the platform -> http://localhost/BCA-home-Services-Project/index.php 


## Tech Stack
- **Front-end:** HTML, CSS, JavaScript
- **Back-end:** PHP, Ajax
- **Database:** MySQL (via PHPMyAdmin in XAMPP)
- **Server:** XAMPP (Apache, MySQL)


## How to Use

- Register as a user or log in if you already have an account.
- Browse the available services and choose the one that fits your needs.
- Select a date and time for the service and confirm the booking.
- Service providers can log in to manage their services and view appointments. Make sure Service provider can login after approvement of Admin.
- Admins can manage users, service providers, and bookings through the admin panel.

   `username` - admin  
   `password` - admin


## Contributing
Contributions are always welcome!
-  Fork the repository.
- Create a new branch for your feature or bug fix.
- Submit a pull request with a detailed description of your changes.


## Future Improvements
- **Payment Gateway Integration:** Enable users to pay for services online.
- **Mobile Optimization:** Improve the responsiveness for mobile devices.


## License
This project is licensed. 

[![MIT License](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)


## Contact
For questions or suggestions, please contact:

- **Deep Korat** - [Email](mailto:your-deepkorat13@gmail.com) 
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Deep_Korat-informational?style=flat-square&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/deep-korat-03273a210/
)

