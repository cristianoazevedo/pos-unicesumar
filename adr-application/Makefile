DOCKER_RUN:= docker run --rm -it --net=host --name="adr-application" -v "${PWD}":/app -w /app csazevedo/php:7.4

update:
	- ${DOCKER_RUN} composer update

start:
	- ${DOCKER_RUN} composer run start

bash:
	- ${DOCKER_RUN} bash