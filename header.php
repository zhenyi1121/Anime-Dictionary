<!DOCTYPE html>
<html lang='en' style='font-family:Arial, sans-serif;'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle' />
    <style>
    /* Global Styles */
    body {
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
        font-family: 'Kollektif', sans-serif;
        min-height:calc(100vh);
        display:flex;
        flex-direction:column;
        font-weight:bold;
    }

    .main {
        width: 100%;
        margin: 0 auto;
        position: sticky;
        top: 0;
        padding: 15px 0px;
        background-color: black;
        z-index: 10;
        font-size:20px;
    }

    .main ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        background-color: black;
        height: 40px; /* Sets a consistent height for the navbar */
    }

    /* Updated li styles */
    .main li {
        display: flex;
        align-items: center; /* Vertically aligns content */
        justify-content: center;
        margin-right: 20px;
        height: 100%; /* Matches the height of the navbar */
    }

    /* Updated a styles */
    .main a {
        color: white;
        text-decoration: none;
        padding: 15px 15px; /* Padding for clickable area */
        display: block; /* Ensures the entire area is clickable */
        height: 100%; /* Makes the <a> tag span the full height of the <li> */
        line-height: 40px; /* Aligns text within the <a> tag */
    }

    .main a:hover {
        background-color: #575757;
    }

    /* Specific Styles for Home Title */
    a.home img{
        color: white;
        font-weight: bold;
        margin-top:-15px;
        margin-left:-10px;
        text-decoration: none;
        height:72px;

    }

    a.home:hover {
        background-blend-mode: multiply;
        background-color: transparent; /* Prevent hover effect */
        color: white; /* Ensure color stays the same */
        text-decoration: none; /* No underline on hover */
    }

    /* Search Container Fix */
    .search-container {
        display: flex;
        align-items: center;
        justify-content: center;
        float: right;
        width: 100%;
    }

    .search-container form {
        display: flex;
        align-items: center;
        gap: 5px; /* Adds space between input and button */
        margin-left:30px;
    }

    .search-container input[type='text'] {
        flex-grow: 1; /* Allows input to expand */
        vertical-align:middle;
        padding: 5px;
        font-size: 14px;
        border: none;
        border-radius: 3px;
        outline: none;
    }

    .search-container button {
        padding: 5px 10px;
        background-color: #ddd;
        border: none;
        cursor: pointer;
        font-size: 14px;
        border-radius: 3px;
        flex-shrink: 0; /* Prevents button from wrapping */
    }

    .search-container button:hover {
        background-color: #ccc;
    }

    .clearfix::after {
        content: "";
        display: block;
        clear: both;
    }


    /* User Profile Dropdown */
    .user-profile {
        position: relative; /* Needed for dropdown positioning */
        margin-left: auto; /* Push to the right */
        margin-right: -10px;
    }

    .user-profile img {
        margin-left: 5px;
        margin-top: 10px;
        vertical-align: middle;
    }

    .dropbtn {
        display: flex;
        align-items: center;
        justify-content: center; /* Centers content horizontally */
        gap: 5px;
        color: white;
        font-size: 20px;
        text-decoration: none;
        text-align: center; /* Ensures text is centered */
        padding: 5px 10px; /* Add some padding to make it look even */
        white-space: nowrap; /* Prevents text from wrapping */
        margin-right:-23px;
    }

    .dropbtn a {
        font-size:10px;
    }

    .user-profile-content {
        display: none;
        position: absolute;
        top: 100%;
        right: -20px; /* Align dropdown to the right of the button */
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        z-index: 1000;
    }

    .user-profile-content a {
        color: black;
        padding: 10px;
        text-decoration: none;
        display: block;
        line-height:30px;
    }

    .user-profile-content a:hover {
        background-color: #ddd;
    }

    .user-profile:hover .user-profile-content {
        display: block; /* Show dropdown on hover */
    }

    .material-symbols-outlined {
        font-size: 25px;
    }

    /* Responsive Navigation */
    @media (max-width: 768px) {
        .main ul {
            flex-direction: row;
            padding: 0px 0px 0px 10px;
            height:100%;
            position:relative;
        }

        .search-container {
            margin-top: 20px;
            margin-left: 0;
        }

        

        .main a {
            color: white;
            text-decoration: none;
            padding: 5px 5px; /* Padding for clickable area */
            display: block; /* Ensures the entire area is clickable */
            height: 100%; /* Makes the <a> tag span the full height of the <li> */
            line-height: 18px; /* Aligns text within the <a> tag */
            font-size:12px;
            border-radius:5px;
        }

        .main a:hover {
            background-color: #575757;
        }
        a.home img{
            color: white;
            font-weight: bold;
            padding:0;
            margin-left:-10px;
            text-decoration: none;
            height:52px;
        }

        a.home:hover {
            background-blend-mode: multiply;
            background-color: transparent; /* Prevent hover effect */
            color: white; /* Ensure color stays the same */
            text-decoration: none; /* No underline on hover */
        }
        .search-container {
            display: flex;
            align-items: center;
            float:right;
            margin-top:0px;
        }

        .search-container input[type='text'] {
            padding: 5px;
            font-size: 10px;
            border: none;
            border-radius: 3px;
            outline: none;
            width:70px;
        }

        .search-container button {
            padding: 5px 10px;
            background-color: #ddd;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 3px;
            font-size:10px;
        }

        .search-container button:hover {
            background-color: #ccc;
        }
        .user-profile {
            position: relative; /* Needed for dropdown positioning */
            margin-left: auto; /* Push to the right */
            margin-right: -10px;
            margin-bottom: -28px;
        }

        .dropbtn {
            display: flex;
            align-items: center;
            gap: 5px;
            color: white;
            font-size: 40px;
            text-decoration: none;
            margin-right: -23px;
            margin-top:-20px;
            text-align: center
        }

        .user-profile-content {
            display: none;
            position: absolute;
            top: 100%;
            right: -20px; /* Align dropdown to the right of the button */
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            z-index: 1000;
        }

        .user-profile-content a {
            color: black;
            padding: 10px;
            text-decoration: none;
            display: block;
        }

        .user-profile-content a:hover {
            background-color: #ddd;
        }

        .user-profile:hover .user-profile-content {
            display: block; /* Show dropdown on hover */
        }

        .material-symbols-outlined {
            font-size: 25px;
        }
    }
</style>
</head>

<body>

<div class='main'>
    <?php
        // Menu for when user is not logged in
        if (empty($_SESSION['identity'])) {
            echo "
            <ul>
                <li><a href='index.php' class='home'><img src='file.png'></a></li> 
                <li class='login-signup' style='margin-left:auto;margin-right:0px;'><a href='login-page.php'>Login/SignUp</a></li>
            </ul>";
        }
        // Menu for when user is logged in
        else if (!empty($_SESSION['identity']) && $_SESSION['identity'] == 'user') {
            echo "  
            <ul>
                <li><a href='user-homepage.php' class='home'><img src='file.png'></a></li>
                <li><a href='anime-library.php'>Anime Library</a></li>
                <li><a href='join-quiz.php'>Join Quiz</a></li>
                <li><a href='anime-category'>Anime Category</a></li>
                <li>
                    <div class='search-container'>
                        <form action='search-anime.php' method='GET'>
                            <input type='text' placeholder='Search Anime...' name='query'>
                            <button type='submit'><i class='fa fa-search'></i></button>
                        </form>
                    </div>
                    <div class='clearfix'></div>
                </li>
                <li class='user-profile' style='float: right;padding:3.5px;'>
                    <a href='view-profile.php' class='dropbtn'>
                        " . htmlspecialchars($_SESSION['Username'], ENT_QUOTES, "UTF-8") . "
                        <img src='upload/" . htmlspecialchars($_SESSION['Avatar'], ENT_QUOTES, "UTF-8") . "' 
                        alt='Avatar' style='width:30px; height:30px; border-radius:50%;margin-top:-5px;'>
                    </a>
                    <div class='user-profile-content'>
                        <a href='edit-profile.php'>Edit Profile</a>
                        <a href='change-password.php'>Change Password</a>
                        <a href='logout.php'>LogOut</a>
                    </div>
                </li>
            </ul>";
        }
        else if (!empty($_SESSION['identity']) && $_SESSION['identity'] == 'admin') {
            echo "
            <ul>
                <li><a href='admin-homepage.php' class='home'><img src='file.png'></a></li>
                <li><a href='edit-anime.php'>Edit Anime</a></li>
                <li><a href='manage-quizzes.php'>Edit Quiz</a></li>
                <li><a href='manage-user.php'>Edit User</a></li>
                <li><a href='user-rank.php'>User Rank</a></li>
                <li><a href='upload-data.php'>Add User/Quiz/Anime</a></li>
                <li class='user-profile' style='float: right;padding:3.5px;'>
                    <a href='view-profile(admin).php' class='dropbtn'>
                        " . htmlspecialchars($_SESSION['Name'], ENT_QUOTES, "UTF-8") . "
                        <img src='upload/" . htmlspecialchars($_SESSION['Avatar'], ENT_QUOTES, "UTF-8") . "' 
                        alt='Avatar' style='width:30px; height:30px; border-radius:50%;margin-top:-5px;'>
                    </a>
                    <div class='user-profile-content'>
                        <a href='edit-profile(admin).php'>Edit Profile</a>
                        <a href='change-password(admin).php'>Change Password</a>
                        <a href='logout.php'>LogOut</a>
                    </div>
                </li>
            </ul>";
        }
        
        ?>
</div>

</body>
</html>

