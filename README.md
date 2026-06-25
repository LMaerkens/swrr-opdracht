# SWRR Opdracht - Huisjes Boeking Systeem

Een Laravel webapplicatie voor het inschrijven, beheren en boeken van vakantiehuisjes. Dit systeem bevat functionaliteit voor gebruikersauthenticatie, het inschrijven voor huisjes, en een uitgebreid admin-paneel voor het beheren van gebruikers en inschrijvingen.

## Functionaliteiten

- **Gebruikersauthenticatie**: 
  - Registreren en Inloggen
  - E-mailverificatie
  - Wachtwoord hashing
- **Huisjes**: 
  - Overzicht van beschikbare huisjes
  - Details per huisje
- **Inschrijvingen & Boekingen**:
  - Gebruikers kunnen zich inschrijven voor huisjes
  - Loting functionaliteit
- **Admin Paneel**:
  - Overzicht van alle inschrijvingen (bekijken en verwijderen)
  - Gebruikersbeheer (gebruikers bekijken en admin-rechten toewijzen/intrekken)

## Vereisten

- PHP >= 8.0
- Composer
- Database (MySQL/MariaDB of SQLite)
- Node.js & NPM (voor frontend assets)

## Installatie

Volg deze stappen om het project lokaal te draaien:

1. **Clone het repository** (of download de code):
   ```bash
   git clone <repository-url>
   cd swrr-opdracht
   ```

2. **Installeer PHP afhankelijkheden**:
   ```bash
   composer install
   ```

3. **Stel het `.env` bestand in**:
   Kopieer het voorbeeld configuratiebestand en vul je databasegegevens in:
   ```bash
   cp .env.example .env
   ```

4. **Genereer een applicatie key**:
   ```bash
   php artisan key:generate
   ```

5. **Voer de database migraties uit**:
   ```bash
   php artisan migrate
   ```
   *(Optioneel)* Als er seeders zijn, kun je deze meenemen:
   ```bash
   php artisan migrate --seed
   ```

6. **Start de ontwikkelserver**:
   ```bash
   php artisan serve
   ```

De applicatie is nu toegankelijk via `http://localhost:8000`.

## Gebruikte Technologieën

- [Laravel 9](https://laravel.com/) - PHP Framework
- [Blade](https://laravel.com/docs/blade) - Templating Engine
- HTML / CSS / JavaScript

## Licentie

Dit project is open-source en beschikbaar onder de [MIT licentie](https://opensource.org/licenses/MIT).
