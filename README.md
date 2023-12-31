# LaravelCrudGenPackage

A simple package for Create, Read, Edit, Update, Delete operation gen. However, in this version, there are many limitations. 

 ### Future Scope / Need To Improve
  1. Edit, Update full functional view generation
  2. Better coding
  3. Dynamic migration columns
  4. Elaborative exception handling


##  Install Using Composer
`composer require nahidhasanlimon/crudgen`

## Commands
` php artisan make:crud [Model name ] `
###### Examples
` php artisan make:crud Post `

### Don't Forget to run these artisan commands after make:crud commad

` php artisan route:cache `
` php artisan view:cache `
