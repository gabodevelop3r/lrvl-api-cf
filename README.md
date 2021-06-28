
## Instalación

ejecutar 
1.- composer install 
2.- php artisan migrate --seed
3.- php artisan passport install

## para test de rutas con postman 

1.- php artisan serve

## convencion para travajar los recursos de nuestra api

1.- php artisan make:resource PostResource (administrar recurso para un modelo)
2.- php artisan make:resource PostRelationshipResource (administrar relaciones del modelo)
3.- php artisan make:resource PostCollecion (administrar todos los post)
4.- php artisan make:resource AuthorIdentifierResource (hacer referencia solo al author)

## No olvides visitar

1.- https://laravel.com/docs/8.x/eloquent-resources
2.- https://jsonapi.org/format/#crud-creating

## Creditos

Curso de servicios web con laravel, realizado en codigofacilito.
