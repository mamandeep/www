<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                echo $this->Html->script('jquery-1.11.1-min');
                echo $this->Html->script('jquery.marquee');
                echo $this->Html->script('underscore-min');
	?>
</head>
<body>
	<div id="container">
            <div id="wrapper">
                <div id="sidebar"><img src="<?php echo $this->webroot . '/img/logo.jpg'; ?>" alt="Central University of Punjab" height="132px" width="100px" /></div>
                <div id="maincontent">
                    <div id="header">
                        <label style="font-size: 36px; font-weight: bold; padding-left: 50px;">Central University of Punjab</label>
                        <label style="font-size: 16px; padding-left: 50px; ">City Campus, Mansa Road, Bathinda - 151001</label>
                        <br/>
                        <!--<label style="font-size: 18px; font-weight: bold; padding-left: 50px;">NAAC Accredited 'A' Grade University. NIRF Rank 65 out of 3565.</label>-->
                            <label style="font-size: 18px; font-weight: bold; padding-left: 50px;">Application Form for Teaching Positions</label>
                        <br/>
                        <div class='marquee' style="overflow-x: hidden; width: 600px; margin-left: 0px; font-size: 16px;">Last Date to Apply Online 03<sup>rd</sup> August, 2018 23:59 hrs. For General query please contact: 0164-2864116 or recruitment@cup.edu.in, For Technical query please contact 0164-2864200 or sa@cup.edu.in</div>

                        <?php
                            if($this->Session->check('registration_id')) {
                               // user is logged in, show logout..user menu etc
                             /* ?><span style="padding: 1px 10px;"><?php echo $this->Html->link(('Step 1'), array('first')); 
                              ?></span><span style="padding: 1px 10px;"><?php
                              echo $this->Html->link(('Upload Documents'), array('fourth'));
                               */ ?><!--</span>--><span style="padding: 1px 10px; float: right;"><?php
                               echo $this->Html->link(('Logout'), array('controller'=>'users', 'action'=>'logout'));
                               ?></span>
                            <?php
                            } else {

                            }
                        ?>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<!--<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>-->
			<p><!--<?php echo $cakeVersion; ?>-->
			</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
<script>

    $(function(){
            $('.marquee').marquee();		
    });

</script>
</html>
