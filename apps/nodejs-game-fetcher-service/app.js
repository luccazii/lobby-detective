import express from 'express';
import routes from './src/routes.js';

const app = express();
const port = 3000;

app.use('/', routes);

app.listen(port, () => {
    console.log(`Game Fetcher service started running on port: ${port}`)
})