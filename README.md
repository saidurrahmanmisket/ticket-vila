<h1 align="center">🎟️ TicketVilla — Backend</h1>

<p align="center">
  <strong>A full-featured property raffle platform built with Laravel 10</strong><br/>
  Trilingual · Stripe & PayPal Payments · Affiliate System · Role-Based Admin Panel
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Stripe-Payment-635BFF?style=for-the-badge&logo=stripe&logoColor=white" />
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" />
</p>

---

## 📌 About

**TicketVilla** is a premium web platform where users buy eBooks and receive raffle tickets for a chance to win luxury properties across Austria, Germany, and Hungary. Built with a clean, scalable Laravel architecture, it supports:

- 🏠 **Multiple gift properties** with galleries, featured items, and house documents
- 🎫 **Campaign-based raffle ticketing** with unique serial numbers
- 💳 **Stripe & PayPal payment gateway** integration
- 🌍 **Trilingual support** (English 🇬🇧 / German 🇩🇪 / Hungarian 🇭🇺)
- 🤝 **Affiliate program** with commission tracking and withdrawal requests
- 🔐 **Role-based admin panel** (Super Admin, Admin) using Spatie Permission
- 📊 **Analytics dashboard** — visitors, tickets sold, revenue overview

---

## ✨ Feature Highlights

| Area | Features |
|---|---|
| **Admin Dashboard** | Stats overview, visitor analytics, ticket & revenue counters |
| **Gift Management** | Properties, galleries (inside/outside), featured specs, house doc uploads |
| **Campaign System** | Multi-campaign raffle with status, limits, pricing, end dates |
| **Orders & Tickets** | Full order lifecycle, unique ticket serial generation, invoice PDF |
| **User Management** | Registration, email verification, profile, Google OAuth |
| **Affiliate System** | Affiliate users, commission tracking, withdrawal requests, toolkit files, tips |
| **CMS** | Homepage CMS, eBook descriptions, processes, raffle rules, key features |
| **Settings** | System settings, social media links, SEO, dynamic pages (Imprint, Privacy, T&C, Cookies) |
| **Communication** | In-app chat, notifications, FAQs, team profiles, news articles |
| **Promo Codes** | Percentage-based discount codes with usage limits |
| **Multilingual** | Full EN / DE / HU content across all modules |
| **Roles & Permissions** | Granular permissions with Spatie Laravel Permission |

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Framework** | Laravel 10 |
| **Language** | PHP 8.2+ |
| **Database** | MySQL 8 |
| **Auth** | Laravel UI + Laravel Sanctum + Google OAuth (Socialite) |
| **Payments** | Stripe (`stripe/stripe-php`), PayPal (`srmklive/paypal`) |
| **Permissions** | Spatie Laravel Permission |
| **Localization** | Spatie Laravel Translatable |
| **PDF** | barryvdh/laravel-dompdf |
| **DataTables** | Yajra Laravel DataTables |
| **Newsletter** | Spatie Laravel Newsletter (Mailchimp) |
| **GeoIP** | Torann GeoIP |
| **Flash Messages** | php-flasher/flasher-laravel |
| **Dev Tools** | Clockwork, Laravel Pint, Faker |

---

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Web/
│   │   │   ├── Admin/          # All admin panel controllers
│   │   │   ├── Frontend/       # Public-facing frontend controllers
│   │   │   ├── Affiliate/      # Affiliate portal controllers
│   │   │   └── User/           # User account controllers
│   │   ├── Auth/               # Authentication controllers
│   │   └── Payment/            # Stripe & PayPal payment handlers
│   ├── Models/                 # 33 Eloquent models
│   └── Helpers/                # Global helper functions
├── database/
│   ├── migrations/             # 44 migration files
│   └── seeders/                # Modular seeders (RichDataSeeder, CmsSeeder, etc.)
├── resources/
│   └── views/
│       ├── admin/              # Admin panel Blade views
│       ├── frontend/           # Public frontend Blade views
│       └── affiliate/          # Affiliate portal views
├── routes/
│   ├── saidur_backend.php      # Admin panel routes (module A)
│   ├── rasel_backend.php       # Admin panel routes (module B)
│   ├── saidur_frontend.php     # Public frontend routes (module A)
│   ├── rasel_frontend.php      # Public frontend routes (module B)
│   ├── affiliate.php           # Affiliate portal routes
│   └── api.php                 # REST API routes
└── lang/
    ├── en/                     # English translations
    ├── de/                     # German translations
    └── hu/                     # Hungarian translations
```

---

## 🚀 Getting Started

### Prerequisites

- PHP **8.2+** with extensions: `pdo`, `fileinfo`, `zip`, `mbstring`, `openssl`
- **Composer** 2.x
- **MySQL** 8.0+ or MariaDB 10.4+
- **Node.js** 18+ & npm (for frontend assets)
- [Laravel Herd](https://herd.laravel.com/) *(recommended)* or any local dev server (XAMPP, Valet, Sail)

---

### 1. Clone the Repository

```bash
git clone https://github.com/saidurrahmanmisket/ticket-vila.git
cd ticket-vila
```

---

### 2. Install Dependencies

```bash
# PHP dependencies
composer install

# Frontend assets
npm install && npm run dev
```

---

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Open `.env` and configure the following:

```env
# Application
APP_NAME=TicketVilla
APP_URL=http://ticketvilla-backend.test

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ticketvilla
DB_USERNAME=root
DB_PASSWORD=your_password

# Payment — Stripe
STRIPE_KEY=pk_test_xxxxxxxxxxxx
STRIPE_SECRET=sk_test_xxxxxxxxxxxx

# Payment — PayPal
# Configure in config/paypal.php

# Google OAuth
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=no-reply@ticketvilla.eu
```

---

### 4. Database Setup & Seeding

Run fresh migrations with all demo data in one command:

```bash
php artisan migrate:fresh --seed
```

This will populate **all** tables with realistic demo data:

| Seeder | What it seeds |
|---|---|
| `RoleSeeder` | Super Admin & Admin roles |
| `AdminSeeder` | Admin user account |
| `UserSeeder` | Default test user |
| `PermissionSeeder` | Full granular permission set |
| `CmsSeeder` | Homepage CMS content (EN/DE/HU) |
| `RichDataSeeder` | 3 Gifts, 5 Campaigns, 200 Orders, 200+ Tickets, 200 Visitors, FAQs, Team, News, Promo Codes, Affiliate content, Social Media & more |
| `TheProcessesTableSeeder` | "How it works" process steps |
| `RaffleRulesTableSeeder` | Official raffle rules |

---

### 5. Storage Link

```bash
php artisan storage:link
```

---

### 6. Default Credentials

| Role | Email | Password |
|---|---|---|
| **Admin** | `admin@admin.com` | `12345678` |
| **User** | `user@user.com` | `12345678` |

> ⚠️ Change these immediately in any non-development environment.

---

## 🔐 Admin Panel

Access the admin panel at: `http://your-app-url/admin`

### Admin Modules

| Module | URL |
|---|---|
| Dashboard | `/admin/dashboard` |
| Gifts (Properties) | `/admin/gifts` |
| Campaigns | `/admin/campaigns` |
| Orders | `/admin/orders` |
| Tickets | `/admin/tickets` |
| Users | `/admin/users` |
| Affiliate Users | `/admin/affiliate-users` |
| Affiliate Commissions | `/admin/affiliate-commissions` |
| Affiliate Toolkit Files | `/admin/affiliate-toolkit-files` |
| Affiliate Tips & Tricks | `/admin/affiliate-trips` |
| Products (eBooks) | `/admin/products` |
| Promo Codes | `/admin/promo-codes` |
| News | `/admin/news` |
| Teams | `/admin/teams` |
| FAQs | `/admin/faqs` |
| Dynamic Pages | `/admin/dynamic-pages` |
| Social Media | `/admin/social-media` |
| System Settings | `/admin/system-settings` |
| Roles & Permissions | `/admin/roles` |
| Chat | `/admin/chat` |

---

## 🌍 Multilingual System

All content is stored with `_en`, `_de`, `_hu` column suffixes for key text fields (title, description, etc.). The frontend switches language via session/locale middleware.

Supported languages:
- 🇬🇧 **English** (`en`)
- 🇩🇪 **German** (`de`)
- 🇭🇺 **Hungarian** (`hu`)

---

## 💳 Payment Integration

### Stripe
Configure `STRIPE_KEY` and `STRIPE_SECRET` in `.env`. The checkout flow is handled in `app/Http/Controllers/Payment/`.

### PayPal
Configure credentials in `config/paypal.php` or via `.env`. Uses `srmklive/paypal` v3.

---

## 🤝 Affiliate System

TicketVilla has a built-in affiliate program:

- Affiliates register and receive a unique tracking link
- Commissions are tracked per sale
- Toolkit files (banners, email templates, etc.) are downloadable from the affiliate portal
- Withdrawal requests can be submitted and managed by admin
- Tips & Tricks content guides affiliates to maximize sales

---

## 📊 Database Overview

**44 migrations** covering:

`users` · `gifts` · `campaigns` · `orders` · `tickets` · `products` · `ebooks` · `ebook_descriptions` · `gift_gallaries` · `gift_featured_items` · `house_files` · `highlight_images` · `key_features` · `cms` · `the_processes` · `raffle_rules` · `f_a_q_s` · `teams` · `news` · `dynamic_pages` · `system_settings` · `social_media` · `promo_codes` · `affiliate_users` · `affiliate_commissions` · `affiliate_files` · `affiliate_trips` · `affiliate_user_withdrawal_requests` · `visitors` · `browsing_times` · `chats` · `chat_replies` · `notifications` · `countries` · `otp` · and more.

---

## 🧰 Useful Artisan Commands

```bash
# Fresh migration + seed (recommended for dev reset)
php artisan migrate:fresh --seed

# Run only seeder (no migration drop)
php artisan db:seed

# Run a specific seeder
php artisan db:seed --class=RichDataSeeder

# Clear all caches
php artisan optimize:clear

# Generate IDE helpers (if installed)
php artisan ide-helper:generate

# List all routes
php artisan route:list
```

---

## 🧪 Testing

```bash
php artisan test
```

PHPUnit is configured in `phpunit.xml`. Tests live in `tests/Feature` and `tests/Unit`.

---

## 🌐 Environment Notes

| Environment | Recommended Setup |
|---|---|
| **Local Dev** | [Laravel Herd](https://herd.laravel.com/) (macOS) |
| **Staging** | Laravel Forge + Nginx |
| **Production** | Laravel Forge / Cloud Run + MySQL RDS |

---

## 📦 Key Packages

| Package | Purpose |
|---|---|
| `spatie/laravel-permission` | Role & permission management |
| `spatie/laravel-translatable` | Multilingual model attributes |
| `stripe/stripe-php` | Stripe payment processing |
| `srmklive/paypal` | PayPal payment processing |
| `laravel/socialite` | Google OAuth login |
| `barryvdh/laravel-dompdf` | PDF invoice generation |
| `yajra/laravel-datatables-oracle` | Server-side DataTables |
| `torann/geoip` | Visitor geo-location tracking |
| `spatie/laravel-newsletter` | Mailchimp newsletter integration |
| `drewm/mailchimp-api` | Mailchimp API client |
| `php-flasher/flasher-laravel` | Toast/flash notifications |
| `itsgoingd/clockwork` | Dev debugging & profiling |
| `io238/laravel-iso-countries` | ISO country list |

---

## 🗺️ Roadmap

- [ ] REST API for mobile app
- [ ] Real-time notifications via Pusher/Reverb
- [ ] Multi-currency support (EUR, HUF, CHF)
- [ ] Automated notarized draw integration
- [ ] Winner portal & announcement module
- [ ] Advanced affiliate dashboard analytics

---

## 🤲 Contributing

1. Fork the repository
2. Create your feature branch: `git checkout -b feature/my-feature`
3. Commit your changes: `git commit -m 'Add some feature'`
4. Push to the branch: `git push origin feature/my-feature`
5. Open a Pull Request against the `dev` branch

> All PRs should target the `dev` branch, not `main`.

---

## 📄 License

This project is licensed under the **MIT License** — see the [LICENSE](LICENSE) file for details.

---

## 👨‍💻 Developed By

**Softvence Agency** — Building premium digital products.

> For support or inquiries, open a GitHub issue or contact the team via the admin chat module.

---

<p align="center">
  <sub>Made with ❤️ using Laravel · TicketVilla © 2024–2026</sub>
</p>
