<!DOCTYPE html>
<html>

<head>
    <title>Game Over</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .game-over {
            font-size: 4em;
            margin-bottom: 20px;
        }
        .button {
            font-size: 1.5em;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="nivel1.php" method="POST">
        <div class="game-over">Game Over</div>
        <button class="button">TRY AGAIN</button>
    </form>
</body>
</html>