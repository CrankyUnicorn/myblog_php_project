<?php
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	


    <article>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
					<?php require_once('get_post.php'); ?>
                </div>
            </div>
        </div>
    </article>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>