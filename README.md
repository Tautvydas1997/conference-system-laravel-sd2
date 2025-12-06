# Konferencijų registracijos sistema (Laravel)

Internetinė sistema skirta registracijai į konferencijas ir konferencijų duomenų valdymui. Projektas sukurtas naudojant Laravel framework.

**Studentas:** Tautvydas Kasperavičius  
**Grupė:** PIT-22-I-NT  
**Savarankiškas darbas 2 (SD2)**

---

## 📋 Turinys

- [Reikalavimai](#reikalavimai)
- [Instaliacija](#instaliacija)
- [Prisijungimo duomenys](#prisijungimo-duomenys)
- [Funkcionalumas pagal vaidmenis](#funkcionalumas-pagal-vaidmenis)
- [Projekto struktūra](#projekto-struktūra)

---

## 🔧 Reikalavimai

- PHP 8.2 arba naujesnė versija
- Composer
- NPM (Node.js)
- SQLite (įtrauktas į projektą)

---

## 🚀 Instaliacija

### 1. Įdiekite dependencies

```bash
composer install
npm install
```

### 2. Sukonfigūruokite aplinkos failą

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Sukurkite duomenų bazę ir paleiskite migracijas

```bash
php artisan migrate --seed
```

Šis komandas:
- Sukuria SQLite duomenų bazės failą (`database/database.sqlite`)
- Sukuria visas reikalingas lenteles (users, roles, conferences, users_roles, users_conferences)
- Užpildo duomenų bazę pradiniais duomenimis (vaidmenys, naudotojai, konferencijos)

### 4. Kompiliuokite frontend assets

**Development mode:**
```bash
npm run dev
```

**Production mode:**
```bash
npm run build
```

### 5. Paleiskite Laravel serverį

```bash
php artisan serve
```

Serveris bus pasiekiamas adresu: **http://localhost:8000**

### 6. Atidarykite naršyklėje

```
http://localhost:8000
```

---

## 👤 Prisijungimo duomenys

Po migracijų su seederiais (`php artisan migrate --seed`), galite prisijungti su šiais naudotojais:

### 🔴 Administratorius

- **Email:** `admin@example.com`
- **Slaptažodis:** `password`
- **Vardas:** Admin Administratorius

### 🔵 Darbuotojas

- **Email:** `marija@example.com`
- **Slaptažodis:** `password`
- **Vardas:** Marija Marijaitė

### 🟢 Klientas (2 paskyros)

- **Email:** `jonas@example.com`
- **Slaptažodis:** `password`
- **Vardas:** Jonas Jonaitis

- **Email:** `petras@example.com`
- **Slaptažodis:** `password`
- **Vardas:** Petras Petraitis

---

## 🎯 Funkcionalumas pagal vaidmenis

### Klientas

- ✅ Matyti visų **planuojamų** konferencijų sąrašą
- ✅ Užsiregistruoti į konferenciją
- ✅ Peržiūrėti konferencijos informaciją

### Darbuotojas

- ✅ Matyti visų konferencijų sąrašą (planuojamas + įvykusios)
- ✅ Peržiūrėti konferencijos informaciją
- ✅ Matyti užsiregistravusių į konferenciją klientų sąrašą
- ❌ Negali atlikti jokių veiksmų su įrašais (redaguoti, šalinti, kurti)

### Administratorius

- ✅ Pilnas CRUD funkcionalumas konferencijoms:
  - Kurti naują konferenciją
  - Redaguoti konferenciją
  - Šalinti konferenciją (tik planuojamas, negalima šalinti įvykusių)
  - Peržiūrėti konferencijų sąrašą
- ✅ Valdyti naudotojų duomenis:
  - Redaguoti naudotojo vardą, pavardę, el. pašto adresą

---

## 📁 Projekto struktūra

### Backend

- **Controllers:**
  - `HomeController` - Pagrindinis puslapis
  - `ClientController` - Kliento posistemis
  - `EmployeeController` - Darbuotojo posistemis
  - `Admin\AdminController` - Administratoriaus pagrindinis puslapis
  - `Admin\ConferenceController` - Konferencijų valdymas
  - `Admin\UserController` - Naudotojų valdymas
  - `Auth\LoginController` - Prisijungimas
  - `Auth\RegisterController` - Registracija

- **Models:**
  - `User` - Naudotojo modelis su roles ir conferences relationships
  - `Role` - Vaidmenų modelis
  - `Conference` - Konferencijų modelis

- **Middleware:**
  - `RoleMiddleware` - Vaidmenų pagrindu autorizacija

- **Services:**
  - `ConferenceService` - Konferencijų logikos valdymas
  - `UserService` - Naudotojų logikos valdymas

### Frontend

- **Views:**
  - `layouts/app.blade.php` - Globalus layout su navbar
  - `home.blade.php` - Pagrindinis puslapis
  - `auth/login.blade.php` - Prisijungimo forma
  - `auth/register.blade.php` - Registracijos forma
  - `conferences/*` - Konferencijų views (index, create, edit, show, _form)
  - `client/*` - Kliento posistemio views
  - `employee/*` - Darbuotojo posistemio views
  - `admin/*` - Administratoriaus views

- **Assets:**
  - Bootstrap 5 (CSS framework)
  - Alpine.js (JavaScript framework)
  - Kompiliuojama su Vite

### Duomenų bazė

- **Lentelės:**
  - `roles` - Vaidmenys (admin, employee, client)
  - `users` - Naudotojai
  - `conferences` - Konferencijos
  - `users_roles` - Many-to-Many: naudotojų vaidmenys
  - `users_conferences` - Many-to-Many: naudotojų registracijos į konferencijas

---

## 🔐 Autentifikacija ir Autorizacija

- **Registracija:** Nauji naudotojai automatiškai gauna kliento vaidmenį
- **Prisijungimas:** Session-based autentifikacija
- **Autorizacija:** Middleware ir Blade direktyvos pagal vaidmenis

---

## 📝 Papildoma informacija

- **Kalba:** Lietuvių kalba (vertimų failai `lang/lt/`)
- **Duomenų bazė:** SQLite (failas: `database/database.sqlite`)
- **Kompiliacija:** Vite (Laravel Mix alternatyva)
- **Kodavimo standartai:** PSR

---

## 🐛 Problemų sprendimas

### Duomenų bazės problema

Jei kyla problemų su duomenų baze, iš naujo sukurkite:

```bash
php artisan migrate:fresh --seed
```

### Assets neveikia

Įsitikinkite, kad assets yra kompiliuoti:

```bash
npm run build
```

Arba development mode su hot reload:

```bash
npm run dev
```

### Sesijos problema

Išvalykite cache:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 📄 Licencija

Laravel framework yra open-source software su [MIT licencija](https://opensource.org/licenses/MIT).
