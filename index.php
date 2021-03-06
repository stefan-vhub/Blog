<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/posts.php");

# <--- Search --->
if(isset($_POST['search-term'])) {
    $postsTitle = "Cautarea ta pentru '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
    
# <--- // Search --->
# <--- Pagination  --->
} else {
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $num_per_page = 06;
    $start_from = ($page-1)*$num_per_page;

    $posts = selectLimit('posts', $start_from,$num_per_page, ['publish' => 1]);
    $total_page = ceil(totalRows('posts')/$num_per_page);
    $lengthPosts = count($posts);
}
// # <--- // Pagination --->


// # <--- // Pagination --->



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

    <?php if(isset($_SESSION['username'])): ?>
    <div class="logout">
        <a href="<?php echo BASE_URL . '/logout.php'; ?>">Logout</a>
    </div>
    <?php endif; ?>

    <main id="main">
        <div class="container-main">

            <div class="titleNav">
                <?php if(isset($_POST['search-term'])): ?>
                    <h2><?php echo $postsTitle; ?></h2>
                <?php elseif($page != 1): ?>
                    <h2><?php echo "Pagina " .$_GET['page']; ?></h2>
                <?php else: ?>
                    <h2>Postari recente</h2>
                <?php endif; ?>
            </div>

            <div class="left">
                <?php for($i=0;$i<$lengthPosts;$i+=2): ?>
                    <?php $userName = selectOne('users',['id' => $posts[$i]['user_id']]); ?>
                    <?php $topicName = selectOne('topics',['id' => $posts[$i]['topic_id']]); ?>
                <article class="CardPost">

                    <div class="post-img">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $posts[$i]['image'] ?>" width="485">
                    </div>
                    <div class="post-main">
                        <div class="postName">
                            <a href="<?php echo BASE_URL . "/single.php?id=" . $posts[$i]['id']; ?>"><h3><?php echo $posts[$i]['title']; ?></h3></a>
                        </div>
                        
                        <div class="dataName">
                            <p>Postat de <?php echo $userName['name']; ?></p>
                            <p>In date de <?php echo date('d-m-Y', strtotime($posts[$i]['created_at'])); ?></p>
                        </div>

                        <div class="description">
                            <?php echo html_entity_decode(substr($posts[$i]['body'],0,100)) . '...'; ?>
                            <a href="<?php echo BASE_URL . "/single.php?id=" . $posts[$i]['id'];?>">[citeste tot]</a>
                        </div>

                        <div class="topicName">
                        <a href="<?php echo BASE_URL . "/topic.php?name=" . $topicName['name'] . "&id=" . $topicName['id'];?>"><p class="topicIcs"><i class="fa fa-folder" aria-hidden="true"></i><?php echo $topicName['name']; ?></p></a>
                        </div>

                    </div>
                </article>

                <?php endfor; ?>
            </div>

            <div class="right">

            <?php for($i=1;$i<$lengthPosts;$i+=2): ?>
                    <?php $userName = selectOne('users',['id' => $posts[$i]['user_id']]); ?>
                    <?php $topicName = selectOne('topics',['id' => $posts[$i]['topic_id']]); ?>
                <article class="CardPost">

                    <div class="post-img">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $posts[$i]['image'] ?>" width="485">
                    </div>
                    <div class="post-main">
                        <div class="postName">
                            <a href="<?php echo BASE_URL . "/single.php?id=" . $posts[$i]['id']; ?>"><h3><?php echo $posts[$i]['title']; ?></h3></a>
                        </div>
                        
                        <div class="dataName">
                            <p>Postat de <?php echo $userName['name']; ?></p>
                            <p>In date de <?php echo date('d-m-Y', strtotime($posts[$i]['created_at'])); ?></p>
                        </div>

                        <div class="description">
                            <?php echo html_entity_decode(substr($posts[$i]['body'],0,100)) . '...'; ?>
                            <a href="<?php echo BASE_URL . "/single.php?id=" . $posts[$i]['id'];?>">[citeste tot]</a>
                        </div>

                        <div class="topicName">
                        <a href="<?php echo BASE_URL . "/topic.php?name=" . $topicName['name'] . "&id=" . $topicName['id'];?>"><p class="topicIcs"><i class="fa fa-folder" aria-hidden="true"></i><?php echo $topicName['name']; ?></p></a>
                        </div>

                    </div>
                </article>

                <?php endfor; ?>
            </div>
            
        

            <div style="clear: both"></div>

            <div class="nextPage" style="font-style: normal;">

     
                <?php if(!isset($_POST['search-term'])): ?>
                <?php
                    if($page == 1) {   
                    } else {
                        echo "<a href=" . BASE_URL . "/index.php?page=".($page-1)."> <i class='fa fa-long-arrow-left' aria-hidden='true'></i> </a>";
                    }
            
                    for($pages=1; $pages<=$total_page; $pages++){
                        echo "<a href=" . BASE_URL . "/index.php?page=$pages> $pages </a>";
                    }
                    
                    if($page == $total_page) {
                    }else {
                        echo "<a href=" . BASE_URL . "/index.php?page=" . ($page+1). "> <i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>";
                    }

                ?>
                <?php endif; ?>
            </div>

        </div>

    </main>

    <!-- FOOTER -->

        <?php include ('app/includes/footer.php');?>

    <!-- // FOOTER -->

</body>
</html>
