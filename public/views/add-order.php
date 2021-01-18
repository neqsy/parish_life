<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/order.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/029cd684fc.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>ORDER</title>
</head>
<body>
    <div class="base-container">
        <nav>
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
                <li>
                    <i class="fas fa-cog"></i>
                    <a href="#" class="button">settings</a>
                </li>
            </ul>
            <img src="public/img/logo.svg">
            <form class="logout" action="logout" method="POST">
                <button type="submit">Logout</button>
            </form>

        </nav>
        <main>
            <header class="search">
                <div class="search-bar">
                    <input placeholder="search event">
                </div>
                <div class="add-event">
                    <i class="fas fa-plus"></i>
                    <a href="addEvent">ADD</a>
                </div>
                <div class="order-mass">
                    <i class="fab fa-cc-mastercard"></i>
                    <a href="addOrder">ORDER MASS</a>
                </div>
            </header>

            <section class="events">
                <form class="order" action="addOrder" method="POST" ENCTYPE="multipart/form-data">
                    <div class ="message">
                        <?php if (isset($messages)) {
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input name="name" type="text" placeholder="name">
                    <input name="surname" type="text" placeholder="surname">
                    <input name="intention" type="text" placeholder="intention">
                    <input name="phone" type="text" placeholder="phone">
                    <input name="date" type="text" placeholder="date: dd/mm/yyyy">
                    <button type="submit">SEND</button>
                </form>
            </section>
        </main>
    </div>
</body>


