#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS manage_petro;
    GRANT ALL PRIVILEGES ON \`manage_petro%\`.* TO '$MYSQL_USER'@'%';
    CREATE DATABASE IF NOT EXISTS manage_petro_test;
        GRANT ALL PRIVILEGES ON \`manage_petro_test%\`.* TO '$MYSQL_USER'@'%';
EOSQL
