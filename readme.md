# DOKUMENTAZIOA
Lehenik, VirtualBox softwarea erabiliz, Ubuntu server-eko makina birtual bat egin dugu Apache, Git eta sql instalatuta. Makina hau, gure sare berdinean jarri dugu zubi-egokitzailearen aukera erabiliz.

## Aurkibidea
1-[Erabilitako materiala](#Materiala)

2-[Zerbitzariaren ezaugarriak](#Zerbitzaria)

3-[Nola inportatu Virtul Box-en makina birtuala](#Inportazioa)

4-[Apache](#Apache)

5-[Git](#Git)

6-[SQL](#SQL)

## Materiala
- Ordenagailua

- Virtual Box

- Ubuntu server iso-a

## Zerbitzaria
- 2GB RAM
- 20GB-ko disko gogorra


## Inportazioa

Lehenik eta behin, Birtuala Box menuan hona joan behar dugu: Archivo>Importar servicio virtualizado. Ondoren, inportatu nahi dugun makinaren irudia duen fitxategia aukeratu behar dugu, normalean .OVA formatuan, disko gogorretik.

Urrats hori egin ondoren, makinaren oinarrizko ezaugarriak ikusi eta konfiguratu ahal izango ditugu: izena, baliabideak, kokapena, etab. Geroago, inportatu ondoren, berriro alda ditzakegu.

Hori eginda, inportazio-prozesua hasiko da. Unetxo bat iraungo du, daukagun makinaren arabera, baina ez minutu batzuk baino gehiago.



## Apache
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

## Git
Git instalatzako agindu hau erabili dugu:
```
sudo apt install git
```
Ondoren repositorioko link-a kopiatuko dugu eta repositorioa gure makinara klonatu dugu agindu hau erabiliz:
```
git clone <https://github.com/urrestihodei/tenis.git>
```

Ondoren, /var/www/html/ karpetara mugitu dugu eta apache berrabiarazi dugu. Horrela, Apachek web orrialdea Git-eko repositoriotik hartuko du.

## SQL
My Sql zerbitzari bat instalatu dugu, Hau egiteko agindu hau erabili dugu:
```
sudo apt install mysql-server
``` 
Bertan gure datu basea kopiatu dugu web orrialdeak bertako informazioa erakus dezan. 
