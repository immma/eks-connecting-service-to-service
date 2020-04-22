# EKS-connecting-service-to-service
EKS connecting service to service | php frontend and nodejs backend. 

--- 

### Login ECR using Cloud9

`aws ecr get-login-password --region ap-southeast-2 | docker login --username AWS --password-stdin 985656090346.dkr.ecr.ap-southeast-2.amazonaws.com/nodeapp
`

### Docker command
Tagging docker image. -t means tag. 
`docker build -t [image-name:version] . `

Checking docker image availability. 
`
docker images
`

Docker tag from local repo to ECR. 
`docker tag [image-name:v1] 985656090346.dkr.ecr.ap-southeast-2.amazonaws.com/[image-name:v1]`

Docker push to ECR. 
`docker push 985656090346.dkr.ecr.ap-southeast-2.amazonaws.com/[image-name:v1]`
