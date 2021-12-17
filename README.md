# PokeConnect

A Pokemon based application made for competitive Pokemon players. This site is a place where you can create a team and save it onto your profile.

Our Client accesses our page at www.testpoke.com. The site starts a user at login.php, and can navigate through our site once they are logged in. Our site contains login.php, boothomepage2.php, account.php, forum.php, and teambuilder.php. Every time the database needs to be accessed, i.e. login, we create a client for our broker to receive and the functions are handled there. This is used to login user and communicate with DB

DMZ only receives messages from our combined DB/RMQ machine, through it’s listener (rmqListener.php). This machine communicates with PokeAPI to populate our database with information about Pokemon, moves, and typings.

Our combined database and RabbitMQ machine handles communications as the broker host, and locally handles our databases. All inter-machine communications go through rmqListener.php, and for any database connections it calls our dbFunctions.php file and connects to MySQL from there.
