# LAMP docker
```bash
sudo chmod -R 755 src/
```
## build container
```bash
make build
```
## start
```bash
make start
```
## stop
```bash
make stop
```
# URL for working with this project
## PhpMyAdmin
login: root
password: password
```url
http://localhost:8080
```
## Apache with php
```
http://localhost
```

# Dependency
docker docker-compose make

# Install
Arch Linux
```bash
sudo pacman -S docker docker-compose make
sudo systemctl enable docker.service --now
sudo newgrp docker
exit
sudo usermod -aG docker $USER
exec $SHELL
```

# Example
Connect to the database you created
```php
<?php
$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "test";
$port = "3306";
$connect = mysqli_connect(
    $hostname, $username,
    $password, $database, $port
);
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}

close(connect);
```
