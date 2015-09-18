# CJAN.org web site

WIP

http://www.techigniter.in/tutorials/query-logging-in-laravel-5/

## Development environment

### Running the test DB

docker run -p 3306:3306 --name cjan-mysql -e MYSQL_ROOT_PASSWORD=admin -e MYSQL_DATABASE=cjan -d mysql:5.5

docker start cjan-mysql

### Running the test ElasticSearch

docker run -p 9200:9200 --name cjan-es -d elasticsearch -Des.logger.level=DEBUG

docker start cjan-es

And to delete the index:

curl -XDELETE 'http://localhost:9200/cjan_index/'