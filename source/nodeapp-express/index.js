const http = require('http');
const express = require('express')
const cors = require('cors')

const hostname = '0.0.0.0';
const port = process.env.PORT;

const app = express()

var corsMiddleware = function(req, res, next) {
  res.header('Access-Control-Allow-Origin', 'http://ardih.id'); //replace localhost with actual host
  res.header('Access-Control-Allow-Methods', 'OPTIONS, GET, PUT, PATCH, POST, DELETE');
  res.header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization');

  next();
}

app.use(corsMiddleware);

app.get('/', (req, res, next) => {


  var datas = [
    {
      "userId": 1,
      "id": 1,
      "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
      "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
    },
    {
      "userId": 1,
      "id": 2,
      "title": "qui est esse",
      "body": "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"
    },
    {
      "userId": 1,
      "id": 3,
      "title": "ea molestias quasi exercitationem repellat qui ipsa sit aut",
      "body": "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut"
    }
  ];

  res.json(datas)
  res.sendStatus(200)
})

app.listen(port, () => {
  console.log(`App express listening at http://${hostname}:${port}`)
})

// const server = http.createServer((req, res) => {

//   const headers = {
//     "Access-Control-Allow-Origin": "*",
//     "Access-Control-Allow-Methods": "OPTIONS, POST, GET",
//   };

//   res.statusCode = 200;
//   res.setHeader("Access-Control-Allow-Origin", "http://ardih.id");
//   res.setHeader("Access-Control-Allow-Headers", "*");
//   res.setHeader('Access-Control-Allow-Methods', "OPTIONS, GET");
//   res.setHeader('Access-Control-Request-Method', '*');

//   res.setHeader('Content-Type', 'application/json');

//   var datas = [
//     {
//       "userId": 1,
//       "id": 1,
//       "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
//       "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
//     },
//     {
//       "userId": 1,
//       "id": 2,
//       "title": "qui est esse",
//       "body": "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"
//     },
//     {
//       "userId": 1,
//       "id": 3,
//       "title": "ea molestias quasi exercitationem repellat qui ipsa sit aut",
//       "body": "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut"
//     }
//   ];

//   res.end(JSON.stringify(datas));
// });

// server.listen(port, () => {
//   console.log(`Server testport.v2.0 running at http://${hostname}:${port}/`);
// });


