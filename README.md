# Getting Started

# First build and run the docker container:
docker-compose up

# Now run the composer with the help of docker:
docker exec demoexcel-app-1 composer install

# run the tests:
docker exec demoexcel-app-1 vendor/bin/phpunit tests

# launch in browser:
http://localhost:8080/

## add data to XLS database:
Just edit the [assignment.xls](src/assignment.xls)