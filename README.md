# Logger Plugin for OctoberCMS

Tento plugin implementuje jednoduchý logovací systém v rámci OctoberCMS.

## 🔧 Inštalácia

1. Skopíruj plugin do `plugins/applogger/logger`
2. Spusti migrácie:
   ```bash
   php artisan october:migrate
   ```

## 📁 Plugin štruktúra

```
plugins/
└── applogger/
└── logger/
├── controllers/
│ └── LogController.php
├── models/
│ └── Log.php
├── updates/
│ ├── create_logs_table.php
│ └── version.yaml
├── composer.json
├── Plugin.php
└── routes.php
```

## Funkcionalita

- **Model `Log`**
    - `arrival` (timestamp): Čas príchodu.
    - `name` (string): Meno používateľa.
    - `late` (boolean): Indikácia, či používateľ meškal.

- **Validácia cez model `rules`**
    - `name` je povinné a musí byť reťazec.
    - `arrival` a `late` sú spravované automaticky.

## API Endpointy

| Metóda | URL                         | Popis                                      |
|--------|-----------------------------|--------------------------------------------|
| GET    | `/api/applogger/logs`       | Zoznam všetkých záznamov                   |
| GET    | `/api/applogger/logs/{name}`| Záznamy podľa mena                         |
| POST   | `/api/applogger/logs`       | Vytvorenie nového záznamu (form-data)      |

### POST Príklad

- **URL:** `POST /api/applogger/logs`
- **Content-Type:** `multipart/form-data`
- **Parametre:**
    - `name` – meno používateľa

- **Odpoveď:**
```json
{
  "id": 1,
  "name": "Janko",
  "arrival": "2025-06-03T09:00:00",
  "late": false
}
