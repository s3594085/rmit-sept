all:
	php composer.phar install
	php artisan migrate:refresh
	php artisan db:seed
	docker-compose up -d --build

run:
	docker-compose up -d
