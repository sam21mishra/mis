<?php echo "<?php\n"; ?>
/**
 * @author Saurabh Mishra <sam21mishra@gmail.com>
 * @version $Id:$
 */
class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
}