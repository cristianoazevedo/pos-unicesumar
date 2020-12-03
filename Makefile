install:
	- cd adr-application && make update
	- cd mvc-application && make update

start-adr-application:mysql-up
	- cd adr-application && make serve

start-mvc-application:mysql-up
	- cd mvc-application && make serve

mysql-up:
	- docker-compose up -d

mysql-restart:
	- docker-compose restart

mysql-stop:
	- docker-compose stop