import mysql.connector

def insert_into_games(id, category, collection, cover, created_at, first_release_date, name, slug, summary, storyline, updated_at, url, checksum):
    try:
        connection = mysql.connector.connect(host='localhost',
                                             database='waitplaying',
                                             user='root',
                                             password='')
        cursor = connection.cursor()
        mySql_insert_query = """INSERT INTO Games (id, category, collection, cover, created_at, first_release_date, name, slug, summary, storyline, updated_at, url, checksum) 
                                VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) """

        record = (id, category, collection, cover, created_at, first_release_date, name, slug, summary, storyline, updated_at, url, checksum)
        cursor.execute(mySql_insert_query, record)
        connection.commit()
        print(id, name, 'Successfully added')
        return True

    except mysql.connector.Error as error:
        print("Failed to insert into MySQL table {}".format(error))
        return False
    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            # print("MySQL connection is closed")

def insert_into_platforms(id, abbreviation, alternative_name, platform_logo, platform_family, category, created_at, generation, name, slug, summary, updated_at, url, checksum):
    try:
        connection = mysql.connector.connect(host='localhost',
                                             database='waitplaying',
                                             user='root',
                                             password='')
        cursor = connection.cursor()
        mySql_insert_query = """INSERT INTO Platforms (id, abbreviation, alternative_name, platform_logo, platform_family, category, created_at, generation, name, slug, summary, updated_at, url, checksum)
                                VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) """

        record = (id, abbreviation, alternative_name, platform_logo, platform_family, category, created_at, generation, name, slug, summary, updated_at, url, checksum)
        cursor.execute(mySql_insert_query, record)
        connection.commit()
        print(id, name, 'Successfully added')
        return True

    except mysql.connector.Error as error:
        print("Failed to insert into MySQL table {}".format(error))
        return False
    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            # print("MySQL connection is closed")

def insert_into_covers(id, alpha_channel, animated, game, height, width, image_id, url, checksum):
    try:
        connection = mysql.connector.connect(host='localhost',
                                             database='waitplaying',
                                             user='root',
                                             password='')
        cursor = connection.cursor()
        mySql_insert_query = """INSERT INTO Covers (id, alpha_channel, animated, game, height, width, image_id, url, checksum)
                                VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s) """

        record = (id, alpha_channel, animated, game, height, width, image_id, url, checksum)
        cursor.execute(mySql_insert_query, record)
        connection.commit()
        print(id, url, 'Successfully added')
        return True

    except mysql.connector.Error as error:
        print("Failed to insert into MySQL table {}".format(error))
        return False
    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            # print("MySQL connection is closed")


# insert_varibles_into_table(2, 'Area 51M', 6999, '2019-04-14')
# insert_varibles_into_table(3, 'MacBook Pro', 2499, '2019-06-20')