<?php
require_once('view/top.php');
?>

<link rel="stylesheet" href="style/leaderboard.css">

<div id="gameContainer">
        <div id="scoreDiv">
            <form name="form">
                <input type="text" name="username" placeholder="Player name">
                <button id="submitScore">Submit</button>
                <button id="menubtn">Menu</button> 
                <button class="playGame">Play</button>
            </form>
        </div>
        <div id="gameMenu">
            <p>Welcome to Breakout!</p>
            <button class="playGame">Play</button>
            <button id="leaderboard">Leaderboard</button>
        </div>
        <canvas id="myCanvas" width="320" height="400" style="border:1px solid black"></canvas>
    </div>

<script>

$(document).ready(function(){

    var score;
    var menu = document.getElementById("gameMenu");
    var divScore = document.getElementById("scoreDiv");


    $(".playGame").click(function(event){
        $('#scoreDiv').hide();
        gameStart();
    });

    $("#menubtn").click(function(event){
        displayMenu();
    });

    $("#submitScore").click(function(event){
        sendInfo();
    })

function displayMenu(){
    menu.style.visibility = "initial";
    divScore.style.visibility = "hidden";
}

function gameStart() {
    
    menu.style.visibility = "hidden";

    score = 0;

    var canvas = document.getElementById("myCanvas");
    var context = canvas.getContext("2d");
    //ball attributes
    var x = canvas.width/2; //set start ball x-axis to middle
    var y = canvas.height-30; //set start ball y-axis 30px above bottom edge
    var dx = 4; //movement along x per frame
    var dy = -4; //movement along y per frame
    var ballRadius = 8;
    var color = randomColor();
    var velocity = Math.sqrt(Math.pow(dy - y) + Math.pow(dx - x));
    
    var paddleWidth = 100;
    var paddleHeight = 10;
    var paddleX = (canvas.width-paddleWidth)/2; //starting point on x-axis
    
    var rightPress = false;
    var leftPress = false;
    
    var brickRowCount = 7;
    var brickColumnCount = 9;
    var brickWidth = 25;
    var brickHeight = 20;
    var brickPadding = 5; //space between bricks
    var brickOffsetTop = 30;
    var brickOffsetLeft = 30;

    // draw canvas background
    function background() {
        context.beginPath();
        context.rect(0, 0, canvas.width, canvas.height);
        context.fillStyle = "#000000";
        context.fill();
        context.closePath();
    }

    // creating an empty array to store the bricks
    var bricks = [];
    for(var c=0; c<brickColumnCount; c++) {
        bricks[c] = [];
        for(var r=0; r<brickRowCount; r++) {
            bricks[c][r] = {x: 0, y: 0, status: 1} // set status attribut to 1
        }
    }
    
    // draw bricks in each matrix element
    function drawBricks() {
        var img = new Image();
        img.src = "img/strawberry.png";

        for(var c=0; c<brickColumnCount; c++) {
            for(var r=0; r<brickRowCount; r++) {
                if(bricks[c][r].status == 1) { // if status attribute is 1 = draw, if 0 = don't draw
                    var brickX = (c*(brickWidth + brickPadding)) + brickOffsetLeft;
                    var brickY = (r*(brickHeight + brickPadding)) + brickOffsetTop;
                    bricks[c][r].x = brickX;
                    bricks[c][r].y = brickY;
                    context.beginPath();
                    context.drawImage(img, brickX, brickY, brickWidth, brickHeight);
                    context.closePath();
                }
            }
        }
    }

    // random color generator
    function randomColor() {
        var values = '468ACE'.split(''); //stores an array of values
        var color = '#';
        for(var i = 0; i < 6; i++) { //assigns either 4,6,8,A,C,E to each place value of hex color
            color += values[Math.floor(Math.random() * values.length)];
        }
        return color;
    }

    // draw the ball
    function drawBall() {
        context.beginPath();
        context.arc(x, y, ballRadius, 0, Math.PI*2); // x, y, arc radius, start angle, end angle
        context.fillStyle = color; //stores color
        context.fill(); //paints circle
        context.closePath();
    }

    // draw the paddle
    function drawPaddle() {
        context.beginPath();
        context.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
        context.fillStyle = '#ffffff';
        context.fill();
        context.closePath();
    }

    document.addEventListener("keydown", keyDownHandler, false);
    document.addEventListener("keyup", keyUpHandler, false);
    document.addEventListener("mousemove", mouseMoveHandler, false);
    document.addEventListener("touchmove", touchMoveHandler);

    function keyDownHandler(e) {
        if(e.keyCode == 39) {
            rightPress = true;
        } 
        else if(e.keyCode == 37) {
            leftPress = true;
        }
    }

    function keyUpHandler(e) {
        if(e.keyCode == 39) {
            rightPress = false;
        } 
        else if(e.keyCode == 37) {
            leftPress = false;
        }
    }

    function mouseMoveHandler(e) {
        let relativeX = e.clientX - canvas.offsetLeft; //distance b/t left canvas and mouse pointer
        //if pointer is within canvas boundary
        if(relativeX > (paddleWidth/2) && relativeX+(paddleWidth/2) < canvas.width) { 
            paddleX = relativeX - paddleWidth/2;  //movement relative to middle of paddle
        }
    }

    function touchMoveHandler(e) {
        paddleX = e.touches[0].screenX - paddleWidth/2;
    }
    
    // detecting if ball is colliding with brick and setting status to 0 if true
    function collision() {
        for(var c=0; c<brickColumnCount; c++) {
            for(var r=0; r<brickRowCount; r++) {
                let b = bricks[c][r];
                if(b.status == 1) {
                    if(x > b.x - ballRadius && x < b.x + brickWidth + ballRadius && 
                        y > b.y - ballRadius && y < b.y + brickHeight + ballRadius ) {
                            dy = -dy;
                            color = randomColor();
                            b.status = 0;
                            score += 5;
                            if(score/5 == brickRowCount * brickColumnCount) {
                                context.fillText("YOU WIN! YOUR SOCRE IS " + score, 50, 200);
                                $('#scoreDiv').show();
                                throw new Error("This is not an error. Game over!");
                            }
                    }
                }
            }
        }
    }

    function drawScore() {
        context.font = "12px Arial";
        context.fillStyle = "#ffffff";
        context.fillText("Score: " + score, 8, 20); //text coordinates
    }

    // clear canvas and redraw ball
    function draw() {
        context.clearRect(0, 0, canvas.width, canvas.height);
        background();
        drawBricks();
        drawBall();
        drawPaddle();
        drawScore();
        collision();
        if(y + dy < ballRadius) { //ball collision with top screen, change direction and color
            dy = -dy;
            color = randomColor();
        } 
        else if(y + dy > canvas.height-paddleHeight) {  //bounce off paddle
            if(x >= paddleX && x <= paddleX + paddleWidth) { // while within paddle width
                dy = -1.04 * dy;
                if(x < paddleX + paddleWidth/3 || x > paddleX + 2*paddleWidth/3) {
                    dx = -1.03 * dx;
                }
            } 
            else {
                context.fillText("GAME OVER! YOUR SCORE IS: " + score, 50, 200);
                $('#scoreDiv').show();
                throw new Error("This is not an error. Game over!");
            }
        }
        if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) { // ball bounces of left right walls
            dx = -dx;
            color = randomColor();
        }
        if(rightPress && paddleX < canvas.width-paddleWidth) { //contains paddle within right boundary
            paddleX += 5;
        } 
        else if (leftPress && paddleX > 0) {  //contains paddle within left boundary
            paddleX -= 5;
        }
        // movement of ball per frame refresh
        x += dx;
        y += dy;
        requestAnimationFrame(draw);
    }
    draw();
    
} //end of startgame function

    function sendInfo(){
        var username = document.form.username.value;
        if (username.trim() != 0){
            
            $.ajax({
                url: "game_process.php",
                type: "POST",
                data: {tableName: 'breakout', username: username, score: score},
                success: function(data){
                    alert("Inserted");
                    displayMenu();
                }
            });
        
        } else {
            alert("No username entered.");
        }    
    }
});

</script>
