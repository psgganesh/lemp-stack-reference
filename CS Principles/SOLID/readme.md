# SOLID PRINCIPLES IN PHP

- Single Resposibilty Principle: A class should exactly have only one job
    - An object / class should only have one reason to change
> Ex: A report generator class should only do one thing - generate report. This should not worry about fetching data from database / output formats for views. They should have seperate classes of their own to the the things
- Open-Closed Principle: Open for changes and closed for modification
    - It should be simple to change the behavior of a class or object when a project is being enhanced as business req. grow and enhancements add on
    - This will help to avoid code rot as enhancements grow bigger
> Ex: A PDF generator / HTML generator should atleast be implementing one GeneratorInterface
- Liskov-Substitution Priniciple: Dereived classes must be able to be a substitute for their basic classes - Below are the main rules
    - Signature must match
    - Pre-conditions while using the derieved / parent classes must be the same
    - Post-conditions must be at least equal to - Output must be at least similar
    - Exception types must match
> Ensure interfaces are implemented and classes are extended via polymorphism
- Interface-Segregation: Client should not be forced to use interfaces in which all features are not used. 
    - This is to avoid ripple effect
    - It is good to use smaller interface which can have only one method stub and use that interface only when required as multiple interfaces can be implemented by a single class
> Ex: If PDF class has a feature to be downloaded, this can be implemented from an interface so that tomorrow a DOC class might also use the same interface. Implementing from multiple interfaces
- Dependency-Inversion Principle: Helps 2 classes find a common interface / a common ground from which further actions can be worked out.
    - Specific use case is- connection types for a data source might be different.
Ex: Data source can be just a plain array, mysql, redis - so instead of hard-coding the data source; it is better to get the data-source from a interface class where the basic data source actions for connect / config / load can be specifed. All further data sources will implement the same data source connection interface and carry on actions