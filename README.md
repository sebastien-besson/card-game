# Card Game

Simulation of a battle game (the card game) in PHP object without framework or library and to be launched in command line.

### Rules:

* 52 cards, we simplify by simply using values from 1 to 52
* the cards are shuffled and distributed to 2 players
* each player turns over the first card of his deck, the player with the highest card scores a point
* the game continues until there are no more cards to play
* the name of the winner is displayed


### Launching the game with docker

```
docker run --rm -v $(pwd):/app -w /app php:cli php index.php
```


The default total number of the cards is 52.

But you can specify the total number of cards to be played with the parameter -n

```
docker run --rm -v $(pwd):/app -w /app php:cli php index.php -n58
```
