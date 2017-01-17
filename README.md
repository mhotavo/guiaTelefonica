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