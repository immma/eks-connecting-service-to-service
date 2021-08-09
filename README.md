# EKS-connecting-service-to-service
EKS connecting service to service | php frontend and nodejs backend. The idea is create backend with NodeJS include some json data, and connecting front-end PHP to help understanding communication between service to service. 

--- 

### Login ECR (Elastic Container Registry) using Cloud9

`aws ecr get-login-password --region ap-southeast-2 | docker login --username AWS --password-stdin 985xxx.dkr.ecr.ap-southeast-2.amazonaws.com/nodeapp
`



### Docker command
Tagging docker image. -t means tag. 

`docker build -t [image-name:version] . `


Checking docker image availability. 

`
docker images
`



Docker tag from local repo to ECR. 

`docker tag [image-name:v1] 9856xxx.dkr.ecr.ap-southeast-2.amazonaws.com/[image-name:v1]`



Docker push to ECR. 

`docker push 9856xxx.dkr.ecr.ap-southeast-2.amazonaws.com/[image-name:v1]`

### Kubernetes Command
Kubernetes pods list

`kubectl get pods`
or 
`kubectl get pods -o wide`

Applying Kubernetes from yaml file. 

`kubectl apply -f frontend-jupiter-notebook.yaml`
`kubectl apply -f backend-jupiter-notebook.yaml`

#### Note
If you are using AWS serivce discovery, when you call your application it would http://[subdomain you defined].[domain you defined in private hosted zone]

---

# New Version
This section would associate with Istio. Install Istioctl command on your machine.  

On Windows: 
Download istio from Github and set your environment variables. 

On Linux (I'm using Amazon Linux 2): 
Download from https://github.com/istio/istio/releases/  
Dowload istio with 
`wget` or

```
curl -L https://istio.io/downloadIstio | ISTIO_VERSION=1.9.7 TARGET_ARCH=x86_64 sh -

mv istio-1.9.7/bin/istioctl /usr/local/bin/

chmod +x /usr/local/bin/istioctl
```

Install Istio in your cluster: 
```
istioctl x precheck

istioctl profile list

#sample result: 
    demo
    default
    ...

istioctl install --set profile=default

kubectl get ns
#istio-system

kubectl get po -n istio-system
```

### Additional: Install bash completion
To simplify your code on command line, you can install bash completion for kubectl based on this post. 
https://kubernetes.io/docs/tasks/tools/included/optional-kubectl-configs-bash-linux/


## Inject Istio in Default Namespace
```
#istio-injection
kubectl label namespace default istio-injection=enabled

#istio injection check label namespace
kubectl get ns -L istio-injection

#check pods in namespace default
kubectl get po

#sample response:
    pod1 1/1
    pod2 1/1

#remove all pod that is not injected with istio
kubectl delete po --all

#check istio injected pods
kubectl get po

#sample response: 
    pod1 2/2
    pod2 2/2
```

### Check Istio ingress-gateway
```
kubectl get svc -n istio-system

#sample response:
NAME                   TYPE           CLUSTER-IP       EXTERNAL-IP      PORT(S)                                                                      AGE
grafana                ClusterIP      10.96.228.48     <none>           3000/TCP                                                                     24h
istio-egressgateway    ClusterIP      10.96.23.58      <none>           80/TCP,443/TCP,15443/TCP                                                     34h
istio-ingressgateway   LoadBalancer   10.103.194.217   10.103.194.217   15021:30989/TCP,80:30662/TCP,443:31920/TCP,31400:30296/TCP,15443:32682/TCP   34h
istiod                 ClusterIP      10.98.136.106    <none>           15010/TCP,15012/TCP,443/TCP,15014/TCP                                        34h
kiali                  ClusterIP      10.109.143.183   <none>           20001/TCP,9090/TCP                                                           33h
prometheus             ClusterIP      10.108.238.233   <none>           9090/TCP              
```

Copy EXTERNAL-IP of istio-ingressgateway
```
sudo vim /etc/hosts

#add
10.103.194.217 ardih.id
```
### Connect with Istio ingress-gateway
```
kubectl apply -f ingress\gateway.yaml

kubectl apply -f ingress\phpapp.yaml
```

### Create v2 nodeapp
Prerequisite:  
Open your `config-yaml\nodeapp-v2.yaml` then change image. Because the same image tag could not be pulled. Alternatively, you could build another image with another tag.  
For example `[yourimagename]:v2.0`

Build new image. Change your directory of nodeapp.
```
docker build . -t ardih/nodeapp:v2.0
```

Change your yaml file `config-yaml\nodeapp.yaml`

```
spec:
      containers:
      - name: master
        image: ardih/nodeapp:v2.1 # change this image with your new tag
        imagePullPolicy: Never
        ports:
        - containerPort: 3000
```

Apply new config file v2
```
kubectl apply -f config-yaml\nodeapp-v2.yaml
```

Change directory to `source\nodeapp-v3`
```
docker build . -t ardih/nodeapp:v3.0
```

Apply new config file v3
```
kubectl apply -f config-yaml\nodeapp-v3.yaml
```

Apply destination rule
```
kubectl apply -f ingress\nodeapp-destination-rule.yaml
```

Apply virtual `nodeapp` virtual service
```
kubectl apply -f ingress\nodeapp-virtual.yaml
```

Update route `nodeapp` virtual service with `v2, v3`
```
kubectl apply -f config-yaml\nodeapp-v2.yaml
```

### Install Prometheus, Kiali, Grafana
```
kubectl apply -f istio-1.9.7/samples/addons/prometheus.yaml
kubectl apply -f istio-1.9.7/samples/addons/grafana.yaml
kubectl apply -f istio-1.9.7/samples/addons/kiali.yaml
```

Check istio-system service  
```
kubectl get svc -n istio-system

#sample response:
NAME                   TYPE           CLUSTER-IP       EXTERNAL-IP      PORT(S)                                                                      AGE
grafana                ClusterIP      10.96.228.48     <none>           3000/TCP                                                                     24h
istio-egressgateway    ClusterIP      10.96.23.58      <none>           80/TCP,443/TCP,15443/TCP                                                     34h
istio-ingressgateway   LoadBalancer   10.103.194.217   10.103.194.217   15021:30989/TCP,80:30662/TCP,443:31920/TCP,31400:30296/TCP,15443:32682/TCP   34h
istiod                 ClusterIP      10.98.136.106    <none>           15010/TCP,15012/TCP,443/TCP,15014/TCP                                        34h
kiali                  ClusterIP      10.109.143.183   <none>           20001/TCP,9090/TCP                                                           33h
prometheus             ClusterIP      10.108.238.233   <none>           9090/TCP    
```

Test Kiali in browser. You can copy the `CLUSTER-IP` and `PORT` from get svc result.
`http://10.109.143.183:20001`

Test Grafana in browser. You can copy the `CLUSTER-IP` and `PORT` from get svc result.
`http://10.96.228.48:3000`

