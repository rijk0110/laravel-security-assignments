Testplan – DutchGroceries – Deliveries
 User story 1
Beschrijving: Als gebruiker wil ik een nieuwe delivery kunnen toevoegen, zodat ik bestellingen kan laten bezorgen.
Happy path:
– Ik vul alle verplichte velden correct in en klik op "Opslaan".
– Resultaat: ik zie een groene bevestiging "Delivery succesvol toegevoegd!"
Unhappy path:
– Ik laat het veld "Naam" leeg.
– Resultaat: ik krijg een foutmelding onder het veld ("The name field is required.") in rode tekst.
Systeemtesten:
– Happy: Bevestigingstekst verschijnt + redirect naar juiste pagina.
→ Getest in: test_create_delivery_success()
– Unhappy: Foutmelding wordt weergegeven onder veld, formulier behoudt input.
→ Getest in: test_create_delivery_validation_error()
Unit test:
– Test of DeliveryController@store valide invoer opslaat in database.
→ Getest in: test_create_delivery_success()

 User story 2
Beschrijving: Als gebruiker wil ik de lijst van deliveries kunnen bekijken, zodat ik kan controleren wat er al bestaat.
Happy path:
– Ik ga naar de /deliveries pagina.
– Resultaat: ik zie een tabel met alle deliveries.
Unhappy path:
– Ik bezoek /deliveries zonder ingelogd te zijn.
– Resultaat: ik word doorgestuurd naar de loginpagina.
Systeemtesten:
– Happy: Route /deliveries toont correcte content.
→ Getest in: test_index_delivery_shows_deliveries()
– Unhappy: Niet-ingelogde gebruiker wordt geredirect naar login.
→ Nog niet getest (optioneel toevoegen)
Unit test:
– Test of DeliveryController@index de juiste data returned naar de view.
→ Getest in: test_index_delivery_shows_deliveries()

 
Extra user story (bonus)
Beschrijving: Als gebruiker wil ik een bestaande delivery kunnen verwijderen, zodat ik foutieve of oude leveringen kan opruimen.
Happy path:
– Ik klik op "Verwijder" naast een bestaande delivery.
– Resultaat: de delivery verdwijnt uit de lijst en database.
Systeemtest:
– Happy: Redirect naar /deliveries en database bevat delivery niet meer.
→ Getest in: test_delete_delivery_success()
Unit test:
– Test of DeliveryController@destroy de juiste delivery verwijdert.
→ Getest in: test_delete_delivery_success()



Evaluatie:
Welke fout kan WÉL worden aangetoond met deze tests?
    Een fout in de validatie van verplichte velden bij het aanmaken van een delivery, zoals een lege naam, wordt direct opgespoord door de systeemtest.

Welke fout kan NIET worden aangetoond met deze tests?
    Fouten in de layout van de pagina of spellingsfouten in de bevestigingstekst worden niet door deze tests ontdekt.
 
Kun je nu concluderen of "alles het goed doet"? Beargumenteer:
    Niet helemaal. De tests dekken wel de belangrijkste functionaliteit en validatie, maar ze testen bijvoorbeeld geen randgevallen of UI-fouten. De dekking is dus goed voor basisfunctionaliteit, maar niet volledig voor de hele applicatie.
