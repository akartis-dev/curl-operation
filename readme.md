# Requete curl simplifié

##GET
```php
    $curl = new CurlOperation('https://jsonplaceholder.typicode.com');
    $curl->json();
    $result = $curl->get('posts/1');
```

Result:   
string(292) "{  
  "userId": 1,  
  "id": 1,  
  "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",  
  "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"  
}"
