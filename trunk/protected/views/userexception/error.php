<div class="row">
    <div class="col-lg-12">
        <?php
        $errorCode = $data['code'];
        switch ($errorCode) {
            case 404 :
                //echo "<img src='" . Yii::app()->baseUrl . "/images/404.jpg' class='img-responsive'>";
                $this->renderPartial('error404');
                break;
        }
        ?>
    </div>
</div>
<?php
/**
<h1>Error <?php echo $data['code']; ?></h1>
<h2><?php echo nl2br(CHtml::encode($data['message'])); ?></h2>
<p>
    The above error occurred when the Web server was processing your request.
</p>
<p>
    If you think this is a server error, please contact <?php echo $data['admin']; ?>.
</p>
<p>
    Thank you.
</p>
 **/
?>