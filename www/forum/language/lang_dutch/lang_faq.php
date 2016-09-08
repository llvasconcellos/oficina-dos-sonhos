<?php
/***************************************************************************
 *                          lang_faq.php [dutch]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: lang_faq.php,v 1.4.2.3 2002/12/18 15:40:20 psotfx Exp $
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
// To add an entry to your FAQ simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your FAQ entries, if you absolutely must then escape them ie. \"something\";
//
// The FAQ items will appear on the FAQ page in the same order they are listed in this file
//

$faq[] = array("--","Login en registratie");
$faq[] = array("Waarom kan ik niet inloggen?", "Ben je geregistreerd? Uiteraard moet je eerst lid worden om in te kunnen loggen. Ben je wellicht verbannen van het forum (als dat het geval is wordt dit gemeld tijdens het inloggen)? In dat geval kan je het beste contact opnemen met de beheerder of webmaster van het forum om uit te vinden waarom. Indien je geregistreerd en niet verbannen bent kun je het beste je inlog-gegevens nogmaals controleren. Zorg er ook voor dat Caps Lock uitstaat op je toetsenbord. Kijk ook in je e-mail of je geen activatie-e-mails hebt ontvangen van het forum. Meestal is dat het probleem, indien dit niet zo is, neem dan contact op met de forumbeheerder -- het kan zijn dat het forum verkeerd geconfigureerd is.");
$faq[] = array("Waarom moet ik eigenlijk registreren?", "Misschien hoeft dit niet eens -- het is aan de forumbeheerder om te bepalen of je al dan niet moet registreren om berichten te kunnen plaatsen. Registratie geeft je echter toegang tot bijkomende functies die voor gasten niet beschikbaar zijn, zoals het kiezen van avatar-afbeeldingen, de mogelijkheid tot priv&eacute;berichten, e-mailen naar andere gebruikers, lid worden van gebruikersgroepen, enz. Het neemt slechts een paar minuten in beslag dus het is aan te bevelen om te registreren.");
$faq[] = array("Waarom word ik automatisch uitgelogd?", "Als je <i>Log mij automatisch in</i> niet aanvinkt bij het inloggen, word je na een bepaalde tijd weer uitgelogd. Dit voorkomt misbruik van je account door iemand anders. Indien je dat vakje wel aanvinkt blijf je ingelogd, dit is echter niet aan te raden op een publieke PC op b.v. een universiteit, in een bibliotheek of Internetcaf&eacute;.");
$faq[] = array("Hoe kan ik vermijden dat mijn gebruikersnaam verschijnt in de lijst met actieve leden?", "In je profiel staat een optie <i>Laat andere gebruikers niet weten dat ik online ben</i>, indien je kiest voor <i>Ja</i> ben je alleen zichbaar voor forumbeheerders en jouzelf. Je wordt geteld als een verborgen gebruiker.");
$faq[] = array("Ik ben mijn wachtwoord kwijt!", "Geen paniek! Hoewel je wachtwoord niet teruggehaald kan worden, kan het er wel een nieuw wachtwoord aangemaakt worden. Ga om dit te doen naar de Inlog-pagina en klik op <u>Ik ben mijn wachtwoord vergeten</u>. Volg hierna de instructies, en er wordt een nieuw wachtwoord opgestuurd naar het e-mail-adres dat in je profiel staat.");
$faq[] = array("Ik heb me geregistreerd maar kan niet inloggen!", "Kijk eerst na of je je juiste gebruikersnaam en wachtwoord hebt ingetypt. Indien deze correct zijn kunnen er twee oorzaken zijn: indien COPPA-ondersteuning is ingeschakeld en je hebt geklikt op <u>Ik stem toe met de voorwaarden en ben jonger dan 13 jaar</u> bij het registreren, dan moet je de instructies volgen die je per e-mail hebt ontvangen. Indien dit niet het geval is kan het dat je account geactiveerd moet worden. Sommige forums vereisen dat alle nieuwe registraties worden geactiveerd, of door uzelf of door de forumbeheerder voordat je kan inloggen. Bij registratie wordt dit ook vermeld. Indien je een e-mail hebt ontvangen volg dan de instructies, indien je geen e-mail hebt ontvangen, controleer dan dat het ingevulde adres klopt. Een van de redenen waarom activatie wordt gebruikt, is om de kans te verkleinen dat kwaadwillenden anoniem uit jouw naam misbruik kunnen maken van dit forum. Indien je zeker bent van het e-mail-adres, neem dan contact op met de beheerder.");
$faq[] = array("Ik heb in het verleden geregistreerd maar kan niet meer inloggen!", "De meest aannemelijke redenen hiervoor zijn: je hebt een onjuiste gebruikersnaam of wachtwoord ingegeven (controleer de e-mail die je indertijd bij registratie hebt ontvangen) of de beheerder heeft je account gewist voor een bepaalde reden. Indien het laatste het geval is, kan dit misschien zijn omdat je nooit iets hebt gepost. Het is gebruikelijk voor forums om periodiek gebruikers te wissen die niets hebben gepost om de grootte van de database te beperken. Probeer opnieuw te registreren en doe mee aan de discussies.");

$faq[] = array("--","Gebruikersvoorkeuren");
$faq[] = array("Hoe verander ik mijn instellingen?", "Al je instellingen zijn (indien je geregistreerd bent) opgeslagen in de database. Om deze aan te passen klik je op de <u>Profiel</u>-link (meestal bovenaan de pagina maar dit hoeft niet altijd zo te zijn). Dit stelt je in staat om al je instellingen te wijzigen.");
$faq[] = array("De tijden zijn niet juist!", "De tijden zijn bijna zeker juist, echter, wat je ziet kunnen tijden zijn getoond in een andere tijdzone dan die waar je je in bevindt. Als dit zo is moet je in je profiel je tijdzone instellen op die waar je je in bevindt, bijv. Londen, Parijs, New York, Sydney, enz. Let wel dat het aanpassen van de tijdzone, zoals de meeste instellingen, enkel kan worden gedaan door geregistreerde gebruikers. Als je niet geregistreerd bent is dit een goed tijdstip om je te registreren.");
$faq[] = array("Ik veranderde de tijdzone en de tijd is nog steeds fout!", "Indien je zeker bent dat de tijdzone correct is ingesteld en de tijd is nog steeds verkeerd, dan is het meest voor de hand liggende antwoord zomertijd. Dit forum is niet ontworpen om een onderscheid te maken tussen wintertijd en zomertijd, waardoor tijdens de zomermaanden de tijd een uur verschilt met de werkelijke tijd.");
$faq[] = array("Mijn taal staat niet in de lijst!", "De meest voorkomende redenen hiervoor zijn dat de  beheerder deze taal niet heeft ge&iuml;nstalleerd of nog niemand een vertaling heeft geschreven voor jouw taal. Vraag aan de forumbeheerder om jouw taal te installeren. Indien deze niet bestaat kan je deze vertaling ook zelf schrijven. Meer informatie kan gevonden worden op de phpBB-website (zie link onderaan elke pagina).");
$faq[] = array("Hoe kan ik een afbeelding tonen onder mijn gebruikersnaam?", "Er kunnen twee afbeeldingen staan onder een gebruikersnaam bij het bekijken van posts. De eerste is een afbeelding verbonden met je rang, meestal in de vorm van sterren of blokjes die hoeveel posts je gemaakt hebt of je status op het forum aangeven. Daaronder staat vaak een grotere afbeelding, beter bekend als een avatar, en deze is meestal persoonlijk voor elke gebruiker. Het is aan de forumbeheerder om avatars toe te staan en de wijze waarop avatars kunnen worden geselecteerd te kiezen. Indien je geen avatars kan gebruiken is dit een keuze van de forumbeheerder, vraag hem/haar naar de reden (je kunt er zeker van zijn dat de beheerder hier een goede reden voor heeft!).");
$faq[] = array("Hoe kan ik mijn rang aanpassen?", "Over het algemeen kan dit niet (je rang verschijnt onder je gebruikersnaam in onderwerpen en je profiel afhankelijk van de stijl). Meestal wordt de rang gebruikt om aan te tonen hoeveel berichten je hebt geplaatst en om sommige speciale gebruikers te tonen, bijvoorbeeld moderators en beheerders kunnen een speciale rang hebben. Misbruik het forum niet door onnodige berichten te plaatsen om zo sneller van rang te verhogen -- hierdoor is het mogelijk dat de moderator of beheerder het aantal berichten verlaagd.");
$faq[] = array("Waneer ik klik op de e-mail van een gebruiker wordt mij verzocht in te loggen", "Sorry, maar alleen geregistreerde gebruikers kunnen e-mail verzenden via het ingebouwde e-mail-formulier (als de beheerder deze functie heeft ingeschakeld). Dit is om misbruik van het e-mail-systeem door anonieme gebruikers te voorkomen.");

$faq[] = array("--","Berichten plaatsen");
$faq[] = array("Hoe plaats ik een onderwerp in een forum?", "Eenvoudig -- klik op de overeenstemmende knop in het forum of onderwerp. Misschien moet je registreren om een bericht te plaatsen. De beschikbare mogelijkheden staan in een lijst onderaan de pagina (de <i>Je mag nieuwe onderwerpen plaatsen in dit subforum, Je mag reacties plaatsen in dit subforum</i>, enz. lijst).");
$faq[] = array("Hoe kan ik een bericht bewerken of wissen?", "Tenzij je een beheerder of moderator bent kan je enkel je eigen berichten bewerken of wissen. Je kan een bericht bewerken (soms maar een beperkte tijd na het aanmaken) door te klikken op de <i>Wijzig</i>-knop van het te wijzigen bericht. Indien iemand reeds geantwoord heeft op je bericht vind je een kleine tekst onderaan het bericht, deze geeft het aantal keer dat je je bericht bewerkt hebt aan. Dit komt enkel te voorschijn indien iemand heeft geantwoord, het komt ook niet tevoorschijn als moderators of beheerders het bericht bewerkt hebben (zij zouden een bericht moeten achterlaten dat vertelt wat ze hebben aangepast en waarom). Let op: Normale gebruikers kunnen geen berichten wissen zodra erop geantwoord is.");
$faq[] = array("Hoe kan ik een onderschrift toevoegen aan mijn bericht?", "Om een onderschrift toe te voegen aan een bericht moet je eerst een onderschift instellen, dit kan je doen via je profiel. Zodra je een onderschrift hebt aangemaakt kan je het <i>Onderschrift toevoegen</i>-vakje aankruisen op het postformulier om je onderschrift toe te voegen. Je kan ook automatisch je onderschrift laten toevoegen aan al je berichten door de overeenstemmende optie te kiezen in je profiel. Zelfs dan kun je er nog per bericht voor kiezen om je onderschrift niet toe te voegen, door het <i>Onderschrift toevoegen</i>-vakje uit te schakelen op het postformulier.");
$faq[] = array("Hoe kan ik een poll (opiniepeiling) maken?", "Een poll maken is eenvoudig -- wanneer je een nieuw onderwerp plaatst (of het eerste bericht van een onderwerp bewerkt, als je die rechten hebt) zie je een formulier <i>Voeg een poll toe</i> onderaan het postformulier. Indien je dit niet ziet heb je waarschijnlijk geen rechten om polls te maken. Je moet eerst een titel opgeven en vervolgens minstens twee opties -- om een optie aan de poll toe te voegen typ je een optie en klik je op de <i>Keuze toevoegen</i>-knop. Je kan ook een tijdslimiet instellen voor de poll, 0 voor een eeuwig geldige poll. Er is een limiet op het aantal opties, die is ingesteld door de beheerder.");
$faq[] = array("Hoe kan ik een poll (opiniepeiling) bewerken of wissen?", "Net als met berichten kunnen polls enkel bewerkt worden door de persoon die ze heeft geplaatst, een moderator of de beheerder. Klik om een poll te bewerken op <i>Wijzig</i> in het eerste bericht in het onderwerp, dat altijd de poll bevat. Indien niemand heeft gestemd kun je de poll verwijderen of elke optie verwijderen of bewerken. Als er echter al gestemd is, kunnen alleen moderators en beheerders de poll bewerken of verwijderen. Dit is om te voorkomen dat mensen polls be&iuml;nvloeden door opties te veranderen terwijl de poll loopt.");
$faq[] = array("Waarom krijg ik geen toegang tot een forum?", "Sommige forums kunnen voorbehouden zijn aan bepaalde gebruikers of groepen. Om deze te bekijken, lezen, berichten te plaatsen, enz. heb je speciale rechten nodig, die alleen de moderators en beheerders kunnen verlenen. Neem contact op met hen.");
$faq[] = array("Waarom kan ik niet stemmen in polls?", "Alleen geregistreerde gebruikers kunnen stemmen in een poll om be&iuml;nvloeding van resulaten te voorkomen. Indien je geregistreerd bent en nog steeds niet kan stemmen heb je waarschijnlijk niet de nodige toegangsrechten.");

$faq[] = array("--","Opmaak en onderwerptypen");
$faq[] = array("Wat is BBCode?", "BBCode is een speciale implementatie van HTML. Of je al dan niet BBCode kan gebruiken wordt bepaald door de beheerder. Je kan dit ook per bericht uitschakelen op het postformulier. BBCode op zich is vergelijkbaar met HTML, tags zijn ingesloten in rechte haken [ en ] inplaats van &lt; en &gt; en BBCode geeft een betere controle over wat en hoe iets wordt getoond. Zie voor meer informatie de gids die je kunt bereiken via het postformulier.");
$faq[] = array("Kan ik HTML gebruiken?", "Dat hangt er vanaf of de beheerders dit toelaten, zij hebben er volledige controle over. Indien je HTML kan gebruiken, zullen maar een paar tags werken. Dit is een <i>veiligheids</i>procedure om misbruik van het forum te voorkomen door gebruik van tags die de opmaak kunnen schaden of andere problemen kunnen veroorzaken. Als HTML ingeschakeld is kun je het per bericht uitschakelen op het postformulier.");
$faq[] = array("Wat zijn smilies?", "Smilies, of emoticons, zijn kleine afbeeldingen die gebruikt kunnen worden gebruikt bepaalde gevoelens uit te drukken met een code, zo betekent bijvoorbeeld :) gelukkig, en :( triest. De volledige lijst van emoticons kan geraadpleegd worden via het postformulier. Probeer niet teveel smileys te plaatsen in je berichten, want ze kunnen een bericht onleesbaar maken en een moderator kan beslissen deze te verwijderen of het bericht in zijn geheel te verwijderen.");
$faq[] = array("Kan ik afbeeldingen plaatsen?", "Afbeeldingen kunnen inderdaad worden getoond in je berichten. Echter, er is momenteel geen functie om afbeeldingen te uploaden naar dit forum. Daarom moet je een link plaatsen naar een afbeelding opgeslagen op een openbaar toegankelijke webserver, bijvoorbeeld http://www.een-onbekende-plaats.net/mijn-foto.gif. Je kan niet linken naar afbeeldingen opgeslagen op je eigen PC (tenzij het een openbaar toegankelijke server is) noch afbeeldingen opgeslagen op beveiligde locaties, zoals Hotmail- of Yahoo-mailboxen, sites met wachtwoordbeveiliging, enz. Gebruik om de afbeelding in te voegen ofwel de BBCode-tag [img] of toepasselijke HTML (indien toegelaten). Afbeeldingen dienen altijd te eindigen op .jpg, .jpeg, .gif of .png.");
$faq[] = array("Wat zijn mededelingen?", "Mededelingen bevatten meestal belangrijke informatie en moet je daarom zo snel mogelijk lezen. Mededelingen verschijnen bovenaan van elke pagina in het forum waar ze zijn geplaatst. Of je al dan niet een mededeling kan plaatsen hangt af van de permissies die je nodig hebt, die zijn ingesteld door de beheerder.");
$faq[] = array("Wat zijn Sticky-onderwerpen?", "Sticky-onderwerpen verschijnen onder de mededelingen in het forum en enkel op de eerste bladzijde. Deze zijn meestal van belang dus moet je ze bij voorkeur lezen. Net als met mededelingen is het de beheerder die bepaalt wie Sticky-onderwerpen kan plaatsen in welk forum.");
$faq[] = array("Wat zijn gesloten onderwerpen?", "Gesloten onderwerpen zijn zodanig ingesteld door de moderator van dat forum of door de beheerder. Je kan niet antwoorden op gesloten onderwerpen een eventuele poll wordt automatisch be&euml;indigd. Onderwerpen kunnen gesloten worden om verschillende redenen.");

$faq[] = array("--","Gebruikersniveau's en -groepen");
$faq[] = array("Wat zijn Beheerders?", "Beheerders zijn mensen met de meeste controle over het forum. Deze mensen hebben controle over alle facetten van dit forum zoals het instellen van permissies, verbanning van gebruikers, aanmaken van gebruikersgroepen of moderatoren, enz. Zij hebben ook alle rechten die moderators hebben in alle forums.");
$faq[] = array("Wat zijn Moderators?", "Moderators zijn personen (of groepen van personen) wiens werk het elke dag op het forum te letten. Zij hebben het vermogen om berichten te bewerken, te wissen en onderwerpen te sluiten, heropenen, verplaatsen, wissen en splitsen in het forum waar zij moderator van zijn. Over het algemeen zijn moderators er om te voorkomen dat mensen <i>off-topic</i> gaan (afwijken van het onderwerp) of verwerpelijk materiaal plaatsen.");
$faq[] = array("Wat zijn Gebruikersgroepen?", "Gebruikersgroepen zijn een manier waarop beheerders gebruikers in een groep kunnen plaatsen. Elke gebruiker kan lid zijn van meerdere groepen en elke groep kan andere toegangsrechten toegewezen kregen. Dit maakt het gemakkelijk voor de beheerders om verschillende gebruikers moderator van een forum te maken, of toegang te verlenen aan een priv&eacute;forum, enz.");
$faq[] = array("Hoe kan ik lid worden van een gebruikersgroep?", "Om lid te worden van een gebruikersgroep klik je op de Gebruikersgroepen-link bovenaan de pagina (afhankelijk van de stijl die je gebruikt), en je kan alle gebruikersgroepen zien. Niet alle groepen hebben <i>open toegang</i> -- sommige zijn gesloten en andere hebben misschien verborgen lidmaatschap. Als de groep open is kan je een aanvraag tot toetreding doen door te klikken op de overeenstemmende knop. De groepsmoderator moet je aanvraag goedkeuren, deze kan je vragen waarom je wil toetreden tot een groep. Leg je neer bij het besluit van een groepsmoderator indien deze je aanvraag afkeurt -- deze zal daar goede redenen voor hebben.");
$faq[] = array("Hoe kan ik een groepsmoderator worden?", "Gebruikersgroepen zijn in eerste instantie gecre&euml;erd door de beheerders, zij kiezen ook een groepsmoderator. Indien je interesse hebt in het stichten van een gebruikersgroep moet je eerst contact opnemen met de beheerder, stuur hem/haar een priv&eacute;bericht.");

$faq[] = array("--","Priv&eacute; berichten");
$faq[] = array("Ik kan geen priv&eacute;berichten verzenden!", "Hier kunnen drie redenen voor zijn: je bent niet geregistreerd en/of niet ingelogd, de beheerder heeft priv&eacute;berichten uitgeschakeld voor het gehele forum of de beheerder heeft je verhinderd priv&eacute;berichten te verzenden. Is het laatste het geval, dan zou je de beheerder moeten vragen waarom.");
$faq[] = array("Ik krijg steeds ongewenste priv&eacute;berichten!", "In de toekomst wordt er een lijst met ongewenste afzenders toegevoegd aan het priv&eacute;berichtensysteem. Voorlopig echter, moet je de forumbeheerder op de hoogte stellen als je ongewenste berichten van iemand blijft ontvangen -- deze heeft de mogelijkheid om een gebruiker te verhinderen priv&eacute;berichten te verzenden.");
$faq[] = array("Ik heb spam of beledigende e-mail gekregen van iemand van dit forum!", "We vinden het spijtig dit te horen. Het e-mail-formulier van dit forum heeft beveiligingen om zulke gebruikers op te sporen. Stuur een e-mail naar de beheerder met een volledige kopie van de e-mail die je ontvangen hebt, het is heel belangrijk dat deze ook de \"headers\" bevat (deze geven details over de gebruiker die de e-mail heeft verzonden). Dan kan de beheerder actie ondernemen.");

//
// These entries should remain in all languages and for all modifications
//
$faq[] = array("--","phpBB 2-gerelateerde zaken");
$faq[] = array("Wie heeft deze software geschreven?", "Deze software (in haar oorspronkelijke vorm) is geproduceerd door, uitgebracht door en intellectueel eigendom van <a href=\"http://www.phpbb.com/\" target=\"_blank\">phpBB Group</a>. De software is beschikbaar gesteld onder de GNU General Public License en mag vrij worden verspreid; zie de link voor meer informatie.");
$faq[] = array("Waarom is een bepaalde functie niet beschikbaar?", "Deze software is geschreven door en intellectueel eigendom van phpBB Group. Als jij van mening bent dat een bepaalde functie moet worden toegevoegd, bezoek dan de phpbb.com-website om te kijken wat de phpBB Group te zeggen heeft. Plaats alsjeblieft geen functieverzoeken op het forum van phpbb.com, aangezien de groep sourceforge gebruikt om deze verzoeken af te handelen. Lees de fora en kijk wat onze mening over een dergelijke cuntie is, en volg dan de procedure aldaar.");
$faq[] = array("Met wie kan ik contact opnemen over misbruik en/of juridische zaken in verband met dit forum?", "Je moet contact opnemen met de forumbeheerder. Als je er niet achter kunt komen wie dit is, neem dan eerst contact op met een van de moderators en vraag deze met wie je uiteindelijk contact op moet nemen. Indien geen reactie moet je contact opnemen met de eigenaar van het domein (je kunt een \"whois lookup\" doen) of, als het forum op een gratis dienst draait (zoals yahoo, free.fr, f2s.com, enz.), het beheer of de misbruikafdeling van die dienst. Onthoud dat phpBB Group geen controle heeft en op geen enkele manier verantwoordelijk kan worden gehouden voor hoe, waar en door wie dit forum wordt gebruikt. Het is volkomen zinloos om contact op te nemen met phpBB Group over enige juridische zaak (be&euml;indiging, verantwoordelijkheid, beledigende opmerkingen, etc.) niet direct aangaande de phpbb.com-website of de software van phpBB zelf. Als je een e-mail stuurt aan phpBB Group over enig gebruik van deze software door een derde partij kun je rekenen op een korte reactie of helemaal geen reactie.");

?>