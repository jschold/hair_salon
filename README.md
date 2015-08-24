# _Hair Salon_

##### _App where users can add hair stylists and their clients, 8-21-15_

#### By _**Jenna Navratil**_

## Description

_This app is created for a hair salon owner who wants to add both stylists and clients. The owner can add clients for each stylist. Each client can only see one stylist._

## Setup

Clone the repository. Run the command $composer install in the top level of the cloned directory. Open a PHP server in the web folder of the top level. For a mac, run the following command in your terminal:

php -S localhost:8000. Then open your web browser of choice to localhost:8000.

Start Apache server. Open PHPmyAdmin and import the database file.

## Technologies Used

HTML
CSS
PHP
PHPUnit
Silex
Twig
MySql
Bootstrap

### Legal


Copyright (c) 2015 **_Jenna Navratil_**

This software is licensed under the MIT license.

#### MySQl Commands:

CREATE DATABASE hair_salon;
USE hair_salon;
CREATE TABLE stylists(name VARCHAR(255), id serial PRIMARY KEY);
CREATE TABLE clients(id serial PRIMARY KEY, client_name VARCHAR(255), stylist_id int);
