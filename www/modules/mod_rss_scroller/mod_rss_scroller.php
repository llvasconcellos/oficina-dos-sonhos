<?php
defined('_JEXEC') or die('Restricted access');
global $database, $mainframe;

require_once(JPATH_ROOT.DS."includes/domit/xml_domit_rss_lite.php");

$database = &JFactory::getDBO();

$document = &JFactory::getDocument();
$document->addScript( JURI::base() . '/modules/mod_rss_scroller/scrollerscript.js' );
$document->addStyleSheet( JURI::base() . '/modules/mod_rss_scroller/scrollerstyle.css' );


$newsfeed = $params->get("newsfeed", "0");
$charset = $params->get("charset", "UTF-8");
$channelCounter = intval($params->get("channelCounter", "1"));
$itemCounter = intval($params->get("itemCounter", "1"));
$showChannel = intval($params->get("showChannel", "1"));
$direction = trim($params->get("direction", "up"));
$align = trim($params->get("align", "center"));
$height = intval($params->get("height", "150"));
$scrollamount = intval($params->get("scrollamount", "1"));
$scrolldelay = intval($params->get("scrolldelay", "50"));
$target = trim($params->get("target", "_blank"));


// trasformo la stringa degli ID in un array, considerando la virgola come separatore
$arrID = explode(",", $newsfeed);
// siccome gli ID devono essere numeri interi, li forzo ad esserlo
for($i = 0; $i < count($arrID); $i++)
    $arrID[$i] = intval($arrID[$i]);
// lo ordino in base agli ID perchè devo eliminare tutti i valori negativi,
// se presenti nella lista insieme ad altri valori
sort($arrID);
// elimino dalla testa dell'array tutti gli elementi negativi
while(is_array($arrID) && count($arrID) > 0 && $arrID[0] <= 0)
    array_shift($arrID);


/****************************************
 * PREPARAZIONE ED ESECUZIONE QUERY SQL *
 ****************************************/
// se l'array è vuoto significa che c'erano solo elementi nulli/negativi,
// quindi recupero tutti i feed registrati in Joomla
if(count($arrID) == 0){
    $database->setQuery("SELECT * " .
                        "FROM #__newsfeeds " .
                        "WHERE published=1 " .
                        "ORDER BY ordering");
    $feeds = $database->loadObjectList();
}
// se l'array non è vuoto, contiene almeno un ID da recuperare
// per il recupero viene utilizzara la clausola IN a cui viene passato l'elenco
// (comma-separated) degli ID; in questo modo si riescono a gestire anche
// eventuali ID inesistenti
else{
    $database->setQuery("SELECT * " .
                        "FROM #__newsfeeds " .
                        "WHERE published=1 AND id IN (" . implode(",", $arrID) . ") " .
                        "ORDER BY ordering");
    $feeds = $database->loadObjectList();
}

if($feeds == null){
    echo "<span class='newsfeedheading'>Impossibile recuperare i feed.</span>";
}
else{

echo('<div class="gk_news_highlighter" id="news-highlight-8">
<div class="gk_news_highlighter_wrapper">
<div class="nowrap">
<span class="gk_news_highlighter_desc">');

	foreach($feeds as $feed) {
        $cacheDir = JURI::root()."/cache/";
        $LitePath = JURI::root()."/includes/Cache/Lite.php";

        // istanzio l'oggetto per la gestione dei feed
        $rssDoc =& new xml_domit_rss_document_lite();
        $rssDoc->useCacheLite(true, $LitePath, $cacheDir, $feed->cache_time);
        $rssDoc->loadRSS($feed->link);
        
        // ricavo il numero totale di canali contenuti nel feed corrente
        // si ricorda che "feed=record della tabella"
        $totalChannels = $rssDoc->getChannelCount();
		
		
		for($i = 0; $i < $totalChannels; $i++) {
            // recupero l'i-esimo canale
            $currChannel =& $rssDoc->getChannel($i);

            // visualizzo l'intestazione di ogni canale, se richiesta
            if($showChannel == 1 ){
                echo "<span class='newsfeedheading'>";
                if($channelCounter == 1)
                    echo "[" . ($i+1) . "/$totalChannels] ";
                echo "<a href='" . $currChannel->getLink() . "' target='$target'>" . htmlentities($currChannel->getTitle(), ENT_QUOTES, $charset) . "</a></span>";
                // a seconda del tipo di direzione, devo impaginare i canali in maniera diversa
                switch($direction){
                    case "left":
                    case "right":
                        echo "&nbsp;" . htmlentities($currChannel->getDescription(), ENT_QUOTES, $charset);
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n";
                        break;
                    case "up":
                    case "down":
                    default:
                        echo "<br />" . htmlentities($currChannel->getDescription(), ENT_QUOTES, $charset);
                        echo "<br /><hr />\n";
                        break;
                }
            }
			 // determino il numero di notizie da visualizzare, confrontando il
            // numero di notizie presenti nel canale, con il numero di notizie
            // da visualizzare, impostate da Joomla (menu Componenti/News feed/Gestione News feed).
            // il valore usato è il più piccolo dei 2
            $itemsToView = min($feed->numarticles, $currChannel->getItemCount());

            // ciclo su tutte le notizie da visualizzare
            // e le inserisco in un array per poi visualizzarle
            $notizie = array();
            for($j = 0; $j < $itemsToView; $j++) {
                // recupero la notizia i-esima
                $currItem =& $currChannel->getItem($j);

                // preparo la stringa della notizia i-esima
                $str = '';
                if($itemCounter == 1)
                    $str .= "[" . ($j+1) . "/$itemsToView] ";
				echo '<span style="padding-left:10px;padding-right:10px;">' . $currItem->getDescription() . " <b>(" . $currItem->getTitle() . ")</b>" . "</span>";
                        
                //$notizie[] = $str;
            }
            // a seconda del tipo di direzione, devo impaginare le notizie in maniera diversa
            /*switch($direction){
                case "left":
                case "right":
                    echo implode("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n", $notizie);
                    break;
                case "up":
                case "down":
                default:
                    echo implode("<br /><br />\n", $notizie);
                    break;
            }

            // a seconda del tipo di direzione, devo impaginare i canali in maniera diversa
            // inserisco un separatore tra i canali
            switch($direction){
                case "left":
                case "right":
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n";
                    break;
                case "up":
                case "down":
                default:
                    echo "<hr />\n";
                    break;
            }*/
        }
		
	}
	echo "</span></div></div></div>";
	?>
	<script type="text/javascript">
		<!--
		try {$Gavick;}catch(e){$Gavick = {};};
		$Gavick["gk_news_highlighternews-highlight-8"] = {
			"animationType" : 0,
			"animationSpeed" : 50,
			"animationInterval" : 500,
			"animationFun" : Fx.Transitions.linear,
			"mouseover" : 1};

		//-->
	</script>
	<?
}

?>