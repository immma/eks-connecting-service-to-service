VERSION=1

docker build -t flaskmysql:$VERSION .

docker run -p 5000:5000 flaskmysql:$VERSION