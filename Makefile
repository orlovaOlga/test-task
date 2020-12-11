docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-composer build

##export-dump:
##	docker exec -i db mysqldump -uroot -ppassword --databases db --skip-comments > /Users/olga/Documents/dump.sql

export-dump:
	docker-compose exec db mysqldump -uroot -ppassword --databases db --skip-comments > /Users/olga/Documents/dump.sql

