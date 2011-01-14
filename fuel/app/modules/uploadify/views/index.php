<div id="body">
    <h2>Uploadify demo using FuelPHP and SimpleAuth <span id="loader"><?php echo \Asset::img('loading.gif', array('alt' => 'Loading...'));?></span></h2>
    <div id="sidebar">
        <!-- form to be replaced by uploadify -->
        <form id="mainftp" action="<?php echo $url;?>" method="post" enctype="multipart/form-data">
            <p><input type="file" name="userfile" id="file" /></p>
            <p><input type="submit" name="submit" value="Upload" /></p>
        </form>
    </div>

    <!-- whole div to be refreshed once uploadify is finished -->
    <div id="allfiles" >
        <ul>
        <?php
            $src_folder = "./uploads";

            foreach(File::read_dir($src_folder) as $file)
            {
                echo "<li><a href='/uploads/{$file}'>{$file}</a></li>";
            }
        ?>
        </ul>
    </div>

<div class="clear"></div>