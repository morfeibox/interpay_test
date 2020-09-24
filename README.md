# Interpay_test Project
A local based test project build explicitly for "Interpay Bulgaria" Ltd. to support job application for "PHP Developer - Remote job".
If any additional information is required please contact me at a.beychev@hotmail.com.

## Local Environment
1. Clone this repo in your local host's directory of choice.
2. Run the SQL from `test_db.sql` on phpPgadmin or other PosgreSQL client (if fails first create db called `interpay_test` and then run the query).
3. Open `cli` folder inside terminal  and execute "php retrieve_xml_data.php" to import xml parsed info into the db.
### Usage
1. Open a http://localhost:8080/ and the_name_of_the_directory_where_project_it_is at your browser.
2. Type query to search data by author name in the search input.


 * **Scheduling background tasks execution:**
 You can execute `cli/retrieve_xml_data.php` with cron worker according to  desired schedule in `cron-worker/crontab`.


#### Project Pictures
There are pictures of the project and db  at `docs/images`.
