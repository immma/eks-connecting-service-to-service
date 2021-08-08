const http = require('http');

const hostname = '0.0.0.0';
const port = process.env.PORT;

const server = http.createServer((req, res) => {

  const headers = {
    "Access-Control-Allow-Origin": "*",
    "Access-Control-Allow-Methods": "OPTIONS, POST, GET",
  };

  res.statusCode = 200;
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader("Access-Control-Allow-Headers", "*");
  res.setHeader('Access-Control-Allow-Methods', "GET, OPTIONS, POST");
  res.setHeader('Access-Control-Request-Method', '*');

  res.setHeader('Content-Type', 'application/json');
  
  var datas = require('./nodeappdata/data.json');

  res.end(JSON.stringify(datas));
});

server.listen(port, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
