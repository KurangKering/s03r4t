
	<div class="row">
        <h2>Multi level dropdown menu in Bootstrap 3.0</h2>        
        <hr>
        <div class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="/page.html">
                Dropdown <span class="caret"></span>
            </a>
    		<?php echo $this->multi_menu->render('Item-0', array('Item-3', 'Item-5')); ?>
        </div>
        <br>
       
	</div>