import Gamedig from 'gamedig';

const fetchServerInfo = async (req, res) => {
    return await Gamedig.query({
        type: req.params.gameType,
        host: req.params.ip,
        port: req.params.port,
    }).then(
        serverData => res.send(serverData)
    );
}

export default fetchServerInfo;