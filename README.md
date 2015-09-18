
http://www.techigniter.in/tutorials/query-logging-in-laravel-5/

docker run -p 3306:3306 --name cjan-mysql -e MYSQL_ROOT_PASSWORD=admin -e MYSQL_DATABASE=cjan -d mysql:5.5

Later

docker start mysql

docker run -p 9200:9200 --name cjan-es -d elasticsearch