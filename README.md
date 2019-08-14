# Generator language neutral

### Retired from pragmatic programmer book

Give some file with valid instructions generate the code for php and nodejs.

### Valid Language
    - M  start of a message definition
    - F define a field
    - E end of file

### Example:    
    M Product
    F id int
    F name string[30]
    E    

### Usage:
     RUN into terminal: php generator-language-neutral generator {path-to-file}

### Bonus
    - Make easy implement new languages
