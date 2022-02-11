# Real Estate ownership tracking app using CakePHP and Node

This app stores & tracks ownership info about real estate owners in Polish legal system to produce reports about who and when came in to possesion of a given land. It triggers external script (Chrome Extension script) that automatically inputs the needed info to scrap owner' name from the government website. It uses Puppeteer for automatic testing and scraping.

## Installation

1. Download the project
2. Run `composer install`.
3. Run the development server and configure the database connection for your own machine

If Composer is installed globally, run

```bash
composer install
```
You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server
```
Then visit `http://localhost:8765` to see the website.
