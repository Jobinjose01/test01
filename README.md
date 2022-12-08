## Usage

To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system, and then clone this repository.

Next, navigate in your terminal to the directory you cloned this, and spin up the containers for the web server by running `docker-compose up -d --build site`.

After that completes, follow the steps from the [src/README.md](src/README.md) file to get your Laravel project added in (or create a new blank one).

Bringing up the Docker Compose network with `site` instead of just using `up`, ensures that only our site's containers are brought up at the start, instead of all of the command containers as well. The following are built for our web server, with their exposed ports detailed:

- **nginx** - `:81`
- **php** - `:9000`


## Access The CLI

Clone the project to a local dir and move inside that folder 

## Steps to up the container.

docker-compose up -d --build

## verify the contianer is up with ngx and PHP

docker ps 

## Web URL

access http://localhost:81

The file can be downloaded from the landing page by clicking the link

## Download the file via CLI

docker-compose run --rm artisan salary

