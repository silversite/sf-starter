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
$ docker-compose up -d
```

| Url | Description |
| ------ | ------ |
| App - production | http://localhost/ |
| App - development | http://localhost/app_dev.php |
| phpmyadmin | http://localhost:8180/ |

# Default database configuration

| Url | Description |
| ------ | ------ |
| database_host | db |
| database_name | dev |
| database_user | dev |
| database_password | dev |