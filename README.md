# EPIC Translations - Technical Runbook
## Business Continuity & System Administration Guide

Last updated: 2026-05-24

---

## TABLE OF CONTENTS
1. System Overview & Architecture
2. Server Access
3. EPS (epictranscriptions.com)
4. AITH (aitranslationhub.co)
5. SRH (staffingresourceshub.com)
6. Common Operations
7. Emergency Procedures

---

## 1. SYSTEM OVERVIEW & ARCHITECTURE

Three systems running across two servers:

```
Hostinger VPS (82.197.92.115)
├── EPS - PHP 5.6 + MySQL (legacy translation management)
└── AITH - Laravel 10 frontend + Flask 3 API (AI translation hub)

DigitalOcean (143.198.107.45)
└── SRH - React 19 + Express 5 + MongoDB (OPI/VRI platform)
```

All systems use standard, well-documented stacks. No proprietary frameworks.

---

## 2. SERVER ACCESS

### Hostinger VPS (EPS + AITH)
- IP: 82.197.92.115
- SSH: `ssh root@82.197.92.115`
- Password: vY3&SG?9wl7(u@Irqrrs
- Hostname: srv475107
- Hostinger Panel: Access via Hostinger account (manage DNS, PHP versions, etc.)

### DigitalOcean (SRH)
- IP: 143.198.107.45
- SSH: `ssh root@143.198.107.45`
- Password: SRH#dev2026!xKp
- Process Manager: PM2 (`pm2 list`, `pm2 restart srh-api`)

---

## 3. EPS (epictranscriptions.com)

### Tech Stack
- PHP 5.6 (FPM on port 14005) - binary at /usr/bin/php5.6
- MySQL (local)
- Smarty 2.6.19 template engine
- PHPMailer 5.2.22

### File Locations
- Production: /home/epictranscriptions/htdocs/epictranscriptions.com/
- Dev: /home/epictranscriptions-dev/htdocs/dev.epictranscriptions.com/
- Templates: /templates/ (Smarty .tpl files)
- Admin pages: /admin/
- CSS: /css/
- Smarty cache: /templates_c/ (clear with: rm -rf templates_c/%%*)

### Database
- Host: localhost (127.0.0.1)
- Database: u152831691pmsdev
- User: u152831691pmsdev
- Password: MeBAeaWD0tfMXkh9OqXm
- Access: `mysql -u u152831691pmsdev -p'MeBAeaWD0tfMXkh9OqXm' u152831691pmsdev`

### SMTP (Email)
- Account: project.support@epictranscriptions.com
- Password: T5ut9kbf##GQTh@N4
- Provider: Office365

### Cron Jobs
- Location: /etc/cron.d/epictranscriptions
- Invite manager: Every 5 min (cron_invite_manager.php)
- Availability reminder: Sunday 6pm UTC (cron_availability_reminder.php)

### Key Features
- Interpreter availability matching (automated invitation system)
- Project management with client/linguist portals
- File upload with ZIP packaging
- AITH bridge integration (aith_bridge.php)

### Common Operations
```bash
# Clear Smarty template cache (after template changes)
rm -rf /home/epictranscriptions/htdocs/epictranscriptions.com/templates_c/%%*

# Check PHP syntax
/usr/bin/php5.6 -l /path/to/file.php

# Check error logs
tail -f /var/log/apache2/error.log

# Restart PHP-FPM
systemctl restart php5.6-fpm
```

### IMPORTANT NOTES
- Default `php` command is PHP 8.2 - always use /usr/bin/php5.6 for EPS scripts
- Do NOT re-save projects in admin after linguist accepts assignment (resets it)
- Clear Smarty cache after any .tpl file changes

---

## 4. AITH (aitranslationhub.co)

### Tech Stack
- Frontend: Laravel 10 (PHP 8.2)
- API: Flask 3 + Gunicorn (Python, port 8095, 3 workers)
- AI: OpenAI GPT-4o via LangChain
- Translation Memory: Local MySQL

### File Locations
- Frontend: /home/aitranslationhub/htdocs/aitranslationhub.co/
- API: /home/aitranslationhub-devapi/htdocs/devapi.aitranslationhub.co/
- DEAD/ignore: /home/apiaitranslationhub/htdocs/api.aitranslationhub.co/ (FastAPI, abandoned)

### Database
- Host: 127.0.0.1
- Database: aitranslator
- User: translator
- Password: Slick50!
- Access: `mysql -u translator -p'Slick50!' aitranslator`

### GitHub Repos
- Frontend: anirudhatalmale6-alt/aith-frontend (private)
- API: anirudhatalmale6-alt/aith-api (private)

### Key Features
- MTPE (Machine Translation Post-Editing) workspace
- Format-preserving DOCX translation (GPT-4o)
- Translation Memory with fuzzy matching
- Linguist management and project assignment
- In-app notifications
- RTL language support
- EPS integration bridge

### Common Operations
```bash
# Restart Flask API
sudo systemctl restart gunicorn-devapi

# Check API logs
journalctl -u gunicorn-devapi -f

# Laravel commands (frontend)
cd /home/aitranslationhub/htdocs/aitranslationhub.co/
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Check API health
curl http://localhost:8095/health
```

### EPS-AITH Bridge
- File: /home/epictranscriptions/htdocs/epictranscriptions.com/aith_bridge.php
- Triggered when admin checks "AITH MTPE" checkbox in EPS project
- Extracts DOCX from project ZIP, sends to AITH API for translation
- Supports master PO file inheritance

---

## 5. SRH (staffingresourceshub.com)

### Tech Stack
- Frontend: React 19 + Vite + Tailwind CSS + HeroUI
- Backend: Express 5 + TypeScript
- Database: MongoDB Atlas
- Telephony: Twilio (voice, video, IVR)
- Process Manager: PM2

### File Locations
- Frontend source: /var/www/alignpro/src/
- Frontend build: /var/www/alignpro/dist/
- Backend source: /var/www/dev.api.alignpro.app/src/
- Backend compiled: /var/www/dev.api.alignpro.app/dist/

### Database (MongoDB Atlas)
- Connection: mongodb+srv://mv_db_user:fqgenY1gKnNhIBTY@cluster0.eghu1eu.mongodb.net/
- Database: test
- User: mv_db_user
- Password: fqgenY1gKnNhIBTY
- GUI access: MongoDB Compass or Atlas web console

### Dev Site Access
- URL: https://dev.staffingresourceshub.com
- Basic Auth: epicdev / Xk9mR4vQp2wL7nB8

### Twilio
- Account SID: ACdb8569e6585fc73d98a0a8c63c8e5f76
- Phone: +18669704424
- Credentials in: /var/www/dev.api.alignpro.app/.env

### Key Features
- OPI (phone interpreting) with IVR menus
- VRI (video remote interpreting)
- IVR system (language selection, PIN validation, business hours)
- Interpreter matching engine (language + availability + score)
- Routing with escalation (timeout, retry, fallback)
- Phone number provisioning and management
- Service request lifecycle
- Real-time WebSocket notifications
- Stripe billing integration
- Help center (role-based guides)

### Common Operations
```bash
# Restart backend
pm2 restart srh-api

# Check backend logs
pm2 logs srh-api --lines 50

# Check health
curl http://localhost:4000/api/v1/health

# Rebuild backend (after TypeScript changes)
cd /var/www/dev.api.alignpro.app
npx tsc
pm2 restart srh-api

# Rebuild frontend (after React changes)
cd /var/www/alignpro
npx vite build

# Type-check without building
cd /var/www/dev.api.alignpro.app
npx tsc --noEmit
```

### Environment Variables (.env)
Located at: /var/www/dev.api.alignpro.app/.env
Contains: MongoDB URI, Twilio credentials, Stripe keys, JWT secret, API base URL, CORS origins

### SRH User Accounts
- m.v@epictranslations.com (admin)
- cantontennismatch@gmail.com (admin)
- virksofcanton2@gmail.com (client)
- test.linguist@epictranslations.com (linguist)

---

## 6. COMMON OPERATIONS

### Deploying Code Changes

**EPS (PHP):**
1. Edit files directly on server (or SCP from local)
2. Clear Smarty cache: `rm -rf templates_c/%%*`
3. Test: `curl https://epictranscriptions.com`

**AITH Frontend (Laravel):**
1. SSH to server
2. `cd /home/aitranslationhub/htdocs/aitranslationhub.co/`
3. Edit files or `git pull`
4. `php artisan cache:clear && php artisan view:clear`

**AITH API (Flask):**
1. `cd /home/aitranslationhub-devapi/htdocs/devapi.aitranslationhub.co/`
2. Edit files or `git pull`
3. `sudo systemctl restart gunicorn-devapi`

**SRH Backend (Express/TypeScript):**
1. `cd /var/www/dev.api.alignpro.app`
2. Edit .ts files in src/
3. `npx tsc` (compile)
4. `pm2 restart srh-api`

**SRH Frontend (React/Vite):**
1. `cd /var/www/alignpro`
2. Edit .jsx files in src/
3. `npx vite build`
4. (Nginx serves from dist/ automatically)

### Database Backups

**EPS MySQL:**
```bash
mysqldump -u u152831691pmsdev -p'MeBAeaWD0tfMXkh9OqXm' u152831691pmsdev > eps_backup_$(date +%Y%m%d).sql
```

**AITH MySQL:**
```bash
mysqldump -u translator -p'Slick50!' aitranslator > aith_backup_$(date +%Y%m%d).sql
```

**SRH MongoDB:**
```bash
mongodump --uri="mongodb+srv://mv_db_user:fqgenY1gKnNhIBTY@cluster0.eghu1eu.mongodb.net/test" --out=srh_backup_$(date +%Y%m%d)
```

### Checking Service Status
```bash
# On Hostinger (EPS + AITH)
systemctl status php5.6-fpm
systemctl status gunicorn-devapi
systemctl status mysql

# On DigitalOcean (SRH)
pm2 status
systemctl status nginx
```

---

## 7. EMERGENCY PROCEDURES

### Site Down - EPS
1. SSH to 82.197.92.115
2. Check: `systemctl status php5.6-fpm` - restart if needed
3. Check: `tail -20 /var/log/apache2/error.log`
4. Check disk space: `df -h`
5. Check MySQL: `systemctl status mysql`

### Site Down - AITH
1. SSH to 82.197.92.115
2. Check Flask API: `curl http://localhost:8095/health`
3. If down: `sudo systemctl restart gunicorn-devapi`
4. Check logs: `journalctl -u gunicorn-devapi --since "1 hour ago"`
5. Check Laravel: Clear cache, check storage/logs/laravel.log

### Site Down - SRH
1. SSH to 143.198.107.45
2. Check: `pm2 status` - restart: `pm2 restart srh-api`
3. Check health: `curl http://localhost:4000/api/v1/health`
4. Check Nginx: `systemctl status nginx`
5. Check logs: `pm2 logs srh-api --lines 100`
6. If MongoDB issue: Check Atlas dashboard at cloud.mongodb.com

### Database Corruption
1. Stop the application
2. Restore from most recent backup (see backup commands above)
3. Verify data integrity
4. Restart application

### If Developer Unavailable
1. All credentials are in this document
2. Code is on GitHub (standard stacks - any developer can maintain)
3. Changes follow standard deployment procedures above
4. For emergencies: restart services, check logs, restore backups

---

## NOTES

- EPS is legacy PHP 5.6 (end of life). Future upgrade to 7.x planned.
- AITH dead API (/home/apiaitranslationhub/) can be safely ignored/deleted.
- SRH was originally branded "AlignPro" - some file paths still reflect this.
- All systems are CONFIDENTIAL. Restrict access to authorized personnel only.
