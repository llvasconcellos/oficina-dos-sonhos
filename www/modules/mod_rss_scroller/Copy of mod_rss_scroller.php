<?php
/**
 * @version 1.5 02/01/2009 RSS Scroller 1.5
 * @package Joomla
 * @copyright Copyright (C) 2009 Stefano Alì. All rights reserved.
 * @http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
defined('_JEXEC') or die('Restricted access');
global $database, $mainframe;

require_once(JPATH_ROOT.DS."includes/domit/xml_domit_rss_lite.php");

$database = &JFactory::getDBO();

$document = &JFactory::getDocument();
$document->addScript( JURI::base() . '/modules/mod_rss_scroller/qscroller.js' );
$document->addStyleSheet( JURI::base() . '/modules/mod_rss_scroller/qscroller.css' );


/*************************************
 * RECUPERO DEI PARAMETRI DEL MODULO *
 *************************************/
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



/**********************************************
 * ESTRAPOLAZIONE ID DEI FEED DA VISUALIZZARE *
 **********************************************/
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



/******************************************
 * VISUALIZZAZIONE DELLE NOTIZIE DEI FEED *
 ******************************************/
// se si sono verificati errori nella query SQL, visualizzo un messaggio di errore
if($feeds == null){
    echo "<span class='newsfeedheading'>Impossibile recuperare i feed.</span>";
}
else{
    // apro il tag HTML dello scroller con tutte le impostazioni
   /* echo "<marquee behavior='scroll' align='$align' direction='$direction' " .
         "height='$height' scrollamount='$scrollamount' scrolldelay='$scrolldelay' " .
         "truespeed onmouseover='this.stop();' onmouseout='this.start();'>";*/
		 
		 
		 echo('<div id="qscroller1"></div><div class="hide">');


		 
		 
		 
         

    // ciclo su tutti i record recuperati dalla query.
    // ogni record rappresenta un feed RSS e potrebbe contenere al suo interno
    // più di un canale di informazioni; ogni canale contiene le notizie.
    // quindi ci saranno 3 cicli innestati:
    // 1 - un ciclo su tutti i record (feed) recuperati
    // 2 - per ogni record, un ciclo su tutti i canali contenuti
    // 3 - per ogni canale, un ciclo su tutte le notizie
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

        // ciclo su tutti i canali contenuti nel feed RSS corrente
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
                $str = '<div class="qslide">';
                if($itemCounter == 1)
                    $str .= "[" . ($j+1) . "/$itemsToView] ";
                $str .= str_replace(" ", "&nbsp;" ,$currItem->getDescription() . " <b>(" . $currItem->getTitle() . ")</b>") . "</div>";
                        
                $notizie[] = $str;
            }
            // a seconda del tipo di direzione, devo impaginare le notizie in maniera diversa
            switch($direction){
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
            }
        }
    }
    
    echo "</div>\n";
	?>
	<script type="text/javascript">
		<!--
		window.addEvent('domready', function() {
		var opt = {
		  duration: 8000,
		  delay: 3000,
		  auto:true,
		  onMouseEnter: function(){this.stop();},
		  onMouseLeave: function(){this.play();}
		}
		var scroller = new QScroller('qscroller1',opt);
		scroller.load();
		});
		//-->
	</script>
<?
}
?>