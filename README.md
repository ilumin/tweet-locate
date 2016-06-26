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
