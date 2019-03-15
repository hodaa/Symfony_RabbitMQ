
## API Endpoints

    * `Post http://127.0.0.1:8000/produceEntity`
        * Insert Random data
        
    * `GET http://127.0.0.1:8000/readEntity`
        * Read Data.
        
    * `POST http://127.0.0.1:8000/produceEntity`
        * Param {id:integer}
   
            
## Fetch data from Queue
  `php bin/console  rabbitmq:consumer -m 10 entity_create`          
 
## Tools Used

 - PHP 7.1.3
 - MySQL
 - Composer 
 - Doctrine
 - Symfony
 - RabbitMq
   
## Postman collection
https://www.getpostman.com/collections/b69fd89d79d313c0cfc6
