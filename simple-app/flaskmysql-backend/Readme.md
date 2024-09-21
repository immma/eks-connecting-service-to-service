## Install Docker Compose
docker-compose (latest version)
```
sudo curl -L https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m) -o /usr/local/bin/docker-compose
```
Fix permissions after download
```
sudo chmod +x /usr/local/bin/docker-compose
```

Verify success
```
docker-compose version
```

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