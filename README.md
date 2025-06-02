# Bookstore Record Management System (RMS)

A PHP and MySQL-based system to manage bookstore operations like inventory, book records, and user accounts. This guide will walk you through downloading the project and running it using **XAMPP** and **phpMyAdmin** on your local computer.

---

## Step-by-Step Instructions to Run This Project Locally

### STEP 1: Make Sure PHP and XAMPP Are Properly Installed

1. Download and install **XAMPP** from:  
   🔗 https://www.apachefriends.org/index.html

2. After installing, open the **XAMPP Control Panel**.

3. You will use this to start:
   - Apache (for PHP)
   - MySQL (for the database)

---

### STEP 2: Download the Project from GitHub

1. Go to this GitHub repository:  
   [https://github.com/behati25/bookstore](https://github.com/behati25/bookstore)

2. Click the green **Code** button and choose **Download ZIP**.

3. Go to your **Downloads folder**, right-click the ZIP file, and choose **Extract All**.

4. A new folder (e.g., `bookstore-main`) will appear after extraction.

---

### STEP 3: Move the Project to XAMPP's `htdocs`

1. Open **File Explorer** and go to:  
   `C:\xampp\htdocs`

2. Copy the extracted folder (e.g., `bookstore-main`) and paste it into the `htdocs` folder.

---

### STEP 4: Open the Project in Visual Studio Code (Optional)

1. Open **Visual Studio Code**.

2. Click **File** → **New Window**.

3. Then click **File** → **Open Folder**.

4. Select this path:  
   `C:\xampp\htdocs\bookstore-main`

---

### STEP 5: Start Apache and MySQL in XAMPP

1. Open **XAMPP Control Panel**.

2. Start:
   - Apache
   - MySQL

3. Click the **Admin** button next to MySQL to open **phpMyAdmin**.

---

### STEP 6: Set Up the Database

1. In **phpMyAdmin**, click **Databases** from the top menu.

2. Under “Create database”, enter the name:  
   `bookstore`  
   and click **Create**.

---

### STEP 7: Import the SQL File

1. Make sure you're inside the `bookstore` database.

2. Click the **Import** tab.

3. Click **Choose File** and select:  
   `bookstore.sql` (found inside your project folder)

4. Click **Go** to import the database structure and data.

---

### STEP 8: Run the System in Your Browser

1. Open your browser and enter this URL:  
   `http://localhost/bookstore-main/login.php`

2. You should now see the login page of the Bookstore RMS.

---

### STEP 9: Sign Up and Test

1. Click **Sign Up** to register a new account.

2. After creating an account, log in using your credentials.

3. You now have access to the full functionality of the RMS.

---

## Notes

- Always make sure **Apache** and **MySQL** are running before accessing `localhost`.
- If you rename the folder, update your browser path (e.g., `localhost/bookstore-main` → `localhost/your-folder-name`).
- The SQL file should match the name of the database (`bookstore`).

---

## Members

- Trisha Joyce F. Rotairo  
- Niekyla M. Lozano

---




