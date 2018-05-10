<?php
require_once('view/top.php');
?>

<script src="js/phaser.js"></script>


<br>
<script>
    
    var game = new Phaser.Game(300, 400, Phaser.CANVAS, 'eatapplefast', { preload: preload, create: create, update: update, render: render });


    function preload() {

        game.load.image('fork', 'img/fork.png');
        game.load.image('rottenapple', 'img/badapple1.png');
        game.load.image('apple', 'img/goodapple.png');
        game.load.image('boy', 'img/boy.png');
        game.load.spritesheet('nom', 'img/explode.png', 128, 128);
        game.load.image('background', 'img/applegamebackground.png');
        game.load.image('death','img/death.png');

       

    }

    var player;
    var apples;
    var forks;
    var forkTime = 0;
    var cursors;
    var nomnomnom;
    var background;
    var score = 0;
    var scoreString = '';
    var scoreText;
    var lives;
    var rottenapple;
    var firingTimer = 0;
    var stateText;
    var livingEnemies = [];
    var keyF;
    var appleSpeedX = 4000;
    var appleSpeedY = 8000;
    var rottenAppleFreq = 2000;
    var rottenAppleSpeed = 120;
    var forkFreq = 600;
    var stage = 2;


    function gofull() {

        if (game.scale.isFullScreen)
        {
            game.scale.stopFullScreen();
        }
        else
        {
            game.scale.startFullScreen(false);
        }

    }

    //double tap to full screen
    function onTap(pointer, doubleTap) {

        if (doubleTap){
            gofull();
        }
    }
            
    function create() {

        game.world.setBounds(0, 0, 300, 400);

        game.physics.startSystem(Phaser.Physics.ARCADE);
        
        //full screen
        keyF = game.input.keyboard.addKey(Phaser.Keyboard.F);
        keyF.onDown.add(gofull, this);
        game.input.onTap.add(onTap, this);
        game.scale.fullScreenScaleMode = Phaser.ScaleManager.EXACT_FIT;
        

        // add background
        background = game.add.tileSprite(0, 0, 300, 400, 'background');
        background.fixedToCamera = true;

        //  Fork
        forks = game.add.group();
        forks.enableBody = true;
        forks.physicsBodyType = Phaser.Physics.ARCADE;
        forks.createMultiple(30, 'fork');
        forks.setAll('anchor.x', 0.5);
        forks.setAll('anchor.y', 1);
        forks.setAll('outOfBoundsKill', true);
        forks.setAll('checkWorldBounds', true);

        // Rotten apples
        rottenapples = game.add.group();
        rottenapples.enableBody = true;
        rottenapples.physicsBodyType = Phaser.Physics.ARCADE;
        rottenapples.createMultiple(30, 'rottenapple');
        rottenapples.setAll('anchor.x', 0.5);
        rottenapples.setAll('anchor.y', 1);
        rottenapples.setAll('outOfBoundsKill', true);
        rottenapples.setAll('checkWorldBounds', true);

        //  The boy
        player = game.add.sprite(150, 350, 'boy');
        player.anchor.setTo(0.5, 0.5);
        game.physics.enable(player, Phaser.Physics.ARCADE);
        player.smoothed = false;
        player.body.collideWorldBounds = true;
        
        // Make boy dragable
        player.inputEnabled = true;
        player.input.enableDrag();
        // player.events.onDragStart.add(onDragStart, this);
        // player.events.onDragStop.add(onDragStop, this);


        //  The red apples
        apples = game.add.group();
        apples.enableBody = true;
        apples.physicsBodyType = Phaser.Physics.ARCADE;

        createApples();

        //  Score
        scoreString = 'Score : ';
        scoreText = game.add.text(10, 10, scoreString + score, { font: '10px Arial', fill: 'white' });

        //  Lives
        lives = game.add.group();
        game.add.text(game.world.width - 100, 10, 'Lives : ', { font: '10px Arial', fill: 'white' });

        //  Text
        stateText = game.add.text(game.world.centerX,game.world.centerY,' ', { font: '25px Arial', fill: 'white' });
        stateText.anchor.setTo(0.5, 0.5);
        stateText.visible = false;

        for (var i = 0; i < 3; i++) 
        {
            var boy = lives.create(game.world.width - 60 + (20 * i), 50, 'boy');
            boy.anchor.setTo(0.5, 0.5);
            
        }

        //  Eat
        nomnomnom = game.add.group();
        nomnomnom.createMultiple(30, 'nom');
        nomnomnom.forEach(setApple, this);
        
        

        //  keyboard control
        cursors = game.input.keyboard.createCursorKeys();
        // fireButton = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);
        
    }

    function createApples () {

        for (var y = 0; y < 5; y++)
        {
            for (var x = 0; x < 6; x++)
            {
                var apple = apples.create(x * 40, y * 30, 'apple');
                apple.anchor.setTo(0.5, 0.5);
                // apple.animations.add('fly', [ 0, 1, 2, 3 ], 20, true);
                // apple.play('fly');
                // apple.body.moves = false;
            }
        }

        apples.x = 100;
        apples.y = 50;

        //  Moving apples
        var tween = game.add.tween(apples).to( { x: 0 }, appleSpeedX, Phaser.Easing.Linear.None, true, 0, 2000, true);
        var tween = game.add.tween(apples).to( { y: 0 }, appleSpeedY, Phaser.Easing.Linear.None, true, 0, 2000, true);
        tween.onLoop.add(descend, this);
    }

    function setApple (apple) {

        apple.anchor.x = 0.5;
        apple.anchor.y = 0.5;
        apple.animations.add('nom');

    }

    function descend() {

        apples.y += 10;

    }   

    function update() {

        if (player.alive)
        {
            player.body.velocity.setTo(0, 0);

            if (cursors.left.isDown)
            {
                player.body.velocity.x = -200;
            }
            else if (cursors.right.isDown)
            {
                player.body.velocity.x = 200;
            }
            else if (cursors.down.isDown)
            {
                player.body.velocity.y = 250;
            }
            else if (cursors.up.isDown)
            {
                player.body.velocity.y = -250;
            }

            //  Firing
            firefork();

            if (game.time.now > firingTimer)
            {
                rottenDrops();
            }

            //  collision
            game.physics.arcade.overlap(forks, apples, collisionHandler, null, this);
            game.physics.arcade.overlap(rottenapples, player, enemyHitsPlayer, null, this);
        }

    }

    function render() {

        // for (var i = 0; i < apples.length; i++)
        // {
        //     game.debug.body(apples.children[i]);
        // }

    }

    function collisionHandler (fork, apple) {

        //  When a fork hits an apple
        fork.kill();
        apple.kill();

        //  Increase the score
        score += 20;
        scoreText.text = scoreString + score;

        //  Eat apple
        var  eatapple= nomnomnom.getFirstExists(false);
        eatapple.reset(apple.body.x, apple.body.y);
        eatapple.play('nom', 30, false, true);

        if (apples.countLiving() == 0)
        {
            //stop forks, apples   
            forkFreq = 99999999;
            rottenapples.callAll('kill');
            score += 1000;
            scoreText.text = scoreString + score;

            
            stateText.text = "       Stage cleared!! \n Your current score: " + score + "\n     Click to go stage " + stage;
            stateText.visible = true;

            //the "got to next stage" handler
            game.input.onTap.addOnce(nextStage,this);
        }

    }
    function changeIcon(){
        player.loadTexture('boy',0);
    }

    function enemyHitsPlayer (player,fork) {
        
        fork.kill();
        player.loadTexture('death',0);
        game.time.events.add(Phaser.Timer.SECOND*0.3,changeIcon,this);

        live = lives.getFirstAlive();

        if (live)
        {
            live.kill();
        }

        
        // When the player dies
        if (lives.countLiving() < 1)
        {
            player.kill();
            rottenapples.callAll('kill');

            stateText.text=" GAME OVER \n Final score: " + score + "\n Click to restart";
            stateText.visible = true;

            //the "click to restart" handler
            game.input.onTap.addOnce(restart,this);
        }

    }

    function rottenDrops () {

        rottenapple = rottenapples.getFirstExists(false);

        livingEnemies.length=0;

        apples.forEachAlive(function(apple){

            // put every one in an array
            livingEnemies.push(apple);
        });


        if (rottenapple && livingEnemies.length > 0)
        {
            
            var random=game.rnd.integerInRange(0,livingEnemies.length-1);

            // randomly select
            var shooter=livingEnemies[random];
            // And fire the fork
            rottenapple.reset(shooter.body.x, shooter.body.y);

            game.physics.arcade.moveToObject(rottenapple,player,rottenAppleSpeed);
            firingTimer = game.time.now + rottenAppleFreq;
        }

    }

    function firefork () {

        if (game.time.now > forkTime)
        {
            //  Grab the first fork we can from the pool
            fork = forks.getFirstExists(false);

            if (fork)
            {
                //  And fire it
                fork.reset(player.x, player.y + 8);
                fork.body.velocity.y = -200;
                forkTime = game.time.now + forkFreq;
            }
        }

    }

    function resetfork (fork) {

        //  Called if the fork goes out of the screen
        fork.kill();

    }

    function restart () {
        forkTime = game.time.now + forkFreq;
        rottenAppleSpeed = 120;
        rottenAppleFreq = 2000;
        appleSpeedX = 4000;
        appleSpeedY = 8000;
        //resets the life count
        lives.callAll('revive');
        //  And brings the apples back
        apples.removeAll();
        createApples();
        //revives the player
        player.revive();
        player.position.x = 150;
        player.position.y = 350;
        //hides the text
        stateText.visible = false;

    }

    function nextStage () {
        //reposition boy
        player.revive();
        player.position.x = 150;
        player.position.y = 350;
        //add one live back
        live = lives.getFirstDead();
        if (live)
        {
            live.revive();
        }
        apples.removeAll();
        //start firing
        switch(stage){
            case 2: forkFreq = 450;break;
            case 3: forkFreq = 350;break;
            case 4: forkFreq = 250;break;
            case 5: forkFreq = 150;break;
            case 6: forkFreq = 80;break;
            default: forkFreq = 50;
        }
        forkTime = game.time.now + forkFreq;
        
        //add apple speedY
        if (appleSpeedY > 8000/1.3/1.3/1.3/1.3){
            appleSpeedY /= 1.3;
        } else {
            appleSpeedY = 8000/1.3/1.3/1.3/1.3;
        }
        //add apple speedX
        if (appleSpeedX > 4000/1.3/1.3/1.3/1.3){
            appleSpeedX /= 1.3;
        } else {
            appleSpeedX = 4000/1.3/1.3/1.3/1.3;
        }
        createApples();
        //faster rotten apples
        if (rottenAppleSpeed < 120*1.2*1.2*1.2){
            rottenAppleSpeed *= 1.2;
        } else {
            rottenAppleSpeed = 120*1.2*1.2*1.2;
        }
        //add rotten apples
        if (rottenAppleFreq > 2000/1.4/1.4/1.4/1.4/1.4){
            rottenAppleFreq /= 1.4;
        } else {
            rottenAppleFreq = 2000/1.4/1.4/1.4/1.4/1.4;
        }
        stateText.visible = false;
        stage++;
    }

    </script>
  