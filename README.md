[advisr.webm](https://user-images.githubusercontent.com/16525001/188012580-278e83d3-b110-4a92-a947-dad69ab2a0b7.webm)


## Techstack
Advisr Developer Practical Challenge

Laravel, Laravel Mix, Vue, Vue Infinite Scroll Pagination

## Setup
1. Clone or  download the repository

2. Create your `.env` file.
   ```
   cd advisr-challenge
   cp .env.example .env
   ```
3. Update the `.env` file with your database various credentials
4. Install the necessary packages.
   ```
   composer install && npm install
   ```
5. Generate the app key
   ```
   php artisan key:generate
   ```
6. Run the migrations
   ```
   php artisan migrate
   ```

7. Start frontend server
   ```
   npm run watch
   ```
8. Start the backend development server
   ```
   php artisan serve
   ```
9.  Visit the url printed out on the terminal: http://127.0.0.1:8000
