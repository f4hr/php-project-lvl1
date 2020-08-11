install:
	composer install
lint:
	composer run-script lint -- --standard=PSR12 src bin