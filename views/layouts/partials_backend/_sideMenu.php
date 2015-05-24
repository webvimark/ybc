<?php
/**
 * @var $this yii\web\View
 */
use webvimark\modules\SeoPanel\helpers\SeoPanelHelper;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

?>

<aside class="left-side sidebar-offcanvas">
	<section class="sidebar">
		<div class="sidebar-form">
			<div class="input-group">
				<input type="text" id="side-menu-search" class="form-control" placeholder="Search...">
                          	  <span class="input-group-btn">
                                <button class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
			</div>
		</div>
		<?php
		echo GhostMenu::widget([
			'options' => ['class' => 'sidebar-menu'],
			'encodeLabels'=>false,
			'submenuTemplate'=>"\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
			'activateParents'=>true,
			'items' => require_once(Yii::getAlias('@app') . '/backend_sidemenu_items/__item_collector.php'),
		]);
		?>
	</section>

</aside>

<?php
$this->registerJs(<<<JS
$("#side-menu-search").keyup(function(){

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val();

        if ( filter.length > 0 )
        {
		$('.treeview-menu').slideDown();
        }
        else
        {
        	$('.treeview-menu').each(function(){
        		var _t = $(this);

        		if ( !_t.closest('.treeview').hasClass('active') )
        		{
				 $(this).slideUp()
        		}
        	});
        }

        // Loop through the comment list
        $(".sidebar-menu li").each(function(){

            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();

            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
            }
        });

    });
JS
);
?>