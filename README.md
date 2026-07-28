# Fixit — On-Demand Home Services Platform

**Fixit** is a full-stack, multi-vendor on-demand home services marketplace (an UrbanClap / Urban Company style platform) connecting **Customers**, **Service Providers**, **Servicemen**, and **Admins**. This repository contains the **Laravel backend, REST API, and admin dashboard** that power the platform's Customer and Provider mobile apps.

> Built for real-world production use — booking management, zone-based provider matching, wallets & commissions, and 15+ integrated payment gateways out of the box.

---

## Overview

Fixit lets customers browse service categories, book verified professionals, schedule appointments, and pay online — while providers manage their services, accept bookings, assign servicemen, and track earnings. Everything is orchestrated through a modular Laravel backend with a full-featured admin panel for platform operators.

**Core user roles:**
- **Customer** — browses categories/services, books, pays, tracks status, leaves reviews
- **Provider** — manages services & packages, accepts bookings, assigns servicemen, tracks income
- **Serviceman** — handles assigned jobs, manages wallet & withdrawals
- **Admin** — manages the entire platform via the dashboard (categories, zones, payments, commissions, users, settings)

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend Framework | Laravel 12 (PHP 8.2) |
| Modular Architecture | `nwidart/laravel-modules` |
| Admin Panel UI | Blade, Bootstrap 5, Alpine.js, jQuery, DataTables |
| Build Tooling | Vite |
| Auth & API Tokens | Laravel Sanctum |
| Roles & Permissions | Spatie `laravel-permission` |
| Media Handling | Spatie `laravel-medialibrary` |
| Activity Logging | Spatie `laravel-activitylog` |
| Geo / Zones | `matanyadaev/laravel-eloquent-spatial` |
| Push Notifications | Firebase (Kreait) |
| SMS / OTP | Twilio, Nexmo (Vonage), Msg91, custom gateways |
| Exports / Imports | Maatwebsite Excel, PhpSpreadsheet |
| PDF Generation | barryvdh/laravel-dompdf |
| Social Login | Laravel Socialite |
| Mobile Clients | Flutter (separate Customer & Provider apps) |

### Integrated Payment Gateways
Each gateway ships as an independent, self-contained Laravel module (own routes, config, and provider) so it can be enabled/disabled per deployment from the admin settings:

Stripe · PayPal · RazorPay · Paystack · Flutterwave · Mollie · Iyzico · PhonePe · Midtrans · SSLCommerz · BKash · CCAvenue · Instamojo · Alphanet

---

## Architecture

```
fixit/
├── app/
│   ├── Http/Controllers/API/       # Mobile app REST API (Customer & Provider apps)
│   ├── Http/Controllers/Backend/   # Admin dashboard controllers
│   ├── Models/                     # Booking, Provider, Customer, Service, Wallet, etc.
│   ├── Repositories/                # Repository pattern (Prettus L5)
│   ├── Services/                    # Business logic
│   └── Notifications/, SMS/         # Push & SMS delivery
├── Modules/                        # Self-contained payment gateway modules
│   ├── Stripe/ PayPal/ RazorPay/ ... (routes, config, providers per gateway)
│   └── Firebase/ Twilio/ Coupon/ Subscription/
├── routes/
│   ├── api.php                     # Mobile app API routes
│   ├── backend.php                 # Admin panel routes
│   └── web.php
└── resources/                      # Blade views for the admin dashboard
```

### Request Flow
1. **Customer app** hits `routes/api.php` (Sanctum-protected, localization middleware) to browse services, create bookings, and pay.
2. **Booking lifecycle**: a request is created → matched to providers/servicemen within a geographic **zone** → provider accepts → status is tracked through `BookingStatusLog` → payment is captured via the selected gateway module → **commission** is calculated and split between the provider/serviceman wallet and the platform.
3. **Admin panel** (`routes/backend.php`) gives operators full control: categories, zones, providers, bookings, payouts, coupons, subscriptions, notifications, and system settings — all through a Bootstrap/Alpine.js dashboard with DataTables-driven listings.
4. **Notifications**: booking and status updates trigger Firebase push notifications and SMS/OTP via the configured gateway.

---

## Key Features

- Zone-based provider/service discovery
- Real-time booking status tracking with full audit log
- Multi-gateway payments with pluggable module architecture
- Provider & serviceman wallets, commission history, and withdrawal requests
- Coupons & subscription plans
- Role-based access control (Admin, Provider, Customer, Serviceman)
- Multi-language & multi-currency support, RTL-ready
- Firebase push notifications + SMS/OTP (Twilio, Nexmo, Msg91)
- Reviews & ratings, favourites, custom offers & bidding
- Excel import/export and PDF invoice generation
- Companion Flutter apps for Customer and Provider, each with 30+ screens, light/dark mode, and localization

---

## Getting Started

```bash
git clone https://github.com/skillLeo/fixit.git
cd fixit

composer install
npm install

cp .env.example .env
php artisan key:generate

# configure your database and payment/SMS/Firebase credentials in .env

php artisan migrate --seed
php artisan storage:link

npm run dev      # compile frontend assets
php artisan serve
```

Enable/configure payment gateways, SMS providers, and Firebase from the **Admin → Settings** panel after installation.

---

## License

This project is proprietary and intended for client delivery / commercial licensing. Redistribution of the source code without authorization is not permitted.

## Contact

For inquiries about customization, deployment, or licensing, please reach out via GitHub.
