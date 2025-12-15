pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Install dependencies') {
            steps {
                sh '''
                    php -v
                    /usr/local/bin/composer install --no-interaction --prefer-dist
                '''
            }
        }

        stage('Run tests') {
            steps {
                sh '''
                    cp .env.example .env || true
                    php artisan key:generate --force
                    php artisan test
                '''
            }
        }
    }
}
