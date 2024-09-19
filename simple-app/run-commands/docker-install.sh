#!/bin/bash
yum update -y

sudo yum install -y docker
sudo service docker start
sudo usermod -aG docker ec2-user
sudo chmod 666 /var/run/docker.sock
sudo service docker restart