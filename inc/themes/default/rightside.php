        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <?=Language::flagList();?>
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <h5><?=Site::logo('','40px');?> <?=Site::$name;?></h5>
                <p><em><?=Options::v('siteslogan');?></em>
                    <?=Site::$desc;?></p>
                </div>
                <div class="sidebar-module">
                    <h4>Recent Post</h4>
                    <ol class="list-unstyled">
                        <?php
                        $rcnt = array(
                            'num' => 10
                        );
                        $recent = Posts::recent($rcnt);
                        $num = count($recent);
                        if(!isset($recent['error'])) {
                            foreach ($recent as $r) {
                                echo "<li><a href=\"".Url::post($r->id)."\">$r->title</a></li>
                                ";
                            }
                        }else{
                            echo "No Post to Show";
                        }

                        ?>
                    </ol>
                    <h4>Post with Excerpts</h4>
                    <?php
                        $vars = array(
                            'num' => 2,
                            'excerpt' => true,
                            'excerpt_max' => 130,
                            'class' => array(
                                'ul' => 'list-group',
                                'li' => 'list-group-item'
                            )
                        );
                        Posts::lists($vars);
                    ?>
                </div>
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->
