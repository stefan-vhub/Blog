<header id="header">

    <div class="logo">
        <a href="<?php echo BASE_URL . '/index.php' ?>"><p>Stefan's blog</p></a>
    </div>

    <nav class="header-nav">
        <ul class="header-nav-ul">
            <li><a class="nav-a" href="<?php echo BASE_URL . '/index.php'?>">Acasa</a></li>
            <li>
                <a class="nav-a" href="#">Topicuri <i class="fa fa-sort-desc" aria-hidden="true"></i></a>

                <ul class="dropdown">
                    <?php $navTopics = selectAll('topics'); ?>
                    <?php foreach($navTopics as $key => $topic): ?> 
                        <li><a class="dropdown-a" href="<?php echo BASE_URL . '/topic.php?name='.$topic['name']. '&id=' .$topic['id'];?>"><?php echo $topic['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>

            </li>
            <li><a class="nav-a" href="<?php echo BASE_URL . '/contact.php'?>">Contact</a></li>
            <li>
                <i class="fa fa-search" aria-hidden="true">
                    <form action="index.php" method="post">
                        <input type="text" name="search-term" class="search-term" placeholder="Cauta...">
                    </form>
                </i>
            </li>


        </ul>
    </nav>

</header>
