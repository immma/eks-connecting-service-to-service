const http = require('http');
const mysql = require('mysql')

const hostname = 'localhost'; // change this to 0.0.0.0 for production
const port = 8080;

var db = mysql.createConnection({
  host: 'ardih-xxx.cluster-ro-xxx.ap-southeast-3.rds.amazonaws.com',
  user: 'admin',
  password: 'xxx#',
  database: 'xxx'
})

const sql = "SELECT * FROM customer1 limit 10";

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader("Access-Control-Allow-Headers", "*");
  res.setHeader('Access-Control-Allow-Methods', "*");
  res.setHeader('Access-Control-Request-Method', '*');
  res.setHeader('Content-Type', 'application/json');

  db.query(sql, function (err, result) {
    if (err) throw err;
    
    res.end(JSON.stringify(result));
  });
});

server.listen(port, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
