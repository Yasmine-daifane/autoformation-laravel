# laravel auto formation chapitre :  validate data 

 - When the user interacts with a form, it is important to ensure that the data they enter corresponds to what is expected.
 
- Let's use a validator class in Laravel

- The make() method takes two parameters. The first parameter is an associative array containing the data, where each key represents the name of a property. The second parameter is also an associative array, where each key corresponds to the property name we want to validate, and it contains the validation rules (concraint suplimentaire) for that property

- The fails() method returns a boolean value. It is true if the validation rule fails, indicating that the validation did not pass, and it is false if the validation rule succeeds
-  we provided the value for 'title' as 'yaaaaaasmiiiiiiinehhh' which has more than 8 characters. Therefore, the validation should pass, and fails() should return false . 

- The errors() function will return a list of error messages associated with our issue.
-The validated() method, when it fails, will throw an exception. Laravel, by default, exhibits a behavior of redirecting to the previous page. If there is no previous page, it attempts to keep redirecting in a loop on the same page. Additionally, it enables the framework to handle errors if necessary.
- The approach of the method to assign rules is either a string or an array. It can be a string like `'character string'` or an array like `['required', 'min:8']`.
- we implement advanced validation rules, including complex rules defined using a specific class. One such example is the use of the `Rule` class to define a unique rule for the 'title' attribute, ignoring a specific ID:`'title' => [Rule::unique('admins')->ignore(2)]`
- In Laravel, we have the ability to define validation rules outside controllers in a dedicated class and create custom queries. To achieve this, we can use the following command : php artisan make:request BlogFilterRequest
  
-  In the file 'BlogFilterRequest,' there are two defined functionalities: the 'authorize' method, which determines whether the user has the right to access the request, and another method, 'Rules().' This 'Rules()' method returns an array used to define validation rules. These rules help ensure that the information within the request, whether in the body or as parameters in the URL, aligns correctly with the criteria specified in the 'Rules()' method. This validation ensures that the defined rules are followed accurately
- `dd($request->validated());` va fournir les données qui ont été validées en fonction de ce qui a été saisi dans l'URL.
- The 'slug' must correspond to a regular expression, so there is a validation rule defined using Regex: `'slug' => ['required', 'regex:/^[a-z0-9\-]+$/']`
- `http://127.0.0.1:8000/blog?slug=mon&title=mon%20complex` we can add complex if we have a systeme that 
- Prepare the data before validation" is achieved using prepareForValidation() method.on va le dir si on a un titre et ont a pas de slug il faudrait que tu generer un slug a la  volée using merge methode 
- merge ()elle atteint un tableau il va permettre de rajouter des information dans notre requette 

- The str:slug function generates a user-friendly identifier immediately from a given text
- helper string il aid a fair tous les manipulation sur les chaines de caractere 
