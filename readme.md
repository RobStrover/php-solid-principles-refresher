# PHP SOLID Principles Refresher #
Always good to refresh my memory on these, even if I don't get to use them every day :) Using examples from the course on 
Laracasts: https://laracasts.com/series/solid-principles-in-php

## S - Single Responsibility ##
A class should have one (and only one) reason to change. One Job! More shown below on how we can use interfaces to extract 
and decouple functionality.

## O - Open Closed Principle ##
Entities should be open to extension but closed to modification.

It should be simple to change a classes behaviour but also to do it without modifying its original source code.

When you have a module that you want to extend without modifying separate the extensible behaviour behind an interface 
and flip the dependencies around.

In our shape example, instead of being reactive to the shape type in our AreaCalculator, we contract the shape classes 
(through an interface) to supply the area implementation. This is sometimes known as "Coding to an interface".

This can also be known as "Polymorphism" - The ability for code to have different behaviour whilst sharing a commmon 
interface.

## L - Liskov Substitution ##
Derived classes must be substitutable for their base classes. A way of showing this can be seen below.

```php
<?php

class A
{
    public function fire() {}
}

class B extends A
{
    public function fire() {}
}

// Replacing 'A' with 'B' should still work fine here if we have not violated the Liskov Substitution principle
// ..ion doSomething(B $obj) - should also work identically
function doSomething(A $obj)
{
    // do some stuff with A
}
```

In the lesson example, although the contracted `getAll();` method from the extended `LessonRepositoryInterface` is being 
implemented by both the DB and File lesson classes, they are returning two different types of result. This violates the 
Liskov Substitution principle. The only way around this in PHP is to use Doc Blocks and understand what it is you need to 
return.

Four checks:
1. Signature must match
2. Preconditions can't be greater
3. Post conditions at least equal to
4. Exception types must match

## I - Interface Segregation Principle ##
A client should not be forced to implement an interface that it doesn't use.

An example of this can be seen in our `ViolatingStarCommandExample` folder. A StarCommand Captain class manages crew members.
Crew members implement the `WorkerInterface` which has `work()` and `sleep()` methods. Crew members can be human or android,
the problem is that androids do not sleep but are contracted to implement the `sleep()` method which means the Interface 
Segregation principle is broken.

We can fix this by segregating our interfaces into two so that we can implement only what is needed for each type of worker:

```php

// Unwilling humans need to sleep as well as work...
class HumanWorkable implements WorkableInterface, SleepableInterface
{

// ...whereas androids only know how to work
class AndroidWorkable implements WorkableInterface
{

```

The problem with this now though is that our `Captain` class still needs extra logic to check what type of worker is being 
managed. This breaks the single responsibility principle. So we create another `ManageableInterface` which contracts the 
implementation of a `beManaged()` function. Our `beManaged()` function is then implemented by `Android` and `Human` classes 
to carry out only the appropriate actions for that worker when they are managed.

## D - Dependency Inversion ##
Depend on Abstractions, not Concretions

High level code -> isn't concerned with specific details
Low level code -> all about the specific details

High level code should never be dependant on low level code. A class should never depend upon an implementation. It should 
depend on a contract, abstraction or interface.

Consider the following from the 'password-reminder-example':
```php

<?php namespace ReminderExample;

class PasswordReminder
{

    private $dbConnection;

    public function __construct(MySQLConnection $dbConnection)
    {

        $this->dbConnection = $dbConnection;

    }

}

```

This breaks our Dependency Inversion principle. Think like this:
Does a `PasswordReminder` need to have **knowledge** of its DB connection? It's a high level module depending on a low 
level one. The `PasswordReminder` merely needs to know that there is a database connection, not what it is... Instead, 
code to an interface:
- Inject class that implements the `ConnectionInterface` to our password reminder
- Handle all connection logic in our `DbConnection` which is implementing the `ConnectionInterface`

... see the example in the password-reminder-example folder.

The idea is that our high level code is dependant on an abstraction which means it is decoupled from any of its implementation.