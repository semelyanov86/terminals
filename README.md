# Платёжные терминалы
Проект на базе Laravel по управлению платёжными терминалами.

Данный проект предназначен для управления платёжными терминалами кредитных кооперативов, которые принимают займы и пополняют сбережения пайщиков.

Проект представляет собой админ-панель, взаимодействующая с терминалами по API.

# Основной функционал:
* Приём платежей по займам и сбережениям.
* Авторизация платёжных терминалов в системе.
* Ведение статистики и аналитика по платежам.
* Мониторинг оборудования.
* Отправка информации по платежам в 1С.
* Получение информации об остатке по займу их 1С.

# Инструкция по установке
* Clone this project
* Go to the folder application using cd command on your cmd or terminal
* Run composer install on your cmd or terminal
* Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
* Open my .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
* By default, the username is root and you can leave the password field empty.
* By default, the username is root and password is also root.
* Run php artisan key:generate
* Run php artisan migrate
* Run php artisan serve
* Go to localhost:8000

# Инструкция пользователя
Доступ в админку осуществляется через путь /admin
Далее следует ввести свой логин и пароль, по умолчанию это:
admin
pass: 1qaz2wsx

После авторизации вы попадаете в панель администрирования терминалов.
* /users/create - создание нового пользователя.
* /users/{id} - просмотр карточки пользователя.
* /users/edit/{id} - редактирование пользователя.
* /users - просмотр списка пользователей.
* /payers - просмотр списка пайщиков.
* configs - просмотр списка конфигурации.
* filials - просмотр списка филиалов.
* incassations - инкасации терминалов. 
* payments - таблица со списком платежей
* /report/payers - отчёт по пайщикам.
* /report/terminals - отчёт по терминалам.
