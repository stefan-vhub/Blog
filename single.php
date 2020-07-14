<?php 
include('path.php'); 
include(ROOT_PATH . "/app/controllers/posts.php");
include(ROOT_PATH . "/app/controllers/functions.php");

# <!--- Select Post --->

if(isset($_GET['id'])) {
    $getPost = selectOne($table, ['id' => $_GET['id']]);
}
$user = selectOne('users', ['id'=>$getPost['user_id']]);
$posts = selectAll('posts');

# <!--- // Select Post --->

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Blog">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
    <meta name="author" content="Petrescu Viorel Stefan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVStefan | Blog</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/single.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>

    <!-- HEADER -->

        <?php include ('app/includes/header.php');?>

    <!-- // HEADER -->

    <main id="single-main">
        <div class="container-main">
            <article class="post">
                <div class="post-img">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $getPost['image'] ?>" width="720">
                </div>
                <main class="post-main">
                    <h2><?php echo $getPost['title']; ?></h2>
                    <div class="dataName">
                        <p>Postat de <?php echo $user['name']; ?></p>
                        <p>In date de 02.07.2020</p>
                    </div>
                    <p class="rights">Publicat de LinkAcademy</p>
                    <div class="bodyPost">
                        <?php echo html_entity_decode($getPost['body']); ?>
                    </div>

                </main>

                <footer class="post-footer">
                    <div class="post-footer-header">

                        <div class="similar">
                            <div class="similar-mame">
                                <h5>Poate te-ar interesa: </h5>
                            </div>

                            <div class="similar-main">

                                <?php

                                $randPosts = array_rand($posts, 3);

                                for($i=0;$i<3;$i++): 
                                $topicName = selectOne('topics', ['id'=>$posts[$randPosts[$i]]['topic_id']])
                                ?>
                                <div class="similar-post">
                                    <div class="similar-img">
                                        <img src="<?php echo BASE_URL . '/assets/images/' . $posts[$randPosts[$i]]['image'] ?>" width="205px" height="120">
                                    </div>
                                    <div class="similar-des">
                                        <div class="similar-des-a">
                                            <a href="<?php echo BASE_URL . "/single.php?id=" . $posts[$randPosts[$i]]['id'];?>"><?php echo $posts[$randPosts[$i]]['title'] ?></a>
                                        </div>   
                                        <p>03.07.2020</p>
                                        <div>Topic 
                                            <a href="<?php echo BASE_URL . "/topic.php?name=" . $topicName['name'] . "&id=" . $topicName['id'];?>"><?php echo $topicName['name']; ?></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php endfor; ?>

                                <div style="clear: both"></div>
                            </div>

                        </div>

                    </div>


                    <footer>

                        <p>
                            Trebuie sa te <a href="">autentifici/inregistrezi</a> pentru a publica un comentariu.
                        </p>

                    </footer>


                </footer>

            </article>

            <aside class="more-things">

                <form action="" class="more-things-cont">
                    <input type="text" placeholder="Cautare...">
                </form>

                <div class="follow-me more-things-cont">
                    <p class="more-things-title">Urmărește-mă și pe</p>
                    <a class="shereFa" href="https://www.facebook.com/stefan.petrescu.1"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    <a class="shereFa" href="https://www.instagram.com/stefan_petrescu/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a class="shereFa" href="https://www.youtube.com/channel/UCxka1iTjqYR4pgDgZp6xQig?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                </div>

                <div class="best-post more-things-cont">
                    <p class="more-things-title">Cele mai bune articole</p>
                    <a href="<?php echo BASE_URL . "/single.php?id=8"?>">Tipuri de stres</a>
                    <a href="<?php echo BASE_URL . "/single.php?id=15"?>">Masurarea inteligentei</a>
                    <a href="<?php echo BASE_URL . "/single.php?id=7"?>">Fazele dezvoltarii stresului</a>
                </div>

                <div class="recent-comments more-things-cont">
                    <p class="more-things-title">Comentarii recente</p>
                    <p class="comments">
                        <a href="">Petrescu Stefan: </a>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium amet aperiam consequatur corporis dignissimos
                    </p>
                    <p class="comments">
                        <a href="">Alexandra: </a>eum excepturi, hic, magnam minus molestias numquam odit
                        quasi qui rem sapiente, sed soluta sunt vero!
                    </p>
                    <p class="comments">
                        <a href="">Bratu Mihai: </a>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium amet aperiam consequatur corporis dignissimos
                    </p>
                    <p class="comments">
                        <a href="">Ionescu Bogdan: </a>eum excepturi, hic, magnam minus molestias numquam odit
                        quasi qui rem sapiente, sed soluta sunt vero!
                    </p>
                </div>

            </aside>
            <div style="clear: both"></div>
        </div>
    </main>

    <!-- FOOTER -->

        <?php include ('app/includes/footer.php');?>

    <!-- // FOOTER -->

</body>
