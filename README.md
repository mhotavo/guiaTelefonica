#	Table: person
		$	id
		$	firstName*
		$	secondName
		$	surname*
		$	secondSurname
		$	phone*
		$	cellPhone*
		$	address*
		$	city*
		$	email*
		$	profession
		$	website -- NO
		$	facebook -- NO
		$	tweeter -- NO
		$	instagram --NO
 

#	Table: company
		$	id	
		$	name*
		$	phone*
		$	cellphone*
		$	address*
		$	city*
		$	website
		$	facebook
		$	twitter
		$	instagram
		$	email*


# 	Table:branchOffice
		$	id
		$	idCompany
		$	address
		$	city
		$	phone
		$	cellphone

# 	Table:Departament
		$	id
		$	name

# 	Table:City
		$	id
		$ 	idDepartament
		$	name

#	Table:Category
		$	id
		$	name


# Resources
		$ 	www.materialpalette.com
		$ 	https://github.com/akalongman/sublimetext-codeformatter
		$ 	http://itsolutionstuff.com/post/laravel-5-autocomplete-using-bootstrap-typeahead-js-example-with-demoexample.html
		$ 	https://github.com/bassjobsen/Bootstrap-3-Typeahead
		$   https://alex-d.github.io/Trumbowyg/
		$   www.pexels.com



## INSTALAR PROYECTO

+ crear o ingresar en la carpeta q queremos clonar el repositorio

		$ git clone https://github.com/mhotavo/guiaTelefonica.git

+ Después de descargar el proyecto entramos a este.

        $ cd guiaTelefonica

+ Ejecutamos el siguiente comando.

        $ composer install
    
+ Modificamos el nombre del archivo __.env.example.__ por __.env__ y agregamos nuestras credenciales.


+ Por ultimo solo debemos generar una key para nuestra app.

         $ php artisan key:generate

+ Listo ya podemos ejecutar el proyecto Cinema.

        $ php artisan serve

       



## RELIZAR BACKUP PROYECTO


+ poner el nombre del usuario en git

		$ git config --global user.name mhotavo

+ colocar email del usuario

		$ git config --global user.email milton.otavo@gmail.com


+ Creamos Commit con todos los cambios

		$ git add -A && git commit -m "Your Message"


+ para asegurarnos de que no exista ningún cambio que nosotros no tengamos

		$ git pull origin master

+ subimos los cambios

		$ git push origin master

+ Exportar BD

		$  mysqldump -h localhost -u root -p cinemil > Cinemil.sql
