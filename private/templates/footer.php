</body>
<link rel="stylesheet" href="<?php echo url_to('/css/footer.css')?>">

<footer>
    <?php 
    if ($currentPage !== 'about-us') { ?>
    <a class="foot" href="<?php echo url_to('/about-us'); ?>">About us</a>
    <?php } ?>
</footer>
</html>