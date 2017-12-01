# claves
Sirve para guardar claves/valor en redis server     
Comparando el mismo proyecto escrito en java, PHP y Python flask

/////////////////////////////////////////////////////////////////

Una vez instalado el default-jdk, vamos a descargar el maven de apache, lo descomprimimos
en una carpeta llamada maven ( en nuestro home usuario mismo ) y accedemos a su carpeta bin
para ver que tenemos mvn y podemos hacerle un -version.

Para ponr una ruta mas rapida sin tener que acceder a la carpeta, editamos el siguiente 
archivo, situado en nuestro home/usuario
El archivo se llama .bashrc y añadimos la siguiente linea al final del todo
 ( PATH=$PATH:/home/usuario/maven/apache-maven-3.5.2/bin )

A tener en cuenta que cualquier terminal abierto...tendra que realizar el comando 
source .bashrc o abrir una nueva terminal.

Java no necesita el Servidor Web Apache, ya que esta, tiene servidor propio...
Ejemplo: tomcat, tomee, jbos ... llamados Servlets containers


ejecutamos en claves/javaJSF/proJSFMaven el siguiente comando mvn jetty:run y desde navegador
con el localhost:9999 ( puerto que nos ha indicado nuestro jetty ) podemos cargar los archivos
php que hemos introducido en nuestra carpeta /var/www/html

