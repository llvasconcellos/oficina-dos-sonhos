<?php
//zOOm Media Gallery//
/**
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: February, 2005                                                |
| Author: Alexandre Scuriza, <http://www.scuriza.com.br>              |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Mambo. It's the most feature-rich gallery component    |
|              for Mambo! For documentation and a detailed list       |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: brazilian_portuguese.php                                  |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOm Media Gallery
* @author Mike de Boer <mailme@mikedeboer.nl>
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
//Language translation
define("_ZOOM_DATEFORMAT","%d.%m.%Y %H:%M"); // use the PHP strftime Format, more info at http://www.php.net
define("_ZOOM_ISO","iso-8859-1");
define("_ZOOM_PICK","Escolha uma galeria");
define("_ZOOM_DELETE","Deletar");
define("_ZOOM_BACK","Voltar");
define("_ZOOM_MAINSCREEN","Tela Principal");
define("_ZOOM_BACKTOGALLERY","Voltar a galeria");
define("_ZOOM_INFO_DONE","feito!");
define("_ZOOM_TOOLTIP", "Dica zOOm");
define("_ZOOM_WARNING", "Aviso zOOm!");

//Gallery admin page
define("_ZOOM_ADMINSYSTEM","Administração");
define("_ZOOM_USERSYSTEM","Usuário");
define("_ZOOM_ADMIN_TITLE","Galeria de Imagens do Administrador");
define("_ZOOM_USER_TITLE","Galeria de Imagens do Usuário");
define("_ZOOM_CATSMGR","Gerenciador de Galeria");
define("_ZOOM_CATSMGR_DESCR","cria novas galerias para os seus arquivos; crie, edite e delete tudo aqui no Gerenciador de Galeria.");
define("_ZOOM_NEW","Nova galeria");
define("_ZOOM_DEL","Deletar galeria");
define("_ZOOM_MEDIAMGR","Gerenciador Midia ");
define("_ZOOM_MEDIAMGR_DESCR","move, edita, deleta, procurar por arquivos automaticamente ou sobe (multiplos) novos arquivos manualmente.");
define("_ZOOM_UPLOAD","Subir arquivo(s)");
define("_ZOOM_EDIT","Editar galeria");
define("_ZOOM_ADMIN_CREATE","Criar BancoDados");
define("_ZOOM_ADMIN_CREATE_DESCR","monta as tabelas necessárias, então depois voce ja pode usar o album");
define("_ZOOM_HD_PREVIEW","Visualizar");
define("_ZOOM_HD_CHECKALL","Marcar/Desmarcar Tudo");
define("_ZOOM_HD_CREATEDBY","Criado por");
define("_ZOOM_HD_AFTER","Galeria Pai");
define("_ZOOM_HD_HIDEMSG","Esconder texto 'sem arquivos'");
define("_ZOOM_HD_NAME","Titulo");
define("_ZOOM_HD_DIR","Diretorio");
define("_ZOOM_HD_NEW","Nova galeria");
define("_ZOOM_HD_SHARE","Compartilhe esta galeria");
define("_ZOOM_SHARE","Compartilhar");
define("_ZOOM_UNSHARE","Descompartilhar");
define("_ZOOM_PUBLISH","Publicar");
define("_ZOOM_UNPUBLISH","Despublicar");
define("_ZOOM_TOPLEVEL","Top Level");
define("_ZOOM_HD_UPLOAD","Subir arquivo");
define("_ZOOM_A_ERROR_ERRORTYPE","Tipo Erro");
define("_ZOOM_A_ERROR_IMAGENAME","Nome Imagem");
define("_ZOOM_A_ERROR_NOFFMPEG","<u>FFmpeg</u> não detectado");
define("_ZOOM_A_ERROR_NOPDFTOTEXT","<u>PDFtoText</u> não detectado");
define("_ZOOM_A_ERROR_NOTINSTALLED","Não instalado");
define("_ZOOM_A_ERROR_CONFTODB","Erro enquanto salvava configuração no banco de dados!");
define("_ZOOM_A_MESS_NOT_SHURE","* Se vocênão estiver certo, use o padrão \"auto\" ");
define("_ZOOM_A_MESS_SAFEMODE1","Nota: \"Modo Seguro\" esta ativado, consequentemente é possível que uploads de imagens muito grandes não funcionem!<br />Você deve ir para o Sistema Administrativo e mudar para FTP-Mode.");
define("_ZOOM_A_MESS_SAFEMODE2","Nota: \"Modo Seguro\" is activated, consequentemente é possível que uploads de arquivos muito grandes não funcionem!<br />zOOm recomenda ativar o FTP-Mode no Sistema Administrativo.");
define("_ZOOM_A_MESS_PROCESSING_FILE","Processando arquivo...");
define("_ZOOM_A_MESS_NOTOPEN_URL","Não foi possivelabrir a url:");
define("_ZOOM_A_MESS_PARSE_URL","Analisando \"%s\" para imagens... "); // %s = $url
define("_ZOOM_A_MESS_NOJAVA","Se você ve acima apenas uma caixa cinza ou esta tendo problemas enquanto baixa novas imagens, deve ser por que você<br />não tem o último java run-time instalado. Visite <a href=\"http://www.java.com\" target=\"_blank\">Java.com</a> <br /> e baixe as versões mais atuais.");
define("_ZOOM_SETTINGS","Configurações");
define("_ZOOM_SETTINGS_DESCR","mude e visualize todas as configurações disponíveis aqui.");
define("_ZOOM_SETTINGS_TAB1","Sistema");
define("_ZOOM_SETTINGS_TAB2","Midia");
define("_ZOOM_SETTINGS_TAB3","Layout");
//Tab 4 is Module
define("_ZOOM_SETTINGS_TAB5","Modo Seguro");
define("_ZOOM_SETTINGS_TAB6","Accessibilidade");
define("_ZOOM_SETTINGS_CONVTYPE","Tipo de Conversão");
define("_ZOOM_SETTINGS_AUTODET","auto-detectado: ");
define("_ZOOM_SETTINGS_IMGPATH","Endereço para os arquivos de imagens:");
define("_ZOOM_SETTINGS_TTIMGPATH","O endereço atual para as fotos é ");
define("_ZOOM_SETTINGS_CONVSETTINGS","Configuração da conversão de imagens:");
define("_ZOOM_SETTINGS_IMPATH","Endereço do ImageMagick: ");
define("_ZOOM_SETTINGS_NETPBMPATH"," ou NetPBM: ");
define("_ZOOM_SETTINGS_FFMPEGPATH","Endereço do FFmpeg");
define("_ZOOM_SETTINGS_FFMPEGTOOLTIP","FFmpeg é necessário para criar thumbnails dos seus arquivos de vídeo.<br />As extensões suportadas são: ");
define("_ZOOM_SETTINGS_PDFTOTEXTPATH","Endereço do PDFtoText");
define("_ZOOM_SETTINGS_XPDFTOOLTIP","pdf2text, que é parte do pacote Xpdf, é necessário para a indexação dos arquivos PDF.");
define("_ZOOM_SETTINGS_MAXSIZE","Tamanho max. da Imagem: ");
define("_ZOOM_SETTINGS_THUMBSETTINGS","Configuração do Thumbnail:");
define("_ZOOM_SETTINGS_QUALITY","Qualidade NetPBM e GD2 JPEG: ");
define("_ZOOM_SETTINGS_SIZE","Tamanho max. do Thumbnail: ");
define("_ZOOM_SETTINGS_TEMPNAME","Nome Temporário: ");
define("_ZOOM_SETTINGS_AUTONUMBER","auto-numerar o nome das imagens (ex. 1,2,3)");
define("_ZOOM_SETTINGS_TEMPDESCR","Descrição Temporária: ");
define("_ZOOM_SETTINGS_TITLE","Título da Galeria:");
define("_ZOOM_SETTINGS_SUBCATSPG","Núm. de colunas das (sub)galerias");
define("_ZOOM_SETTINGS_COLUMNS","Núm. de Colunas do Thumbnail");
define("_ZOOM_SETTINGS_THUMBSPG","Thumbs por página");
define("_ZOOM_SETTINGS_CMTLENGTH","Tamanho max. para comentário");
define("_ZOOM_SETTINGS_CHARS","caracteres");
define("_ZOOM_SETTINGS_GALLERYPREFIX","Prefixo do Título da Galeria");
define("_ZOOM_SETTINGS_FEATURES_TITLE","Características ON/ OFF");
define("_ZOOM_SETTINGS_CSS_TITLE","Editar Folhas de Estilo");
define("_ZOOM_SETTINGS_DISPLAY_TITLE","Dados para exibir ON/ OFF");
define("_ZOOM_SETTINGS_COMMENTS","Comentários");
define("_ZOOM_SETTINGS_POPUP","PopUp Imagem");
define("_ZOOM_SETTINGS_CATIMG","Mostrar a categoria da Imagem");
define("_ZOOM_SETTINGS_SLIDESHOW","Slideshow");
define("_ZOOM_SETTINGS_ZOOMLOGO","Nostrar Logo zOOm");
define("_ZOOM_SETTINGS_SHOWHITS","Mostrar núm. de hits");
define("_ZOOM_SETTINGS_READEXIF","Ler EXIF");
define("_ZOOM_SETTINGS_EXIFTOOLTIP","Esta característica vai exibir dados adicionais de EXIF e outros metadados IPTC, sem a necessidade do módulo EXIF para o PHP ser instalado no seu sistema.");
define("_ZOOM_SETTINGS_READID3","Ler mp3 ID3-data");
define("_ZOOM_SETTINGS_ID3TOOLTIP","Esta característica vai exibir dados adicionais de ID3 v1.1 e v2.0 quando estiver visualizando os detalhes de um arquivo mp3.");
define("_ZOOM_SETTINGS_RATING","Avaliação");
define("_ZOOM_SETTINGS_CSS","Janela Popup");
define("_ZOOM_SETTINGS_USERUPL","Deixar os usuários fazerem upload:");
define("_ZOOM_SETTINGS_ACCESSLVL","Nível de acesso: ");
define("_ZOOM_SETTINGS_CSSZOOM","Galeria zOOm  &amp; Visualização");
define("_ZOOM_SETTINGS_SUCCESS","Configurações atualizadas com sucesso!");
define("_ZOOM_SETTINGS_ZOOMING","Zoom das imagens");
define("_ZOOM_SETTINGS_ORDERBY","Metodo ordenação Thumbnail; ordenado por");
define("_ZOOM_SETTINGS_CATORDERBY","Metodo ordenação (Sub-)Galeria; ordenado por");
define("_ZOOM_SETTINGS_DATE_ASC","DATA, ascendente");
define("_ZOOM_SETTINGS_DATE_DESC","DATA, descendente");
define("_ZOOM_SETTINGS_FLNM_ASC","NOME-ARQUIVO, ascendente");
define("_ZOOM_SETTINGS_FLNM_DESC","NOME-ARQUIVO, descendente");
define("_ZOOM_SETTINGS_NAME_ASC","NOME, ascendente");
define("_ZOOM_SETTINGS_NAME_DESC","NOME, descendente");
define("_ZOOM_SETTINGS_LBTOOLTIP","Um Porta-Retratos é como um carrinho de compras preenchido com as imagens que você selecionou, que pode ser baixado como um arquivo ZIP.");
define("_ZOOM_SETTINGS_SHOWNAME","Mostrar Nome");
define("_ZOOM_SETTINGS_SHOWDESCR","Mostrar descrição");
define("_ZOOM_SETTINGS_SHOWKEYWORDS","Mostrar palavras-chave");
define("_ZOOM_SETTINGS_SHOWDATE","Mostrar data");
define("_ZOOM_SETTINGS_SHOWUNAME","Mostrar Usuário");
define("_ZOOM_SETTINGS_SHOWFILENAME","Mostrar nome do arquivo");
define("_ZOOM_SETTINGS_METABOX","Mostrar caixa flutuante com os detalhes nas páginas das galerias");
define("_ZOOM_SETTINGS_METABOXTOOLTIP","Desmarque esta característica para melhorar a velocidade de sua galeria. Eficiente com banco de dados grandes.");
define("_ZOOM_SETTINGS_ECARDS","Cartões");
define("_ZOOM_SETTINGS_ECARDS_LIFETIME","Tempo dos Cartões");
define("_ZOOM_SETTINGS_ECARDS_ONEWEEK","uma semana");
define("_ZOOM_SETTINGS_ECARDS_TWOWEEKS","duas semanas");
define("_ZOOM_SETTINGS_ECARDS_ONEMONTH","um mês");
define("_ZOOM_SETTINGS_ECARDS_THREEMONTHS","três meses");
define("_ZOOM_SETTINGS_SHOWSEARCH","Campo de procura em todas as páginas");
define("_ZOOM_SETTINGS_ALLOWCREATE","Permitir que os usuários criem Galerias");
define("_ZOOM_SETTINGS_ALLOWDEL","Permitir que usuários eliminem galerias partilhadas");
define("_ZOOM_SETTINGS_ALLOWEDIT","Permitir que usuários editem Galerias partilhadas");
define("_ZOOM_SETTINGS_SETMENUOPTION","Mostrar o link 'Subir Imagens' no Menu do Usuário");
define("_ZOOM_SETTINGS_USEFTP","Usar modo FTP?");
define("_ZOOM_SETTINGS_FTPHOST","Nome do Host");
define("_ZOOM_SETTINGS_FTPUNAME","Nome do Usuário");
define("_ZOOM_SETTINGS_FTPPASS","Senha");
define("_ZOOM_SETTINGS_FTPWARNING","Atenção: A senha não é salva com segurança!");
define("_ZOOM_SETTINGS_FTPHOSTDIR","Diretório no Host");
define("_ZOOM_SETTINGS_MESS_FTPHOSTDIR","Por favor forneça o diretório do seu root FTP aqui. IMPORTANTANTE: Terminar <b>sem</b> a barra ou barra invertida!");
define("_ZOOM_SETTINGS_GROUP","Grupo");
define("_ZOOM_SETTINGS_PRIV_DESCR","Você pode  mudar os privilégios de cada grupo conhecido no Mambo e mudar por este meio os privilégios de cada usuário que é um membro desse grupo!<br/> Um usuário, na teoria, fazer as seguintes ações:  subir o arquivo(s), editar/apagar imagens, críar/editar/apagar galerias(compartilhadas).<br/> O que eles podem e não podem fazer no mundo real é com você.");
define("_ZOOM_SYSTEM_TITLE","Configurações Sistema");
define("_ZOOM_YES","sim");
define("_ZOOM_NO","não");
define("_ZOOM_SAVE","Salvar");
define("_ZOOM_MOVEFILES","Mover imagem");
define("_ZOOM_MOVEFILES_DESCR","Mover fotos entre galerias");
define("_ZOOM_BUTTON_MOVE","Mover");
define("_ZOOM_MOVEFILES_STEP1","Selecione a galeria destino e mova as imagens");
define("_ZOOM_ALERT_MOVEOK","Imagens movidas comsucesso!");
define("_ZOOM_OPTIMIZE","Otimizar tabelas");
define("_ZOOM_OPTIMIZE_DESCR","A Galeria de Imagens zOOm usa muito suas tabelas e cria assim muitos dados sem importância. Clique aqui para remover o lixo.");
define("_ZOOM_OPTIMIZE_SUCCESS","A Galeria de Imagens zOOm foi otimizada!");
define("_ZOOM_UPDATE","Atualizar Galeria de Imagens zOOm");
define("_ZOOM_UPDATE_DESCR","adicionar novas características, solucionar problemas e resolver os bugs! Visite <a href=\"http://www.zoomfactory.org\" target=\"_blank\">www.zoomfactory.org</a> para as últimas atualizações!");
define("_ZOOM_UPDATE_XMLDATE","Data da última atualização");
define("_ZOOM_UPDATE_NOUPDATES","nenhuma atualização ainda!"); // added 11-08
define("_ZOOM_UPDATE_PACKAGE","Arquivo ZIP de atualização: ");
define("_ZOOM_CREDITS","Sobre a Galeria de Imagens zOOm & Creditos");

//Image actions
define("_ZOOM_DISKSPACEUSAGE","Espaço %s é atualmente usado");
define("_ZOOM_UPLOAD_SINGLE","único arquivo(ZIP)");
define("_ZOOM_UPLOAD_MULTIPLE","múltiplos arquivos");
define("_ZOOM_UPLOAD_DRAGNDROP","Arrastar & Soltar");
define("_ZOOM_UPLOAD_SCANDIR","Pesquisar diretório");
define("_ZOOM_UPLOAD_INTRO","Clique no botão <b>Procurar</b> para encontrar uma imagempara subir.");
define("_ZOOM_UPLOAD_STEP1","1. Selecione o número de imagens que você quer subir: ");
define("_ZOOM_UPLOAD_STEP2","2. Selecione a Galeria para onde você quer enviar os arquivos: ");
define("_ZOOM_UPLOAD_STEP3","3. Use o botão Procurar... para encontrar as imagens no seu computador");
define("_ZOOM_SCAN_STEP1","Step 1: Forneça um local para procurar por imagens...");
define("_ZOOM_SCAN_STEP2","Step 2: Selecioneos arquivos que vocêquer subir...");
define("_ZOOM_SCAN_STEP3","Step 3: zOOm processa os arquivos selecionados...");
define("_ZOOM_SCAN_STEP1_DESCR","O local pode ser tanto uma URL quanto um diretório no Servidor.<br />&nbsp;   Dica: Suba imagens (FTP) para um diretorio no seu servidor, e aponte o caminho aqui!");
define("_ZOOM_SCAN_STEP2_DESCR1","Processando");
define("_ZOOM_SCAN_STEP2_DESCR2","como um diretório local");
define("_ZOOM_FORMCREATE_NAME","Nome");
define("_ZOOM_FORM_IMAGEFILE","Imagem");
define("_ZOOM_FORM_IMAGEFILTER","Tipos de Imagens Suportadas");
define("_ZOOM_FORM_INGALLERY","Na Galeria");
define("_ZOOM_FORM_SETFILENAME","Selecionar o nome das imagens com o nome dos arquivos originais.");
define("_ZOOM_FORM_IGNORESIZES","Ignorar dimensões maximas da imagem pré-configuradas"); //added: 12-08
define("_ZOOM_FORM_LOCATION","Local");
define("_ZOOM_BUTTON_SCAN","Enviar URL ou diretório");
define("_ZOOM_BUTTON_UPLOAD","Subir");
define("_ZOOM_BUTTON_EDIT","Editar");
define("_ZOOM_BUTTON_CREATE","Criar");
define("_ZOOM_CONFIRM_DEL","Esta opção vai remover uma Galeria completamente, incluindo as imagens!\\nVocê deseja prosseguir?");
define("_ZOOM_CONFIRM_DELMEDIUM","Você irá remover completamente esta midia!\\nVocê deseja prosseguir?");
define("_ZOOM_ALERT_DEL","galeria foi apagada!");
define("_ZOOM_ALERT_NOCAT","Nenhuma Galeria foi selecionada!");
define("_ZOOM_ALERT_NOMEDIA","Nenhuma imagem selecionada!");
define("_ZOOM_ALERT_EDITOK","Campos da Galeria foram editados com sucesso!");
define("_ZOOM_ALERT_NEWGALLERY","Nova Galeria criada.");
define("_ZOOM_ALERT_NONEWGALLERY","Galeria não foi criada!");
define("_ZOOM_ALERT_EDITIMG","As propriedades foram editadas com sucesso.");
define("_ZOOM_ALERT_DELPIC","Imagem apagada com sucesso.");
define("_ZOOM_ALERT_NODELPIC","Imagem não pode ser apagada!");
define("_ZOOM_ALERT_NOPICSELECTED","Nenhuma imagem selecionada.");
define("_ZOOM_ALERT_NOPICSELECTED_MULT","Nenhuma imagem selecionada.");
define("_ZOOM_ALERT_UPLOADOK","Imagem enviada com sucesso!");
define("_ZOOM_ALERT_UPLOADSOK","Imagens enviadas com sucesso!");
define("_ZOOM_ALERT_WRONGFORMAT","Formato incorreto da imagem.");
define("_ZOOM_ALERT_WRONGFORMAT_MULT","Formato incorreto.");
define("_ZOOM_ALERT_MOVEFAILURE","Erro movendo arquivo.");
define("_ZOOM_ALERT_IMGERROR","Erro ajustando tamanho da imagem/ criando thumbnail.");
define("_ZOOM_ALERT_PCLZIPERROR","Erro ocorrido enquanto extraia arquivo.");
define("_ZOOM_ALERT_INDEXERROR","Erro ocorrido enquanto indexava documento.");
define("_ZOOM_ALERT_IMGFOUND","imagem(s) encontradas.");
define("_ZOOM_INFO_CHECKCAT","Por favor escolha uma galeria antes de clicar no botão de upload!");
define("_ZOOM_BUTTON_ADDIMAGES","Adicionar imagem");
define("_ZOOM_BUTTON_REMIMAGES","Remover imagem");
define("_ZOOM_INFO_PROCESSING","Processando arquivo:");
define("_ZOOM_ITEMEDIT_TAB1","Propriedades");
define("_ZOOM_ITEMEDIT_TAB2","Membros");
define("_ZOOM_ITEMEDIT_TAB3","Ações");
define("_ZOOM_USERSLIST_LINE1",">>Selecione os membros deste ítem<<");
define("_ZOOM_USERSLIST_ALLOWALL",">>Acesso Público<<");
define("_ZOOM_USERSLIST_MEMBERSONLY",">>Somente Membros<<");
define("_ZOOM_PUBLISHED","Publicado");
define("_ZOOM_SHARED","Compartilhado");
define("_ZOOM_ROTATE","Rotacionar a imagem em 90 graus");
define("_ZOOM_CLOCKWISE","sentido horário");
define("_ZOOM_CCLOCKWISE","sentido anti-horário");
define("_ZOOM_FLIP_HORIZ","Inverter imagem horizontalmente");
define("_ZOOM_FLIP_VERT","Inverter imagem verticalmente");
define("_ZOOM_PROGRESS_DESCR","Seu pedido esta sendo processado... Por favor seja paciente.");

//Navigation (including Slideshow buttons)
define("_ZOOM_SLIDESHOW","SlideShow:");
define("_ZOOM_PREV_IMG","Anterior");
define("_ZOOM_NEXT_IMG","Proxima");
define("_ZOOM_FIRST_IMG","Primeira");
define("_ZOOM_LAST_IMG","Ultima");
define("_ZOOM_PLAY","Iniciar");
define("_ZOOM_STOP","Parar");
define("_ZOOM_RESET","Reiniciar");
define("_ZOOM_FIRST","Primeiro");
define("_ZOOM_LAST","Último");
define("_ZOOM_PREVIOUS","Anterior");
define("_ZOOM_NEXT","Próximo");

//Gallery actions
define("_ZOOM_SEARCH_BOX","Procura rápida...");
define("_ZOOM_ADVANCED_SEARCH","Procura avançada");
define("_ZOOM_SEARCH_KEYWORD","Procurar por palavra-chave");
define("_ZOOM_IMAGES","imagens");
define("_ZOOM_IMGFOUND","encontradas - você está na página");
define("_ZOOM_IMGFOUND2","de");
define("_ZOOM_SUBGALLERIES","sub-galerias");
define("_ZOOM_ALERT_COMMENTOK","Seu comentário foi adicionado com sucesso!");
define("_ZOOM_ALERT_COMMENTERROR","Você ja fez um comentário sobre esta imagem!");
define("_ZOOM_ALERT_VOTE_OK","Seu voto foi contado! Obrigado.");
define("_ZOOM_ALERT_VOTE_ERROR","Você já votou nesta imagem!");
define("_ZOOM_WINDOW_CLOSE","Fechar");
define("_ZOOM_NOPICS","Nenhuma imagem na Galeria");
define("_ZOOM_PROPERTIES","Propriedades");
define("_ZOOM_COMMENTS","Comentários");
define("_ZOOM_NO_COMMENTS","Nenhum comentário adicionado ainda.");
define("_ZOOM_YOUR_NAME","Nome");
define("_ZOOM_ADD","Adicionar");
define("_ZOOM_NAME","Nome");
define("_ZOOM_DATE","Data adicionada");
define("_ZOOM_UNAME","Adicionado por");
define("_ZOOM_DESCRIPTION","Descrição");
define("_ZOOM_IMGNAME","Nome");
define("_ZOOM_FILENAME","Nome-Arquivo");
define("_ZOOM_CLICKDOCUMENT","(clique no nome do arquivo para abrir o documento)");
define("_ZOOM_KEYWORDS","Palavras-Chave");
define("_ZOOM_HITS","hits");
define("_ZOOM_CLOSE","Fechar");
define("_ZOOM_NOIMG", "Nenhuma imagem encontrada!");
define("_ZOOM_NONAME", "Você deve fornecer um nome!");
define("_ZOOM_NOCAT", "Nenhuma categoria selecionada!");
define("_ZOOM_EDITPIC", "Editar Imagem");
define("_ZOOM_SETCATIMG","Definir como Imagem da Galeria");
define("_ZOOM_SETPARENTIMG","Definir como Imagem da Galeria de uma Galeria PRINCIPAL");
define("_ZOOM_PASS","Password");
define("_ZOOM_PASS_REQUIRED","This galeria requires a password.<br />Please fill the password field<br />and press the Go button. Thank you.");
define("_ZOOM_PASS_BUTTON","Ir");
define("_ZOOM_PASS_GALLERY","Senha");
define("_ZOOM_PASS_INNCORRECT","Senha Incorreta");

//Lightbox
define("_ZOOM_LIGHTBOX","Porta-Retratos");
define("_ZOOM_LIGHTBOX_GALLERY","Guarde esta galeria!");
define("_ZOOM_LIGHTBOX_ITEM","Guarde este item!");
define("_ZOOM_LIGHTBOX_VIEW","Ver seu Porta-Retratos");
define("_ZOOM_YOUR_LIGHTBOX","Conteudo do seu Porta-Retratos:");
define("_ZOOM_LIGHTBOX_EMPTY","Seu Porta-Retratos esta atualmente vazio.");
define("_ZOOM_LIGHTBOX_ZIPBTN","Criar arquivo ZIP");
define("_ZOOM_LIGHTBOX_PLAYLISTBTN","Criar Playlist & Tocar");
define("_ZOOM_LIGHTBOX_CATS","Galerias");
define("_ZOOM_LIGHTBOX_TITLEDESCR","Título & Descrição");
define("_ZOOM_ACTION","Ação");
define("_ZOOM_LIGHTBOX_ADDED","Ítem adicionado ao seu Porta-Retratos com sucesso!");
define("_ZOOM_LIGHTBOX_NOTADDED","Erro adicionando ítem ao seu Porta-Retratos!");
define("_ZOOM_LIGHTBOX_EDITED","Ítem editado com sucesso!");
define("_ZOOM_LIGHTBOX_NOTEDITED","Erro editando ítem!");
define("_ZOOM_LIGHTBOX_DEL","Ítem removido de seu Porta-Retratos com sucesso!");
define("_ZOOM_LIGHTBOX_NOTDEL","Erro removendo item do seu Porta-Retratos!");
define("_ZOOM_LIGHTBOX_NOZIP","Você ja criou um arquivo Zip de seu Porta-Retratos ou o seu Porta-Retratos não contém nenhum ítem!");
define("_ZOOM_LIGHTBOX_PARSEZIP","Analizando imagens da Galeria...");
define("_ZOOM_LIGHTBOX_DOZIP","criando arquivo ZIP...");
define("_ZOOM_LIGHTBOX_DLHERE","Você agora pode baixar o Porta-Retratos");
define("_ZOOM_LIGHTBOX_PLSUCCESS","Playlist criado com sucesso! Você precisa atualizar a janela do Player.");
define("_ZOOM_LIGHTBOX_PLERROR","Erro criando Playlist.");
define("_ZOOM_LIGHTBOX_NOAUDIO","Você precisa adicionar arquivos de áudio no seu Porta-Retratos primeiro!");
define("_ZOOM_LIGHTBOX_NOITEMS","Seu Porta-Retratos parece estar vazio.");

//EXIF information
define("_ZOOM_EXIF","EXIF");
define("_ZOOM_EXIF_SHOWHIDE","Mostrar/ esconder Metadata");

//MP3 id3 v1.1 or later information
define("_ZOOM_AUDIO_PLAYING","Tocando:");
define("_ZOOM_AUDIO_CLICKTOPLAY","Clique aqui para tocar este arquivo.");
define("_ZOOM_ID3","ID3");
define("_ZOOM_ID3_SHOWHIDE","Mostrar/ esconder ID3-tag data");
define("_ZOOM_ID3_LENGTH","Tamanho");
define("_ZOOM_ID3_QUALITY","Qualidade");
define("_ZOOM_ID3_TITLE","Titulo");
define("_ZOOM_ID3_ARTIST","Artista");
define("_ZOOM_ID3_ALBUM","Album");
define("_ZOOM_ID3_YEAR","Ano");
define("_ZOOM_ID3_COMMENT","Comentário");
define("_ZOOM_ID3_GENRE","Genero");

//Video metadata information
define("_ZOOM_VIDEO_SHOWHIDE","Mostrar/ esconder Video data");
define("_ZOOM_VIDEO_PIXELRATIO","Taxa Pixel");
define("_ZOOM_VIDEO_QUALITY","Qualidade Video");
define("_ZOOM_VIDEO_AUDIOQUALITY","Qualidade Audio");
define("_ZOOM_VIDEO_CODEC","Codec");
define("_ZOOM_VIDEO_RESOLUTION","Resolução");

//rating
define("_ZOOM_RATING","Avaliação");
define("_ZOOM_NOTRATED","Ainda não avaliado!");
define("_ZOOM_VOTE","voto");
define("_ZOOM_VOTES","votos");
define("_ZOOM_RATE0","ruim");
define("_ZOOM_RATE1","fraco");
define("_ZOOM_RATE2","médio");
define("_ZOOM_RATE3","bom");
define("_ZOOM_RATE4","muito bom");
define("_ZOOM_RATE5","perfeita!");

//special
define("_ZOOM_TOPTEN","Mais vistas");
define("_ZOOM_LASTSUBM","Últimas enviadas");
define("_ZOOM_LASTCOMM","Últimas comentadas");
define("_ZOOM_SEARCHRESULTS","Resultados da busca");
define("_ZOOM_TOPRATED","Mais Votadas");

//ecard
define("_ZOOM_ECARD_SENDAS","Enviar esta imagem como um Cartão para um amigo!");
define("_ZOOM_ECARD_YOURNAME","Seu nome");
define("_ZOOM_ECARD_YOUREMAIL","Seu endereço de email");
define("_ZOOM_ECARD_FRIENDSNAME","O nome de seu amigo");
define("_ZOOM_ECARD_FRIENDSEMAIL","O email do seu amigo");
define("_ZOOM_ECARD_MESSAGE","Messagem");
define("_ZOOM_ECARD_SENDCARD","Enviar Cartão");
define("_ZOOM_ECARD_SUCCESS","Seu Cartão foi enviado com sucesso.");
define("_ZOOM_ECARD_CLICKHERE","Clique aqui para vê-lo!");
define("_ZOOM_ECARD_ERROR","Erro enviando Cartão para");
define("_ZOOM_ECARD_TURN","Olhe atrás deste Cartão!");
define("_ZOOM_ECARD_TURN2","olhe a frente deste Cartão!");
define("_ZOOM_ECARD_SENDER","Enviado para você por");
define("_ZOOM_ECARD_SUBJ","Você recebeu um Cartão de:");
define("_ZOOM_ECARD_MSG1","enviado para você um Cartão de");
define("_ZOOM_ECARD_MSG2","Clique no link abaixo para ver o seu Cartão pessoal!");
define("_ZOOM_ECARD_MSG3","Não responda este email, pois ele foi gerado automaticamente.");

//installation-screen
define ('_ZOOM_INSTALL_CREATE_DIR','A instalação do zOOm está tentando criar o diretório de imagens "images/zoom" ...');
define ('_ZOOM_INSTALL_CREATE_DIR_SUCC','feito!');
define ('_ZOOM_INSTALL_CREATE_DIR_FAIL','falhou!');
define ('_ZOOM_INSTALL_MESS1','A Galeria de imagens zOOm foi instalada com sucesso.<br>Você agora já pode criar seus álbuns!');
define ('_ZOOM_INSTALL_MESS2','NOTA: a primeira coisa que você deve fazer agora, é ir para o menu dos componentes acima,<br>procurar pelo título "Administrador da Galeria de Imagens zOOm", clique no link e <br>visualize o painel administrativo.');
define ('_ZOOM_INSTALL_MESS3','Aqui você pode ajustar todas as variáveis do zOOm para a sua configuração.');
define ('_ZOOM_INSTALL_MESS4','Não se esqueça de criar uma Galeria, a partir daí, é sua responsabilidade!!');
define ('_ZOOM_INSTALL_MESS_FAIL1','A Galeria zOOM não pode ser instalada com sucesso');
define ('_ZOOM_INSTALL_MESS_FAIL2','Os seguintes diretórios devem ser criados e mais tarde seus direitos mudado para "0777":<br />'
. '"images/zoom"<br />'
. '/components/com_zoom/images"<br />'
. '"/components/com_zoom/admin"<br />'
. '"/components/com_zoom/classes"<br />'
. '"/components/com_zoom/images"<br />'
. '"/components/com_zoom/images/admin"<br />'
. '"/components/com_zoom/images/filetypes"<br />'
. '"/components/com_zoom/images/rating"<br />'
. '"/components/com_zoom/images/smilies"<br />'
. '"/components/com_zoom/language"<br />'
. '"/components/com_zoom/tabs"');
define ('_ZOOM_INSTALL_MESS_FAIL3','Uma vez que você tenha criado todos os diretórios e mudados os direitos, vá para <br /> "Components -> zOOm Media Gallery" e escolha suas configurações.');


//Module Language
define("_ZOOM_M_config","Módulo");
define("_ZOOM_M_method","Método Visualização");
define("_ZOOM_M_all","tudo");
define("_ZOOM_M_random","randomico");
define("_ZOOM_M_newest","novo");
define("_ZOOM_M_hits","hits");
define("_ZOOM_M_votes","votos");
define("_ZOOM_M_count","Numero de imagens:");
define("_ZOOM_M_lastup","Ultima atualização:");
define("_ZOOM_M_admin_count","Mostrar Numero de imagens:");
define("_ZOOM_M_admin_lastup","Mostrar Ultima atualização:");
define("_ZOOM_M_admin_cats","Mostrar categorias:");
define("_ZOOM_M_admin_meth","Mostrar método:");
define("_ZOOM_M_admin_df","Formato da data (j M, H:i):");
define("_ZOOM_M_admin_hits","Mostrar Hits:");
?>
