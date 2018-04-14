# WebProject
<p align="center">ENGLISH CHALLENGE</p>

## Requirements
- PHP Version >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Dom PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- MySQL Server Version >= 5.5.3
- NodeJS Latest Version
```
php -v
php -m
mysql -V
npm -v
node -v
```

## Install Requirements
- PHP Version 7.2.4 and Extensions:
```
Ubuntu:
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install python-software-properties
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install php7.2
sudo apt-get install php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-zip php7.2-mysql php7.2-mbstring php7.2-xml
```
```
CentOS: (As root)
yum update
yum upgrade
yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm
yum install http://rpms.remirepo.net/enterprise/remi-release-6.rpm
yum install yum-utils
yum-config-manager --enable remi-php72
yum install php
yum install php-mbstring php-pecl-mcrypt php-cli php-gd php-curl php-mysql php-ldap php-zip php-fileinfo php-pdo php-dom php-xml php-pear php-devel
```

- MySQL Server:
```
Ubuntu:
sudo apt-get install mysql-server
```
```
CentOS: (As root)
wget http://dev.mysql.com/get/mysql57-community-release-el6-7.noarch.rpm (CentOS 6)

wget http://dev.mysql.com/get/mysql57-community-release-el7-7.noarch.rpm (CentOS 7)

yum localinstall mysql57-community-release-el6-7.noarch.rpm (CentOS 6)

yum localinstall mysql57-community-release-el7-7.noarch.rpm (CentOS 7)

yum install mysql-community-server

mysqld_safe --skip-grant-tables &
mysql -u root

use mysql;
UPDATE user SET authentication_string=PASSWORD('your_password'), password_expired='N' WHERE User='root';
FLUSH PRIVILEGES;
quit

service mysqld restart
```

- NodeJS:
```
Ubuntu:
curl -sL https://deb.nodesource.com/setup_9.x | sudo -E bash
sudo apt-get install nodejs
```
```
CentOS: (As root)
curl --silent --location https://rpm.nodesource.com/setup_9.x | bash
yum install nodejs
```

- GitHub:
```
Ubuntu:
sudo apt-get install git
```
```
CentOS: (As root)
yum install git
```


## Step 1: Clone this project.
```
(Run without root)
git clone https://github.com/danghao97/WebProject.git
```
## Step 2: Change directory (cd) to the cloned folder.
```
cd ./WebProject
```
## Step 3: Copy configuration file:
```
Copy file ".env.example" and save as new file named ".env"
cp .env.example .env
```
## Step 4: Run in terminal or command prompt:
```
php composer.phar install
```
## Step 5: Run in terminal or command prompt:
```
php artisan key:generate
```
## Step 6: Directory Permissions:
```
chmod a+w -R ./storage
chmod a+w -R ./bootstrap/cache
```
## Step 7: Install packages of NodeJS:
```
npm install
```
## Step 8: Change database info in .env file:
```
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

## Step 9: Migrations:
```
php artisan migrate
```

## Step 10: Run Project:
- Stop Apache2 if it running:
```
sudo systemctl stop apache2
or
sudo service apache2 stop
```
- Start project:
```
(Run as root)
sudo php artisan serve --host=localhost --port=80
```


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
