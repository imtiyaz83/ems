Prerequisites to Run the POC of EMS Project Locally

- License: MIT
- PHP Version: ^8.2
- Laravel Framework: ^11.9
- Description: A skeleton application for the Laravel framework.

To Run the Project

1. Ensure you have PHP version ^8.2 installed.
2. Install Laravel framework ^11.9.
3. Clone the repository and navigate to the project directory.

```bash
git clone <repository-url>
cd <project-directory>
```

4. Install dependencies using Composer.

```bash
composer install
```

5. Serve the application locally.

```bash
php -S localhost:8000 -t public
```

6. Access the application in your web browser at `http://localhost:8000`.

To Run the Test Cases

1. Ensure the application is running locally as per the steps above.

2. Open a new terminal window and run the following commands to execute the test cases:

For Speaker Tests

```bash
php artisan test tests/Feature/SpeakerTest.php
```

For Talk Proposal Tests

```bash
php artisan test tests/Feature/TalkProposalTest.php
```
