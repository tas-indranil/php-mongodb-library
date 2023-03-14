pipeline {
    agent any
    stages {
        stage('Checkout git') {
            steps {
               git branch: 'master', url: 'https://github.com/tas-indranil/php-mongodb-library.git'
            }
        }       
        stage ('UnitTest') {
            steps {
                sh '''
                phpunit --testdox tests/Unit/MongoDBInsertTest.php
                phpunit --testdox tests/Unit/SingletonTest.php
                ''' 
            }
        }
        stage ('UTValidation') {
            steps {
                sh '''
                   chmod +x validate.sh
                   bash -x validate.sh
                ''' 
            }
        }
    }
  }
 
