VERSION=1

docker build -t flaskapp:$VERSION .

docker run -p 5000:5000 flaskapp:$VERSION