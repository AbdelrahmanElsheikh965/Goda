# Real-Ecommerce

## Overview
This is an e-commerce app for specific types of vendors (Footwear and bags). It has a web interface for the client to deal with products and get more information about the store in addition to an admin interface (dashboard) for creating, viewing, updating, or removing these products and managing other stuff.


This application is in its way to be professional, reliable, scalable, and maintainable. so it can then simulate real e-commerce apps in the market. 

## Installation

1- Open the repository in Github codespaces and using VS Code Desktop.

2- Build and run docker containers using this command from the root directory
```
docker compose up -d
```
3- When it finishes creating and running the containers attach shell of real-ecommerce-app container by right clicking it and choosing attach shell or
```
docker exec -it <containerHash> bash 
```
`Run these group of commands inside the container shell`

4.1 - Not to face 500 internal server error due to missing environment variables file simply run :
```
cp .env.example .env
``` 

4.2 - Generate App Key :
```
php artisan key:generate
```

4.3 - Create and seed DB tables with data. 
```
php artisan migrate --seed
```

4.4 - Finally create symlink between storage directory containing some of media files and public folder.
```
php artisan storage:link
```

**Finally** the project now is ready to run smoothly.

> If you have any questions, suggestions or contributions do not hesitate to do so and you can contact me from links the overview tab :)
>
> Link up and running: [http://goda.byethost14.com/](http://goda.byethost14.com/)
