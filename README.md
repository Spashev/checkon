## Deploy docker-compose

Need download docker-compose and make bash

site: http://localhost:8000/

## Start project
```bash
make install
make start
make migrate
```
## Show all routes
```bash
make route
```

## Delete project
```bash
make destroy
```

## Run test
```bash
make test
```

## OR using docker-compose
```bash 
docker-compose up -d --build
docker-compose exec main php artisan migrate --seed
docker-compose exec main php artisan route:list
docker-compose exec main ./vendor/bin/pest
```

Тестовое задание: Простой CRUD API для заметок
Цель задания:
Разработать простое RESTful API с использованием Laravel, которое позволит пользователям создавать, получать, редактировать и удалять заметки (notes). Для выполнения задания необходимо использовать последнюю стабильную версию Laravel.

Задачи:
Настройка проекта:

Установить Laravel и настроить базовую структуру проекта.
Настроить подключение к базе данных.
Миграции и модели:

Создать миграцию для таблицы notes с полями id, title, content, created_at, updated_at.
Создать модель Note.
API маршруты:

Настроить маршруты для CRUD операций над заметками:
GET /api/notes для получения списка всех заметок.
GET /api/notes/{id} для получения одной заметки по ID.
POST /api/notes для создания новой заметки.
PUT /api/notes/{id} для обновления заметки по ID.
DELETE /api/notes/{id} для удаления заметки по ID.
Контроллеры:

Создать контроллер NoteController с методами для обработки вышеуказанных маршрутов.
Использовать Eloquent для выполнения операций с базой данных.
Валидация:

Добавить простую валидацию входящих данных для создания и обновления заметок (например, проверка на наличие title и content).
Дополнительные указания:
Код должен быть чистым и хорошо организованным.
Приветствуется наличие базовых Unit-тестов.
Не требуется реализовывать аутентификацию или авторизацию для этого API.
Для сдачи задания:
Разместите код в репозитории на GitHub или аналогичной платформе.
Убедитесь, что в репозитории есть файл README.md с инструкциями по запуску проекта.
