<?php

namespace Lb\RssrBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Lb\RssrBundle\Entity\Source;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
    	return $this->render('LbRssrBundle:Default:index.html.twig');	
    }
    
    public function itemsAction()
    {
    	$datas = $this->getDoctrine()
    	->getEntityManager()
    	->getRepository('LbRssrBundle:Source')
    	->getAllValidRss();
    	 
    	$items = array();
    	 
    	foreach($datas as $data){
    	
    		$feed_name = $data->getName();
    		$feed_url = $data->getUrl();
    	
    		$feed_content = $this->get('fkr_simple_pie.rss');
    		$feed_content->set_feed_url($data->getRss());
    		$feed_content->init();
    		$feed_content->handle_content_type();
    	
    		foreach($feed_content->get_items() as $item){
    	
    			$get_image = new \DOMDocument();
    			@$get_image->loadHTML($item->get_content());
    	
    			if($get_image->getElementsByTagName('img')->item(0))
    			{
    				$image = $get_image->getElementsByTagName('img')->item(0);
    				$image_src = utf8_decode($image->getAttribute('src'));
    			}
    			else
    			{
    				$image_src = null;					
    			}

    			$item_content = $item->get_description();
    			
    			if($item_content != null || $image_src != null)
    			{
	    			$items[] = array('feedTitle' => $feed_name,
	    					'feedUrl' => $feed_url,
	    					'itemTitle' => htmlspecialchars($item->get_title()),
	    					'itemUrl' => $item->get_permalink(),
	    					'itemSrc' => $image_src,
	    					'itemDate' => $item->get_date('j/m/Y'),
	    					'itemContent' => $item_content,
	    			);
    			}
    		}
    		 
    	}

    	$response = new Response(json_encode($items));
        return $response;
    }
     			
}
