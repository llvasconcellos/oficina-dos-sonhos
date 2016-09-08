<?php
/***************************************************************************
 *                            lang_faq.php [Nynorsk]
 *                              -------------------
 *     begin                : 16. feb 2004
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *              $Id: lang_faq.php, v 1.0.1 31. mar 2004$
 *
 ****************************************************************************/

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
  
$faq[] = array("--", "Innlogging og registrering");
$faq[] = array("Kvifor kan eg ikkje logge inn?", "Har du registrert deg? Du må vere registrert for å kunne logge inn. Er du utestengt frå forumet? (Du skal ha blitt informert om dette). I tilfelle bør du kontakte administratoren for å finne ut kvifor. Om du er registrert, ikkje er utestengt og framleis ikkje kan logge inn, dobbelsjekk at brukarnamnet og passordet er korrekt. Dette er som oftast problemet. Viss ikkje, kontakt administratoren, det kan vere ein feil med foruminstillingane.");
$faq[] = array("Kvifor må eg registrere meg?", "Det er mogleg at du ikkje må, det er opp til administratoren av forumet om du må registrere deg eller ikkje for å skrive innlegg. Registrerer du deg vil du få tilgjenge til ekstra funksjonalitet, som å velje ein avatar, sende private meldingar til andre brukarar, brukargruppemedlemskap osv. Registreringa tar berre eit par minutt og er å anbefale.");
$faq[] = array("Kvifor blir eg logga ut automatisk?", "Viss du ikkje krysser av i \"Logg meg på automatisk kvar gong\" boksen når du logger inn i forumet, vil du berre vere innlogga ei viss tid. Dette er for å forhindre misbruk av brukarkontoar. Dette er ikkje å anbefale om du brukar ei datamaskin som er tilgjengeleg for andre brukarar, f.eks. eit bibliotek, internett-kaféar, skulenettverk osv.");
$faq[] = array("Korleis hindrar eg brukarnamnet mitt frå å bli vist i \"Kven er i foruma\" lista?", "I profilen din vil du finne eit valg, \"Skjul onlinestatus\". Krysser du av i denne boksen, vil berre administrator og du kunne sjå deg. Du vil telje som ein skjult brukar.");
$faq[] = array("Eg har gløymt passordet mitt!", "Ingen grunn til panikk! Passordet ditt kan ikkje hentast fram igjen, men det kan bli nullstillt og erstatta. For å gjere dette, gå til logg inn sida og trykk på \"Eg har gløymt passordet\". Følgjer du instruksjonane på den sida som kjem opp, får du tilsendt eit nytt passord.");
$faq[] = array("Eg har registrert meg, men kan ikkje logge inn!", "Sjekk fyrst at brukarnamn og passord er skrive inn riktig. Om dei er riktige, og du framleis ikkje får logga inn, kan ein av to ting ha skjedd. Viss COPPA-support er aktivert og du trykte \"eg er under 13 år\" lenkja når du registrerte deg, må du følge instruksjonane du fekk tilsendt (dette gjelder berre USA baserte forum). Om dette ikkje er problemet er det mogleg at kontoen din må aktiverast. Nokre forum krevjer at alle nye registreringer må aktiverast, enten av deg eller av administratoren, før du kan logge inn. Du skal ha fått beskjed ved registrering om aktivering var naudsynt. Om du mottok ein e-post om aktivering, følg instruksjonene. Viss du ikkje mottok ein e-post om aktivering, kan du ha skrive inn ei ugyldig e-postadresse. Hovedgrunnen til at aktivering er brukt, er å hindre at useriøse brukarar utnyttar forumet anonymt. Viss du er sikker på at e-postadressa du oppgav er riktig, ta kontakt med administratoren.");
$faq[] = array("Eg har registrert meg tidlegare, men kan ikkje logge inn lenger?", "Den mest sannsynlege grunnen er at du har skrive inn feil brukarnamn eller passord (sjekk e-posten du mottok då du registrerte deg) eller at administratoren har sletta kontoen din. Om det siste er tilfelle har du kanskje ikkje skrive eit einaste innlegg? Det er vanlig at administratorane sletter brukarar som ikkje skriv innlegg for å holde storleiken på databasen nede. Prøv og registrer deg på nytt og bli med i nokre diskusjonar.");


$faq[] = array("--", "Brukarprofil og innstillingar");
$faq[] = array("Korleis endrer eg innstillingane mine?", "Alle innstillingane dine (om du er registrert) er lagra i databasen. For å endre dei, trykk på \"Profil\" lenkja (vanligvis øvst på sida). Her kan du endre alle innstillingane dine.");
$faq[] = array("Klokka er ikkje rett!", "Klokka er mest sannsynleg rett, men tida du ser kan vere i ei anna tidssone enn den du oppheld deg i. Viss dette er tilfelle kan du endre tidssona til ditt områd i profilen din, f.eks. London, Paris, New York, Sydney osv. Kun registrerte brukarar kan endre tidssona. Om du ikkje er registrert og ynskjer denne funksjonen, er dette eit fint tidspunkt å registrere seg på.");
$faq[] = array("Eg har forandra tidssona, men klokka er endå feil!", "Viss du er sikker på at du har sett rett tidssone og klokka endå er feil, er den mest sannsynlege grunnen sommartid. Forumet er ikkje designa til å handtere bytet mellom vintertid og sommartid, så om sommaren kan klokka vere ein time feil.");
$faq[] = array("Språket mitt er ikkje i lista!", "Den mest sannsynlege grunnen er anten at administratoren ikkje har installert språket eller at ingen har omsett forumet til ditt språk. Spør administratoren om ho/han kan installere språket, og om det ikkje finnast ei omsetting kan du gjerne lage ei! Meir informasjon finn du på phpBB si heimeside (sjå lenkja nedst på sida).");
$faq[] = array("Korleis viser eg eit bilete under brukarnamnet mitt?", "Det kan vere to bilete under brukarnamna når du ser på innlegg. Det fyrste er eit bilete som viser rangen din, vanligvis stjerner, som viser kor mange innlegg du har skrive eller statusen din i forumet. Under dette kan det vere eit større bilete som blir kalla avatar. Dette er vanlegvis eit unikt eller personleg bilete for kvar brukar. Det er opp til administratoren om avatarar skal kunne visast eller ikkje, og kva måte du kan velje ein avatar på. Viss du ikkje kan vise avatarer, er dette ei avgjerd administartor har tatt og viss du lurer på kvifor, er det berre å spørje (det er som oftast ein god grunn).");
$faq[] = array("Korleis endrer eg rangen min?", "Rangen din er vanligvis basert på antal innlegg, men unnatak finnst (rangen visast under brukarnamnet ditt i innlegg og i profilen, avhengig av kva stil som er velt). Rangering brukast og til og identifisere spesielle brukarar. F.eks. moderatorar og administratorar kan ha ein spesiell rang. Ver snill og ikkje utnytt forumet ved å skrive unødig mange innlegg for å få bedre rang, moderatorane eller administratorane vil då senke innleggstalet ditt.");
$faq[] = array("Når eg trykker på e-postlenkja til ein brukar, blir eg bede om å logge inn", "Berre registrerte brukarar kan sende e-post til andre via den innebygde e-postfunksjonen (berre viss administratoren har aktivert denne funksjonen). Dette for å hindre utnytting av e-postsystemet av anonyme brukarar.");


$faq[] = array("--", "Innlegg");
$faq[] = array("Korleis skriv eg eit innlegg i forumet?", "Klikk på den relevante knappen på anten forum- eller emnesida. Det er mogleg at du må registrere deg før du kan skrive eit innlegg. Dine rettar er lista opp nedst på forum- og emnesidene. (F.eks. \"Du kan starte nye emner\", \"Du kan svare på emner\" osv).");
$faq[] = array("Korleis endrer eller sletter eg eit innlegg?", "Viss du ikkje er administrator eller moderator kan du berre endre eller slette dine eigne innlegg. Du kan endre eit innlegg (nokre gonger kun for ein begrensa periode etter det er skrive) ved å klikke på \"endre\" knappen på innlegget. Om nokon allereie har svart på innlegget, vil det visast ein liten tekst nederst i innlegget kor det står tal gonger innlegget er endra. Teksten vil ikkje kome opp viss ingen har svart på innlegget, heller ikkje viss administratoren eller moderatorane har redigert innlegget (dei skal gje beskjed om kva dei har forandra, og kvifor). Legg merke til at vanlege brukarar ikkje kan slette eit innlegg etter at nokon har svart på det.");
$faq[] = array("Korleis legg eg til ein signatur i innlegga mine?", "For å legge til en signatur må du fyrst lage ein, dette gjer du i profilen din. Når den er laga, krysser du av i \"Bruk signatur\" boksen når du skriv innlegget. Du kan og legge til ein signatur som standard til alle dine innlegg ved å krysse av i \"Bruk alltid signatur\" boksen i profilen din. Du kan framleis hindre at signaturen blir vist ved å ta vekk krysset i \"Bruk signatur\" boksen når du skriv eit innlegg.");
$faq[] = array("Korleis set eg opp ei røysting?", "Når du skriv det fyrste innlegget i eit emne, ser du ein \"Legg til ei røysting\" boks under sjølve innleggsboksen. Om du ikkje ser denne, har du ikkje lov til å sette opp røystingar. Det er administrator som avgjer om det skal vere lov, og kven som skal ha lov til dette i forumet. Du må skrive inn ein tittel og minst to svaralternativ. For å legge til eit alternativ er det berre å skrive inn alternativet og klikke på \"Legg til svaralternativ\" knappen. Du kan og sette ei tidsgrense for røystinga, skriv 0 eller lat feltet vere tomt viss du ikkje ynskjer ein sluttdato. Det er ei grense for kor mange alternativ det kan vere.");
$faq[] = array("Korleis endrer eller sletter eg ei røysting?", "Samme reglar som ved endring/sletting av innlegg. Om ingen har røysta kan brukaren slette eller endre røystinga. Det er berre moderatorar og administrator som kan endre eller slette røystingar etter at nokon har røysta. Dette for å hindre juks ved å endre meining under røystinga.");
$faq[] = array("Kvifor kan eg ikkje lese eit forum?", "Nokre forum er begrensa til nokre brukarar eller grupper. For å lese, skrive osv. er det molgleg at du treng spesielle løyver og rettar. Moderatorar og administratoren kan gje deg desse løyvene og rettane, og om du ynskjer dette, ta kontakt med dei.");
$faq[] = array("Kvifor kan eg ikkje røyste i røystingar?", "Kun registrerte brukarar kan røyste, dette for å hindre juks. Er du registrert og ikkje får røyste, har du ikkje dei naudsynte rettane.");


$faq[] = array("--", "Formatering og emnetypar");
$faq[] = array("Kva er BBKode?", "BBKode er ein spesiell variant av HTML. Om BBKode kan brukast i forumet er opp til administratoren. Du kan sjølv deaktiviere BBKode når du skriv eller endrer eit innlegg. BBKode liknar HTML i formateringa. Taggane er omslutta av firkantparenteser [ og ] i staden for < og >. Dete gjev ein bedre kontroll over korleis noko blir vist. Meir informasjon om BBKode finn du i rettleiinga på innleggsida.");
$faq[] = array("Kan eg bruke HTML?", "Det er opp til administrator om du kan bruke HTML eller ikkje. Viss det er lov å bruke HTML vil du mest sannsynleg berre kunne bruke nokre få taggar. Dette er en sikkerhetsfunksjon som skal hindre nokon fra å utnytte forumet ved å bruke taggar som kan øydeleggje utsjånaden eller skape andre problem. Viss HTML er aktivert, kan du deaktivere det når du skriv eller endrer eit innlegg.");
$faq[] = array("Kva er eit smilefjes?", "Smilefjes er små bilete som kan brukast til å uttrykke kjensler ved å bruke ein kort kode, f.eks. :-) tyder glad, :-( tyder lei seg osv. Heile lista med smilefjes kan du sjå på innleggingssida. Prøv og begrens bruken av smilefjes, då desse kan gjere eit innlegg uleselig. Dette kan føre til at ein moderator fjerner dei eller sletter innlegget.");
$faq[] = array("Kan eg vise bilete?", "Du kan vise bilete i innlegga dine. Det er ingen funksjon for direkte opplasting av bilete til forumet. Du må derfor lenkje til eit bilete som ligg på ein offentleg internett-server, f.eks. http://www.ein-ukjent-stad.net/mitt-bilete.gif. Du kan ikkje lenkje til eit bilete på din eigen PC (om du ikkje har ein offentleg tilgjengeleg server) eller bilete lagra bak passordbeskytta sider, som f.eks. Hotmail- eller Yahoo-e-postkontoer osv. For å vise eit bilete kan du bruke anten BBKode eller HTML.");
$faq[] = array("Kva er kunngjeringar?", "Kunngjeringar er ofte viktig informasjon og bør lesast snarast moleg. Kunngjeringar blir vist øvst på alle sidene i det forumet dei er lagt inn. Om det er mogleg for deg å skrive kunngjeringar, avheng av kva rettar som krevjast.");
$faq[] = array("Kva er emner med førerett?", "Emner med førerett blir vist under kunngjeringane i forumet, men berre på den første sida. Dei er som oftast viktige, og bør lesast snarast mogleg. Om det er mogleg for deg å skrive innlegg med førerett, avheng av kva rettar som krevjast.");
$faq[] = array("Kva er stengte emner?", "Stengte emner er emner som har blitt låst av moderatorane eller administratoren. Du kan ikkje svare i eit stengt emne, og eventuelle røystingar er avslutta. Emner kan bli stengt av mange grunnar.");


$faq[] = array("--", "Brukarnivåer og -grupper");
$faq[] = array("Kva er ein administrator?", "Ein administrator er ein enkelt brukar som er har den høgaste grad av kontroll over heile forumet. Denne/desse brukarne kan kontrollere alle funksjoner av forumdrifta. Dette inkluderer blant anna å sette rettar, utestenge brukarar, lage brukargrupper eller moderatorar osv. Dei har og fulle moderatorrettar i alle foruma.");
$faq[] = array("Kva er ein moderator?", "Ein moderator er ein enkelt brukar, eller ei gruppe brukarar som skal overvåke forumet frå dag til dag. Denne/desse brukarne har fått tildelt rettar til å endre/slette innlegg, låse/låse opp, flytte, slette og dele emner i det forumet dei modererer. Vanligvis er moderatorar der for å hindre brukarar i og gå utanfor emnet eller skrive upassende eller støytande innlegg.");
$faq[] = array("Kva er ei brukargruppe?", "Administrator kan dele opp brukarane i brukargrupper. Kvar brukar kan tilhøyre flere grupper og kvar gruppe kan bli tildelt individuelle rettar og løyve. Dette gjer det lett for administrator å sette opp fleire brukarar som moderatorar for eit forum, eller å gje dei rettar til å lese eit privat forum osv.");
$faq[] = array("Korleis blir eg medlem av en brukargruppe?", "For å bli medlem av en brukargruppe, klikk på gruppelenkja. (Vanligvis øvst på sida, avhengig av kva stil du har velt). Du kan då sjå alle brukargruppene. Ikke alle grupper er offentlig tilgjengeleg, nokre er stengt og nokre kan til og med ha skjult medlemskap. Om gruppa er open, kan du spørje om å bli medlem ved å klikke på den tilhøyrande knappen. Gruppemoderator må fyrst godkjenne deg, og du kan få spørsmål om kvifor du vil bli medlem av gruppa. Godta gruppemoderatoren sitt svar viss du får avslag. Eit eventuelt avslag vil vere begrunna.");
$faq[] = array("Korleis blir eg en gruppemoderator?", "Brukargrupper blir starta av administrator som vel ein gruppemoderator. Viss du ynskjer å starte ei brukargruppe må du ta kontakt med administratoren med ei privat melding.");


$faq[] = array("--", "Private meldingar");
$faq[] = array("Eg kan ikkje sende private meldingar!", "Det kan vere tre grunner til dette. Du er ikkje registrert og/eller ikkje innlogga, administratoren har deaktivert private meldingar for heile forumet eller administratoren har hindra deg frå å sende meldingar. Om det siste er tilfelle, bør du spørje om å få ei grunngjeving.");
$faq[] = array("Eg får framleis uønska, private meldingar!", "I framtida vil vi legge til en funksjon som gjer at du kan stoppe private meldingar frå ein eller fleire brukarar. Om du framleis mottek uønska private meldingar, kan du ta kontakt med administratoren. Administratoren kan, og kjem om naudsynt til, å ta i frå brukaren retten til å sende private meldingar.");
$faq[] = array("Eg har moteke spam, upassande eller støytende e-post fra nokon i dette forumet!", "Dette beklager vi. E-postfunksjonen i dette forumet har en sikkerhetsfunksjon som kan hjelpe til å spore brukarar som sender denne typen meldingar. Send ein e-post til administrator med ein full kopi av e-posten du fekk. Det er veldig viktig at du inkluderer øverste delen (hodet/headeren) då denne inneheld detaljer om kva brukar som sendte deg e-posten. Administratoren kan og vil då gjere noko med dette.");

//
// These entries should remain in all languages and for all modifications
//
$faq[] = array("--", "Om phpBB2");
$faq[] = array("Kven har laga dette forumskriptet?", "Denne programvara (i umodifisert form) er laga og distrubert av <a href=\"http://www.phpbb.com/\">phpBB Group</a>. Det er tilgjengelig under GNU-lisensen og kan fritt distrubuerast. Sjekk lenkja for meir informasjon. Support på norsk: <a href=\"http://www.phpbb.no/\">phpBB.no</a>");
$faq[] = array("Kvifor er ikkje den og den funksjonen tilgjengelig?", "Denne programvara er laga av og lisensiert phpBB Group. Viss du ynskjer ein ny funksjon, kan du vitje phpbb.com og sjå kva phpBB Group har å seie om saken.");
$faq[] = array("Kven kan eg kontakte om misbruk av eller ulovlege tilstander i dette forumet?", "Du skal kontakte administratoren av dette forumet. Viss du ikkje klarer å finne ut kven det er, skal du fyrst kontakte ein av moderatorane og spørre ho/han om kven du skal kontakte. Viss du framleis ikkje får kontakt, er det eigaren av domenet som skal kontaktast. Viss forumet er på ein gratis heimeside-tjeneste (f.eks. yahoo eller home.no.net), skal du kontakte denne tjenesten. Merk at phpBB Group ikkje har kontroll eller ansvar ovanfor kva som blir skrive i forumet. Det er derfor ingen vits i å kontakte dei.");

//
// This ends the FAQ entries
//

?>