#DOKUMENTAZIOA
Lehenik, VirtualBox softwarea erabiliz, Ubuntu server-eko makina birtual bat egin dugu Apache, Git eta sql instalatuta. Makina hau, gure sare berdinean jarri dugu zubi-egokitzailearen aukera erabiliz.

##Aurkibidea
*[Apache](#Apache)
*[Git](#Git)
*[SQL](#SQL)


##Apache
/etc/apache2/sites-available/  karpetan dagoen .conf fitxategia editatu dugu.
Artxibo horretan, DocumentRoot bilatzen du, bertan, web fitxategiak dauden direktorioa jartzen dugu. Adibidez: DocumentRoot /var/www/html/tenis-apache/.

Ondoren apache berrabiarazten dugu agindu hau erabiliz:
```
sudo systemctl restart apache2
```
Beharrezkoa izanez gero, web orrialdea gaituko dugu agindu hau erabiliz:
```
sudo a2ensite konfigurazio_fitxategia.conf
```
 Behin Apache berrabiaraztean web orria atzigarria izango da nabigatzaile batetik.

##Git
Git instalatzako agindu hau erabili dugu:
```
sudo apt install git
```
Ondoren repositorioko link-a kopiatuko dugu eta repositorioa gure makinara klonatu dugu agindu hau erabiliz:
```
git clone <https://github.com/urrestihodei/tenis.git>
```

Ondoren, /var/www/html/ karpetara mugitu dugu eta apache berrabiarazi dugu. Horrela, Apachek web orrialdea Git-eko repositoriotik hartuko du.

##SQL
My Sql zerbitzari bat instalatu dugu eta bertan kopiatu dugu datu basea gure wbe orrialdeak bertako informazioa erakus dezan. Hau egiteko agindu hau erabili dugu:
```
sudo apt install mysql-server
```

