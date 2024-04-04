start:
	docker-compose up -d
stop:
	docker-compose down
restart:	stop start
build:
	docker-compose build app
end:
	docker-compose down -v
