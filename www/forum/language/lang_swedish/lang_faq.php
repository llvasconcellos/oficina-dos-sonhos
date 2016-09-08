<?php
/***************************************************************************
 *                          lang_faq.php [Swedish]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: lang_faq.php,v 1.1 2006/01/13 15:45:31 virtuality Exp $
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

//  *************************************
//  First, original Swedish translation by:
//	
//	Marcus Svensson
//      admin@world-of-war.com
//      http://www.world-of-war.com
//	-------------------------------------
// 	Janåke Rönnblom
//	jan-ake.ronnblom@skeria.skelleftea.se
//	-------------------------------------
//	Bruce
//	bruce@webway.se
//	-------------------------------------
//      Jakob Persson
//      jakob.persson@iname.com
//      http://www.jakob-persson.com
//
//  *************************************
//  Maintained and kept up-to-date by:
//  
//  Jonathan Gulbrandsen (Virtuality)
//  virtuality@carlssonplanet.com
//  http://www.carlssonplanet.com
//  *************************************
//

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
 
  
$faq[] = array("--","Inloggnings- och registreringsproblem");
$faq[] = array("Varför kan jag inte logga in?", "Har du registrerat dig? Du måste registrera dig för att kunna logga in. Har du blivit avstängd från forumet (i så fall visas ett meddelande)? Om så är fallet bör du kontakta webmastern eller administratören för att få reda på varför. Om du har registrerat dig och inte är avstängd men ändå inte kan logga in kontrollera att ditt användarnamn och lösenord stämmer. Oftast är det problemet, om inte så kontakta administratören.");
$faq[] = array("Varför måste jag registrera mig?", "Det är inte säkert att du måste registrera dig, det är upp till administratören om du måste registrera dig för att skriva/läsa inlägg eller inte. Dock så ger registreringen dig ytterligare funktioner som inte är tillgängliga för gäster, till exempel avatarer, personliga meddelanden, e-post till andra användare, medlemskap i användargrupper, med mera. Det tar endast några sekunder att registrera sig, så det rekommenderas.");
$faq[] = array("Varför blir jag automatiskt utloggad?", "Om du inte kryssar i <i>Logga in mig automatiskt</i> när du loggar in så kommer du endast att vara inloggad under en begränsad tid. Det för att förhindra att någon missbrukar ditt konto. För att inte bli utloggad, kryssa i \"Logga in mig automatiskt\" vid inloggningen. Detta är dock inte att rekommendera om du besöker forumet från en offentlig dator, så som bibliotek, internetcafé, skola eller liknande.");
$faq[] = array("Hur hindrar jag att mitt användarnamn visas på Vem är Online-listan?", "I din profil finns en inställning kallad <i>Dölj min onlinestatus</i>, om du ändrar inställningen till <i>Ja</i>, så kommer endast du själv och administratörer se om du är online eller inte. Du kommer att räknas som en dold användare.");
$faq[] = array("Jag har glömt mitt lösenord!", "Ingen panik. Även om du inte kan få tillbaka ditt nuvarande lösenord så kan det ändras till ett nytt. För att göra det så går du till inloggningen och klickar på <u>Jag har glömt mitt lösenord</u>. Följ instruktionerna där och du kommer att vara tillbaka online på nolltid.");
$faq[] = array("Jag har registrerat mig men jag kan inte logga in!", "Kontrollera först att du använder rätt användarnamn och lösenord. Om du är säker på att de är rätt så kan två saker ha inträffat. Antagligen så måste ditt konto aktiveras. Vissa forum kräver att alla konton aktiveras först innan du kan logga in, antingen av dig själv eller av administratören. När du registrerade dig så stod det angivet om du måste aktivera kontot eller inte. Om du fått ett e-postmeddelande så följ instruktionerna i det, om inte, så är du säker på att du angett en korrekt e-postadress? En anledning till att man använder kontoaktivering är att minska möjligheterna för personer med oärligt uppsåt att missbruka forumet anonymt. Om du är säker på att e-postadressen är giltig så kontakta administratören för forumet. Om COPPA-stöd är aktiverat och du klickat på <u>Jag är under 13 år</u> när du registrerat dig så måste du följa instruktionerna du fått först.");
$faq[] = array("Jag har registrerat mig tidigare men nu kan jag inte logga in längre!", "De troligaste anledningarna till detta är; du har angett ett felaktigt användarnamn eller lösenord (kolla e-postmeddelandet du fick när du först registrerade dig) eller så har administratören raderat ditt konto av någon anledning. Om ditt konto har raderats så kan det bero på att du inte skrivit några eller få inlägg under en längre tid. Det är normalt att man ibland raderar användare som inte har skrivit något för att minska storleken på databasen. Försök registrera dig igen och skriv ett inlägg i en diskussion.");


$faq[] = array("--","Användarpreferenser och inställningar");
$faq[] = array("Hur ändrar jag mina inställningar?", "Alla dina inställningar (om du har registrerat dig) lagras i databasen. För att ändra dem, klicka på \"Profil\" (finns oftast högst upp på sidan). Där kan du ändra alla dina inställningar.");
$faq[] = array("Tiden är inte rätt!", "Tiden är säkerligen rätt, men den tiden som visas kanske är för en annan tidszon än den du befinner dig i. Klicka på \"Profil\" (finns oftast högst upp på sidan) och ändra där din tidszonsinställning. Kom ihåg att för att kunna ändra tidszonen, och de flesta andra inställningarna, så måste du vara registrerad och inloggad. Så om du inte har registrerat dig så är det hög tid att du gör det nu!");
$faq[] = array("Jag har ändrat tidszonen och tiden är fortfarande fel!", "Om du är säker på att du har satt tidszonen korrekt och tiden fortfarande är felaktig så är sommartid det mest troliga svaret. Forumet kan inte hantera förändringar mellan vinter och sommartid automatiskt, så under sommarmånaderna kan tiden vara en timme fel. Du kan gå till din profil och öka tidszonen med en timme manuellt om du vill. Kom ihåg att ställa tillbaka igen när det blir vintertid bara!");
$faq[] = array("Mitt språk finns inte i listan!", "Då har förmodligen administratören inte installerat just ditt språk eller så har inte någon översatt forumet till ditt språk. Fråga administratörerna om de inte kan installera det språk du behöver och om det inte finns så tag gärna chansen och skapa en ny översättning. Mer information finns på phpBBs webbplats (se länken längst ner på sidorna).");
$faq[] = array("Hur visar jag en bild under mitt användarnamn?", "Det kan finnas två bilder under användarnamnet när man läser ett ämne. Den första är en bild som är associerad med din rank, oftast är bilderna i form av stjärnor eller block som visar hur många inlägg du har skrivit eller din status i forumet. Under den kan det finnas en bild som är känt som en avatar, denna är i allmänhet unik eller personlig för varje användare. Det är upp till administratören att tillåta avatarer och de kan även välja på vilket sätt avatarer görs tillgängliga för användaren. Om du inte kan använda avatarer i forumet så är det ett beslut av administratörerna, och du kan fråga dem om deras skäl till detta.");
$faq[] = array("Hur ändrar jag min rank?", "I normala fall kan du inte ändra din rank direkt (din rank står under ditt användarnamn i inläggen och i din profil). De flesta forum använder rank för att indikera antalet inlägg du har skrivit och för att identifiera vissa användare, t.ex. moderatorer och administratörer. Försök att inte missbruka forumet genom att skriva onödiga inlägg bara för att öka din rank, administratörerna kommer i så fall att helt enkelt sänka ditt antal inlägg.");
$faq[] = array("När jag klickar på e-postlänken till en användare så vill forumet att jag loggar in?", "Tyvärr kan bara registrerade användare skicka e-post till andra användare via det inbyggda e-post formuläret (om administratörerna har aktivera denna finess). Detta för att förhindra missbruk av e-postsystemet av anonyma användare.");


$faq[] = array("--","Problem med inlägg");
$faq[] = array("Hur skriver jag ett meddelande i ett forum?", "Enkelt, klicka på den relevanta knappen på antingen forum eller ämnessidan. Det är möjligt att du måste registrera dig innan du kan skriva ett meddelande, de rättigheter du har visas längst ned på forum- och ämnessidan. (<i>Du kan skapa ett nytt meddelande, Du kan rösta i omröstningar<i> osv.)");
$faq[] = array("Hur ändrar eller raderar jag ett inlägg?", "Såvida du inte är administratör eller moderator kan du bara redigera och radera dina egna inlägg. Du kan redigera ett meddelande (ibland bara inom en begränsad tid efter det att det postades) genom att klicka på <i>Redigera</i> vid det relevanta meddelandet. Om någon redan har besvarat meddelandet kommer det att finnas en förklarande text under meddelandet som talar om att det har redigerats, detta visar också hur många gånger meddelandet har redigerats. Detta syns enbart om någon har svarat, det syns inte heller om en moderator eller administratör redigerar meddelandet (dock bör de lämna ett meddelande som talar om vad de har ändrat och varför). Vanliga användare kan inte radera ett meddelande som någon redan svarat på.");
$faq[] = array("Hur lägger jag till en signatur till mitt meddelande?", "För att lägga till en signatur till ett meddelande måste du först skapa en signatur, detta gör du via din profil. När du väl har skapat din signatur kan du kryssa i <i>Lägg till signatur</i> när du skapar meddelandet för att lägga till din signatur. Du kan också lägga till en signatur automatiskt till alla dina meddelanden genom att ställa in det i din profil. (du kan fortfarande hindra din signatur från att läggas till genom att kryssa ur rutan när du skapar meddelandet)");
$faq[] = array("Hur skapar jag en omröstning?", "Att skapa en omröstning är enkelt, när du skapar ett nytt ämne (eller redigerar det första meddelandet i ett ämne) så ska det finnas ett <i>Lägg till omröstning</i> formulär under textrutan (om du inte kan se detta så har du förmodligen inte rättigheter för att skapa nya omröstningar). Du bör ange en titel för omröstningen och minst två val (för att skapa en valmöjlighet ange frågan och klicka på <i>Lägg till nytt val</i>). Du kan också ange en tidsbegränsning för omröstningen, 0 innebär oändligt. Det finns en begränsning på hur många olika valmöjligheter du kan ange, detta bestäms av administratören.");
$faq[] = array("Hur ändrar jag en omröstning?", "Meddelanden och omröstningar kan enbart redigeras av den som skapat dem, eller av moderatorer och administratörer. För att redigera en omröstning klicka på första meddelandet i ämnet (detta är alltid associerat med omröstningen). Om ingen har röstat så kan användaren radera omröstningen eller redigera valmöjligheterna. Men om någon har röstat så kan bara moderatorer eller administratörer redigera eller radera omröstningen. Detta för att förhindra folk att rigga omröstningar genom att ändra valmöjligheter när folk redan har röstat.");
$faq[] = array("Varför kan jag inte komma in i ett forum?", "Vissa forum kan vara begränsade till vissa användare eller grupper. För att lista, läsa, skriva, mm så måste du ha speciell tillåtelse, enbart gruppledaren eller administratörerna kan ge ut dessa rättigheter, så du måste kontakta dem.");
$faq[] = array("Varför kan jag inte rösta i omröstningar?", "Enbart registrerade användare kan rösta i omröstningar (för att förhindra fusk). Om du är registrerad och du fortfarande inte kan rösta så har du förmodligen inte tillåtelse att rösta.");


$faq[] = array("--","Formatering och ämnestyper");
$faq[] = array("Vad är BBCode?", "BBCode är en speciell variant av HTML. Om du kan använda BBCode eller inte bestäms av administratören (du kan också hindra användningen av BBCode i ett specifikt meddelande). BBCode i sig är snarlikt HTML, taggar är omgärdade/inneslutna i hakparanteser, [ och ] i stället för &lt; och &gt; och BBCode ger större kontroll över hur vad och hur någonting visas. För mera information om BBCode titta i guiden som kan nås från <i>Nytt ämne/inlägg</a>-sidan.");
$faq[] = array("Kan jag använda HTML?", "Det beror på om administratören tillåter dig eller inte. Om det är tillåtet kommer du att finna att det bara är vissa taggar som fungerar. Detta är en säkerhetsåtgärd för att hindra personer från att missbruka forumet genom att använda taggar som kan förstöra designen eller skapa andra problem. Om HTML är tillåtet så kan du förhindra det i ett specifikt meddelande om du vill.");
$faq[] = array("Vad är smileys?", "Smileys är små grafiska bilder som kan användas för att uttrycka någon typ av känsla via en förkortning, t.ex. \":)\" som betyder glad/lycklig eller \":(\" som betyder ledsen. Hela listan av smileys kan du hitta via nytt meddelande formuläret. Försök att inte överanvända smileys, de kan fort få ett meddelande att bli oläsbart och en moderator kan bestämma sig för att redigera bort dem från meddelandet eller radera hela meddelandet.");
$faq[] = array("Kan jag posta bilder?", "Bilder kan visas i ditt meddelande. Dock finns det för tillfället ingen funktion för att ladda upp bilder till forumet. Därför måste du länka till en bild som finns på en publik webbserver, t.ex. <pre>http://www.some-unknown-place.net/my-picture.gif</pre> Du kan inte länka till bilder som lagras på din privata dator (såvida den inte är en publikt tillgänglig server) eller till bilder som lagras bakom auktoriseringsmekanismer, t.ex. Hotmail eller Yahoo, lösenordsskyddade sajter, m.m. För att visa en bild så använd antingen BBCode [img] taggen eller motsvarande i HTML. (om det tillåts)");
$faq[] = array("Vad är Viktiga ämnen/meddelanden?", "Viktiga meddelande innehåller oftast viktig information och du bör läsa dem så fort som möjligt. Viktiga meddelanden syns högst upp på varje sida i det forum där de postats. Om du kan eller inte kan posta viktiga meddelanden beror på vilka rättigheter du har, vilket styrs av administratörerna.");
$faq[] = array("Vad är Klistrade ämnen/meddelanden?", "Klistrade ämnen syns under viktiga meddelanden och enbart på första sidan. Dessa innehåller också ofta viktig information så du bör läsa dem när det är möjligt. Såsom med viktiga meddelanden så är det administratörerna som bestämmer vilka rättigheter som krävs för att kunna skapa Klistrade meddelanden.");
$faq[] = array("Vad är låsta ämnen/meddelanden?", "En moderator eller administratör kan <i>låsa</i> ett ämne. Detta innebär att ingen kan skapa nya svar till ämnet i fråga. Om ämnet innehöll en omröstning avslutas den. Ämnen kan låsas av många skäl.");


$faq[] = array("--","Användarnivåer och grupper");
$faq[] = array("Vad är en administratör?", "Administratörer är personer som har den högsta nivån av kontroll på forumet. Dessa personer kan styra alla aspekter av forumets drift vilket inkluderar att ställa in rättigheter, stänga av användare, skapa användargrupper eller utse moderatorer, med mera. De har också fulla moderatorrättigheter i alla forum.");
$faq[] = array("Vad är en moderator?", "Moderatorer är individer (eller grupper av individer) vars jobb det är att sköta om de dagliga aktiviteterna i forumet. De kan redigera, radera, låsa, låsa upp, flytta och dela ämnen och inlägg i forumet som de har ansvar för. Generellt så är moderatorer där för att hindra personer från att <i>komma ifrån ämnet<i> eller att posta grovt eller anstötligt material.</i>");
$faq[] = array("Vad är en användargrupp?", "Användargrupper är ett sätt som administratörerna använder för att gruppera användare. Varje användare kan vara med i flera grupper och varje grupp kan tilldelas individuella rättigheter. Detta gör det enkelt för administratörerna att ange flera användare som moderatorer för ett forum eller ge de åtkomst till ett privat forum, mm.");
$faq[] = array("Hur går jag med i en användargrupp?", "För att ansluta dig till en användargrupp så klicka på användargrupplänken (vart den finns beror lite på), där du kan se alla användargrupper. Inte alla grupper är <i>öppna</i>, vissa är stängda och vissa kan även vara dolda. Om gruppen är öppen kan du ansöka om att få bli medlem genom att klicka på lämplig knapp. Användargruppens ledare kommer då antingen bevilja eller avslå din ansökan och kan även fråga varför du vill bli medlem. Och tjata inte på gruppledarna om de nekar dig medlemskap. De har säkert sina skäl.");
$faq[] = array("Hur blir jag ledare för en användargrupp?", "Användargrupper skapas initialt av administratörerna och de utser också gruppledare. Om du är intresserad av att skapa en användargrupp så är din första kontakt någon av administratörerna. Skicka ett personligt meddelande till någon av dem.");


$faq[] = array("--","Personliga meddelanden");
$faq[] = array("Jag kan inte skicka personliga meddelanden!", "Det finns tre skäl till detta; du är inte registrerad och/eller du har inte logga in, administratören har inaktiverat personliga meddelanden för hela forumet eller så har administratören förhindrat just dig från att skicka personliga meddelanden. Fråga i så fall administratören varför.");
$faq[] = array("Jag får oönskade personliga meddelanden!", "I framtiden kommer vi (phpBB Group) att lägga till en ignoreringslista till det personliga meddelandesystemet. Om du fortsätter att få oönskade meddelanden så prata med en administratör, de kan förhindra en användare från att skicka personliga meddelanden överhuvudtaget.");
$faq[] = array("Jag har fått spam eller anstötliga e-postmeddelanden från någon på detta forum!", "Vi är ledsna att höra detta. E-postformuläret i forumet innehåller skydd för att försöka spåra användare som skickar sådana e-postmeddelanden. Du bör kontakta administratörerna på forumet och bifoga en full kopia av e-postmeddelandet du fick och det är mycket viktigt att du bifogar e-posthuvudet (detta innehåller detaljerna om vilken användare som skickat e-postmeddelandet). Administratörerna kan därefter vidta åtgärder.");

//
// These entries should remain in all languages and for all modifications
//
$faq[] = array("--","Angående phpBB 2");
$faq[] = array("Vem har gjort detta forum?", "Denna programvara (i dess omodifierade form) är producerad och släppt av <a href=\"http://www.phpbb.com/\" target=\"_blank\">phpBB Group</a>. Den finns tillgänglig under GNU General Public licensen och får distruberas fritt, se länken för mer detaljer.");
$faq[] = array("Varför finns inte funktion X?", "Denna programvara har gjorts och licensierats genom phpBB Group. Om du anser att en funktion bör läggas till så är du välkommen att föreslå den på phpbb.com. Posta inte funktionsönskningar på forumet på phpbb.com, phpBB använder sig av  sourceforge för att hantera funktionsönskningar. Läs igenom forumen för att se vad vår åsikt om en viss funktion kanske redan är och följ sedan instruktionerna som anges där.");
$faq[] = array("Vem kontaktar jag angående juridiska ärenden relaterade till detta forum?", "Kontakta administratören. Om du inte kan hitta vem detta är bör du först och främst kontakta en av moderatorerna och fråga dem vem du ska kontakta. Om du fortfarande inte får något svar bör du kontakta ägaren av domänen (gör en whois lookup) eller, om detta forum ligger på en gratistjänst såsom yahoo, free.fr, f2s.com, etc., deras abuse-avdelning. Kom ihåg att phpBB Group inte har någon som helst kontroll och kan inte på något sätt hållas ansvariga över hur, var eller av vem som detta forum används. Det är fullkomligt meningslöst att kontakta phpBB Group angående något juridiskt (cease and desist, liable, defamatory comment, etc.) ärende som inte är direkt relaterat till phpbb.com. Om du e-postar phpBB Group angående någon tredje-parts använding av denna programvara så kan du förvänta dig ett fåordigt svar eller inget svar alls.");

//
// This ends the FAQ entries
//

?>