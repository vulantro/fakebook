
# FakeBook

## Mi is az a FakeBook?

Ahogy a nevéből is adódik egy FaceBook hasonmás, viszont attól eltérő funkcionalitásokkal is rendelkezik.

## Az oldal főbb tulajdonágai

### Regisztráció
 Az egyik alapköve az oldalnak, hogy nem kerülhet be akárki a tagok közé, kizárólag **QR kódos** meghívás alapján. Mindenki rendelkezik egy saját meghívóval (QR code), amit generálhat egy ember meghívására. Eleinte ez ingyen generálható, később korlátozva lesz.

Ezután a felhasználónév, jelszó kombináció segítségével be is léphetünk, tetszés szerint ki is lehet jelentkezni. Ha mégsem tetszik az oldal, lehetőségünk van törölni magunkat az oldalról.

### Hírfolyam

Minden felhasználó rendelkezik egy hírfolyammal, ahol ismerősei posztjait megtekintheti, reagálhat rá, kommentet fűzhet hozzá. A hírfolyam tetején lehetőségünk van saját posztot írni, megoszthatjuk, hogy éppen hol vagyunk, továbbá képeket is feltölthetünk.
### Ismerősök keresése / felvétele a barátlistába

Lehetőségünk van felhasználókra keresni, őket akár fel is vehetjük az ismerőseink közé. Kereshetünk a saját ismerőseink között is. Az egyes profilokat meg is tekinthetjük.

### Posztolási lehetőségek

Ha egy posztot készítünk, az számunkra AJAX segítségével egyből látható lesz az oldal frissítése nélkül, továbbá a poszt, a többiek hírfolyamán is megjelenik. Egy képet kiválaszthatunk a galériából vagy lehetőségünk van helyben képet készíteni. Megoszthatjuk éppen hol tartózkodunk, ekkor a posztban egy minimap jelenik meg a tartózkodási helyünkkel. Továbbá a poszt tetején az adott város/ország neve is megjelenik.

### Értesítések

Ha egy új poszt jelenik meg, akkor a felhasználó arról értesítést kap, így nyomon követhető, ki mit posztolt, merre járt. Itt megjelennek a barátjelölések is.

### Működés bemutatása / tesztelése

Miután elkészül az oldalt, egy script segítségével előre létrehozott felhasználók (botok) időzített posztokat tesznek ki, reagálnak mások posztjaira, kommentet fűznek hozzá, stb. Egyszóval az oldal működését reprezentálják.

### Egy kis Proof of Concept

Az oldal természetesen **Progresszív Web Alkalmazás (PWA)** fejlesztési technikával készül el, ahol a fő szempont a mobilon történő igényes megjelenés, de nem elhanyagolható az asztali változat sem.

Felhasznált technológiák:
 * HTML
 * SCSS
 * JavaScript
 * PHP

A FakeBook elkészítésében nagy segítséget nyújt a [https://semantic-ui.com](https://semantic-ui.com/) oldal, ahol válogathatunk különböző közösségi oldal komponensek közül, így számos elem újrafelhasználható. 
## User stories
* Az emberek megunták a felkapott közösségi oldalakon folyamatosan megjelenő reklámokat, így egy alternatívát keresnek.

* Nimród és barátai szeretnének egy alternatívát használni a Facebook helyett, miután több médiaforrás is aggályait fejezte ki azzal kapcsolatban, hogy a tech óriás megfelelően kezeli-e a regisztrált felhasználók személyes adait.

* Péternek elege lett abból, hogy a Facebookon elszaporodtak az idős emberek fenyegető aurával (boomerek), így fordult a Fakebook felé.

## Jövőbeli tervek
Egyéb tervek, miután elkészül az oldal alapfunkcionalitása:

* Chat
* Profilkép váltása 
* Kapcsolati háló 
* Posztban userek taggelése
* Felhasználói ötletek elbírálás alapján


## Wireframe

### Feed

![enter image description here](https://raw.githubusercontent.com/elte-fi/project-5-csoport/master/images/specification/feed.PNG)

### Menu

![enter image description here](https://raw.githubusercontent.com/elte-fi/project-5-csoport/master/images/specification/menu.PNG)

### Friendlist

![enter image description here](https://raw.githubusercontent.com/elte-fi/project-5-csoport/master/images/specification/search_friends.PNG)


### Global Search

![enter image description here](https://raw.githubusercontent.com/elte-fi/project-5-csoport/master/images/specification/search_people.PNG)

### Profile

![enter image description here](https://raw.githubusercontent.com/elte-fi/project-5-csoport/master/images/specification/profile.PNG)

### Register 

![enter image description here](https://raw.githubusercontent.com/elte-fi/project-5-csoport/master/images/specification/register.PNG)

### Login

![enter image description here](https://raw.githubusercontent.com/elte-fi/project-5-csoport/master/images/specification/login.PNG)











