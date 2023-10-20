# AWS Codebuild - ECR
Use Codebuild to build the docker image and push to ECR. 
If not just leave it. 

Sample code: 
```
version: 0.2
phases:
  install:
    commands:
    # use aws cli and upgrade using pip
      - pip3 install -q awscli --upgrade --user
      - yum -q install -y jq
  pre_build:
    commands:
    # login into amazon ECR
      - echo Logging in to Amazon ECR...
      - aws ecr get-login-password --region ap-southeast-3 | docker login --username AWS --password-stdin xxx.dkr.ecr.ap-southeast-3.amazonaws.com
  build:
    commands:
      - echo Build started on `date`
      - echo Building the Docker image...
      - docker build -t phpapp .
      - docker tag phpapp:latest xxx.dkr.ecr.ap-southeast-3.amazonaws.com/phpapp:latest
  post_build:
    commands:
      - echo Build completed on `date`
      - echo Pushing the Docker images...
      - docker push xxx.dkr.ecr.ap-southeast-3.amazonaws.com/phpapp:latest
      - echo Pushed on `date`
```