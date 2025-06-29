# Laravel Security Assignments – Opdracht 3: IDOR preventie

## 🌐 Hosted demo
De applicatie is gehost via Render: [link naar je app]

## 🔐 Geteste feature: Order Access Control
Alleen ingelogde gebruikers kunnen hun eigen bestellingen zien.

### Probeer het zelf:
1. Registreer twee accounts via `/register`
2. Plaats met account A een bestelling via `/orders/create`
3. Log in met account B en probeer via de URL `/orders/1` (of het id van de bestelling van A) te bekijken
4. Je ziet een `403 Forbidden`, want de bestelling is niet van jou.

## ✅ Beveiliging tegen hijacking & snooping
De app draait op HTTPS, sessie-cookies zijn `Secure`, en `SESSION_SECURE_COOKIE` staat op true in `.env`.
