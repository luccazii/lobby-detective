import express from "express";
import fetchServerInfo from "./fetchServerInfo.js";

const router = express.Router();

// define the home page route
router.get('/', (req, res) => res.send('Game Fetcher Service is running.'));

router.get('/fetch/:gameType/:ip/:port', fetchServerInfo);

export default router;