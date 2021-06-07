# Hello web : the simpliest web application for docker !

## build the application

In the directory ``php-helloworld-docker``

```
docker build . -t php-test
```
Will build an image tagged ``php-test``.

You can list your images with

```
docker image ls .
```

You should have something like this :
```
REPOSITORY                 TAG               IMAGE ID       CREATED          SIZE
php-test                   latest            be8436ad762b   57 seconds ago   368MB
```


## Run the application

```
docker run -p 8880:80 --name my_container -d php-test 
```

Open your browser on : http://localhost:8880/

## build and run with docker-compose

```
docker-compose up -d
```