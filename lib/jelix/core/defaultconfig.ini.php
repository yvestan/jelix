;<?php die(''); ?>
;for security reasons , don't remove or modify the first line

defaultModule = "jelix"
defaultAction = "default_index"
defaultLocale = "fr_FR"
defaultCharset = "UTF-8"
defaultTimeZone = "Europe/Paris"

checkTrustedModules = off

; list of modules : module,module,module
trustedModules =

pluginsPath = lib:jelix-plugins/,app:plugins/
modulesPath = lib:jelix-modules/,app:modules/
tplpluginsPath = lib:jelix/tpl/plugins/

dbProfils = dbprofils.ini.php

defaultTheme = default
use_error_handler = on
shared_session = off

enableOldClassNaming = off

[plugins]

[responses]
html = jResponseHtml
redirect = jResponseRedirect
redirectUrl = jResponseRedirectUrl
binary = jResponseBinary
text = jResponseText
jsonrpc = jResponseJsonrpc
json = jResponseJson
xmlrpc = jResponseXmlrpc
xul = jResponseXul
xuloverlay = jResponseXulOverlay
xuldialog = jResponseXulDialog
xulpage = jResponseXulPage
rdf = jResponseRdf
xml = jResponseXml
zip = jResponseZip
rss2.0 = jResponseRss20
atom1.0 = jResponseAtom10
css= jResponseCss
ltx2pdf= jResponseLatexToPdf

[_coreResponses]
html = jResponseHtml
redirect = jResponseRedirect
redirectUrl = jResponseRedirectUrl
binary = jResponseBinary
text = jResponseText
jsonrpc = jResponseJsonrpc
json = jResponseJson
xmlrpc = jResponseXmlrpc
xul = jResponseXul
xuloverlay = jResponseXulOverlay
xuldialog = jResponseXulDialog
xulpage = jResponseXulPage
rdf = jResponseRdf
xml = jResponseXml
zip = jResponseZip
rss2.0 = jResponseRss20
atom1.0 = jResponseAtom10
css= jResponseCss
ltx2pdf= jResponseLatexToPdf

[error_handling]
messageLogFormat = "%date%\t[%code%]\t%msg%\t%file%\t%line%\n"
logFile = error.log
email = root@localhost
emailHeaders = "From: webmaster@yoursite.com\nX-Mailer: Jelix\nX-Priority: 1 (Highest)\n"
quietMessage="A technical error has occured. Sorry for this trouble."

; mots clés que vous pouvez utiliser : ECHO, ECHOQUIET, EXIT, LOGFILE, SYSLOG, MAIL, TRACE
default      = ECHO EXIT
error        = ECHO EXIT
warning      = ECHO
notice       = ECHO
strict       = ECHO
; pour les exceptions, il y a implicitement un EXIT
exception    = ECHO

[compilation]
checkCacheFiletime  = on
force  = off

[urlengine]
; nom du moteur d'url :  simple ou significant
engine        = simple

; active l'analyse d'url (mettre à off si vous utilisez le mod_rewrite d'apache)
enableParser = on

multiview = off

; chemin url jusqu'au repertoire www (celui que vous tapez dans le navigateur pour accéder à index.php etc.)
; peut être égale à "/" si vous spécifiez www comme étant le documentRoot de votre site au niveau du serveur
basePath = "/"

defaultEntrypoint= index

entrypointExtension= .php

notfoundAct = "jelix~error_notfound"

;indique si vous utilisez IIS comme serveur
useIIS = off

;indique le paramètre dans $_GET où est indiqué le path_info
IISPathKey = __JELIX_URL__

;indique si il faut stripslashé le path_info récupéré par le biais de IISPathKey
IISStripslashes_path_key = on

; liste des actions requerant https (syntaxe expliquée dessous), pour le moteur d'url simple
simple_urlengine_https =

[simple_urlengine_entrypoints]
; paramètres pour le moteur d'url simple : liste des points d'entrées avec les actions
; qui y sont rattachées


; nom_script_sans_suffix = "liste de selecteur d'action séparé par un espace"
; selecteurs :
;   m~a@r    -> pour action "a" du module "m" répondant au type de requete "r"
;   m~*@r    -> pour toute action du module "m" répondant au type de requete "r"
;   @r       -> toute action de tout module répondant au type de requete "r"

index = "@classic"
xmlrpc = "@xmlrpc"
jsonrpc = "@jsonrpc"
rdf = "@rdf"


[logfiles]
default=messages.log

[mailer]
; type d'envoi de mail : "mail" (mail()), "sendmail" (call sendmail), or "smtp" (send directly to a smtp)
mailerType = mail
; Sets the hostname to use in Message-Id and Received headers
; and as default HELO string. If empty, the value returned
; by SERVER_NAME is used or 'localhost.localdomain'.
hostname =
sendmailPath = "/usr/sbin/sendmail"

; if mailer = smtp , fill the following parameters

; SMTP hosts.  All hosts must be separated by a semicolon : "smtp1.example.com:25;smtp2.example.com"
smtpHost = "localhost"
; default SMTP server port
smtpPort = 25
; SMTP HELO of the message (Default is hostname)
smtpHelo =
; SMTP authentication
smtpAuth = off
smtpUsername =
smtpPassword =
; SMTP server timeout in seconds
smtpTimeout = 10
