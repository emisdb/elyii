<?php
/* @var $this BbController */
/* @var $model Bb */

?>
	<div class="left-menu secondpage">
	<div class="moduletable">
		<div id="ariext88_container" class="ux-menu-container ux-menu-clearfix">
			<ul id="ariext88" class="ux-menu ux-menu-horizontal">
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item470 ux-menu-item-parent-pos0">
				<a href="http://elvispiter.ru" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					Главная						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item472 ux-menu-item-parent-pos0">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=regions" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					Щиты 3*6						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>

						</ul>
		</div>
	</div>
</div>


<h2>Ваш план задан</h2>
<?php
foreach($model->attributes as $name=>$value)
{
   echo "<div>".$model->getAttributeLabel($name)." :".$value."</div>";
}
echo "ii:".$ii;
?>
