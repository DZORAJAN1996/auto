# Закрытый каталог автомобилей

# Функционал.
Админ панель, добавление/редактирование/удаление марки, модели и автомобиля, тестовые данные


## Installation

```bash
git clone https://github.com/DZORAJAN1996/auto.git
cd auto && composer install
cp .env.example .env
# Добавить данные DB на файле .env
php artisan key:generate
php artisan migrate --seed

```

## Credentials
email:admin@gmail.com\
password:123456789

## License
[MIT](https://choosealicense.com/licenses/mit/)
