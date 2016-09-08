<?php

/***************************************************************************
 *                            lang_admin.php [Turkish]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_admin.php,v 1.35.2.10 2005/02/21 18:38:17 acydburn Exp $
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
// Translation by:
//
// ESQARE (taNGo) :: admin@turkiyeforum.com :: http://www.phpbbturkey.com :: http://www.turkiyeforum.com
//
// For questions and comments use: admin@turkiyeforum.com
//

$lang['General'] = 'Genel Yönetim';
$lang['Users'] = 'Kullanýcý Yönetimi';
$lang['Groups'] = 'Grup Yönetimi';
$lang['Forums'] = 'Forum Yönetimi';
$lang['Styles'] = 'Stil Yönetimi';

$lang['Configuration'] = 'Ayarlar';
$lang['Permissions'] = 'Ýzinler';
$lang['Manage'] = 'Yönetim';
$lang['Disallow'] = 'Yasaklý Ýsimler';
$lang['Prune'] = 'Eski Mesajlarý Silme';
$lang['Mass_Email'] = 'Kullanýcýlara E-Posta';
$lang['Ranks'] = 'Kullanýcý Rütbeleri';
$lang['Smilies'] = 'Ýfadeler';
$lang['Ban_Management'] = 'Yasaklama Yönetimi';
$lang['Word_Censor'] = 'Sansürlü Kelimeler';
$lang['Export'] = 'Kaydet';
$lang['Create_new'] = 'Oluþtur';
$lang['Add_new'] = 'Ekle';
$lang['Backup_DB'] = 'Veritabanýný Yedekle';
$lang['Restore_DB'] = 'Veritabanýný Yükle';


//
// Index
//
$lang['Admin'] = 'Yönetim';
$lang['Not_admin'] = 'Bu sitenin yöneticiliðini yapma yetkiniz yok';
$lang['Welcome_phpBB'] = 'phpBB\'ye hoþgeldiniz';
$lang['Admin_intro'] = 'PhpBB2\'yi forumunuz olarak seçtiðiniz için teþekkür ederiz. Bu ekran size sitenizin bilgilerinin kýsa bir özetini sunmaktadýr. Bu sayfaya soldaki <u>Yönetim - Ana Sayfa</u> linkine basarak geri dönebilirsiniz. Sitenizin ana sayfasýna dönmek için soldaki küçük logoyu kullanabilrsiniz. Soldaki diðer linkler forumunuzun her türlü ayarýný yapmanýzý saðlayacaktýr, her ekran kendinin nasýl kullanýlacaðýný anlatacaktýr.';
$lang['Main_index'] = 'Ana Sayfa';
$lang['Forum_stats'] = 'Forum Ýstatistikleri';
$lang['Admin_Index'] = 'Yönetim - Ana Sayfa';
$lang['Preview_forum'] = 'Forum Önizlemesi';

$lang['Click_return_admin_index'] = 'Yönetim ana sayfasýna dönmek için %sburaya%s týklayýn';

$lang['Statistic'] = 'Ýstatistik';
$lang['Value'] = 'Deðer';
$lang['Number_posts'] = 'Mesaj Sayýsý';
$lang['Posts_per_day'] = 'Günlük ortalama mesaj';
$lang['Number_topics'] = 'Baþlýk sayýsý';
$lang['Topics_per_day'] = 'Günlük ortalama baþlýk';
$lang['Number_users'] = 'Kullanýcý sayýsý';
$lang['Users_per_day'] = 'Günlük ortalama kullanýcý';
$lang['Board_started'] = 'Forum açýlýþ tarihi';
$lang['Avatar_dir_size'] = 'Avatar klasörü büyüklüðü';
$lang['Database_size'] = 'Veritabaný büyüklüðü';
$lang['Gzip_compression'] ='Gzip sýkýþtýrma';
$lang['Not_available'] = 'Mevcut deðil';

$lang['ON'] = 'Açýk'; // This is for GZip compression
$lang['OFF'] = 'Kapalý';


//
// DB Utils
//
$lang['Database_Utilities'] = 'Veritabaný Ýþlemleri';

$lang['Restore'] = 'Geri Yükleme';
$lang['Backup'] = 'Yedekleme';
$lang['Restore_explain'] = 'Bu iþlem bir dosyadan tüm phpBB veritabaný tablolarýný <B>geri yükleyecektir</B>. Eðer sunucunuz izin veriyorsa gzip ile sýkýþtýrýlmýþ bir metin dosyasý yükleyebilirsiniz, otomatik olarak açýlacaktýr. <b>UYARI</b> Bu iþlem bütün bulunan verileri silecek yerine yenilerini yazacaktýr. Geri yükleme uzun sürebilir, tamamlanana kadar lütfen bu sayfayý kapatmayýnýz.';
$lang['Backup_explain'] = 'Buradan tüm phpBB verilerinizi yedekleyebilirsiniz. Eðer ayný veritabanýnda saklamak istediðiniz baþka tablolarýnýz da varsa, aþaðýdaki Ek Tablolar bölümüne isimlerini virgülle ayýrarak giriniz. Eðer sunucunuz izin veriyorsa backup dosyanýzý gzip ile sýkýþtýrýp da alabilirsiniz.';

$lang['Backup_options'] = 'Yedekleme seçenekleri';
$lang['Start_backup'] = 'Yedeklemeyi baþlat';
$lang['Full_backup'] = 'Tam yedekleme';
$lang['Structure_backup'] = 'Sadece tablo yapýsý';
$lang['Data_backup'] = 'Sadece veriler';
$lang['Additional_tables'] = 'Ek tablolar';
$lang['Gzip_compress'] = 'Gzip sýkýþtýrma';
$lang['Select_file'] = 'Bir dosya seçin';
$lang['Start_Restore'] = 'Geri yüklemeyi baþlat';

$lang['Restore_success'] = 'Veritabaný baþarýyla yedeklendi.<br /><br />Siteniz yedeklemenin yapýldýðý zamanki haline dönüþtürüldü.';
$lang['Backup_download'] = 'Download kýsa bir süre içinde baþlýyacak, lütfen bekleyiniz';
$lang['Backups_not_supported'] = 'Üzgünüz, kullandýðýnz veritabaný sistemin henüz yedekleme desteklenmiyor';

$lang['Restore_Error_uploading'] = 'Yedekleme dosyasýný gönderirken hata';
$lang['Restore_Error_filename'] = 'Dosya isminde problem oluþtu, lütfen alternatif bir dosya deneyin';
$lang['Restore_Error_decompress'] = 'Gzip sýkýþtýrmasý açýlamýyor, lütfen düzyazý versiyonunu gönderin';
$lang['Restore_Error_no_file'] = 'Dosya gönderilmedi';


//
// Auth pages
//
$lang['Select_a_User'] = 'Bir kullanýcý seç';
$lang['Select_a_Group'] = 'Bir grup seç';
$lang['Select_a_Forum'] = 'Bir forum seç';
$lang['Auth_Control_User'] = 'Kullanýcý Ýzinleri Kontrolü';
$lang['Auth_Control_Group'] = 'Grup Ýzinleri Kontrolü';
$lang['Auth_Control_Forum'] = 'Forum Ýzinleri Kontrolü';
$lang['Look_up_User'] = 'Ayrýntýlar';
$lang['Look_up_Group'] = 'Ayrýntýlar';
$lang['Look_up_Forum'] = 'Ayrýntýlar';

$lang['Group_auth_explain'] = 'Burada her gruba verilmiþ olan izinleri ve moderatörlük statülerini deðiþtirebilirsiniz. Grup izinlerini deðiþtirirken kullanýcý izinlerinin gruptaki bazý kullanýcýlara hala bazý özel haklar tanýyabileceðini unutmayýn. Eðer böyle bir durum söz konusuysa uyarýlacaksýnýz.';
$lang['User_auth_explain'] = 'Burada her kullanýcýya verilmiþ olan izinleri ve moderatörlük statülerini deðiþtirebilirsiniz. Kullanýcý izinlerini deðiþtirirken grup izinlerinin bazý kullanýcýlara hala bazý özel haklar tanýyabileceðini unutmayýn. Eðer böyle bir durum söz konusuysa uyarýlacaksýnýz.';
$lang['Forum_auth_explain'] = 'Buradan her forumun izin derecesini deðiþtirebilirsiniz. Geliþmiþ ve Basit olaraka ikiye ayrýlmýþ olan izinlerde, geliþmiþ seçeneðini kullanarak daha özel izinler verebileceðinizi unutmayýnýz.';

$lang['Simple_mode'] = 'Basit Mod';
$lang['Advanced_mode'] = 'Geliþmiþ Mod';
$lang['Moderator_status'] = 'Moderatör durumu';

$lang['Allowed_Access'] = 'Eriþim izni verilmiþ';
$lang['Disallowed_Access'] = 'Eriþim izni verilmemiþ';
$lang['Is_Moderator'] = 'Moderatör';
$lang['Not_Moderator'] = 'Moderatör deðil';

$lang['Conflict_warning'] = 'Yetki Çeliþkisi Uyarýsý';
$lang['Conflict_access_userauth'] = 'Bu kullanýcýnýn üye olduðu grup aracýlýðý ile bu foruma eriþimi var. Grup izinleriyle oynayabilir ya da kullanýcýyý gruptan çýkartabilirsiniz. Bu durumu oluþturan gruplar ve forumlar aþaðýda listelenmiþtir.';
$lang['Conflict_mod_userauth'] = 'Bu kullanýcýnýn üye olduðu grup aracýlýðý ile bu foruma moderatör eriþimi var. Grup izinleriyle oynayabilir ya da kullanýcýyý gruptan çýkartabilirsiniz. Bu durumu oluþturan gruplar ve forumlar aþaðýda listelenmiþtir.';

$lang['Conflict_access_groupauth'] = 'Aþaðýdaki kullanýcýlarýn hala Kullanýcý izinleriyle bu foruma eriþimleri var. Kullanýcý izinlerini deðiþtirebilirsiniz. Özel hakký olan kullanýcýlar ve forumlar aþaðýda listelenmiþtir.';
$lang['Conflict_mod_groupauth'] = 'Aþaðýdaki kullanýcýlarýn hala Kullanýcý izinleriyle bu foruma moderatör eriþimleri var. Kullanýcý izinlerini deðiþtirebilirsiniz. Özel hakký olan kullanýcýlar ve forumlar aþaðýda listelenmiþtir.';

$lang['Public'] = 'Herkese Açýk';
$lang['Private'] = 'Özel';
$lang['Registered'] = 'Kayýtlýlara Açýk';
$lang['Administrators'] = 'Yöneticilere Açýk';
$lang['Hidden'] = 'Gizli';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'Herkes';
$lang['Forum_REG'] = 'Kayýtlý';
$lang['Forum_PRIVATE'] = 'Özel';
$lang['Forum_MOD'] = 'Mod';
$lang['Forum_ADMIN'] = 'Yönetici';

$lang['View'] = 'Görüntüleme';
$lang['Read'] = 'Okuma';
$lang['Post'] = 'Gönderme';
$lang['Reply'] = 'Cevap yazma';
$lang['Edit'] = 'Deðiþtirme';
$lang['Delete'] = 'Silme';
$lang['Sticky'] = 'Sabit';
$lang['Announce'] = 'Duyuru';
$lang['Vote'] = 'Oy kullanma';
$lang['Pollcreate'] = 'Anket yaratma';

$lang['Permissions'] = 'Ýzinler';
$lang['Simple_Permission'] = 'Basit Mod';

$lang['User_Level'] = 'Kullanýcý seviyesi';
$lang['Auth_User'] = 'Kullanýcý';
$lang['Auth_Admin'] = 'Yönetici';
$lang['Group_memberships'] = 'Grup üyelikleri';
$lang['Usergroup_members'] = 'Bu grubun üyeleri';

$lang['Forum_auth_updated'] = 'Forum izinleri güncellendi';
$lang['User_auth_updated'] = 'Kullanýcý izinleri güncellendi';
$lang['Group_auth_updated'] = 'Grup izinleri güncellendi';

$lang['Auth_updated'] = 'Ýzinler güncellendi';
$lang['Click_return_userauth'] = 'Kullanýcý izinlerine dönmek için %sburaya%s týklayýn';
$lang['Click_return_groupauth'] = 'Grup izinlerine dönmek için %sburaya%s týklayýn';
$lang['Click_return_forumauth'] = 'Forum izinlerine dönmek için %sburaya%s týklayýn';


//
// Banning
//
$lang['Ban_control'] = 'Yasaklama Kontrolü';
$lang['Ban_explain'] = 'Buradan kullanýcýlarý yasaklama ayarlarýný yapabilirsiniz. Bunu kullanýcý adýný, IP adresini ya da hostname\'ini yasaklayarak yapabilirsiniz. Bu, o kullanýcýnýn ana sayfaya bile eriþimini engelleyecektir. Bir kullanýcýnýn baþka bir kullanýcý adýyla kaydolmasýný engellemek için o e-posta adresini yasaklayabilirsiniz. Unutmayýn ki bir e-posta adresini yasaklamak o kullanýcýnýn ana sayfaya girmesini ya da mesaj gondermesini engellemez. Bunun için kullanýcý adý ya da IP-Host adresini yasaklamalýsýnýz.';
$lang['Ban_explain_warn'] = 'Bir IP dizisinin yasaklanmasý baþlangýç ve bitiþ IP\'leri arasýndaki tüm IP\'leri yasaklayacaktýr. Veritabanýnda yer kaplamamasý için uygun olduðu yerlerde joker kullanýlacaktýr. Eðer gerçekten bir IP dizisi girmek istiyorsanýz lütfen onu kýsa tutun ya da tek tek IP\'leri girin.';

$lang['Select_username'] = 'Kullanýcý adý seçin';
$lang['Select_ip'] = 'IP seçin';
$lang['Select_email'] = 'E-posta adresi seçin';

$lang['Ban_username'] = 'Kullanýcý yasaklama';
$lang['Ban_username_explain'] = 'Birden fazla kullanýcý yasaklamak istiyorsanýz tarayýcýnýza uygun klavye mouse kombinasyonunu kullanýn';

$lang['Ban_IP'] = 'IP ve Host yasaklama';
$lang['IP_hostname'] = 'IP ve Host adresleri';
$lang['Ban_IP_explain'] = 'Birden fazla IP/Host yasaklamak için araya virgül koyun. Bir IP dizisi belirtmek için baþlangýç ve bitiþ arasýna - koyun. Joker olarak * kullanýn';

$lang['Ban_email'] = 'E-posta yasaklama';
$lang['Ban_email_explain'] = 'Birden fazla e-posta yasaklamak için virgül kullanýn. Joker olarak * kullanýn, mesela *@hotmail.com';

$lang['Unban_username'] = 'Kullanýcý yasaðý kaldýrma';
$lang['Unban_username_explain'] = 'Birden fazla kullanýcýnýn yasaðýný kaldýrmak istiyorsanýz tarayýcýnýza uygun klavye mouse kombinasyonunu kullanýn';

$lang['Unban_IP'] = 'IP/Host yasaðý kaldýrma';
$lang['Unban_IP_explain'] = 'Birden fazla IP/Host yasaðý kaldýrmak istiyorsanýz tarayýcýnýza uygun klavye mouse kombinasyonunu kullanýn';

$lang['Unban_email'] = 'E-posta yasaðý kaldýrma';
$lang['Unban_email_explain'] = 'Birden fazla e-posta yasaðý kaldýrmak istiyorsanýz tarayýcýnýza uygun klavye mouse kombinasyonunu kullanýn';

$lang['No_banned_users'] = 'Yasaklý kullanýcý yok';
$lang['No_banned_ip'] = 'Yasaklý IP yok';
$lang['No_banned_email'] = 'Yasaklý e-posta yok';

$lang['Ban_update_sucessful'] = 'Yasaklama listesi baþarýyla güncellendi';
$lang['Click_return_banadmin'] = 'Yasaklama kontrolüne dönmek için %sburaya%s týklayýn';


//
// Configuration
//
$lang['General_Config'] = 'Genel Ayarlar';
$lang['Config_explain'] = 'Aþaðýdaki form sitenizdeki genel ayarlarý yapmak için kullanýlacaktýr. Kullanýcý ve forum bazlý ayarlar için sol taraftaki ilgili linklere týklayýnýz.';

$lang['Click_return_config'] = 'Genel ayarlara dönmek için %sburaya%s týklayýn';

$lang['General_settings'] = 'Genel Site Ayarlarý';
$lang['Server_name'] = 'Alan Adý';
$lang['Server_name_explain'] = 'Bu forumun olduðu sitenin alan adý adresi';
$lang['Script_path'] = 'Script yolu';
$lang['Script_path_explain'] = 'Alan adý adresine göre PhpBB2 scriptlerinin bulundugu yol';
$lang['Server_port'] = 'Sunucu Portu';
$lang['Server_port_explain'] = 'Sunucunuzun çalýþtýðý port, genelde 80\'dir, sadece farklýysa deðiþtirin';
$lang['Site_name'] = 'Site ismi';
$lang['Site_desc'] = 'Site açýklamasý';
$lang['Board_disable'] = 'Siteyi kapat';
$lang['Board_disable_explain'] = 'Bu, siteyi kullanýcýlara kapatacaktýr. Siteyi kapattýktan sonra kullanýcý adý ve þifrenizle yönetim paneline giriþ yaparak siteyi tekrar açabilirsiniz.';
$lang['Acct_activation'] = 'Hesap aktivasyonu';
$lang['Acc_None'] = 'Kapalý'; // These three entries are the type of activation
$lang['Acc_User'] = 'Kullanýcý';
$lang['Acc_Admin'] = 'Yönetici';

$lang['Abilities_settings'] = 'Kullanýcý ve Forum Temel Ayarlarý';
$lang['Max_poll_options'] = 'Max. anket seçeneði sayýsý';
$lang['Flood_Interval'] = 'Flood Aralýðý';
$lang['Flood_Interval_explain'] = 'Kullanýcýnýn iki mesajý arasýnda beklemesi gereken süre';
$lang['Board_email_form'] = 'Kullanýcýlar arasý e-posta';
$lang['Board_email_form_explain'] = 'Bu, site aracýlýðý ile kullanýcýlarýn birbirlerine e-posta göndermesini saðlar';
$lang['Topics_per_page'] = 'Her sayfadaki baþlýk sayýsý';
$lang['Posts_per_page'] = 'Her sayfadaki mesaj sayýsý';
$lang['Hot_threshold'] = 'Popülerlik sýnýrý';
$lang['Default_style'] = 'Varsayýlan stil';
$lang['Override_style'] = 'Kullanýcý stilini gözardý et';
$lang['Override_style_explain'] = 'Kullanýcýlarýn seçtiði stili varsayýlan ile deðiþtirir';
$lang['Default_language'] = 'Varsayýlan dil';
$lang['Date_format'] = 'Zaman formatý';
$lang['System_timezone'] = 'Sistem Zaman Dilimi';
$lang['Enable_gzip'] = 'GZip sýkýþtýrma';
$lang['Enable_prune'] = 'Mesaj temizliði';
$lang['Allow_HTML'] = 'HTML\'e izin ver';
$lang['Allow_BBCode'] = 'BBCode\'a izin ver';
$lang['Allowed_tags'] = 'Ýzin verilen HTML tagleri';
$lang['Allowed_tags_explain'] = 'Tagleri virgüllerle ayýrýn';
$lang['Allow_smilies'] = 'Ýfadelere izin ver';
$lang['Smilies_path'] = 'Ýfade klasörü';
$lang['Smilies_path_explain'] = 'phpBB ana klasörüne göre ifade klasörü, örn: images/smilies';
$lang['Allow_sig'] = 'Ýmzaya izin ver';
$lang['Max_sig_length'] = 'Max. imza uzunluðu';
$lang['Max_sig_length_explain'] = 'Kullanýcý imzalarýndaki maksimum karakter sayýsý';
$lang['Allow_name_change'] = 'Kullanýcý isim deðiþikliðine izin ver';

$lang['Avatar_settings'] = 'Avatar Ayarlarý';
$lang['Allow_local'] = 'Galeri avatarlarýný aç';
$lang['Allow_remote'] = 'Uzak avatarlarý aç';
$lang['Allow_remote_explain'] = 'Baþka bir siteden link verilen avatarlar';
$lang['Allow_upload'] = 'Avatar göndermeyi aç';
$lang['Max_filesize'] = 'Max. Avatar dosya büyüklüðü';
$lang['Max_filesize_explain'] = 'Gönderilen avatarlar için';
$lang['Max_avatar_size'] = 'Max. avatar boyutlarý';
$lang['Max_avatar_size_explain'] = '(Piksel olarak Yükseklik x Geniþlik)';
$lang['Avatar_storage_path'] = 'Avatar Klasörü';
$lang['Avatar_storage_path_explain'] = 'phpBB ana klasörüne göre, örn: images/avatars';
$lang['Avatar_gallery_path'] = 'Avatar Galeri Klasörü';
$lang['Avatar_gallery_path_explain'] = 'phpBB ana klasörüne göre önceden yüklenmiþ avatarlarýn yeri, örn: images/avatars/gallery';

$lang['COPPA_settings'] = 'COPPA ayarlarý';
$lang['COPPA_fax'] = 'COPPA Fax Numarasý';
$lang['COPPA_mail'] = 'COPPA E-posta Adresi';
$lang['COPPA_mail_explain'] = 'Ebeveynlerin COPPA anlaþmasýný gönderecekleri yer';

$lang['Email_settings'] = 'E-posta Ayarlarý';
$lang['Admin_email'] = 'Yönetici E-posta Adresi';
$lang['Email_sig'] = 'E-posta Ýmzasý';
$lang['Email_sig_explain'] = 'Sitenin göndereceði tüm e-postalara bu yazý eklenir';
$lang['Use_SMTP'] = 'E-posta için SMTP sunucusu kullan';
$lang['Use_SMTP_explain'] = 'Lokal sendmail fonksiyonu yerine SMTP sunucusu kullanmak için Evet\'i seçin';
$lang['SMTP_server'] = 'SMTP Sunucu Adresi';
$lang['SMTP_username'] = 'SMTP Kullanýcý Adý';
$lang['SMTP_username_explain'] = 'Sadece smtp sunucunuz kullanýcý adý istiyorsa girin';
$lang['SMTP_password'] = 'SMTP Þifresi';
$lang['SMTP_password_explain'] = 'Sadece smtp sunucunuz þifre istiyorsa giriniz';

$lang['Disable_privmsg'] = 'Özel Mesajlaþma';
$lang['Inbox_limits'] = 'Gelenler\'deki max. msj sayýsý ';
$lang['Sentbox_limits'] = 'Ulaþanlar\'daki max. msj sayýsý';
$lang['Savebox_limits'] = 'Saklananlar\'daki max. msj sayýsý';

$lang['Cookie_settings'] = 'Cookie Ayarlarý';
$lang['Cookie_settings_explain'] = 'Bu cookie\'lerin browerserlara nasýl gönderildiðini ayarlamak içindir. Bir çok durumda bu ilk halinde býrakýlmalýdýr. Bunlarý deðiþtirmeniz gerekiyorsa dikkatli olun, yanlýþ ayarlar kullanýcýlarýn giriþ yapmasýný engeller.';
$lang['Cookie_domain'] = 'Cookie domain\'i';
$lang['Cookie_name'] = 'Cookie adý';
$lang['Cookie_path'] = 'Cookie path\'i';
$lang['Cookie_secure'] = 'Cookie güvenliði [ https ]';
$lang['Cookie_secure_explain'] = 'Sunucunuz SSL modunda çalýþýyorsa açýn, aksi halde açmayýn';
$lang['Session_length'] = 'Oturum uzunluðu [ saniye ]';

// Visual Confirmation 
$lang['Visual_confirm'] = 'Onay Kodu Doðrulamayý Aç'; 
$lang['Visual_confirm_explain'] = 'Bu özellik kullanýcý kayýt olurken resimli onay kodu istenmesini saðlar.';

// Autologin Keys - added 2.0.18
$lang['Allow_autologin'] = 'Otomatik giriþ izinleri';
$lang['Allow_autologin_explain'] = 'Kullanýcýlar giriþ yapacaklarý zaman beni hatýrla seçeneðini seçmelerine izin verir';
$lang['Autologin_time'] = 'Otomatik giriþ geçerlilik süresi';
$lang['Autologin_time_explain'] = 'Kullanýcýlarýn beni hatýrla seçeneklerini seçerek otomatik giriþlerinin geçerliliði için gün süresi.Özelliði iptal etmek için 0 (sýfýr) yazýn.';

//
// Forum Management
//
$lang['Forum_admin'] = 'Forum Yönetimi';
$lang['Forum_admin_explain'] = 'Buradan forum ve kategorileri ekleyebilir, silebilir, deðiþtirebilir ve eþleþtirme yapabilirsiniz';
$lang['Edit_forum'] = 'Forumu deðiþtir';
$lang['Create_forum'] = 'Yeni forum yarat';
$lang['Create_category'] = 'Yeni kategori yarat';
$lang['Remove'] = 'Çýkar';
$lang['Action'] = 'Eylem';
$lang['Update_order'] = 'Sýralamayý güncelle';
$lang['Config_updated'] = 'Forum Ayarlarý Baþarýyla Güncellendi';
$lang['Edit'] = 'Deðiþtir';
$lang['Delete'] = 'Sil';
$lang['Move_up'] = 'Yukarý taþý';
$lang['Move_down'] = 'Aþaðý taþý';
$lang['Resync'] = 'Eþleþtir';
$lang['No_mode'] = 'Hiç bir mod seçilmedi';
$lang['Forum_edit_delete_explain'] = 'Aþaðýdaki form sitenizdeki genel ayarlarý yapmak için kullanýlacaktýr. Kullanýcý ve forum bazlý ayarlar için sol taraftaki ilgili linklere týklayýnýz.';

$lang['Move_contents'] = 'Tüm içeriði taþý';
$lang['Forum_delete'] = 'Forumu sil';
$lang['Forum_delete_explain'] = 'Aþaðýdaki form ile forum ya da kategori silebilir, içeriklerini istediðiniz yere taþýyabilirsiniz';

$lang['Status_locked'] = 'Kilitli';
$lang['Status_unlocked'] = 'Kilitli deðil';
$lang['Forum_settings'] = 'Genel Forum Ayarlarý';
$lang['Forum_name'] = 'Forum adý';
$lang['Forum_desc'] = 'Açýklama';
$lang['Forum_status'] = 'Forum statüsü';
$lang['Forum_pruning'] = 'Otomatik Mesaj Temizleme';

$lang['prune_freq'] = 'Her X günde bir forumu kontrol et';
$lang['prune_days'] = 'X gün içinde cevap gelmeyen baþlýklarý sil';
$lang['Set_prune_data'] = 'Mesaj temizliðini açtýðýnýz halde kaç günde bir mesaj temizliði yapýlacagýný seçmediniz';

$lang['Move_and_Delete'] = 'Taþý ve Sil';

$lang['Delete_all_posts'] = 'Tüm mesajlarý sil';
$lang['Nowhere_to_move'] = 'Taþýnacak yer yok';

$lang['Edit_Category'] = 'Kategoriyi deðiþtir';
$lang['Edit_Category_explain'] = 'Bir kategorinin ismini deðiþtirmek için bu formu kullanýn.';

$lang['Forums_updated'] = 'Forum ve Kategori bilgisi baþarýyla güncellendi';

$lang['Must_delete_forums'] = 'Bu kategoriyi silmeden önce içindeki tüm forumlarý silmelisiniz';

$lang['Click_return_forumadmin'] = 'Forum yönetim paneline dönmek için %sburaya%s týklayýn';


//
// Smiley Management
//
$lang['smiley_title'] = 'Ýfade Kontrol Paneli';
$lang['smile_desc'] = 'Buradan kullanýcýlara sunulan ifadeleri ekleyebilir kaldýrabilir ya da deðiþtirebilirsiniz.';

$lang['smiley_config'] = 'Ýfade Ayarlarý';
$lang['smiley_code'] = 'Ýfade Kodu';
$lang['smiley_url'] = 'Ýfade Resim Dosyasý';
$lang['smiley_emot'] = 'Ýfade Açýklamasý';
$lang['smile_add'] = 'Yeni ifade ekle';
$lang['Smile'] = 'Ýfade';
$lang['Emotion'] = 'Açýklama';

$lang['Select_pak'] = 'Paket (.pak) dosyasý seç';
$lang['replace_existing'] = 'Varolan ifadeyi bununla deðiþtir';
$lang['keep_existing'] = 'Varolan ifadeyi koru';
$lang['smiley_import_inst'] = 'Ýfade dosyasýný zip ile açmalý ve uygun ifade klasörüne göndermelisiniz. Sonra buradan doðru secenekleri bularak yükleme iþlemini gerçekleþtirebilirsiniz.';
$lang['smiley_import'] = 'Ýfade Paketi Kurma';
$lang['choose_smile_pak'] = 'Ýfade Paket Dosyasý (.pak) Seçin';
$lang['import'] = 'Ýfade Paketi Kur';
$lang['smile_conflicts'] = 'Ýkilemlerde ne yapýlmalý?';
$lang['del_existing_smileys'] = 'Kurmadan önce varolan ifadeleri sil';
$lang['import_smile_pack'] = 'Ýfade Paketi Kur';
$lang['export_smile_pack'] = 'Ýfade Paketi Yarat';
$lang['export_smiles'] = 'Varolan ifadelerinizden bir paket yaratmak için, smilies.pak soyasýný indirmek için %sburaya%s týklayýn. .pak uzantýsýný korumak suretiyle bu dosyanýn ismini deðiþtirin. Sonra bu .pak dosyasýný ve ilgili ifade resimlerini tek bir zip dosyasý içinde sýkýþtýrýn.';

$lang['smiley_add_success'] = 'Ýfade baþarýyla eklendi';
$lang['smiley_edit_success'] = 'Ýfade baþarýyla güncellendi';
$lang['smiley_import_success'] = 'Ýfade Paketi kurulumu baþarýldý!';
$lang['smiley_del_success'] = 'Ýfade baþarýyla silindi';
$lang['Click_return_smileadmin'] = 'Ýfade kontrol paneline dönmek için %sburaya%s týklayýn';


//
// User Management
//
$lang['User_admin'] = 'Kullanýcý Yönetimi';
$lang['User_admin_explain'] = 'Buradan kullanýcýlarýnýzýn ayarlarýný deðiþtirebilirsiniz. Ýzinleri deðiþtirmek için soldan Ýzinler linkini kullanýn.';

$lang['Look_up_user'] = 'Kullanýcýyý incele';

$lang['Admin_user_fail'] = 'Kullanýcýnýn profili güncellenemedi.';
$lang['Admin_user_updated'] = 'Kullanýcý profili baþarýyla güncellendi.';
$lang['Click_return_useradmin'] = 'Kullanýcý Yönetim Paneline dönmek için %sburaya%s týklayýn';

$lang['User_delete'] = 'Bu kullanýcýyý sil';
$lang['User_delete_explain'] = 'Kullanýcýyý silmek için buraya týklayýn. Bu dönüþü olmayan bir iþlemdir.';
$lang['User_deleted'] = 'Kullanýcý baþarýyla silindi.';

$lang['User_status'] = 'Bu kullanýcý þu anda aktif';
$lang['User_allowpm'] = 'Özel mesaj atabilir';
$lang['User_allowavatar'] = 'Avatar kullanabilir';

$lang['Admin_avatar_explain'] = 'Burdan kullanýcýnýn þu andaki avatarýný silebilir ya da deðiþtirebilirsiniz.';

$lang['User_special'] = 'Özel yönetici alanlarý';
$lang['User_special_explain'] = 'Bu alanlar kullanýcýlar tarafýndan deðiþtirilemez.  Buradan bütün kullanýcýlara verilmeyen ayarlarý yapabilirsiniz.';


//
// Group Management
//
$lang['Group_administration'] = 'Grup Yönetimi';
$lang['Group_admin_explain'] = 'Burdan gruplarýnýzý yaratabilir, silebilir ya da deðiþtirebilirsiniz. Grup moderatörlerini, grup statülerini, grup isimlerini deðiþtirebilirsiniz';
$lang['Error_updating_groups'] = 'Gruplar güncellenirken bir hata oluþtu';
$lang['Updated_group'] = 'Grup baþarýyla güncellendi';
$lang['Added_new_group'] = 'Yeni grup baþarýyla yaratýldý';
$lang['Deleted_group'] = 'Grup baþarýyla silindi';
$lang['New_group'] = 'Yeni grup yarat';
$lang['Edit_group'] = 'Grubu deðiþtir';
$lang['group_name'] = 'Grup adý';
$lang['group_description'] = 'Grup açýklamasý';
$lang['group_moderator'] = 'Grup moderatörü';
$lang['group_status'] = 'Grup statusü';
$lang['group_open'] = 'Açýk grup';
$lang['group_closed'] = 'Kapalý group';
$lang['group_hidden'] = 'Gizli group';
$lang['group_delete'] = 'Grubu sil';
$lang['group_delete_check'] = 'Bu grubu sil';
$lang['submit_group_changes'] = 'Deðiþiklikleri gönder';
$lang['reset_group_changes'] = 'Deðiþiklikleri sil';
$lang['No_group_name'] = 'Bu grup için bir isim belirtmelisiniz';
$lang['No_group_moderator'] = 'Bu grup için bir moderatör belirtmelisiniz';
$lang['No_group_mode'] = 'Bu grup için bir mod belirmelisiniz, açýk ya da kapalý';
$lang['No_group_action'] = 'Bir görev seçilmemiþ';
$lang['delete_group_moderator'] = 'Eski grup moderatörünü sil';
$lang['delete_moderator_explain'] = 'Grup moderatörünü deðiþtirirken, eski moderatörü gruptan atmak için burayý iþaretleyin. Aksi takdirde kullanýcý grubun normal bir üyesi olacaktýr.';
$lang['Click_return_groupsadmin'] = 'Grup yönetimine dönmek için %sburaya%s týklayýn.';
$lang['Select_group'] = 'Grup seç';
$lang['Look_up_group'] = 'Grubu incele';


//
// Prune Administration
//
$lang['Forum_Prune'] = 'Mesaj Temizliði';
$lang['Forum_Prune_explain'] = 'Bu form ile seçtiðiniz gün sayýsý içinde cevap gelmeyen baþlýklarý silebilirsiniz. Eðer bir sayý girmezseniz tüm mesajlar silinir. Ýçinde anket olan mesajlarý ya da duyurularý silmeyecektir. Onlarý tek tek elle silmek zorundasýnýz.';
$lang['Do_Prune'] = 'Temizlik Yap';
$lang['All_Forums'] = 'Tüm forumlar';
$lang['Prune_topics_not_posted'] = 'Bu kadar gün içinde cevap gelmemiþ mesajlarý sil';
$lang['Topics_pruned'] = 'Silinen baþlýklar';
$lang['Posts_pruned'] = 'Silinen mesajlar';
$lang['Prune_success'] = 'Mesaj temizliði baþarýlý!';


//
// Word censor
//
$lang['Words_title'] = 'Kelime Sansürleme';
$lang['Words_explain'] = 'Buradan otomatik olaran sansürlenecek kelimeleri ekleyebilir, silebilir, deðiþtirebilirsiniz. Ayrýca insanlar bu kelimeleri kullanýcý isimlerinde de kullanamazlar. Joker olarak * kullanabilirsiniz, Örn: *siklo* ansiklopedi\'yi, siklo* siklon\'u, *siklo dersiklo\'yu sansürleyecektir.';
$lang['Word'] = 'Kelime';
$lang['Edit_word_censor'] = 'Sansürlü kelimeyi deðiþtir';
$lang['Replacement'] = 'Yerine konacak';
$lang['Add_new_word'] = 'Yeni kelime ekle';
$lang['Update_word'] = 'Sansürü güncelle';

$lang['Must_enter_word'] = 'Bir kelime ve onun yerine girilecek kelimeyi girmelisiniz';
$lang['No_word_selected'] = 'Deðiþtirmek için bir kelime seçmediniz';

$lang['Word_updated'] = 'Seçilen sansürlü kelime baþarýyla güncellendi';
$lang['Word_added'] = 'Sansürlü kelime baþarýyla eklendi';
$lang['Word_removed'] = 'Seçilen sansürlü kelime baþarýyla silindi';

$lang['Click_return_wordadmin'] = 'Kelime sansürü yönetim paneline dönmek için %sburaya%s týklayýn';


//
// Mass Email
//
$lang['Mass_email_explain'] = 'Buradan tüm kullanýcýlarýnýza ya da bir gruba dahil tüm kullanýcýlara e-posta gönderebilirsiniz. Bu yönetici e-postasýna atýlan mesajýn gizli karbon kopyalarýnýn kullanýcýlara gönderilmesi yoluyla yapýlacak. Eðer geniþ bir gruba gönderiyorsanýz lütfen stop butonuna basmayýn ve sayfanýn yüklenmesini sabýrlý bir þekilde bekleyin. Büyük bir toptan e-posta gönderiminin yavaþ olmasý doðaldýr, Script görevini tamamladýðýnda size haber verilecektir';
$lang['Compose'] = 'Oluþtur';

$lang['Recipients'] = 'Alýcýlar';
$lang['All_users'] = 'Tüm Kullanýcýlar';

$lang['Email_successfull'] = 'Mesajýnýz Gönderilmiþtir';
$lang['Click_return_massemail'] = 'Toplu e-posta formuna dönmek için %sburaya%s týklayýn';


//
// Ranks admin
//
$lang['Ranks_title'] = 'Rütbe Yönetimi';
$lang['Ranks_explain'] = 'Buradan kullanýcýlarýnýza verilecek rütbeler yaratabilir, silebilir ve deðiþtirebilirsiniz. Hatta kullanýcý yönetiminden kullanýclara verilebilecek özel rütbeler de yaratabilirsiniz.';

$lang['Add_new_rank'] = 'Yeni rütbe ekle';

$lang['Rank_title'] = 'Rütbe adý';
$lang['Rank_special'] = 'Özel rütbe olarak ata';
$lang['Rank_minimum'] = 'Minimum Mesaj Sayýsý';
$lang['Rank_maximum'] = 'Maximum Mesaj Sayýsý';
$lang['Rank_image'] = 'Rütbe resmi (phpBB2 ana klasörüne göre)';
$lang['Rank_image_explain'] = 'Rütbe için ufak bir resim kullanýn';

$lang['Must_select_rank'] = 'Bir rütbe seçmelisiniz';
$lang['No_assigned_rank'] = 'Hiç özel rütbe atanmamýþ';

$lang['Rank_updated'] = 'Rütbe baþarýyla güncellendi';
$lang['Rank_added'] = 'Rütbe baþarýyla eklendi';
$lang['Rank_removed'] = 'Rütbe baþarýyla silindi';
$lang['No_update_ranks'] = 'Bu rütba baþarýyla silindi, ancak bu rütbeye sahip olan kullanýcýlarýn ayarlarý deðiþmedi.  Bu kullanýcýlarýn hesaplarýný kendiniz güncellemelisiniz';

$lang['Click_return_rankadmin'] = 'Rütbe yönetimine dönmek için %sburaya%s týklayýn';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Yasaklý Kullanýcý Ýsmi Kontrolü';
$lang['Disallow_explain'] = 'Burada kullanýlmamasý gereken kullanýcý isimlerini ayarlayabilirsiniz. Joker olarak * kullanabilirsiniz. Kaydolmuþ bir kullanýcý adaýný yasaklayamazsýnýz, bunu yapmak için ilk önce o kullanýcýyý silmelisiniz';

$lang['Delete_disallow'] = 'Sil';
$lang['Delete_disallow_title'] = 'Yasaklý bir kullanýcý ismini kaldýr';
$lang['Delete_disallow_explain'] = 'Buradan yasaklý bir kullanýcý ismini seçip göndere basarak yasaðý kaldýrabilirsiniz';

$lang['Add_disallow'] = 'Ekle';
$lang['Add_disallow_title'] = 'Yasaklý bir kullanýcý ismi ekle';
$lang['Add_disallow_explain'] = 'Joker olarak * kullanabilirsiniz';

$lang['No_disallowed'] = 'Yasaklý kullanýcý adý yok';

$lang['Disallowed_deleted'] = 'Yasaklý kullanýcý adý baþarýyla kaldýrýldý';
$lang['Disallow_successful'] = 'Yasaklý kullanýcý adý baþarýyla eklendi';
$lang['Disallowed_already'] = 'Girdiðiniz isim yasaklanamadý. ya listede var, ya sansür listesinde var ya da böyle bir kullanýcý mevcut';

$lang['Click_return_disallowadmin'] = 'Yasaklý kullanýcý adý kontrol paneline dönmek için %sburaya%s týklayýn';


//
// Styles Admin
//
$lang['Styles_admin'] = 'Stil Yönetimi';
$lang['Styles_explain'] = 'Buradan kullanýcýlarýnýza sunduðunuz tema ve stillerinizi yönetebilirsiniz';
$lang['Styles_addnew_explain'] = 'Burada tüm temalarýnýz listelenmiþtir. Bunlar henüz veritabanýna kaydedilmemiþtir. Kaydetmek için birini seçin ve Yükle tuþuna basýn';

$lang['Select_template'] = 'Bir tema seçin';

$lang['Style'] = 'Stil';
$lang['Template'] = 'Tema';
$lang['Install'] = 'Yükle';
$lang['Download'] = 'Ýndir';

$lang['Edit_theme'] = 'Tema\'yý deðiþtir';
$lang['Edit_theme_explain'] = 'Aþaðýdaki form ile seçtiðiniz tema\'yý deðiþtirebilirsiniz';

$lang['Create_theme'] = 'Tema yarat';
$lang['Create_theme_explain'] = 'Aþaðýdaki form ile seçilen tema için yeni bir stil yaratýn. Renkleri girerken # iþaretini kullanmayýn. Örn: CCCCCC doðru, #CCCCCC yanlýþ';

$lang['Export_themes'] = 'Tema\'yý kaydet';
$lang['Export_explain'] = 'Bu panel ile seçtiðiniz tema için bir stil dosyasý yaratýp kaydedebileceksiniz. Aþaðýdan temayý seçin ve script onun için gerekli stil dosyasýný yaratýp o klasöre kaydetmeyi deneyecektir. Eðer kaydedemezse size indirme opsiyonunu sunacaktýr. Scriptin dosyayý kaydedebilmesi için o klasöre yazma izninin verilmiþ olmasý gerekir. Ayrýntýlý bilgi için PhpBB2 kullanma kýlavuzuna bakýn.';

$lang['Theme_installed'] = 'Seçilen tema baþarýyla yüklendi';
$lang['Style_removed'] = 'Seçilen tema veritabanýndan baþarýyla silindi. Bu temayý sisteminizden tamamýyla silmek için dosyalarýný da silmelisiniz.';
$lang['Theme_info_saved'] = 'Seçilen tema için stil bilgisi kaydedildi.';
$lang['Theme_updated'] = 'Seçilen tema güncellendi. Þimdi yeni tema ayarlarýný kaydetmelisiniz';
$lang['Theme_created'] = 'Tema yaratýldý. Þimdi bu tema\'yý sonradan kullanmak ya da taþýmak için kaydetmelisiniz';

$lang['Confirm_delete_style'] = 'Bu stili silmek istediðinizden emin misiniz?';

$lang['Download_theme_cfg'] = 'Tema bilgi dosyasý yazýlamadý. Dosyayý indirmek için aþaðýdaki butona týklayýnýz. Sonra onu ilgili tema dosyalarýnýn bulunduðu klasöre göndermelisiniz. Sonra isterseniz dosyalarý daðýtým ya da baþka bir amaçla paketleyebilirsiniz';
$lang['No_themes'] = 'Seçilen temanýn atanmýþ hiç stili yok. Sol taraftaki Stil Yönetimi\'nden Yarat\'a týklayýnýz';
$lang['No_template_dir'] = 'Tema klasörü açýlamadý. Web sunucusu tarafýndan okunamýyor olabilir ya da böyle bir klasör yok';
$lang['Cannot_remove_style'] = 'Bu stil þu anda varsayýlan stil olduðu için silinemez. Varsayýlan stili deðiþtirip tekrar deneyin.';
$lang['Style_exists'] = 'Seçilen stil adý kullanýmda, lütfen baþka bir isim seçiniz.';

$lang['Click_return_styleadmin'] = 'Stil yönetimine dönmek için %sburaya%s týklayýn';

$lang['Theme_settings'] = 'Tema Ayarlarý';
$lang['Theme_element'] = 'Tema Elemanlarý';
$lang['Simple_name'] = 'Ýsmi';
$lang['Value'] = 'Deðer';
$lang['Save_Settings'] = 'Ayarlarý Kaydet';

$lang['Stylesheet'] = 'CSS Stylesheet';
$lang['Stylesheet_explain'] = 'Bu tema için kullanýlacak olan CSS stylesheet dosya adý.';
$lang['Background_image'] = 'Arkaplan Resmi';
$lang['Background_color'] = 'Arkaplan Rengi';
$lang['Theme_name'] = 'Tema Adý';
$lang['Link_color'] = 'Link Rengi';
$lang['Text_color'] = 'Yazý Rengi';
$lang['VLink_color'] = 'Ziyaret Edilmiþ Link Rengi';
$lang['ALink_color'] = 'Aktif Link Rengi';
$lang['HLink_color'] = 'Üstüne Gelinen Link Rengi';
$lang['Tr_color1'] = 'Tablo Satýr Rengi 1';
$lang['Tr_color2'] = 'Tablo Satýr Rengi 2';
$lang['Tr_color3'] = 'Tablo Satýr Rengi 3';
$lang['Tr_class1'] = 'Tablo Satýr Sýnýfý 1';
$lang['Tr_class2'] = 'Tablo Satýr Sýnýfý 2';
$lang['Tr_class3'] = 'Tablo Satýr Sýnýfý 3';
$lang['Th_color1'] = 'Tablo Baþlýk Rengi 1';
$lang['Th_color2'] = 'Tablo Baþlýk Rengi 2';
$lang['Th_color3'] = 'Tablo Baþlýk Rengi 3';
$lang['Th_class1'] = 'Tablo Baþlýk Sýnýfý 1';
$lang['Th_class2'] = 'Tablo Baþlýk Sýnýfý 2';
$lang['Th_class3'] = 'Tablo Baþlýk Sýnýfý 3';
$lang['Td_color1'] = 'Tablo Hücre Rengi 1';
$lang['Td_color2'] = 'Tablo Hücre Rengi 2';
$lang['Td_color3'] = 'Tablo Hücre Rengi 3';
$lang['Td_class1'] = 'Tablo Hücre Sýnýfý 1';
$lang['Td_class2'] = 'Tablo Hücre Sýnýfý 2';
$lang['Td_class3'] = 'Tablo Hücre Sýnýfý 3';
$lang['fontface1'] = 'Font Tipi 1';
$lang['fontface2'] = 'Font Tipi 2';
$lang['fontface3'] = 'Font Tipi 3';
$lang['fontsize1'] = 'Font Büyüklüðü 1';
$lang['fontsize2'] = 'Font Büyüklüðü 2';
$lang['fontsize3'] = 'Font Büyüklüðü 3';
$lang['fontcolor1'] = 'Font Rengi 1';
$lang['fontcolor2'] = 'Font Rengi 2';
$lang['fontcolor3'] = 'Font Rengi 3';
$lang['span_class1'] = 'Span Sýnýfý 1';
$lang['span_class2'] = 'Span Sýnýfý 2';
$lang['span_class3'] = 'Span Sýnýfý 3';
$lang['img_poll_size'] = 'Anket resmi büyüklüðü [px]';
$lang['img_pm_size'] = 'Özel mesajlar statü resmi büyüklüðü [px]';


//
// Install Process
//
$lang['Welcome_install'] = 'PhpBB2 Yüklemesine Hoþgeldiniz';
$lang['Initial_config'] = 'Temel Ayarlar';
$lang['DB_config'] = 'Veritabaný Ayarlarý';
$lang['Admin_config'] = 'Yönetici Ayarlarý';
$lang['continue_upgrade'] = 'Config dosyasýný bilgisayarýnza indirdikten sonra \'Upgrade\'e Devam\' düðmesine basarak güncelleme iþlemine devam edebilirsiniz.';
$lang['upgrade_submit'] = 'Güncellemeye Devam';

$lang['Installer_Error'] = 'Yükleme sýrasýnda bir problem oluþtu';
$lang['Previous_Install'] = 'Önceden yüklenmiþ bir PhpBB2 bulundu';
$lang['Install_db_error'] = 'Veritabanýný güncellerken bir hata oluþtu';

$lang['Re_install'] = 'Önceden yüklediðiniz PhpBB2 halen aktif. <br /><br />Eðer PhpBB2\'yi yeniden yüklemek istiyorsanýz aþaðýdaki evet düðmesine basýn. Bunu yaparken bunun þu andaki tüm verileri sileceðini, yedek yapýlmayacaðýný unutmayýn! Yönetici kullanýcý adý ve þifreniz yeniden yaratýlacaktýr; baþka hiçbir ayarýnýz korunmayacaktýr. <br /><br />Evet\'e basmadan önce iyi düþünün!';

$lang['Inst_Step_0'] = 'PhpBB2\'yi seçtiðiniz için teþekkür ederiz. Yükleme iþlemini bitirmek için lütfen aþaðýdaki boþluklarý doldurunuz. Yükleme iþlemini yapacaðýnýz veritabanýnýn yüklemeden önce yaratýlmýþ olmasý gerektiðini unutmayýnýz. ODBC kullanan bir veritabanýna yükleme yapacaksanýz, (Örn: MS Access) devam etmeden önce bir DSN yaratmalýsýnýz.';

$lang['Start_Install'] = 'Yüklemeye baþla';
$lang['Finish_Install'] = 'Yüklemeyi bitir';

$lang['Default_lang'] = 'Sitenin varsayýlan dili';
$lang['DB_Host'] = 'Veritabaný sunucu adresi';
$lang['DB_Name'] = 'Veritabaný adý';
$lang['DB_Username'] = 'Veritabaný kullanýcý adý';
$lang['DB_Password'] = 'Veritabaný þifresi';
$lang['Database'] = 'Veritabanýnýz';
$lang['Install_lang'] = 'Yükleme dilini seçin';
$lang['dbms'] = 'Veritabaný Türü';
$lang['Table_Prefix'] = 'Veritabanýndaki tablolarýn önadlarý';
$lang['Admin_Username'] = 'Yönetici kullanýcý adý';
$lang['Admin_Password'] = 'Yönetici þifresi';
$lang['Admin_Password_confirm'] = 'Yönetici þifresi [ Onayla ]';

$lang['Inst_Step_2'] = 'Yönetici hesabý yaratýldý. Bu noktada temel yükleme tamamlandý. Þimdi yeni yüklediðiniz forumu yönetebileceðiniz bir sayfaya yönlendirileceksiniz. Genel ayarlarý kontrol edin ve kendi ihtiyaçlarýnýz doðrultusunda ayarlarý yaptýðýnýza emin olun. PhpBB2\'yi seçtiðiniz için teþekkür ederiz.';

$lang['Unwriteable_config'] = 'Þu anda config dosyasýna yazýlamýyor. Aþaðýdaki düðmeye nasýnca bu config dosyasýnýn bir kopyasý bilgisayarýnýza indirilecektir. Bu dosyayý phpBB2 ile ayný klasör içine göndermelisiniz. Bunu yaptýktan sonra bir önceki form\'la yaratýlan yönetici adý ve þifresini kullanarak yönetim paneline girmeli ve ayarlarý yapmalýsýnýz. (Siteye giriþ yaptýktan sonra ekranýn altýnda bir link gözükecektir). PhpBB2\'yi seçtiðiniz için teþekkür ederiz.';
$lang['Download_config'] = 'Config dosyasýný Ýndir';

$lang['ftp_choose'] = 'Download Metodunu Seçin';
$lang['ftp_option'] = '<br />PHP\'nin bu versiyonunda ftp komutlarýna izin verildiði için direk config dosyasýný yerine ftp ile gönderebilirsiniz.';
$lang['ftp_instructs'] = 'Config dosyasýný phpBB2\'nin bulunduðu yere otomatik olarak ftp ile göndermeyi seçtiniz.  Lütfen aþaðýdaki bilgileri doldurunuz';
$lang['ftp_info'] = 'FTP bilgilerinizi girin';
$lang['Attempt_ftp'] = 'FTP ile gönderme deneniyor';
$lang['Send_file'] = 'Bana sadece dosyayý gönder ve ben onu kendim FTP\'liyim';
$lang['ftp_path'] = 'phpBB2 FTP path\'i';
$lang['ftp_username'] = 'FTP Kullanýcý Adý';
$lang['ftp_password'] = 'FTP ÞÝfresi';
$lang['Transfer_config'] = 'Transfere baþla';
$lang['NoFTP_config'] = 'FTP iþlemi baþarýsýz. Lütfen config doyasýný indirip kendiniz gönderiniz';

$lang['Install'] = 'Yükle';
$lang['Upgrade'] = 'Güncelle';


$lang['Install_Method'] = 'Yükleme Metodunu Seçin';

$lang['Install_No_Ext'] = 'Sunucunuz seçtiðiniz veritabaný türünü desteklemiyor';

$lang['Install_No_PCRE'] = 'phpBB2 php için \'Perl-Compatible Regular Expressions\' modülüne ihtiyaç duymaktadýr. Kullandýðýnýz php ayarlarý bunu desteklememektedir';

//
// Version Check
//
$lang['Version_up_to_date'] = 'Yüklemeniz þu anda güncel, kullandýðýnýz phpBB sürümü için herhangi bir güncelleme yok.';
$lang['Version_not_up_to_date'] = 'Yüklemeniz þu anda güncel <b>deðil</b>. Kullandýðýnýz phpBB sürümünü güncellemek için, lütfen <a href="http://www.phpbb.com/downloads.php" target="_new">http://www.phpbb.com/downloads.php</a> adresine giderek son sürüme güncelleyin.';
$lang['Latest_version_info'] = 'Kullanýlabilir en son sürüm <b>phpBB %s</b>.';
$lang['Current_version_info'] = 'Þu anda siz <b>phpBB %s</b> sürümünü kullanýyorsunuz.';
$lang['Connect_socket_error'] = 'phpBB sunucusuna baðlanýlamýyor, hata raporu:<br />%s';
$lang['Socket_functions_disabled'] = 'Baðlantý fonksiyonlarý olanaksýz durumda.';
$lang['Mailing_list_subscribe_reminder'] = 'phpBB güncellemeleri hakkýnda son bilgileri almak için, <a href="http://www.phpbb.com/support/" target="_new">e-posta listemize katýlabilirsiniz</a>.';
$lang['Version_information'] = 'Sürüm Bilgisi';

// 
// Login attempts configuration - added 2.0.19
// 
$lang['Max_login_attempts'] = 'Ýzin verilen giriþ denemeleri'; 
$lang['Max_login_attempts_explain'] = 'Sitede kullanýcýlara izin verilen maksimum giriþ deneme sayýsý'; 
$lang['Login_reset_time'] = 'Giriþ kilitleme süresi'; 
$lang['Login_reset_time_explain'] = 'Ýzin verilen maksimum giriþ deneme sayýsý geçildiði zaman kullanýcý hesabýnýn kilitli kalacaðý süre';

// Search Flood Control - added 2.0.20 
$lang['Search_Flood_Interval'] = 'Arama Flood Aralýðý'; 
$lang['Search_Flood_Interval_explain'] = 'Kullanýcýnýn bir sonraki aramayý yapabilmesi için iki arama arasýnda beklemesi gereken süre (saniye cinsinden)';
$lang['Confirm_delete_smiley'] = 'Bu Ýfadeyi silmek istediðinize emin misiniz?'; 
$lang['Confirm_delete_word'] = 'Bu sansürlü kelimeyi silmek istediðinize emin misiniz?'; 
$lang['Confirm_delete_rank'] = 'Bu rütbeyi silmek istediðinize emin misiniz?';

//
// That's all Folks!
// -------------------------------------------------

?>