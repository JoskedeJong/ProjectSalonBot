## Project SalonBot

Goal: to expand a pre-created PHP bot for the Line app to accommodate to the needs of user stories - in this case, those of a Dutch massage-salon owner. One of the core-goals is to give the bot acces to a database. 


#### Development Goals
* [x] Get pre-created bot up and running. 
* [x] Set up hard-coded test-response.
* [ ] create opening message with buttons
* [x] create connection with database
* [ ] allw user to create modifications in database
* [ ] concentrate connection calls into single function



#### Personal goals
* [ ] learn integration of PHP and databases
* [ ] learn to integrate output of line-bot-designer into project



## User Stories

User stories, prioritzed and labeled by subject.

|  | **Als een** | **Wil ik ...** | **Zodat ...** | **Onderwerp** |
|  | --- | --- | --- | --- |
|  | | Top Priority | | |
|  [x]  | developer | na het sturen van *TEST* aan de bot een reactie  *TESTOK* terugkrijgen | ik kan controleren of mijn bot actief in en werkt | hardcode |
|  [ ]  | klant | de openingstijden van de gehele week kunnen opvragen | ik hiermee rekening kan houden in mijn agenda en planning | hardcode, database |
|  [x]  | klant | de tarievenlijst opvragen | ik een overzicht krijg van mogelijkheden en kosten | hardcode, kan database |
|  [ ]  | klant | het adres van het bedrijf opvragen | ik weet waar de behandelingen plaatsvinden | hardcode, kan API |
|  [ ]  | klant | weten wanneer ik terecht kan | ik daarna een afspraak kan maken| database |
|  [ ]  | klant | opvragen welke merken en producten gebruikt worden tijdens behandeling | ik dit kan betrekken in mijn overweging om een afspraak te maken | hardcode |
|  [ ]  | klant | een review kunnen achterlaten na afloop van een ingeplande behandeling | ik kan doorgeven wat er goed gaat en wat er nog beter kan | feedback |
|  [ ]  | manager | de review berichten van klanten zien | ik mijn bedrijf en diensten kan verbeteren | feedback |
|  [ ]  | manager | eenvoudig en vlot mijn klanten kunnen bedanken voor echt goed reviews | mijn klanten weten wat ik met de feedback ga doen | feedback |
|  [ ]  | manager | een backup van de chatbot instellingen en data kunnen downloaden | ik mijn gegevens kan bewaren | data-acces |
|  [ ]  | manager | een backup weer kunnen inladen | ik mijn bot kan herstellen na een crash | data-acces |
|  | --- | --- | --- | --- |
|  | | Medium Priority | | |
|  [ ]  | klant | snel de openingstijden van vandaag kunnen opvragen | ik weet of het bedrijf nu open is | hardcode, kan database |
|  [ ]  | klant | een route naar het bedrijf opvragen | ik weet hoe ik bij het bedrijf kom | API-integratie (google) |
|  [ ]  | klant | weten waneer ik terecht kan voor een specifieke behandeling | ik daarna een afspraak kan maken | database |
|  [ ]  | klant | afspraak maken op eerste mogelijkheid | ik zo snel mogelijk aan de beurt ben | database, manipulation |
|  [ ]  | klant | afspraak maken voor een speciek moment en behandeling | ik kan afspreken dat dit in mijn agenda past | database, manipulation |
|  [ ]  | klant | afspraak annuleren | ik kan laten weten dat ik niet op gemaakte afspraak zal komen | database, manipulation |
|  [ ]  | klant | op vragen waar het bot geen direct antwoord op geeft, later alsnog een reactie ontvangen van een medewerker | ik altijd antwoord krijg op mijn vragen en ook gevoel heb dat er naast robots ook mensen werken | feedback |
|  [ ]  | manager | aan de bot statistieken kunnen vragen | ik het gebruik van de chatbot kan volgen | traffic |
|  [ ]  | manager | de beschikbare behandelkamers kunnen invoeren | de bot bij het maken van afspraken rekening kan houden met beschikbare capaciteit | database, manipulation |
|  [ ]  | manager | de beschikbare medewerkers kunnen invoeren | de bot bij het maken van afspraken rekening kan houden met beschikbare medewerkers | database, manipulation |
|  [ ]  | manager | de informatie die de chatrobot aan klanten geeft kunnen instellen via een webpagina | ik de gegevens van het bedrijf makkelijker kan invoeren dan via chat berichten | database, portal |
|  [ ]  | manager | op een op te geven dag een op te geven percentage korting op een opgegeven behandeling geven | er actie berichten naar mijn klanten gezonden worden ter promotie | database, manipulation, promo |
|  [ ]  | manager | op een op te geven periode een op te geven percentage korting op alle behandeling geven | er actie berichten naar mijn klanten gezonden worden ter promotie | database, promo |
|  [ ]  | manager | de geboekte aantallen per behandeling per week opvragen | welke behandelingen goed verkopen | database |
|  [ ]  | medewerker | mij aanwezig kunnen melden | de bot bij het maken van afspraken rekening kan houden met mijn aanwezigheid | database, manipulation, user-recognition |
|  [ ]  | medewerker | mij afwezig kunnen melden | de bot bij het maken van afspraken rekening kan houden met mijn afwezigheid | database, manipulation |
|  [ ]  | platform | de chatbot functionaliteit scheiden van de specifieke chat API | ik op een later moment kan uitbreiden of schakelen naar andere chat-aanbieders | |
|  [ ]  | platform | de chatbot naast LINE ook werkt en beschikbaar is voor WhatsApp (Business) | ik ook klanten kan helpen in landen waar WhatsApp dominant is | |
|  | --- | --- | --- | --- |
|  | --- | Low Priority | --- | |
|  [ ]  | klant | de prijs van een specfieke behandeling opvragen | ik snel weet wat mijn gewenste behandeling zal kosten | database |
|  [ ]  | klant | een overzicht van medewerkers opvragen | ik kan bepalen wie de behandelingen uitvoert | database, user recognition |
|  [ ]  | klant | weten wanneer ik terecht kan bij een specifieke medewerker | ik daarna een afspraak kan maken | database, manipulation, user-recognition |
|  [ ]  | klant | afspraak verzetten | ik een reeds gemaakte afspraak kan verzetten als een ander moment mij beter uitkomt | database, manipulation |
|  [ ]  | klant | vooruit mijn afspraak betalen | ik garantie heb dat mijn afspraak vast staat en dat ik geen geld hoef mee te nemen | payment, user-recognition |
|  [ ]  | klant | bericht krijgen als er acties zijn | ik weet dat er een actie is en eenvoudig met korting kan boeken | messaging, promo |
|  [ ]  | klant | een digitale factuur ontvangen | ik transparant inzicht heb in de kosten | payment |
|  [ ]  | klant | mij kunnen aanmelden voor de wekelijke winactie | ik kans maak op een gratis behandeling | promo, payment, user-recognition |
|  [ ]  | klant | mij kunnen afmelden voor de wekelijkse winactie | ik niet meer meespeel | promo, user-recognition |
|  [ ]  | klant | een bericht krijgen als gewonnen hebben in de wekelijkse winactie | ik mijn prijs kan verzilveren | messaging, promo, user-recognition |
|  [ ]  | manager | de informatie die de chatrobot aan klanten geeft kunnen instellen via de chat | ik de gegevens van bedrijf zelf kan beheren zonder computer | portal |
|  [ ]  | manager | De omzet per medewerker opvragen per week | welke medewerkers de meeste omzet maken | database, user-recognition (?) |
|  [ ]  | manager | de geplande afspraken per medewerker per week opvragen | welke medewerkers de meeste afspraken mee gemaakt worden | database, user-recognition (?) |
|  [ ]  | manager | dat er elke zaterdag op basis van de nederlandse lotto trekking een winnende klant wordt aangewezen | deze een gratis behandeling wint | promo, api-integration |
|  [ ]  | platform | templates kunnen maken met chatbot instellingen | ik bedrijven een template kan leveren met instellingen om direct aan de slag te gaan | data-access |
|  [ ]  | platform | een catalogus met chatbot templates hebben | ik bij demonstraties en verkoop snel een passende template kan vinden | portal, data access |
