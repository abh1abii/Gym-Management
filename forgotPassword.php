<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body >
    <div class="head">
    <center>
    <h1>OOPS!</h1>
    <h2>Please contact your System Administrator for a password reset.</h2>  </center>
    </div>
<div class="input-field">
    
    <a href="./admin_login.php"><button>Return to login page.</button></a>
    
    </div>
    <style>
    body
    {
        background:url("./Images/locker.jpg")no-repeat; background-position: center;
        background-size: cover;
        height: 100vh;
    }
    @import url(https://fonts.googleapis.com/css?family=Cabin+Sketch%27);
.head{
    font-family:'cabin sketch';
    position: relative;
    z-index: 1;
    background: #ccc3c4;
    opacity: 99%;
    max-width: 260px;
    margin: 200px auto 100px;
    padding: 10px 45px 30px 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    border-radius: 10px;
}

.mid{
    /* font-family: 'cabin sketch';
    position: relative;
    z-index: 1;
    background: #ccc3c4;
    opacity: 99%;
    max-width: 260px;
    margin: auto auto auto;
    padding: 25px 30px 30px 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    border-radius: 10px; */
    /* text-transform: uppercase;
    outline: 0;
    border-radius: 10px;
    background: #cf454f;
    opacity: 100%;
    max-width: 260px;
    margin:auto;
    border: 0;
    padding: 15px;
    color: #5f2121;
    font-size: 20px;
    cursor: pointer; */
}
.input-field button{
    text-transform: uppercase;
    outline: 0;
    border-radius: 10px;
    background: #cf454f;
    opacity: 100%;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #5f2121;
    font-size: 20px;
    cursor: pointer;
    max-width: 260px;
    z-index: 2;
    position: relative;
    margin: auto 50% auto;
    left: -130px;
    
    

    
}
.input-field button:hover, .input-field button:active, .input-field button:focus{
    background-color: #eb9494;
    transition: all 0.5s ease 0s;
}

 a:visited, a:link, a:active
{
    text-align: left;
    color: #5c5c5c;
    text-decoration: none;   
}
a:hover{
    text-align: left;
    color: #353535;
    text-decoration: none;
 }
    
    </style>
</body>
</html>