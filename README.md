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
