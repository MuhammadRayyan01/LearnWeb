// Userflow website
[Login Officer] -> [Dashboard] -> [Select the "New Loans" menu]
        -> [Select Members] -> [Select Books (stock > 0)]
        -> [Save] -> [Books depleted 1] -> [Return to Dashboard]


// Login Page
+--------------------------------------+
|              SIMPUS-Mini             |
|--------------------------------------|
|                                      |
|         [ Login Officer ]            |
|                                      |
|   Username : [______________]        |
|   Password : [______________]        |
|                                      |
|             [ Log in ]               |
|                                      |
| Don't have an account yet? Sign up   | 
| here                                 |
+--------------------------------------+

// Dashboard Page
+----------------------------------------------------------------------------+
| SIMPUS-Mini Home | Books | Members | Borrowing | (Officer's Name) Logout   |                                               |
|----------------------------------------------------------------------------|
| [Total Books] [Total Members] [On Loan]                                    |
|                                                                            |
| Quick Action:                                                              |
| [ + New Loan ] [ + Return ]                                                |
|                                                                            |
| Recent Transactions                                                        |
| ---------------------------------------------------------------------------|
| Members | Books | Date of Borrowing | Status                               |
+----------------------------------------------------------------------------+

// userflow book return
[Dashboard] -> ["Returns" menu] -> [Search for active transactions (members/books)]
        -> [Mark "Returned"] -> [Stock increased 1]
        -> [Back to Dashboard]

// CSS 
-   Accent colors, navbar typography, and table/card styles follow
    assets/css/style.css that have been built since Jobsheet 2-3.

-   Navbar will be added to  the Borrowing menu  and login status indicator
    (officer name/Logout button) start implementation in Jobsheet 10.
    
-   Edge cases that need to be addressed during implementation: out-of-stock books
    should not be selected on the loan form; members with arrears
    late validated in Jobsheet 12 (self-task).