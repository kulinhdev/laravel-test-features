## Setup Project

- Step1: https://github.com/kulinhdev/laravel-test-features.git

- Step2: composer install

- Step3: cp .env.example .env

- Step4: php artisan key:generate

- Step5: sail up

- Step6: setup .env & php artisan migrate

## Docker Command

- To delete all containers including its volumes use,
    docker rm -vf $(docker ps -aq)

- To delete all the images,
    docker rmi -f $(docker images -aq)

- Exec container
    docker exec -it container-name sh

- Supervisor
    /usr/bin/supervisorctl -h

    supervisorctl reread
 
    supervisorctl update
    
    supervisorctl start horizon
