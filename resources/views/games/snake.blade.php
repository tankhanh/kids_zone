<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" , content="width=device-width, initial-scale=1.0">
    <title>Snake</title>
    <link rel="stylesheet" href="snake.css">
    <style>
    body {
        font-family: 'Courier New', Courier, monospace;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        display: flex;
        align-items: center;
    }

    #score {
        margin-left: 10px;
    }

    #game-over-modal {
        display: none;
        background: rgba(0, 0, 0, 0.6);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
    }

    #game-over-box {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
    }

    #game-over-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .goback {
        position: absolute;
        top: 40px;
        left: 10px;
        font-size: 1.5em;
        color: black;
        text-decoration: none;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 10px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    .goback:hover {
        background-color: #eee;
        /* Màu nền khi di chuột qua */
    }
    </style>
</head>

<body>
    <a href="{{ asset('/games')}}" class="goback">
        < Back</a>
            <h1>
                Snake
                Score: <span id="score">0</span>
            </h1>
            <canvas id="board"></canvas>
            <div id="game-over-modal">
                <div id="game-over-box">
                    <p>Game Over! Bạn có muốn bắt đầu lại?</p>
                    <div id="game-over-buttons">
                        <button onclick="restartGame()">Có</button>
                        <button onclick="returnToGames()">Không</button>
                    </div>
                </div>
            </div>
</body>

<script>
var blockSize = 25;
var rows = 20;
var cols = 20;
var board;
var context;
var snakeX = blockSize * 5;
var snakeY = blockSize * 5;
var velocityX = 0;
var velocityY = 0;
var snakeBody = [];
var foodX;
var foodY;
var score = 0;
var gameOver = false;
var gameoverModal = document.getElementById("game-over-modal");

window.onload = function() {
    board = document.getElementById("board");
    board.height = rows * blockSize;
    board.width = cols * blockSize;
    context = board.getContext("2d");

    placeFood();
    document.addEventListener("keyup", changeDirection);
    setInterval(update, 1000 / 10);
};

function update() {
    if (gameOver) {
        return;
    }

    context.fillStyle = "black";
    context.fillRect(0, 0, board.width, board.height);

    context.fillStyle = "red";
    context.fillRect(foodX, foodY, blockSize, blockSize);

    if (snakeX == foodX && snakeY == foodY) {
        snakeBody.push([foodX, foodY]);
        placeFood();
        score++;
        document.getElementById("score").innerText = score;
    }

    for (let i = snakeBody.length - 1; i > 0; i--) {
        snakeBody[i] = snakeBody[i - 1];
    }
    if (snakeBody.length) {
        snakeBody[0] = [snakeX, snakeY];
    }

    context.fillStyle = "lime";
    snakeX += velocityX * blockSize;
    snakeY += velocityY * blockSize;
    context.fillRect(snakeX, snakeY, blockSize, blockSize);
    for (let i = 0; i < snakeBody.length; i++) {
        context.fillRect(snakeBody[i][0], snakeBody[i][1], blockSize, blockSize);
    }

    if (snakeX < 0 || snakeX > cols * blockSize || snakeY < 0 || snakeY > rows * blockSize) {
        endGame();
    }

    for (let i = 0; i < snakeBody.length; i++) {
        if (snakeX == snakeBody[i][0] && snakeY == snakeBody[i][1]) {
            endGame();
        }
    }
}

function changeDirection(e) {
    if (e.code == "ArrowUp" && velocityY != 1) {
        velocityX = 0;
        velocityY = -1;
    } else if (e.code == "ArrowDown" && velocityY != -1) {
        velocityX = 0;
        velocityY = 1;
    } else if (e.code == "ArrowLeft" && velocityX != 1) {
        velocityX = -1;
        velocityY = 0;
    } else if (e.code == "ArrowRight" && velocityX != -1) {
        velocityX = 1;
        velocityY = 0;
    }
}

function placeFood() {
    foodX = Math.floor(Math.random() * cols) * blockSize;
    foodY = Math.floor(Math.random() * rows) * blockSize;
}

function endGame() {
    gameOver = true;
    gameoverModal.style.display = "block";
}

function restartGame() {
    gameOver = false;
    gameoverModal.style.display = "none";
    snakeX = blockSize * 5;
    snakeY = blockSize * 5;
    velocityX = 0;
    velocityY = 0;
    snakeBody = [];
    score = 0;
    document.getElementById("score").innerText = score;
    placeFood();
}

function returnToGames() {
    location.href = "/games"; // Điều hướng về trang /games
}
</script>

</html>