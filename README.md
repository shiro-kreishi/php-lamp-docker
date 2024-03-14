# LAMP docker
```bash
sudo chmod -R 755 src/
```
## build container
```bash
make build
# or
docker compose up -d  # for Ubuntu and other GNU/Linux
```
## start
```bash
make start
# or
docker compose start # for Ubuntu and other GNU/Linux
```
## stop
```bash
make stop
# or
docker compose stop # for Ubuntu and other GNU/Linux
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
Ubuntu or Debian
```bash
# Add Docker's official GPG key:
sudo apt-get update
sudo apt-get install ca-certificates curl
sudo install -m 0755 -d /etc/apt/keyrings
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
sudo chmod a+r /etc/apt/keyrings/docker.asc
# Add the repository to Apt sources:
echo   "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
  $(. /etc/os-release && echo "$VERSION_CODENAME") stable" |   sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
sudo systemctl enable docker
sudo systemctl enable docker --now
sudo usermod -aG docker ${USER}
```
Fedora or RHEL
```bash
sudo dnf upgrade
sudo dnf install dnf-plugins-core
sudo dnf config-manager --add-repo https://download.docker.com/linux/fedora/docker-ce.repo
sudo dnf install docker-ce docker-ce-cli containerd.io
sudo systemctl enable docker --now
sudo usermod -aG docker ${USER}
sudo groupadd docker && sudo gpasswd -a ${USER} docker && sudo systemctl restart docker
sudo newgrp docker
# verify that Docker was correctly installed and is running by running the Docker hello-world image
# sudo docker run hello-world
docker run hello-world
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
# your code ...
close(connect);
```
