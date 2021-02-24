<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link"><span>Categories</span></a>
    </li>
    <?php foreach($categoryList as $cat){?>
        <li class="nav-item">
            <a class="nav-link" href="categoryImages.php?catId=<?php echo $cat['id'];?>">
                <span><?php echo $cat['name'] ?></span>
            </a>
        </li>
    <?php }?>
    <!-- <li class="nav-item">
        <a class="nav-link" href="images.php"><span>Manage Images</span></a>
    </li> -->
</ul>