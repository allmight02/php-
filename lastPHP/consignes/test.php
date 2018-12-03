<?php
var_dump($_GET);
if(isset($_GET['lien']) AND $_GET['lien'] == 'lien1'){
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>mon site</title>
    </head>
    <body>
            <h1>Mon site 1</h1>
            <p><a href="?lien=lien1">lien1</a></p>
            <p><a href="?lien=lien2">lien2</a></p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum sapiente, quia corrupti ipsam natus cum dolores dignissimos ea totam delectus consequatur placeat laboriosam doloribus culpa rem cupiditate? Esse, consequuntur aut.</p>
            <p>Je suis trop fort</p>
    </body>
    </html>
<?php
}else if(isset($_GET['lien']) AND $_GET['lien'] == 'lien2'){?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>mon site</title>
    </head>
    <body>
            <h1>Mon site 2</h1>
            <p><a href="?lien=lien1">lien1</a></p>
            <p><a href="?lien=lien2">lien2</a></p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum sapiente, quia corrupti ipsam natus cum dolores dignissimos ea totam delectus consequatur placeat laboriosam doloribus culpa rem cupiditate? Esse, consequuntur aut.</p>
            <p>Je suis trop fort</p>
    </body>
    </html>
<?php
}else{?>
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>mon site</title>
    </head>
    <body>
            <h1>Mon site defaut</h1>
            <p><a href="?lien=lien1">lien1</a></p>
            <p><a href="?lien=lien2">lien2</a></p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum sapiente, quia corrupti ipsam natus cum dolores dignissimos ea totam delectus consequatur placeat laboriosam doloribus culpa rem cupiditate? Esse, consequuntur aut.</p>
            <p>Je suis trop fort</p>
    </body>
    </html>
    <?php
}

?>