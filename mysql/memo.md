- コンテナに入ってデータベースをダンプする
```
docker exec -it <コンテナ名> /bin/bash
mysqldump -u root -ppass $dbname > /tmp/backup.sql
```
- コンテナからダンプファイルをコピーする
```
docker cp <コンテナ名>:/tmp/backup.sql
```

- コンテナに入ってデータベースをリストアする
```
docker exec -it <コンテナ名> /bin/bash
mysql -u root -ppass
create database shop;
mysql -u root -ppass $dbname < backup.sql
use shop;
show tables;
```
