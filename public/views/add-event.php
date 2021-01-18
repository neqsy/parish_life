<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/events.css">

    <script src="https://kit.fontawesome.com/029cd684fc.js" crossorigin="anonymous"></script>
    <title>Events</title>
</head>

<body>
<div class="base-container">
    <nav>
        <img src="public/img/logo.svg">
        <ul>
            <li>
                <i class="fas fa-calendar-week"></i>
                <a href="events" class="button">events</a>
            </li>
            <li>
                <i class="fas fa-users"></i>
                <a href="#" class="button">people</a>
            </li>
            <li>
                <i class="fas fa-comment-alt"></i>
                <a href="#" class="button">messages</a>
            </li>
            <li>
                <i class="fas fa-bell"></i>
                <a href="#" class="button">notifications</a>
            </li>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div class="search-bar">
                <form>
                    <input placeholder="search event">
                </form>
            </div>

        </header>
        <section class="event-form">
            <h1>UPLOAD</h1>
            <form action="addEvent" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="title" type="text" placeholder="title">
                <textarea name="description" rows=5 placeholder="description"></textarea>

                <input type="file" name="file"/><br/>
                <button type="submit">send</button>
            </form>
        </section>
    </main>
</div>
</body>
