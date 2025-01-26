## Tracking Project

### Index
1. [Introduction](#introduction)
2. [Prerequisites](#prerequisites)
3. [Initial Project Setup](#initial-project-setup)
4. [Starting the Project](#starting-the-project)
5. [Viewing the Database](#viewing-the-database)
6. [Contact](#contact)

### Introduction

This project is a package tracking system designed to manage and monitor the delivery process. It includes functionalities for handling delivery information, tracking statuses, and managing carrier details. The system is built using Laravel and leverages Docker for containerization, ensuring a consistent development environment.

### Prerequisites

#### Installing Prerequisites on Linux


1. **Docker** - [Official Documentation](https://docs.docker.com/engine/install/ubuntu/):
- Ensure that you have docker already installed on your machine. If not, follow the steps below to install it:
    ```sh
      sudo apt-get update
      sudo apt-get install -y apt-transport-https ca-certificates curl software-properties-common
      curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
      sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
      sudo apt-get update
      sudo apt-get install -y docker-ce
      sudo usermod -aG docker ${USER}
    ```

2. **Docker Compose** - [Official Documentation](https://docs.docker.com/compose/install/):
- Ensure that you have Docker Compose already installed on your machine. If not, follow the steps below to install it:
    ```sh
      sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
      sudo chmod +x /usr/local/bin/docker-compose
    ```

3. **Node.js and NPM** - [Official Documentation Node](https://nodejs.org/en/download/package-manager/) and [Official Documentation NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm):
- Ensure that you have Node.js and NPM already installed on your machine. If not, follow the steps below to install them:
    ```sh
    curl -sL https://deb.nodesource.com/setup_14.x | sudo -E bash -
    sudo apt-get install -y nodejs
    ```

### Initial Project Setup

1. Clone the repository:
    ```sh
    git clone https://github.com/vlalef/projeto-rastreamento.git
    cd projeto-rastreamento
    ```

### Starting the Project

To start the project using Docker, follow the steps below in the root directory of the project `projeto-rastreamento`:

1. Copy the .env.example file to .env inside the projeto-rastreamento subdirectory:  
   ```sh
    cp projeto-rastreamento/.env.example projeto-rastreamento/.env
   ```
2. Install Composer dependencies inside the container:
    ```sh
    docker-compose run --rm app composer install
    ```

3. Generate the Laravel application key:
    ```sh
    docker-compose run --rm app php artisan key:generate
    ```

4. Build and start the containers:
    ```sh
    docker-compose up --build -d
    ```

5. Run the migrations to create the tables:
    ```sh
    docker-compose exec app php artisan migrate:fresh
    ```

6. Seed the database:
    ```sh
    docker-compose exec app php artisan db:seed
    ```

### Viewing the Database

To view the database, we recommend using pgAdmin. Follow the steps below to install and configure pgAdmin on Linux:
* First, get the IP address of the container which is running the database to configure pgAdmin:
```sh
  docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' CONTAINER_ID (laravel_db)
```
1. **Install pgAdmin**:
    ```sh
      curl https://www.pgadmin.org/static/packages_pgadmin_org.pub | sudo apt-key add
      sudo sh -c 'echo "deb https://ftp.postgresql.org/pub/pgadmin/pgadmin4/apt/$(lsb_release -cs) pgadmin4 main" > /etc/apt/sources.list.d/pgadmin4.list && apt update'
      sudo apt install pgadmin4
      sudo /usr/pgadmin4/bin/setup-web.sh
    ```
2. **Configure pgAdmin**:
   - Open pgAdmin and register a new server.
   - In the **General** tab, fill in the **Name** field with `LaravelDB`.
   - In the **Connection** tab, fill in the fields:
      - **Host name/address**: The IP address of the container running the database.
      - **Port**: `5432`
      - **Maintenance database**: `laravel`
      - **Username**: `laravel`
      - **Password**: `laravel`

### Contact
- Author: Alef Vaz
- Email: Alef.Vaz.Contato@gmail.com
- GitHub: vlalef

[![LinkedIn][linkedin-shield]][linkedin-url]

[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/alef-vaz
