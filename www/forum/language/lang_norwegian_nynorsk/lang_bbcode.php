<?php
/***************************************************************************
 *                         lang_bbcode.php [Nynorsk]
 *                            -------------------
 *    begin                : 20. feb 2004
 *    copyright            : (C) 2001 The phpBB Group
 *    email                : support@phpbb.no
 *
 *               $Id: lang_main.php, v 1.0.0 23. feb 2004$
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
// Norwegian - Nynorsk translation by Reiel Haugland.
//
// Nynorsk is one of two varations of the Norwegian language, the other is 
// "bokmål", which normally is just refered to as norwegian. Feel free to 
// mail me at reiel@organizer.net if you have any questions concering this matter.
// 

//
// Nynorsk omsetting av Reiel Haugland. 
//
// Spørsmål, kommentarar, rettingar og elles andre ting som har med denne 
// språkpakka å gjere, kan sendast til reiel@organizer.net, evt. leggast ut 
// i forumet på www.phpbb.no 
// Meir informasjon i LES MEG fila som er inkludert i språkpakken
//

//
// To add an entry to your BBCode guide simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your BBCode guide entries, if you absolutely must then escape them ie. \"something\";
//
// The BBKode guide items will appear on the BBCode guide page in the same order they are listed in this file
//
// If just translating this file please do not alter the actual HTML unless absolutely necessary, thanks :)
//
// In addition please do not translate the colours referenced in relation to BBCode any section, if you do
// users browsing in your language may be confused to find they're BBCode doesn't work :D You can change
// references which are 'in-line' within the text though.
//


$faq[] = array("--","Introduksjon");
$faq[] = array("Kva er BBKode?", "BBKode er ei tilpassa utgåve av HTML, og det er opp til administrator om du har høve til å nytte BBKode i innlegga dine. Du kan og sjølv deaktivere BBKode i kvart enkelt innlegg om du ynskjer det. BBKode er er lik i stilen som HTML, men brukar [ og ] i staden for &lt; og &gt;. Du har og meir kontroll med kva og korleis innhaldet blir vist. Avhengig av kva stil som blir nytta, eller kva stil du sjølv har valdt, er det enkelt å bruke BBKode med hjelp av knappane på skjemaet for å legge til innlegg.<br /><br />");

$faq[] = array("--","Tekst formatering");
$faq[] = array("Korleis kan eg skrive feit, kursiv og understreka tekst?", "BBKode har taggar som gjer det lett å formatere tekst på følgjande måtar: <ul><li>For å gjere tekst feit omgjev du den med <b>[b][/b]</b>, f.eks. <br /><br /> <b>[b]</b>Feit tekst<b>[/b]</b><br /><br />blir formatert slik: <b>Feit tekst</b><br /><br /></li><li>Bruk <b>[u][/u]</b> for å understreke tekst, f.eks. <br /><br /><b>[u]</b>Understreka tekst<b>[/u]</b><br /><br />blir formatert slik: <u>Understreka tekst<br /><br /></u></li><li>Bruk <b>[i][/i]</b> for å sette tekst i kursiv , f.eks.<br /><br /><b>[i]</b>Dette er kursiv<b>[/i]</b><br /><br /> blir formatert slik: <i>Dette er kursiv</i><br /><br /></li></ul>");
$faq[] = array("Korleis kan eg endre tekststorleik og farge?", "Du kan bruke følgjande taggar for å endre farge og storleik på teksten, men hugs at formateringa vil kunne variere i forskjellige nettlesarar og operativsystem. <ul><li>Du kan endre farge med <b>[color=][/color]</b>, og du kan nytte godkjente fargenavn (f.eks. red, blue, yellow, osv.) eller heksadesimalkode (f.eks. #FFFFFF, #000000). For å formatere teksten med raud kan du bruke : <br /><br /><b>[color=red]</b>Dette er raud tekst<b>[/color]</b><br /> <br />eller<br /><br /><b>[color=#FF0000]</b>Dette er raud tekst<b>[/color]</b><br /><br /> som begge vil formatere teksten slik : <span style=\"color:red\">Dette er raud tekst</span><br /><br /> </li><li> Du kan endre storleik på same måten med <b>[size=][/size]</b>. Denne taggen er avhegning av kva stil forumet nyttar, men det er anbefalt å bruke nummerisk verdi for å angi storleik i pikslar. Du kan angi størrelser frå 1 (som gjev nærmast uleselig tekst) og opp til 29 (som blir veldig stort). <br /><br /><b>[size=9]</b> liten tekst<b>[/size]</b><br /><br />blir formatert slik: <span style=\"font-size:9px\">liten tekst </span><br /><br />og<br /><br /><b>[size=24]</b>STOR TEKST<b>[/size]</b><br /><br /> blir formatert slik:  <span style=\"font-size:24px\">STOR TEKST</span></li></ul>");
$faq[] = array("Kan eg kombinere formateringstaggar?", "Ja, for å vekke oppmerksomheit kan du f.eks. nytte :<br /><br /><b>[size=18][color=red][b]</b>LES HER!<b>[/b][/color][/size]</b><br /><br />som blir formatert slik: <span style=\"color:red;font-size:18px\"><b>LES HER!</b></span><br /><br />Vi anbefaler at du ikkje nytter dette mykje, det kan bli vanskelig å lese og det er opp til deg som skriv innlegget å sørge for at du bruker korrekt formatert BBKode. Det er f.eks. lett å \"gå seg vekk\" viss du bruker mange taggar oppå kvarandre, følgjande er eit eksempel på dette :<br /><br /><b>[b][u]</b> Dette er feil!<b>[/b][/u]</b><br /><br />");

$faq[] = array("--","Sitere og vise predefinert tekst");
$faq[] = array("Sitere tekst i svar", "Du kan sitere både med og uten referanse til forfattar.<ul><li>Når du bruker siter funksjonen for å svare på eit innlegg vil du sjå at teksten du siterer er sett inn i <b>[quote=\"\"][/quote]</b> taggar. Med denne metoden kan du sitere ein person eller kva som helst anna du ynskjer å sitere. Viss du f.eks ynskjer å sitere ein tekst Mr. Blobby skreiv, skriv du :<br /><br /><b>[quote=\"Mr. Blobby\"]</b>Teskten Mr. Blobby skriv<b>[/quote]</b><br /><br /> Mr. Blobby skreiv: vil automatisk bli lagt til før teksten du siterer. Hugs at du <b>må</b> bruke \"\" rundt namnet på den du siterer.<br /><br /></li><li>Du kan og sitere uten å angi kven eller kva du siterer, bruk <b>[quote][/quote]</b> taggar rundt teksten du ynskjer å sitere. Når du siterer med denne metoden vil Sitat: automatisk bli sett inn før teksten du siterer.<br /><br /></li></ul>");
$faq[] = array("Skrive kode eller predefinert tekst", "Viss du ynskjer å vise kode eller predefinert tekst bruker du taggane <b>[code][/code]</b>, f.eks. <br /><br /><b>[code]</b>echo \"Dette er kode\";<b>[/code]</b><br /><br />All tekst som blir sett i desse taggane vil behalde formatet du nyttar når den blir vist i innlegget.<br /><br />");

$faq[] = array("--","Generere lister");
$faq[] = array("Lage ei ikkje sortert liste", "BBKode støttar både sorterte og ikkje-sorterte lister, som i praksis er lik tilsvarande lister laga med HTML. Ei ikkje-sorterte liste viser ei vanlig punktliste med punkt som markør for kvart punkt på lista. Bruk <b>[list][/list]</b>, og marker kvart punkt med <b>[*]</b> for å lage ei ikkje-sorterte liste. <br /><br /><b>[list]</b><br /><b>[*]</b>Raud<br /><b>[*]</b>Blå<br /><b>[*]</b>Gul<br /><b>[/list]</b><br /><br /> blir formatert slik: <ul><li>Raud</li><li>Blå</li><li>Gul</li></ul>");
$faq[] = array("Lage ei sortert liste", "Med den andre typen, sortert liste, har du kontroll på kva punkta skal markerast med. Bruk <b>[list=1][/list]</b> for å lage ei nummerert liste eller <b>[list=a][/list]</b> for å lage alfabetisert liste, og <b>[*]</b> for å angi kvart punkt på lista.<br /><br /><b>[list=1]</b><br /><b>[*]</b>Gå til butikken<br /><b>[*]</b>Kjøp ny pc<br /><b>[*]</b>Kjeft på pc-en når den kræsjer<br /><b>[/list]</b><br /><br /> blir formatert slik: <ol type=\"1\"><li>Gå til butikken</li><li>Kjøp ny pc</li><li>Kjeft på pc-ei når den kræsjer</li></ol> Alternativt lager du ei alfabetisert liste slik :<br /><br /><b>[list=a]</b><br /><b>[*]</b>Det første svaralternativet<br /><b>[*]</b>Det andre svaralternativet<br /><b>[*]</b>Det tredje svaralternativet<br /><b>[/list]</b><br /><br />som vil bli formatert slik :<ol type=\"a\"><li>Det første svaralternativet</li><li>Det andre svaralternativet</li><li>The Det tredje svaralternativet</li></ol>");

$faq[] = array("--", "Lage lenkjer");
$faq[] = array("Eksterne lenkjer", "Du kan velge mellom fleire metodar for å lage URL-er eller lenkjer med BBKode.<ul><li><b>Med [url=][/url]</b> taggane vil teksten mellom taggane lenkje til det du skriv etter = f.eks.:<br /><br /><b>[url=http://www.phpbb.no/]</b>Besøk phpBB.no!<b>[/url]</b><br /><br />gjev følgjande link, <a href=\"http://www.phpbb.no/\" target=\"_blank\">Besøk phpBB.no!</a> Legg merke til at linken blir opna i eit nytt vindauge og at forumet blir liggande i det originale nettleservindauget.<br /><br /></li><li>Viss du ynskjer at sjølve URL-en skal vere synleg brukar du :<br /><br /><b>[url]</b>http://www.phpbb.no/<b>[/url]</b><br /><br />som gjev følgjande link, <a href=\"http://www.phpbb.no/\" target=\"_blank\">http://www.phpbb.no/</a><br /><br /></li><li>PhpBB har ei funksjon som blir kalla <i>Magic Links</i>, som automatisk konverterer alle korrekt formaterte URL-er til lenkjer, du treng ikkje skrive http:// fyrst. Viss du f.eks. skriv www.phpbb.no i innlegget ditt vil teksten automatisk bli konvertert til <a href=\"http://www.phpbb.no/\" target=\"_blank\">www.phpbb.no</a>.<br /><br /></li><li><i>Magic Links</i> fungerer og med e-postadresser, du kan anten skrive :<br /><br /><b>[email]</b>ingen@domene.adr<b>[/email]</b><br /><br />som blir formatert slik: <a href=\"mailto:ingen@domene.adr\">ingen@domene.adr</a> eller du kan skrive:  <a href=\"mailto:ingen@domene.adr\">ingen@domene.adr</a>.<br /><br /></li></ul>Som med alle andre BBKode taggar kan du bruke URL taggane samstundes med andre formateringstaggar, f.eks. <b>[img][/img]</b> (sjå neste seksjon), <b>[b][/b]</b>, osv. På lik linje med formateringstaggene må du sjølv sørge for at alle taggane blir opna og lukka korrekt.<br /><br />Dette eksemplet:  <b>[url=http://www.phpbb.no/][img]</b>http://www.phpbb.no/images/phplogo.gif<b>[/url][/img]</b><br /><br />er <u>ikkje</u> korrekt formatert, og i eit slikt tilfelle kan du risikere at innlegget ditt blir sletta.<br /><br />");

$faq[] = array("--", "Vise bilete i innlegg");
$faq[] = array("Legge til bilete i innlegg", "phpBB BBKode har ei tagg som gjer det mogleg å vise bilete i innlegga dine. To viktige ting å hugse på når du bruker desse taggane er: mange brukarar liker ikkje innlegg som er overlessa med bilete, og at biletet/bileta du skal bruke allereie må vere tilgjengeleg på internet (det er ikkje nok at biletet ligg på pc-en din, om du ikkje har ein eigen webserver). Det er ikkje mogleg å lagre eller laste opp bilete direkte til phpBB (funksjonalitet for dette er forventa å bli lagt til i neste versjon av phpBB, 2.2).<br /><br /> For å vise bilete i eit innlegg må du bruke BBKode taggane <b>[img][/img]</b> rundt URL-en til biletet slik som i eksemplet under<br /><br /><b>[img]</b>http://www.phpbb.no/images/phplogo.gif<b>[/img]</b><br /><br />Du kan og bruke bilete som lenkjer vha. <b>[url][/url]</b>, f.eks.<br /><br /><b>[url=http://www.phpbb.no/][img]</b>http://www.phpbb.no/images/phplogo.gif<b>[/img][/url]</b><br /><br />gjev:<br /><br /><a href=\"http://www.phpbb.no/\" target=\"_blank\"><img src=\"templates/subSilver/images/logo_phpBB_med.gif\" border=\"0\" alt=\"\" /></a><br /><br />");

$faq[] = array("--", "Anna");
$faq[] = array("Kan eg lage mine eigne koder?", "Nei, dette er diverre ikkje mogleg i phpBB 2, men det er godt mogleg det blir funksjonalitet for dette i neste hovedversjon, phpBB 2.2.<br /><br />");


//
// This ends the BBCode guide entries
//

?>