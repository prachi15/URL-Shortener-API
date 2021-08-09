***** Steps to run this project *****

1. Download this zip file into your system
2. UnZip into your xamp->htdocs folder

***** Run the below all command in your CMD *****

3. composer install
4. cp .env.example .env
6. php artisan key:generate
7. php artisan migrate
8. In .env file add your datatable name in DB_DATABASE and please add the below line in .env file. You can add that in last line

BITLY_ACCESS_TOKEN=2a5e7460bd234a9f1c747de58776fa300eab0c4f

9. Run the project in localhost(e.g. http://localhost/urlshortener/)

