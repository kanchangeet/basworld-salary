**Salary Payment Date tool**

Scenarios to calcualte bonus & payment dates 
1. On the last day of the month salaries are paid. If on last day of month on weekends then salary will paid to previous working day.

2. On the 15th of every month bonuses are paid. If 15th is coming on weekends then bonus will paid to next wednesday

To execute the code & create CSV file using PHP CLI
### PHP CLI:
- Use php cli for same. if you want to generate the CSV for other than current year then pass first argument as year like php index.php 2025 

**Getting Started**
You can download the project and run with following instruction

### Prerequisities
- [Composer](https://getcomposer.org/)
- [PHP 7](http://www.php.net/)

### Installation
Clone the repository
```
git clone <HTTPS URL> of repository
```

Download dependancies
```
composer install
```

### Run application

```
php index.php <year>
```

### Run Unit Test

```
 php vendor/bin/phpunit tests/CSalaryPayDatesTest.php
```