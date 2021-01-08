# php-learning
Examples and lessons for beginning object oriented programming


# MYSQL stuff


#### Mysql setup
##### Windows setup
1. Install mysql 5.6.49 (64 bit) from the list [here](https://downloads.mysql.com/archives/installer)
1. Download the bottom file ~300Mb
1. Choose custom install
1. Install the required C++ redist if you are missing any
    ```
    - Install mysql server
    - workbench
    - documentation
    ```
1. Choose development computer in the setup
1. Tcp ip port 3306
1. When you get to the “start a windows service” step add Server with no spaces to the end of the service name, something like MYSQL56Server
1. Hold the start button on the keyboard and press the letter `r`
1. Type `services.msc`
1. Press the `enter` key
1. Ensure mysql server running `MYSQL56Server`
1. Complete the installation
1. Attempt to connect via workbench


## Queries Cheat-Sheet


#### USE
Selects a default database to run queries against.

```
USE {{databaseName}};
```

#### CREATE
Creates a schema (database) or table

```
CREATE {{databaseName}};
```

#### DROP
Deletes/removes a database and tables or just a specified table

```
DROP {{databaseName}};
```

#### SELECT

```
SELECT * FROM {{databaseName}};
```
e.x `SELECT * FROM vehicles;`

- clauses
LIMIT
`SELECT * FROM animals LIMIT 5;`

#### INSERT INTO
{voulunteer}
Inserts a row into the specified table. By default will require all columns to be provided. If the table has an auto-increment column, provide null for the auto-increment column in order to use the mysql generated number.

```
INSERT INTO {{tableName}} VALUES ('firstValue', 2, 'someEmail@example.com', 'etc...');
```


#### TRUNCATE
{voulunteer}