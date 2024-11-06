Клонируйте репозиторий:
git clone https://github.com/futbalir/sport-complex-app.git

Перейдите в директорию проекта:
cd имя_репозитория

Установите зависимости с помощью Composer:
composer install

Настройка OpenServer:
Скопируйте папку проекта в папку domains внутри OpenServer. Убедитесь что OpenServer запущен

Создание базы данных:
Откроейте меню OpenServer и перейдите во вкладку phpmyadmin
Создайте базу данных с названием указанным в файле phinx.yml
Выполните миграции командой: php vendor/bin/phinx migrate
Запустите сиды командой: php vendor/bin/phinx seed:run

Запустите проект:
В меню OpenServer выберите вкладку мои проекты, в ней найдите проект и откройте его 