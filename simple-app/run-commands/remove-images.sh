docker rmi $(docker images | grep 'phpapp' | awk '{print $3}') -f