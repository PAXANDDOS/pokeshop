<p align='center'><img src="../assets/pokeball.png" height="120"></p>
<p align="center">
        <a href="https://www.php.net/" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" height="50">
        </a>
        <a href="https://getcomposer.org/" target="_blank">
            <img src="https://cdn.worldvectorlogo.com/logos/composer.svg" height="50">
        </a>
        <a href="https://mariadb.com/" target="_blank">
            <img src="https://mariadb.com/wp-content/uploads/2019/11/mariadb-horizontal-blue.svg" height="50">
        </a>
</p>

# PokéShop

PokéShop is a **zero-dependency** online shop built with my own Laravel-like framework. This project was made during the [NIX Solutions](https://www.nixsolutions.com/) education program.

## :crystal_ball: Framework features

-   Lightweight and well-documented. The size of PokéShop is only _115KB_ without images. Every method is well-documented so you always will know their function.
-   Fast and smart routing. The router uses regular expressions to determine the correct controller. Simply add one line of code in `routes/web.php` and your new page will work just fine! Pass any parameter inside curly brackets and access it in your controller.
-   Built-in API support. Any request on the path, defined in `routes/api.php` will work just fine! `GET`, `POST`, `PUT`, `PATCH`, and `DELETE` methods are supported. Pass any parameter or/and body and access them in your controller! The API is isolated from the web application.
-   Built-in **DotEnv**.
-   Easy-to-manipulate database with **PDO**.
-   A lot of helpers such as:
    -   Session helper for PHP sessions.
    -   Data validation for both web and API.
    -   API authorization and Bearer token generator.
    -   Simple API response.
-   Custom error and exception handler with logging.
-   Models using _Active Record_ template.
-   Testing with **Codeception**.

## :anchor: Requirements

-   PHP 8.x
-   MySQL 6.x / MariaDB 10.x
-   Composer 2.x

## :inbox_tray: Downloads

-   [v1.0 Latest](https://github.com/PAXANDDOS/pokeshop-web/releases/tag/v1.0) — [Download](https://github.com/PAXANDDOS/pokeshop-web/releases/download/v1.0/v1.0-pokeshop-web.zip)

## :cd: Installation

**Windows installation:**

1. Download and install the latest version of [XAMPP](https://www.apachefriends.org/). It will install both PHP and MariaDB. Whenever you want to use your database, open XAMPP and start the MySQL process. To access PhpMyAdmin, start both Apache and MySQL processes, click on the Admin button next to MySQL
2. Download and install the latest version of [Composer](https://getcomposer.org/Composer-Setup.exe). A PHP dependency manager.

**macOS installation:**  
You can easily install those via Homebrew:

```bash
brew install php mysql composer
```

## :scroll: Scripts

Application provides scripts for an easy contol of the application, type `composer run -l` to see all of them.

-   Serve the application with `composer run serve`
-   Build zero-dependency app with `composer run build`
-   Run all test or specific one with `composer run test`
-   Other test scripts.

## :key: API Reference

#### Authorization module

| Action   | Request         | Method | Requirements |
| :------- | :-------------- | :----- | :----------- |
| Register | `/auth/signup`  | `POST` | Data         |
| Sign in  | `/auth/signin`  | `POST` | Data         |
| Sign out | `/auth/signout` | `POST` | Bearer token |

#### User module

| Action        | Request       | Method | Requirements |
| :------------ | :------------ | :----- | :----------- |
| Get all users | `/users`      | `GET`  |              |
| Get user      | `/users/{id}` | `GET`  | user ID      |

#### Catalog module

| Actionn          | Request         | Method | Requirements |
| :--------------- | :-------------- | :----- | :----------- |
| Get all products | `/catalog`      | `GET`  |              |
| Get product      | `/catalog/{id}` | `GET`  | product ID   |

#### Order module

| Action             | Request        | Method   | Requirements           |
| :----------------- | :------------- | :------- | :--------------------- |
| Get user orders    | `/orders`      | `GET`    | Bearer token           |
| Get specific order | `/orders/{id}` | `GET`    | Bearer token, order ID |
| Create order       | `/orders`      | `POST`   | Bearer token, data     |
| Delete order       | `/orders/{id}` | `DELETE` | Bearer token, order ID |

## :fox_face: Have a great day!

**Don't forget to check out [PokéShop with Vue.js](../vue-frontend)**  
**[Also check out my other projects](https://github.com/PAXANDDOS?tab=repositories) and [visit my website](https://paxanddos.github.io)!**
