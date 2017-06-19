# MVC Simple Search Application

This is a simple search application with login system for technical coding challenge from one of my job opportunity. I have used clean base MVC structure from [MINI](https://github.com/panique/mini) and customized simple logic to show my reference for PHP best practices. I also used PHP Template [Plates](http://platesphp.com/) for the view instead.

### Goals of this project:
- Create 4 screen (Home, Login, Register, Search Result).
- All validations must be both client and server side.
- Installation instructions should be included.
- Code should be documented where needed (use your own judgement).

### Extra features of this project:
- Use the usage of PDO
- Use the usage of external libraries via Composer
- Use PSR 1/2 coding guidelines
- Use basics of the MVC architecture
- Use the usage of OOP

## Installation
### On Docker

1. Download LAMP Base Docker image && run it (You have to provide `<your-container-name>`, `<your-html-dir>`, `<your-mysql-data-dir>`)

```bash
docker run -d \
    --name <your-container-name> \
    -v `pwd`/<your-html-dir>:/var/www/html \
    -v `pwd`/<your-mysql-data-dir>:/var/lib/mysql \
    -p 8000:80 \
    -p 33060:3306 \
    -p 9001:9001 \
    terr76/lamp-base
```
If 80 and 3306 ports are available on your host machine, you can map it like -p 80:80 -p 3306:3306.

2. Copy this repo into a `html` folder in you a public accessible folder on your server.
```
git clone https://github.com/panique/php-mvc.git html
```
The folder name `html` must be same as `<your-html-dir>`

3. Access DB(ID:root, PW:root) and execute the .sql statements in the `_install/` folder. 

4. Excute composer install to use external libraries and namespace via autoload(PSR-4).

### Testing with demo user
Demo User Email: `john@example.com`
Demo User Password: `1234`