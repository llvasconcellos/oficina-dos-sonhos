<?php
/***************************************************************************
 *                          lang_faq.php [Italian]
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

/* CONTRIBUTORS:
	2005-10-23  phpbb.it - http://www.phpbb.it - info@phpbb.it
		Fixed many minor grammatical problems.
*/
 
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
 
  
$faq[] = array("--","Login e Registrazione");
$faq[] = array("Perch� non riesco ad entrare?", "Ti sei registrato? Devi registrarti per poter entrare. Sei stato disabilitato dal forum (se � cos� ti viene mostrato un messaggio)? Se � cos� devi contattare il webmaster o l'amministratore del forum per capire perch�. Se ti sei registrato e non sei stato disabilitato e ancora non riesci ad entrare allora controlla e ricontrolla username e password. Di solito il problema � questo, altrimenti contatta l'amministratore del forum, potrebbe esserci una configurazione non corretta.");
$faq[] = array("Perch� devo registrarmi?", "Potresti non averne bisogno, dipende dall'amministratore del forum se � necessario registrarsi per inviare messaggi. Comunque, la registrazione ti dar� accesso ad altre funzioni che non sono disponibili per gli utenti ospiti come l'utilizzo di un'immagine avatar definibile, messaggistica privata, possibilit� di inviare email direttamente dal forum, iscrizione a gruppi di utenti, ecc. Ti bastano pochi minuti per registrarti e quindi ti raccomandiamo di farlo.");
$faq[] = array("Perch� vengo disconnesso automaticamente dal forum?", "Se non selezioni <I>Entra automaticamente</I>, il forum ti terr� connesso per un periodo prestabilito. Questo serve ad evitare che qualcuno utilizzi il tuo account. Per rimanere connesso, seleziona l'opzione quando entri, ma ricorda che questo non � consigliato se ti colleghi da un computer utilizzato da altri, es. biblioteca, internet caf�, universit�, ecc.");
$faq[] = array("Come posso evitare di apparire nella lista delgi utenti in linea?", "Nel tuo profilo trovi l'opzione <I>Non mostrare se sei on-line</I>: se la attivi, apparirai solo all'amministratore del forum e a te stesso. Verrai contato come utente nascosto.");
$faq[] = array("Ho perso la mia password!", "Niente panico! La tua password non pu� essere recuperata, ma pu� essere re-impostata. Per far questo vai nella pagina del login e clicca su <U>Ho dimenticato la mia password</U>, segui le istruzioni e tornerai in linea in poco tempo.");
$faq[] = array("Mi sono registrato ma non riesco ad entrare!", "Innanzitutto controlla di aver inserito lo username e la password corretti. Se sono giusti, allora possono esser successe un paio di cose: se il supporto COPPA � abilitato e hai cliccato su <U>Ho meno di 13 anni</U> mentre ti stavi registrando, allora devi seguire le istruzioni che hai ricevuto. Se questo non � il tuo caso, magari devi attivare il tuo account. Alcuni forum richiedono che tutte le nuove registrazioni vengano attivate, o dall'utente stesso o dall'amministratore, prima di poter entrare. Quando ti registri ti verr� detto che tipo di attivazione � richiesta. Se ti � stata inviata un'e-mail, allora segui le istruzioni; se non hai ricevuto nessuna e-mail... sei sicuro che il tuo indirizzo e-mail sia valido? (L'attivazione via e-mail serve a ridurre la possibilit� di avere utenti anonimi che <I>abusano</I> del forum). Se sei sicuro che l'indirizzo e-mail che hai usato sia giusto, allora prova a contattare l'amministratore del forum.");
$faq[] = array("Mi sono registrato tempo fa, ma non riesco pi� ad entrare!", "Le ragioni pi� probabili sono: hai inserito uno username o una password sbagliati (verifica l'e-mail che ti � stata mandata la prima volta che ti sei registrato), oppure l'amministratore ha cancellato il tuo account per qualche ragione. Se il motivo � quest'ultimo allora forse non hai mai inviato un messaggio. Di solito i forum rimuovono periodicamente gli utenti che non hanno mai inviato un messaggio per ridurre la grandezza del database. Prova a registrarti di nuovo e farti coinvolgere dalle discussioni.");


$faq[] = array("--","Impostazioni e Preferenze");
$faq[] = array("Come cambio le mie impostazioni?", "Tutte le tue impostazioni (se sei registrato) sono conservate nel database. Per modificarle clicca il link <U>Profilo</U> (generalmente sta in cima ad ogni pagina, ma questo potrebbe non essere il caso). Questo ti permetter� di cambiare tutte le tue impostazioni.");
$faq[] = array("L'ora non � corretta!", "L'ora � quasi sicuramente corretta, comunque l'ora che stai vedendo potrebbe essere quella di un fuso orario differente dal tuo. Se cos� fosse, devi cambiare le impostazioni del tuo profilo per il fuso orario e farlo coincidere con la tua area, es. London, Paris, New York, Sydney, ecc. Nota che solo gli utenti registrati possono cambiare il fuso orario e molte impostazioni.");
$faq[] = array("Ho cambiato il fuso orario ma l'ora � ancora sbagliata!", "Se sei sicuro di aver impostato il fuso orario corretto e l'ora � ancora sbagliata, il motivo pu� essere l'ora legale. Il forum non � programmato per calcolare le differenze di orario tra ora legale e ora solare quindi durante il periodo dell'ora legale l'ora potrebbe essere diversa dall'ora locale.");
$faq[] = array("La mia lingua non � nella lista!", "L'amministratore potrebbe non aver installato la tua lingua nel forum oppure nessuno ha tradotto il forum nella tua lingua. Prova a chiedere all'amministratore se � possibile installare la tua lingua nel forum. Se non esiste puoi fare tu una nuova traduzione. puoi trovare altre informazioni al sito del phpBB Group (trovi il link in fondo alle pagine).");
$faq[] = array("Come posso mostrare un'immagine sotto il mio username?", "Ci possono essere due immagini sotto uno username quando si guardano i messaggi. La prima � l'immagine associata al tuo grado, generalmente ha la forma di stelle o blocchi che indicano quanti messaggi hai scritto o il tuo stato nei forum. Sotto pu� esserci un'immgine pi� larga nota come <U>Avatar</U>, che in genere � unica o personale per ogni utente. L'amministratore del forum decide se abilitare o meno gli avatar e decide anche il modo in cui gli avatar sono messi a disposizione. Se non ti � concesso l'uso degli avatar, allora � una decisione dell'amministratore, e devi chiedere a lui le ragioni.");
$faq[] = array("Come cambio il mio grado?", "In genere non puoi cambiare direttamente il nome del tuo grado (i gradi compaiono sotto al tuo username nei topic e nel tuo profilo, a seconda dello stile che stai usando). Molti forum utilizzano i gradi per indicare il numero di messaggi che hai scritto e per identificare certi utenti, ad es. moderatori e amministratori possono avere un livello specifico. Per favore non abusare del forum inviando messaggi non necessari solo per aumentare il tuo grado; se fai cos�, i moderatori o l'amministratore probabilmente abbasseranno il numero dei tuoi messaggi.");
$faq[] = array("Perch� quando clicco sul collegamento all'e-mail di un utente mi chiede di fare il login?", "Spiacente, ma solo gli utenti registrati possono inviare e-mail ad altri utenti utilizzando il modulo di invio e-mail interno (se l'amministratore ha abilitato la funzione). Questo serve a prevenire un uso scorretto e malizioso del sistema di e-mail da parte di utenti anonimi.");


$faq[] = array("--","Invio Messaggi");
$faq[] = array("Come invio un topic in un forum?", "Facile, clicca sul bottone nelle pagine dei forum o dei topic. Potresti aver bisogno di registrarti prima di poter inviare un messaggio, le tue funzioni disponibili sono elencate in fondo alla pagina del forum o del topic (la lista <I>Puoi inviare nuovi topic, Puoi votare nei sondaggi</I>, ecc.).");
$faq[] = array("Come modifico o cancello un messaggio?", "Puoi solo modificare o cancellare i tuoi messaggi, a meno che tu non sia l'amministratore o un moderatore del forum. Puoi cancellare un messaggio cliccando sul bottone con la \"X\" nel messaggio che vuoi eliminare. Puoi modificare un messaggio (a volte solo per un limitato periodo di tempo dopo il suo inserimento) cliccando sul bottone <I>edit</I> nel messaggio in questione. Se qualcuno ha gi� risposto al tuo messaggio, quando effettui una modifica troverai del testo aggiunto in fondo al messaggio dove viene mostrato quante volte hai modificato il messaggio. Questo non apparir� solo se nessuno ha risposto o se un moderatore o l'amministratore modificano il messaggio (dovrebbero lasciare un messaggio che dice perch� e cosa hanno modificato). Un utente normale in genere non pu� cancellare un messaggio dopo che qualcuno ha risposto.");
$faq[] = array("Come aggiungo una firma ai miei messaggi?", "Per aggiungere una firma ad un messaggio devi prima crearne una, cosa che puoi fare modificando il tuo profilo. Una volta creata la firma, seleziona l'opzione <i>Aggiungi la firma</i> quando scrivi un messaggio per aggiungerla. Puoi anche decidere di aggiungere sempre la firma a tutti i tuoi messaggi selezionando l'apposita opzione <I>Aggiungi sempre la firma</I> nel tuo profilo (puoi sempre evitare di aggiungere la firma deselezionando l'opzione quando scrivi un messaggio).");
$faq[] = array("Come creo un sondaggio?", "Creare un sondaggio � facile: quando inizi un nuovo topic (o quando modifichi il primo messaggio di un topic, se ti � permesso) dovresti vedere, sotto lo spazio per l'inserimento del messaggio, un form dal titolo <I>Aggiungi un sondaggio</I> (se non lo vedi, probabilmente il tuo utente non ha il diritto di fare sondaggi). Basta inserire un titolo per il sondaggio e almeno due opzioni di risposta (per inserire un opzione di risposta, scrivila nell'apposito spazio e clicca su <I>Aggiungi opzione</I>). Puoi anche stabilire i giorni di durata del sondaggio (0 per non porre limiti). C'� un limite al numero di opzioni di risposta che puoi aggiungere, stabilito dall'amministratore.");
$faq[] = array("Come modifico o cancello un sondaggio?", "Come per i messaggi, i sondaggi possono essere modificati e cancellati solo dagli rispettivi autori, dai moderatori e dall'amministratore. Per modificare un sondaggio, clicca sul pulsante <I>edit</i> del primo messaggio (a cui � sempre associato il sondaggio). Se nessuno ha ancora votato, allora il sondaggio pu� essere modificato o cancellato, altrimenti solo i moderatori e l'amministratore possono farlo.");
$faq[] = array("Perch� non riesco ad accedere ad un forum?", "Alcuni forum potrebbero essere riservati a determinati utenti o gruppi. Per leggere, scrivere, rispondere, ecc., potresti aver bisogno di autorizzazioni speciali, che solo i moderatori e l'amministratore possono concedere.");
$faq[] = array("Perch� non posso votare nei sondaggi?", "Solo gli utenti registrati possono votare nei sondaggi (questo per evitare risultati fasulli). Se sei registrato e comunque non riesci a votare, probabilmente non hai i diritti d'accesso appropriati.");


$faq[] = array("--","Formattazione e Tipi di Topic");
$faq[] = array("Cos'� il BBCode?", "Il BBCode � una speciale implementazione dell'HTML; il suo utilizzo � precluso dalla scelta dell'amministratore (puoi anche disabilitarlo di messaggio in messaggio tramite l'opzione nel form di invio messaggi). Il BBCode � simile all'HTML, i comandi sono racchiusi tra parentesi quadre [ e ] anzich� tra &lt; e &gt; e offre un controllo maggiore su cosa e come viene mostrato nei messaggi. Per maggiori informazioni sul BBCode leggi la guida, accessibile dalla pagina di invio messaggi (oppure cliccando <A HREF=\"faq.php?mode=bbcode\">qui</A>).");
$faq[] = array("Posso usare l'HTML?", "Dipende se l'amministratore ti permette di farlo. Se ti � permesso, ci sono alcuni comandi funzionano; questa � una misura di <I>sicurezza</I> per evitare che certe persone abusino del forum usando comandi che potrebbero rovinare l'impaginazione o causare altri problemi. Se l'HTML � abilitato, puoi sempre disattivarlo.");
$faq[] = array("Cosa sono gli Emoticon?", "Gli Emoticons, o \"faccine\", sono piccole immagini  che possono essere usate per esprimere una sensazione o un'emozione con pochi caratteri, ad es. :) significa felice, :( significa triste. Questo forum trasforma automaticamente queste serie di caratteri in immagini. La lista completa degli emoticon � visibile nella pagina di invio messaggi. Cerca di non esagerare nell'uso degli emoticon, possono facilmente rendere una messaggio illeggibile, e un moderatore potrebbe decidere di modificarlo o addirittura rimuoverlo.");
$faq[] = array("Posso inserire delle immagini?", "Puoi inserire delle immagini nei tuoi messaggi. In ogni caso, al momento non � possibile caricare delle immagini direttamente su questo forum, per cui devi fare un collegamento ad un'immagine contenuta in un server di pubblico accesso, ad es. http://www.indirizzo-del-sito.com/immagine.gif. Non puoi inserire immagini che hai sul tuo computer (a meno che non sia un server!) o immagini che si trovano dietro sistemi di autenticazione, come caselle di posta tipo yahoo o hotmail, siti protetti da password, ecc. Per inserire l'immagine, puoi usare sia il comando BBCode [img] che l'appropriato comando HTML (se consentito).");
$faq[] = array("Cosa sono gli Annunci?", "Gli Annunci contengono spesso informazioni importanti e dovrebbero venir letti il prima possibile. Gli Annunci appaiono in cima ad ogni pagina del forum in cui sono stati scritti. L'amministratore pu� decidere se un utente pu� o non pu� scrivere annunci.");
$faq[] = array("Cosa sono i messaggi Importanti?", "I messaggi Importanti (noti anche come Sticky Topics) appaiono in cima alla prima pagina del forum in cui sono stati scritti (dopo eventuali Annunci). Come si intuisce dal nome stesso, contengono informazioni importanti e dovrebbero essere letti sempre. Come per gli annunci, l'amministratore pu� decidere se un utente pu� o non pu� scriverli.");
$faq[] = array("Cosa sono i topic Chiusi?", "I topic possono venire chiusi dai moderatori o dall'amministratore. Non � possibile rispondere ad un topic chiuso cos� come i sondaggi chiusi terminano automaticamente. Un topic pu� venire chiuso per varie ragioni, ad es. se contravviene alle Condizioni di adesione.");


$faq[] = array("--","Gradi e Gruppi di Utenti");
$faq[] = array("Cosa sono gli Amministratori?", "Gli Amministratori sono gli utenti che hanno il pi� alto grado di controllo sull'intero forum; possono controllare qualsiasi elemento, inclusi i permessi, il ban degli utenti, la creazione di moderatori e gruppi di utenti, ecc. Inoltre, possono moderare tutti i forum.");
$faq[] = array("Cosa sono i Moderatori?", "I Moderatori sono utenti (o gruppi di utenti) il cui compito � quello di tenere sotto controllo i forum giorno per giorno. Hanno il potere di modificare o cancellare qualsiasi messaggio e di chiudere, riaprire, spostare o rimuovere qualsiasi topic del forum da loro moderato. Generalmente il compito dei Moderatori � quello di evitare che gli utenti vadano <I>off-topic</I> (fuori tema) o che scrivano messaggi abusivi o offensivi.");
$faq[] = array("Cosa sono i Gruppi di Utenti?", "I Gruppi permettono agli amministratori di riunire gli utenti. Ogni utente pu� appartenere a pi� gruppi (a differenza della maggior parte degli altri forum) e ad ogni gruppo possono venire assegnati diversi diritti d'accesso. Questo facilita all'amministratore le operazioni di creazione di moderatori per un forum, o di concessione di accessi per un forum privato, ecc.");
$faq[] = array("Come posso far parte di un Gruppo?", "Per unirti ad un gruppo, per prima cosa clicca sul link <U>Gruppi Utenti</U> che trovi in cima alla pagina (questo pu� variare a seconda del design del forum), e potrai accedere all'elenco dei Gruppi. Non tutti i gruppi sono ad <I>accesso aperto</I>. Alcuni sono chiusi e altri hanno l'elenco dei membri nascosto. Se il gruppo � Aperto, puoi chiedere l'ammissione cliccando sul pulsante apposito. Dovrai ottenere l'approvazione del moderatore del Gruppo, che potrebbe chiederti perch� vuoi unirti al gruppo. Se un moderatore di un gruppo non accetta la tua richiesta, sei pregato di non assillarlo; probabilmente ha le sue buone ragioni.");
$faq[] = array("Come divento Moderatore di un Gruppo?", "I Gruppi Utenti vengono creati dall'amministratore, il quale stabilisce anche il moderatore. Se desideri creare un Gruppo nuovo, contatta l'amministratore, via e-mail o con un messaggio privato.");


$faq[] = array("--","Messaggi Privati");
$faq[] = array("Non riesco a mandare messaggi privati!", "Ci sono tre ragioni per cui questo pu� accadere: non sei registrato o non hai fatto il login, l'amministratore ha disabilitato i messaggi privati per tutto il forum, oppure li ha disabilitati solo a te. Se il tuo caso � l'ultimo, prova a chiedere il perch� all'amministratore.");
$faq[] = array("Continuano ad arrivarmi messaggi privati indesiderati!", "Se continui a ricevere messaggi indesiderati da qualcuno, prova ad informare l'amministratore, il quale pu� revocare l'uso dei messaggi privati ad un determinato utente.");
$faq[] = array("Ho ricevuto un'e-mail indesiderata o dello spamming da qualcuno in questo forum!", "Ci dispiace saperlo. Il sistema di invio di posta di questo forum include un sistema di protezione per risalire a chi manda queste e-mail. Dovresti mandare una copia dell'e-mail in questione all'amministratore, includendo anche l'intestazione, in modo che possa intervenire.");

//
// These entries should remain in all languages and for all modifications
//
$faq[] = array("--","Informazioni su phpBB 2");
$faq[] = array("Chi ha scritto questo programma?", "Questo software (nella sua forma originale) � prodotto e rilasciato da <a href=\"http://www.phpbb.com/\" target=\"_blank\">phpBB Group</a>, che ne possiede anche il copyright. E' reso disponibile sotto la GNU General Public Licence e pu� essere liberamente distribuito; clicca il link per maggiori informazioni.");
$faq[] = array("Perch� la caratteristica X non � disponibile?", "Questo software � stato scritto da phpBB Group. Se credi che ci sia bisogno di aggiungere una funzionalit�, visita il sito phpbb.com e guarda cosa il phpBB Group ha da dire a riguardo. Sei pregato di non fare richieste per nuove caratteristiche nel forum di phpbb.com, il Gruppo si appoggia a Sourceforge per la gestione di nuove funzionalit�. Leggi il forum e cerca di capire, se vengono spiegate, quali sono le nostre posizioni a proposito di quella caratteristica e segui la procedura data.");
$faq[] = array("Chi devo contattare in caso di problemi abusivi e/o legali di questo forum?", "Devi contattare l'amministratore di questo forum. Se non riesci a trovarlo, prova a contattare uno dei moderatori e chiedi a chi puoi rivolgerti. Se ancora non ottieni risposta, puoi contattare il proprietario del dominio (fai una ricerca con whois) oppure, se il forum � ospitato da un servizio gratuito (ad es. yahoo, free.fr, f2s.com, ecc.), l'amministratore di tale servizio. Nota che il phpBB Group non ha assolutamente alcun controllo e non pu� essere ritenuto responsabile di come, dove e da chi questo forum viene utilizzato. E' assolutamente inutile contattare il phpBB Group in relazione a qualsiasi questione legale non direttamente collegata al sito phpbb.com o al software phpBB stesso. Le e-mail inviate al phpBB Group riguardanti l'uso da parte di terzi di questo software non riceveranno nessuna risposta.");
//
// This ends the FAQ entries
//

?>