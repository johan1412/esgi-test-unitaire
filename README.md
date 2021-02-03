# Instructions requetes API


## Users

        GET : obtenir tous les users 
        /api/users
---
        POST : créer un user
        /api/users/store
        {
                "email": {nouvel email},
                "firstName": {nouveau firstname},
                "lastName": {nouveau lastname},
                "password": {nouveau password},
                "birthday": {nouveau birthday}
        }
---
        GET : obtenir un user
        /api/users/{id}
---
        PUT : modifier un user
        /api/users/{id}
        {
                "email": {nouvel email},
                "firstName": {nouveau firstname},
                "lastName": {nouveau lastname},
                "password": {nouveau password},
                "birthday": {nouveau birthday}
        }
---
        DELETE : supprimer un user
        /api/users/{id}


## ToDoLists

        GET : obtenir toutes les todolists
        /api/todolists
---
        POST : créer une todolist
        /api/todolists/store
        {
                "name": {nom de la todolist},
                "userId": {id de user}
        }
---
        GET : obtenir une todolist
        /api/todolists/{id}
---
        PUT : modifier une todolist
        /api/todolists/{id}
        {
                "name": {nom de la todolist},
                "userId": {id de user}
        }
---
        DELETE : supprimer une todolist
        /api/todolists/{id}


## Items

        GET : obtenir tous les items
        /api/items
---
        POST : créer un item
        /api/items/store
        {
                "name": {nom de l'item},
                "content": {contenu de l'item}
                "userId": {id de user}
        }
---
        GET : obtenir un item
        /api/items/{id}
---
        PUT : modifier un item
        /api/items/{id}
        {
                "name": {nom de l'item},
                "content": {contenu de l'item}
                "userId": {id de user}
        }
---
        DELETE : supprimer un item
        /api/items/{id}