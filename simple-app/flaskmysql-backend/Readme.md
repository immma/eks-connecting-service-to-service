### Docker compose 
```
docker-compose up
```

### Docker compose detach
```
docker-compose up -d
```

### Docker compose down
```
docker-compose down
```

### PHPMyAdmin
Installation 

Docker image pull
```
docker pull phpmyadmin
```

Run PHPMyAdmin
```
docker run -d -e PMA_ARBITRARY=1 -p 8080:80 phpmyadmin
```