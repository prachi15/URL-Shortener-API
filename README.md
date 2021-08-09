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

***** Challenges, and how you overcame them *****
The main challege is the design of the 100 url listing. I overcome this challege by doing simple & efficient design using datatable.

***** Reasoning behind any design decisions *****
1. Format->Table is sorted & give top 100 urls & also search with title.
2. It is very important that client's not get confused with our design so it's better to add simple & proficient.


***** Future improvements you would make with more time *****
1. Add new field called category.
2. Display url category wise.
3. Change design to display top urls.
