const emitGameServerUpdate = (room, gameServerData) => {
    io.on("connection", socket => {
        socket.to(room).emit({gameServerData: gameServerData});
    });
}

export default emitGameServerUpdate