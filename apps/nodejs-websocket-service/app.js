import express from 'express';
import getRouter from './src/routes.js';
import {Server} from "socket.io";
import http from "http";
import GameServersWebsocketActions from "./src/websocketActions/GameServersWebsocketActions";
import emitGameServerUpdate from "./src/websocketActions/GameServersWebsocketActions";

const app = express();
const port = 3001;

const server = http.createServer(app);
const io = new Server(server);

io.on('connection', (socket) => {
    socket.on("todo:create", emitGameServerUpdate); //todo keep from here
    // app.use('/', getRouter(socket));
});

app.get('/', (req, res) => res.send('oi'))

app.listen(port, () =>
    console.log(`Websocket service (socket.io) started running on port: ${port}`)
)