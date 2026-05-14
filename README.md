Readme · MD
Copy

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/GiftCheck-Budget%20System-blue" alt="Project Badge"></a>
<a href="#"><img src="https://img.shields.io/badge/API-Laravel%2012-red" alt="Laravel"></a>
<a href="#"><img src="https://img.shields.io/badge/Architecture-Controller%20%2B%20Actions-green" alt="Architecture"></a>
</p>
---
 
## 📌 About This Project
 
This project is a **Budget Approval System API** built on Laravel 12.
It implements a clean backend workflow for:
 
- Budget request approval
- Ledger generation
- Approval record tracking
- PDF generation
- Email notification
### 🧠 Architecture Style
 
- Controller → Actions → Database
- No event system is used for stability and simplicity.
---
 
## 🚀 Features
 
- ✔ Budget Approval API
- ✔ Ledger Entry System
- ✔ Approval Tracking
- ✔ Automatic Ledger Numbering
- ✔ PDF Generation (DomPDF)
- ✔ Email Notification (SMTP / Mailtrap)
- ✔ Clean Action-based architecture
- ✔ Stable and production-ready flow
---
 
## 📡 API Endpoint
 
### ▶ Approve Budget
 
```http
POST /api/budget/approve
```
 
**Request Body:**
 
```json
{
  "br_id": 1,
  "br_req": 5000,
  "br_budtype": "OPEX",
  "br_group": "Finance"
}
```
 
**Response:**
 
```json
{
  "success": true,
  "message": "Budget approved successfully",
  "data": {
    "ledger": {
      "bledger_no": "0000000000016",
      "bledger_trid": 1,
      "bledger_type": "RFBR",
      "bdebit_amt": 5000
    },
    "approval": {
      "abr_budget_request_id": 1,
      "abr_ledgerefnum": "0000000000016"
    }
  }
}
```
 
---
 
## 🧱 Project Structure
 
```
app/
├── Actions/
│   └── Budget/
│       ├── ApproveBudgetAction.php
│       ├── CreateLedgerEntryAction.php
│       └── GenerateApprovalPdfAction.php
├── Http/
│   └── Controllers/
│       └── Api/
│           └── BudgetController.php
├── Models/
│   ├── BudgetRequest.php
│   ├── ApprovedBudgetRequest.php
│   └── LedgerBudget.php
├── Mail/
│   └── BudgetApprovedMail.php
```
 
---
 
## ⚙️ Installation
 
**1. Clone repository**
 
```bash
git clone https://github.com/your-repo/giftcheck.git
cd giftcheck
```
 
**2. Install dependencies**
 
```bash
composer install
```
 
**3. Environment setup**
 
```bash
cp .env.example .env
php artisan key:generate
```
 
**4. Configure database**
 
```env
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
 
**5. Run migrations**
 
```bash
php artisan migrate
```
 
**6. Start server**
 
```bash
php artisan serve
```
 
---
 
## 📄 PDF Feature
 
Uses: `barryvdh/laravel-dompdf`
 
Stored in: `storage/app/public/`
 
---
 
## 📧 Email Setup
 
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=system@giftcheck.local
MAIL_FROM_NAME="GiftCheck System"
```
 
---
 
## 🧠 System Flow
 
1. API receives request
2. Controller validates input
3. Ledger entry created
4. Approval record saved
5. PDF generated
6. Email sent with attachment
---
 
## 🧾 Database Tables
 
**budget_requests**
| Column | Description |
|---|---|
| `br_id` | Primary key |
| `br_req` | Request amount |
| `br_budtype` | Budget type |
| `br_group` | Budget group |
 
**ledger_budgets**
| Column | Description |
|---|---|
| `bledger_no` | Ledger number |
| `bledger_trid` | Transaction reference ID |
| `bdebit_amt` | Debit amount |
| `bledger_type` | Ledger type |
 
**approved_budget_requests**
| Column | Description |
|---|---|
| `abr_budget_request_id` | Foreign key to budget request |
| `abr_ledgerefnum` | Ledger reference number |
| `abr_approved_by` | Approver name |
| `abr_checked_by` | Checker name |
 
---
 
## 🔐 Design Rules
 
- No event system
- No listeners
- Controller is single entry point
- Actions handle business logic
- Side effects are optional (PDF / email)
---
 
## 🧪 Testing
 
```http
POST http://127.0.0.1:8000/api/budget/approve
```
 
---
 
## ⚡ Status
 
- ✔ Stable API
- ✔ Clean Architecture
- ✔ Production Ready
- ✔ Simplified Flow
---
 
## 📜 License
 
This project is open-source and free to use.
 
