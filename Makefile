all:
	docker-compose up -d --build
	docker run --rm -v $(shell pwd):/app composer/composer install
run:
	docker-compose up -d
