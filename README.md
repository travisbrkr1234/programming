# php-learning
Examples and lessons for beginning object oriented programming


# MYSQL stuff


#### Mysql setup

##### Windows setup
1. Install mysql 5.6.49 (64 bit) from the list [here](https://downloads.mysql.com/archives/installer)
1. Download the bottom file ~300Mb
1. Choose custom install
1. Install the required C++ redist if you are missing any
1. Drilldown using the plus signs and install the following
    ```
    - Install mysql server
    - workbench
    - documentation
    ```
1. Choose development computer in the setup
1. Tcp ip port 3306
1. Leave Open Windows Firewall port for network access checked
1. Type in "password" all lowercase for MySQL Root Password
1. When you get to the “start a windows service” step add Server with no spaces to the end of the service name, something like MYSQL56Server
1. Click Next
1. Click Execute
1. Click Next
1. Click Finish
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




Q: Data type: date and time
A: Date is typically mm/dd/yyyy where datetime is mm/dd/yyyy HH:MM:sss

Q: When to Null or Non Null?
A: You will use not null when wanting to prevent a null value from being inserted into a column i.e: requiring a value. You will use null when either a default value is not suitable or it makes sense to have a null in the column i.e: if a user of a system has no allergies to a given prescription, null would make sense.

Q: What is Primary Key and why/when should it be used?
A: Primary key is a unique identifier for the record. For example a cars vin number. In relational databases, it is good to have a primary key to identify records that may change. For example, you’d have a user record with first/last names that might change. In this situation, if you did not use a primary key, how would you know that you are updating/querying the correct user?

Q: When do you use backtick ` versus single quote '
A: I would look at [this answer](https://stackoverflow.com/questions/11321491/when-to-use-single-quotes-double-quotes-and-backticks-in-mysql) from Stack overflow as it is very thorough 

Q: What is the difference between URI and URL?
A: We will discuss this but please read [this](https://stackoverflow.com/questions/176264/what-is-the-difference-between-a-uri-a-url-and-a-urn) as it references the IETF RFC as well as gives a thorough explanation. In our sessions, I will recognize either (uri/url) as OK to use, in the real world engineers use them interchangeably sometimes.

#### Nosko 2
Notes for the CMD work we did
mkdir  -  make directory
move  -  move file
cd  -  change directory
del  -  delete 
dir  -  directory
../  -  with 'cd ../' goes back/up a directory
cls  -  Clears the terminal (command prompt)