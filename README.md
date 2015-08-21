# _Best Restaurants_

##### _App where users can add restaurants by the type of cuisine they offer, 8-21-15_

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

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.





Hair Salon (AKA Code Review 3)


By Jenna Schold Navratil. August 21, 2015

This app lets users add/delete their favorite restaurants by the type of cuisine they prefer. Users can also add/delete types of cuisines to the app.

Setup
----------
* Clone repository:
```console
$ git clone https://github.com/samchalle/restaurants.git
```
* Install Silex/Twig/PHPUnit via Composer in the project folder:
```console
$ composer install
```
* Start your local host in the web folder:
```console
$ php -S localhost:8000
```
* Unzip **restaurant_reviews.sql.zip** and import it to your local server.
* Navigate your browser to **localhost:8000**
* To run tests using PHPUnit, create a copy of the database called **restaurant_reviews_test**

Technologies Used
----------
PHP, Twig, Silex, PHPUnit, MySQL, HTML, Bootstrap, CSS

License
----------
MIT License, Copyright (c) 2015 Samantha Maturen and Rick Hills
