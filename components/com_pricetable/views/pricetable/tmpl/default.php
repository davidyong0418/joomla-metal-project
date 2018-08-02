<?php
/**
 * @version     2.0.0
 * @package     com_pricetable
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Abdur Rashid <rashid.cse.05@gmail.com> - http://www.keenitsolution.com
 */
// no direct access
defined('_JEXEC') or die;

require_once JPATH_COMPONENT_ADMINISTRATOR.'/helpers/pricetable.php';
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_pricetable/assets/css/pricetable.css');
$count=count($this->item);
$app = JFactory::getApplication();
$params = $app->getParams();
$currency = $params->get('currency');
$cat_id = $params->get('cat_id');
$show_cat = $params->get('show_cat');
$link = $params->get('links_behaviour');
?><?php if ($this->params->get('show_page_heading')) : ?>

	<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
<?php endif; ?>
<?php if ($show_cat) : ?>
<h2><?php echo PricetableFrontendHelper::getCategoryNameByCategoryId($cat_id); ?></h2>
<?php endif; ?>

<div class="keenpt_plans keenpt_<?php echo $count; ?>_plans keenpt_style_basic"> 
  <?php foreach ($this->item as $i => $item) : ?>
    <div class="keenpt_plan keenpt_plan_<?php echo $i; ?>">
        <div class="keenpt_title keenpt_title_<?php echo $i; ?>" style="background: <?php echo $item->header_top_color; ?>;"><?php echo $this->escape($item->plan_title); ?></div>
        <div class="keenpt_head keenpt_head_<?php echo $i; ?>" style="background: <?php echo $item->header_top_color; ?>;
            background: -moz-linear-gradient(45deg, <?php echo $item->header_top_color; ?> 0%, #191919 100%);
            background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,<?php echo $item->header_top_color; ?>), color-stop(100%,#191919));
            background: -webkit-linear-gradient(45deg, <?php echo $item->header_top_color; ?> 0%,<?php echo $item->header_bottom_color; ?> 100%); 
            background: -o-linear-gradient(45deg, <?php echo $item->header_top_color; ?> 0%,<?php echo $item->header_bottom_color; ?> 100%);
            background: -ms-linear-gradient(45deg, <?php echo $item->header_top_color; ?> 0%,<?php echo $item->header_bottom_color; ?> 100%); 
            background: linear-gradient(45deg, <?php echo $item->header_top_color; ?> 0%,<?php echo $item->header_bottom_color; ?> 100%); 
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $item->header_top_color; ?>', endColorstr='<?php echo $item->header_bottom_color; ?>',GradientType=1 )">
            <div class="keenpt_price keenpt_price_<?php echo $i; ?>">
            	<span class="keenpt_currency">
					<?php 
                        if(!empty($currency)):
                            echo $currency; 
                        else:
                            echo '$';
                        endif;
                    ?>
                </span> 
				<?php  if($item->price==0):
                echo 'Free';
                else:
                    echo $item->price;
                endif; 
			
			?></div>
            <?php if(!empty( $item->plan_subtext)): ?>
            <div class="keenpt_subtitle keenpt_subtitle_<?php echo $i; ?>"><?php echo $item->plan_subtext; ?></div>
            <?php endif; ?>
            <?php if(!empty( $item->details)): ?>
            	<div class="keenpt_description keenpt_description_<?php echo $i; ?>"><?php echo $item->details; ?></div>
            <?php endif; ?>
        </div>
        <div class="keenpt_features keenpt_features_<?php echo $i; ?>">
               <?php
                 $main= $item->features;
                 $pics=explode('|', $main);
                 $n=count($pics);
                 $num=0;
                 for($j=0;$j<$n;$j++):
                 ?>
                 <div class="keenpt_feature keenpt_feature_<?php echo $i; ?>-<?php echo $num++; ?>" style="color:black;"> <?php  echo $pics[$j]; ?></div>
               <?php endfor; ?>
    
        </div>
        
   		 <a class="keenpt_foot keenpt_foot_<?php echo $i; ?>" style="background:<?php echo $item->button_color; ?>" href="<?php echo $item->button_url; ?>" target="<?php  if(!empty($link)):
                            echo $link; 
                        else:
                            echo '_self';
                        endif; ?>"><?php echo $item->button_text; ?></a>
    </div>
  <?php endforeach; ?>
</div>
