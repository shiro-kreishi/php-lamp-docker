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
