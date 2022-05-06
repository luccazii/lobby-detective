import express from "express";
import emitGameServerUpdate from "./websocketActions/GameServersWebsocketActions.js";


/**
 * uses socket.io instance
 *
 * @returns {Router}
 */
const getRouter = (socket) =>
{
    const router = express.Router();
    router.get('/', (req, res) => res.send('Websocket Service is running.'));

    router.post('/game-server/emit', (req, res) => {
        const socketRoom = `${req.body.ip}:${req.body.port}`;
        emitGameServerUpdate(socket, socketRoom, req.body.gameServerData);
    });

    return router;
}

export default getRouter;