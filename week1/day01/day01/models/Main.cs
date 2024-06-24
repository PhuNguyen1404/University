using System;
using day01.models;

class Program
{
    static void Main()
    {
        Movie rogueOne = new Movie("Rogue One", Movie.NEW_RELEASE);
        Movie frozen = new Movie("Frozen", Movie.CHILDRENS);
        Movie starWarsIII = new Movie("Star Wars III", Movie.REGULAR);

        Rental rental1 = new Rental(rogueOne, 5);
        Rental rental2 = new Rental(frozen, 7);
        Rental rental3 = new Rental(starWarsIII, 4);

        Customer customer = new Customer("John Doe");
        customer.AddRental(rental1);
        customer.AddRental(rental2);
        customer.AddRental(rental3);

        string statement = customer.GenerateStatement();
        Console.WriteLine(statement);
    }
}
