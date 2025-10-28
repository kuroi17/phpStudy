Alright bro, here is a **clean, ready-to-use login system boilerplate** using:

* **PHP**
* **MySQL (via XAMPP)**
* **password_hash + password_verify**
* **Sessions**

This is designed to be **simple** and **easy to paste into your workspace**.

---

## 📁 Folder Structure (Copy This)

```
your-project/
│
├─ index.php               <-- login page
├─ register.php            <-- registration page
├─ home.php                <-- protected page after login
├─ logout.php              <-- destroys session
│
└─ config/
   └─ database.php         <-- DB connection
```

---

## 🔧 1. Create Database First

Go to **phpMyAdmin** → Run this:

```sql
CREATE DATABASE user_system;

USE user_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

---

## ⚙️ 2. `config/database.php`

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "user_system";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
```

---

## 📝 3. `register.php`

```php
<?php
session_start();
require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?registered=1");
        exit;
    } else {
        $error = "Username already exists.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Enter username" required><br><br>
    <input type="password" name="password" placeholder="Enter password" required><br><br>
    <button type="submit">Register</button>
</form>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<a href="index.php">Already have an account? Login</a>

</body>
</html>
```

---

## 🔐 4. `index.php` (Login Page)

```php
<?php
session_start();
require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: home.php");
            exit;
        }
    }

    $error = "Invalid username or password.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<a href="register.php">Create Account</a>

</body>
</html>
```

---

## 🏠 5. `home.php` (Protected Page)

```php
<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>

<a href="logout.php">Logout</a>

</body>
</html>
```

---

## 🚪 6. `logout.php`

```php
<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit;
```

---

## ✅ Done!

You now have:

* **Registration with password hashing**
* **Login with password verification**
* **Session-based authentication**
* **Logout handling**

---

If you want next:
✔ Convert UI to Tailwind
✔ Add form validation
✔ Prevent SQL Injection (prepared statements — we already started)
✔ Role-based accounts
✔ Session timeout security

Just say:

**Bro, upgrade the UI to Tailwind** 🌙🔥
