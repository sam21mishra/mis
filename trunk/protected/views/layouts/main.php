<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once('header.php'); ?>
    </head>
    <body>
        <?php
        $this->widget('zii.widgets.CMenu', array(
            'items' => array(
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                array('label' => 'Home', 'url' => array('site/index')),
                // 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
                array('label' => 'Products', 'url' => array('product/index'), 'items' => array(
                        array('label' => 'New Arrivals', 'url' => array('product/new', 'tag' => 'new')),
                        array('label' => 'Most Popular', 'url' => array('product/index', 'tag' => 'popular')),
                    )),
                array('label' => 'Login', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
            ),
        ));
        ?>
        <div class="container-fluid">
            <?php echo $content; ?>
        </div>
        <?php Yii::import('footer'); ?>
    </body>
</html>
