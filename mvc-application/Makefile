DOCKER_RUN:= docker run --rm -it --net=host --name="mvc-application" -v "${PWD}":/app -w /app csazevedo/php:7.4

# Update (Composer)
update:
	- ${DOCKER_RUN} 'composer update'

bash:
	- ${DOCKER_RUN} bash