import mysql.connector
from mysql.connector import Error

try:
    print("Database & Table Generation Start....")
    connection = mysql.connector.connect(host='localhost',
                                        user='testuser',
                                        password='12345')
    if connection.is_connected():
        db_Info = connection.get_server_info()
        print("Connected to MySQL Server version ", db_Info)

    print("Create deploy database...")

    print("Create package table...")


except Error as e:
        print("Error while connecting to MySQL", e)
