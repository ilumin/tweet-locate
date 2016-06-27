# Tweet locate 

## Page 

- Main page ~ display search box and map  
  ROUTE: /  
  METHOD: get  
- Search request  
  ROUTE: /search  
  METHOD: get  

## Ref 

- Twitter Search API  
  [https://dev.twitter.com/rest/public/search]  
  [https://dev.twitter.com/rest/reference/get/search/tweets]  
  Resource URL: [https://api.twitter.com/1.1/search/tweets.json]  
  Params:  
    - geocode: latitude,longitude,radius
    - count: number of tweets to return per page  

## Require

- Docker [https://www.docker.com/]

## Run

```
  # start docker container 
  # it will use port 80 and 3306 (should be available)
  $ docker-compose up -d 
  
  # install php package
  $ docker exec -it twl-php-service composer install 
  
  # open
  $ open http://localhost/
```
