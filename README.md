# Michele Rueff Real Estate Website — Developer README

This project is a modular PHP real estate website built using reusable partials, a lightweight custom router, and organized front-end assets. The architecture focuses on clean URLs, maintainability, and flexibility without relying on a full PHP framework.

This document is intended for developers maintaining, extending, or deploying the site.

---

## Quick Start (Local Development)

Run the PHP development server from the project root:

php -S localhost:8000 -t site site/router.php

Then open:
http://localhost:8000

Always run through router.php to ensure clean URLs and static asset handling function correctly.

## Routing System

router.php provides clean URLs without requiring Apache or Nginx rewrite rules.

### Current Routes
| URL        | Page         |
| ---------- | ------------ |
| `/`        | Home page    |
| `/about`   | About page   |
| `/buy`     | Buyer page   |
| `/sell`    | Seller page  |
| `/blog`    | Blog page    |
| `/contact` | Contact page |

## Current Limitations
The site currently:
- Uses sample property listings
- Has no CMS/admin interface
- Uses placeholder contact processing
- Has no database integration

## Recommended Next Development Steps
Priority improvements:
1. Property database integration
2. Property search/filter functionality
3. Email delivery integration
4. SEO structured data
5. Accessibility improvements
6. Performance optimization
7. Image optimization pipeline
