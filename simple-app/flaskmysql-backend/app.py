from flask import Flask, jsonify, render_template
from flask_mysqldb import MySQL

app = Flask(__name__)

# Configure MySQL connection
app.config['MYSQL_HOST'] = '16.78.151.155'  # Replace with your MySQL server host
app.config['MYSQL_USER'] = 'root'       # Replace with your MySQL username
app.config['MYSQL_PASSWORD'] = 'secret111'  # Replace with your MySQL password
app.config['MYSQL_DB'] = 'simpledb'  # Replace with your MySQL database name

# Initialize MySQL
mysql = MySQL(app)

@app.route('/')
def index():
    # Create a cursor object
    cursor = mysql.connection.cursor()

    # Execute a SELECT query
    cursor.execute("SELECT * FROM userlist")  # Replace with your table name

    # Fetch all rows from the result
    rows = cursor.fetchall()
    column_names = [i[0] for i in cursor.description]
    results = [dict(zip(column_names, row)) for row in rows]
    
    # Close the cursor
    cursor.close()

    # You can return results as JSON or render a template
    return jsonify(results)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
