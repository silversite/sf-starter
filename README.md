Symfony 3 Starter with docker
==========

Simple symfony 3 starter boilderplate with docker

# Included
   - DoctrineFixturesBundle
   - FosUserBundle (with fixtures)
   - DoctrineExtensionsBundle ((dql datetime funcition enabled))
   - DockerFile with docker-compose (Apache + php7 + mysql + phpmyadmin)

# Docker
```sh
$ cd docker
$ docker-compose build
$ docker-compose up
```
you need your mysql container ip address so run:
```sh
sudo docker exec -it c2bb762f641d ip addr | grep inet
```
and copy you global ip address

| Url | Description |
| ------ | ------ |
| App - production | http://localhost/ |
| App - development | http://localhost/app_dev.php |
| phpmyadmin | http://localhost:8180/ |

# Default database configuration

| Env | Settings |
| ------ | ------ |
| database_host | 172.17.0.2 |
| database_name | dev |
| database_user | dev |
| database_password | dev |
