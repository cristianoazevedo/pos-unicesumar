DOCKER_RUN:= docker run --rm -it --net=host --name="adr-application" -v "${PWD}":/app -w /app csazevedo/php:7.4

update:
	- ${DOCKER_RUN} composer update

serve:
	- ${DOCKER_RUN} composer run serve

test:
	- ${DOCKER_RUN} composer run test

bash:
	- ${DOCKER_RUN} bash