start:
	docker-compose up -d
stop:
	docker-compose down
restart:	stop start
build:
	docker-compose build app
stop_v:
	docker-compose down -v
app:
	docker exec -it app bash
clear:
	php artisan config:clear
	php artisan cache:clear
reset:
	php artisan db:wipe
	php artisan migrate
	php artisan db:seed