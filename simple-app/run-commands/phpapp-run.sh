VERSION=1

docker build -t phpapp:$VERSION .

docker run -p 80:80 phpapp:$VERSION