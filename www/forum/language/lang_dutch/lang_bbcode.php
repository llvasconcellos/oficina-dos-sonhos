<?php
/***************************************************************************
 *                         lang_bbcode.php [dutch]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: lang_bbcode.php,v 1.3.2.2 2002/12/18 15:40:20 psotfx Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

//
// To add an entry to your BBCode guide simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your BBCode guide entries, if you absolutely must then escape them ie. \"something\";
//
// The BBCode guide items will appear on the BBCode guide page in the same order they are listed in this file
//
// If just translating this file please do not alter the actual HTML unless absolutely necessary, thanks :)
//
// In addition please do not translate the colours referenced in relation to BBCode any section, if you do
// users browsing in your language may be confused to find they're BBCode doesn't work :D You can change
// references which are 'in-line' within the text though.
//

$faq[] = array("--","Introductie");
$faq[] = array("Wat is BBCode?", "BBCode is een speciale implementatie van HTML. Of je al dan niet BBCode in je berichten op het forum kan gebruiken is bepaald door de beheerder. Je kan BBCode al dan niet aanzetten bij het posten van een nieuw bericht. BBCode is vergelijkbaar met HTML: tags zijn ingesloten in rechte haken [ en ] in plaats van &lt; en &gt; en BBCode geeft meer controle over wat en hoe iets wordt weergegeven. Afhankelijk van de stijl die je gebruikt kan je BBCode toevoegen aan je berichten doormiddel van de knoppen bovenaan het postformulier. Zelfs als je hier gebruik van maakt is deze gids handig.");

$faq[] = array("--","Tekstopmaak");
$faq[] = array("Hoe vette, cursieve en onderstreepte tekst maken", "BBCode heeft tags die je in staat stellen om snel de basisopmaak van je tekst aan te passen. Dit kan op de volgende manieren: <ul><li>Om een deel van de tekst in het vet te tonen plaats je die tussen <b>[b][/b]</b>, bijvoorbeeld: <br /><br /><b>[b]</b>Hallo<b>[/b]</b><br /><br />wordt: <b>Hallo</b></li><li>Voor onderstreping gebruik je <b>[u][/u]</b>, bijvoorbeeld:<br /><br /><b>[u]</b>Goede morgen<b>[/u]</b><br /><br />wordt: <u>Goede morgen</u></li><li>Voor cursieve tekst gebruik je <b>[i][/i]</b>, bijvoorbeeld:<br /><br />Dit is <b>[i]</b>Geweldig!<b>[/i]</b><br /><br />wordt: Dit is <i>Geweldig!</i></li></ul>");
$faq[] = array("Hoe tekstkleur of -grootte aan te passen", "Om de grootte en kleur van je tekst te wijzigen gebruik je de volgende tags. Bedenk dat hoe de tekst verschijnt afhangt van de browser en het systeem van de lezer: <ul><li>De kleur van tekst kun je wijzigen door deze te plaatsen tussen <b>[color=][/color]</b>. Je kan een erkende kleurnaam gebruiken (bijv. red, blue, yellow, enz.) of de hexidecimale code, bijv. #FFFFFF, #000000. Bijvoorbeeld, om een tekst rood te maken gebruik je:<br /><br /><b>[color=red]</b>Hallo!<b>[/color]</b><br /><br />of<br /><br /><b>[color=#FF0000]</b>Hallo!<b>[/color]</b><br /><br />en dit geeft beide als resultaat: <span style=\"color:red\">Hallo!</span></li><li>De grootte van een tekst aanpassen gebeurt op vergelijkbare wijze met <b>[size=][/size]</b>. Deze tag is afhankelijk van de stijl die je gebruikt maar het aanbevolen formaat is een numerieke waarde die de tekstgrootte geeft in pixels, beginnende bij 1 (zo klein dat je het niet ziet) tot 29 (erg groot). Bijvoorbeeld:<br /><br /><b>[size=9]</b>KLEIN<b>[/size]</b><br /><br />wordt over het algemeen: <span style=\"font-size:9px\">KLEIN</span><br /><br />en:<br /><br /><b>[size=24]</b>GROOT!<b>[/size]</b><br /><br />wordt: <span style=\"font-size:24px\">GROOT!</span></li></ul>");
$faq[] = array("Kan ik verschillende tags samen gebruiken?", "Natuurlijk kan dat, bijvoorbeeld om iemands aandacht te trekken kan je schrijven:<br /><br /><b>[size=18][color=red][b]</b>KIJK ME AAN!<b>[/b][/color][/size]</b><br /><br />en dit geeft als resultaat: <span style=\"color:red;font-size:18px\"><b>KIJK ME AAN!</b></span><br /><br />We raden je overigens af om hele stukken tekst zo op te maken! Vergeet niet te controleren of alle tags correct gesloten zijn, en in de juiste volgorde. Bijvoorbeeld het volgende is niet juist:<br /><br /><b>[b][u]</b>Dit is verkeerd<b>[/b][/u]</b>");

$faq[] = array("--","Citeren en het plaatsen van tekst met vaste breedte");
$faq[] = array("Tekst citeren in antwoorden", "Er zijn twee manieren om een tekst te citeren: met of zonder een referentie.<ul><li>Waneer je de citaat-functie gebruikt om op een bericht te antwoorden zal je zien dat de tekst van het bericht is toegevoegd in het postformulier in een <b>[quote=\"\"][/quote]</b> blok. Deze methode stelt je in staat te citeren met een referentie aan een persoon, of wat jij kiest om in te vullen. Om bijvoorbeeld een stuk tekst van Dhr. Kippentronie te citeren:<br /><br /><b>[quote=\"Dhr. Kippentronie\"]</b>Hier komt Dhr. Kippentronie's tekst<b>[/quote]</b><br /><br />Als resultaat plaatst het forum automatisch \"Dhr. Kippentronie schreef:\" voor het citaat. Onthoud dat je de aanhalingstekens \"\" <b>moet</b> plaatsen rond de naam die je citeert -- ze zijn niet optioneel.</li><li>De tweede methode laat je toe om blindelings iets te citeren. Dit kan door de tekst tussen <b>[quote][/quote]</b> tags te plaatsen. Wanneer je de tekst bekijkt zie je simpelweg \"Citaat:\" voor de tekst zelf staan.</li></ul>");
$faq[] = array("Code of tekst met vaste breedte plaatsen", "Als je een stuk code of een tekst wilt plaatsen waarvoor je een lettertype met vaste breedte nodig hebt, bijvoorbeeld het Courier-lettertype, moet je de tekst tussen <b>[code][/code]</b> tags plaatsen, bijvoorbeeld<br /><br /><b>[code]</b>echo \"Dit is een stuk code\";<b>[/code]</b><br /><br />Alle gebruikte opmaak binnen de <b>[code][/code]</b> tags wordt behouden.");

$faq[] = array("--","Lijsten maken");
$faq[] = array("Een niet-geordende lijst maken", "BBCode ondersteunt twee soorten lijsten, ongeordend en geordend. Deze zijn hoofdzakelijk hetzelfde als hun HTML-equivalenten. Een ongeordende lijst plaatst de punten in je lijst onder elkaar, ingesprongen met een stip ervoor. Om een ongeordende lijst te maken gebruik je <b>[list][/list]</b> en om elk punt aan te duiden <b>[*]</b>. Om bijvoorbeeld je favoriete kleuren aan te duiden gebruik je:<br /><br /><b>[list]</b><br /><b>[*]</b>Rood<br /><b>[*]</b>Blauw<br /><b>[*]</b>Geel<br /><b>[/list]</b><br /><br />Dit resulteert in de volgende lijst:<ul><li>Rood</li><li>Blauw</li><li>Geel</li></ul>");
$faq[] = array("Een geordende lijst maken", "De tweede soort lijst, een geordende lijst, geeft je controle over waar elk punt door voorafgegaan wordt. Om een geordende lijst te maken gebruik je <b>[list=1][/list]</b> voor een genummerde lijst en <b>[list=a][/list]</b> voor een alfabetische lijst. Net als met een niet-geordende lijst duid je de punten aan met <b>[*]</b>. Bijvoorbeeld:<br /><br /><b>[list=1]</b><br /><b>[*]</b>Ga naar de winkel<br /><b>[*]</b>Koop een nieuwe computer<br /><b>[*]</b>Vloek op de computer wanneer hij crasht<br /><b>[/list]</b><br /><br />resulteert in het volgende:<ol type=\"1\"><li>Ga naar de winkel</li><li>Koop een nieuwe computer</li><li>Vloek op de computer wanneer hij crasht</li></ol>Voor een alfabetische lijst gebruik je:<br /><br /><b>[list=a]</b><br /><b>[*]</b>Het eerste antwoord<br /><b>[*]</b>Het tweede antwoord<br /><b>[*]</b>Het derde antwoord<br /><b>[/list]</b><br /><br />en dit geeft:<ol type=\"a\"><li>Het eerste antwoord</li><li>Het tweede antwoord</li><li>Het derde antwoord</li></ol>");

$faq[] = array("--", "Links invoegen");
$faq[] = array("Link naar een andere site", "phpBB BBCode ondersteunt een aantal manieren om URI's, (Uniform Resource Indicators) in te voegen, beter bekend als URL's.<ul><li>De eerste methode die je kan gebruiken is de <b>[url=][/url]</b> tag, na het = teken kun je de url typen en binnen de tag de titel. Bijvoorbeeld om naar phpBB.com te linken, kan je dit gebruiken:<br /><br /><b>[url=http://www.phpbb.com/]</b>Bezoek phpBB!<b>[/url]</b><br /><br />Dit maakt de volgende link: <a href=\"http://www.phpbb.com/\" target=\"_blank\">Bezoek phpBB!</a> Je zal zien dat deze link een nieuw venster opent zodat de gebruiker in het forum kan blijven als hij/zij dat wenst.</li><li>Als je wilt dat de URL zelf getoond wordt als link kan je dit doen door de volgende tag:<br /><br /><b>[url]</b>http://www.phpbb.com/<b>[/url]</b><br /><br />Dit maakt de volgende link: <a href=\"http://www.phpbb.com/\" target=\"_blank\">http://www.phpbb.com/</a></li><li>Daarnaast biedt phpBB een functie genaamd <i>\"Magische Links\"</i>, dit maakt van elke juiste URL een link zonder dat je een tag moet plaatsen of zelfs maar het voorvoegsel http://. Als je bijvoorbeeld www.phpbb.com in een bericht typt krijg je automatisch <a href=\"http://www.phpbb.com/\" target=\"_blank\">www.phpbb.com</a> als je je bericht bekijkt.</li><li>Hetzelfde geldt ook voor een e-mail-adres, je kan ofwel een e-mail-adres expliciet specificeren:<br /><br /><b>[email]</b>niemand@domein.adr<b>[/email]</b><br /><br />wat het volgende weergeeft: <a href=\"emailto:niemand@domein.adr\">niemand@domein.adr</a> of je kan gewoon niemand@domein.adr in je bericht typen en het wordt automatisch naar een e-mail-link omgezet.</li></ul>Zoals met alle BBCode-tags kun je andere tags zoals <b>[img][/img]</b>, <b>[b][/b]</b>, enz. in een URL insluiten (zie volgende onderwerp). Net als met de opmaak-tags is het aan jou erop te letten dat je de tags juist afsluit en in de juiste volgorde gebruikt. Bijvoorbeeld:<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/url][/img]</b><br /><br />is <u>niet</u> juist wat kan leiden tot het wissen van je bericht, dus let hier goed op.");

$faq[] = array("--", "Afbeeldingen tonen in berichten");
$faq[] = array("Een afbeelding toevoegen aan een bericht", "phpBB BBCode biedt een tag om afbeeldingen te plaatsen in je bericht. Twee belangrijke zaken om te onthouden bij het gebruik van deze tag zijn: veel gebruikers hebben niet graag te veel afbeeldingen in berichten, en tevens moet de afbeelding die je wil tonen beschikbaar zijn op het Internet (niet enkel op je computer bijvoorbeeld, tenzij je een webserver draait!). Momenteel is er geen mogelijkheid om afbeeldingen op te slaan met phpBB (er wordt verwacht dat deze zaken worden behandeld in de volgende grote versie van phpBB). Om een afbeelding te tonen moet je de URL die naar de afbeelding verwijst tussen <b>[img][/img]</b> tags plaatsen. Bijvoorbeeld:<br /><br /><b>[img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img]</b><br /><br />Zoals in de bovenstaande paragraaf over URL's beschreven is kan je een afbeelding in <b>[url][/url]</b> tags plaatsen om een link te maken, bijvoorbeeld<br /><br /><b>[url=http://www.phpbb.com/][img]</b>http://www.phpbb.com/images/phplogo.gif<b>[/img][/url]</b><br /><br />geeft:<br /><br /><a href=\"http://www.phpbb.com/\" target=\"_blank\"><img src=\"templates/subSilver/images/logo_phpBB_med.gif\" border=\"0\" alt=\"\" /></a><br />");

$faq[] = array("--", "Overige zaken");
$faq[] = array("Kan ik mijn eigen tags toevoegen?", "Nee, niet in phpBB 2.0. We plannen om aanpasbare BBCode tags aan te bieden in een volgende grote versie.");

//
// This ends the BBCode guide entries
//

?>