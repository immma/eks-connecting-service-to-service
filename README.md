# EKS-connecting-service-to-service
EKS connecting service to service | php frontend and nodejs backend. The idea is create backend with NodeJS include some json data, and connecting front-end PHP to help understanding communication between service to service. 

--- 

### Login ECR (Elastic Container Registry) using Cloud9

```
aws ecr get-login-password --region ap-southeast-2 | docker login --username AWS --password-stdin 985xxx.dkr.ecr.ap-southeast-2.amazonaws.com/nodeapp
```

### Docker command
Tagging docker image. -t means tag. 

```
docker build -t [image-name:version] . 
```

Checking docker image availability. 
```
docker images
```


Docker tag from local repo to ECR. 
```
docker tag [image-name:v1] 9856xxx.dkr.ecr.ap-southeast-2.amazonaws.com/[image-name:v1]
```

Docker push to ECR. 
```
docker push 9856xxx.dkr.ecr.ap-southeast-2.amazonaws.com/[image-name:v1]
```
---
## Original command from AWS
```
aws ecr get-login-password --region ap-southeast-3 | docker login --username AWS --password-stdin xxx.dkr.ecr.ap-southeast-3.amazonaws.com

docker build -t phpapp .

docker tag phpapp:latest xxx.dkr.ecr.ap-southeast-3.amazonaws.com/phpapp:latest

docker push xxx.dkr.ecr.ap-southeast-3.amazonaws.com/phpapp:latest
```

### Kubernetes Command
Kubernetes pods list

`kubectl get pods`
or 
`kubectl get pods -o wide`

Applying Kubernetes from yaml file. 
```
kubectl apply -f frontend-phpapp.yaml
kubectl apply -f backend-nodeapp.yaml
```

#### Note
If you are using AWS serivce discovery, when you call your application it would http://[subdomain you defined].[domain you defined in private hosted zone]


## Additional command for Kubernetes

Create alias for kubectl
```
alias k='kubectl -n <namespace>'
```

Watch all activity in Kubernetes cluster
```
kubectl get all
watch kubectl get all
```

To watch pods, nodes, and service
```
kubectl get pods
kubectl get nodes
kubectl get svc
```

Execute and delete deployment/service from yaml file
```
kubectl apply -f filename.yaml
kubectl delete -f filename.yaml
```

SSH into container
```
kubectl exec -it phpbased /bin/bash
kubectl exec -it nginxbased sh
```

Delete multiple docker images by name
```
docker rmi $(docker images | grep 'htmlapp')

docker rmi $(docker images | grep 'htmlapp' | awk '{print $3}')

docker rm $(docker ps --all -q)
```

---
# Simple App
To simplify understanding docker process, please go to `simple-app` folder. `simple-app` folder consist of few folders that indicate frontend (`phpapp-frontend`) and backend (`flask-backend`), also additional folder to simplify process (`run-commands`).

### Preparation
Go to run-commands folder and give permission to execute `prepare.sh` with 
```
chmod +x prepare.sh
```

`prepare.sh` executes permission for all bash file including: 
* docker-install.sh
* flask-run.sh
* phpapp-run.sh
* remove-images.sh

### Install docker
Run docker-install.sh file
```
# in case your were not executed prepare.sh previously.
chmod +x docker-install.sh 

./docker-install.sh
```

### PHP App (Frontend)
Go to p`hpapp-frontend` folder and try to update index.php with your own. Inside `index.php` there are few lines indicating JSON fetch from another server, in this case JSON is pulled from `flask app`. 

After update your code, go to `phpapp-run.sh` file and try to edit VERSION and image name on your own. 

> Note: you can move bash file to app directory to simplify the process. Or you need to update the bash file and pointing docker build to app directory.


Edit `phpapp-run.sh`: 
```
VERSION=<YourVersionNumber>

# if you move phpapp-run.sh to phpapp-frontend directory
docker build -t <ImangeName>:$VERSION .

# OR 

docker build -t flaskapp:$VERSION /home/ec2-user/phpapp-frontend

docker run -p 80:80 <ImageName>:$VERSION
```

Run `phpapp-run.sh` with 
```
# in case your were not executed prepare.sh previously.
chmod +x phpapp-run.sh 

./phpapp-run.sh
```

To run **docker in background** you can pass with detach command `-p`
```
docker run -p 80:80 -d phpapp:4
```

### Flask App (Backend)
Flask app is python based application using Flask framework. There are lines of JSON code that you can update. 

After update your code, go to `flask-run.sh` file and try to edit VERSION and image name on your own. 

> Note: you can move bash file to app directory to simplify the process. Or you need to update the bash file and pointing docker build to app directory.

Edit `flask-run.sh`: 
```
VERSION=<YourVersionNumber>

# if you move flask-run.sh to flask-backend directory
docker build -t <ImangeName>:$VERSION .

# OR 

docker build -t flaskapp:$VERSION /home/ec2-user/flask-backend

docker run -p 5000:5000 <ImangeName>:$VERSION
```

Run `flask-run.sh` with 
```
# in case your were not executed prepare.sh previously.
chmod +x flask-run.sh 

./flask-run.sh
```

To run **docker in background** you can pass with detach command `-p`
```
docker run -p 80:80 -d flaskapp:4
```

### Remove multiple images
You may have multiple images due to multiple builds. Go to `remove-images.sh` and edit the `grep` section with your image name. 

Edit `remove-images.sh`:
```
docker rmi $(docker images | grep '<YourImageName>' | awk '{print $3}') -f
```
```
# in case your were not executed prepare.sh previously.
chmod +x remove-images.sh 

./remove-images.sh
```

### Docker remove all process
```
docker rm $(docker ps -a -q)

docker container prune
```