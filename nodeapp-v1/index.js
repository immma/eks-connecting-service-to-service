const http = require('http');

const hostname = '127.0.0.1';
const port = 8080;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader("Access-Control-Allow-Headers", "*");
  res.setHeader('Access-Control-Allow-Methods', "*");
  res.setHeader('Access-Control-Request-Method', '*');
  res.setHeader('Content-Type', 'application/json');

  db.query(sql, function (err, result) {
    if (err) throw err;
    // const jsonData = JSON.stringify(result);
    // console.log(jsonData);
    // res.end(JSON.stringify(result, null, 2));
    // return result;
  });
});

server.listen(port, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
