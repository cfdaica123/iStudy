### source
```
How to fix when encountering:
SQLSTATE[HY000] [1130] Host 'host_report_error' is not allowed to connect to this MySQL server (SQL: select * from information_schema.tables where table_schema = travel and table_name = migrations and table_type = 'BASE TABLE')
```


```
CREATE USER 'your_user_name'@'host_report_error' IDENTIFIED BY 'your_password';

GRANT ALL PRIVILEGES ON *.* TO 'root'@'host_report_error' WITH GRANT OPTION;

FLUSH PRIVILEGES;
```